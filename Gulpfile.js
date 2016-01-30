'use strict';

var gulp = require('gulp');
var shell = require('gulp-shell')
var themeDir = './web/app/themes/titeblog/';

// 'styles' task to compile SCSS files
gulp.task('styles', shell.task([
  'cd '+themeDir+' && npm update',
  'cd '+themeDir+' && gulp styles'
]));

gulp.task('watch', shell.task([
  'cd '+themeDir+' && npm update',
  'cd '+themeDir+' && gulp watch'
]));
