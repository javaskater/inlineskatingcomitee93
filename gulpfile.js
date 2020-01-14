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

// Task for compiling sass to css into dist/css/** */
const sassTask = () => {
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
}


// Move the javascript files into our /dist/js folder
const srcJs = 'app/js/**/*.js';
const srcBtsrap = 'node_modules/bootstrap/dist/js/bootstrap.bundle.js';
const srcJQ = 'node_modules/jquery/dist/jquery.js';
const distJs = destSources +'/js';
const jsTask = () => {
    return gulp.src([srcBtsrap, srcJQ])
        .pipe(gulp.dest(distJs)); // on fournit les nouvelles sources au navigateur !!!
};

// Move the images files into our /dist/img folder
const srcImg = 'images/*.*';
const distImg = destSources +'/img';
const imgTask = () => {
    return gulp.src([srcImg])
        .pipe(gulp.dest(distImg)); // on fournit les nouvelles sources au navigateur !!!
}

const distTask = gulp.series(sassTask, jsTask, imgTask)



// Watching the sass, js, html sources :



const serveTask = gulp.series( distTask, function (){
    gulp.watch(srcSass, ['sass']);
    // Other watchers
})


/*
* Defining a default task !!!
*/

const defaultTask = gulp.series(serveTask)

module.exports =  {dist: distTask}

//export default defaultTask