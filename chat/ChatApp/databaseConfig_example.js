/**
 * Created by Farhad Zaman on 3/11/2017.
 */
const mysql = require("mysql");
const mysql2 = require("mysql2/promise");
const dbSettings={
        connectionLimit: 300,
        host: 'localhst',
        user: 'root',
        password: '',
        database: ''
    };

const app={};

app.mysql=mysql;
app.mysql2=mysql2;
app.mysqlCon = mysql.createPool(dbSettings);
app.mysqlCon2 = mysql2.createPool(dbSettings);
app.dbSettings=dbSettings;
module.exports = app;


