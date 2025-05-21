<?php
include("../includes/db.php");
include("../includes/functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $country = sanitize($_POST['country']);
    $state = sanitize($_POST['state']);
    $location = sanitize($_POST['location']);
    $sectors = sanitize($_POST['sectors']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, country, state, location, sectors, password, type, approved) VALUES (?, ?, ?, ?, ?, ?, ?, 'company', 0)");
    $stmt->bind_param("sssssss", $name, $email, $country, $state, $location, $sectors, $password);

    if ($stmt->execute()) {
        echo "Signup submitted! Wait for admin approval.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
