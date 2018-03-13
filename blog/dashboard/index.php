<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Titre</th>
                      <th>Auteur</th>
                      <th>Article</th>
                      <th>Categories</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   require '../get_Articles.php';

                   $req = $conn->prepare("
                       SELECT a.id, a.titre, a.article, GROUP_CONCAT(c.categorie) AS categorie, a.auteur
                       FROM articles AS a
                       INNER JOIN articles_categories AS ac
                           ON a.id = ac.articles_id
                       INNER JOIN categories AS c
                           ON ac.categories_id = c.id
                       GROUP BY a.id
                    ");
                    $req->execute();
                    $article = $req->fetchAll(PDO::FETCH_OBJ);
                   foreach ($article as $row) {
                            echo '<tr>';
                            echo '<td>'. $row->titre . '</td>';
                            echo '<td>'. $row->auteur . '</td>';
                            echo '<td>'. $row->article . '</td>';
                            echo '<td>'. $row->categorie .'</td>';
                            echo '<td width=250>';
                            echo '<a class="btn" href="read.php?id='.$row->id.'">Read</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update.php?id='.$row->id.'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row->id.'">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                   }

                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
