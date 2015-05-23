<?php
/*
Plugin Name: Restaurateur Inc. - Dashboard Menu Profit
Plugin URI: http://restaurateurinc.com
Description: Restaurateur Menu Profit
Version: 1.0
Author: admin@loiuedogg.com
Author URI: http://louiedogg.com
*/

//***Dash Board Sales***
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

function dashboard_menuProfit() {
	
	print "<h5>Here is your menu profit</h5>";


}
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---END---@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

add_shortcode( 'restaurateur_menuProfit', 'dashboard_menuProfit' );

?>
