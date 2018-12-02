<h1>Administrer les articles</h1>
<p>beinevenue --------------------<?php echo $_SESSION['auth'] ; ?></p> <!--TEST session----------->

<p>
  <a class="btn btn-success" href="?p=admin.posts.add" >Ajouter un article</a>
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
        <!-- Lister tous les articles et les afficher -->
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post->id; ?></td>
                <td><?= $post->titre; ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=admin.posts.edit&id=<?= $post->id; ?>" >Editer</a>

                    <!-- Mettre le bouton supprimer dans un formulaire pour éviter les problèmes de sécurité -->
                    <form action="?p=admin.posts.delete" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $post->id; ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
