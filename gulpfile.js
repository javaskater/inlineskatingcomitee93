//libraries I need ...
var gulp = require('gulp');
var sourcemaps = require('gulp-sourcemaps');// To hellp have a map file that will help FF to retrive the original ssass files
var sass = require('gulp-sass');


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
//const awesomeSass = 'node_modules/font-awesome/scss';
const destSources = 'dist';
const distCss = destSources +'/css';
const distJs = destSources +'/js';

// Task for compiling sass to css
gulp.task('sass', function () {
    return gulp.src(`${srcSass}`)
        .pipe(sourcemaps.init())
        .pipe(sass({
            errLogToConsole: true,
            //includePaths: [`${bootstrapSass}/`, `${awesomeSass}/`],
            includePaths: [`${bootstrapSass}/`],
            precision: 8
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(distCss)); // We send the compiled source tu the navigator !!!
});


// Move the javascript files into our /src/js folder
const srcJs = 'app/js/**/*.js';
const srcBtsrap = 'node_modules/bootstrap/dist/js/bootstrap.bundle.js';
const srcJQ = 'node_modules/jquery/dist/jquery.js';
gulp.task('js', function() {
    return gulp.src([srcBtsrap, srcJQ])
        .pipe(gulp.dest(distJs)); // on fournit les nouvelles sources au navigateur !!!
});

gulp.task('dist',['sass','js']);



// Watching the sass, js, html sources :



gulp.task('serve', ['dist'], function (){
    gulp.watch(srcSass, ['sass']);
    // Other watchers
})

/*
* Defining a default task !!!
*/

gulp.task('default', ['serve'])