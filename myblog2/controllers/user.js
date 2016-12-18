exports.login = function(req,res){
    res.render('login');
};
exports.regist =function(req,res){
    res.render('reg');
};
exports.checkLogin = function(req,res){
    var username = req.body.uname;
    var password = req.body.pwd;

};