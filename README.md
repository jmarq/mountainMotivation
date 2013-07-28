#what are the pieces? 

##server side api calls & storage

I need api keys to make the requests, and I can't expose them to the client. I can use python, node, php, etc

the api calls could be made in response to client requests, or made periodically (or one-time) on the server and held in some sort of data store.

node with twit library for easy authenticated twitter calls seems like a good option.
mongodb?

##client side request and view

The client page will contain a script that asks the remote server for a tweet and a photo url.  the server will produce these and send them back via jsonp or something.

  
