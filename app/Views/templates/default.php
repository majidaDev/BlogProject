<?php include("includes/header.php"); ?>

    

    <?php if(isset($_GET['p'])) : ?>
        <?php switch($_GET['p']) :
            case 'posts.single' : ?>
                <li><a href="index.php?p=admin.posts.index">Connexion</a></li>
                <?php break; ?>


            <?php case "posts.chapitre": ?>
                <li><a href="index.php?p=admin.posts.index">Connexion</a></li>
                <?php break; ?>
             <?php case "users.login": ?>
                <!--<li><a href="index.php?p=admin.posts.index">Connexion</a></li>-->
                <?php break; ?>
            <?php default: ?>
                <li><a href="index.php?p=admin.posts.index">Articles</a></li>
                <li><a href="index.php?p=admin.chapitres.index">Chapitres</a></li>
<li><a href="index.php?p=users.logOut">Déconnexion</a></li>
        <?php endswitch; ?>

    <?php else : ?>
        <li><a href="index.php?p=users.login">Connexion</a></li>
    <?php endif; ?>


<?php include("includes/footer.php"); ?>
