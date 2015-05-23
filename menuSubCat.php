<?php
/*
Plugin Name: Restaurateur Inc. - Menu Sub Categories
Plugin URI: http://restaurateurinc.com
Description: Restaurant Costing Program
Version: 1.0
Author: admin@loiuedogg.com
Author URI: http://louiedogg.com
*/
//***Record Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function subCategory_record() {

	echo '<form method="POST" action="" >
		<h5>Name:<input type="text" name="subCategory_name" id="subCategory_name" /></h5>
		<h5>Description:<input type="text" name="subCategory_description" id="subCategory_description" /></h5>
		<h5>Menu Category:
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
		<input type="submit" name="subCategory_new" id="subCategory_new" value="Add New" />
		</form>
		<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Edit Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function subCategory_edit() {

   $subCategory_id = ($_GET['subCategory_id']);

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');


			
		$subCatEditQuery = "SELECT a.subCategory_name,
					a.subCategory_description,
					a.subCategory_seq,
					b.category_name,
					b.category_seq
					FROM $subCategoryTable a,
						$categoryTable b
					WHERE a.category_seq=b.category_seq AND
						a.subCategory_seq=$subCategory_id";
		$subCatEditResult = mysql_query($subCatEditQuery);
			

		if (!$subCatEditResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$subCatEditQuery);
		} 

		$subCatEditView = mysql_fetch_array($subCatEditResult);


		echo '<form method="POST" action="?subCategory_id='.$subCatEditView[2].'">
			<h5>Name:<input type="text" name="subCategory_name" id="subCategory_name" value="'.$subCatEditView[0].'" /></h5>
			<h5>Description:<input type="text" name="subCategory_description" id="subCategory_description" value="'.$subCatEditView[1].'" /></h5>
			
			<h5>Menu Category</h5>

						 <h5><select name="category_seq">';

							$queryQ2 = mysql_query("SELECT category_seq, category_name FROM {$categoryTable} WHERE category_seq !='{$subCatEditView[4]}'");

							$queryQ3 = mysql_query("SELECT category_seq, category_name FROM {$categoryTable} WHERE category_seq ='{$subCatEditView[4]}'");

							while ($Q3= mysql_fetch_assoc($queryQ3)) {
				
								echo  '<option value='.$Q3['category_seq'].'>'.$Q3['category_name'].'</option>';

							}

							while ($Q2 = mysql_fetch_assoc($queryQ2)) {
					
							echo  '<option value='.$Q2['category_seq'].'>'.$Q2['category_name'].'</option>';

		 					 }

						echo '</select></h5>
			

			
			<input type="submit" name="subCategory_update" id="subCategory_update" value="Update"/>
			</form>
			<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@




//***Insert New Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function subCategory_new() {  // New Connection


			if (empty($_POST['subCategory_name']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an subCategory Name.</h5>';
				} else {
					$subCategory_name = trim(strip_tags($_POST['subCategory_name']));
					$problem = FALSE;
			}

			if (empty($_POST['subCategory_description']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter a Description.</h5>';
				} else {
					$subCategory_description = trim(strip_tags($_POST['subCategory_description']));
					$problem = FALSE;
			}
			
			if (empty($_POST['category_seq']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please Select a Category.</h5>';
				} else {
					$category_seq = trim(strip_tags($_POST['category_seq']));
					$problem = FALSE;
			}


			if (!$problem) {

			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$subCategoryInsertQuery = "INSERT INTO {$subCategoryTable} (subCategory_dateTime,
												subCategory_description,
												subCategory_name,
												category_seq) 
												VALUES(now(),
												'$subCategory_description',
												'$subCategory_name',
												'$category_seq')"; 

				if ((@mysql_query($subCategoryInsertQuery, $dbc)) == TRUE)  {
					
					$subCatAdded = TRUE;
					header('Refresh: 0; url=?subCatAdded='.$subCatAdded);

					} else { 
						print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $subCategoryInsertQuery . '</p>';
				}

			} 
	} // End Funtion New Connection



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


//***Update Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


function subCategory_update() {

   $subCategory_id = ($_GET['subCategory_id']);
				
			if (empty($_POST['subCategory_description']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a description.</h5>";
			} else {
				$subCategory_description = trim(strip_tags($_POST['subCategory_description']));
				$problem = FALSE;
			}

			if (empty($_POST['subCategory_name']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a Name.</h5>";
			} else {
				$subCategory_name = trim(strip_tags($_POST['subCategory_name']));
				$problem = FALSE;
			}
			
			if (empty($_POST['category_seq']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a Category.</h5>";
			} else {
				$category_seq = trim(strip_tags($_POST['category_seq']));
				$problem = FALSE;
			}

			if (!$problem) {


			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$subCategorysUpdateQuery = "UPDATE {$subCategoryTable} 
								SET subCategory_description='$subCategory_description',
									subCategory_name='$subCategory_name',
									category_seq='$category_seq'
								WHERE subCategory_seq='$subCategory_id'"; 

				if ((@mysql_query($subCategorysUpdateQuery, $dbc)) == TRUE)  {

								
					$subCatUpdated = TRUE;
					header('Refresh: 0; url=?subCatUpdated='.$subCatUpdated);

					} else { 
							print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $subCategoryInsertQuery . '</p>';
				}
		
			}
}//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


//***Connection Delete Confirmed***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function subCategory_deleteConfirmed() {

   $subCategory_id = ($_GET['subCategory_id']);

	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

	$subCatDeleteQuery = "DELETE FROM $subCategoryTable WHERE subCategory_seq=$subCategory_id";

	if((@mysql_query($subCatDeleteQuery, $dbc) == TRUE)) {
					
		$subCatDeleted = TRUE;
		header('Refresh: 0; url=?subCatDeleted='.$subCatDeleted);

	} else {
		print mysql_error($dbc)."$deleteQuery, $subCategory_id";
	}

} // End of subCategory


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@





//***subCategory Main Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function subCategory() {

   $subCategory_id = ($_GET['subCategory_id']);


// If GET is TRUE Print the appropiate Status

	if(($_GET['subCatAdded']) == TRUE) {
		print '<h3 style="color:red;" >subCategory Added</h3>'; 
			
	}
	
	if(($_GET['subCatDeleted']) == TRUE) {
		print '<h3 style="color:red;" >subCategory Deleted</h3>'; 
			
	}

	if(($_GET['subCatUpdated']) == TRUE) {
		print '<h3 style="color:red;" >subCategory Updated</h3>'; 
			
	}


// Check for Cancel - Refresh back to main function
	if(isset($_POST['subCategory_cancel'])) {
	
		header('Refresh: 0;');
	}

// Check for a New Account - Fucntion defined above

	if (isset($_POST['subCategory_new'])) {
	
		subCategory_new();

	}

// Check for a confirmed delete to delete the row

	if (isset($_POST['subCategory_deleteConfirmed'])) {
	
		subCategory_deleteConfirmed();

	}

// Check for an update - Function defined above


	if (isset($_POST['subCategory_update'])) {
	
		subCategory_update();

	}

// Check for a delete request - This confirms deletion and send to delete form

	if (isset($_POST['subCategory_delete'])) {

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

		$subCatAcctQuery = "SELECT subCategory_name,
					subCategory_description
					FROM $subCategoryTable
					WHERE 
						subCategory_seq=$subCategory_id";

		$subCatAcctResult = mysql_query($subCatAcctQuery);
			

		if (!$subCatAcctResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$subCatAcctQuery);
		} 

		$subCatAcctView = mysql_fetch_array($subCatAcctResult);

		print "Are you SURE you want to delete $subCatAcctView[0]?";
		echo'<p><form action="?subCategory_id='.$subCategory_id.'" method="post" >
			<input type="submit" name="subCategory_cancel" id="subCategory_cancel" value="Cancel" />
			<input type="submit" name="subCategory_deleteConfirmed" id="subCategory_deleteConfirmed" value="Delete '.$subCatAcctView[0].'" />
			</form></p>';

	}



// If there is not an edit request display a request form

	if (isset($_POST['subCategory_edit'])) {


		subCategory_edit();

		} else {

		subCategory_record();

	}






// Query to display table

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 

		$subCatResult = mysql_query("SELECT a.subCategory_name,  
						a.subCategory_description,
						a.subCategory_seq,
						b.category_seq,
						b.category_name
						FROM $subCategoryTable a,
							$categoryTable b
							WHERE a.category_seq=b.category_seq");
			if (!$subCatResult) {
				die('Query to show fields from table failed --- '.mysql_error($dbc));
			} 
			



// Displays the Table

				echo "<table border='1'><tr>";

				echo "<th>Status Name</th>";
				echo "<th>Description</th>";
				echo "<th>Category</th>";
				echo "<th>Edit</th>";
				echo "<th>Delete</th>";

				echo "</tr>\n";


				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 



				if (!($subCatResult) == NULL) {
					
					while($subCatRow = mysql_fetch_row($subCatResult))
					{
  	 					 echo "<tr>";

   							// foreach($CON_row as $CON_cell)
							echo "<td>$subCatRow[0]</td>";
							echo "<td>$subCatRow[1]</td>";
							echo "<td>$subCatRow[4]</td>";
							echo '<td><form method="POST" action="?subCategory_id='.$subCatRow[2].'"><input name="subCategory_edit" type="submit" value="Edit"></input></form></td>';
							echo '<td><form method="POST" action="?subCategory_id='.$subCatRow[2].'"><input name="subCategory_delete" type="submit" value="Delete"></input></form></td>';
    						echo "</tr>\n";
		
					}


					mysql_free_result($subCatResult);	
				}

				echo "</table>";

}// End subCategory

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

add_shortcode( 'restaurateur_subCategory', 'subCategory' );
?>
