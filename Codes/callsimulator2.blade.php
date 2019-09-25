<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>DIALER</title>
  
  
  
      <link rel="stylesheet" href="/walletfiles/css/style.css">

  
</head>

<body>
  <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">CALL SIMULATOR</h2>

  <form class="login-container" name="dialer1" action="/wallet/disconnect">
  	<center><h1 id="counter"><time>00:00:00</time></h1></center>
  	<input type="hidden" name="total" id="timer" value="">
    <center><p>Connected:{{$mobileno}}</p></center>
    <p><input type="submit" id="stop" value="DISCONNECT" onclick="setValue()"></p>
  </form>
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
function setValue(){
var h1 = document.getElementsByTagName('h1')[0];
    document.getElementById('timer').value =  document.getElementById('counter').innerHTML;
    document.forms["dialer1"].submit();
}
</script>
  <script type="text/javascript">
  var h1 = document.getElementsByTagName('h1')[0],
    start = document.getElementById('start'),
    stop = document.getElementById('stop'),
    clear = document.getElementById('clear'),
    seconds = 0, minutes = 0, hours = 0,
    t;

function add() {
    seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }
    
    h1.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

    timer();
}
function timer() {
    t = setTimeout(add, 1000);
}
timer();


/* Start button */
start.onclick = timer;

/* Stop button */
stop.onclick = function() {
    clearTimeout(t);
}

/* Clear button */
clear.onclick = function() {
    h1.textContent = "00:00:00";
    seconds = 0; minutes = 0; hours = 0;
}
  </script>
</body>
</html>
