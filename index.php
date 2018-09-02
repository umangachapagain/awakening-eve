<?php $title = "Home" ?>
<?php
session_start();
include("modules/header.php");
?>


<section class="banner">
	
	<div class="description">
    <div class="caption">Awakening Eve</div>
    <div class="dropButton">
    <a href="#contents">
    <i class="fa fa-angle-double-down fa-4x animated bounce infinite" aria-hidden="true"></i>
    </a>
    </div>
    </div>
</section>

<div id="contents">
<section>
  <div class="col-sm-8">
    <?php include("modules/location.php") ?>

    <?php include("modules/featured_article.php") ?>

    <?php include("modules/featured_events.php") ?>

  </div>
</section>
<br/>

      <aside>
        <div class="col-sm-4">
          <?php include("modules/latest_articles.php") ?>
          <?php include("modules/news_feed.php") ?>

        </div>
      </aside>
</div>
      <?php include("modules/footer.php") ?>
