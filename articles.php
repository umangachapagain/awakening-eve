<?php 
 session_start();
	include_once 'modules/dbconnect.php';
?>
<?php $title = "Articles" ?>
<?php include("modules/header.php") ?>
<div class="container">
  <section>
  <div class="col-sm-8">
  <?php include("modules/latest_articles.php"); ?>
  </div>
  </section>
  <aside>
  <div class="col-sm-4">
    <?php include("modules/news_feed.php") ?>
  </div>
</aside>
</div><!--container ends here-->
<?php include("modules/footer.php") ?>
