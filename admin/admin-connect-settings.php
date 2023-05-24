
<?php
add_action( 'admin_menu', 'wp_state_city_dropdown_create_menu' );
// Set Flex slider's menu.
function wp_state_city_dropdown_create_menu() {
	// create new top-level menu.
	add_menu_page( 'state_city_dropdown Settings', 'state_city_dropdown Settings', 'administrator', __FILE__, 'wp_state_city_dropdown_settings_page' );
}


function wp_state_city_dropdown_settings_page()
{
?>

<div>
        <h1>Contactform Setting Page</h1>
        
        <?php

global $wpdb;
$sql=$wpdb->get_results("SELECT Id, name FROM wp_state" );?>

    <select id="dropdown1" name="dropdown1" onchange="fetchDropdown2Data(this)">
<option value="">Select a State</option>
<?php foreach ( $sql as $result ) : ?>
<option value="<?php echo esc_attr( $result->Id ); ?>">
    <?php echo esc_html( $result->name ); ?>
</option>
<?php endforeach; ?>
</select>
</div> 

<select id="city" name="city">

</select>
<br> <br>

</form>


<script>
    function fetchDropdown2Data(sid)
    {

        alert(sid.value)


jQuery.ajax({
    type: 'POST',
   url: '/plugin2/wp-admin/admin-ajax.php',
   dataType: 'html',
    data: {
     action: 'load_more',
     sid: sid.value
    },
    

    success: function (res) {
        // alert(res)  

        // let len = res.length; 

        // alert("The length is "+len)
           
            jQuery("#city").append(res);


        

        }

    })
} 
    </script>

<?php } ?>

