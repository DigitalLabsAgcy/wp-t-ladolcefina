const { src, dest, parallel } = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const clean = require('gulp-clean');
const stripdebug = require('gulp-strip-debug');
const less = require('gulp-less');
const minifyCSS = require('gulp-csso');
const minifyJS = require('gulp-minify');
const concat = require('gulp-concat');
const autoprefixer = require('gulp-autoprefixer');

function css() {
    return src('./assets/less/custom.less')
        .pipe(less())
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(sourcemaps.write('./maps'))
        .pipe(dest('dist/assets/css'))
}

function css_prod() {
    return src('./assets/less/custom.less')
        .pipe(less())
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(minifyCSS())
        .pipe(dest('dist/assets/css'))
}

function js() {
    return src('./assets/js/app/*.js', { sourcemaps: true })
        //.pipe(stripdebug())
        .pipe(concat('app.min.js'))
        .pipe(dest('dist/assets/js', { sourcemaps: true }))
}

function js_prod() {
    return src('./assets/js/app/*.js', { sourcemaps: false })
        .pipe(concat('app.js'))
        .pipe(stripdebug())
        .pipe(minifyJS({
            ext: {
                min: '.min.js'
            }
        }))
        .pipe(dest('dist/assets/js', { sourcemaps: false }))
}

function js_acf_map() {
    return src('./assets/js/map-shortcode.js', { sourcemaps: true })
        .pipe(concat('map-shortcode.min.js'))
        .pipe(dest('dist/assets/js', { sourcemaps: true }))
}

function js_prod_acf_map() {
    return src('./assets/js/map-shortcode.js', { sourcemaps: false })
        .pipe(stripdebug())
        .pipe(minifyJS({
            ext: {
                min: '.min.js'
            }
        }))
        .pipe(dest('dist/assets/js', { sourcemaps: false }))
}

function clean_dist() {
    return src(['dist/*'], { read: false })
        .pipe(clean());
}

var filesToMove = [
    './assets/fonts/*.*',
    './assets/images/*.*',
    './assets/css/*.*',
    './assets/doc/*.*',
    './node_modules/slick-carousel/slick/slick.min.js',
    './node_modules/slick-carousel/slick/slick.css',
    //'./node_modules/magnific-popup/dist/*.*',
];

function move() {
    return src(filesToMove, { base: './' })
        .pipe(dest('dist'));
}

//exports.clean_dist = clean_dist;
exports.move = move;

//exports.js = js;
exports.js_acf_map = js_acf_map;
//exports.css = css;
exports.default = parallel(js_acf_map, move);

//exports.js_prod = js_prod;
exports.js_prod_acf_map = js_prod_acf_map;
//exports.css_prod = css_prod;
exports.production = parallel(js_prod_acf_map, move);