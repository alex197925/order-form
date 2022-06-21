<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}


// Form Validation
// define variables and set to empty values
$email = $street = $streetnumber = $city = $zipcode = "";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = test_input($_POST["email"]);
    $street = test_input($_POST["street"]);
    $streetnumber = test_input($_POST["streetnumber"]);
    $city = test_input($_POST["city"]);
    $zipcode = test_input($_POST["zipcode"]);

}





function test_input($data) {
    $data = trim($data); //Removes whitespace or other predefined characters from the right side of a string
    $data = stripcslashes($data); //The stripslashes() function removes backslashes
    $data = htmlspecialchars($data); //The htmlspecialchars() function converts some predefined characters to HTML entities
    return $data;
}











// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Tintin n the way', 'price' => 24.50],
    ['name' => 'Haddock striding', 'price' => 22.50],
    ['name' => 'Tintin astronaut',  'price' => 19.00],
    ['name' => 'Tintin rocket', 'price' => 29.95],
    ['name' => 'Snowy with a bone', 'price' => 19.99],
    ['name' => 'T-shirt Haddock Wouah Blanc', 'price' => 34.95],
    ['name' => 'Teapot', 'price' => 54.95],
    ['name' => 'Tintin au Congo - Coffret Litho', 'price' => 99.95]

];

$totalValue = 0;

function validate()
{
    // TODO: This function will send a list of invalid fields back
    return [];
}

function handleForm()
{
    // TODO: form related tasks (step 1)

    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission
    }
}

// TODO: replace this if by an actual check
$formSubmitted = false;
if ($formSubmitted) {
    handleForm();
}

require 'form-view.php';