<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


/* add external 12 week program link on my account page*/
	//$user_id = get_current_user_id();
	
	 
	add_filter ( 'woocommerce_account_menu_items', 'misha_one_more_link' );
	function misha_one_more_link( $menu_links )
	{
		$current_user = get_current_user_id();
		
	
		if ( 0 == $current_user ) return;
			$customer_orders = get_posts( array(
					'numberposts' => -1,
					'meta_key'    => '_customer_user',
					'meta_value'  => $current_user,
					'post_type'   => "shop_order",
					'post_status' => array_keys( wc_get_is_paid_statuses() ),
			) );
		
		if ( ! $customer_orders )
		{
			return $menu_links;
		}
		else
		{
			$new = array( 'anyuniquetext123' => '12-week program' );
			$menu_links = array_slice( $menu_links, 0, 1, true ) + $new + array_slice( $menu_links, 1, NULL, true );
			return $menu_links;
		}
	}
	add_filter( 'woocommerce_get_endpoint_url', 'misha_hook_endpoint', 10, 4 );
	function misha_hook_endpoint( $url, $endpoint, $value, $permalink ){
		$current_user = get_current_user_id();
		
	
		if ( 0 == $current_user ) return;
			$customer_orders = get_posts( array(
					'numberposts' => -1,
					'meta_key'    => '_customer_user',
					'meta_value'  => $current_user,
					'post_type'   => "shop_order",
					'post_status' => array_keys( wc_get_is_paid_statuses() ),
			) );
		
		if ( ! $customer_orders ) return;
		$product_ids = array();
		foreach ( $customer_orders as $customer_order ) {
			
			$product_ids[] = $customer_order->ID;
		}
		//die;
		$product_ids = array_unique( $product_ids ); 
		
		$order_id = $product_ids['0'];
		$order = wc_get_order( $order_id );
		$items = $order->get_items();
		if($items)
		{
			$pro_id = '';
			foreach($items as $item )
			{
				$product_id = $item->get_product_id();

				$pro_id = $product_id;
			}
		}
		
		if( $endpoint === 'anyuniquetext123' ) {
			if($pro_id=='11416')
			{
				$url = site_url()."/user-profile/";
			}
			else
			{
				$url = site_url()."/welcome";
			}
		}
		return $url;
	}