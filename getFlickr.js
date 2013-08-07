//api key for flickr should be stored in a file in this same directory 
//    called flickrKey.js in a variable called flickrKey

require("./.flickrKey.js");

mongo=require("mongoskin");
db=mongo.db("localhost:27017/mm");
c=db.collection("photos");

var processReply=function(res){
  photoList=JSON.parse(res);
  photoList=photoList.photos.photo;
  var entry="";
  for(photo in photoList){
    entry=photoList[photo];
    entry.random=Math.random();
    entry._id=entry.id;
    console.log(entry);
    if(entry.url_l){
      c.save(entry);
    } 
    else{
      console.log("no url!  Can't add to database");
    }
  }
  console.log("added photos, are they showing up?");
  setTimeout(function(){process.exit()},1000);
};


var querystring=require("querystring");
var najax=require("najax");

searchTerm="mountain landscape";

var flickrUrl="http://api.flickr.com/services/rest/?";
var flickrOptions={
  method: "flickr.photos.search",
  api_key: flickrKey,
  text:"mountain landscape",
  format:"json",
  extras: "url_l",
  nojsoncallback:1
};

var flickrOptionString=querystring.stringify(flickrOptions);
flickrUrl+=flickrOptionString;
console.log(flickrUrl);
najax.get(flickrUrl,processReply);
