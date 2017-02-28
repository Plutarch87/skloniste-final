<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "info@kulturno-skloniste.com";
 
    $email_subject = "Kulturno Skloniste - Nova Poruka";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "Pogrešan unos.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "<a href=\"../kontakt.html\">Vrati se nazad</a>";
 
        die();
 
    }
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
  
        !isset($_POST['message'])) {
 
        died('Nažalost došlo je do greške u unosu.');       
 
    }
 
     
 
    $name = $_POST['name']; // required
 
    $email_from = $_POST['email']; // required
 
    $message = $_POST['message']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'Izgleda da email adresa nije ispravna.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'Izgleda da ime nije ispravno.<br />';
 
  }

  if(strlen($message) < 2) {
 
    $error_message .= 'Izgleda da poruka nije dobro uneta.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Podaci pošiljaoca i sadržaj poruke:\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 

    $email_message .= "Ime: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Poruka: ".clean_string($message)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
Thank you for contacting us. We will be in touch with you very soon.
 
 
 
<?php
 
}
 
?>