<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    if (!empty($title)) {
        $apiUrl = "http://localhost:3000/todos"; // Change this to your actual Node.js backend URL
        $data = json_encode(["title" => $title]);

        // Use cURL to send a POST request to the backend
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        // Redirect back to the main page after adding a new ToDo
        header("Location: index.php");
    }
}

