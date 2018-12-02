<!-- Affichage du formulaire -->
<form method="post">
    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('chapitre_id', 'Chapitre', $chapitres); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
