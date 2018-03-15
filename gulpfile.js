//libraries I need ...
var gulp = require('gulp');
var browserSync = require('browser-sync').create();
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
const awesomeSass = 'node_modules/font-awesome/scss';
const destSources = 'dist';
const distCss = destSources +'/css';
const distJs = destSources +'/js';

// Task for compiling sass to css
gulp.task('sass', function () {
    return gulp.src(`${srcSass}`)
        .pipe(sass({
            errLogToConsole: true,
            includePaths: [`${bootstrapSass}/`, `${awesomeSass}/`],
            precision: 8
        }))
        .pipe(gulp.dest(distCss)).
        pipe(browserSync.stream()); // We send the compiled source tu the navigator !!!
});


// Move the javascript files into our /src/js folder
const srcJs = 'app/js/**/*.js';
const srcBtsrap = 'node_modules/bootstrap/dist/js/bootstrap.bundle.js';
const srcJQ = 'node_modules/jquery/dist/jquery.js';
gulp.task('js', function() {
    return gulp.src([srcBtsrap, srcJQ])
        .pipe(gulp.dest(distJs))
        .pipe(browserSync.stream()); // on fournit les nouvelles sources au navigateur !!!
});

const srcHtml = 'app/**/*.html';
const distHml = destSources;

gulp.task('html', function() {
    return gulp.src(srcHtml)
        .pipe(gulp.dest(distHml))
        .pipe(browserSync.stream()); // on fournit les nouvelles sources au navigateur !!!
});
/*
* adding the browsersync !!!!
* from https://browsersync.io/docs/gulp#gulp-sass-css
 */
//définition d'une tache d'inistalisation du serveur de ressources statiques
gulp.task('browser-static-ressources', function() {
    browserSync.init({
        server: {
            baseDir: destSources //c'est à partir de ce répertoire que dans notre index.html on définit les chemins des ressources appelées
        },
    })
})

gulp.task('dist',['sass','js','html','browser-static-ressources']);



// Watching the sass, js, html sources :



gulp.task('serve', ['dist'], function (){
    gulp.watch(srcSass, ['sass']);
    // Other watchers
    gulp.watch(srcJs, ['js']);
    var htmlWatcher = gulp.watch(srcHtml,['html']);
    //htmlWatcher.on('change', browserSync.reload);
})




/*
* Defining a default task !!!
*/

gulp.task('default', ['serve'])