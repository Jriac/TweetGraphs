var moment = require('moment')
    , twitter = require('twitter')
    , common = require('./keys')
    , globalStream;

var MongoClient = require('mongodb').MongoClient
    , assert = require('assert');

// Connection URL







///conexion a mongodb
var twit = new twitter({
    consumer_key: common.keys.consumer_key,
    consumer_secret: common.keys.consumer_secret,
    access_token_key: common.keys.access_token_key,
    access_token_secret: common.keys.access_token_secret
});

var connectStream = function(string,db){


        // db.close();

    twit.stream('statuses/filter', {track: string},  function(stream) {
        globalStream = stream;

        stream.on('error', function(a,b){
            console.error(a);
            console.error(b);
        });

        stream.on('data', function (aTweet) {
            var myId = aTweet.id_str;
            aTweet.created_at = moment(aTweet.created_at);
           // console.info( JSON.stringify(aTweet, null, 2) );
            //guardar en mongo
            console.info("insertando....");
            insertDocuments(db,aTweet);
        });

        stream.on('destroy', function (response) {
            console.log("Disconnected");
        });

    });


        var insertDocuments = function (db, data) {
            // Get the documents collection
            var collection = db.collection('tweets');
            // Insert some documents
            collection.insert(data, function (err, result) {

                assert.equal(err, null);
                assert.equal(1, result.result.n);
                assert.equal(1, result.ops.length);
                console.log("Inserted document into the document collection");
                console.log("inserted");
            });
        }





};

var disconnectStream = function(){
    globalStream.destroy();
};
var url = 'mongodb://localhost:27017/tweetgraphs';
MongoClient.connect(url, function(err, db) {
    assert.equal(null, err);
    console.log("Connected correctly to server");

setInterval(function(){
globalStream.destroy();
    twit.get('trends/place.json', {id : 1}, function(err, data){
        console.info(JSON.stringify(data, null, 2));
        //array de tags
        hashtagsTrends= JSON.parse(JSON.stringify(data));
        console.log("Todos los datos recibidos");
        console.info(hashtagsTrends);
        trends=hashtagsTrends[0].trends;
        console.info("Solo los trends")
        console.log(trends);

        console.info("empezando nuevo stream despues de los tags...");
        connectStream("developer,css,",db);

    });



}, 10*1000);


connectStream("default",db);


});