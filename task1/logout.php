
<?php
session_start();
session_destroy();
// Redirect to the login page:
header('Location: http://localhost/task1/login.html');
?>

