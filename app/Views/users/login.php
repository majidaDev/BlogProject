<!-- Afficher un message d'erreur si la connexion à échouée -->
<?php if ($errors) : ?>
    <div class="alert alert-danger">
        Identifiants incorrects
    </div>
<?php endif; ?>



<!-- Formulaire de connexion -->
<form method="post">
    <?= $form->input('username', 'pseudo'); ?>
    <?= $form->input('password', 'mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>
