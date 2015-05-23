<?php
/*
Plugin Name: Restaurateur Inc. - Recipe
Plugin URI: http://restaurateurinc.com
Description: Restaurant Costing Program
Version: 1.0
Author: admin@loiuedogg.com
Author URI: http://louiedogg.com
*/
//***Record Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function recipe_record() {

	echo '<form method="POST" action="" >
		<h5>Name:<input type="text" name="recipe_name" id="recipe_name" /></h5>
		<h5>Description:<textarea name="recipe_description" id="recipe_description"></textarea></h5>
		<input type="submit" name="recipe_new" id="recipe_new" value="Add New" />
		</form>
		<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Edit Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function recipe_edit() {

   $recipe_id = ($_GET['recipe_id']);

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');


			
		$rpEditQuery = "SELECT recipe_name,
						recipe_description,
						recipe_seq,
						recipe_cost
					FROM $recipeTable
					WHERE recipe_seq=$recipe_id";
		$rpEditResult = mysql_query($rpEditQuery);
			

		if (!$rpEditResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$rpEditQuery);
		} 

		$rpEditView = mysql_fetch_array($rpEditResult);


		echo '<form method="POST" action="?recipe_id='.$rpEditView[2].'">
			<h5>Name:<input type="text" name="recipe_name" id="recipe_name" value="'.$rpEditView[0].'" /></h5>
			<h5>Description:<textarea name="recipe_description" id="recipe_description" value="'.$rpEditView[1].'"></textarea></h5>	
			<input type="submit" name="recipe_update" id="recipe_update" value="Update"/>
			</form>
			<br>';

}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@




//***Insert New Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function recipe_new() {  // New Connection


			if (empty($_POST['recipe_name']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter an recipe Name.</h5>';
				} else {
					$recipe_name = trim(strip_tags($_POST['recipe_name']));
					$problem = FALSE;
			}

			if (empty($_POST['recipe_description']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter a Description.</h5>';
				} else {
					$recipe_description = trim(strip_tags($_POST['recipe_description']));
					$problem = FALSE;
			}

			if (!$problem) {

			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$recipeInsertQuery = "INSERT INTO {$recipeTable} (recipe_dateTime,
												recipe_description,
												recipe_name) 
												VALUES(now(),
												'$recipe_description',
												'$recipe_name')"; 

				if ((@mysql_query($recipeInsertQuery, $dbc)) == TRUE)  {
					
					$rpAdded = TRUE;
					header('Refresh: 0; url=?rpAdded='.$rpAdded);

					} else { 
						print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $recipeInsertQuery . '</p>';
				}

			} 
	} // End Funtion New Connection



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


//***Update Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


function recipe_update() {

   $recipe_id = ($_GET['recipe_id']);
				
			if (empty($_POST['recipe_description']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a description.</h5>";
			} else {
				$recipe_description = trim(strip_tags($_POST['recipe_description']));
				$problem = FALSE;
			}

			if (empty($_POST['recipe_name']) ) {
			$problem = TRUE;
			echo "<h5 style=\"color:red;\">Please enter a Name.</h5>";
			} else {
				$recipe_name = trim(strip_tags($_POST['recipe_name']));
				$problem = FALSE;
			}
			
			if (!$problem) {


			include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
			include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$recipesUpdateQuery = "UPDATE {$recipeTable} 
								SET recipe_description='$recipe_description',
									recipe_name='$recipe_name'
								WHERE recipe_seq='$recipe_id'"; 

				if ((@mysql_query($recipesUpdateQuery, $dbc)) == TRUE)  {

								
					$rpUpdated = TRUE;
					header('Refresh: 0; url=?rpUpdated='.$rpUpdated);

					} else { 
							print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $recipeInsertQuery . '</p>';
				}
		
			}
}//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


//***Connection Delete Confirmed***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function recipe_deleteConfirmed() {

   $recipe_id = ($_GET['recipe_id']);

	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

	$rpDeleteQuery = "DELETE FROM $recipeTable WHERE recipe_seq=$recipe_id";

	if((@mysql_query($rpDeleteQuery, $dbc) == TRUE)) {
					
		$rpDeleted = TRUE;
		header('Refresh: 0; url=?rpDeleted='.$rpDeleted);

	} else {
		print mysql_error($dbc)."$deleteQuery, $recipe_id";
	}

} // End of recipe


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@



//***Select Grocery Items to attach to Recipes***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function recipe_groceryList() {

	$grocery_id = ($_GET['grocery_id']);

	echo '<form method="POST" action="" >
			
			<input type="submit" name="recipe_cancel" id="go_recipe" value="Back to Recipe" />
		
			</form>
	
		<form method="POST" action="" >
			<h5>Qty:<input type="text" name="recipeItem_qty" id="recipeItem_qty" /></h5>
			
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
					
		<input type="submit" name="recipe_attachGrocery" id="recipe_attachGrocery" value="Attach Grocery" />
		</form>
		<br>';
		
}
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


//***Attached RecipeItem to Recipe***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function recipe_attachGrocery() {
	
	$recipe_id = ($_GET['recipe_id']);
	
	if (empty($_POST['groceryList_seq']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please select a Grocery Item.</h5>';
				} else {
					$groceryList_seq = trim(strip_tags($_POST['groceryList_seq']));
					$problem = FALSE;
			}
			
	if (empty($_POST['recipeItem_qty']) ) {
				$problem = TRUE;
				echo '<h5 style="color:red;">Please enter a Quantity.</h5>';
				} else {
					$recipeItem_qty = trim(strip_tags($_POST['recipeItem_qty']));
					$problem = FALSE;
			}	
			
	if (!$problem) {

		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

			$groceryAttachInsertQuery = "INSERT INTO {$recipeItemTable} (recipeItem_dateTime,
															recipe_seq,
															groceryList_seq,
															recipeItem_qty) 
															VALUES(now(),
															'$recipe_id',
															'$groceryList_seq',
															'$recipeItem_qty')"; 

				if ((@mysql_query($groceryAttachInsertQuery, $dbc)) == TRUE)  {
										
					$riAdded = TRUE;
					header('Refresh: 0; url=?rpAdded='.$riAdded);

						} else { 
							print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $recipeAttachInsertQuery . '</p>';
				
				
					}
				
				
				}

} 
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//***Delete Attached Recipe Confirmed***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function recipeItem_deleteConfirmed() {

   $recipeItem_id = ($_GET['recipeItem_id']);

	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

	$recipeItemDeleteQuery = "DELETE FROM $recipeItemTable WHERE recipeItem_seq=$recipeItem_id";

	if((@mysql_query($recipeItemDeleteQuery, $dbc) == TRUE)) {
					
		$recipeItemDeleted = TRUE;
		header('Refresh: 0; url=?plateDeleted='.$recipeItemDeleted);

	} else {
		
		print mysql_error($dbc)."$recipeItemDeleteQuery, $recipeItem_id";
		
	}

} // End of recipe


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


//***Display Attached Recipes***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	
	
function recipe_recipeDisplay() {
		
// Query to display table

		if(($_GET['riAdded']) == TRUE) {
			print '<h3 style="color:red;" >Grocery Attached</h3>'; 
			
			}
			
		$recipe_id = ($_GET['recipe_id']);

			
		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

		$riResult = mysql_query("select a.recipe_name,
										a.recipe_seq,
										b.groceryList_name,
										b.groceryList_seq,
										c.recipeItem_seq,
										c.recipeItem_qty,
										c.recipeItem_cost,
										d.uom_name
											FROM $recipeTable a,
													$groceryListTable b,
													$recipeItemTable c,
													$uomTable d
											WHERE a.recipe_seq=c.recipe_seq
											AND b.groceryList_seq=c.groceryList_seq
											AND b.uom_seq=d.uom_seq
											AND a.recipe_seq={$recipe_id}");
			if (!$riResult) {
				die('Query to show fields from table failed --- '.mysql_error($dbc));
			} 
			



// Display all Recipes Attached to Menu Item

				echo "<h5>".$riResult[0]."</h5>";

				echo "<table border='1'><tr>";
				
				echo "<th>Recipe Name</th>";
				echo "<th>Grocery Name</th>";
				echo "<th>Unit of Measure</th>";
				echo "<th>Quantity</th>";
				echo "<th>Recipe Item Cost</th>";
				echo "<th>Unattach Recipe Item</th>";

				echo "</tr>\n";

				if (!($riResult) == NULL) {
					
					while($riRow = mysql_fetch_row($riResult))
					{
  	 					 echo "<tr>";

   							// foreach($CON_row as $CON_cell)
							echo "<td>".$riRow[0]."</td>";
							echo "<td>".$riRow[2]."</td>";
							echo "<td>".$riRow[7]."</td>";
							echo "<td>".$riRow[5]."</td>";
							echo "<td>$ ".$riRow[6]."</td>";
							echo '<td><form method="POST" action="?recipeItem_id='.$riRow[4].'&recipe_id='.$riRow[1].'">
									<input name="recipeItem_delete" type="submit" value="Unattach"></input></form></td>';
    						echo "</tr>\n";
		
					}


					mysql_free_result($riResult);	
				}

				echo "</table>";

	
}

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@





//***recipe Main Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function recipe() {

   $recipe_id = ($_GET['recipe_id']);


// If GET is TRUE Print the appropiate Status

	if(($_GET['rpAdded']) == TRUE) {
		print '<h3 style="color:red;" >recipe Added</h3>'; 
			
	}
	
	if(($_GET['rpDeleted']) == TRUE) {
		print '<h3 style="color:red;" >recipe Deleted</h3>'; 
			
	}

	if(($_GET['rpUpdated']) == TRUE) {
		print '<h3 style="color:red;" >recipe Updated</h3>'; 
			
	}


// Check for Cancel - Refresh back to main function
	if(isset($_POST['recipe_cancel'])) {
	
		header('Refresh: 0;');
	}
	
///////////////////**Attach Recipes**/////////////////////////////////

// Check for recipe_Recipe
	if(isset($_POST['recipe_groceryList'])) {
	
		recipe_groceryList();
	}

// Check for recipe_attachGrocery
	if(isset($_POST['recipe_attachGrocery'])) {
	
		recipe_attachGrocery();
	}

// Check for a Recipe delete request - This confirms deletion and send to delete form

			if (isset($_POST['recipeItem_delete'])) {
				
				$recipeItem_id = ($_GET['recipeItem_id']);

				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$rpAcctQuery = "SELECT a.groceryList_name
								FROM $groceryListTable a,
										$recipeItemTable b
								WHERE 
									a.groceryList_seq=b.groceryList_seq
								AND 
									recipeItem_seq={$recipeItem_id}";
									

				$rpAcctResult = mysql_query($rpAcctQuery);
					

				if (!$rpAcctResult) {
					die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$rpAcctQuery);
				} 

				$rpAcctView = mysql_fetch_array($rpAcctResult);

				print "Are you SURE you want to delete $rpAcctView[0]?";
				echo'<p><form action="?recipeItem_id='.$recipeItem_id.'" method="post" >
					<input type="submit" name="recipe_cancel" id="recipe_cancel" value="Cancel" />
					<input type="submit" name="recipeItem_deleteConfirmed" id="recipeItem_deleteConfirmed" value="Unattach '.$rpAcctView[0].'" />
					</form></p>';

			}


// Check for a confirmed delete to delete the row

			if (isset($_POST['recipeItem_deleteConfirmed'])) {
			
				recipeItem_deleteConfirmed();

			}




//////////////////////////////////////////////////////////////////////	
	


// Choose to display Menu Items or Attached Recipes (Plates)

	if ((isset($_POST['recipe_groceryList'])) or
		(isset($_POST['recipe_attachGrocery'])) or
		(isset($_POST['recipeItem_delete'])) or
		(($_GET['rpAdded']) == TRUE)) {
		
		recipe_recipeDisplay();
		
		} else { 
			
///////////////////**Menu Items**/////////////////////////////////	

// Display the Menu Item Table

		// Check for a New Account - Fucntion defined above

			if (isset($_POST['recipe_new'])) {
			
				recipe_new();

			}

		// Check for a confirmed delete to delete the row

			if (isset($_POST['recipe_deleteConfirmed'])) {
			
				recipe_deleteConfirmed();

			}

		// Check for an update - Function defined above


			if (isset($_POST['recipe_update'])) {
			
				recipe_update();

			}

		// Check for a delete request - This confirms deletion and send to delete form

			if (isset($_POST['recipe_delete'])) {

				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

				$rpAcctQuery = "SELECT recipe_name,
							recipe_description
							FROM $recipeTable
							WHERE 
								recipe_seq=$recipe_id";

				$rpAcctResult = mysql_query($rpAcctQuery);
					

				if (!$rpAcctResult) {
					die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$rpAcctQuery);
				} 

				$rpAcctView = mysql_fetch_array($rpAcctResult);

				print "Are you SURE you want to delete $rpAcctView[0]?";
				echo'<p><form action="?recipe_id='.$recipe_id.'" method="post" >
					<input type="submit" name="recipe_cancel" id="recipe_cancel" value="Cancel" />
					<input type="submit" name="recipe_deleteConfirmed" id="recipe_deleteConfirmed" value="Delete '.$rpAcctView[0].'" />
					</form></p>';

			}



		// If there is not an edit request display a request form

			if (isset($_POST['recipe_edit'])) {


				recipe_edit();

				} else {

				recipe_record();

			}






		// Query to display table

				include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
				include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 

				$rpResult = mysql_query("SELECT recipe_name,  
								recipe_description,
								recipe_seq,
								recipe_cost
								FROM $recipeTable ");
					if (!$rpResult) {
						die('Query to show fields from table failed --- '.mysql_error($dbc));
					} 
					



		// Displays the Table

						echo "<table border='1'><tr>";

						echo "<th>Name</th>";
						echo "<th>Description</th>";
						echo "<th>Cost</th>";
						echo "<th>Grocery Items</th>";
						echo "<th>Edit</th>";
						echo "<th>Delete</th>";

						echo "</tr>\n";


						include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
						include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 



						if (!($rpResult) == NULL) {
							
							while($rpRow = mysql_fetch_row($rpResult))
							{
								 echo "<tr>";

									// foreach($CON_row as $CON_cell)
									echo "<td>".$rpRow[0]."</td>";
									echo "<td>".$rpRow[1]."</td>";
									echo "<td>$".$rpRow[3]."</td>";
									echo '<td><form method="POST" action="?recipe_id='.$rpRow[2].'"><input name="recipe_groceryList" type="submit" value="Grocery"></input></form></td>';
									echo '<td><form method="POST" action="?recipe_id='.$rpRow[2].'"><input name="recipe_edit" type="submit" value="Edit"></input></form></td>';
									echo '<td><form method="POST" action="?recipe_id='.$rpRow[2].'"><input name="recipe_delete" type="submit" value="Delete"></input></form></td>';
									echo "</tr>\n";
				
							}


							mysql_free_result($rpResult);	
						}

						echo "</table>";
	}
}// End recipe

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

add_shortcode( 'restaurateur_recipe', 'recipe' );
?>
