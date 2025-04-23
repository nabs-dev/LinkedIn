<?php
// File: notifications.php
include("db.php");
session_start();
$uid = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM notifications WHERE recipient_id='$uid' ORDER BY id DESC");
while($row = $result->fetch_assoc()) {
  echo "<div style='background:#f0f0f0;border-radius:10px;padding:10px;margin-bottom:5px;'>";
  echo "<strong>Notification:</strong> ".$row['message'];
  echo "</div>";
}
?>

<!-- Internal CSS Notification Style Example -->
<style>
div[style*='Notification'] {
  animation: fadeIn 0.5s ease-in-out;
}
@keyframes fadeIn {
  from {opacity: 0; transform: translateY(-10px);}
  to {opacity: 1; transform: translateY(0);}
}
</style>

<!-- Optional Auto-Refresh JS -->
<script>
  setInterval(() => {
    fetch('notifications.php').then(r => r.text()).then(data => {
      document.getElementById('notificationArea').innerHTML = data;
    });
  }, 5000);
</script>

<!-- HTML Placeholder -->
<div id="notificationArea"></div>
