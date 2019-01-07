var gulp = require('gulp'),
    watch = require('gulp-watch'),
    browserSync = require('browser-sync').create();

gulp.task('watch', function() {
    
    browserSync.init({
        notify: true,
        server: {
            baseDir: "app"
        }
    });
    
    watch('./app/index.html', gulp.series('html'));
    
    watch('./app/assets/styles/**/*.css', gulp.series('styles', 'cssInject'));
    
});

gulp.task('html', function(done) {
    browserSync.reload();
    done();
});

gulp.task('cssInject', function() {
    return gulp.src('./app/temp/styles/styles.css')
    .pipe(browserSync.stream());
})