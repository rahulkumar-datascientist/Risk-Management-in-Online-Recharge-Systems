<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <title>Auto Wallet</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="shortcut icon" href="/walletfiles/farmzoplogoxicon.png" type="images/x-icon">	
  <link rel="shortcut icon" href="/walletfiles/farmzoplogoxicon.png" type="images/x-icon">	
  <link rel="stylesheet" href="/walletfiles/bootstrap.min.css">
  <script type="text/javascript" src="/walletfiles/jquery.min.js.download"></script>
  <script type="text/javascript" src="/walletfiles/bootstrap.min.js.download"></script>
  <link rel="stylesheet" type="text/css" href="/walletfiles/boot.css">
  <link rel="stylesheet" href="/walletfiles/farmerdashboard.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Raleway" rel="stylesheet"> 		
  <link href="https://fonts.googleapis.com/css?family=Oswald|Roboto" rel="stylesheet">
</head>
<body id="body">
<span class="wrapper">
<header>
	<nav class="navbar navbar-static-top">
		
		
		<div class="container-fluid">
			
			<div class="navbar-header">
				
				<a class="navbar-brand" id="brand" href="http://farmzop.com/confirm#"><img src="/walletfiles/play-logo.png" width="160" height="40" alt="farmzop"></a>
				<a href="http://farmzop.com/confirm#"><img src="/walletfiles/dropdown2.png" width="40" height="30" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" class="ddsmall navbar-right"></a>

			</div>	
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
	  
					<div class="nav fllinkgroup navbar-right">
						<ul class="nav navbar-nav">
							<li><a id="dashboard" class="signinpopup flnlink transition radius">YOU ARE LOGGED IN WITH {{$mobileno}}</a></li>
							<li><a href="http://pdnandassociates.com/wallet/callsimulator" id="milklogout" class="signinpopup flnlink transition radius">CALL SIMULATOR</a></li>
							<li><a href="http://pdnandassociates.com/wallet/logout" id="milklogout" class="signinpopup flnlink transition radius">LOGOUT</a></li>
						</ul>
					</div>
     
		
			</div>	
		</div>
				
	</nav>
	</header>

<div class="android_app">
	<a href="#">CLICK TO DOWNLOAD ANDROID APP</a>
</div>	
	
<div class="black_overlay">
</div>

<div class="container">
	<div class="row">
		<div class="popup_container radius-md transition col-md-6 col-sm-9 col-xs-10">
			<h3>YOU HAVE SUBSCRIBED FOR FARMZOP FRESH MILK</h3>
				<div class="content">
					<h5>Subscription Details</h5>
					 <hr/>
					 <b>Name</b> : Gaurav Kumar<br/>
					 <b>Date</b> : 21 june 2016<br/>
					 <b>Flat No.</b> : #216<br/>
					 <b>Apartment</b> : Golden Ennclave<br/>
					 <b>Address </b>: #216,5th cross,Ashwath nagar<br/>
					 <b>Quantity</b>: Morning - 2pkt&nbsp;&nbsp;Evening - 2pkt<br/> 
				</div>
				<button class="radius transition" id="unsub">	
					UNSUBSCRIBE
				</button>
		</div>
	</div>
</div>	
	
	
<div class="close_button transition">
	<b>X</b>
</div>
	
<section>
	<div class="container">
		<div class="row">
			<div class="heading_container radius transition">
				<h1>AUTOMATIC RECHARGE WALLET <i class="fa fa-tachometer" aria-hidden="true"></i></h1>
			</div>
		</div>
	</div>
	
		<div class="container card_container ">
			<div class="row">
				<div class="ind_cards delivery radius-md col-md-3 col-sm-5 col-xs-10">
					<div class="div_header">
						My Wallet <i class="fa fa-money" aria-hidden="true"></i>
					</div>
					
					<div class="div_content">
					<br/>
						Wallet Balance : <span class="wallet_heading">Rs.{{$walletbalance}}</span> 
						<br/>
						<hr/>
						<p>
							
							
							<form method="GET" action="/wallet/addmoney">
							<input type="text" class="wallet_input" placeholder="ENTER AMOUNT" name="amount"><br/>
							<button id="add_money">ADD MONEY</button>
							</form>
							<br/>
							
						</p>
					</div>
					</div>
				
					
					<div class="ind_cards delivery radius-md col-md-3 col-sm-5 col-xs-10">
					<div class="div_header">
						Mobile Recharge <i class="fa fa-mobile" aria-hidden="true"></i>
					</div>
					
					<div class="div_content">
					
						
						
							<form method="GET" action="/wallet/rechargemobile">
							<input type="text" class="wallet_input" placeholder="ENTER MOBILE NUMBER" name="mobileno"><br/>
								<select>
									<option selected> Select Mobile Operator </option>
									<option>Airtel</option>
									<option>Tata Docomo</option>
									<option>Jio</option>
									<option>Vodafone</option>
									<option>Idea Cellular</option>
								</select>
							</label><br/><br/>
							<input type="text" class="wallet_input" placeholder="ENTER AMOUNT" name="amount"><br/>
							<button id="add_money">RECHARGE</button>
							</form>
							<br/>
							
						
					</div>
					</div>
				
				<div class="ind_cards delivery radius-md col-md-3 col-sm-5 col-xs-10">
					<div class="div_header">
						Options <i class="fa fa-bars" aria-hidden="true"></i>
					</div>
					
					<div class="div_content">
			
							Current Recharge Threshold : <span class="wallet_heading">Rs.{{$rechargethreshold}}</span>
							<hr/>
							<form method="GET" action="/wallet/changerechargethreshold">
							<input type="text" class="wallet_input" placeholder="ENTER RECHARGE THRESHOLD" name="rechargethreshold"><br/>
							<button id="add_money">CHANGE RECHARGE THRESHOLD</button>
							</form>
						
						<hr/>
							<form action="/wallet/mytransactions">
							<button id="add_money">MY TRANSACTIONS</button>
							</form>
					</div>
					</div>
				
				
				
				
				

				<br/><br/><h4><?php echo $msg?></h4>
				
			</div>
		</div>
		

</section>
	
	

<footer>
	<div class="container">
		<div class="row">
			<div class="listfooter col-md-4 col-xs-12 col-sm-12 inddiv">
				<ul>
					<li><a href="http://farmzop.com/confirm#" class="transition">FAQs</a></li>
					<li><a href="http://farmzop.com/confirm#" class="signinpopup transition">ABOUT US</a></li>
					<li><a href="http://farmzop.com/confirm#" class="transition">PRIVACY POLICY</a></li>
					<li><a href="http://farmzop.com/confirm#" class="transition">TERMS &amp; CONDITIONS</a></li>
				</ul>
			</div>
			
			<div class="social col-md-4 col-xs-12 col-sm-12 inddiv">
				<h5>Stay Connected</h5>
						<ul class="list-inline">
							<li><a href="https://www.facebook.com/farmzop"><img src="/walletfiles/facebook.png" width="50" height="50" class="transition"></a></li>
							<li><a href="https://twitter.com/farmzop"><img src="/walletfiles/twitter.png" width="50" height="50" class="transition"></a></li>
							<li><a href="https://www.instagram.com/farmzop/"><img src="/walletfiles/instagram.png" width="50" height="50" class="transition"></a></li>
						</ul>
			</div>
			
			<div class="col-md-4 col-xs-12 col-sm-12 inddiv">
				<a href="http://farmzop.com/confirm#"><img src="/walletfiles/play-logo.png" width="200" height="50" alt="farmzoplogo"></a>
				<p class="slogan">FARM FRESH MILK</p>
			</div>
			
		</div>
	</div>
</footer>


<script type="text/javascript">


$(document).ready(function(){
	$("#link").click(function(){
		$("#cont").slideToggle("fast");
	});
	
	$(".subscription").click(function(){
		$(".black_overlay").show();
		$(".popup_container").show("slow");
		$(".close_button").show("slow");
		$("body").css("overflow-y","hidden");
	});
	
	$(".close_button").click(function(){
		$(".black_overlay").hide("slow");
		$(".popup_container").hide("slow");
		$(".close_button").hide("slow");
		$("body").css("overflow-y","auto");
	});	
	
	
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

function changeRechargeThreshold() {
    prompt("Please enter the Recharge Threshold");
}
</script>


</body>
</html>