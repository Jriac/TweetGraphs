var moment = require('moment')
    , twitter = require('twitter')
    , common = require('./keys')
    ,mongodb=require('mongodb')
    , globalStream;

var MongoClient = require('./').MongoClient;

function connect_to_mongo(callback) {
    if (database != null) {
        callback(null, database);
    } else {
        var connection = "mongodb://127.0.0.1:27017/tweetgraphs";
        MongoClient.connect(connection, {
            server : {
                reconnectTries : 5,
                reconnectInterval: 1000,
                autoReconnect : true
            }
        }, function (err, db) {
            database = db;
            callback(err, db);
        });
    }
}
var twit = new twitter({
    consumer_key: common.keys.consumer_key,
    consumer_secret: common.keys.consumer_secret,
    access_token_key: common.keys.access_token_key,
    access_token_secret: common.keys.access_token_secret
});

var connectStream = function(string){
    twit.stream('statuses/filter', {track: string},  function(stream) {
        globalStream = stream;

        stream.on('error', function(a,b){
            console.error(a);
            console.error(b);
        });

        stream.on('data', function (aTweet) {
            var myId = aTweet.id_str;
            aTweet.created_at = moment(aTweet.created_at);
            console.info( JSON.stringify(aTweet, null, 2) );
            //guardar en mongo
        });

        stream.on('destroy', function (response) {
            console.log("Disconnected");
        });

    });

};

var disconnectStream = function(){
    globalStream.destroy();
};

setInterval(function(){
globalStream.destroy();
    twit.get('trends/place.json', {id : 1}, function(err, data){
        console.info(JSON.stringify(data, null, 2));
        //array de tags
        connectStream();

    });




}, 5*60*1000);

connectStream("default");