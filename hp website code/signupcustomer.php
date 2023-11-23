<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
<title>Sign Up Customer</title>
<script defer src="signup.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<form class="login" name="loginform" onsubmit="returnvalidateLoginForm()" method="post">

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
<div class="content">
<table>
<tr>
    <th>
        <h3>Create an account</h3>
    </th>
</tr>
<tr>
<th>
<label for="fname">First name:</label></tr>    
</th>
</tr>
<tr>
<th>
<input type="text" id="fname" name="fname" ><br><br>
</th>
</tr>
<tr>
<th>
<label for="lname">Last name:</label>
</th>
</tr>
<tr>
<th>
<input type="text" id="lname" name="lname"><br><br>
</th>
</tr>
<tr>
<th>
<label for="email">Email:</label>   
</th>
</tr>
<tr>
<th>
<input type="text" id="email" name="email"><br><br>
</th>
</tr>
<tr>
    <th>
        <label for="pass">Password:</label>
    </th>
</tr>
<tr>
    <th>
    <input type="password" id="password" name="password"><br><br>
    </th>
</tr>
<tr>
<th>
    <button type="crtbtn">Create new account</button>
</th>
</tr>

 

</table>
</div>
</form>
</body>
</html>