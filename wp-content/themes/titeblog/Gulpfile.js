'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');

// 'styles' task to compile SCSS files
gulp.task('styles', function() {
    gulp.src('./sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({compatibility: 'ie8'}))
        .pipe(gulp.dest('./'));
});

// Watch task
gulp.task('default',function() {
    gulp.watch('sass/**/*.scss',['styles']);
});
