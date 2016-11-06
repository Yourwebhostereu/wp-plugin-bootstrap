var gulp = require('gulp');
var sass = require('gulp-sass');

/**
 * Compile style.scss ondemand
 */
gulp.task('styles', function() {
    gulp.src('./resources/sass/admin/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./assets/admin/'));

    gulp.src('./resources/sass/front/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./assets/front/'));
});

/**
 * Watch files
 */
gulp.task('default',function() {
    gulp.watch('./resources/sass/**/*.scss',['styles']);
});