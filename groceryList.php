<?php
/*
Plugin Name: Restaurateur Inc. - Grocery List
Plugin URI: http://restaurateurinc.com
Description: Restaurant Costing Program
Version: 1.0
Author: admin@loiuedogg.com
Author URI: http://louiedogg.com
*/
//***Record Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function groceryList_record() {

	echo '<form method="POST" action="" >
		<h5>Name:<input type="text" name="groceryList_name" id="groceryList_name" /></h5>
		<h5>Description:<input type="text" name="groceryList_description" id="groceryList_description" /></h5>
		<h5>Unit of Measurement:
					<select name="uom_seq">
					<option></option>';
					
							
				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');	
			
				$uomQuery = mysql_query("SELECT uom_seq, uom_name FROM {$uomTable}");

					while ($uomResult = mysql_fetch_array($uomQuery)) {

						echo '<option value="'.$uomResult[0].'">'.$uomResult[1].'</option>'; 
												
						}

			echo '</select>
					</h5>
		<input type="submit" name="groceryList_new" id="groceryList_new" value="Add New" />
		</form>
		<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Edit Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function groceryList_edit() {

   $groceryList_id = ($_GET['groceryList_id']);

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');


			
		$glEditQuery = "SELECT groceryList_name,
					groceryList_description,
					groceryList_seq,
					uom_seq
					FROM $groceryListTable 
					WHERE groceryList_seq=$groceryList_id";
		$glEditResult = mysql_query($glEditQuery);
			

		if (!$glEditResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$glEditQuery);
		} 

		$glEditView = mysql_fetch_array($glEditResult);


		echo '<form method="POST" action="?groceryList_id='.$glEditView[2].'">
			<h5>Name:<input type="text" name="groceryList_name" id="groceryList_name" value="'.$glEditView[0].'" /></h5>
			<h5>Description:<input type="text" name="groceryList_description" id="groceryList_description" value="'.$glEditView[1].'" /></h5>
			
			<h5>Unit of Measurement</h5>

						 <h5><select name="uom_seq">';

							$queryQ2 = mysql_query("SELECT uom_seq, uom_name FROM {$uomTable} WHERE uom_seq !='{$glEditView[3]}'");

							$queryQ3 = mysql_query("SELECT uom_seq, uom_name FROM {$uomTable} WHERE uom_seq ='{$glEditView[3]}'");

							while ($Q3= mysql_fetch_assoc($queryQ3)) {
				
								echo  '<option value='.$Q3['uom_seq'].'>'.$Q3['uom_name'].'</option>';

							}

							while ($Q2 = mysql_fetch_assoc($queryQ2)) {
					
							echo  '<option value='.$Q2['uom_seq'].'>'.$Q2['uom_name'].'</option>';

		 					 }

						echo '</select></h5>
			
			
			
			
			<input type="submit" name="groceryList_update" id="groceryList_update" value="Update"/>
			</form>
			<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@




//***Insert New Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function groceryList_new() {  // New Connection


			if (empty($_POST['groceryList_name']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an groceryList Name.</h5>';
				} else {
					$groceryList_name = trim(strip_tags($_POST['groceryList_name']));
					$problem = FALSE;
			}

			if (empty($_POST['groceryList_description']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an Account.</h5>';
				} else {
					$groceryList_description = trim(strip_tags($_POST['groceryList_description']));
					$problem = FALSE;
			}
			
			if (empty($_POST['uom_seq']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please select a Unit of Measurement.</h5>';
				} else {
					$uom_seq = trim(strip_tags($_POST['uom_seq']));
					$problem = FALSE;
			}	
			


			if (!$problem) {

			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$groceryListInsertQuery = "INSERT INTO {$groceryListTable} (groceryList_dateTime,
												groceryList_description,
												groceryList_name,
												uom_seq) 
												VALUES(now(),
												'$groceryList_description',
												'$groceryList_name',
												'$uom_seq')"; 

				if ((@mysql_query($groceryListInsertQuery, $dbc)) == TRUE)  {
					
					$glAdded = TRUE;
					header('Refresh: 0; url=?glAdded='.$glAdded);

					} else { 
						print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $groceryListInsertQuery . '</p>';
				}

			} 
	} // End Funtion New Connection



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


//***Update Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


function groceryList_update() {

   $groceryList_id = ($_GET['groceryList_id']);
				
			if (empty($_POST['groceryList_description']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a description.</h5>";
			} else {
				$groceryList_description = trim(strip_tags($_POST['groceryList_description']));
				$problem = FALSE;
			}

			if (empty($_POST['groceryList_name']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a Name.</h5>";
			} else {
				$groceryList_name = trim(strip_tags($_POST['groceryList_name']));
				$problem = FALSE;
			}
				
			if (empty($_POST['uom_seq']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please select a Unit of Measurement.</h5>';
				} else {
					$uom_seq = trim(strip_tags($_POST['uom_seq']));
					$problem = FALSE;
			}	


			if (!$problem) {


			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$groceryListsUpdateQuery = "UPDATE {$groceryListTable} 
								SET groceryList_description='$groceryList_description',
									groceryList_name='$groceryList_name',
									uom_seq='$uom_seq'
								WHERE groceryList_seq='$groceryList_id'"; 

				if ((@mysql_query($groceryListsUpdateQuery, $dbc)) == TRUE)  {

								
					$glUpdated = TRUE;
					header('Refresh: 0; url=?glUpdated='.$glUpdated);

					} else { 
							print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $groceryListInsertQuery . '</p>';
				}
		
			}
}//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


//***Connection Delete Confirmed***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function groceryList_deleteConfirmed() {

   $groceryList_id = ($_GET['groceryList_id']);

	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

	$glDeleteQuery = "DELETE FROM $groceryListTable WHERE groceryList_seq=$groceryList_id";

	if((@mysql_query($glDeleteQuery, $dbc) == TRUE)) {
					
		$glDeleted = TRUE;
		header('Refresh: 0; url=?glDeleted='.$glDeleted);

	} else {
		print mysql_error($dbc)."$deleteQuery, $groceryList_id";
	}

} // End of groceryList


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@





//***groceryList Main Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function groceryList() {

   $groceryList_id = ($_GET['groceryList_id']);


// If GET is TRUE Print the appropiate Status

	if(($_GET['glAdded']) == TRUE) {
		print '<h3 style="color:red;" >groceryList Added</h3>'; 
			
	}
	
	if(($_GET['glDeleted']) == TRUE) {
		print '<h3 style="color:red;" >groceryList Deleted</h3>'; 
			
	}

	if(($_GET['glUpdated']) == TRUE) {
		print '<h3 style="color:red;" >groceryList Updated</h3>'; 
			
	}


// Check for Cancel - Refresh back to main function
	if(isset($_POST['groceryList_cancel'])) {
	
		header('Refresh: 0;');
	}

// Check for a New Account - Fucntion defined above

	if (isset($_POST['groceryList_new'])) {
	
		groceryList_new();

	}

// Check for a confirmed delete to delete the row

	if (isset($_POST['groceryList_deleteConfirmed'])) {
	
		groceryList_deleteConfirmed();

	}

// Check for an update - Function defined above


	if (isset($_POST['groceryList_update'])) {
	
		groceryList_update();

	}

// Check for a delete request - This confirms deletion and send to delete form

	if (isset($_POST['groceryList_delete'])) {

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

		$glAcctQuery = "SELECT groceryList_name,
					groceryList_description
					FROM $groceryListTable
					WHERE groceryList_seq=$groceryList_id";

		$glAcctResult = mysql_query($glAcctQuery);
			

		if (!$glAcctResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$glAcctQuery);
		} 

		$glAcctView = mysql_fetch_array($glAcctResult);

		print "Are you SURE you want to delete $glAcctView[0]?";
		echo'<p><form action="?groceryList_id='.$groceryList_id.'" method="post" >
			<input type="submit" name="groceryList_cancel" id="groceryList_cancel" value="Cancel" />
			<input type="submit" name="groceryList_deleteConfirmed" id="groceryList_deleteConfirmed" value="Delete '.$glAcctView[0].'" />
			</form></p>';

	}



// If there is not an edit request display a request form

	if (isset($_POST['groceryList_edit'])) {


		groceryList_edit();

		} else {

		groceryList_record();

	}






// Query to display table

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 

		$glResult = mysql_query("SELECT a.groceryList_name,  
						a.groceryList_description,
						a.groceryList_seq,
						b.uom_name
						FROM $groceryListTable a,
							$uomTable b
						WHERE a.uom_seq=b.uom_seq;");
			if (!$glResult) {
				die('Query to show fields from table failed --- '.mysql_error($dbc));
			} 
			



// Displays the Table

				echo "<table border='1'><tr>";

				echo "<th>Grocery</th>";
				echo "<th>Description</th>";
				echo "<th>Unit of Measurement</th>";
				echo "<th>Edit</th>";
				echo "<th>Delete</th>";

				echo "</tr>\n";


				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 



				if (!($glResult) == NULL) {
					
					while($glRow = mysql_fetch_row($glResult))
					{
  	 					 echo "<tr>";

   							// foreach($CON_row as $CON_cell)
							echo "<td>$glRow[0]</td>";
							echo "<td>$glRow[1]</td>";
							echo "<td>$glRow[3]</td>";
							echo '<td><form method="POST" action="?groceryList_id='.$glRow[2].'"><input name="groceryList_edit" type="submit" value="Edit"></input></form></td>';
							echo '<td><form method="POST" action="?groceryList_id='.$glRow[2].'"><input name="groceryList_delete" type="submit" value="Delete"></input></form></td>';
    						echo "</tr>\n";
		
					}


					mysql_free_result($glResult);	
				}

				echo "</table>";

}// End groceryList

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

add_shortcode( 'restaurateur_groceryList', 'groceryList' );
?>
