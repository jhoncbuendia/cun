var gulp = require('gulp'),
    connect = require('gulp-connect'),
    less = require('gulp-less'),
    path = require('path'),
    livereload = require('gulp-livereload');;

gulp.task('connect', function() {
  connect.server({
    livereload: true
  });
});

gulp.task('php', function () {
  gulp.src('/*.php')
    .pipe(connect.reload());
});

gulp.task('less', function () {
  return gulp.src('less/**/*.less')
    .pipe(less({
      paths: [ path.join(__dirname, 'less', 'includes') ]
    }))
    .pipe(gulp.dest('css'))
    .pipe(livereload());
});

gulp.task('watch', function() {
  livereload.listen();
  gulp.watch('less/*.less', ['less']);
  gulp.watch(['/*.php'], ['php']);
});

gulp.task('default', ['watch', 'less']);