var gulp = require('gulp');

// Task for testing console debug !!!!
gulp.task('hello', function() {
    console.log('Hello Zell');
});


/*
 * Compiling SASS sources to CSS
 */

// The variables !!!
const srcSass = 'app/scss/**/*.scss';
const bootstrapSass = 'node_modules/bootstrap/scss';
const awesomeSass = 'node_modules/font-awesome/scss';
const distCss = 'dist/css';

var sass = require('gulp-sass');

// Task for compiling sass to css
gulp.task('sass', function () {
    return gulp.src(`${srcSass}`)
        .pipe(sass({
            errLogToConsole: true,
            includePaths: [`${bootstrapSass}/`, `${awesomeSass}/`],
            precision: 8
        }))
        .pipe(gulp.dest(distCss));
});

/*
* TODO adding the browsersync !!!!
 */

// Watching the sass sources :

gulp.task('watch', ['sass'], function (){
    gulp.watch(srcSass, ['sass']);
    // Other watchers
})




/*
* Defining a default task !!!
*/

gulp.task('default', ['watch'])