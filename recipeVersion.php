<?php
/*
Plugin Name: Restaurateur Inc. - Recipe Verison
Plugin URI: http://restaurateurinc.com
Description: Restaurant Costing Program
Version: 1.0
Author: admin@loiuedogg.com
Author URI: http://louiedogg.com
*/
//***Record Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function recipeVersion_record() {

	echo '<form method="POST" action="" >
		<h5>Name:<input type="text" name="recipeVersion_name" id="recipeVersion_name" /></h5>
		<h5>Description:<input type="text" name="recipeVersion_description" id="recipeVersion_description" /></h5>
		<input type="submit" name="recipeVersion_new" id="recipeVersion_new" value="Add New" />
		</form>
		<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Edit Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function recipeVersion_edit() {

   $recipeVersion_id = ($_GET['recipeVersion_id']);

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');


			
		$rvEditQuery = "SELECT recipeVersion_name,
					recipeVersion_description,
					recipeVersion_seq
					FROM $recipeVersionTable 
					WHERE recipeVersion_seq=$recipeVersion_id";
		$rvEditResult = mysql_query($rvEditQuery);
			

		if (!$rvEditResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$rvEditQuery);
		} 

		$rvEditView = mysql_fetch_array($rvEditResult);


		echo '<form method="POST" action="?recipeVersion_id='.$rvEditView[2].'">
			<h5>Name:<input type="text" name="recipeVersion_name" id="recipeVersion_name" value="'.$rvEditView[0].'" /></h5>
			<h5>Description:<input type="text" name="recipeVersion_description" id="recipeVersion_description" value="'.$rvEditView[1].'" /></h5>
			<input type="submit" name="recipeVersion_update" id="recipeVersion_update" value="Update"/>
			</form>
			<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@




//***Insert New Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function recipeVersion_new() {  // New Connection


			if (empty($_POST['recipeVersion_name']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an recipeVersion Name.</h5>';
				} else {
					$recipeVersion_name = trim(strip_tags($_POST['recipeVersion_name']));
					$problem = FALSE;
			}

			if (empty($_POST['recipeVersion_description']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an Account.</h5>';
				} else {
					$recipeVersion_description = trim(strip_tags($_POST['recipeVersion_description']));
					$problem = FALSE;
			}


			if (!$problem) {

			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$recipeVersionInsertQuery = "INSERT INTO {$recipeVersionTable} (recipeVersion_dateTime,
												recipeVersion_description,
												recipeVersion_name) 
												VALUES(now(),
												'$recipeVersion_description',
												'$recipeVersion_name')"; 

				if ((@mysql_query($recipeVersionInsertQuery, $dbc)) == TRUE)  {
					
					$rvAdded = TRUE;
					header('Refresh: 0; url=?rvAdded='.$rvAdded);

					} else { 
						print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $recipeVersionInsertQuery . '</p>';
				}

			} 
	} // End Funtion New Connection



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


//***Update Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


function recipeVersion_update() {

   $recipeVersion_id = ($_GET['recipeVersion_id']);
				
			if (empty($_POST['recipeVersion_description']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a description.</h5>";
			} else {
				$recipeVersion_description = trim(strip_tags($_POST['recipeVersion_description']));
				$problem = FALSE;
			}

			if (empty($_POST['recipeVersion_name']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a Name.</h5>";
			} else {
				$recipeVersion_name = trim(strip_tags($_POST['recipeVersion_name']));
				$problem = FALSE;
			}

			if (!$problem) {


			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$recipeVersionsUpdateQuery = "UPDATE {$recipeVersionTable} 
								SET recipeVersion_description='$recipeVersion_description',
									recipeVersion_name='$recipeVersion_name'
								WHERE recipeVersion_seq='$recipeVersion_id'"; 

				if ((@mysql_query($recipeVersionsUpdateQuery, $dbc)) == TRUE)  {

								
					$rvUpdated = TRUE;
					header('Refresh: 0; url=?rvUpdated='.$rvUpdated);

					} else { 
							print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $recipeVersionInsertQuery . '</p>';
				}
		
			}
}// End of Function



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


//***Connection Delete Confirmed***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function recipeVersion_deleteConfirmed() {

   $recipeVersion_id = ($_GET['recipeVersion_id']);

	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

	$rvDeleteQuery = "DELETE FROM $recipeVersionTable WHERE recipeVersion_seq=$recipeVersion_id";

	if((@mysql_query($rvDeleteQuery, $dbc) == TRUE)) {
					
		$rvDeleted = TRUE;
		header('Refresh: 0; url=?rvDeleted='.$rvDeleted);

	} else {
		print mysql_error($dbc)."$deleteQuery, $recipeVersion_id";
	}

} // End of recipeVersion


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@





//***recipeVersion Main Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function recipeVersion() {

   $recipeVersion_id = ($_GET['recipeVersion_id']);


// If GET is TRUE Print the appropiate Status

	if(($_GET['rvAdded']) == TRUE) {
		print '<h3 style="color:red;" >recipeVersion Added</h3>'; 
			
	}
	
	if(($_GET['rvDeleted']) == TRUE) {
		print '<h3 style="color:red;" >recipeVersion Deleted</h3>'; 
			
	}

	if(($_GET['rvUpdated']) == TRUE) {
		print '<h3 style="color:red;" >recipeVersion Updated</h3>'; 
			
	}


// Check for Cancel - Refresh back to main function
	if(isset($_POST['recipeVersion_cancel'])) {
	
		header('Refresh: 0;');
	}

// Check for a New Account - Fucntion defined above

	if (isset($_POST['recipeVersion_new'])) {
	
		recipeVersion_new();

	}

// Check for a confirmed delete to delete the row

	if (isset($_POST['recipeVersion_deleteConfirmed'])) {
	
		recipeVersion_deleteConfirmed();

	}

// Check for an update - Function defined above


	if (isset($_POST['recipeVersion_update'])) {
	
		recipeVersion_update();

	}

// Check for a delete request - This confirms deletion and send to delete form

	if (isset($_POST['recipeVersion_delete'])) {

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

		$rvAcctQuery = "SELECT recipeVersion_name,
					recipeVersion_description
					FROM $recipeVersionTable
					WHERE recipeVersion_seq=$recipeVersion_id";

		$rvAcctResult = mysql_query($rvAcctQuery);
			

		if (!$rvAcctResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$rvAcctQuery);
		} 

		$rvAcctView = mysql_fetch_array($rvAcctResult);

		print "Are you SURE you want to delete $rvAcctView[0]?";
		echo'<p><form action="?recipeVersion_id='.$recipeVersion_id.'" method="post" >
			<input type="submit" name="recipeVersion_cancel" id="recipeVersion_cancel" value="Cancel" />
			<input type="submit" name="recipeVersion_deleteConfirmed" id="recipeVersion_deleteConfirmed" value="Delete '.$rvAcctView[0].'" />
			</form></p>';

	}



// If there is not an edit request display a request form

	if (isset($_POST['recipeVersion_edit'])) {


		recipeVersion_edit();

		} else {

		recipeVersion_record();

	}






// Query to display table

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 

		$rvResult = mysql_query("SELECT recipeVersion_name,  
						recipeVersion_description,
						recipeVersion_seq 
						FROM $recipeVersionTable");
			if (!$rvResult) {
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



				if (!($rvResult) == NULL) {
					
					while($rvRow = mysql_fetch_row($rvResult))
					{
  	 					 echo "<tr>";

   							// foreach($CON_row as $CON_cell)
							echo "<td>$rvRow[0]</td>";
							echo "<td>$rvRow[1]</td>";
							echo '<td><form method="POST" action="?recipeVersion_id='.$rvRow[2].'"><input name="recipeVersion_edit" type="submit" value="Edit"></input></form></td>';
							echo '<td><form method="POST" action="?recipeVersion_id='.$rvRow[2].'"><input name="recipeVersion_delete" type="submit" value="Delete"></input></form></td>';
    						echo "</tr>\n";
		
					}


					mysql_free_result($rvResult);	
				}

				echo "</table>";

}// End recipeVersion

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

add_shortcode( 'restaurateur_recipeVersion', 'recipeVersion' );
?>
