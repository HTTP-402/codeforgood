// Check if session is not registered, redirect back to main page.
<?php
session_start();
if($_SESSION['logged'] === true){
header("location:main_login.php");
}
?>

<html>
<body>
Login Successful
</body>
</html>