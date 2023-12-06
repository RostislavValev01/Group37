<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">
<head>
<title>Sign Up Admin</title>
<script defer src="signup.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- <link rel="stylesheet" href="HealthPoint.css"> -->
</head>
<style>
</style>

<body>

<div class="banner">
    <a href='#' class="logo"><img src="images/hplogo3.png" class="logo"></a>
    <nav class="header">
<a href='#'>Account</a>
<a href='#'>Basket</a>
<a href='#'>Contact</a>
    </nav>
</div>

<form class="register" id="registerForm"  method="post">
<div class="content">

<table>
<tr>
    <th>
        <h3>Create an Admin account</h3>
    </th>
</tr>
<tr>
<th>
<label for="fname">First name:</label></tr>    
</th>
</tr>
<tr>
<th>
<input type="text" id="fname" name="fname" placeholder="First Name" required><br><br>
</th>
</tr>
<tr>
<th>
<label for="lname">Last name:</label>
</th>
</tr>
<tr>
<th>
<input type="text" id="lname" name="lname" placeholder="Last Name" required><br><br>
</th>
</tr>
<tr>
<th>
<label for="email">Email:</label>   
</th>
</tr>
<tr>
<th>
<input type="text" id="email" name="email" placeholder="Email" required><br><br>
</th>
</tr>
<tr>
    <th>
        <label for="pass">Password:</label>
    </th>
</tr>
<tr>
    <th>
    <input type="password" id="password" name="password" placeholder="Password" required><br><br>
    </th>
</tr>
<tr>
    <th>
        <label for="refkey">Reference Key:</label>
    </th>
</tr>
<tr>
    <th>
        <input type="password" id="refkey" name="referenceKey" placeholder="Reference Key" required><br><br>
    </th>
</tr>
<tr>
<th>
    <input type="submit" id="submit" name="createaccount" value="Create new Account">

</th>
</tr>


</table>
</div>
</form>

</body>
</html>
