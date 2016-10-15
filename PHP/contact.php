<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "yashitmaheshwary@gmail.com";
     
    $email_subject = "website html form submissions";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $first_name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['message']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- place your own success html below -->
 
<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="../Styles/footer-distributed-with-address-and-phones.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<meta charset="utf-8">
	<title>JEE-Spot - Home</title>
	<link href="../Styles/style.css" rel="stylesheet" type="text/css" media="screen">
    <link href="../Styles/ContactStyles.css" rel="stylesheet" type="text/css" media="screen">
    <style type="text/css">
            tab1 { padding-left: 1.7em; }
            tab2 { padding-left: 2.5em; }
			tab3 { padding-left: 5em;	}
     </style>
     <link rel="icon" href="../Images/Tab Icon.PNG">
</head>

<body>
<div id="wrapper">
	<div id="top">
     	<div id = "Logo"><a href="../index.html"><img src="../Images/JEE Spot Logo.PNG" width="345" height="170" alt=""/></a>
            <a href = "../Main.html"></a>
     	</div>
     	<div id = "SocialMedia">
          <tab1>For additional information, contact us</tab1> <br>
          <tab2>on<strong> jee.spot.contact@gmail.com</strong></tab2>
          <ul id="Logos">
          <li> <a href = "https://www.facebook.com" target="_blank" class="Social"><img id="Facbook" src="../Images/FB Logo.PNG" width="50" height="50" alt=""/></a></li>
             <li> <a href = "https://www.twitter.com" target="_blank" class="Social"><img  id="Twitter" src="../Images/Twitter Logo.PNG" width="50" height="50" alt=""/></a></li>
             <li> <a href = "https://www.instagram.com" target="_blank" class="Social"><img id="Instagram" src="../Images/Instagram Logo.PNG" width="50" height="50" alt=""/></a></li>
             <li> <a href = "https://plus.google.com/u/3/105968363078682795020" target="_blank" ><img id="GooglePlus" src="../Images/Google Plus Logo.PNG" width="50" height="50" alt=""/></a></li>
        </ul>
       	</div>
    	<div id = "MainMenu">
        	<ul id="Menu">
                  <li><a class="active" href="../index.html">Home</a></li>
                  
                  <li class="StudyMaterial">
                   <a href="../StudyMaterial.html" class="StudyMaterialButton">Study Material</a>
                    <!--<div class="StudyMaterial-Content">
                      <a href="../Study Material/StudyMaterial-Physics.html">Physics</a>
                      <a href="../Study Material/StudyMaterial-Chemistry.html">Chemistry</a>
                      <a href="../Study Material/StudyMaterial-Mathematics.html">Mathematics</a>
                    </div>-->
                  </li>
                  
                  <li class="Books">
                    <a href="../Books/Books.html" class="BooksButton">Books</a>
                    <!--<div class="Books-Content">
                      <a href="../Books/Books-Physics.html">Physics</a>
                      <a href="../Books/Books-Chemistry.html">Chemistry</a>
                      <a href="../Books/Books-Mathematics.html">Mathematics</a>
                    </div>-->
                  </li>
                  
                  <li class="Tests">
                    <a href="../Tests/Tests.html" class="TestsButton">Tests</a>
                    <!--<div class="Tests-Content">
                      <a href="../Tests/Tests-Physics.html">Physics</a>
                      <a href="../Tests/Tests-Chemistry.html">Chemistry</a>
                      <a href="../Tests/Tests-Mathematics.html">Mathematics</a>
                    </div>-->
                  </li>
                  
                  <li><a class="active" href="../Tips.html">Tips</a></li>
                  
                  <!--<li><a class="active" href="../About.html">About</a></li>-->
                  
                  <li><a class="ContactUsButton" href="../ContactUs.html">Contact Us</a></li>
            </ul>
         </div>
   </div>
   	<div id="ContactPHPMessage">
         Thank you for your response. We will contact you as soon as possible!
	</div> 	
    <footer class="footer-distributed">
		<div class="footer-left">
			<h3>JEE-<span>Spot</span></h3>
			<p class="footer-links">
				<a href="index.html">Home &nbsp;&nbsp;</a>
				<a href="StudyMaterial.html">Study Material&nbsp;&nbsp;&nbsp;</a>
				<a href="Books/Books.html">Books&nbsp;&nbsp;&nbsp;</a>
				<a href="Tests/Tests.html">Tests&nbsp;&nbsp;&nbsp;</a>
				<a href="ContactUs.html">Contact&nbsp;&nbsp;&nbsp;</a>
			</p>
			<p class="footer-company-name">JEE-Spot &copy; 2016</p>
		</div>
		<div class="footer-center">
			<div>
				<i class="fa fa-envelope"></i>
				<p><a href="mailto:support@company.com">jee.spot.contact@gmail.com</a></p>
			</div>
		</div>
		<div class="footer-right">
			<p class="footer-company-about">
				<span>About</span>
				JEE-Spot is an online coaching for JEE Mains and Advanced by a JEE Mains (2016) Qualifier. We have compiled information from various sources to provide an easy and interesting study experience!
            </p>
			<div class="footer-icons">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-google-plus"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
			</div>
		</div>
	</footer>
</div>  
</body>
</html>

 
<?php
}
die();
?>