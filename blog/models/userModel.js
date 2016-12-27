var db = require('./db');
exports.queryByNamePwd = function( username,password,callback){
    var sql = "select * from t_user where username=? and password=?";
    db.query(sql,[username,password],callback);
};
exports.save = function(username,password,email,callback){
    var sql = 'insert into t_user(username, password, email) values(?,?,?)';
    db.query(sql, [username,password,email], callback);
};