<?php
include("db.php");
session_start();
if (!isset($_SESSION['user_id'])) {
  echo "<script>alert('Please login first!');location.href='login.php';</script>";
  exit();
}
$user_id = $_SESSION['user_id'];
$feed = $conn->query("SELECT posts.*, users.name FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Feed</title>
  <style>
    body { font-family: Arial; padding: 20px; background: #f4f4f4; }
    .post-form { background: white; padding: 15px; border-radius: 10px; margin-bottom: 20px; }
    .post-form textarea { width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; resize: none; }
    .post-form button { background: #0a66c2; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; }
    .post-box { background: white; padding: 15px; border-radius: 10px; margin-bottom: 15px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
    .post-box strong { color: #0a66c2; }
  </style>
</head>
<body>
  <div class="post-form">
    <form method="POST" action="create_post.php">
      <textarea name="content" rows="3" placeholder="What's on your mind?" required></textarea><br>
      <button type="submit">Post</button>
    </form>
  </div>

  <?php while($post = $feed->fetch_assoc()) { ?>
    <div class="post-box">
      <strong>@<?php echo htmlspecialchars($post['name']); ?></strong><br>
      <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
      <small><?php echo $post['created_at']; ?></small>
    </div>
  <?php } ?>
</body>
</html>
