<?php
/*
Plugin Name: Restaurateur Inc. - Vendors
Plugin URI: http://restaurateurinc.com
Description: Restaurant Costing Program
Version: 1.0
Author: admin@loiuedogg.com
Author URI: http://louiedogg.com
*/
//***Record Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function vendors_record() {

	echo '<form method="POST" action="" >
		<h5>Name:<input type="text" name="vendors_name" id="vendors_name" /></h5>
		<h5>Email:<input type="text" name="vendors_email" id="vendors_email" /></h5>
		<h5>Phone:<input type="text" name="vendors_phoneNum1" id="vendors_phoneNum1" /></h5>
		<h5>Address Line 1:<input type="text" name="vendors_address1" id="vendors_address1" /></h5>
		<h5>Address Line 2:<input type="text" name="vendors_address2" id="vendors_address2" /></h5>
		<h5>City:<input type="text" name="vendors_city" id="vendors_city" /></h5>
		<h5>State:<input type="text" name="vendors_state" id="vendors_state" /></h5>
		<h5>Zip Code:<input type="text" name="vendors_zipCode" id="vendors_zipCode" /></h5>
		<h5>Country:<input type="text" name="vendors_country" id="vendors_country" /></h5>
		<h5>Contact:<input type="text" name="vendors_contact" id="vendors_contact" /></h5>
		<h5>Description:<input type="text" name="vendors_description" id="vendors_description" /></h5>
		
		<input type="submit" name="vendors_new" id="vendors_new" value="Add New" />
		</form>
		<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Edit Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function vendors_edit() {

   $vendors_id = ($_GET['vendors_id']);

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');


			
		$vendEditQuery = "SELECT vendors_name,
					vendors_description,
					vendors_email,
					vendors_phoneNum1,
					vendors_address1,
					vendors_address2,
					vendors_city,
					vendors_state,
					vendors_zipCode,
					vendors_country,
					vendors_contact
					FROM $vendorsTable 
					WHERE vendors_seq=$vendors_id";
		$vendEditResult = mysql_query($vendEditQuery);
			

		if (!$vendEditResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$vendEditQuery);
		} 

		$vendEditView = mysql_fetch_array($vendEditResult);


		echo '<form method="POST" action="?vendors_id='.$vendEditView[2].'">
			<h5>Name:<input type="text" name="vendors_name" id="vendors_name" value="'.$vendEditView[0].'" /></h5>
			<h5>Email:<input type="text" name="vendors_email" id="vendors_email" value="'.$vendEditView[2].'" /></h5>
			<h5>Phone:<input type="text" name="vendors_phoneNum1" id="vendors_phoneNum1" value="'.$vendEditView[3].'" /></h5>
			<h5>Address Line 1:<input type="text" name="vendors_address1" id="vendors_address1" value="'.$vendEditView[4].'" /></h5>
			<h5>Address Line 2:<input type="text" name="vendors_address2" id="vendors_address2" value="'.$vendEditView[5].'" /></h5>
			<h5>City:<input type="text" name="vendors_city" id="vendors_city" value="'.$vendEditView[6].'" /></h5>
			<h5>State:<input type="text" name="vendors_state" id="vendors_state" value="'.$vendEditView[7].'" /></h5>
			<h5>Zip Code:<input type="text" name="vendors_zipCode" id="vendors_zipCode" value="'.$vendEditView[8].'" /></h5>
			<h5>Country:<input type="text" name="vendors_country" id="vendors_country" value="'.$vendEditView[9].'" /></h5>
			<h5>Contact:<input type="text" name="vendors_contact" id="vendors_contact" value="'.$vendEditView[10].'" /></h5>
			<h5>Description:<input type="text" name="vendors_description" id="vendors_description" value="'.$vendEditView[1].'" /></h5>
			<input type="submit" name="vendors_update" id="vendors_update" value="Update"/>
			</form>
			<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@




//***Insert New Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function vendors_new() {  // New Connection


			if (empty($_POST['vendors_name']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an vendors Name.</h5>';
				} else {
					$vendors_name = trim(strip_tags($_POST['vendors_name']));
					$problem = FALSE;
			}
			
			if (empty($_POST['vendors_email']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an vendors Email.</h5>';
				} else {
					$vendors_email = trim(strip_tags($_POST['vendors_email']));
					$problem = FALSE;
			}
			if (empty($_POST['vendors_phoneNum1']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an vendors phoneNum1.</h5>';
				} else {
					$vendors_phoneNum1 = trim(strip_tags($_POST['vendors_phoneNum1']));
					$problem = FALSE;
			}
			if (empty($_POST['vendors_address1']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an vendors Address 1.</h5>';
				} else {
					$vendors_address1 = trim(strip_tags($_POST['vendors_address1']));
					$problem = FALSE;
			}
			
			if (empty($_POST['vendors_city']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an vendors city.</h5>';
				} else {
					$vendors_city = trim(strip_tags($_POST['vendors_city']));
					$problem = FALSE;
			}
			
			if (empty($_POST['vendors_state']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an vendors state.</h5>';
				} else {
					$vendors_state = trim(strip_tags($_POST['vendors_state']));
					$problem = FALSE;
			}
			if (empty($_POST['vendors_zipCode']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an vendors zipCode.</h5>';
				} else {
					$vendors_zipCode = trim(strip_tags($_POST['vendors_zipCode']));
					$problem = FALSE;
			}
			if (empty($_POST['vendors_country']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an vendors country.</h5>';
				} else {
					$vendors_country = trim(strip_tags($_POST['vendors_country']));
					$problem = FALSE;
			}
			if (empty($_POST['vendors_contact']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an vendors contact.</h5>';
				} else {
					$vendors_contact = trim(strip_tags($_POST['vendors_contact']));
					$problem = FALSE;
			}

			if (!$problem) {
				
			$vendors_address2 = trim(strip_tags($_POST['vendors_address2']));			
			$vendors_description = trim(strip_tags($_POST['vendors_description']));

			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$vendorsInsertQuery = "INSERT INTO {$vendorsTable} (vendors_dateTime,
																	vendors_name,
																	vendors_description,
																	vendors_email,
																	vendors_phoneNum1,
																	vendors_address1,
																	vendors_address2,
																	vendors_city,
																	vendors_state,
																	vendors_zipCode,
																	vendors_country,
																	vendors_contact) 
															VALUES(now(),
																'$vendors_name',
																'$vendors_description',
																'$vendors_email',
																'$vendors_phoneNum1',
																'$vendors_address1',
																'$vendors_address2',
																'$vendors_city',
																'$vendors_state',
																'$vendors_zipCode',
																'$vendors_country',
																'$vendors_contact')"; 

				if ((@mysql_query($vendorsInsertQuery, $dbc)) == TRUE)  {
					
					$vendAdded = TRUE;
					header('Refresh: 0; url=?vendAdded='.$vendAdded);

					} else { 
						print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $vendorsInsertQuery . '</p>';
				}

			} 
	} // End Funtion New Connection



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


//***Update Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


function vendors_update() {

   $vendors_id = ($_GET['vendors_id']);
				
			if (empty($_POST['vendors_description']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a description.</h5>";
			} else {
				$vendors_description = trim(strip_tags($_POST['vendors_description']));
				$problem = FALSE;
			}

			if (empty($_POST['vendors_name']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a Name.</h5>";
			} else {
				$vendors_name = trim(strip_tags($_POST['vendors_name']));
				$problem = FALSE;
			}
			if (empty($_POST['vendors_phoneNum1']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a phoneNum1.</h5>";
			} else {
				$vendors_phoneNum1 = trim(strip_tags($_POST['vendors_phoneNum1']));
				$problem = FALSE;
			}
			
			if (empty($_POST['vendors_email']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a email.</h5>";
			} else {
				$vendors_email = trim(strip_tags($_POST['vendors_email']));
				$problem = FALSE;
			}
			if (empty($_POST['vendors_address1']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a address1.</h5>";
			} else {
				$vendors_address1 = trim(strip_tags($_POST['vendors_address1']));
				$problem = FALSE;
			}
			if (empty($_POST['vendors_city']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a city.</h5>";
			} else {
				$vendors_city = trim(strip_tags($_POST['vendors_city']));
				$problem = FALSE;
			}
			if (empty($_POST['vendors_state']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a state.</h5>";
			} else {
				$vendors_state = trim(strip_tags($_POST['vendors_state']));
				$problem = FALSE;
			}
			if (empty($_POST['vendors_zipCode']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a zipCode.</h5>";
			} else {
				$vendors_zipCode = trim(strip_tags($_POST['vendors_zipCode']));
				$problem = FALSE;
			}
			if (empty($_POST['vendors_country']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a country.</h5>";
			} else {
				$vendors_country = trim(strip_tags($_POST['vendors_country']));
				$problem = FALSE;
			}
			if (empty($_POST['vendors_contact']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a contact.</h5>";
			} else {
				$vendors_contact = trim(strip_tags($_POST['vendors_contact']));
				$problem = FALSE;
			}
			


			if (!$problem) {
				
			$vendors_description = trim(strip_tags($_POST['vendors_description']));
			$vendors_address2 = trim(strip_tags($_POST['vendors_address2']));



			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$vendorssUpdateQuery = "UPDATE {$vendorsTable} 
								SET vendors_description='$vendors_description',
									vendors_name='$vendors_name',
									vendors_email='$vendors_email',
									vendors_phoneNum1='$vendors_phoneNum1',
									vendors_address1='$vendors_address1',
									vendors_address2='$vendors_address2',
									vendors_city='$vendors_city',
									vendors_state='$vendors_state',
									vendors_zipCode='$vendors_zipCode',
									vendors_country='$vendors_country',
									vendors_contact='$vendors_contact'
								WHERE vendors_seq='$vendors_id'"; 

				if ((@mysql_query($vendorssUpdateQuery, $dbc)) == TRUE)  {

								
					$vendUpdated = TRUE;
					header('Refresh: 0; url=?vendUpdated='.$vendUpdated);

					} else { 
							print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $vendorsInsertQuery . '</p>';
				}
		
			}
}// End of Function



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


//***Connection Delete Confirmed***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function vendors_deleteConfirmed() {

   $vendors_id = ($_GET['vendors_id']);

	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

	$vendDeleteQuery = "DELETE FROM $vendorsTable WHERE vendors_seq=$vendors_id";

	if((@mysql_query($vendDeleteQuery, $dbc) == TRUE)) {
					
		$vendDeleted = TRUE;
		header('Refresh: 0; url=?vendDeleted='.$vendDeleted);

	} else {
		print mysql_error($dbc)."$deleteQuery, $vendors_id";
	}

} // End of vendors


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@





//***vendors Main Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function vendors() {

   $vendors_id = ($_GET['vendors_id']);


// If GET is TRUE Print the appropiate Status

	if(($_GET['vendAdded']) == TRUE) {
		print '<h3 style="color:red;" >vendors Added</h3>'; 
			
	}
	
	if(($_GET['vendDeleted']) == TRUE) {
		print '<h3 style="color:red;" >vendors Deleted</h3>'; 
			
	}

	if(($_GET['vendUpdated']) == TRUE) {
		print '<h3 style="color:red;" >vendors Updated</h3>'; 
			
	}


// Check for Cancel - Refresh back to main function
	if(isset($_POST['vendors_cancel'])) {
	
		header('Refresh: 0;');
	}

// Check for a New Account - Fucntion defined above

	if (isset($_POST['vendors_new'])) {
	
		vendors_new();

	}

// Check for a confirmed delete to delete the row

	if (isset($_POST['vendors_deleteConfirmed'])) {
	
		vendors_deleteConfirmed();

	}

// Check for an update - Function defined above


	if (isset($_POST['vendors_update'])) {
	
		vendors_update();

	}

// Check for a delete request - This confirms deletion and send to delete form

	if (isset($_POST['vendors_delete'])) {

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

		$vendAcctQuery = "SELECT vendors_name,
					vendors_description
					FROM $vendorsTable
					WHERE vendors_seq=$vendors_id";

		$vendAcctResult = mysql_query($vendAcctQuery);
			

		if (!$vendAcctResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$vendAcctQuery);
		} 

		$vendAcctView = mysql_fetch_array($vendAcctResult);

		print "Are you SURE you want to delete $vendAcctView[0]?";
		echo'<p><form action="?vendors_id='.$vendors_id.'" method="post" >
			<input type="submit" name="vendors_cancel" id="vendors_cancel" value="Cancel" />
			<input type="submit" name="vendors_deleteConfirmed" id="vendors_deleteConfirmed" value="Delete '.$vendAcctView[0].'" />
			</form></p>';

	}



// If there is not an edit request display a request form

	if (isset($_POST['vendors_edit'])) {


		vendors_edit();

		} else {

		vendors_record();

	}






// Query to display table

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 

		$vendResult = mysql_query("SELECT vendors_name,  
						vendors_description,
						vendors_seq 
						FROM $vendorsTable");
			if (!$vendResult) {
				die('Query to show fields from table failed --- '.mysql_error($dbc));
			} 
			



// Displays the Table

				echo "<table border='1'><tr>";

				echo "<th>Status Name</th>";
				echo "<th>Description</th>";
				echo "<th>Edit</th>";
				echo "<th>Delete</th>";

				echo "</tr>\n";


				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 



				if (!($vendResult) == NULL) {
					
					while($vendRow = mysql_fetch_row($vendResult))
					{
  	 					 echo "<tr>";

   							// foreach($CON_row as $CON_cell)
							echo "<td>$vendRow[0]</td>";
							echo "<td>$vendRow[1]</td>";
							echo '<td><form method="POST" action="?vendors_id='.$vendRow[2].'"><input name="vendors_edit" type="submit" value="Edit"></input></form></td>';
							echo '<td><form method="POST" action="?vendors_id='.$vendRow[2].'"><input name="vendors_delete" type="submit" value="Delete"></input></form></td>';
    						echo "</tr>\n";
		
					}


					mysql_free_result($vendResult);	
				}

				echo "</table>";

}// End vendors

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

add_shortcode( 'restaurateur_vendors', 'vendors' );
?>
