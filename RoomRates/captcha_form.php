<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $recaptchaSecretKey = "6LfrofUqAAAAAIGjlgM65VZXK5mLmLO0Hq_EbNLF";
    $recaptchaResponse = $_POST["g-recaptcha-response"];

    $verifyURL = "https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaResponse";

    $response = file_get_contents($verifyURL);
    $responseData = json_decode($response);

    if ($responseData->success) {
        echo "Form submitted successfully!";
    } else {
        echo "reCAPTCHA verification failed. Please try again.";
    }
}
?>