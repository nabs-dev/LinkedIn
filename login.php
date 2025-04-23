<?php include("db.php"); session_start(); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Wrong password');</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; background: #e9f0f7; display: flex; justify-content: center; align-items: center; height: 100vh; }
        form { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px #bbb; width: 300px; }
        input { width: 100%; margin: 10px 0; padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { background: #0077b5; color: white; padding: 10px; border: none; width: 100%; border-radius: 5px; }
        button:hover { background: #005f8d; }
    </style>
</head>
<body>
    <form method="post">
        <h2>Login</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
