'use strict';

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

var location = './web/themes/custom/scouts'
var scssModulesPath = './web/modules/custom/';

function getFolders(dir) {
  return fs.readdirSync(dir)
    .filter(function (file) {
      return fs.statSync(path.join(dir, file)).isDirectory();
    });
}

function buildModulesCss(done) {
  var folders = getFolders(scssModulesPath);
  if (folders.length === 0) return done();
  var tasks = folders.map(function (folder) {
    var scssPath = folder + '/scss';
    if (fs.existsSync(scssModulesPath + scssPath)) {
      console.log('Converting SCSS in ' + scssModulesPath + folder);
      return pipeline(
        src(path.join(scssModulesPath, folder, '/**/*.scss')),
        sass.sync().on('error', sass.logError),
        cleanCss(),
        concat(folder + '.css'),
        rename({
          suffix: '.min'
        }),
        dest(scssModulesPath + folder + '/css'),
      );
    }
  });
  done();
}

// Store paths for each site to process SCSS and JS.
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
  return pipeline(
    src([paths.scss.src, paths.scss.bootstrap, paths.scss.print]),
    sourcemaps.init({
      loadMaps: true
    }),
    sourcemaps.identityMap(),
    sass.sync().on('error', sass.logError),
    cleanCss(),
    rename({
      suffix: '.min'
    }),
    sourcemaps.write('./maps'),
    dest(paths.scss.dest),
  );
}

// This will create tasks for each site to move bootstrap/jquery javascript files
// into the theme's JS folder.
// As well as minifying global.js
function buildScripts() {
  return pipeline(
    src(paths.js.src),
    uglify(),
    rename({
      suffix: '.min'
    }),
    // Copy across Bootstrap and jQuery files from npm source.
    src([paths.js.bootstrap, paths.js.jquery]),
    dest(paths.js.dest)
  );
}

// Watching SCSS/JS files.
// TODO: clean up to follow Gulp 4 guidelines.
function watcher() {
  console.log('Watching scss/js files');

  watch([paths.scss.src, paths.scss.watch, paths.scss.print], buildStyles).on('change', function (path) {
    console.log('SCSS changed: ' + path);
  });
  watch([paths.js.src, paths.js.watch], buildScripts).on('change', function (path) {
    console.log('JS changed: ' + path);
  });
}

exports.build = series(
  buildModulesCss,
  buildStyles,
  buildScripts
);
exports.default = series(
  exports.build,
  watcher
);
