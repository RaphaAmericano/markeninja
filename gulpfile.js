'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var cleanCss = require('gulp-clean-css');
var concat = require('gulp-concat');

gulp.task('scss', function () {
  return gulp.src(['./scss/style.scss' ])
    .pipe(sass({errLogToConsole: true}))
    ///.pipe(concat('style.css'))
    //.pipe(cleanCss())
    .pipe(gulp.dest('./css'))
});

gulp.task('browserSync', function(){
  browserSync.init({
    server: {
      baseDir: './',
      index: 'index.html'
    }
  })
});

gulp.task('javascript-concat', function(){
    return gulp.src("./js/*.js")
        .pipe(concat("./index.js"))
        .pipe(gulp.dest('./'))
});

gulp.task('scss:watch',['browserSync', 'scss'], function () {
  gulp.watch('./scss/*.scss', ['scss']);
  gulp.watch('./js/*.js', ['javascript-concat']);
  gulp.watch('*.html', browserSync.reload);
  gulp.watch('./scss/*.scss', browserSync.reload);
  gulp.watch('./js/*.js', browserSync.reload);
});