<?php
if(!isset($_SESSION))
{
    session_start();
}
if (empty($_SESSION['login'])){
  header('Location: ../admin.php');
}
    require 'database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    }

    if ( !empty($_POST)) {
        // keep track validation errors
        $titreError = null;
        $auteurError = null;
        $categorieError = null;
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

        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE articles set titre = ?, auteur = ?, article =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($titre,$auteur,$article,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM articles where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $titre = $data['titre'];
        $auteur = $data['auteur'];
        $article = $data['article'];
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>

<body>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update an article</h3>
                    </div>

                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
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
                              <textarea name="article" type="text"  placeholder="Article" value="<?php echo !empty($article)?$article:'';?>" >
                              <?php if (!empty($articleError)): ?>
                                  <span class="help-inline"><?php echo $articleError;?></span>
                              <?php endif;?></textarea>
                              <script>
                                  CKEDITOR.replace('article');
                              </script>
                          </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>
