<?php
//this script should do pretty much the same as the main php script
//except it shouldn't render the html, it should return a jsonp object.

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



echo "mmJSONP({ photoURL : ";
echo $fURL;
echo " , tweetText: ";
echo $tText;
echo "});"
?>
