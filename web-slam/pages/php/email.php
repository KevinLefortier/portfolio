<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Clé secrète reCAPTCHA
    $secretKey = '6LfjRDgpAAAAAAFhdAp8dCmSmgZctoVZw0-mMy_c';
    
    // URL de l'API reCAPTCHA pour vérifier la réponse
    $url = 'https://www.google.com/recaptcha/api/siteverify';

    // Paramètres de la requête
    $data = [
        'secret' => $secretKey,
        'response' => $recaptchaResponse
    ];

    // Initialiser une session cURL
    $ch = curl_init();

    // Configurer cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Exécuter la requête et récupérer la réponse de l'API
    $response = curl_exec($ch);

    // Vérifier si la requête cURL a échoué
    if (curl_errno($ch)) {
        echo 'Erreur cURL : ' . curl_error($ch);
        exit;
    }

    // Fermer la session cURL
    curl_close($ch);

    // Décoder la réponse JSON de Google
    $responseKeys = json_decode($response, true);

    // Si le reCAPTCHA est validé (vrai), envoyer l'email
    if (isset($responseKeys['success']) && $responseKeys['success'] == true) {
        // Destinataire de l'email
        $to = "kevin.lefortier@sts-sio-caen.info";
        
        // Sujet de l'email
        $subject = "Message de contact de $nom";

        // Corps du message
        $body = "Nom: $nom\n";
        $body .= "Email: $email\n\n";
        $body .= "Message:\n$message\n";

        // En-têtes de l'email
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Envoi de l'email
        if (mail($to, $subject, $body, $headers)) {
            echo "Votre message a été envoyé avec succès.";
        } else {
            echo "Une erreur est survenue lors de l'envoi du message.";
        }
    } else {
        // Si le reCAPTCHA échoue
        echo "La validation reCAPTCHA a échoué. Veuillez réessayer.";
    }
}
?>
