<?php 
	$article_title = $article_authorName = $article_authorInfo = $article_contents = $postMSG = NULL;

session_start(); 
include_once 'modules/dbconnect.php';
if(!isset($_SESSION['user'])!="")
	{
	 header("Location: logPage.php");
	}
$title="Post an article";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $article_title = test_input($_POST["article_title"]); 
   $article_authorName = test_input($_POST["article_authorName"]);
   $article_authorInfo = test_input($_POST["article_authorInfo"]);
   $article_contents = addslashes($_POST["article_contents"]);
   
  if(isset($article_title)&&isset($article_authorName)&&isset($article_authorInfo)&&isset($article_contents))
  {
	$sql = "INSERT INTO users.articles (article_title, article_authorName, article_authorInfo, article_contents) VALUES ('$article_title', '$article_authorName', '$article_authorInfo', '$article_contents')";

	if ($conn->query($sql) === TRUE) {
    	$postMSG = '<span class="help-class col-xs-6 col-xs-offset-2" style="color:#29a628;">Posted successfully</span>';
	
	} else {
    	$postMSG = $conn->error;
		echo $postMSG;
	}
  }
  else{
	  	$postMSG = '<span class="help-class col-xs-6 col-xs-offset-2" style="color:#a94442;">Article couldn\'t be posted.</span>';
	  	echo $conn->error;
	  }
	$conn->close();
} 
function test_input($data) {
if(!$data==""){
  $data = trim($data);
  $data = stripslashes($data);
  return $data;
}
else{
  return NULL;
}
} 
include('modules/header.php') ?>
<br />	
 
 <form class="form-horizontal col-sm-10" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post" style="margin-top:60px; color:#fff" name="articleForm">
      <?php echo $postMSG ?><br />
        <div class="form-group">
          <label for="article_title" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="article_title" name="article_title" placeholder="Title">
          </div>
        </div>
        <div class="form-group">
          <label for="article_authorName" class="col-sm-2 control-label">Author</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="article_authorName" name="article_authorName" placeholder="<?php echo $uname ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="article_authorInfo" class="col-sm-2 control-label">Author Info</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="article_authorInfo" name="article_authorInfo" placeholder="About author">
          </div>
        </div>
        <div class="form-group">
         <label for="article_contents" class="col-sm-2 control-label">Content</label>
          <div class="col-sm-10">
          <textarea class="form-control editor" id="article_contents" name="article_contents"></textarea>
          </div>
        </div>
         <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default btn-success">Submit</button>
          </div>
        </div>
      </form>
<?php include('modules/footer.php') ?>