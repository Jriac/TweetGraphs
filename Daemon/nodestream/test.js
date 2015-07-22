var connectStream= function () {

};


var disconnectStream=function(){

    twit.destroy();

};
setInterval(function(){
    disconnectStream();

},5*10000);
