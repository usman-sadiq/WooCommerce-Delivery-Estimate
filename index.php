<?php

/*

Plugin Name: WooCommerce Delivery Estimate

Plugin URI: https://wordpress.org/plugins/

Description: Plugin for WooCommerce Delivery Estimate by Usman.

Version: 1.0

Author: Usman

Author URI: https://profiles.wordpress.org/usmanpu/

License: GPLv2 or later

Text Domain: woocommerce-delivery-estimate
Domain Path: /languages

*/



load_plugin_textdomain( 'woocommerce-delivery-estimate', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
// My Shortcode for order
function wp_demo_shortcode() { 
	
$woocommerce_delivery_estimate_options = get_option( 'woocommerce_delivery_estimate_option_name' ); // Array of All Options

if (isset($woocommerce_delivery_estimate_options['enable_processing_phase_0'])) {
 $enable_processing_phase_0 = $woocommerce_delivery_estimate_options['enable_processing_phase_0'];
 $variable = $woocommerce_delivery_estimate_options['estimated_processing_time_1']; // Estimated processing time
  $select_highlighted_color_2 = $woocommerce_delivery_estimate_options['select_highlighted_color_2']; // Select Highlighted Color
  $headline_text_3 = $woocommerce_delivery_estimate_options['headline_text_3']; // Headline Text
  $headline_text_300 = $woocommerce_delivery_estimate_options['headline_text_300']; // 
  $shipping_text_4 = $woocommerce_delivery_estimate_options['shipping_text_4']; // Shipping Text
  $expected_delivery_date_text_5 = $woocommerce_delivery_estimate_options['expected_delivery_date_text_5']; // Expected delivery date Text
	} // Enable Processing phase

if (isset($woocommerce_delivery_estimate_options['enable_delivery_time_6'])) {
	$enable_delivery_time_6 = $woocommerce_delivery_estimate_options['enable_delivery_time_6']; // Enable Delivery time
 $variable1 = $woocommerce_delivery_estimate_options['estimated_delivery_time_7']; // Estimated Delivery time
 $select_highlighted_color_8 = $woocommerce_delivery_estimate_options['select_highlighted_color_8']; // Select Highlighted Color
 $headline_text_9 = $woocommerce_delivery_estimate_options['headline_text_9']; // Headline Text
 $headline_text_400 = $woocommerce_delivery_estimate_options['headline_text_400']; // 
 $shipping_text_10 = $woocommerce_delivery_estimate_options['shipping_text_10']; // Shipping Text
 $expected_delivery_date_text_11 = $woocommerce_delivery_estimate_options['expected_delivery_date_text_11']; // Expected delivery date Text
}

 if (isset($woocommerce_delivery_estimate_options['enable_delayed_delivery_time_12'])) {
	 
	 $enable_delayed_delivery_time_12 = $woocommerce_delivery_estimate_options['enable_delayed_delivery_time_12']; // Enable Delayed delivery time
 $variable2 = $woocommerce_delivery_estimate_options['estimated_delayed_delivery_time_13']; // Estimated Delayed Delivery time
 $select_highlighted_color_14 = $woocommerce_delivery_estimate_options['select_highlighted_color_14']; // Select Highlighted Color
 $headline_text_15 = $woocommerce_delivery_estimate_options['headline_text_15']; // Headline Text
 $headline_text_500 = $woocommerce_delivery_estimate_options['headline_text_500']; // Headline Text
 $shipping_text_16 = $woocommerce_delivery_estimate_options['shipping_text_16']; // Shipping Text
 $expected_delivery_date_text_107 = $woocommerce_delivery_estimate_options['expected_delivery_date_text_107'];
 $expected_delivery_date_text_17 = $woocommerce_delivery_estimate_options['expected_delivery_date_text_17']; // Expected delivery date Text
 }
 




	
echo '<form action="">
  <label for="fname">'; _e( 'Order Number:', 'woocommerce-delivery-estimate' );

echo '</label><br>
  <input type="text" id="number" name="number" placeholder="';
  _e( 'Enter your Order Number/Id', 'woocommerce-delivery-estimate' );
echo '"><br>
  <label for="lname">';
  _e( 'Email:', 'woocommerce-delivery-estimate' );
  echo '</label><br>
  <input type="email" id="email" name="email" placeholder="';
  _e( 'Enter your Email', 'woocommerce-delivery-estimate' );
  
   echo '"><br>
  <input type="submit" id="track-order" value="';
  _e( ' Check Order Status', 'woocommerce-delivery-estimate' );
 
  echo '">
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
	   echo '<table class="my-table">
  <tr>
    <th>';
 _e( 'Item', 'woocommerce-delivery-estimate' );
 echo '</th>
    <th>';
  _e( 'Quantity', 'woocommerce-delivery-estimate' );
echo '</th>
  </tr>';
	
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

    echo'<tr><td>'  .$product_name.  '</td>
    <td>'  .$quantity.  '</td></tr>';
}
echo'</table>';
 
 echo '<table class="my-table">
  <tr>
    <th>';
 _e( 'Item', 'woocommerce-delivery-estimate' );
 echo '</th>
    <th>';
  _e( 'Quantity', 'woocommerce-delivery-estimate' );
echo '</th>
  </tr>
  <tr>
    <td>'  .$product_name.  '</td>
    <td>'  .$quantity.  '</td>
  </tr>
  
</table>';
 
 
 

$date = date("Y/m/d");
$days1 = "0";
$days01 = "0";
$days11 = "0";
$expect = "0";
$expect1 = "0";
$expect2 = "0";
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
			   
			  
			  function dateDiffInDays($date1, $date2) 
  {
      // Calculating the difference in timestamps
      $diff = strtotime($date2) - strtotime($date1);
  
      // 1 day = 24 hours
      // 24 * 60 * 60 = 86400 seconds
      return abs(round($diff / 86400));
  }
  
   $date1 = strtotime($date);
  $date2 = strtotime($newDate);
  // Start date
  $date1 = ($newDate);
  
  // End date
  $date2 = ($date);
  
  // Function call to find date difference
  $dateDiff = dateDiffInDays($date1, $date2);
  
  
			  
 
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
 $expect0 = date("d F", strtotime($first));
 if (isset($variable))
{
	
 $expect = date("d F", strtotime($first. " + {$variable} days"));

	
	
	$date0 = strtotime($expect0);
  $date01 = strtotime($expect);
 
  // Formulate the Difference between two dates
  $diff01 = abs($date01 - $date0);
 
  // To get the year divide the resultant date into
  // total seconds in a year (365*60*60*24)
  $years01 = floor($diff01 / (365*60*60*24));
 
  // To get the month, subtract it with years and
  // divide the resultant date into
  // total seconds in a month (30*60*60*24)
  $months01 = floor(($diff01 - $years01 * 365*60*60*24)
                                 / (30*60*60*24));
 
  // To get the day, subtract it with years and
  // months and divide the resultant date into
  // total seconds in a days (60*60*24)
  $days01 = floor(($diff01 - $years01 * 365*60*60*24 -
               $months01*30*60*60*24)/ (60*60*24));
}
if (isset($variable1))
{
	$expect1 = date("d F", strtotime($expect. " + {$variable1} days"));
	
	
  $date11 = strtotime($expect0);
  $date12 = strtotime($expect1);
 
  // Formulate the Difference between two dates
  $diff1 = abs($date12 - $date11);
 
  // To get the year divide the resultant date into
  // total seconds in a year (365*60*60*24)
  $years1 = floor($diff1 / (365*60*60*24));
 
  // To get the month, subtract it with years and
  // divide the resultant date into
  // total seconds in a month (30*60*60*24)
  $months1 = floor(($diff1 - $years1 * 365*60*60*24)
                                 / (30*60*60*24));
 
  // To get the day, subtract it with years and
  // months and divide the resultant date into
  // total seconds in a days (60*60*24)
  $days1 = floor(($diff1 - $years1 * 365*60*60*24 -
               $months1*30*60*60*24)/ (60*60*24));
}

if (isset($variable2))
{
	$expect2 = date("d F", strtotime($expect1. " + {$variable2} days"));



 $dates1 = strtotime($expect0);
  $dates2 = strtotime($expect2);
  // Start date
  $dates1 = ($expect2);
  
  // End date
  $dates2 = ($expect0);
  
  // Function call to find date difference
  $days11 = dateDiffInDays($dates1, $dates2);
  

	
}



echo $days01;
echo "<br>";
echo $days1;
echo "<br>";
echo $days11;
echo "<br>";
echo $expect0;
echo "<br>";
echo $expect;
echo "<br>";
echo $expect1;
echo "<br>";
echo $expect2;
echo "<br>";

$nmeng = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$nmtur = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'décembre');
$expect0 = str_ireplace($nmeng, $nmtur, $expect0);
$expect = str_ireplace($nmeng, $nmtur, $expect);
$expect1 = str_ireplace($nmeng, $nmtur, $expect1);
$expect2 = str_ireplace($nmeng, $nmtur, $expect2);



if ($dateDiff <= $days01)
{
	
	
	echo '<div class="order-box"><h2>' .$headline_text_3.' '. "".'<span style=color:'.$select_highlighted_color_2.'>'.$headline_text_300.'</span> </h2>
<div class="progress-bar-container">
                              <div class="progress-bar delayed" style=background:'.$select_highlighted_color_2.'></div>
                          </div><h5>'.$shipping_text_4. ' '."".' ' .$billing_address_1. ' ' . $billing_city. ' ' .$billing_postcode.  ' ' .$billing_state. ' ' .$billing_country.'</h5>
<p>'.$expected_delivery_date_text_5.'<br>'.$expect0.' - '.$expect.'</p>
</div>';

}


elseif ($dateDiff <= $days1)
{
	
	
	echo '<div class="order-box"><h2>' .$headline_text_9.' '. "".'<span style=color:'.$select_highlighted_color_8.'>'.$headline_text_400.'</span> </h2>
<div class="progress-bar-container">
                              <div class="progress-bar delayed" style=background:'.$select_highlighted_color_8.'></div>
                          </div><h5>'.$shipping_text_10. ' '."".' ' .$billing_address_1. ' ' . $billing_city. ' ' .$billing_postcode.  ' ' .$billing_state. ' ' .$billing_country.'</h5>
<p>'.$expected_delivery_date_text_11.'<br>'.$expect.' - '.$expect1.'</p>
</div>';
	
	
}


elseif ($dateDiff <= $days11)
{
	
	
	echo '<div class="order-box"><h2>';
printf(
    /* translators: %s: Name of a city */
    __( '%1s.', 'woocommerce-delivery-estimate' ),
    $headline_text_15
);	
	echo'<span style=color:'.$select_highlighted_color_14.'>'.$headline_text_500.'</span> </h2>
<div class="progress-bar-container">
                              <div class="progress-bar delayed" style=background:'.$select_highlighted_color_14.'></div>
                          </div><h5>'.$shipping_text_16. ' '."".' ' .$billing_address_1. ' ' . $billing_city. ' ' .$billing_postcode.  ' ' .$billing_state. ' ' .$billing_country.'</h5>
<p>'.$expected_delivery_date_text_107.'</p><p>'.$expected_delivery_date_text_17.'<br>'.$expect1.' - '.$expect2.'</p>
</div>';
	
	
}

else
{
	
	echo '<div class="order-box"><h2>';
	_e( 'Status of order: ', 'woocommerce-delivery-estimate' );
	 echo '<span style="color: #1e73be">';
	 _e( 'Delivered', 'woocommerce-delivery-estimate' );
	 echo '</span> </h2>
<div class="progress-bar-container">
                              <div class="progress-bar delayed deliverd" style="background: #1e73be"></div>
                          </div>
<h5>';
 _e( 'Delivered To:', 'woocommerce-delivery-estimate' );
echo $billing_address_1. ' ' . $billing_city. ' ' .$billing_postcode.  ' ' .$billing_state. ' ' .$billing_country.'</h5>
<p>';
_e( 'Havent recieved your package yet ', 'woocommerce-delivery-estimate' );
echo '<a class="" href="https://hippopromos.com/contact-us/">';
_e( 'Let us know', 'woocommerce-delivery-estimate' );
echo '</a></p>
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
	
	 _e( 'Not Found. Plz enter a valid Email Address', 'woocommerce-delivery-estimate' );
}
}
else
{
	_e( 'Not Found. Plz enter a valid order Number', 'woocommerce-delivery-estimate' );
	
}
}

else{
	_e( 'Plz Enter your order details', 'woocommerce-delivery-estimate' );
 
}




} 
add_shortcode('user-order', 'wp_demo_shortcode'); 
/**
 
 */
/*
// Settings Page: WooCommerceDeliveryEstimate
// Retrieving values: get_option( 'your_field_id' )
class WooCommerceDeliveryEstimate_Settings_Page {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wph_create_settings' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_sections' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_fields' ) );
	}

	public function wph_create_settings() {
		$page_title = 'WooCommerce Delivery Estimate Page';
		$menu_title = 'WooCommerce Delivery Estimate';
		$capability = 'manage_options';
		$slug = 'WooCommerceDeliveryEstimate';
		$callback = array($this, 'wph_settings_content');
                add_options_page($page_title, $menu_title, $capability, $slug, $callback);
		
	}
    
	public function wph_settings_content() { ?>
		<div class="wrap" id="d-estimate">
			<h2>WooCommerce Delivery Estimate</h2>
			<p>This is where to define the estimated date of processing, estimated date of delivery, and the delayed Estimated Delivery. Set the values for each field and the user can track the order and see the order status according to it.</p>
			<?php settings_errors(); ?>
			<form method="POST" action="options.php">
				<?php
					settings_fields( 'WooCommerceDeliveryEstimate' );
					do_settings_sections( 'WooCommerceDeliveryEstimate' );
					submit_button();
				?>
			</form>
		</div> <?php
	}

	public function wph_setup_sections() {
		add_settings_section( 'WooCommerceDeliveryEstimate_section', '', array(), 'WooCommerceDeliveryEstimate' );
	}

	public function wph_setup_fields() {
		$fields = array(
		
                    array(
                        'section' => 'WooCommerceDeliveryEstimate_section',
                        'label' => 'Estimated processings time',
                        'id' => 'estimatedprocessingstime_number',
						 'value' => 'Your order is being Processed',
                        'type' => 'checkbox',
                    ),
					
					array(
                        'section' => 'WooCommerceDeliveryEstimate_section',
                        'label' => 'Estimated processing time',
                        'id' => 'Estimated processing time_number',
                        'type' => 'number',
                    ),
					
        
                    array(
                        'section' => 'WooCommerceDeliveryEstimate_section',
                        'label' => 'Select Highlighted Color of Estimated processing time',
                        'id' => 'Select Highlighted Color of Estimated processing time_color',
                        'type' => 'color',
                    ),
        
                    array(
                        'section' => 'WooCommerceDeliveryEstimate_section',
                        'label' => 'Text for Estimated processing time',
                        'placeholder' => 'Your order is being Processed',
                        'id' => 'Text for Estimated processing time_text',
                        'type' => 'text',
                    ),
        
                    array(
                        'section' => 'WooCommerceDeliveryEstimate_section',
                        'label' => 'Shipping Text',
                        'placeholder' => 'Once we finish it will be shipped to : ',
                        'id' => 'Shipping Text_text',
                        'type' => 'text',
                    ),
        
                    array(
                        'section' => 'WooCommerceDeliveryEstimate_section',
                        'label' => 'Text for Expected delivery date',
                        'placeholder' => 'Expected delivery date : Between',
                        'id' => 'Text for Expected delivery date_text',
                        'type' => 'text',
                    )
		);
		foreach( $fields as $field ){
			add_settings_field( $field['id'], $field['label'], array( $this, 'wph_field_callback' ), 'WooCommerceDeliveryEstimate', $field['section'], $field );
			register_setting( 'WooCommerceDeliveryEstimate', $field['id'] );
		}
	}
	public function wph_field_callback( $field ) {
		$value = get_option( $field['id'] );
		$placeholder = '';
		if ( isset($field['placeholder']) ) {
			$placeholder = $field['placeholder'];
		}
		switch ( $field['type'] ) {
            
            
			default:
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
					$field['id'],
					$field['type'],
					$placeholder,
					$value
				);
		}
		if( isset($field['desc']) ) {
			if( $desc = $field['desc'] ) {
				printf( '<p class="description">%s </p>', $desc );
			}
		}
	}
    
}
new WooCommerceDeliveryEstimate_Settings_Page();
                
      */          
  
class WooCommerceDeliveryEstimate {
	private $woocommerce_delivery_estimate_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'woocommerce_delivery_estimate_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'woocommerce_delivery_estimate_page_init' ) );
	}

	public function woocommerce_delivery_estimate_add_plugin_page() {
		add_options_page(
			__( 'WooCommerce Delivery Estimate', 'woocommerce-delivery-estimate' ),
			__( 'WooCommerce Delivery Estimate', 'woocommerce-delivery-estimate' ),
			'manage_options', // capability
			'woocommerce-delivery-estimate', // menu_slug
			array( $this, 'woocommerce_delivery_estimate_create_admin_page' ) // function
		);
	}

	public function woocommerce_delivery_estimate_create_admin_page() {
		$this->woocommerce_delivery_estimate_options = get_option( 'woocommerce_delivery_estimate_option_name' ); ?>

		<div class="wrap" id="d-estimate">
		<h2><?php _e( 'WooCommerce Delivery Estimate', 'woocommerce-delivery-estimate' ); ?></h2>
			
			<p><?php _e( 'This is where to define the estimated date of processing, estimated date of delivery, and the delayed Estimated Delivery. Set the values for each field and the user can track the order status according to it.', 'woocommerce-delivery-estimate' ); ?></p>
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
			'enable_processing_phase_0', // id
			__( 'Enable Processing phase', 'woocommerce-delivery-estimate' ),
			
			array( $this, 'enable_processing_phase_0_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'estimated_processing_time_1', // id
			__( 'Estimated processing time', 'woocommerce-delivery-estimate' ),// title
			array( $this, 'estimated_processing_time_1_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'select_highlighted_color_2', // id
			__( 'Select Highlighted Color', 'woocommerce-delivery-estimate' ),// title
			array( $this, 'select_highlighted_color_2_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'headline_text_3', // id
			__( 'Headline Text', 'woocommerce-delivery-estimate' ),// title
			array( $this, 'headline_text_3_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);
		
		add_settings_field(
			'headline_text_300', // id
			__( 'Status', 'woocommerce-delivery-estimate' ),// title
			array( $this, 'headline_text_300_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'shipping_text_4', // id
			__( 'Shipping Text', 'woocommerce-delivery-estimate' ),
			array( $this, 'shipping_text_4_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'expected_delivery_date_text_5', // id
			__( 'Expected delivery date Text', 'woocommerce-delivery-estimate' ),
			
			array( $this, 'expected_delivery_date_text_5_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'enable_delivery_time_6', // id
			__( 'Enable Delivery time', 'woocommerce-delivery-estimate' ),
			
			array( $this, 'enable_delivery_time_6_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'estimated_delivery_time_7', // id
			__( 'Estimated Delivery time', 'woocommerce-delivery-estimate' ),
			
			array( $this, 'estimated_delivery_time_7_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'select_highlighted_color_8', // id
			__( 'Select Highlighted Color', 'woocommerce-delivery-estimate' ),
			
			array( $this, 'select_highlighted_color_8_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'headline_text_9', // id
			__( 'Headline Text', 'woocommerce-delivery-estimate' ),
			
			array( $this, 'headline_text_9_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);
		
		add_settings_field(
			'headline_text_400', // id
			__( 'Status', 'woocommerce-delivery-estimate' ),
			
			array( $this, 'headline_text_400_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'shipping_text_10', // id
			__( 'Shipping Text', 'woocommerce-delivery-estimate' ),
			array( $this, 'shipping_text_10_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'expected_delivery_date_text_11', // id
			__( 'Expected delivery date Text', 'woocommerce-delivery-estimate' ),
			
			array( $this, 'expected_delivery_date_text_11_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'enable_delayed_delivery_time_12', // id
			__( 'Enable Delayed delivery time', 'woocommerce-delivery-estimate' ),
			
			array( $this, 'enable_delayed_delivery_time_12_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'estimated_delayed_delivery_time_13', // id
			__( 'Estimated Delayed Delivery time', 'woocommerce-delivery-estimate' ),
			
			array( $this, 'estimated_delayed_delivery_time_13_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'select_highlighted_color_14', // id
			__( 'Select Highlighted Color', 'woocommerce-delivery-estimate' ),
			array( $this, 'select_highlighted_color_14_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'headline_text_15', // id
			__( 'Headline Text', 'woocommerce-delivery-estimate' ),
			array( $this, 'headline_text_15_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);
		
		add_settings_field(
			'headline_text_500', // id
			__( 'Status', 'woocommerce-delivery-estimate' ),
			array( $this, 'headline_text_500_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'shipping_text_16', // id
			__( 'Shipping Text', 'woocommerce-delivery-estimate' ),
			
			array( $this, 'shipping_text_16_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);
		add_settings_field(
			'expected_delivery_date_text_107', // id
			__( 'Delayed delivery time Message', 'woocommerce-delivery-estimate' ),
			
			array( $this, 'expected_delivery_date_text_107_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);

		add_settings_field(
			'expected_delivery_date_text_17', // id
			__( 'Expected delivery date Text', 'woocommerce-delivery-estimate' ),
			
			array( $this, 'expected_delivery_date_text_17_callback' ), // callback
			'woocommerce-delivery-estimate-admin', // page
			'woocommerce_delivery_estimate_setting_section' // section
		);
	}

	public function woocommerce_delivery_estimate_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['enable_processing_phase_0'] ) ) {
			$sanitary_values['enable_processing_phase_0'] = $input['enable_processing_phase_0'];
		}

		if ( isset( $input['estimated_processing_time_1'] ) ) {
			$sanitary_values['estimated_processing_time_1'] = sanitize_text_field( $input['estimated_processing_time_1'] );
		}

		if ( isset( $input['select_highlighted_color_2'] ) ) {
			$sanitary_values['select_highlighted_color_2'] = sanitize_text_field( $input['select_highlighted_color_2'] );
		}

		if ( isset( $input['headline_text_3'] ) ) {
			$sanitary_values['headline_text_3'] = sanitize_text_field( $input['headline_text_3'] );
		}
		if ( isset( $input['headline_text_300'] ) ) {
			$sanitary_values['headline_text_300'] = sanitize_text_field( $input['headline_text_300'] );
		}

		if ( isset( $input['shipping_text_4'] ) ) {
			$sanitary_values['shipping_text_4'] = sanitize_text_field( $input['shipping_text_4'] );
		}

		if ( isset( $input['expected_delivery_date_text_5'] ) ) {
			$sanitary_values['expected_delivery_date_text_5'] = sanitize_text_field( $input['expected_delivery_date_text_5'] );
		}

		if ( isset( $input['enable_delivery_time_6'] ) ) {
			$sanitary_values['enable_delivery_time_6'] = $input['enable_delivery_time_6'];
		}

		if ( isset( $input['estimated_delivery_time_7'] ) ) {
			$sanitary_values['estimated_delivery_time_7'] = sanitize_text_field( $input['estimated_delivery_time_7'] );
		}

		if ( isset( $input['select_highlighted_color_8'] ) ) {
			$sanitary_values['select_highlighted_color_8'] = sanitize_text_field( $input['select_highlighted_color_8'] );
		}

		if ( isset( $input['headline_text_9'] ) ) {
			$sanitary_values['headline_text_9'] = sanitize_text_field( $input['headline_text_9'] );
		}
		if ( isset( $input['headline_text_400'] ) ) {
			$sanitary_values['headline_text_400'] = sanitize_text_field( $input['headline_text_400'] );
		}

		if ( isset( $input['shipping_text_10'] ) ) {
			$sanitary_values['shipping_text_10'] = sanitize_text_field( $input['shipping_text_10'] );
		}

		if ( isset( $input['expected_delivery_date_text_11'] ) ) {
			$sanitary_values['expected_delivery_date_text_11'] = sanitize_text_field( $input['expected_delivery_date_text_11'] );
		}

		if ( isset( $input['enable_delayed_delivery_time_12'] ) ) {
			$sanitary_values['enable_delayed_delivery_time_12'] = $input['enable_delayed_delivery_time_12'];
		}

		if ( isset( $input['estimated_delayed_delivery_time_13'] ) ) {
			$sanitary_values['estimated_delayed_delivery_time_13'] = sanitize_text_field( $input['estimated_delayed_delivery_time_13'] );
		}

		if ( isset( $input['select_highlighted_color_14'] ) ) {
			$sanitary_values['select_highlighted_color_14'] = sanitize_text_field( $input['select_highlighted_color_14'] );
		}

		if ( isset( $input['headline_text_15'] ) ) {
			$sanitary_values['headline_text_15'] = sanitize_text_field( $input['headline_text_15'] );
		}
		if ( isset( $input['headline_text_500'] ) ) {
			$sanitary_values['headline_text_500'] = sanitize_text_field( $input['headline_text_500'] );
		}

		if ( isset( $input['shipping_text_16'] ) ) {
			$sanitary_values['shipping_text_16'] = sanitize_text_field( $input['shipping_text_16'] );
		}
		if ( isset( $input['expected_delivery_date_text_107'] ) ) {
			$sanitary_values['expected_delivery_date_text_107'] = sanitize_text_field( $input['expected_delivery_date_text_107'] );
		}

		if ( isset( $input['expected_delivery_date_text_17'] ) ) {
			$sanitary_values['expected_delivery_date_text_17'] = sanitize_text_field( $input['expected_delivery_date_text_17'] );
		}

		return $sanitary_values;
	}

	public function woocommerce_delivery_estimate_section_info() {
		
	}

	public function enable_processing_phase_0_callback() {
		printf(
			'<label class="switch" for="checkbox"><input type="checkbox" name="woocommerce_delivery_estimate_option_name[enable_processing_phase_0]" id="enable_processing_phase_0" value="enable_processing_phase_0" %s><div class="slider round"></div></label>',
			( isset( $this->woocommerce_delivery_estimate_options['enable_processing_phase_0'] ) && $this->woocommerce_delivery_estimate_options['enable_processing_phase_0'] === 'enable_processing_phase_0' ) ? 'checked' : ''
		);
	}

	public function estimated_processing_time_1_callback() {
		printf(
			'<input class="process-time regular-text" type="number" name="woocommerce_delivery_estimate_option_name[estimated_processing_time_1]" id="estimated_processing_time_1" value="%s">',
			isset( $this->woocommerce_delivery_estimate_options['estimated_processing_time_1'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['estimated_processing_time_1']) : ''
		);
	}

	public function select_highlighted_color_2_callback() {
		printf(
			'<input class="process-time regular-text" type="color" name="woocommerce_delivery_estimate_option_name[select_highlighted_color_2]" id="select_highlighted_color_2" value="%s">',
			isset( $this->woocommerce_delivery_estimate_options['select_highlighted_color_2'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['select_highlighted_color_2']) : ''
		);
	}

	public function headline_text_3_callback() {
		printf(
			'<input class="process-time regular-text" type="text" name="woocommerce_delivery_estimate_option_name[headline_text_3]" id="headline_text_3" value="%s" placeholder="">',
			isset( $this->woocommerce_delivery_estimate_options['headline_text_3'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['headline_text_3']) : ''
		);
	}
	
	public function headline_text_300_callback() {
		printf(
			'<input class="process-time regular-text" type="text" name="woocommerce_delivery_estimate_option_name[headline_text_300]" id="headline_text_300" value="%s" placeholder="">',
			isset( $this->woocommerce_delivery_estimate_options['headline_text_300'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['headline_text_300']) : ''
		);
	}

	public function shipping_text_4_callback() {
		printf(
			'<input class="process-time regular-text" type="text" name="woocommerce_delivery_estimate_option_name[shipping_text_4]" id="shipping_text_4" value="%s" placeholder="">',
			isset( $this->woocommerce_delivery_estimate_options['shipping_text_4'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['shipping_text_4']) : ''
		);
	}

	public function expected_delivery_date_text_5_callback() {
		printf(
			'<input class="process-time regular-text" type="text" name="woocommerce_delivery_estimate_option_name[expected_delivery_date_text_5]" id="expected_delivery_date_text_5" value="%s" placeholder="">',
			isset( $this->woocommerce_delivery_estimate_options['expected_delivery_date_text_5'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['expected_delivery_date_text_5']) : ''
		);
	}

	public function enable_delivery_time_6_callback() {
		printf(
			'<label class="switch" for="checkbox"><input type="checkbox" name="woocommerce_delivery_estimate_option_name[enable_delivery_time_6]" id="enable_delivery_time_6" value="enable_delivery_time_6" %s><div class="slider round"></div></label>',
			( isset( $this->woocommerce_delivery_estimate_options['enable_delivery_time_6'] ) && $this->woocommerce_delivery_estimate_options['enable_delivery_time_6'] === 'enable_delivery_time_6' ) ? 'checked' : ''
		);
	}

	public function estimated_delivery_time_7_callback() {
		printf(
			'<input class="delivery-time regular-text" type="number" name="woocommerce_delivery_estimate_option_name[estimated_delivery_time_7]" id="estimated_delivery_time_7" value="%s">',
			isset( $this->woocommerce_delivery_estimate_options['estimated_delivery_time_7'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['estimated_delivery_time_7']) : ''
		);
	}

	public function select_highlighted_color_8_callback() {
		printf(
			'<input class="delivery-time regular-text" type="color" name="woocommerce_delivery_estimate_option_name[select_highlighted_color_8]" id="select_highlighted_color_8" value="%s">',
			isset( $this->woocommerce_delivery_estimate_options['select_highlighted_color_8'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['select_highlighted_color_8']) : ''
		);
	}

	public function headline_text_9_callback() {
		printf(
			'<input class="delivery-time regular-text" type="text" name="woocommerce_delivery_estimate_option_name[headline_text_9]" id="headline_text_9" value="%s" placeholder="">',
			isset( $this->woocommerce_delivery_estimate_options['headline_text_9'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['headline_text_9']) : ''
		);
	}
	
	public function headline_text_400_callback() {
		printf(
			'<input class="delivery-time regular-text" type="text" name="woocommerce_delivery_estimate_option_name[headline_text_400]" id="headline_text_400" value="%s" placeholder="">',
			isset( $this->woocommerce_delivery_estimate_options['headline_text_400'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['headline_text_400']) : ''
		);
	}

	public function shipping_text_10_callback() {
		printf(
			'<input class="delivery-time regular-text" type="text" name="woocommerce_delivery_estimate_option_name[shipping_text_10]" id="shipping_text_10" value="%s" placeholder="">',
			isset( $this->woocommerce_delivery_estimate_options['shipping_text_10'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['shipping_text_10']) : ''
		);
	}

	public function expected_delivery_date_text_11_callback() {
		printf(
			'<input class="delivery-time regular-text" type="text" name="woocommerce_delivery_estimate_option_name[expected_delivery_date_text_11]" id="expected_delivery_date_text_11" value="%s" placeholder="">',
			isset( $this->woocommerce_delivery_estimate_options['expected_delivery_date_text_11'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['expected_delivery_date_text_11']) : ''
		);
	}

	public function enable_delayed_delivery_time_12_callback() {
		printf(
			'<label class="switch" for="checkbox"><input type="checkbox" name="woocommerce_delivery_estimate_option_name[enable_delayed_delivery_time_12]" id="enable_delayed_delivery_time_12" value="enable_delayed_delivery_time_12" %s><div class="slider round"></div></label>',
			( isset( $this->woocommerce_delivery_estimate_options['enable_delayed_delivery_time_12'] ) && $this->woocommerce_delivery_estimate_options['enable_delayed_delivery_time_12'] === 'enable_delayed_delivery_time_12' ) ? 'checked' : ''
		);
	}

	public function estimated_delayed_delivery_time_13_callback() {
		printf(
			'<input class="delayed-delivery-time regular-text" type="number" name="woocommerce_delivery_estimate_option_name[estimated_delayed_delivery_time_13]" id="estimated_delayed_delivery_time_13" value="%s">',
			isset( $this->woocommerce_delivery_estimate_options['estimated_delayed_delivery_time_13'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['estimated_delayed_delivery_time_13']) : ''
		);
	}

	public function select_highlighted_color_14_callback() {
		printf(
			'<input class="delayed-delivery-time regular-text" type="color" name="woocommerce_delivery_estimate_option_name[select_highlighted_color_14]" id="select_highlighted_color_14" value="%s">',
			isset( $this->woocommerce_delivery_estimate_options['select_highlighted_color_14'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['select_highlighted_color_14']) : ''
		);
	}

	public function headline_text_15_callback() {
		printf(
			'<input class="delayed-delivery-time regular-text" type="text" name="woocommerce_delivery_estimate_option_name[headline_text_15]" id="headline_text_15" value="%s" placeholder="">',
			isset( $this->woocommerce_delivery_estimate_options['headline_text_15'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['headline_text_15']) : ''
		);
	}
	
	public function headline_text_500_callback() {
		printf(
			'<input class="delayed-delivery-time regular-text" type="text" name="woocommerce_delivery_estimate_option_name[headline_text_500]" id="headline_text_500" value="%s" placeholder="">',
			isset( $this->woocommerce_delivery_estimate_options['headline_text_500'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['headline_text_500']) : ''
		);
	}

	public function shipping_text_16_callback() {
		printf(
			'<input class="delayed-delivery-time regular-text" type="text" name="woocommerce_delivery_estimate_option_name[shipping_text_16]" id="shipping_text_16" value="%s" placeholder="">',
			isset( $this->woocommerce_delivery_estimate_options['shipping_text_16'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['shipping_text_16']) : ''
		);
	}
	
	public function expected_delivery_date_text_107_callback() {
		printf(
			'<input class="delayed-delivery-time regular-text" type="text" name="woocommerce_delivery_estimate_option_name[expected_delivery_date_text_107]" id="expected_delivery_date_text_107" value="%s" placeholder="">',
			isset( $this->woocommerce_delivery_estimate_options['expected_delivery_date_text_107'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['expected_delivery_date_text_107']) : ''
		);
	}
	
	public function expected_delivery_date_text_17_callback() {
		printf(
			'<input class="delayed-delivery-time regular-text" type="text" name="woocommerce_delivery_estimate_option_name[expected_delivery_date_text_17]" id="expected_delivery_date_text_17" value="%s" placeholder="">',
			isset( $this->woocommerce_delivery_estimate_options['expected_delivery_date_text_17'] ) ? esc_attr( $this->woocommerce_delivery_estimate_options['expected_delivery_date_text_17']) : ''
		);
	}

}
if ( is_admin() )
	$woocommerce_delivery_estimate = new WooCommerceDeliveryEstimate();

/* 
 * Retrieve this value with:
 * $woocommerce_delivery_estimate_options = get_option( 'woocommerce_delivery_estimate_option_name' ); // Array of All Options
 * $enable_processing_phase_0 = $woocommerce_delivery_estimate_options['enable_processing_phase_0']; // Enable Processing phase
 * $estimated_processing_time_1 = $woocommerce_delivery_estimate_options['estimated_processing_time_1']; // Estimated processing time
 * $select_highlighted_color_2 = $woocommerce_delivery_estimate_options['select_highlighted_color_2']; // Select Highlighted Color
 * $headline_text_3 = $woocommerce_delivery_estimate_options['headline_text_3']; // Headline Text
 * $shipping_text_4 = $woocommerce_delivery_estimate_options['shipping_text_4']; // Shipping Text
 * $expected_delivery_date_text_5 = $woocommerce_delivery_estimate_options['expected_delivery_date_text_5']; // Expected delivery date Text
 * $enable_delivery_time_6 = $woocommerce_delivery_estimate_options['enable_delivery_time_6']; // Enable Delivery time
 * $estimated_delivery_time_7 = $woocommerce_delivery_estimate_options['estimated_delivery_time_7']; // Estimated Delivery time
 * $select_highlighted_color_8 = $woocommerce_delivery_estimate_options['select_highlighted_color_8']; // Select Highlighted Color
 * $headline_text_9 = $woocommerce_delivery_estimate_options['headline_text_9']; // Headline Text
 * $shipping_text_10 = $woocommerce_delivery_estimate_options['shipping_text_10']; // Shipping Text
 * $expected_delivery_date_text_11 = $woocommerce_delivery_estimate_options['expected_delivery_date_text_11']; // Expected delivery date Text
 * $enable_delayed_delivery_time_12 = $woocommerce_delivery_estimate_options['enable_delayed_delivery_time_12']; // Enable Delayed delivery time
 * $estimated_delayed_delivery_time_13 = $woocommerce_delivery_estimate_options['estimated_delayed_delivery_time_13']; // Estimated Delayed Delivery time
 * $select_highlighted_color_14 = $woocommerce_delivery_estimate_options['select_highlighted_color_14']; // Select Highlighted Color
 * $headline_text_15 = $woocommerce_delivery_estimate_options['headline_text_15']; // Headline Text
 * $shipping_text_16 = $woocommerce_delivery_estimate_options['shipping_text_16']; // Shipping Text
 * $expected_delivery_date_text_17 = $woocommerce_delivery_estimate_options['expected_delivery_date_text_17']; // Expected delivery date Text
 */

              

// Load the theme stylesheets
function myi_styles()  
{ 
	wp_register_style( 'custom', plugins_url('custom.css',__FILE__ ));
    wp_enqueue_style( 'custom' );


}
add_action('wp_enqueue_scripts', 'myi_styles');
function yournamespace_enqueue_scripts( $hook ) {

   global $wph_settings_page;
 
 if(is_page('WooCommerceDeliveryEstimate')){
       return;
    }

		

    wp_enqueue_script( 
        'your_script_handle',                         // Handle
        plugins_url( '/yourfilename.js', __FILE__ ),  // Path to file
        array( 'jquery' )                             // Dependancies
    );
}
add_action( 'admin_enqueue_scripts', 'yournamespace_enqueue_scripts', 2000 );

add_action( 'admin_enqueue_scripts', 'my_admin_style');

function my_admin_style() {
	wp_enqueue_style( 
        'admin-style',                         // Handle
        plugins_url( '/yourfilename.css', __FILE__ )
		);
 
}