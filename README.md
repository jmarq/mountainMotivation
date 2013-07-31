#What?

Okay so what we're gonna do is grab tweets with #motivation and slap them onto photos with "mountain landscape".  Then I'm going to look at the results and ask myself how I feel.

#what are the pieces? 

##server side api calls & storage

I need api keys to make the requests, and I can't expose them to the client. I can use python, node, php, etc

the keys are to be stored in a file called .twitKeys.js in a json object with
consumer_key, consumer_secret, access_token, and access_token_secret as keys with their corresponding string values

the api calls could be made in response to client requests, or made periodically (or one-time) on the server and held in some sort of data store.

node with twit library for easy authenticated twitter calls seems like a good option.
mongodb? mongoskin.

node with mongoskin to make an http request (several?) to both flickr and twitter in order to populate the mongodb database with a collection of both tweets and photos.

php page will respond to client requests and grab a random entry from each collection, and render the page.


##client side request and view

the client will just request the php page described above, it will render as simple html and css.  javascript maaaybe for some presentation value.
  
