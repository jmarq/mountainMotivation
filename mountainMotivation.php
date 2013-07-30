<?php
//this is going to be the main show. the client requests this page as his bounty. on the request, the php page will query the database and render the page.
//the page is going to start out as a simple html page with a big centered photo and some text superimposed. 
$mongo= new MongoClient();

$db= $mongo->mm;

$photoC= $db->photos;
$pCount=$photoC->count();
$which=rand(0,$pCount-1);
$photoCursor=$photoC->find();
$photoCursor->skip($which);
$fUrl=$photoCursor->getNext()["url_l"];

$tweetC= $db->tweets;
$tCount=$tweetC->count();
$which=rand(0,$tCount-1);
$tweetCursor=$tweetC->find();
$tweetCursor->skip($which);
$tText=$tweetCursor->getNext()["text"];




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mountain Motivation - Let the Words Lift Your Spirit</title>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
	<link rel="stylesheet" href="./mountainMotivation.css" />
</head>
<body>
	  
	  <div id="tweetFrame"><?php echo $tText ?></div>
	  <script type="text/javascript">
	    $("#tweetFrame").backstretch("<?php echo $fUrl ?>");
	  </script>
</body>
</html>
