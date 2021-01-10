<?php

$kadaluarsa = date('Y-m-d', strtotime('+3 months', strtotime(currentdate)));



if(isset($_POST['email'])) {
    $email_to = "to@domain.com";
    $email_subject = "Email subject";
    $name = $_POST['first_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $location = $_POST['location']; // required
    $address = $_POST['address']; // required

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }

    $email_message = "Form details below.\n\n";
    $email_message .= "Dear  ".clean_string($name).", \n";
    $email_message .= "Hanya mengingatkan bahwa Poin Anda akan berakhir pada tanggal ??/??/???? , Mohon untuk menggunakannya, terima Kasih\n";

// create email headers
    $headers = 'From: kwakjason8@gmail.com'."\r\n".
        'Reply-To: noreplyback '."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);
    ?>
    <!-- include your own success html here -->

    <div class="feedback">Thank you for contacting us. We will be in touch with you very soon.</div>
    <?php
}
?>
