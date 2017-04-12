<?php
	$id = intval( get_post_meta($post->ID, 'auction_id', true) );
	
	global $wpdb;
	
	$options = get_option( 'wp_auctions' );
	$currencysymbol = $options['currencysymbol'];
	
	$table_name = $wpdb->prefix . "wpa_auctions";
	$query = mysql_query("SELECT start_price, current_price FROM ".$table_name." WHERE id=".$id) or die(mysql_error());
	$row = mysql_fetch_object($query);
	
	// Values
	$current_price = $row->current_price;
	$start_price = $row->start_price;
	
	if ( $row != null ) {
		if ( $current_price > $start_price ) {
			$price_info = $currencysymbol . number_format($current_price, 2, '.', ',');
		} else {
			$price_info = $currencysymbol . number_format($start_price, 2, '.', ',');
		}
	} else {
		$price_info = "Stay Tuned!";
	}
	
	echo $price_info;
?>