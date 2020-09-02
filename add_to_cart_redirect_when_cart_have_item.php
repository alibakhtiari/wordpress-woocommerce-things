function my_validation_handler( $passed, $product_id, $quantity, $variation_id = null, $variations = null ) {
    // Get checkout url
    $checkout_url = wc_get_checkout_url();

    // Set variable
    $in_cart = false;

    // Loop
    foreach( WC()->cart->get_cart() as $cart_item ) {
        if ( $cart_item['data']->get_id() == $product_id ) {
            $in_cart = true;
            break;
        }
    }

    // True
    if ( $in_cart ) {
        wp_safe_redirect( $checkout_url );
        exit();
    } else {
        // Add product to cart
        WC()->cart->add_to_cart( $product_id, $quantity );
        wp_safe_redirect( $checkout_url );
        exit();
    }

    return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'my_validation_handler', 10, 5 );
