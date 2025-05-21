<?php
include("../var.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['admin_id'] === $ADMIN_ID && $_POST['admin_pass'] === $ADMIN_PASS) {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
    } else {
        echo "Invalid admin credentials.";
    }
}
?>
