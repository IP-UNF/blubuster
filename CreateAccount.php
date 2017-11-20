<?php include 'header.php';?>
<?phpsession_start();?>
<?php include 'body.php';?>
<form action="./insertCustomer.php" method="post">
  <div class="container">
    <table class ="table">

    <tr><td><label><b>First Name</b></label></td>
    <td><input type="text" placeholder="Enter first Name" name="FirstName" required></td></tr>

    <tr><td><label><b>Last Name</b></label></td>
    <td><input type="text" placeholder="Enter Last Name" name="LastName" required></td></tr>

    <tr><td><label><b>Street Address</b></label></td>
    <td><input type="text" placeholder="Enter Street Address " name="StreetAddress" required></td></tr>

    <tr><td><label><b>City</b></label></td>
    <td><input type="text" placeholder="Enter City" name="City" required></td></tr>

    <tr><td><label><b>State</b></label></td>
    <td><input type="text" placeholder="Enter State" name="State" required></td></tr>

    <tr><td><label><b>ZipCode</b></label></td>
    <td><input type="text" placeholder="Enter Zip Code" name="ZipCode" required></td></tr>

    <tr><td><label><b>Email</b></label></td>
    <td><input type="text" placeholder="Enter Email" name="Email" required></td></tr>

    <tr><td><label><b>Password</b></label></td>
    <td> <input type="password" placeholder="Enter Password" name="Password" required></td></tr>

    <tr><td><label><b>Repeat Password</b></label></td>
    <td><input type="password" placeholder="Repeat Password" name="Password-repeat" required></td></tr>
    <tr><td><input type="checkbox" checked="checked"> Remember me</td></tr>
    <tr><td><p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p></td></tr>
  </tr>
</table>
    <div class="clearfix">
      <button type="button"  class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
<?php include 'footer.php';?>
