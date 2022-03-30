'use strict';
/*
var gulp = require('gulp');
// Requires the gulp-sass plugin
var sass = require('gulp-sass');

const { series } = require('gulp');
const { watch } = require('gulp');


// The `clean` function is not exported so it can be considered a private task.
// It can still be used within the `series()` composition.
function clean(cb) {

  return gulp.src('./web/themes/custom/scouts/scss/scouts.scss')
    .pipe(sass()) // Converts Sass to CSS with gulp-sass
    .pipe(gulp.dest('./web/themes/custom/scouts/css'))

  cb();
}

exports.default = function() {
  // The task will be executed upon startup
  series(clean)
  watch('./web/themes/custom/scouts/scss/scouts.scss', gulp.series('sass'), function(cb) {
    // body omitted
    cb();
  });
};
*/

var {
  src,
  dest,
  watch,
  series,
} = require('gulp');
var sass = require('gulp-dart-sass'),
  sourcemaps = require('gulp-sourcemaps'),
  cleanCss = require('gulp-clean-css'),
  rename = require('gulp-rename'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify-es').default,
  pipeline = require('readable-stream').pipeline;

var fs = require('fs');
var path = require('path');
var merge = require('merge-stream');
const {
  doesNotMatch
} = require('assert');

var gulp = require('gulp');

var location = './web/themes/custom/scouts'

const paths = {
  scss: {
    src: location + '/scss/style.scss',
    dest: location + '/css',
    watch: location + '/scss/**/*.scss',
    bootstrap: 'node_modules/bootstrap/scss/bootstrap.scss',
    print: location + '/scss/print.scss'
  },
  js: {
    src: location + '/js/script.js',
    bootstrap: 'node_modules/bootstrap/dist/js/bootstrap.min.js',
    jquery: 'node_modules/jquery/dist/jquery.min.js',
    watch: location + '/js/script.js',
    dest: location + '/js'
  }
}

// Create tasks for each site to compile SCSS into CSS.
function buildStyles() {
  console.log('buildStyles called');
  return gulp.src('web/themes/custom/scouts/scss/scouts.scss')
  .pipe(sass()) // Converts Sass to CSS with gulp-sass
  .pipe(gulp.dest('web/themes/custom/scouts/css'))

}

function watcher() {
  console.log('Watching scss files');
  watch([paths.scss.src, paths.scss.watch, paths.scss.print], buildStyles).on('change', function (path) {
    console.log('SCSS changed: ' + path);
  });
}

exports.build = series(
  buildStyles,
);
exports.default = series(
  exports.build,
  watcher
);
