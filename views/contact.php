<?php

$title = 'Contact';

$pageCss = '
<link rel="stylesheet" href="/public/css/contact.css">';


require_once __DIR__ . '/./header.php';
?>
<section class="body-section">
    <div clss="title-contact">
        <h1 class="title">Contact</h1>
    </div>
    <div class="contact-session">
        <div class="contact-formulary">
            <h2 class="title-h2">Contactez-nous ici !</h2>
            <p class="desc">Si vous avez un problème, une suggestion ou une question, contactez-nous à l'aide de ce formulaire.</p>
            <form method="POST" action="/create-contact">
                <?php if (isset($_SESSION['contactError'])): ?>
                    <span class="error"><?= htmlspecialchars($_SESSION['contactError']) ?></span>
                    <?php unset($_SESSION['contactError']);?>
                <?php endif; ?>

                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email" required>
                <label for="title">Objets</label>
                <input type="text" name="title" placeholder="Objet" required>
                <label for="content">Message</label>
                <textarea name="content" placeholder="Message" class="message" required></textarea>
                <div class="div-button">
                    <button class="button-submit" type="submit">Envoyer le message</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include './views/footer.php'; ?>