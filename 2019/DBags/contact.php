<?php
//var_dump($_POST['submited']);
if (isset($_POST['submited'])) {
    $mailFrom = $_POST['mail'];

    $subject = "DoggieBag Landing Page";
    $message = 'Mensaje enviado desde DoggieBag LP';
    $mailTo = "doggiebagcommunity@gmail.com";
    $headers = "From: " . $mailFrom;



    //mail($mailTo, $subject, $message, $headers);
    //sleep(10);
    echo "Message has been sent.";
    
    //header("Location: index.html");
    //exit;
    //header("Location: index.html?mailsend");
    /*
    <?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "test@hostinger-tutorials.com";
    $to = "test@gmail.com";
    $subject = "Checking PHP mail";
    $message = "PHP mail works just fine";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";
    ?>
*/
}
else {
    //echo "segunda parte";
    header("Location: index.html");
}
?>
