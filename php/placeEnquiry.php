<?php
const HOSTNAME = "localhost";
const USERNAME = "root";
const PASSWORD = "1234";
const DATABASE = "photography";
const PORT = 3306;

if (isset($_POST)) {
    $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE, PORT);
    $data = file_get_contents("php://input");
    $formData = json_decode($data);
    if ($conn) {

        $name = $formData->name;
        $email = $formData->email;
        $phone = $formData->phone;
        $event_date = $formData->event_date;
        $location = $formData->location;
        $message = $formData->message;


        $sql1 = "INSERT INTO enquiries (name, email, phone, event_date, location, message) VALUES('{$name}', '{$email}', '{$phone}', '{$event_date}', '{$location}', '{$message}');";
        $stmt1 = mysqli_query($conn, $sql1);
        echo "Enquiry Placed Successfully";
    }
} else {
    echo ("Connection failed: " . mysqli_connect_error($conn));
}
