var blogModels = require('../models/bolgModels');
exports.adminIndex = function(req,res){
    res.render('adminIndex',{
        username:req.session.loginUser
    });
};
exports.newBlog = function(req,res){
    var username = req.session.loginUser;
    blogModels.queryAllType(username.user_id,function(result){
        res.render('newBlog',{
            username:req.session.loginUser,
            types:result
        });
    });
};
exports.blogType = function(req,res){
    var username = req.session.loginUser;
    blogModels.queryAllType(username.user_id,function(result){
            res.render('blogType',{
                username:req.session.loginUser,
                types:result
            });
        });
};
exports.addBlogType = function(req,res){
    var typeName = req.body.typeName;
    var username = req.session.loginUser;
    blogModels.saveType(typeName,username.user_id,function(result){
        if(result.affectedRows>0){
            res.redirect('/blogType');
        }else{
            res.redirect('/addBlogType');
        }
    });
};
exports.addBlog = function(req,res){
    var title = req.body.title;
    var typeId = req.body.typeId;
    var content = req.content;
    var user = req.session.loginUser;
    blogModels.saveBlog(title,content,user.user_id,typeId,function(result){
        if(result.affectedRows>0){
            res.redirect('/blogs');
        }else{
            res.redirect('/newBlog');
        }
    });

};
exports.blogs = function(req,res){
    var username = req.session.loginUser;
    blogModels.queryBlog(username.user_id,function(result){
        res.render('blogs',{
            username:username,
            blogs:result
        });
    });

};
exports.blogComments = function(req,res){
    res.render("blogComments",{
        username:req.session.loginUser
    })
};
exports.delBlog = function(req,res){
    var blogId = req.query.blogId;
    blogModels.deletBlogs(blogId,function(result){
        if(result.affectedRows>0){
            res.send('success');
        }else{
            res.send('fail');
        }
    });
};
exports.delType = function(req,res){
    var typeId = req.query.typeId;
    blogModels.deleBlogType(typeId,function(result){
        if(result.affectedRows>0){
            res.send('success');
        }else{
            res.send('fail');
        }
    });
};
exports.changeType = function(req,res){
    var typeID = req.query.id;
    var username = req.session.loginUser;
    var typeName = req.query.typename;
    blogModels.queryAllType(username.user_id,function(result){
        console.log('123');
        res.render('changeType',{

            username:req.session.loginUser,
            types:result,
            typeName:typeName
        });
    });
};