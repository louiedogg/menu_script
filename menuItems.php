<?php
/*
Plugin Name: Restaurateur Inc. - Menu Items
Plugin URI: http://restaurateurinc.com
Description: Restaurant Costing Program
Version: 1.0
Author: admin@loiuedogg.com
Author URI: http://louiedogg.com
*/
//***Record Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function menuItem_record() {

	echo '<form method="POST" action="" >
		<h5>Name:<input type="text" name="menuItem_name" id="menuItem_name" /></h5>
		<h5>Description:<input type="text" name="menuItem_description" id="menuItem_description" /></h5>
		<h5>Price $:<input type="text" name="menuItem_price" id="menuItem_price" /></h5>
		<h5>Menu Category:
			<select name="subCategory_seq">
			<option></option>';
		
		
		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

		$catQuery = mysql_query("SELECT subCategory_seq, subCategory_name FROM {$subCategoryTable}");

				while ($catResult = mysql_fetch_array($catQuery)) {

					echo '<option value="'.$catResult[0].'">'.$catResult[1].'</option>'; 
												
					}

		echo '</select>
				</h5>
		<input type="submit" name="menuItem_new" id="menuItem_new" value="Add New" />
		</form>
		<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Edit Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function menuItem_edit() {

   $menuItem_id = ($_GET['menuItem_id']);

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');


			
		$miEditQuery = "SELECT a.menuItem_name,
					a.menuItem_description,
					a.menuItem_seq,
					a.menuItem_price,
					b.subCategory_name,
					b.subCategory_seq
					FROM $menuItemTable a,
						$subCategoryTable b
					WHERE a.subCategory_seq=b.subCategory_seq AND
						a.menuItem_seq=$menuItem_id";
		$miEditResult = mysql_query($miEditQuery);
			

		if (!$miEditResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$miEditQuery);
		} 

		$miEditView = mysql_fetch_array($miEditResult);


		echo '<form method="POST" action="?menuItem_id='.$miEditView[2].'">
			<h5>Name:<input type="text" name="menuItem_name" id="menuItem_name" value="'.$miEditView[0].'" /></h5>
			<h5>Description:<input type="text" name="menuItem_description" id="menuItem_description" value="'.$miEditView[1].'" /></h5>
			<h5>Price $:<input type="text" name="menuItem_price" id="menuItem_price" value="'.$miEditView[3].'" /></h5>
			
			<h5>Menu Category</h5>

						 <h5><select name="subCategory_seq">';

							$queryQ2 = mysql_query("SELECT subCategory_seq, subCategory_name FROM {$subCategoryTable} WHERE subCategory_seq !='{$subCatEditView[4]}'");

							$queryQ3 = mysql_query("SELECT subCategory_seq, subCategory_name FROM {$subCategoryTable} WHERE subCategory_seq ='{$subCatEditView[4]}'");

							while ($Q3= mysql_fetch_assoc($queryQ3)) {
				
								echo  '<option value='.$Q3['subCategory_seq'].'>'.$Q3['subCategory_name'].'</option>';

							}

							while ($Q2 = mysql_fetch_assoc($queryQ2)) {
					
							echo  '<option value='.$Q2['subCategory_seq'].'>'.$Q2['subCategory_name'].'</option>';

		 					 }

						echo '</select></h5>
			

			
			<input type="submit" name="menuItem_update" id="menuItem_update" value="Update"/>
			</form>
			<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@




//***Insert New Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function menuItem_new() {  // New Connection


			if (empty($_POST['menuItem_name']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an menuItem Name.</h5>';
				} else {
					$menuItem_name = trim(strip_tags($_POST['menuItem_name']));
					$problem = FALSE;
			}

			if (empty($_POST['menuItem_description']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter a Description.</h5>';
				} else {
					$menuItem_description = trim(strip_tags($_POST['menuItem_description']));
					$problem = FALSE;
			}
			
			if (empty($_POST['subCategory_seq']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please Select a Category.</h5>';
				} else {
					$subCategory_seq = trim(strip_tags($_POST['subCategory_seq']));
					$problem = FALSE;
			}
			if (empty($_POST['menuItem_price']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter a price.</h5>';
				} else {
					$menuItem_price = trim(strip_tags($_POST['menuItem_price']));
					$problem = FALSE;
			}


			if (!$problem) {

			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$menuItemInsertQuery = "INSERT INTO {$menuItemTable} (menuItem_dateTime,
												menuItem_description,
												menuItem_name,
												subCategory_seq,
												menuItem_price) 
												VALUES(now(),
												'$menuItem_description',
												'$menuItem_name',
												'$subCategory_seq',
												'$menuItem_price')"; 

				if ((@mysql_query($menuItemInsertQuery, $dbc)) == TRUE)  {
					
					$miAdded = TRUE;
					header('Refresh: 0; url=?miAdded='.$miAdded);

					} else { 
						print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $menuItemInsertQuery . '</p>';
				}

			} 
	} // End Funtion New Connection



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


//***Update Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


function menuItem_update() {

   $menuItem_id = ($_GET['menuItem_id']);
				
			if (empty($_POST['menuItem_description']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a description.</h5>";
			} else {
				$menuItem_description = trim(strip_tags($_POST['menuItem_description']));
				$problem = FALSE;
			}

			if (empty($_POST['menuItem_name']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a Name.</h5>";
			} else {
				$menuItem_name = trim(strip_tags($_POST['menuItem_name']));
				$problem = FALSE;
			}
			
			if (empty($_POST['subCategory_seq']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a Category.</h5>";
			} else {
				$subCategory_seq = trim(strip_tags($_POST['subCategory_seq']));
				$problem = FALSE;
			}
			if (empty($_POST['menuItem_price']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a Category.</h5>";
			} else {
				$menItem_price = trim(strip_tags($_POST['menuItem_price']));
				$problem = FALSE;
			}

			if (!$problem) {


			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$menuItemsUpdateQuery = "UPDATE {$menuItemTable} 
								SET menuItem_description='$menuItem_description',
									menuItem_name='$menuItem_name',
									subCategory_seq='$subCategory_seq'
									menuItem_price='$menuItem_price'
								WHERE menuItem_seq='$menuItem_id'"; 

				if ((@mysql_query($menuItemsUpdateQuery, $dbc)) == TRUE)  {

								
					$miUpdated = TRUE;
					header('Refresh: 0; url=?miUpdated='.$miUpdated);

					} else { 
							print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $menuItemInsertQuery . '</p>';
				}
		
			}
}//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


//***Connection Delete Confirmed***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function menuItem_deleteConfirmed() {

   $menuItem_id = ($_GET['menuItem_id']);

	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

	$miDeleteQuery = "DELETE FROM $menuItemTable WHERE menuItem_seq=$menuItem_id";

	if((@mysql_query($miDeleteQuery, $dbc) == TRUE)) {
					
		$miDeleted = TRUE;
		header('Refresh: 0; url=?miDeleted='.$miDeleted);

	} else {
		print mysql_error($dbc)."$deleteQuery, $menuItem_id";
	}

} // End of menuItem


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@






//***Attach Recipes***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function menuItem_recipe() {

	$menuItem_id = ($_GET['menuItem_id']);

	echo '<form method="POST" action="" >
			
			<input type="submit" name="menuItem_cancel" id="go_menuItem" value="Back to Menu Items" />
		
			</form>
	
		<form method="POST" action="" >
		<h5>Attach Recipe:
			<select name="recipe_seq">
			<option></option>';
				
		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

		$recpQuery = mysql_query("SELECT recipe_seq, recipe_name FROM {$recipeTable}");

				while ($recpResult = mysql_fetch_array($recpQuery)) {

					echo '<option value="'.$recpResult[0].'">'.$recpResult[1].'</option>'; 
												
					}

		echo '</select>
				</h5>
		<input type="submit" name="menuItem_attachRecipe" id="menuItem_attachRecipe" value="Attach Recipe" />
		</form>
		<br>';
		
}
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


//***Attached Recipes to Menu Items***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function menuItem_attachRecipe() {
	
	$menuItem_id = ($_GET['menuItem_id']);
	
	if (empty($_POST['recipe_seq']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please select a Recipe.</h5>';
				} else {
					$recipe_seq = trim(strip_tags($_POST['recipe_seq']));
					$problem = FALSE;
			}
			
	if (!$problem) {

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

			$recipeAttachInsertQuery = "INSERT INTO {$plateTable} (plate_dateTime,
															menuItem_seq,
															recipe_seq) 
															VALUES(now(),
															'$menuItem_id',
															'$recipe_seq')"; 

				if ((@mysql_query($recipeAttachInsertQuery, $dbc)) == TRUE)  {
					
					
					$find_plateID = mysql_query("SELECT plate_seq
													FROM plate
														WHERE menuItem_seq='$menuItem_id'
															AND 
																recipe_seq='$recipe_seq'");
					
					$plateId = mysql_fetch_array($find_plateID);
													
					
					$menuPlate = "UPDATE menuItem
									SET plate_seq='$plateId'
										WHERE menuItem_seq='$menuItem_id'";
					
					if ((@mysql_query($menuPlate, $dbc)) == TRUE) {
				
					
					$rpAdded = TRUE;
					header('Refresh: 0; url=?rpAdded='.$rpAdded);

						} else { 
							print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $recipeAttachInsertQuery . '</p>';
				
				
					}
				
				
				}

			} 			
	
	
	
	
	
	}

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Delete Attached Recipe Confirmed***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function plate_deleteConfirmed() {

   $plate_id = ($_GET['plate_id']);

	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

	$plateDeleteQuery = "DELETE FROM $plateTable WHERE plate_seq=$plate_id";

	if((@mysql_query($plateDeleteQuery, $dbc) == TRUE)) {
					
		$plateDeleted = TRUE;
		header('Refresh: 0; url=?plateDeleted='.$plateDeleted);

	} else {
		
		print mysql_error($dbc)."$plateDeleteQuery, $plate_id";
		
	}

} // End of menuItem


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


//***Display Attached Recipes***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	
	
function menuItem_recipeDisplay() {
		
// Query to display table

		if(($_GET['rpAdded']) == TRUE) {
			print '<h3 style="color:red;" >Recipe Attached</h3>'; 
			
			}
			
		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

		$miResult = mysql_query("select a.recipe_name,
										a.recipe_seq,
										a.recipe_cost,
										b.menuItem_name,
										b.menuItem_seq,
										c.plate_seq
											FROM $recipeTable a,
													$menuItemTable b,
													$plateTable c 
											WHERE a.recipe_seq=c.recipe_seq
											AND b.menuItem_seq=c.menuItem_seq");
			if (!$miResult) {
				die('Query to show fields from table failed --- '.mysql_error($dbc));
			} 
			



// Display all Recipes Attached to Menu Item

				echo "<h5>".$miResult[4]."</h5>";

				echo "<table border='1'><tr>";
				
				echo "<th>Recipe Name</th>";
				echo "<th>Recipe Cost</th>";
				echo "<th>Unattach Recipe</th>";

				echo "</tr>\n";

				if (!($miResult) == NULL) {
					
					while($miRow = mysql_fetch_row($miResult))
					{
  	 					 echo "<tr>";

   							// foreach($CON_row as $CON_cell)
							echo "<td>".$miRow[0]."</td>";
							echo "<td>$ ".$miRow[2]."</td>";
							echo '<td><form method="POST" action="?plate_id='.$miRow[5].'"><input name="plate_delete" type="submit" value="Unattach"></input></form></td>';
    						echo "</tr>\n";
		
					}


					mysql_free_result($miResult);	
				}

				echo "</table>";

	
}

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@





//***menuItem Main Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function menuItem() {

   $menuItem_id = ($_GET['menuItem_id']);


// If GET is TRUE Print the appropiate Status

	if(($_GET['miAdded']) == TRUE) {
		print '<h3 style="color:red;" >menuItem Added</h3>'; 
			
	}
	
	if(($_GET['miDeleted']) == TRUE) {
		print '<h3 style="color:red;" >menuItem Deleted</h3>'; 
			
	}

	if(($_GET['miUpdated']) == TRUE) {
		print '<h3 style="color:red;" >menuItem Updated</h3>'; 
			
	}


// Check for Cancel - Refresh back to main function
	if(isset($_POST['menuItem_cancel'])) {
	
		header('Refresh: 0;');
	}
	
///////////////////**Attach Recipes**/////////////////////////////////

// Check for menuItem_Recipe
	if(isset($_POST['menuItem_recipe'])) {
	
		menuItem_recipe();
	}

// Check for menuItem_attachRecipe
	if(isset($_POST['menuItem_attachRecipe'])) {
	
		menuItem_attachRecipe();
	}

// Check for a Recipe delete request - This confirms deletion and send to delete form

			if (isset($_POST['plate_delete'])) {
				
				$plate_id = ($_GET['plate_id']);

				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$rpAcctQuery = "SELECT a.recipe_name
								FROM $recipeTable a,
										$plateTable b
								WHERE 
									a.recipe_seq=b.recipe_seq
								AND 
									plate_seq={$plate_id}";

				$rpAcctResult = mysql_query($rpAcctQuery);
					

				if (!$rpAcctResult) {
					die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$rpAcctQuery);
				} 

				$rpAcctView = mysql_fetch_array($rpAcctResult);

				print "Are you SURE you want to delete $miAcctView[0]?";
				echo'<p><form action="?plate_id='.$plate_id.'" method="post" >
					<input type="submit" name="menuItem_cancel" id="menuItem_cancel" value="Cancel" />
					<input type="submit" name="plate_deleteConfirmed" id="plate_deleteConfirmed" value="Unattach '.$rpAcctView[0].'" />
					</form></p>';

			}


// Check for a confirmed delete to delete the row

			if (isset($_POST['plate_deleteConfirmed'])) {
			
				plate_deleteConfirmed();

			}




//////////////////////////////////////////////////////////////////////	
	
///////////////////**Menu Items**/////////////////////////////////	



// Choose to display Menu Items or Attached Recipes (Plates)

	if ((isset($_POST['menuItem_recipe'])) or
		(isset($_POST['menuItem_attachRecipe'])) or
		(isset($_POST['plate_delete'])) or
		(($_GET['rpAdded']) == TRUE)) {
		
		menuItem_recipeDisplay();
		
		} else { 

// Display the Menu Item Table

		// Check for a New Account - Fucntion defined above

			if (isset($_POST['menuItem_new'])) {
			
				menuItem_new();

			}

		// Check for a confirmed delete to delete the row

			if (isset($_POST['menuItem_deleteConfirmed'])) {
			
				menuItem_deleteConfirmed();

			}

		// Check for an update - Function defined above


			if (isset($_POST['menuItem_update'])) {
			
				menuItem_update();

			}

		// Check for a delete request - This confirms deletion and send to delete form

			if (isset($_POST['menuItem_delete'])) {

				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$miAcctQuery = "SELECT menuItem_name,
							menuItem_description
							FROM $menuItemTable
							WHERE 
								menuItem_seq=$menuItem_id";

				$miAcctResult = mysql_query($miAcctQuery);
					

				if (!$miAcctResult) {
					die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$miAcctQuery);
				} 

				$miAcctView = mysql_fetch_array($miAcctResult);

				print "Are you SURE you want to delete $miAcctView[0]?";
				echo'<p><form action="?menuItem_id='.$menuItem_id.'" method="post" >
					<input type="submit" name="menuItem_cancel" id="menuItem_cancel" value="Cancel" />
					<input type="submit" name="menuItem_deleteConfirmed" id="menuItem_deleteConfirmed" value="Delete '.$miAcctView[0].'" />
					</form></p>';

			}



		// If there is not an edit request display a request form

			if (isset($_POST['menuItem_edit'])) {


				menuItem_edit();

				} else {

				menuItem_record();

			}






		// Query to display table

				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 

				$miResult = mysql_query("SELECT a.menuItem_name,  
								a.menuItem_description,
								a.menuItem_seq,
								b.subCategory_seq,
								b.subCategory_name,
								a.menuItem_price
								FROM $menuItemTable a,
									$subCategoryTable b
									WHERE a.subCategory_seq=b.subCategory_seq");
					if (!$miResult) {
						die('Query to show fields from table failed --- '.mysql_error($dbc));
					} 
					



		// Displays the Table

						echo "<table border='1'><tr>";

						echo "<th>Status Name</th>";
						echo "<th>Description</th>";
						echo "<th>Menu Category</th>";
						echo "<th>Price</th>";
						echo "<th>Plate Recipes</th>";
						echo "<th>Edit</th>";
						echo "<th>Delete</th>";

						echo "</tr>\n";


						include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
						include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 



						if (!($miResult) == NULL) {
							
							while($miRow = mysql_fetch_row($miResult))
							{
								 echo "<tr>";

									// foreach($CON_row as $CON_cell)
									echo "<td>".$miRow[0]."</td>";
									echo "<td>".$miRow[1]."</td>";
									echo "<td>".$miRow[4]."</td>";
									echo "<td>$".$miRow[5]."</td>";
									echo '<td><form method="POST" action="?menuItem_id='.$miRow[2].'"><input name="menuItem_recipe" type="submit" value="Recipes"></input></form></td>';
									echo '<td><form method="POST" action="?menuItem_id='.$miRow[2].'"><input name="menuItem_edit" type="submit" value="Edit"></input></form></td>';
									echo '<td><form method="POST" action="?menuItem_id='.$miRow[2].'"><input name="menuItem_delete" type="submit" value="Delete"></input></form></td>';
									echo "</tr>\n";
				
							}


							mysql_free_result($miResult);	
						}

						echo "</table>";
	}
}// End menuItem

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

add_shortcode( 'restaurateur_menuItem', 'menuItem' );
?>
