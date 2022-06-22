<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

//whatIsHappening();




// Form Validation
// define variables and set to empty values
$email = $street = $streetnumber = $city = $zipcode = "";
// define variables Error and set to empty values
$emailErr = $streetErr = $streetnumberErr = $cityErr = $zipcodeErr = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
//    Check Email Input
    if (empty($_POST["email"])) {
        $emailErr = "<div class='alert alert-danger'>Email is required</div>";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "<div class='alert alert-danger'>Invalid email format</div>";
        }
    }
    if (empty($_POST["street"])) {
//        Check Street input
        $streetErr = "<div class='alert alert-danger'>Street is required</div>";
    } else {
        $street = test_input($_POST["street"]);
        if (!preg_match("/^[a-zA-Z' ]*$/", $street)) {
            $streetErr = "<div class='alert alert-danger'>Only letters and white space allowed</div>";
        }
    }
    if (empty($_POST["city"])) {
//        Check City input
        $cityErr = "<div class='alert alert-danger'>City is required</div>";
    } else {
        $city = test_input($_POST["city"]);
        if (!preg_match("/^[a-zA-Z' ]*$/", $city)) {
            $cityErr = "<div class='alert alert-danger'>Invalid City</div>";
        }
    }

    if (empty($_POST["streetnumber"])) {
//        Check street number input
        $streetnumberErr = "<div class='alert alert-danger'>Street is required</div>";
    } else {
        $streetnumber = test_input($_POST["zipcode"]);
        if (preg_match('/^[0-9]{5}([- ]?[0-9]{4})?$/', $street)) {
            $streetnumberErr = "<div class='alert alert-danger'>Street is checked</div>";
        }
    }

    if (empty($_POST["zipcode"])) {
//        Check Zip Code input
        $zipcodeErr = "<div class='alert alert-danger'>Zipcode is required</div>";
    } else {
        $zipcode = test_input($_POST["zipcode"]);
        if (preg_match('/^[0-9]{10}$/', $zipcode)) {
            $zipcodeErr = "<div class='alert alert-danger'>Zipcode is checked</div>";
        }
    }
}

function test_input($data)
{
    $data = trim($data); //Removes whitespace or other predefined characters from the right side of a string
    $data = stripcslashes($data); //The stripslashes() function removes backslashes
    $data = htmlspecialchars($data); //The htmlspecialchars() function converts some predefined characters to HTML entities
    return $data;
}

// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Tintin n the way', 'price' => 10],
    ['name' => 'Haddock striding', 'price' => 15],
    ['name' => 'Tintin astronaut', 'price' => 20],
    ['name' => 'Tintin rocket', 'price' => 30],
    ['name' => 'Snowy with a bone', 'price' => 35],
    ['name' => 'T-shirt Haddock Wouah Blanc', 'price' => 76],
    ['name' => 'Teapot', 'price' => 54.95],
    ['name' => 'Tintin au Congo - Coffret Litho', 'price' => 100],

];
////var_dump($products);
function selectedProducts($products)
{
    if (isset($_POST["products"])) {
        $totalPrice = 0;
        foreach ($_POST['products'] as $key  => $product) {
//            var_dump($product);
            $selection = implode(": ", $products[$key]);
            echo $selection . "<br>";
            $price = $products[$product]['price'];
            echo $price;
            $totalPrice += $price;
        }
        return $totalPrice;
    }
}

$totalValue = selectedProducts($products);



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
    if (isset($_POST["submit"])) {

    }


    require 'form-view.php';




