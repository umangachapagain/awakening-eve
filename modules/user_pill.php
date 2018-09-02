<!-- Split button -->

<div class="btn-group" style="margin:5px;">
  <a href="user_home.php">
  <button type="button" class="btn btn-info" style=" background:#5bc0de;"><?php echo $uname ?></button>
  </a>
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height:50px;background:#5bc0de;"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
  <ul class="dropdown-menu">
    <li><a href="./profile.php">View profile</a></li>
    <li><a href="./post_article.php">Post Article</a></li>
    <li><a href="./post_event.php">Post Event</a></li>
    <li><a href="#">Messages</a></li>
    <li><a href="#">Settings</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="contact.php">Contact Us</a></li>
    <li><a href="modules/logout.php">Log out</a></li>
  </ul>
</div>
