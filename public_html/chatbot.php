<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userMessage = strtolower(trim($_POST["message"]));
    $botReply = "Sorry, I don't understand. Try asking something else.";

    // Keyword-response map
    $responses = [
        "hello" => "Hi! Welcome to the Zoo. How can I assist you?",
        "hi" => "Hi! Welcome to the Zoo. How can I assist you?",
        "bye" => "Goodbye! Have a great day at the zoo.",
        "tiger" => "The tiger enclosure is near Gate 2.",
        "lion" => "The lion enclosure is near the central fountain.",
        "elephant" => "The elephants are kept near Zone B in the eastern wing.",
        "map" => "You can get a printed zoo map at the entrance or download it from our website.",
        "ticket" => "The ticket price is ₹60 for adults and ₹20 for children and ₹30 for Student.",
        "price" =>  "The ticket price is ₹60 for adults and ₹20 for children and ₹30 for Student.",
        "cost" =>  "The ticket price is ₹60 for adults and ₹20 for children and ₹30 for Student.",
        "time" => "The zoo is open from Monday to Sunday, 9:00 AM to 6:00 PM IST.",
        "timing" => "The zoo is open from Monday to Sunday, 9:00 AM to 6:00 PM IST.",
        "open" => "The zoo is open from Monday to Sunday, 9:00 AM to 6:00 PM IST.",
        "food" => "Yes, we have food courts near Gate 1 and the Safari section.",
        "canteen" => "Yes, we have food courts near Gate 1 and the Safari section.",
        "restaurant" => "Yes, we have food courts near Gate 1 and the Safari section.",
        "parking" => "Yes, parking is available near Gate 1 and Gate 3.",
        "wheelchair" => "Yes, the zoo is wheelchair accessible.",
        "accessible" => "Yes, the zoo is wheelchair accessible.",
        "zebra" => "Zebras are in the Savannah zone near the safari trail.",
        "monkey" => "Monkeys are in the enclosure beside the bird aviary.",
        "penguin" => "Penguins are near the Arctic zone, beside the aquarium.",
        "giraffe" => "Giraffes are in the Safari section near the zebra trail.",
        "show" => "Daily animal shows happen at 11 AM and 3 PM near the amphitheater.",
        "animal show" => "Daily animal shows happen at 11 AM and 3 PM near the amphitheater.",
        "first aid" => "First aid is available near Gate 1.",
        "hospital" => "First aid is available near Gate 1.",
        "lost" => "Please visit Lost & Found at the main entrance.",
        "lost item" => "Please visit Lost & Found at the main entrance.",
        "souvenir" => "The gift shop is beside the main entrance.",
        "gift" => "The gift shop is beside the main entrance.",
        "guide" => "Zoo guides are available at the entrance or you can use our mobile app.",
        "school" => "Special discounts are available for school or group bookings.",
        "group" => "Special discounts are available for school or group bookings.",
        "contact" => "Call us at +91-85398 15985 or visit the helpdesk near Gate 1.",
        "help" => "Call us at +91-85398 15985 or visit the helpdesk near Gate 1.",
		"address" => "Kamla Nehru Zoological Garden Kankaria Lake, Kankaria,Ahmedabad, Gujarat 380002, INDIA",
        "location" => "Kamla Nehru Zoological Garden Kankaria Lake, Kankaria,Ahmedabad, Gujarat 380002, INDIA",
		
    ];

    // Match exact or partial keyword
    foreach ($responses as $keyword => $reply) {
        if (strpos($userMessage, $keyword) !== false) {
            $botReply = $reply;
            echo json_encode(["reply" => $botReply]);
            exit;
        }
    }

    // Spelling suggestion (find similar keyword)
    $maxSimilarity = 0;
    $closestMatch = "";
    foreach ($responses as $keyword => $_) {
        similar_text($userMessage, $keyword, $percent);
        if ($percent > $maxSimilarity) {
            $maxSimilarity = $percent;
            $closestMatch = $keyword;
        }
    }

    if ($maxSimilarity >= 70) {
        $botReply = "Did you mean '$closestMatch'? Try typing that.";
    }

    echo json_encode(["reply" => $botReply]);
    exit;
	
}
?>
