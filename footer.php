<footer>
<? (include_once("/admin/serverinfo.php"));


?>
<br>
  <div class="card text-center">
  <div class="card-header">
    News
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $newstitle; ?></h5>
    <p class="card-text"><?= $newsdescription; ?></p>
    <a href="https://sebastienmerv.be" class="btn btn-primary">Voir mes autres créations</a>
  </div>
  <div class="card-footer text-muted">
  <?= $newsdate; ?>
  </div>
</div>  
</footer>