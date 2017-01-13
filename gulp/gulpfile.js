/**
 * Created by 韩小毛 on 2017/1/13.
 */
var gulp =require('gulp');
var sass =require('gulp-sass');
var connect =require('gulp-connect');
var concat =require('gulp-concat');
var uglify =require('gulp-uglify');
var rename =require('gulp-rename');



/*copy子目录下的jpg格式图片*/
gulp.task ("copy-img",function(){
    gulp.src("src/images/*.jpg").pipe(gulp.dest('dist/imgs'));
});
/*copy所有子目录下的png格式图片*/
gulp.task ("copy-all",function(){
    gulp.src("src/images/**/*.png").pipe(gulp.dest('dist/imgs'));
});
/*copy所有子目录下的png和jpg格式图片*/
gulp.task ("copy-allimg",function(){
    gulp.src("src/images/**/*.{png,jpg}").pipe(gulp.dest('dist/images'));
});
/*copy所有子目录下的jpg格式图片     不包括111.jpg*/
gulp.task ("copy-jpg",function(){
    gulp.src(["src/images/**/*.jpg","!src/images/111.jpg"]).pipe(gulp.dest('dist/imgs'));
});
/*copy所有子目录下的jpg格式图片     不包括所有有111的图片*/
gulp.task ("copy-alljpg",function(){
    gulp.src(["src/images/**/*.jpg","!src/images/111*.jpg"]).pipe(gulp.dest('dist/images'));
});

gulp.task('html',function(){
    gulp.src("src/index.html").pipe(gulp.dest('dist')).pipe(connect.reload());
});
//gulp.task('watch-html',function(){
//    gulp.watch("src/index.html",['html']);
//});
gulp.task('sass',function(){
    gulp.src("src/sass/style.scss").pipe(sass()).pipe(gulp.dest('dist/css')).pipe(connect.reload());
});
//gulp.task('watch-sass',function(){
//    gulp.watch("src/sass/*.scss",['sass']);
//});
//gulp.task('watch-concat',function(){
//    gulp.watch("src/js/*.js",['concat']);
//});
gulp.task('watch',function(){
    gulp.watch("src/index.html",['html']);
    gulp.watch("src/sass/*.scss",['sass']);
    gulp.watch("src/js/*.js",['concat']);
});
gulp.task('concat',function(){
    gulp.src(["src/js/test.js","src/js/test1.js"])
        .pipe(concat('main.js')).pipe(gulp.dest('dist/js'))
        .pipe(uglify()).pipe(rename("main.min.js"))
        .pipe(gulp.dest('dist/js')).pipe(connect.reload());
});
gulp.task('server',function(){
        connect.server({
            root:'dist',
            port:8888,
            livereload:true
        });
});
//gulp.task('watch-html',function(){
//    gulp.watch("src/index.html",['server','copy']);
//});
//gulp.task('watch',['server','watch-html','watch-sass','watch-concat']);
gulp.task('default',['server','watch']);


