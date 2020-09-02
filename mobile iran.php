<?php
/*
Plugin Name: شماره تلفن همراه
Plugin URI: https://alibakhtiari.ir
Description: تغییرات صفحه ی تسویه حساب
Version: 1.03
Author: Ali Bakhtiari
Author URI: https://alibakhtiari.ir
*/
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');
  
function my_custom_checkout_field_process() {
    global $woocommerce;
  
    if ( ! (preg_match('/^(09)[\d]{9}$/m', $_POST['billing_phone'] ))){
        wc_add_notice( "لطفا شماره تلفن همراه صحیح را وارد نمایید"  ,'error' );
    }
}
?>