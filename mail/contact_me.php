<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['company']) 	||
   empty($_POST['message'])	||
   empty($_POST['subject'])   ||
   //empty($_POST['subject'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$name = htmlentities($_POST['name']);
$email_address = htmlentities($_POST['email']);
$company = htmlentities($_POST['company']);
$message = htmlentities($_POST['message']);
$subject = htmlentities($_POST['subject']);

// Create the email and send the message
$to = 'contact@td-next.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $subject";
$email_body =
$message=
      '
      <html>
         <head>
            <title>TD next - Contact</title>
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
         </head>
         <body>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <table class="table">
                        <tr>
                           <td>Name</td>
                           <td>' . "$name" . '</td>
                        </tr>
                        <tr>
                           <td>Email</td>
                           <td>' . "$email_address" . '</td>
                        </tr>
                        <tr>
                           <td>Company</td>
                           <td>' . "$company" . '</td>
                        </tr>
                        <tr>
                           <td>Interested by</td>
                           <td>' . "$subject" . '</td>
                        </tr>
                        <tr>
                           <td>Message</td>
                           <td>' . "$message" . '</td>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
         </body>
      </html>'
      ;

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From:  $email_address\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= 'Cc: bdumontet@telecomdesign.fr' . "\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
