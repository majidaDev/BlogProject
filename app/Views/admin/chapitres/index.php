<h1>Administrer les chapitres</h1>

<p>
  <a class="btn btn-success" href="?p=admin.chapitres.add" >Ajouter un chapitre</a>
</p>

<table class="table">
    <thead>
        <tr>
            <td>Id</td>
            <td>Titre</td>
            <td>Actions</td>
        </tr>
    </thead>

    <tbody>
        <!-- Lister tous les chapitres et les afficher -->
        <?php foreach ($items as $chapitre): ?>
            <tr>
                <td><?= $chapitre->id; ?></td>
                <td><?= $chapitre->titre; ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=admin.chapitres.edit&id=<?= $chapitre->id; ?>" >Editer</a>

                    <!-- Mettre le bouton supprimer dans un formulaire pour éviter les problèmes de sécurité -->
                    <form action="?p=admin.chapitres.delete" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $chapitre->id; ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
