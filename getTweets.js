//this is going to be the node script that makes http requests to twitter and fills mongodb with result tweets
//import twitKeys.js which contains api keys. 
//they are in a separate file that isnt part of the git repo.
//during testing i'm probably slamming duplicate tweets into the db.
//upsert maybe?

require("./twitKeys.js");
mongo=require("mongoskin");


var twit=require("twit");

db=mongo.db("localhost:27017/mm");
c=db.collection("tweets");

var processReply = function(rep){
  var entry="";
  for(tweet in rep.statuses){
    entry=rep.statuses[tweet];
    entry.random=Math.random();
    c.insert(entry);
  }  
  console.log("added entries, are they showing up?");
  setTimeout(function(){process.exit();},1000);//this seems dumb, why does this work?
}

var T = new twit(twitKeys);
T.get('search/tweets', {q:"#motivation", count:100}, function(err,reply){
  processReply(reply);
});





