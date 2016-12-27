var db = require('./db');
exports.queryAllType = function(userId,callback){
    var sql = "select * from t_blog_type where user_id=?";
    db.query(sql,[userId],callback);
};
exports.saveType = function(typeName,userId,callback){
    var sql = "insert into t_blog_type(type_name,user_id) values(?,?)";
    db.query(sql,[typeName,userId],callback);
};
exports.saveBlog = function(title,content,userId,typeId,callback){
    var sql = "insert into t_blog(title,content,user_id,type_id) values(?,?,?,?)";
    db.query(sql,[title,content,userId,typeId],callback);
};
exports.queryBlog = function(userId,callback){
    var sql = "select * from t_blog where user_id=?";
    db.query(sql,[userId],callback);
};
exports.deletBlogs = function(blogId,callback){
    var sql = "delete from t_blog where blog_id in ("+blogId+")";
    db.query(sql,[],callback);
};
exports.deleBlogType = function(typeId,callback){
    console.log('345');
    var sql = "delete from t_blog_type where type_id in ("+typeId+")";
    db.query(sql,[],callback);
};