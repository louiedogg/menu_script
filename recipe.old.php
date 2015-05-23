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
		<h5>Description:<input type="text" name="recipe_description" id="recipe_description" /></h5>
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


			
		$recipeEditQuery = "SELECT recipe_name,
					recipe_description,
					recipe_seq
					FROM $recipeTable 
					WHERE recipe_seq=$recipe_id";
		$recipeEditResult = mysql_query($recipeEditQuery);
			

		if (!$recipeEditResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$recipeEditQuery);
		} 

		$recipeEditView = mysql_fetch_array($recipeEditResult);


		echo '<form method="POST" action="?recipe_id='.$recipeEditView[2].'">
			<h5>Name:<input type="text" name="recipe_name" id="recipe_name" value="'.$recipeEditView[0].'" /></h5>
			<h5>Description:<input type="text" name="recipe_description" id="recipe_description" value="'.$recipeEditView[1].'" /></h5>
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
				echo '<h5 style="color:red;">Please enter an Account.</h5>';
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
					
					$recipeAdded = TRUE;
					header('Refresh: 0; url=?recipeAdded='.$recipeAdded);

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

								
					$recipeUpdated = TRUE;
					header('Refresh: 0; url=?recipeUpdated='.$recipeUpdated);

					} else { 
							print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $recipeInsertQuery . '</p>';
				}
		
			}
}// End of Function



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	


//***Connection Delete Confirmed***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function recipe_deleteConfirmed() {

   $recipe_id = ($_GET['recipe_id']);

	include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
	include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php');

	$recipeDeleteQuery = "DELETE FROM $recipeTable WHERE recipe_seq=$recipe_id";

	if((@mysql_query($recipeDeleteQuery, $dbc) == TRUE)) {
					
		$recipeDeleted = TRUE;
		header('Refresh: 0; url=?recipeDeleted='.$recipeDeleted);

	} else {
		print mysql_error($dbc)."$deleteQuery, $recipe_id";
	}

} // End of recipe


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@





//***recipe Main Function***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	

function recipe() {

   $recipe_id = ($_GET['recipe_id']);


// If GET is TRUE Print the appropiate Status

	if(($_GET['recipeAdded']) == TRUE) {
		print '<h3 style="color:red;" >recipe Added</h3>'; 
			
	}
	
	if(($_GET['recipeDeleted']) == TRUE) {
		print '<h3 style="color:red;" >recipe Deleted</h3>'; 
			
	}

	if(($_GET['recipeUpdated']) == TRUE) {
		print '<h3 style="color:red;" >recipe Updated</h3>'; 
			
	}


// Check for Cancel - Refresh back to main function
	if(isset($_POST['recipe_cancel'])) {
	
		header('Refresh: 0;');
	}

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

		$recipeAcctQuery = "SELECT recipe_name,
					recipe_description
					FROM $recipeTable
					WHERE recipe_seq=$recipe_id";

		$recipeAcctResult = mysql_query($recipeAcctQuery);
			

		if (!$recipeAcctResult) {
			die('Query to show fields from table failed --- '.mysql_error($dbc).' Query was: '.$recipeAcctQuery);
		} 

		$recipeAcctView = mysql_fetch_array($recipeAcctResult);

		print "Are you SURE you want to delete $recipeAcctView[0]?";
		echo'<p><form action="?recipe_id='.$recipe_id.'" method="post" >
			<input type="submit" name="recipe_cancel" id="recipe_cancel" value="Cancel" />
			<input type="submit" name="recipe_deleteConfirmed" id="recipe_deleteConfirmed" value="Delete '.$recipeAcctView[0].'" />
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

		$recipeResult = mysql_query("SELECT recipe_name,  
						recipe_description,
						recipe_seq 
						FROM $recipeTable");
			if (!$recipeResult) {
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



				if (!($recipeResult) == NULL) {
					
					while($recipeRow = mysql_fetch_row($recipeResult))
					{
  	 					 echo "<tr>";

   							// foreach($CON_row as $CON_cell)
							echo "<td>$recipeRow[0]</td>";
							echo "<td>$recipeRow[1]</td>";
							echo '<td><form method="POST" action="?recipe_id='.$recipeRow[2].'"><input name="recipe_edit" type="submit" value="Edit"></input></form></td>';
							echo '<td><form method="POST" action="?recipe_id='.$recipeRow[2].'"><input name="recipe_delete" type="submit" value="Delete"></input></form></td>';
    						echo "</tr>\n";
		
					}


					mysql_free_result($recipeResult);	
				}

				echo "</table>";

}// End recipe

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

add_shortcode( 'restaurateur_recipe', 'recipe' );
?>
