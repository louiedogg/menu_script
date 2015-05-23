<?php
/*
Plugin Name: Restaurateur Inc. - Unit of Measurement
Plugin URI: http://restaurateurinc.com
Description: Restaurant Costing Program
Version: 1.0
Author: admin@loiuedogg.com
Author URI: http://louiedogg.com
*/
//***Record Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function uom_record() {

	echo '<form method="POST" action="" >
		<h5>Name:<input type="text" name="uom_name" id="uom_name" /></h5>
		<h5>Description:<input type="text" name="uom_description" id="uom_description" /></h5>
		<input type="submit" name="uom_new" id="uom_new" value="Add New" />
		</form>
		<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Edit Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function uom_edit() {

   $uom_id = ($_GET['uom_id']);

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');


			
		$uomEditQuery = "SELECT uom_name,
					uom_description,
					uom_seq
					FROM $uomTable 
					WHERE uom_seq=$uom_id";
		$uomEditResult = mysql_query($uomEditQuery);
			

		if (!$uomEditResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$uomEditQuery);
		} 

		$uomEditView = mysql_fetch_array($uomEditResult);


		echo '<form method="POST" action="?uom_id='.$uomEditView[2].'">
			<h5>Name:<input type="text" name="uom_name" id="uom_name" value="'.$uomEditView[0].'" /></h5>
			<h5>Description:<input type="text" name="uom_description" id="uom_description" value="'.$uomEditView[1].'" /></h5>
			<input type="submit" name="uom_update" id="uom_update" value="Update"/>
			</form>
			<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@




//***Insert New Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function uom_new() {  // New Connection


			if (empty($_POST['uom_name']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an uom Name.</h5>';
				} else {
					$uom_name = trim(strip_tags($_POST['uom_name']));
					$problem = FALSE;
			}

			if (empty($_POST['uom_description']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an Account.</h5>';
				} else {
					$uom_description = trim(strip_tags($_POST['uom_description']));
					$problem = FALSE;
			}


			if (!$problem) {

			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$uomInsertQuery = "INSERT INTO {$uomTable} (uom_dateTime,
												uom_description,
												uom_name) 
												VALUES(now(),
												'$uom_description',
												'$uom_name')"; 

				if ((@mysql_query($uomInsertQuery, $dbc)) == TRUE)  {
					
					$uomAdded = TRUE;
					header('Refresh: 0; url=?uomAdded='.$uomAdded);

					} else { 
						print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $uomInsertQuery . '</p>';
				}

			} 
	} // End Funtion New Connection



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


//***Update Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


function uom_update() {

   $uom_id = ($_GET['uom_id']);
				
			if (empty($_POST['uom_description']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a description.</h5>";
			} else {
				$uom_description = trim(strip_tags($_POST['uom_description']));
				$problem = FALSE;
			}

			if (empty($_POST['uom_name']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a Name.</h5>";
			} else {
				$uom_name = trim(strip_tags($_POST['uom_name']));
				$problem = FALSE;
			}

			if (!$problem) {


			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$uomsUpdateQuery = "UPDATE {$uomTable} 
								SET uom_description='$uom_description',
									uom_name='$uom_name'
								WHERE uom_seq='$uom_id'"; 

				if ((@mysql_query($uomsUpdateQuery, $dbc)) == TRUE)  {

								
					$uomUpdated = TRUE;
					header('Refresh: 0; url=?uomUpdated='.$uomUpdated);

					} else { 
							print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $uomInsertQuery . '</p>';
				}
		
			}
}// End of Function



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


//***Connection Delete Confirmed***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function uom_deleteConfirmed() {

   $uom_id = ($_GET['uom_id']);

	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

	$uomDeleteQuery = "DELETE FROM $uomTable WHERE uom_seq=$uom_id";

	if((@mysql_query($uomDeleteQuery, $dbc) == TRUE)) {
					
		$uomDeleted = TRUE;
		header('Refresh: 0; url=?uomDeleted='.$uomDeleted);

	} else {
		print mysql_error($dbc)."$deleteQuery, $uom_id";
	}

} // End of uom


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@





//***uom Main Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function uom() {

   $uom_id = ($_GET['uom_id']);


// If GET is TRUE Print the appropiate Status

	if(($_GET['uomAdded']) == TRUE) {
		print '<h3 style="color:red;" >uom Added</h3>'; 
			
	}
	
	if(($_GET['uomDeleted']) == TRUE) {
		print '<h3 style="color:red;" >uom Deleted</h3>'; 
			
	}

	if(($_GET['uomUpdated']) == TRUE) {
		print '<h3 style="color:red;" >uom Updated</h3>'; 
			
	}


// Check for Cancel - Refresh back to main function
	if(isset($_POST['uom_cancel'])) {
	
		header('Refresh: 0;');
	}

// Check for a New Account - Fucntion defined above

	if (isset($_POST['uom_new'])) {
	
		uom_new();

	}

// Check for a confirmed delete to delete the row

	if (isset($_POST['uom_deleteConfirmed'])) {
	
		uom_deleteConfirmed();

	}

// Check for an update - Function defined above


	if (isset($_POST['uom_update'])) {
	
		uom_update();

	}

// Check for a delete request - This confirms deletion and send to delete form

	if (isset($_POST['uom_delete'])) {

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

		$uomAcctQuery = "SELECT uom_name,
					uom_description
					FROM $uomTable
					WHERE uom_seq=$uom_id";

		$uomAcctResult = mysql_query($uomAcctQuery);
			

		if (!$uomAcctResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$uomAcctQuery);
		} 

		$uomAcctView = mysql_fetch_array($uomAcctResult);

		print "Are you SURE you want to delete $uomAcctView[0]?";
		echo'<p><form action="?uom_id='.$uom_id.'" method="post" >
			<input type="submit" name="uom_cancel" id="uom_cancel" value="Cancel" />
			<input type="submit" name="uom_deleteConfirmed" id="uom_deleteConfirmed" value="Delete '.$uomAcctView[0].'" />
			</form></p>';

	}



// If there is not an edit request display a request form

	if (isset($_POST['uom_edit'])) {


		uom_edit();

		} else {

		uom_record();

	}






// Query to display table

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 

		$uomResult = mysql_query("SELECT uom_name,  
						uom_description,
						uom_seq 
						FROM $uomTable");
			if (!$uomResult) {
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



				if (!($uomResult) == NULL) {
					
					while($uomRow = mysql_fetch_row($uomResult))
					{
  	 					 echo "<tr>";

   							// foreach($CON_row as $CON_cell)
							echo "<td>$uomRow[0]</td>";
							echo "<td>$uomRow[1]</td>";
							echo '<td><form method="POST" action="?uom_id='.$uomRow[2].'"><input name="uom_edit" type="submit" value="Edit"></input></form></td>';
							echo '<td><form method="POST" action="?uom_id='.$uomRow[2].'"><input name="uom_delete" type="submit" value="Delete"></input></form></td>';
    						echo "</tr>\n";
		
					}


					mysql_free_result($uomResult);	
				}

				echo "</table>";

}// End uom

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

add_shortcode( 'restaurateur_uom', 'uom' );
?>
