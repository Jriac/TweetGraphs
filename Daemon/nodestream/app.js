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
function trackTrends(woeids) {
    var palabras=[];
   // console.log(woeids);

    for(var k = 0, len1=woeids.length; k < len1 ; k++ ){

      twit.get('trends/place.json', {id: woeids[k]}, function (err, data) {
       console.info(JSON.stringify(data));
        //array de tags
        hashtagsTrends = JSON.parse(JSON.stringify(data));
        //console.log("Todos los datos recibidos");
       // console.info(hashtagsTrends);
        trends = hashtagsTrends[0].trends;
        //console.info("Solo los trends")
       // console.log(trends[0].name);
            console.log("usando...");
            console.log(k);
            console.log(len1);
          console.log("Linea 100");

        for (var i = 0, len = trends.length; i < len; i++) {
            console.log(trends[i].name);
            palabras.push(trends[i].name);
        }
        console.log("hashes en la funcion tracktrends");
        console.log(palabras.join(","));
    });
    }
    console.log("palabras pusheadas por trend");
    console.log(palabras.join(","));
    return palabras;


}

setInterval(function(){
globalStream.destroy();

    woeids=[1,753692,754542,766273,774508];

    trendsString=trackTrends(woeids);

    console.log("palabras Recogidas:"+trendsString.join(","));
    console.info("empezando nuevo stream despues de los tags...");
    console.log("esto es el string de hashes...");
    console.log(trendsString.join(","));
    connectStream(trendsString.join(","),db);

}, 25*1000);

    woeids=[1,753692,754542,766273,774508];

    trendsString=trackTrends(woeids);
    console.info("empezando el primer stream");
    console.log(trendsString.join(","));

    console.log("_______________________________________________________________")
connectStream(trendsString.join(","),db);


});