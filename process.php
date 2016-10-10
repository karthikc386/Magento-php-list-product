<?php

$env = file_get_contents('env.json');
$env = json_decode($env, true);

require_once('curl_lib.php');
require_once('template.php');

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
// if any of these variables don't exist, add an error to our $errors array

if (empty($_POST['username']))
    $errors['username'] = 'User Name is required.';

if (empty($_POST['userpassword']))
    $errors['userpassword'] = 'Password is required.';

if (empty($_POST['requestAPI']))
    $errors['requestAPI'] = 'Requested API is required.';

// if there are any errors in our errors array, return a success boolean of false
if ( ! empty($errors)) {

    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} 
else 
{
    // show a message of success and provide a true success variable
    $curl_obj        = new Curl();
    $login_data      =  array("username" => $_POST['username'], "password" => $_POST['userpassword']);
    $token           = $curl_obj->getToken($env['request_url'],$login_data);

    //Check for User Authentication
    if(is_string($token))
    {
        $data['success'] = true;
        $data['message'] = 'Success!';
        $product_data    = $curl_obj->getProduct($env['request_url'],$token);
        $data['details'] = generate_template($product_data->items);
    }
    else 
    {
        $data['success']   = false;
        $errors['message'] = $token->message;
        $data['errors']    = $errors;
    }    


}

// return all our data to an AJAX call
echo json_encode($data);
