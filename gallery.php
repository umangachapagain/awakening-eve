<?php $title = "Gallery" ?>
<?php session_start(); include("modules/header.php") ?>
<div>
<div class="filter">
  <a href="#all">ALL</a>
  <a href="#susan">Susan's</a>
</div> 

<div class="gallery">
  <a href="#" class="susan" ><img src="img/gallery/IMG-20160417-WA0002.jpg"></a>
  <a href="#" class="susan"><img src="img/gallery/IMG-20160417-WA0003.jpg"></a>
</div>




</div><!--Container ends here-->
<style>
body {
  margin: 0;
  min-height: 1200px;
  background-color: #fafafa;
}

.filter a {
  padding: 10px 20px;
  display: inline-block;
  color: #003;
  background: #eee;
  text-decoration: none;
  transition: all 0.2s;
  border-radius: 9px
}

.filter a:hover { background: #8ad }

.filter {
  margin-top:10px;
  padding: 50px;
  text-align: center
  
}

.gallery a img {
  width: 100%;
  height: auto;
  float: left;
}

.gallery a {
  width: 33.33%;
  transition: all 0.2s;
  display: block;
  float: left;
  opacity: 1;
  height: auto;
}

.gallery .hide, .gallery .pophide {
  width: 0%;
  opacity: 0;
  transition: all 0.1s;
}

.gallery .pop {
  width: 100%;
  position: relative;
  z-index: 2;
  box-shadow: 0 0 0px 1000px rgba(0,0,0,0.5);
}

.pop:after {
  content: "\00D7";
  position: absolute;
  top: 10px;
  right: 10px;
  color: #333;
  background: #fff;
  padding: 10px 15px;
  border-radius: 50%;
  opacity: 0.8;
}

.pop:hover:after { opacity: 1 }
</style>

<script src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
$('.filter a').click(function(e) {
  e.preventDefault();
  var a = $(this).attr('href');
  a = a.substr(1);
  $('.gallery a').each(function() {
    if (!$(this).hasClass(a) && a != 'all')
      $(this).addClass('hide');
    else
      $(this).removeClass('hide');
  });

});

$('.gallery a').click(function(e) {
  e.preventDefault();
  var $i = $(this);
  $('.gallery a').not($i).toggleClass('pophide');
  $i.toggleClass('pop');
});


</script>
<?php include("modules/footer.php") ?>
