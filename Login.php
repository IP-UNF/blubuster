
<?php include './sharedlayout/header.php';?>
<?php session_start();?>
<?php include './sharedlayout/body.php';?>
<form action="authenticate.php" method="post">
<table>
<tr>
	<td>Email:</td><td><input name="Email" type="email"></td>
</tr>
<tr>
        <td>Password:</td><td><input name="Password" type="password"></td>
</tr>
<tr>
        <td colspan="2"><input type="submit" value="Log In"></td>
</tr>
</table>
</form>
<?php
$error = $_GET['error'];
if($error == 1)
  echo "Invalid credentials";
elseif ($error == 2)
  echo "You must log in first.";
?>
<?php include './sharedlayout/footer.php';?>
