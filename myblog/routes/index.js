var express = require('express');
var router = express.Router();

router.get('/', function(req, res) {
  res.render('index');
});
router.get('/login', function(req, res) {
  res.render('login');
});
router.get('/reg', function(req, res) {
  res.render('reg');
});
module.exports = router;
