var userModels = require('../models/userModel');

exports.index =function(req,res){
    res.render('index',{
        username : req.session.loginUser
    });
};

exports.login = function(req,res){
    res.render('login');
};
exports.logout = function(req,res){
    req.session.loginUser = null;
    exports.login(req,res);
};
exports.reg =function(req,res){
    res.render('reg');
};

exports.checkLogin = function(req,res){
    var username = req.body.uname;
    var password = req.body.pwd;
    userModels.queryByNamePwd(username,password,function(result){
        if(result.length>0){
            var user = result[0];
            req.session.loginUser = user;
            res.redirect('/adminIndex');
        }else{
            res.redirect('/login');
        }
    });
};
exports.regist = function(req,res){
    var username = req.body.uname;
    var password = req.body.pwd;
    var email = req.body.emails;
    var password2 = req.body.pwd2;
    if(password!=password2){
        res.render('reg');
    }
    userModels.save(username,password,email,function(result){
        if(result.affectedRows>0){
                res.redirect('/login');
        }else{
            res.redirect('/reg');
        }
    });
};