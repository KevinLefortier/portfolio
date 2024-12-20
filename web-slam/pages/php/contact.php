<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie reCAPTCHA
    $recaptchaSecretKey = "6LfjRDgpAAAAAMFcmIYrWIGr3owYgia2xhRJSaf5";
    $recaptchaResponse = $_POST["g-recaptcha-response"];

    $recaptchaVerify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaResponse");
    $recaptchaData = json_decode($recaptchaVerify);

    if (!$recaptchaData->success) {
        // Échec de la vérification reCAPTCHA
        echo "Erreur reCAPTCHA. Veuillez réessayer.";
        exit();
    }

    // Reste du traitement du formulaire
    // ...
} else {
    // Redirection si la page est accédée directement sans soumission du formulaire
    header("Location: index.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST["name"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Envoyer un email (exemple)
    $to = "kevin.lefortier@sts-sio-caen.info";
    $subject = "Nouveau message de M. ou Mme. $name";
    $messageBody = "Nom: $name $prenom\nEmail: $email\nMessage:\n$message";
    // En-têtes de l'e-mail
    $headers = "From: $email\r\nReply-To: $email\r\n";
    // Envoyer l'e-mail
    mail($to, $subject, $messageBody, $headers);

    // Utilisez la fonction mail() pour envoyer l'email
    // mail($to, $subject, $messageBody);

    // Afficher un message de succès
    echo "Merci M. ou Mme. $name $prenom pour votre message. Nous vous contacterons bientôt!";
} else {
    // Redirection si la page est accédée directement sans soumission du formulaire
    header("Location: index.php");
    exit();
}
?>