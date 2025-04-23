<?php include("db.php"); session_start(); if (!isset($_SESSION['user_id'])) echo "<script>window.location.href='login.php';</script>"; ?>
<?php
$user_id = $_SESSION['user_id'];
$user = $conn->query("SELECT * FROM users WHERE id = $user_id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        .container { width: 60%; margin: auto; margin-top: 50px; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 0 10px #ccc; }
        h2 { color: #0077b5; }
        p { font-size: 16px; margin: 10px 0; }
        button { background: #0077b5; color: white; padding: 10px; border: none; border-radius: 5px; margin-top: 20px; }
        button:hover { background: #005f8d; }
    </style>
</head>
<body>
    <div class="container">
        <h2><?php echo $user['name']; ?></h2>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Job Title:</strong> <?php echo $user['job']; ?></p>
        <p><strong>Experience:</strong> <?php echo $user['experience']; ?></p>
        <button onclick="window.location.href='index.php'">Back to Feed</button>
    </div>
</body>
</html>
