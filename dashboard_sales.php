<?php
/*
Plugin Name: Restaurateur Inc. - Dashboard Sales
Plugin URI: http://restaurateurinc.com
Description: Restaurateur Sales Dashboard
Version: 1.0
Author: admin@loiuedogg.com
Author URI: http://louiedogg.com
*/

//***Dash Board Sales***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function dashboard_sales() {
	
	print "<h5>This is your sales Dash Board</h5>";


}
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

add_shortcode( 'restaurateur_sales', 'dashboard_sales' );

?>
