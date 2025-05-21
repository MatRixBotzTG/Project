<?php
include("../includes/db.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = $conn->prepare("SELECT id, password, type, approved FROM users WHERE email=?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result()->fetch_assoc();

    if ($result && password_verify($password, $result['password'])) {
        if ($result['type'] === 'company' && !$result['approved']) {
            die("Company account pending admin approval.");
        }
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_type'] = $result['type'];
        header("Location: ../" . $result['type'] . "/dashboard.php");
    } else {
        echo "Invalid login";
    }
}
?>
