<?php
$article_id = $article_title = $article_authorName = $article_authorInfo = $article_contents = $article_timestamp = $postMSG = NULL;
session_start(); 
include_once 'modules/dbconnect.php'; 
$article_id = $_GET["id"];
$sql = "SELECT article_id, article_title, article_authorName, article_authorInfo, article_contents, article_timestamp FROM articles WHERE article_id = $article_id";
  	$result = $conn->query($sql);
		echo $conn->error;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			  $title = $article_title = $row['article_title'];
			  $article_authorName = $row['article_authorName'];
			  $article_authorInfo = $row['article_authorInfo'];
			  $article_contents = $row['article_contents'];
			  $article_timestamp =  $row['article_timestamp'];
		}
	} else {
		//echo "No contents to display.";
		header("Location: articles.php");
	}

	//$conn->close();
?>
<?php include("modules/header.php"); ?>
<div class ="container">
  <section>
    <div class="col-sm-8">
      <article>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="media-heading"><?php echo $article_title ?></h4>
            <i>Author : <?php echo $article_authorName ?></i>
          </div>
          <div class="panel-body">
            <div class="media">
              <div class="media-body" style="width:70%">
                <?php echo $article_contents ?>
              </div>
            </div>
          </div>
          <div class="panel-footer row" style="margin:0;">
            <div class="col-xs-12 col-lg-8">
              <div id="shareArticles" style="border:0"></div>
            </div>
            <div class="col-xs-12 col-lg-4">
              About author: <?php echo $article_authorInfo ?>
            </div>
          </div>
        </div>
      </article>
    </div>
  </section>
  <aside>
    <div class="col-sm-4">
      <?php include("modules/latest_articles.php") ?>
      <?php include("modules/news_feed.php") ?>
    </div>
  </aside>
</div>
<?php include("modules/footer.php") ?>
