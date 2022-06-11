<!DOCTYPE html>
<html lang="en">
<head>
<title>Home Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">

<link href="css/styles.css" rel="stylesheet" type="text/css" media="all">
<link href="css/header.css" rel="stylesheet" type="text/css" media="all">
<link href="css/categ.css" rel="stylesheet" type="text/css" media="all">
<link href="css/MEDIA.css" rel="stylesheet" type="text/css" media="all">
<link href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Vollkorn:regular,italic,bold" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<script src="js/IE9.js"></script>
<![endif]-->
</head>
<body>

<?php include_once('templates/header.php');?>
<div id="maincontent" class="bodywidth clear">
<div id="aboutleft"> 
<?php

 try {
     /*index.php?article_id=2 
     then i get article_id 
      it will redirect to article.html "article details" or 
      here  I replace the current left html with  articledetails.php 
     */
if (isset($_GET['article_id'])){ 
    $value =($_GET['article_id']);
    if(is_numeric($value)) // check if the value sent is number before execute the query and include 
    {
        include_once('Getleft/articledetails.php');
    }
    else
    {
    
        include_once('templates/error.php');// this in case user put random value char ex index.php/article_id=jdjdj word  so  i redirect to  page is not found
    }

}
 /*index.php?categ_id=2 
     then I get categ_id 
      it will redirect to category.html "articles" or 
      here  I replace the current left html with  articles.php   */
else if (isset($_GET['categ_id'])){
    $value =($_GET['categ_id']);
    if(is_numeric($value)) // check if the value is number 
    {
        include_once('Getleft/articles.php');
    }
    else
    {
        include_once('templates/error.php'); //  in case the user put random key word i can replace it the page is not found 
    }
}
else{ // else redirect to home page
    include_once('Getleft/categ.php'); 
}
 }
 //catch exception
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }
?>
</div>
<section id="articlesright">
<article>
 <?php include_once('GetRight/articlelist.php');?>
 </article>
</section>
</div>
<?php include_once('templates/footer.php');?>
</body>

</html>
