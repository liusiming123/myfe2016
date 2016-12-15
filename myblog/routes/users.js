var express = require('express');
var router = express.Router();

router.get('/login',function(reg,res){
  res.render('login');
});
router.get('/regist',function(reg,res){
  res.render('regist');
});
router.post('/checklogin',function(reg,res){
  var username=reg.body.username;
  var psd = reg.body.psd;
  console.log(username);
  if(username=='liusiming' && psd == '123456'){
    res.render('index',{
      username:username
    });
  }else{
    res.send('失败');
  }
});
router.get('/checkUser',function(reg,res){
    var username = reg.query.username;
    if(username=='liusiming'){
       res.send('失败');
    }else{
      res.send('成功');
    }
});
router.post('/checkRegist',function(reg,res) {
  var username = reg.body.username;
  res.render('index', {
    username: username
  });
});
module.exports = router;
