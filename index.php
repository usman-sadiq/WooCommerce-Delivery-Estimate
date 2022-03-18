<?php

/*

Plugin Name: WooCommerce Delivery Estimate

Plugin URI: https://wordpress.org/plugins/

Description: Plugin for WooCommerce Delivery Estimate by Usman.

Version: 1.0

Author: Usman

Author URI: https://profiles.wordpress.org/usmanpu/

License: GPLv2 or later

Text Domain: wordpress

*/
// My Shortcode for order
function wp_demo_shortcode() { 
	

 $woocommerce_delivery_estimate_options = get_option( 'woocommerce_delivery_estimate_option_name' );
 $variable = $woocommerce_delivery_estimate_options['_estimated_processing_time_0']; 
 $variable1 = $woocommerce_delivery_estimate_options['estimated_delivery_time_1']; 
 $variable2 = $woocommerce_delivery_estimate_options['delayed_delivery_time_2']; 
	

echo '<form action="">
  <label for="fname">Order Number:</label><br>
  <input type="text" id="number" name="number" placeholder="Enter your Order Number/Id"><br>
  <label for="lname">Email:</label><br>
  <input type="email" id="email" name="email" placeholder="Enter your Email"><br><br>
  <input type="submit" id="track-order" value="Check Order Status">
</form>';
if(isset($_GET['number'])){
    $test = $_GET['number'];

if(isset($_GET['email'])){
	 $mail = $_GET['email'];
	 
}

//add your order id value here

//add your order id value here
$order_id = $test;

// Get an instance of the WC_Order Object using the wc_get_order function
// assuming here that we only have the order id in a variable,
// in some cases the order object will be passed directly to an action or filter
$order = wc_get_order( $order_id );
if (!empty($order)) {
	
// Get the customer or user id from the order object
$customer_id = $order->get_customer_id();

//this should return exactly the same number as the code above
$user_id = $order->get_user_id();

// Get the WP_User Object instance object
$user = $order->get_user();

// Get the WP_User roles
$user_roles = $user->roles;

$billing_first_name = $order->get_billing_first_name();
$billing_last_name  = $order->get_billing_last_name();
$billing_company    = $order->get_billing_company();
$billing_address_1  = $order->get_billing_address_1();
$billing_address_2  = $order->get_billing_address_2();
$billing_city       = $order->get_billing_city();
$billing_state      = $order->get_billing_state();
$billing_postcode   = $order->get_billing_postcode();
$billing_country    = $order->get_billing_country();

//note that by default WooCommerce does not collect email and phone number for the shipping address
//so these fields are only available on the billing address
$billing_email  = $order->get_billing_email();
$billing_phone  = $order->get_billing_phone();
$order_date = $order->get_date_created();
$order_date1 = $order->get_date_modified();

// Get and Loop Over Order Items
foreach ( $order->get_items() as $item_id => $item ) {
   $product_id = $item->get_product_id();
   $variation_id = $item->get_variation_id();
   $product = $item->get_product();
   $product_name = $item->get_name();
   $quantity = $item->get_quantity();
   $subtotal = $item->get_subtotal();
   $total = $item->get_total();
   $tax = $item->get_subtotal_tax();
   $taxclass = $item->get_tax_class();
   $taxstat = $item->get_tax_status();
   $allmeta = $item->get_meta_data();
   $somemeta = $item->get_meta( '_whatever', true );
   $product_type = $item->get_type();
}
  
$billing_display_data = Array("First Name" => $billing_first_name,
    "Last Name" => $billing_last_name,
    "Company" => $billing_company,
    "Address Line 1" => $billing_address_1,
    "Address Line 2" => $billing_address_2,
    "City" => $billing_city,
    "State" => $billing_state,
    "Post Code" => $billing_postcode,
    "Country" => $billing_country,
    "Email" => $billing_email,
    "Phone" => $billing_phone,
    "Date" => $order_date,
    "Date1" => $order_date1,
	"Product Name" => $product_name,
	"Product Quantity" => $quantity);

// Customer shipping information details
$shipping_first_name = $order->get_shipping_first_name();
$shipping_last_name  = $order->get_shipping_last_name();
$shipping_company    = $order->get_shipping_company();
$shipping_address_1  = $order->get_shipping_address_1();
$shipping_address_2  = $order->get_shipping_address_2();
$shipping_city       = $order->get_shipping_city();
$shipping_state      = $order->get_shipping_state();
$shipping_postcode   = $order->get_shipping_postcode();
$shipping_country    = $order->get_shipping_country();

$shipping_display_data = Array("First Name" => $billing_first_name,
    "Last Name" => $shipping_last_name,
    "Company" => $shipping_company,
    "Address Line 1" => $shipping_address_1,
    "Address Line 2" => $shipping_address_2,
    "City" => $shipping_city,
    "State" => $shipping_state,
    "Post Code" => $shipping_postcode,
    "Country" => $shipping_country);

	
if ($mail == $billing_email)
{
	
echo'<table class="my-table">
  <tr>
    <th>Item</th>
    <th>Quantity</th>
  </tr>
  <tr>
    <td>'  .$product_name.  '</td>
    <td>'  .$quantity.  '</td>
  </tr>
  
</table>';

$date = date("Y/m/d");


$first = strtok($order_date, 'T');
 $newDate = date("Y/m/d", strtotime($first));  
  
// Declare and define two dates
  $date1 = strtotime($date);
  $date2 = strtotime($newDate);
 
  // Formulate the Difference between two dates
  $diff = abs($date2 - $date1);
 
  // To get the year divide the resultant date into
  // total seconds in a year (365*60*60*24)
  $years = floor($diff / (365*60*60*24));
 
  // To get the month, subtract it with years and
  // divide the resultant date into
  // total seconds in a month (30*60*60*24)
  $months = floor(($diff - $years * 365*60*60*24)
                                 / (30*60*60*24));
 
  // To get the day, subtract it with years and
  // months and divide the resultant date into
  // total seconds in a days (60*60*24)
  $days = floor(($diff - $years * 365*60*60*24 -
               $months*30*60*60*24)/ (60*60*24));
 
  // To get the hour, subtract it with years,
  // months & seconds and divide the resultant
  // date into total seconds in a hours (60*60)
  $hours = floor(($diff - $years * 365*60*60*24
         - $months*30*60*60*24 - $days*60*60*24)
                                     / (60*60));
 
  // To get the minutes, subtract it with years,
  // months, seconds and hours and divide the
  // resultant date into total seconds i.e. 60
  $minutes = floor(($diff - $years * 365*60*60*24
           - $months*30*60*60*24 - $days*60*60*24
                            - $hours*60*60)/ 60);
 
  // To get the minutes, subtract it with years,
  // months, seconds, hours and minutes
  $seconds = floor(($diff - $years * 365*60*60*24
           - $months*30*60*60*24 - $days*60*60*24
                  - $hours*60*60 - $minutes*60));
 
  // Print the result
  //printf("%d years, %d months, %d days, %d hours, "
       //. "%d minutes, %d seconds", $years, $months,
             //  $days, $hours, $minutes, $seconds);
 
 

 $expect = date("d F", strtotime($first. " + {$variable} days"));
$expect1 = date("d F", strtotime($first. " + {$variable1} days"));
	$expect2 = date("d F", strtotime($first. " + {$variable2} days"));
	
	echo $expect;
	echo "<br>";
	echo $expect1;
	echo "<br>";
	echo $expect2;

if ($days <= $variable)
{
	
	echo '<div class="order-box">
<h2>Your order is being: <span style="color: #606EC6">Processed</span> </h2>
<div class="progress-bar-container">
                              <div class="progress-bar delayed" style="background: #606EC6"></div>
                          </div>
<h5>Once we finish it will be shipped to: '.$billing_address_1. ' ' . $billing_city. ' ' .$billing_postcode.  ' ' .$billing_state. ' ' .$billing_country.'</h5>
<p>Expected delivery date: Between<br>'.$expect.' - '.$expect1.'</p>
</div>';
}
elseif ($days <= $variable1)
{
	
	echo '<div class="order-box">
<h2>Status of order: <span style="color: #13CE66">On the way</span> </h2>
<div class="progress-bar-container">
                              <div class="progress-bar delayed" style="background: #13CE66"></div>
                          </div>
<h5>ON THE WAY TO: '.$billing_address_1. ' ' . $billing_city. ' ' .$billing_postcode.  ' ' .$billing_state. ' ' .$billing_country.'</h5>
<p>New expected delivery date: Between<br>'.$expect.' - '.$expect1.'</p>
</div>';
}
elseif ($days <= $variable2)
{
	
	echo '<div class="order-box">
<h2>Status of order: <span style="color: #F7BA2A">On the way</span> </h2>
<div class="progress-bar-container">
                              <div class="progress-bar delayed" style="background: #F7BA2A"></div>
                          </div>
<h5>ON THE WAY TO: '.$billing_address_1. ' ' . $billing_city. ' ' .$billing_postcode.  ' ' .$billing_state. ' ' .$billing_country.'</h5>
<p>WE RE SORRY FOR THE DELAY</p>
<p>New expected delivery date: Between<br>'.$expect1.' - '.$expect2.'</p>
</div>';
}
else
{
	
	echo '<div class="order-box">
<h2>Status of order: <span style="color: #2196F3">Delivered</span> </h2>
<div class="progress-bar-container">
                              <div class="progress-bar delayed" style="background: #2196F3"></div>
                          </div>
<h5>Delivered To: '.$billing_address_1. ' ' . $billing_city. ' ' .$billing_postcode.  ' ' .$billing_state. ' ' .$billing_country.'</h5>
<p>Havent recieved your package yet? <a class="" href="https://mybeepot.com/">let us know</span></p>
</div>';
}




/*
echo "Retrieving user information from order id - " . $order_id ."<br><br>";
echo "Customer id from order is " . $customer_id . " the user id is " . $user_id . ", these values should be exactly the same<br><br>";

echo "Here is the customer's billing address from the order - <br>";
foreach ( $billing_display_data as $key => $value ) {
    echo $key . ' - ' . $value . "<br>";
}
echo "<br>";

echo "Here is the customer's shipping address from the order - <br>";
foreach ( $shipping_display_data as $key => $value ) {
    echo $key . ' - ' . $value . "<br>";
}
echo "<br>";

echo "The customer is a member of the following roles - <br>";

foreach ( $user_roles as $value ) {
    echo $value . "<br>";
}
*/
	}
else
{
	echo "Not Found. Plz enter a valid Email Address";
}
}
else
{
	echo "Not Found. Plz enter a valid order Number";
}
}

else{
   echo "Plz Enter your order details";
}




} 
add_shortcode('user-order', 'wp_demo_shortcode'); 
/**
 
 */

class WooCommerceDeliveryEstimate {
	private $woocommerce_delivery_estimate_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'woocommerce_delivery_estimate_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'woocommerce_delivery_estimate_page_init' ) );
	}

	public function woocommerce_delivery_estimate_add_plugin_page() {
		add_options_page(
			'WooCommerce Delivery Estimate', // page_title
			'WooCommerce Delivery Estimate', // menu_title
			'manage_options', // capability
			'woocommerce-delivery-estimate', // menu_slug
			array( $this, 'woocommerce_delivery_estimate_create_admin_page' ) // function
		);
	}

	public function woocommerce_delivery_estimate_create_admin_page() {
		$this->woocommerce_delivery_estimate_options = get_option( 'woocommerce_delivery_estimate_option_name' ); ?>

		<div class="wrap">
			<h2>WooCommerce Delivery Estimate</h2>
			<p>This is where to define the estimated date of processing, estimated date of delivery, and the delayed Estimated Delivery. Set the values for each field and the user can track the order and see the order status according to it.</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'woocommerce_delivery_estimate_option_group' );
					do_settings_sections( 'woocommerce-delivery-estimate-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function woocommerce_delivery_estimate_page_init() {
		register_setting(
			'woocommerce_delivery_estimate_option_group', // option_group
			'woocommerce_delivery_estimate_option_name', // option_name
			array( $this, 'woocommerce_delivery_estimate_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'woocommerce_delivery_estimate_setting_section', // id
			'Settings', // title
			array( $this, 'woocommerce_delivery_estimate_section_info' ), // callback
			'woocommerce-delivery-estimate-admin' // page
		);

		add_settings_field(
			'_estimated_processing_time_0', // id
			' Estimated processing time', // title
			array( $this, '_estimated_processing_time_0_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'estimated_delivery_time_1', // id
			'Estimated delivery time', // title
			array( $this, 'estimated_delivery_time_1_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'delayed_delivery_time_2', // id
			'Delayed delivery time', // title
			array( $this, 'delayed_delivery_time_2_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);
	}

	public function woocommerce_delivery_estimate_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['_estimated_processing_time_0'] ) ) {
			$sanitary_values['_estimated_processing_time_0'] = sanitize_text_field( $input['_estimated_processing_time_0'] );
		}

		if ( isset( $input['estimated_delivery_time_1'] ) ) {
			$sanitary_values['estimated_delivery_time_1'] = sanitize_text_field( $input['estimated_delivery_time_1'] );
		}

		if ( isset( $input['delayed_delivery_time_2'] ) ) {
			$sanitary_values['delayed_delivery_time_2'] = sanitize_text_field( $input['delayed_delivery_time_2'] );
		}

		return $sanitary_values;
	}

	public function woocommerce_delivery_estimate_section_info() {
		
	}

	public function _estimated_processing_time_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="woocommerce_delivery_estimate_option_name[_estimated_processing_time_0]" id="_estimated_processing_time_0" value="%s">',
			isset( $this->woocommerce_delivery_estimate_options['_estimated_processing_time_0'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['_estimated_processing_time_0']) : ''
		);
	}

	public function estimated_delivery_time_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="woocommerce_delivery_estimate_option_name[estimated_delivery_time_1]" id="estimated_delivery_time_1" value="%s">',
			isset( $this->woocommerce_delivery_estimate_options['estimated_delivery_time_1'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['estimated_delivery_time_1']) : ''
		);
	}

	public function delayed_delivery_time_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="woocommerce_delivery_estimate_option_name[delayed_delivery_time_2]" id="delayed_delivery_time_2" value="%s">',
			isset( $this->woocommerce_delivery_estimate_options['delayed_delivery_time_2'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['delayed_delivery_time_2']) : ''
		);
	}

}
if ( is_admin() )
	$woocommerce_delivery_estimate = new WooCommerceDeliveryEstimate();

/* 
 * Retrieve this value with:
 * $woocommerce_delivery_estimate_options = get_option( 'woocommerce_delivery_estimate_option_name' ); // Array of All Options
 * $_estimated_processing_time_0 = $woocommerce_delivery_estimate_options['_estimated_processing_time_0']; //  Estimated processing time
 * $estimated_delivery_time_1 = $woocommerce_delivery_estimate_options['estimated_delivery_time_1']; // Estimated delivery time
 * $delayed_delivery_time_2 = $woocommerce_delivery_estimate_options['delayed_delivery_time_2']; // Delayed delivery time
 */


// Load the theme stylesheets
function myi_styles()  
{ 
	wp_register_style( 'custom', plugins_url('custom.css',__FILE__ ));
    wp_enqueue_style( 'custom' );


}
add_action('wp_enqueue_scripts', 'myi_styles');
