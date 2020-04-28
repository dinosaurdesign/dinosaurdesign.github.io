'use strict';
const
  {src, dest, parallel, series, watch} = require('gulp'),
  fs = require('fs'),
  gulp = require('gulp'),
  sass = require('gulp-sass'),
  autoprefixer = require('gulp-autoprefixer'),
  sourcemaps = require('gulp-sourcemaps'),
  nano = require('gulp-clean-css'),
  include = require("gulp-include"),
  uglify = require('gulp-uglifyjs'),
  rename = require('gulp-rename'),
  pug = require('gulp-pug'),
  plumber = require('gulp-plumber'),
  prettyHtml = require('gulp-pretty-html'),
  debug = require('gulp-debug'),
  browserReload = require('browser-sync');

const
  path = {
    project: './',
    pugs: 'src/pug/**/*.pug',
    pug: 'src/pug/index.pug',
    css: 'css/',
    sass: 'src/sass/*.*',
    js: 'src/js/**/*.js',
    bundle: 'js/'
  }

let prettyOption = {
  indent_size: 2,
  indent_char: ' ',
  unformatted: ['code', 'em', 'strong', 'span', 'i', 'b', 'br', 'script'],
  content_unformatted: [],
}

function css() {
  return src(path.sass)
    .pipe(plumber(
      ({
        errorHandler: function (err) {
          console.log(err.message);
          this.emit('end');
        }
      })
    ))
    .pipe(debug({title: 'Compiles:'}))
    .pipe(sass({}).on('error', sass.logError))
    .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], {cascade: true}))
    .pipe(sourcemaps.init())
    .pipe(nano())
    .pipe(sourcemaps.write('.'))
    .pipe(dest(path.css))
    .pipe(browserReload.reload({stream: true}));
}

function browserSync() {
  browserReload.init(
    {
      server: {
        baseDir: "./"
      },
      files: [],
      port: 3002,
      https: {
        key: "../../userdata/config/cert_files/localhost/localhost-server.key",
        cert: "../../userdata/config/cert_files/localhost/localhost-server.crt",
      },
      notify: false
    }
  );
}

function buildHTML() {
  return src(path.pug, path.nopug)
    .pipe(plumber({
      errorHandler: function (err) {
        console.log(err.message);
        this.emit('end');
      }
    }))
    .pipe(debug({title: 'Compiles '}))
    .pipe(pug({
        pretty: prettyHtml(prettyOption) //отключение минификации
      }
    ))
    .pipe(dest(path.project))
    .pipe(browserReload.reload({stream: true}));
}

function scripts() {
  return src(path.js)
    .pipe(plumber({
      errorHandler: function (err) {
        console.log(err.message);
        this.emit('end');
      }
    }))
    .pipe(debug({title: 'Compiles '}))
    .pipe(sourcemaps.init())
    .pipe(include())
    .on('error', console.log)
    .pipe(rename('index.min.js'))
    .pipe(sourcemaps.write('.'))
    .pipe(dest(path.bundle))
    .pipe(browserReload.reload({stream: true}));

}

function stream() {
  watch(path.sass, parallel(css))
  watch(path.pugs, parallel(buildHTML))
  watch(path.js, parallel(scripts))
}

exports.browserReload = browserSync;
exports.css = css;
exports.buildHTML = buildHTML;
exports.scripts = scripts;
exports.stream = stream;
exports.defaults = parallel(stream, browserSync);
