var hms = '<?php echo $row->duration; ?>';   // your input string
var a = hms.split(':'); // split it at the colons
// minutes are worth 60 seconds. Hours are worth 60 minutes.
var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 		
/*var seconds = 120;*/
function secondPassed() {
   /* var minutes = Math.round((seconds - 30)/60);*/
    var remainingSeconds = seconds % 60;
	var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    minutes %= 60;
    hours %= 60;
	
	
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;  
    }
	document.getElementById('countdown').innerHTML  = 
		"<h2>You have <b>"+ hours +":"+ minutes +":"+ remainingSeconds +"</b> seconds to answer the questions</h2>";

    if (seconds == 0) {
        clearInterval(countdownTimer);
		document.quiz.submit();
        /*document.getElementById('countdown').innerHTML = "Buzz Buzz";*/
    } else {
        seconds--;
    }
}
 
var countdownTimer = setInterval('secondPassed()', 1000);