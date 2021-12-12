<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- <title>page index</title> -->
    <link rel="stylesheet" href="../../../CSS/form.css" media="screen" type="text/css" />
</head>
<body>

<h3>Login</h3>
<form method="post" action="index.php?controller=user&action=connected">
    <input type="email" name="lemail" id="lemail" placeholder="Email" required> <br>
    <input type="password" name="lpassword" id="lpassword" placeholder="Password" required> <br>
    <input type="submit" name="formlogin" id="formlogin" value="Log in" >
</form>
