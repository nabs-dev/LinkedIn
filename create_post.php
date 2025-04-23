<?php
// File: create_post.php
include("db.php");
session_start();
if (!isset($_SESSION['user_id'])) {
  echo "<script>alert('Please login first!');location.href='login.php';</script>";
  exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_id = $_SESSION['user_id'];
  $content = mysqli_real_escape_string($conn, $_POST['content']);
  if (!empty($content)) {
    $conn->query("INSERT INTO posts (user_id, content) VALUES ('$user_id', '$content')");
    echo "<script>alert('Post created!');location.href='feed.php';</script>";
  } else {
    echo "<script>alert('Post content cannot be empty!');location.href='feed.php';</script>";
  }
}
?>
