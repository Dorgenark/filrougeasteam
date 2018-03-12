<?php
  include "header.php";
  include "get_Articles.php";
  $selectArticle = $_GET['ID'];
  $sql = $conn->prepare("SELECT * FROM articles WHERE id = $selectArticle");
  // Execute la requête sql et la stock dans la variable $result.
  $sql->execute();
  $resultCheck = $sql->rowCount();
  $row = $sql->fetchAll(PDO::FETCH_OBJ);
 ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h4>
        <?php echo $row[0]->article;  ?>
      </h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <p style="word-wrap: break-word">
        <?php echo $row[0]->article; ?>
      </p>
    </div>
  </div>
</div>
