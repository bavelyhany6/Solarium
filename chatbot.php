<?php

$faqs = [
    "why solar" => "Solar energy is sustainable, reduces electricity bills, and increases property value.",
    "benefits of solar energy" => "Solar energy reduces carbon footprint and provides low-cost power solutions.",
    "how much does it cost" => 'The cost of solar panels depends on your case and power consumption. You can contact us <a href="form.php" target="_blank">HERE</a> to get a more specific answer.'
    // Add more predefined questions and answers as needed
];

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = strtolower(trim($_POST['message']));
    $url = "https://www.facebook.com/profile.php?id=61560313323311&mibextid=ZbWKwL";
    $linktext = "Facebook page";
    $sabry = "<a href=\"$url\" target=\"_blank\">$linktext</a>";
    $response = 'For more questions and inquiries, you can contact us on our WhatsApp or a phone call at 01211122057 or a message on our ' . $sabry;

    if (array_key_exists($message, $faqs)) {
        $response = $faqs[$message];
    }

    echo json_encode(['response' => $response]);
}
?>