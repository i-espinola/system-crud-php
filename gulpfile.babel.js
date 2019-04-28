// Setting ES version
/*jshint esversion: 6 */

// Setting paths
const path = {
    source: ['./src'],
    build: ['./public'],
    views: {
        src: [
            './src/views/**/*',
            './src/views/*'
        ],
        build: './public'
    },
    styles: {
        src: [
            './src/assets/scss/*.scss',
            './src/assets/scss/**/*.scss'
        ],
        build: './public/assets/css'
    },
    scripts: {
        src: [
            './src/assets/js/*.js'
        ],
        build: './public/assets/js'
    },
    img: {
        src: [
            './src/assets/img/*',
            './src/assets/img/**/*'
        ],
        build: './public/assets/img'
    },
    font: {
        src: [
            './src/assets/fonts/*',
            './src/assets/fonts/**/*'
        ],
        build: './public/assets/fonts'
    },
    vendor: {
        src: [
            './src/assets/vendor/**/*'
        ],
        build: './public/assets/vendor'
    },
};

// ------------------------

import del from 'del';
import gulp from 'gulp';
import sass from 'gulp-sass';
import babel from 'gulp-babel';
import rename from 'gulp-rename';
import uglify from 'gulp-uglify';
import htmlmin from 'gulp-htmlmin';
import imagemin from 'gulp-imagemin';
import cleanCSS from 'gulp-clean-css';
import browserSync from 'browser-sync';


// Task server developer
export function server() {
    browserSync.create();
    browserSync.init({
        watch: true,
        server: {
            baseDir: path.build
        }
    });

    gulp.watch(path.views.src).on("change", gulp.parallel(views, browserSync.reload));
    gulp.watch(path.styles.src).on("change", gulp.parallel(styles, browserSync.reload));
    gulp.watch(path.scripts.src).on("change", gulp.parallel(scripts, browserSync.reload));
    gulp.watch(path.img.src).on("change", gulp.parallel(imgs, browserSync.reload));
}

// Task View
export function views() {
    return gulp.src(path.views.src)
        // .pipe(htmlmin({
        //     collapseWhitespace: true,
        //     removeComments: true
        // }))
        .pipe(gulp.dest(path.views.build))
        .pipe(browserSync.stream());
}

// Task SASS Precompile
export function styles() {
    return gulp.src(path.styles.src)
        .pipe(sass())
        // .pipe(cleanCSS())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(path.styles.build))
        .pipe(browserSync.stream());
}

// Task JS Precompile
export function scripts() {
    return gulp.src(path.scripts.src, {
            sourcemaps: true
        })
        .pipe(babel())
        // .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(path.scripts.build))
        .pipe(browserSync.stream());
}

// Task Otimizer Images
export function imgs() {
    return gulp.src(path.img.src)
        .pipe(imagemin({
            progressive: true
        }))
        .pipe(gulp.dest(path.img.build))
        .pipe(browserSync.stream());
}

// Task Import Fonts
export function fonts() {
    return gulp.src(path.font.src)
        .pipe(gulp.dest(path.font.build));
}

// Task Import vendor
export function vendor() {
    return gulp.src(path.vendor.src)
        .pipe(gulp.dest(path.vendor.build));
}

// Task Clean All Build
export const clean = () => del(['./public/*']);

// Task Precompile project
export const build = gulp.series(clean, gulp.parallel(views, styles, imgs, scripts, fonts, vendor));

export default server;
