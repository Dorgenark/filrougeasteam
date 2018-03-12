<?php
require "header.php";
require "get_Articles.php";

$selectArticle = $_GET['ID'];
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $req = $conn->prepare("
        SELECT a.id, a.titre, a.article, c.categorie
        FROM articles AS a
        INNER JOIN articles_categories AS ac
            ON a.id = ac.articles_id
        INNER JOIN categories AS c
            ON ac.categories_id = c.id
        WHERE a.id = ?
    ");
    $req->execute([$selectArticle]);

    $article = $req->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h4>
          <?= $article[0]->titre; ?>
      </h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <p style="word-wrap: break-word">
        <?= $article[0]->article; ?>
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <ul>
        <?php foreach($article as $articleSolo): ?>
        <li><?= $articleSolo->categorie; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
