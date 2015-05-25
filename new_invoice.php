<?php
/*
/*
Plugin Name: Restaurateur Inc. - Breakeven Report
Plugin URI: http://restaurateurinc.com
Description: Restaurant Costing Program
Version: 1.0
Author: admin@loiuedogg.com
Author URI: http://louiedogg.com



 * new_invoice.php
 * 
 * Copyright 2015 hightower <hightower@hightower>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

class breakeven
{
	
	function breakeven_header()
	{
	
		echo "<table border='1'>
				<tr>
					<th colspan='8'>Restaurateur</th>
				</tr>
				<tr>
					<th colspan='2'>Breakeven</th>
					<th colspan='2'>Sales/th>
					<th colspan='2'>Breakeven</th>
					<th colspan='2'>% Over</th>
				</tr>\n";


		include(WP_CONTENT_DIR . '/plugins/restaurateur/lib/dbConnect.php');
		include (WP_CONTENT_DIR . '/plugins/restaurateur/lib/tables.php'); 

		if (!($query) == NULL) {
			
			while($expense = mysql_fetch_row($query))
			{
				 echo "<tr>";

					// foreach($row as $cell)
					echo "<td>$catRow[0]</td>";
					echo "<td>$catRow[1]</td>";
					echo '<td><form method="POST" action="?category_id='.$catRow[2].'"><input name="category_edit" type="submit" value="Edit"></input></form></td>';
					echo '<td><form method="POST" action="?category_id='.$catRow[2].'"><input name="category_delete" type="submit" value="Delete"></input></form></td>';
					echo "</tr>\n";

			}

			mysql_free_result($query);	
		}

		echo "</table>";
	}
	
	function breakeven_cos()
	{
		
		echo"<table>
			
				<tr>
					<td colspan='2'></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			
			</table>";
		
		
		
	}
	
}

?>

