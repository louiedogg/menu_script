<?php
/*
Plugin Name: Restaurateur Inc. - Invoice
Plugin URI: http://restaurateurinc.com
Description: Restaurant Costing Program
Version: 1.0
Author: admin@loiuedogg.com
Author URI: http://louiedogg.com
*/
//***Record Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function invoice_record() {

	echo '<form method="POST" action="" >
			<h5>Create New Invoice</h5>
			<h5>Date:<input type="text" name="invoice_date" id="invoice_date" /></h5>
			<h5>Vendor:
			<select name="vendors_seq">
			<option></option>';
			
			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

			$vendQuery = mysql_query("SELECT vendors_seq, vendors_name FROM {$vendorsTable}");

						while ($vendResult = mysql_fetch_array($vendQuery)) {

							echo '<option value="'.$vendResult[0].'">'.$vendResult[1].'</option>'; 
												
							}

			echo '</select>
					</h5>
			
			<h5>Category:
			<select name="category_seq">
			<option></option>';
			
			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

			$catQuery = mysql_query("SELECT category_seq, category_name FROM {$categoryTable}");

						while ($catResult = mysql_fetch_array($catQuery)) {

							echo '<option value="'.$catResult[0].'">'.$catResult[1].'</option>'; 
												
							}

			echo '</select>
					</h5>
			
			
			
			
				<input type="submit" name="invoice_choice" id="invoice_choice" value="Add New" />	
					
				</form>
				<br>';
				
		return TRUE;
}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Insert New Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function invoice_new() {  // New Invoice


			if (empty($_POST['invoice_date']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an invoice Name.</h5>';
				} else {
					$invoice_date = trim(strip_tags($_POST['invoice_date']));
					$problem = FALSE;
			}
			
			if (empty($_POST['vendors_seq']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please select a Vendor.</h5>';
				} else {
					$vendors_seq = trim(strip_tags($_POST['vendors_seq']));
					$problem = FALSE;
					
			}
			
			if (empty($_POST['category_seq']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an invoice Name.</h5>';
				} else {
					$category_seq = trim(strip_tags($_POST['category_seq']));
					$problem = FALSE;
					
			}


			if (!$problem) {

			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$invoiceInsertQuery = "INSERT INTO {$invoiceTable} (invoice_dateTime,
												invoice_date,
												vendors_seq,
												category_seq) 
												VALUES(now(),
												'$invoice_date',
												'$vendors_seq',
												'$category_seq')"; 

				if ((@mysql_query($invoiceInsertQuery, $dbc)) == TRUE)  {
					
					$findInvoiceId = mysql_query("SELECT invoice_seq 
													FROM {$invoiceTable}
													ORDER BY invoice_seq DESC
													LIMIT 1");
								
					$fetch_invoiceId = mysql_fetch_array($findInvoiceId);
					
					$invoiceId = $fetch_invoiceId[0];
					
					invoice_choice($invoiceId);

					} else { 
						print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $invoiceInsertQuery . '</p>';
				}

			} 
	} // End Funtion New Connection



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@



// Choose between Entering in Items Manually or Import CSV
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function invoice_choice($invoiceId) {
	
			
	echo '<form enctype="multipart/form-data" action="?invoiceId='.$invoiceId.'" method="POST">
			
			<h5>Add Invoice Items Manually or Import CSV</h5>
					
			<h5>Import CSV</h5>
			
			<input size="50" type="file" name="filename"><br />
			<br>
			<input type="submit" name="invoice_import" value="Upload"></form>
			<br>
			<h5>---OR---</h5>
									
			<form method="POST" action="?invoiceId='.$invoiceId.'" >
			<br>
			<h5>Create Manual Invoice Item</h5>
			
			<h5>Quantity:<input type="text" name="invoiceItem_qty" id="invoiceItem_qty" /></h5>
			
			<h5>Attach Grocery Item:
			
			<select name="groceryList_seq">
			<option></option>';
				
				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$grocQuery = mysql_query("SELECT groceryList_seq, groceryList_name FROM {$groceryListTable}");

					while ($grocResult = mysql_fetch_array($grocQuery)) {

						echo '<option value="'.$grocResult[0].'">'.$grocResult[1].'</option>'; 
												
						}

			echo '</select>
					</h5>
			
			<h5>Unit Cost: $ <input type="text" name="invoiceItem_unitcost" id="invoiceItem_unitcost" /></h5>
			
			<input type="submit" name="invoiceItem_manualAdd" id="invoiceItem_manualAdd" value="Add New" />
			
		</form>
		<br>';
		
		
		invoiceItems_display($invoiceId);

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Import csv***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function invoice_import() {
	
	$invoiceId = $_GET['invoiceId'];

	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

	//Upload File
	//if (isset($_POST['invoice_import'])) {
	//    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
	//        echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
	//        echo "<h2>Displaying contents:</h2>";
	//        readfile($_FILES['filename']['tmp_name']);
	//    }
	 
	    //Import uploaded file to Database
	    $handle = fopen($_FILES['filename']['tmp_name'], "r");
	 
	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	        $import="INSERT into $iiTempTable (iiTemp_dateTime, 
														iiTemp_qty, 
														iiTemp_description,
														iiTemp_unitcost,
														iiTemp_totalcost,
														invoice_seq) 
														values('now()',
																'$data[0]',
																'$data[1]',
																'$data[2]',
																'$data[3]',
																'$invoiceId')";
	 
	        mysql_query($import) or die(mysql_error());
	    }
	 
	    fclose($handle);
	 
	    print "<p>Import done</p>";
	    		
		invoice_importEdit($invoiceId);
			
	//}


}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//*** Invoice Item Edit***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function invoice_importEdit($invoiceId) {
	
// Query to display table

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 

		$iiTempResult = mysql_query("SELECT iiTemp_seq,
											iiTemp_qty,
											iiTemp_description,
											iiTemp_unitcost,
											iiTemp_totalcost
										FROM $iiTempTable
									WHERE invoice_seq={$invoiceId}
									ORDER BY iiTemp_seq DESC");
			if (!$iiTempResult) {
				die('Query to show fields from table failed --- '.mysql_error($dbc));
			}
	
	
// Displays the Table

				echo "<h5>Invoice #".$invoiceId."</h5><br>";
				echo '<form method="POST" action="?invoiceId='.$invoiceId.'">
							<input name="invoice_saveImportedItems" type="submit" value="Save Invoice"></input>
						<br>';

				
				echo "<table border='1'>
						<tr>";
					echo "<th>Quantity</th>";
					echo "<th>Description</th>";
					echo "<th>Select Grocery Item</th>";
					echo "<th>Unit Cost</th>";
					echo "<th>Total Cost</th>";
					echo "<th>Delete</th>";

				echo "</tr>\n";


				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 



				if (!($iiTempResult) == NULL) {
					
					while($iiTempRow = mysql_fetch_row($iiTempResult))
					{
  	 					 echo "<tr>";

   							// foreach($CON_row as $CON_cell)
   							echo "<td>$iiTempRow[0]</td>";
							echo "<td>$iiTempRow[1]</td>";
							echo "<td>$iiTempRow[2]</td>";							
							echo '<td>
										<select name="groceryList_seq'.$iiTempRow[0].'">
										<option></option>';

										$query = mysql_query("SELECT groceryList_seq, groceryList_name FROM {$groceryListTable}");

										while ($result = mysql_fetch_array($query)) {

											echo '<option value="'.$result[0].'">'.$result[1].'</option>'; 
												
											}

							echo '		</select>
										</form>
									</td>';
							echo "<td>$iiTempRow[3]</td>";
							echo "<td>$iiTempRow[4]</td>";
							
							echo '<td><form method="POST" action="?invoiceId='.$invoiceId.'">
										<input name="invoice_delete" type="submit" value="Delete"></input>
									</form></td>';
    						echo "</tr>\n";
		
					}


					mysql_free_result($iiTempResult);	
				}

				echo "</table>";


}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Save Imported Invoice Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function invoice_saveImportedItems() {
	
	$invoiceId = $_GET['invoiceId'];
	
	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');
	
	$x = mysql_query("SELECT iiTemp_seq
							FROM $iiTempTable
								WHERE invoice_seq={$invoiceId}
								ORDER BY iiTemp_seq DESC");
			
	if (!($x) == NULL) {
								
		while($y = mysql_fetch_assoc($x)) {
					
			foreach($y as $key => $value) {
							
					if (empty($_POST["groceryList_seq$value"])) {
							$problem = TRUE;
							echo '<h5 style="color:red;">Please enter an a Grocery Item for '.$value.'.</h5>';
							} else {
								$groceryList_seq = trim(strip_tags($_POST["groceryList_seq$value"]));
								$problem = FALSE;
						}
						
					if (!$problem) { 
						
						include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
						include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 
				
						$z = "UPDATE $iiTempTable 
								SET groceryList_seq={$groceryList_seq}
									WHERE iiTemp_seq={$value}";

				
						if ((@mysql_query($z, $dbc)) == TRUE)  {
							
								echo '<h5>'.$value.' Entered for '.$groceryList_seq.'</h5>';
								
								$insertTemp_to_invoiceItems = "INSERT INTO $invoiceItemsTable
																	(invoiceItems_dateTime,
																		invoiceItems_qty,
																		groceryList_seq,
																		invoiceItems_unitcost,
																		invoice_seq)
																		SELECT iiTemp_dateTime,
																				iiTemp_qty,
																				groceryList_seq,
																				iiTemp_unitcost,
																				invoice_seq 
																				FROM $iiTempTable
																				WHERE invoice_seq={$invoiceId}";
								if ((@mysql_query($insertTemp_to_invoiceItems, $dbc)) == TRUE) {
									
									echo "<h4>Good</h4>";
									
									
									} else {
									
										print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $insertTemp_to_invoiceItems . '</p>';
									
										
										
									}
						
							} else {
									
									print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $z . '</p>';
															
								}
		
					}
			}
		}
		
	} else {
		
		echo '<h5>Statement is empty</h5>';
		
		}


			/* if (!$problem) {
				
				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 
				
				mysql_query("INSERT INTO ");

				
				if ((@mysql_query($invoiceInsertQuery, $dbc)) == TRUE)  {
							
							$findInvoiceId = mysql_query("SELECT invoice_seq 
															FROM {$invoiceTable}
															ORDER BY invoice_seq DESC
															LIMIT 1");
										
							$fetch_invoiceId = mysql_fetch_array($findInvoiceId);
							
							$invoiceId = $fetch_invoiceId[0];
							
							invoice_choice($invoiceId);

							} else { 
								print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $invoiceInsertQuery . '</p>';
						}

			
			} */


}//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


//***Enter Invoice Items Manually***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function invoiceItem_manualAdd() {
	
	$invoiceId = $_GET['invoiceId'];
	
	
	if (empty($_POST['invoiceItems_qty']) ) {
		$problem = TRUE;
		echo '<h5 style="color:red;">Please enter an Invoice Item Quantity.</h5>';
		} else {
			$invoiceItems_qty = trim(strip_tags($_POST['invoiceItems_qty']));
			$problem = FALSE;
	}
	
	if (empty($_POST['invoiceItems_unitcost']) ) {
		$problem = TRUE;
		echo '<h5 style="color:red;">Please enter an Invoice Item Quantity.</h5>';
		} else {
			$invoiceItems_unitcost = trim(strip_tags($_POST['invoiceItems_unitcost']));
			$problem = FALSE;
	}
	
	if (empty($_POST['groceryList_seq']) ) {
		$problem = TRUE;
		echo '<h5 style="color:red;">Please select a Grocery List Item.</h5>';
		} else {
			$groceryList_seq = trim(strip_tags($_POST['groceryList_seq']));
			$problem = FALSE;
	}
	
	if (!$problem) {

			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$invoiceItemsInsertQuery = "INSERT INTO {$invoiceItemsTable} (invoiceItems_dateTime,
												invoiceItems_qty,
												invoiceItems_unitcost,
												groceryList_seq,
												invoice_seq) 
												VALUES(now(),
												'$invoiceItems_qty',
												'$invoiceItems_unitcost',
												'$groceryList_seq',
												'$invoiceId')"; 

				if ((@mysql_query($invoiceItemsInsertQuery, $dbc)) == TRUE)  {
					
					invoice_choice($invoiceId);

					} else { 
						print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $invoiceInsertQuery . '</p>';
				}

			} 

}
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Display Invoice Items***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function invoiceItems_display($invoiceId) {
	
	
	// Query to display Invoice Items

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 

		$iiResult = mysql_query("SELECT a.invoiceItems_seq,
										a.invoiceItems_dateTime,
										a.invoiceItems_qty,
										a.invoiceItems_unitcost,
										a.invoiceItems_totalcost,
										a.invoice_seq,
										b.groceryList_name
								FROM $invoiceItemsTable a, 
										$groceryListTable b 
									WHERE a.groceryList_seq=b.groceryList_seq
									AND a.invoice_seq={$invoiceId}");
			if (!$iiResult) {
				die('Query to show fields from table failed --- '.mysql_error($dbc));
			} 
			



	// Displays the Table

				echo "<h4>Invoice #".$invoiceId."</h4>";

				echo "<table border='1'><tr>";

				echo "<th>Quantity</th>";
				echo "<th>Grocery Item</th>";
				echo "<th>Unit Cost</th>";
				echo "<th>Total Cost</th>";
				echo "<th>Edit</th>";
				echo "<th>Delete</th>";

				echo "</tr>\n";


				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 



				if (!($iiResult) == NULL) {
					
					while($iiRow = mysql_fetch_row($iiResult))
					{
						 echo "<tr>";

							// foreach($CON_row as $CON_cell)
							echo "<td>$invRow[2]</td>";
							echo "<td>$invRow[6]</td>";
							echo "<td>$ ".$invRow[3]."</td>";
							echo "<td>$ ".$invRow[4]."</td>";
							echo '<td><form method="POST" action="?invoiceId='.$invRow[2].'"><input name="invoice_edit" type="submit" value="Edit"></input></form></td>';
							echo '<td><form method="POST" action="?invoiceId='.$invRow[2].'"><input name="invoice_delete" type="submit" value="Delete"></input></form></td>';
							echo "</tr>\n";
							
							
							/*	$sumArray = array();

							//	foreach ($myArray as $k=>$subArray) {
							//	  foreach ($subArray as $id=>$value) {
							//		$sumArray[$id]+=$value;
							//	  }
							//	}

							//	print_r($sumArray);
							*/

		
					}


					mysql_free_result($iiResult);	
				}
				
				/*
				
				echo '<tr>';
					echo '<td colspan="3"></td>';
					echo '<td></td>';
				*/
				
				echo "</table>";

				

}

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@




//***Edit Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function invoice_edit() {

   $invoiceId = ($_GET['invoiceId']);

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');


			
		$invEditQuery = "SELECT invoice_name,
					invoice_description,
					invoice_seq
					FROM $invoiceTable 
					WHERE invoice_seq=$invoiceId";
		$invEditResult = mysql_query($invEditQuery);
			

		if (!$invEditResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$invEditQuery);
		} 

		$invEditView = mysql_fetch_array($invEditResult);


		echo '<form method="POST" action="?invoiceId='.$invEditView[2].'">
			<h5>Name:<input type="text" name="invoice_name" id="invoice_name" value="'.$invEditView[0].'" /></h5>
			<h5>Description:<input type="text" name="invoice_description" id="invoice_description" value="'.$invEditView[1].'" /></h5>
			<input type="submit" name="invoice_update" id="invoice_update" value="Update"/>
			</form>
			<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@





//***Update Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


function invoice_update() {

   $invoiceId = ($_GET['invoiceId']);
				
			if (empty($_POST['invoice_description']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a description.</h5>";
			} else {
				$invoice_description = trim(strip_tags($_POST['invoice_description']));
				$problem = FALSE;
			}

			if (empty($_POST['invoice_name']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a Name.</h5>";
			} else {
				$invoice_name = trim(strip_tags($_POST['invoice_name']));
				$problem = FALSE;
			}

			if (!$problem) {


			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$invoicesUpdateQuery = "UPDATE {$invoiceTable} 
								SET invoice_description='$invoice_description',
									invoice_name='$invoice_name'
								WHERE invoice_seq='$invoiceId'"; 

				if ((@mysql_query($invoicesUpdateQuery, $dbc)) == TRUE)  {

								
					$invUpdated = TRUE;
					header('Refresh: 0; url=?invUpdated='.$invUpdated);

					} else { 
							print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $invoiceInsertQuery . '</p>';
				}
		
			}
}//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


//***Connection Delete Confirmed***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function invoice_deleteConfirmed() {

   $invoiceId = ($_GET['invoiceId']);

	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

	$invDeleteQuery = "DELETE FROM $invoiceTable WHERE invoice_seq=$invoiceId";

	if((@mysql_query($invDeleteQuery, $dbc) == TRUE)) {
					
		$invDeleted = TRUE;
		header('Refresh: 0; url=?invDeleted='.$invDeleted);

	} else {
		print mysql_error($dbc)."$deleteQuery, $invoiceId";
	}

} // End of invoice


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Display Open Invoices***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function invoice_displayOpen() {
				
		// Query to display Temp Open Invoices

				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 

				$invResult = mysql_query("SELECT a.invoice_seq,
												a.invoice_dateTime,
												a.invoice_subtotal,
												a.invoice_tax,
												a.invoice_total,
												b.vendors_name
										FROM $invoiceTable a, 
												$vendorsTable b 
											WHERE a.vendors_seq=b.vendors_seq");
					if (!$invResult) {
						die('Query to show fields from table failed --- '.mysql_error($dbc));
					} 
					



		// Displays the Table

						echo "<h4>Open Invoices</h4>";

						echo "<table border='1'><tr>";

						echo "<th>Invoice #</th>";
						echo "<th>Create Date</th>";
						echo "<th>Subtotal</th>";
						echo "<th>Tax</th>";
						echo "<th>Total</th>";
						echo "<th>Vendor</th>";
						echo "<th>Edit</th>";
						echo "<th>Delete</th>";

						echo "</tr>\n";


						include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
						include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 



						if (!($invResult) == NULL) {
							
							while($invRow = mysql_fetch_row($invResult))
							{
								 echo "<tr>";

									// foreach($CON_row as $CON_cell)
									echo "<td>$invRow[0]</td>";
									echo "<td>$invRow[1]</td>";
									echo '<td><form method="POST" action="?invoiceId='.$invRow[2].'"><input name="invoice_edit" type="submit" value="Edit"></input></form></td>';
									echo '<td><form method="POST" action="?invoiceId='.$invRow[2].'"><input name="invoice_delete" type="submit" value="Delete"></input></form></td>';
									echo "</tr>\n";
				
							}


							mysql_free_result($invResult);	
						}

						echo "</table>";
						
} //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Display Closed Invoices***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function invoice_displayClosed() {

		// Query to display table

				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 

				$invResult = mysql_query("SELECT a.invoice_seq,
												a.invoice_dateTime,
												a.invoice_subtotal,
												a.invoice_tax,
												a.invoice_total,
												b.vendors_name
										FROM $invoiceTable a, 
												$vendorsTable b 
											WHERE a.vendors_seq=b.vendors_seq
											AND a.invoice_closed=1");
					if (!$invResult) {
						die('Query to show fields from table failed --- '.mysql_error($dbc));
					} 
					



		// Displays the Table

						echo "<h4>Closed Invoices</h4>";

						echo "<table border='1'><tr>";

						echo "<th>Invoice #</th>";
						echo "<th>Create Date</th>";
						echo "<th>Subtotal</th>";
						echo "<th>Tax</th>";
						echo "<th>Total</th>";
						echo "<th>Vendor</th>";
						echo "<th>Edit</th>";
						echo "<th>Delete</th>";

						echo "</tr>\n";


						include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
						include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 



						if (!($invResult) == NULL) {
							
							while($invRow = mysql_fetch_row($invResult))
							{
								 echo "<tr>";

									// foreach($CON_row as $CON_cell)
									echo "<td>$invRow[0]</td>";
									echo "<td>$invRow[1]</td>";
									echo '<td><form method="POST" action="?invoiceId='.$invRow[2].'"><input name="invoice_edit" type="submit" value="Edit"></input></form></td>';
									echo '<td><form method="POST" action="?invoiceId='.$invRow[2].'"><input name="invoice_delete" type="submit" value="Delete"></input></form></td>';
									echo "</tr>\n";
				
							}


							mysql_free_result($invResult);	
						}

						echo "</table>";
						
				
						
}
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	




//***invoice Main Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function invoice() {

   $invoiceId = ($_GET['invoiceId']);

////////////////////***GET***///////////////////////////////////
// If GET is TRUE Print the appropiate Status

	if(($_GET['invAdded']) == TRUE) {
		print '<h3 style="color:red;" >invoice Added</h3>'; 
			
	}
	
	if(($_GET['invDeleted']) == TRUE) {
		print '<h3 style="color:red;" >invoice Deleted</h3>'; 
			
	}

	if(($_GET['invUpdated']) == TRUE) {
		print '<h3 style="color:red;" >invoice Updated</h3>'; 
			
	}

///////////////////****POST****/////////////////////////////////

		// Check for Post Requests otherwise display Record, Open, and Closed Invoices
		
		if ((isset($_POST['invoice_cancel'])) or
			(isset($_POST['invoice_choice'])) or
			(isset($_POST['invoice_deleteConfirmed'])) or
			(isset($_POST['invoice_update'])) or
			(isset($_POST['invoice_import'])) or
			(isset($_POST['invoice_delete'])) or
			(isset($_POST['invoice_saveImportedItems'])) or
			(isset($_POST['invoice_edit'])))	{
					
		
		// Check for Cancel - Refresh back to main function
			if(isset($_POST['invoice_cancel'])) {
	
				header('Refresh: 0;');
				}

		// Check for a New Account - Fucntion defined above

			if (isset($_POST['invoice_choice'])) {
	
				invoice_new();
	
				}

		// Check for a confirmed delete to delete the row

			if (isset($_POST['invoice_deleteConfirmed'])) {
			
				invoice_deleteConfirmed();

			}

		// Check for an update - Function defined above


			if (isset($_POST['invoice_update'])) {
			
				invoice_update();

			}
			
		// Check for Invoice Import - Function defined above


			if (isset($_POST['invoice_import'])) {
			
				invoice_import();

			}
			
		// Check for Invoice Import - Function defined above
			
			if (isset($_POST['invoice_saveImportedItems'])) {
				
				invoice_saveImportedItems();
				
				
				}


		// Check for a delete request - This confirms deletion and send to delete form

			if (isset($_POST['invoice_delete'])) {

				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$invAcctQuery = "SELECT invoice_name,
							invoice_description
							FROM $invoiceTable
							WHERE invoice_seq=$invoiceId";

				$invAcctResult = mysql_query($invAcctQuery);
					

				if (!$invAcctResult) {
					die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$invAcctQuery);
				} 

				$invAcctView = mysql_fetch_array($invAcctResult);

				print "Are you SURE you want to delete $invAcctView[0]?";
				echo'<p><form action="?invoiceId='.$invoiceId.'" method="post" >
					<input type="submit" name="invoice_cancel" id="invoice_cancel" value="Cancel" />
					<input type="submit" name="invoice_deleteConfirmed" id="invoice_deleteConfirmed" value="Delete '.$invAcctView[0].'" />
					</form></p>';

			}



		// If there is not an edit request display a request form

			if (isset($_POST['invoice_edit'])) {


				invoice_edit();

				}
		}  else {

				invoice_record();
				invoice_displayOpen();
				invoice_displayClosed();

				}
				

}// End invoice Function

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

add_shortcode( 'restaurateur_invoice', 'invoice' );
?>
