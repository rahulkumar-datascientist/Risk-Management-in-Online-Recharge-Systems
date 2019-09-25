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
  
  <h2 class="login-header">CALL SIMULATOR</h2>

  <form class="login-container" method="get" action="/wallet/dial">
  	<center>My Balance: {{$mobilebalance}} Rs</center>
    <p><input type="text" placeholder="ENTER MOBILENO" name="mobileno"></p>
    <p><input type="submit" value="CALL"></p>
    <center><a href="/wallet/loadhome" style="text-decoration:none;font-weight:bold;color:#456">HOME</a></center>
  </form>
</div>
    
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
</body>
</html>
