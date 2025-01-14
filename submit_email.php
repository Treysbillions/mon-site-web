<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Vérifiez que l'email est valide
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "ascompacte10@gmail.com"; // Remplacez par votre adresse email
        $subject = "Nouvelle inscription à votre formation";
        $message = "Une nouvelle personne s'est inscrite à votre formation avec l'adresse email : $email";
        $headers = "From: noreply@votredomaine.com\r\n";
        $headers .= "Reply-To: $email\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo "Merci pour votre inscription !";
        } else {
            echo "Une erreur est survenue, veuillez réessayer.";
        }
    } else {
        echo "Adresse email invalide.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
ubmit_email.php
<form action="submit_email.php" method="post">
    <h2>Inscrivez-vous pour recevoir plus d'informations</h2>
    <label for="email">Adresse email :</label>
    <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
    <button type="submit">S'inscrire</button>
</form>
