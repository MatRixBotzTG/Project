<?php
include("../includes/db.php");
include("../includes/functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitize($_POST['name']);
    $age = intval($_POST['age']);
    $email = sanitize($_POST['email']);
    $country = sanitize($_POST['country']);
    $state = sanitize($_POST['state']);
    $location = sanitize($_POST['location']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, age, email, country, state, location, password, type, approved) VALUES (?, ?, ?, ?, ?, ?, ?, 'worker', 1)");
    $stmt->bind_param("sisssss", $name, $age, $email, $country, $state, $location, $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
