/**
 * Created by Farhad Zaman on 3/3/2017.
 */

   // var socket=io.connect("ws://http://180credit.com:8080",{"transports": ['websocket']});
      var socket=io.connect("wss://180credit.com:60000");
//var socket=io.connect(location.protocol+"//"+location.hostname,{"transports": ['websocket']});


var sessionId=null;
let localSessionId=localStorage.getItem("s_id");
if(localSessionId!=null){
    sessionId=localSessionId;
}

    var token=null;
if(String(localStorage.getItem("T"))=="token") {
    token=String(localStorage.getItem("_r"));
}else {
    token=JSON.parse(localStorage.getItem("_r"));
}
    var tokenData = {
        _r: token,
        url: baseUrl, //located in views/layout/header_script.php line 27-29
        registrarType:"client",
        sId:sessionId
    };


    socket.emit("register",JSON.stringify(tokenData));   // need to register with server after connection
    //socket.emit("messageNotification",JSON.stringify(data));

// after registration a browser/device identification token will be sent from server name s_Id
// save it on browser local storage.
socket.on("getSessionId",function (sId) {
    localStorage.setItem("s_id",sId);
    sessionId=sId;
    tokenData.sId=sId;
});

