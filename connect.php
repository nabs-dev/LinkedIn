<?php include("db.php"); session_start(); if (!isset($_SESSION['user_id'])) echo "<script>window.location.href='login.php';</script>"; ?>
<?php
$user_id = $_SESSION['user_id'];
if (isset($_GET['connect_id'])) {
    $connect_id = $_GET['connect_id'];
    $check = $conn->query("SELECT * FROM connections WHERE user1=$user_id AND user2=$connect_id");
    if ($check->num_rows == 0) {
        $conn->query("INSERT INTO connections (user1, user2) VALUES ($user_id, $connect_id)");
    }
    echo "<script>window.location.href='network.php';</script>";
}
?>
