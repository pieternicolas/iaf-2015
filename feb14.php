<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Web layouting by Nicolas Pieter -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="author" content="Nicolas Pieter">
<link rel="shortcut icon" href="design/source/favicon.ico" >

<link href="css/navigation-template.css" rel="stylesheet">
<link href="css/orders.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/ticketPricing.js"></script>
<script type="text/javascript" src="js/dateFinder.js"></script>
<script type="text/javascript" src="js/gen_validatorv4.js" ></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58475523-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- End Google Analytics -->

<title>Order - Indonesia Art Festival 2015</title>
</head>
<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-N9ZRNC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N9ZRNC');</script>
<!-- End Google Tag Manager -->
<!--HEADER-->
<nav class="header-cont">
	<div class="header">
		<div class="navigation">
    	<a class="homeButton" href="http://indoartsfest.org">
    	      <img src="design/source/IAF trspntlogo.png" height="87" width="64"/>
		</a>
    	<div class="topLink">
    	<a class="indvLink" href="partnership.html">Partnership</a>
    	<a class="indvLink" href="ticketing.html">Ticket</a>
    	<a class="indvLink" href="portfolio.html">Portfolio</a>
    	<a class="indvLink" href="about.html">About</a>
    	</div>
    	</div>
	</div>
</nav>
<!--END OF HEADER-->
<div id="container">
<div id="content">
	<div class="midContent">
		<div class="midHeader">
    	<h3><b>Ticketing</b></h3><br />
        <img class="line" src="design/other/line.png" /><br />
        Fill ALL blank spaces below accordingly. Please check if your typed information is correct before submitting.<br />
        DO NOT press the submit button twice.
        </div>
	<div class="forms">
	<form action="f14TO1oZ8Sk42PJsCdoDdw1.php" method="post" id="ticketOrder">
	<input type="hidden" name="submissiontime" id="todayDate"/>

    	<div class="left">Name:</div>
        <div class="right"><input type="text" autocomplete="off" name="name" placeholder="Full name" required id="inputText"/></div>

    	<div class="left">NRIC or Passport number:</div>
        <div class="right"><input type="text" name="nric" autocomplete="off" placeholder="NRIC or Passport" required id="inputText"/></div>

    	<div class="left">Email:</div>
        <div class="right"><input type="email" name="email" autocomplete="off" placeholder="Email address" required id="inputText"/></div>

    	<div class="left">Contactable number:</div>
        <div class="right"><input type="text" name="contact" autocomplete="off" maxlength="8" pattern=".{8,8}" placeholder="Phone number" required id="inputText"/></div>

    	<div class="left">Tiers:</div>
        <div class="right">
        <select name="tier" id="sTier" oninput="getTotal()">

            
            <option value="SILVER">Silver tier</option>
        </select>
        <a href="design/source/seating plan iaf.png" target="_blank"><img src="design/other/help.png" width="25" height="25"/></a>
        </div>

    	<div class="left">Quantity<br /> (maximum of 10 tickets per booking):</div>
        <div class="right">
        <select name="quantity" id="quantity" oninput="getTotal()">
        	<option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        </div>
		<div id="ticketOrder_errorloc" class='error-strings'></div>
    	<div id="totalPrice"></div>
        <div class="g-recaptcha" data-sitekey="6LcycAATAAAAALBMFk58qYMp5YlEK3WKlythfVKO"></div>
    	<div class="button"><input type="submit" value="ORDER" id="button" onsubmit="disabler()"/></div>
</form>
	</div>
    </div>
<script type="text/javascript">
var frmvalidator = new Validator("ticketOrder");
frmvalidator.addValidation("name","alpha_s","<div style='color:white;'>Your name cannot contain any numbers</div>");
frmvalidator.addValidation("nric","alnum","<div style='color:white;'>Please enter a valid NRIC or passport number</div>");
frmvalidator.addValidation("contact","num","<div style='color:white;'>Please enter a valid phone number</div>");
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();
</script>
<script type="text/javascript">
function disabler() {
    document.getElementById("button").disabled = true;
	document.getElementById("button").value = "PLEASE REFRESH THE PAGE";
}
</script>
</div>
</div>
<!--FOOTER-->
<footer>
	<a href="http://www.telin.sg/">
	<div class="botLeftMark">
    	powered by
        <img class="telinLogo" src="design/source/telin.png" />
    </div>
    </a>
	<div class="botRightMark">
		a project by <b>PPI Singapura</b>
    	<img class="botLogo" src="design/source/ppilogo.png" width="31" height="31"/>
    </div>
</footer>
<!--END OF FOOTER-->
</body>
</html>