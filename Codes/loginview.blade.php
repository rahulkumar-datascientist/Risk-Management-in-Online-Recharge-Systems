<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  
  
      <link rel="stylesheet" href="/walletfiles/css/style.css">

  
</head>

<body>
  <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Automatic Recharge Wallet Log in</h2>
	
  <form class="login-container" method="get" action="/wallet/login">
    <p><input type="text" placeholder="Mobile Number" name="mobileno"></p>
    <p><input type="password" placeholder="Password" name="password"></p>
    <p><input type="submit" value="Log in"></p>
    <center><?php echo $msg?><center>
    <center><p>Not Registered? <a href="/wallet/registerview">Register Here</a></p></center>
  </form>
  
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
</body>
</html>
