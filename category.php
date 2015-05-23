<?php
/*
Plugin Name: Restaurateur Inc. -Categories
Plugin URI: http://restaurateurinc.com
Description: Restaurant Costing Program
Version: 1.0
Author: admin@loiuedogg.com
Author URI: http://louiedogg.com
*/
//***Record Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function category_record() {

	echo '<form method="POST" action="" >
		<h5>Name:<input type="text" name="category_name" id="category_name" /></h5>
		<h5>Description:<input type="text" name="category_description" id="category_description" /></h5>
		<input type="submit" name="category_new" id="category_new" value="Add New" />
		</form>
		<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Edit Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function category_edit() {

   $category_id = ($_GET['category_id']);

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');


			
		$catEditQuery = "SELECT category_name,
					category_description,
					category_seq
					FROM $categoryTable 
					WHERE category_seq=$category_id";
		$catEditResult = mysql_query($catEditQuery);
			

		if (!$catEditResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$catEditQuery);
		} 

		$catEditView = mysql_fetch_array($catEditResult);


		echo '<form method="POST" action="?category_id='.$catEditView[2].'">
			<h5>Name:<input type="text" name="category_name" id="category_name" value="'.$catEditView[0].'" /></h5>
			<h5>Description:<input type="text" name="category_description" id="category_description" value="'.$catEditView[1].'" /></h5>
			<input type="submit" name="category_update" id="category_update" value="Update"/>
			</form>
			<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@




//***Insert New Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function category_new() {  // New Connection


			if (empty($_POST['category_name']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an Category Name.</h5>';
				} else {
					$category_name = trim(strip_tags($_POST['category_name']));
					$problem = FALSE;
			}

			if (empty($_POST['category_description']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an Account.</h5>';
				} else {
					$category_description = trim(strip_tags($_POST['category_description']));
					$problem = FALSE;
			}


			if (!$problem) {

			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$categoryInsertQuery = "INSERT INTO {$categoryTable} (category_dateTime,
												category_description,
												category_name) 
												VALUES(now(),
												'$category_description',
												'$category_name')"; 

				if ((@mysql_query($categoryInsertQuery, $dbc)) == TRUE)  {
					
					$catAdded = TRUE;
					header('Refresh: 0; url=?catAdded='.$catAdded);

					} else { 
						print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $categoryInsertQuery . '</p>';
				}

			} 
	} // End Funtion New Connection



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


//***Update Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


function category_update() {

   $category_id = ($_GET['category_id']);
				
			if (empty($_POST['category_description']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a description.</h5>";
			} else {
				$category_description = trim(strip_tags($_POST['category_description']));
				$problem = FALSE;
			}

			if (empty($_POST['category_name']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a Name.</h5>";
			} else {
				$category_name = trim(strip_tags($_POST['category_name']));
				$problem = FALSE;
			}

			if (!$problem) {


			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$categorysUpdateQuery = "UPDATE {$categoryTable} 
								SET category_description='$category_description',
									category_name='$category_name'
								WHERE category_seq='$category_id'"; 

				if ((@mysql_query($categorysUpdateQuery, $dbc)) == TRUE)  {

								
					$catUpdated = TRUE;
					header('Refresh: 0; url=?catUpdated='.$catUpdated);

					} else { 
							print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $categoryInsertQuery . '</p>';
				}
		
			}
}//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


//***Connection Delete Confirmed***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function category_deleteConfirmed() {

   $category_id = ($_GET['category_id']);

	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

	$catDeleteQuery = "DELETE FROM $categoryTable WHERE category_seq=$category_id";

	if((@mysql_query($catDeleteQuery, $dbc) == TRUE)) {
					
		$catDeleted = TRUE;
		header('Refresh: 0; url=?catDeleted='.$catDeleted);

	} else {
		print mysql_error($dbc)."$deleteQuery, $category_id";
	}

} // End of category


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@





//***Category Main Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function category() {

   $category_id = ($_GET['category_id']);


// If GET is TRUE Print the appropiate Status

	if(($_GET['catAdded']) == TRUE) {
		print '<h3 style="color:red;" >Category Added</h3>'; 
			
	}
	
	if(($_GET['catDeleted']) == TRUE) {
		print '<h3 style="color:red;" >Category Deleted</h3>'; 
			
	}

	if(($_GET['catUpdated']) == TRUE) {
		print '<h3 style="color:red;" >Category Updated</h3>'; 
			
	}


// Check for Cancel - Refresh back to main function
	if(isset($_POST['category_cancel'])) {
	
		header('Refresh: 0;');
	}

// Check for a New Account - Fucntion defined above

	if (isset($_POST['category_new'])) {
	
		category_new();

	}

// Check for a confirmed delete to delete the row

	if (isset($_POST['category_deleteConfirmed'])) {
	
		category_deleteConfirmed();

	}

// Check for an update - Function defined above


	if (isset($_POST['category_update'])) {
	
		category_update();

	}

// Check for a delete request - This confirms deletion and send to delete form

	if (isset($_POST['category_delete'])) {

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

		$catAcctQuery = "SELECT category_name,
					category_description
					FROM $categoryTable
					WHERE category_seq=$category_id";

		$catAcctResult = mysql_query($catAcctQuery);
			

		if (!$catAcctResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$catAcctQuery);
		} 

		$catAcctView = mysql_fetch_array($catAcctResult);

		print "Are you SURE you want to delete $catAcctView[0]?";
		echo'<p><form action="?category_id='.$category_id.'" method="post" >
			<input type="submit" name="category_cancel" id="category_cancel" value="Cancel" />
			<input type="submit" name="category_deleteConfirmed" id="category_deleteConfirmed" value="Delete '.$catAcctView[0].'" />
			</form></p>';

	}



// If there is not an edit request display a request form

	if (isset($_POST['category_edit'])) {


		category_edit();

		} else {

		category_record();

	}






// Query to display table

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 

		$catResult = mysql_query("SELECT category_name,  
						category_description,
						category_seq 
						FROM $categoryTable");
			if (!$catResult) {
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



				if (!($catResult) == NULL) {
					
					while($catRow = mysql_fetch_row($catResult))
					{
  	 					 echo "<tr>";

   							// foreach($CON_row as $CON_cell)
							echo "<td>$catRow[0]</td>";
							echo "<td>$catRow[1]</td>";
							echo '<td><form method="POST" action="?category_id='.$catRow[2].'"><input name="category_edit" type="submit" value="Edit"></input></form></td>';
							echo '<td><form method="POST" action="?category_id='.$catRow[2].'"><input name="category_delete" type="submit" value="Delete"></input></form></td>';
    						echo "</tr>\n";
		
					}


					mysql_free_result($catResult);	
				}

				echo "</table>";

}// End category

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

add_shortcode( 'restaurateur_category', 'category' );
?>
