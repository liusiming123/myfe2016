var express = require('express');
var router = express.Router();
var user = require('../controllers/user');

router.get('/login',user.login);
router.get('/reg',user.regist);

router.post('/checkLogin',user.checkLogin);

module.exports = router;
