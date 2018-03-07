<?php

    require 'database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $titreError = null;
        $auteurError = null;
        $articleError = null;

        // keep track post values
        $titre = $_POST['titre'];
        $auteur = $_POST['auteur'];
        $article = $_POST['article'];

        // validate input
        $valid = true;
        if (empty($titre)) {
            $titreError = 'Titre manquant';
            $valid = false;
        }

        if (empty($auteur)) {
            $auteurError = 'Auteur manquant';
            $valid = false;
        }

        if (empty($article)) {
            $articleError = 'Article manquant';
            $valid = false;
        }

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO articles (titre,auteur,article) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($titre,$auteur,$article));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create an article</h3>
                    </div>

                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($titreError)?'error':'';?>">
                        <label class="control-label">Titre</label>
                        <div class="controls">
                            <input name="titre" type="text"  placeholder="Titre" value="<?php echo !empty($titre)?$titre:'';?>">
                            <?php if (!empty($titreError)): ?>
                                <span class="help-inline"><?php echo $titreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($auteurError)?'error':'';?>">
                        <label class="control-label">Auteur</label>
                        <div class="controls">
                            <input name="auteur" type="text" placeholder="Auteur" value="<?php echo !empty($auteur)?$auteur:'';?>">
                            <?php if (!empty($auteurError)): ?>
                                <span class="help-inline"><?php echo $auteurError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($articleError)?'error':'';?>">
                        <label class="control-label">Article</label>
                        <div class="controls">
                            <input name="article" type="text"  placeholder="Article" value="<?php echo !empty($article)?$article:'';?>">
                            <?php if (!empty($articleError)): ?>
                                <span class="help-inline"><?php echo $articleError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>
