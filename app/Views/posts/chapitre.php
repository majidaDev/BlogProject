<!-- AFFICHER LE CHAPITRE EN COURS -->
<h1><?= $chap->titre; ?></H1>



<div class="row">
    <div class="col-sm-8">
        <!-- AFFICHER LES ARTICLES DU CHAPITRE -->
        <?php
            //parcourir tous les articles du chapitre correspondant
            foreach ($articles as $post) :
        ?>

            <!-- Afficher les articles et leurs chapitres correspondantes -->
            <h4><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h4>
            <p><em><?= $post->chapitre; ?></em></p>
            <p><?= $post->extrait; ?></p>

        <?php endforeach; ?>
    </div>


    <div class="col-sm-4">
        <ul>
            <!-- AFFICHER TOUTES LES CHAPITRES -->
            <?php foreach ($chapitres as $chapitre) : ?>
                <li><a href="<?= $chapitre->url; ?>"><?= $chapitre->titre; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

