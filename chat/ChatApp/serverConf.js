const moment = require('moment');
let app={};

const SSL=true;   // true if ssl active and protocol HTTPS
app.ID_LOGIN=false;

app.createServer=function (app) {
    let server=null;
    if(SSL){
        const fs=require("fs");
        // certificate paths
        const opt={
            key: fs.readFileSync('/home/credit/ssl/keys/afced_4c51f_bd476b75bba1d99a832cd357dce2329f.key'), //location of private key file.required. extension can be .key
            cert: fs.readFileSync('/home/credit/ssl/certs/180credit_com_afced_4c51f_1563321599_d3c7cf9818659f4dd9840ef730f959dd.crt'), //location of certificate file.required. extension can be .cert
            // ca: fs.readFileSync('/etc/chain.pem') // optional
        };
        server = require("https").createServer(opt,app); // https port 8443
    }else{
        server = require("http").createServer(app);  // else http port 8080
    }
    return server;
};

app.startServer=function (server) {
    // https port 8443
    if(SSL){
        server.listen(process.env.PORT || 60000, function () {
            let host = server.address().address;
            let port = server.address().port;
            console.log("\n\n---------------------------- " + moment().format('MMMM Do YYYY, hh:mm:ss') + " ----------------------------\n");
            console.log("[ " + moment().format('MMMM Do YYYY, hh:mm:ss') + " ] " + "Im server running at https://" + host + ':' + port);

        });

    }
    // else http port 8080
    else{
        server.listen(process.env.PORT || 60000, function () {
            let host = server.address().address;
            let port = server.address().port;
            console.log("\n\n---------------------------- " + moment().format('MMMM Do YYYY, hh:mm:ss') + " ----------------------------\n");
            console.log("[ " + moment().format('MMMM Do YYYY, hh:mm:ss') + " ] " + "Im server running at http://" + host + ':' + port);

        });

    }
};

module.exports = app;