<?php
session_start();
include("db.php");
if (!isset($_SESSION['user_id'])) {
  echo "<script>alert('Please login first!');location.href='login.php';</script>";
  exit();
}
$user_id = $_SESSION['user_id'];
$user = $conn->query("SELECT * FROM users WHERE id='$user_id'")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>LinkedIn Clone - Home</title>
  <style>
    body { font-family: Arial; background: #eef3f8; margin: 0; }
    .navbar {
      background: #0a66c2; padding: 15px;
      display: flex; justify-content: space-between; align-items: center;
    }
    .navbar h2 { color: white; margin: 0; }
    .navbar a {
      color: white; text-decoration: none; margin-left: 15px;
      padding: 8px 16px; background: #004182; border-radius: 5px;
      transition: background 0.3s;
    }
    .navbar a:hover {
      background: #003366;
    }
    .container {
      padding: 30px;
    }
    .profile-box {
      background: white; padding: 20px;
      border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="navbar">
    <h2>LinkedIn Clone</h2>
    <div>
      <a href="index.php">Home</a>
      <a href="profile.php">Profile</a>
      <a href="feed.php">Feed</a>
      <a href="network.php">My Network</a>
      <a href="logout.php">Logout</a>
    </div>
  </div>

  <div class="container">
    <div class="profile-box">
      <h3>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h3>
      <p><strong>Title:</strong> <?php echo htmlspecialchars($user['job_title']); ?></p>
      <p><strong>Experience:</strong> <?php echo htmlspecialchars($user['experience']); ?></p>
    </div>
  </div>
</body>
</html>
