<?php
include("../includes/db.php");
session_start();
if (!isset($_SESSION['admin'])) die("Unauthorized");

if (isset($_GET['approve'])) {
    $id = intval($_GET['approve']);
    $conn->query("UPDATE users SET approved=1 WHERE id=$id AND type='company'");
}

$result = $conn->query("SELECT * FROM users WHERE type='company' AND approved=0");

while ($row = $result->fetch_assoc()) {
    echo $row['name'] . " <a href='?approve={$row['id']}'>Approve</a><br>";
}
?>
