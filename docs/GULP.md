# Guide

*  Je suis ce guide [Gulp pour les débutants](https://la-cascade.io/gulp-pour-les-debutants/)
* Et en même temps ce [Cours en ligne Coursetro](https://coursetro.com/posts/code/130/Learn-Bootstrap-4-Final-in-2018-with-our-Free-Crash-Course)
    * qui contient à la fois une version Video/YouTube
    * et la même chode en page de Bloc avec les morceaux de code qui vont bien
    * Angalis clair (bien parlé et bien écrit)

## La structure

* Comme expliqué sur [le Blog](https://la-cascade.io/gulp-pour-les-debutants/)

```
Dans cette structure, nous utilisons le dossier app pour le développement, 
le dossier dist (pour “distribution”) contenant lui les fichiers optimisés pour le site en production.
```

* le *app* est créé comme indiqué
* le *dist* sera créé par la compilation gulp

```bash
jpmena@jpmena-HP-ProDesk-600-G2-MT:~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93$ tree app
app
├── fonts
├── images
├── index.html
├── js
└── scss
    ├── _mymixins.scss
    ├── _myvariables.scss
    ├── navigation
    │   └── menu.scss
    └── styles.scss
```

## La tâche de base _Hello Zell_

### le gulpfile.js

* Un exemple simple nous permettant de loguer ce qui se passe!!!

```javascript
var gulp = require('gulp');

// Task for testing console debug !!!!
gulp.task('hello', function() {
    console.log('Hello Zell');
});
```
### le package.json

* j'ai juste besoin de
    * [gulp](https://www.npmjs.com/package/gulp)
    * [gulp-cli](https://www.npmjs.com/package/gulp-cli)
* dans les *dev-dependencies*
* et dans la partie scripts un accès au client Gulp via _npm run gulp_
    * noter la présence d'un répertoire _node_modules/.bin_
        * contenant les liens vers les principaux binaires installés !!! 
    * à mettre dans le PATH linux (existe t'il un path nodeJS pouvant être défini via notre _package.json_)  
```javascript
"scripts": {
    "test": "echo \"Error: no test specified\" && exit 1",
    "gulp": "node node_modules/gulp-cli/bin/gulp.js"
  },
```

### test

* La lancer est simple:
    * elle nous présente un moyen instéressant de logguer ce qui se passe _(éventuellement à titre de Débug!!)_
    
```bash
jpmena@jpmena-HP-ProDesk-600-G2-MT:~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93$ npm run gulp hello

> inlineskatingcomitee93@0.5.0 gulp /home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93
> node node_modules/gulp-cli/bin/gulp.js "hello"

[14:07:30] Using gulpfile ~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/gulpfile.js
[14:07:30] Starting 'hello'...
Hello Zell
[14:07:30] Finished 'hello' after 94 μs
```

# Et maintenant au travail !!!!

## Source --> Plugin {1..n} --> Dest

* cf. schéma générique présenté sur le site:

```javascript
//JS
gulp.task('task-name', function () {
  return gulp.src('source-files') // Get source files with gulp.src
    .pipe(aGulpPlugin()) // Sends it through a gulp plugin
    .pipe(gulp.dest('destination')) // Outputs the file in the destination folder
})
```

## Cas de la compilation sass

* Cela se fait avec l'extension [gulp-sass](https://www.npmjs.com/package/gulp-sass)
* ici la tâche à appeler (à metre dans le pipe entre la source et la destination) sera: 

```javascript
//JS
/// partie require
var gulp = require('gulp');
var sass = require('gulp-sass'); // Requires the gulp-sass plugin
/// la tâche elle même !!!!
gulp.task('sass', function(){
  return gulp.src('source-files')
    .pipe(sass())    // ici on utilise gulp-sass
    .pipe(gulp.dest('destination'))
});
```

* Il nous suffit de définir les sources files !!!!
* Pour comprendre les pattern des sources que l'on veut compiler ou surveiller (chapitre après)
    * Voir le chapitre **Globbing avec Node** du [Blog qui nous sert de fil conducteur](https://la-cascade.io/gulp-pour-les-debutants/) 
* Dans notre cas, pour reprendre ce qui est fait sur mon [personal_portal](https://github.com/javaskater/personal_portal/blob/master/web/jpm/gulpfile.js) cela donne:
    * on notera les [font-awesome](https://fontawesome.com/) qui nous définissent
        * non seulement des styles de charactères
        * mais aussi les [icônes font-awesome](https://fontawesome.com/icons?d=gallery)
        * il faut donc l'ajouter à notre *package.json* (et l'installer au passage): *npm i font-awesome --save-dev*

```javascript
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
```

## Surveiller les sources sass et relancer automatiquement la compilation

* Cela est très bien expliqué sous _Observer les modifications de fichiers_
* La tâche utilisée est [gulp-watch](https://www.npmjs.com/package/gulp-watch)

### Notre GulpFile

* On définit une tache watch (qui sera aussi notre tâche par défaut)
* La tâche watch:
    * lancera une première fois la tâche _sass_ précédente
    * avant de lancer la tâche [gulp-watch](https://www.npmjs.com/package/gulp-watch); cette dernière:
        * surveille le GLOB défini par la variable **_srcSass_**
        * et à chaque modification d'un des fichiers représentés par ce GLOB la tâche précédente **_sass_** est relancée 
* Celà donne pour notre fichier gulpfile.js:

```javascript
// Watching the sass sources :

gulp.task('watch', ['sass'], function (){
    gulp.watch(srcSass, ['sass']);
    // Other watchers
})




/*
* Defining a default task !!!
*/

gulp.task('default', ['watch'])
```    


### le test:

* Je montre dans les commentaires que j'ai insérés dans la sortie console ci dessous que:
    * la tache watch est aussi la tâche par défaut
        * pas besoin de paramètre
    * lancer la tache _default_ lance _watch_ qui lance une première fois _sass_ avant de surveiller le glob des _**srcSass**_
    * Quand je change la valeur d'une variable sous _app/scss/_myvariables.scss_
        * Cela relance automatiquement la tâche _sass_ (comme attendu)

```bash
# la tache watch est aussi la tâche par défaut
## pas besoin de paramètre 
jpmena@jpmena-HP-ProDesk-600-G2-MT:~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93$ npm run gulp

> inlineskatingcomitee93@0.5.0 gulp /home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93
> node node_modules/gulp-cli/bin/gulp.js
## lancer default lance watch qui lance une première fois sass avant de surveiller le glob des srcSass
[16:28:17] Using gulpfile ~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/gulpfile.js
[16:28:17] Starting 'sass'...
/home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/app/scss/_myvariables.scss:19 DEBUG: background-color: white
[16:28:17] Finished 'sass' after 154 ms
[16:28:17] Starting 'watch'...
[16:28:17] Finished 'watch' after 5.62 ms
[16:28:17] Starting 'default'...
[16:28:17] Finished 'default' after 15 μs
### je viens de changer la valeur d'une variable sous app/scss/_myvariables.scss
#### cela relance la tâche sass
[16:28:58] Starting 'sass'...
/home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/app/scss/_myvariables.scss:19 DEBUG: background-color: white
[16:28:58] Finished 'sass' after 144 ms
### je viens de changer la valeur d'une variable sous app/scss/_myvariables.scss
#### cela relance la tâche sass
[16:29:14] Starting 'sass'...
/home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/app/scss/_myvariables.scss:19 DEBUG: background-color: white
[16:29:15] Finished 'sass' after 147 ms

```
## transport des sources Javascript de app/js vers dist/js


## Mise en place de index.hml avec browser-sync pour des essais maquettes HTML:

* essais sans passer par la pile Wordpress + extensions

### Une sorte de StyleGuide

* définir un fichier index.html qui me permet de tester mes sources sass Bootstrap....
    * Cf. [Tutorial Vidéo Bootstrap 4](http://blog.jpmena.eu/2018/03/07/a-bootstrap4-video-tutorial-you-shouldnt-miss/)
    * Plus particulièrement j'attribue le contenu initial 

### Mettre en oeuvre [browser-sync](https://www.npmjs.com/package/browser-sync)

#### Ajout du module [browser-sync](https://www.npmjs.com/package/browser-sync) dans les packages NodeJS

* La commande suivante: 
    * charge le module et ses dépendances dans les _node_modules_
    * ajoute la dépendance dans la section _dev-dependencies_ du package.json !!

```bash
jpmena@jpmena-HP-ProDesk-600-G2-MT:~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93$ npm i browser-sync --save-dev

> uws@9.14.0 install /home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/node_modules/uws
> node-gyp rebuild > build_log.txt 2>&1 || exit 0

npm WARN bootstrap@4.0.0 requires a peer of popper.js@^1.12.9 but none is installed. You must install peer dependencies yourself.
npm WARN optional SKIPPING OPTIONAL DEPENDENCY: fsevents@1.1.3 (node_modules/fsevents):
npm WARN notsup SKIPPING OPTIONAL DEPENDENCY: Unsupported platform for fsevents@1.1.3: wanted {"os":"darwin","arch":"any"} (current: {"os":"linux","arch":"x64"})

+ browser-sync@2.23.6
added 187 packages in 33.186s
```

#### Initilisation

* noter l'exemple avec le console.log sur [browser-sync](https://www.npmjs.com/package/browser-sync)
* [la documentation officielle de browser.io pour Gulp](https://browsersync.io/docs/gulp) nous explique 
    * que l'on peut soit synchroniser des ressources statique (option: __basedir_)
    * ou par rapport à un serveur (php par exemple, option: _proxy_)
    
*  On l'initiliesera au moment de la tâche qui va appeler le scan de ressources
    * sass
    * mais aussi du index.hml
    * ce pourrait être de fichiers js 
```javascript
var gulp        = require('gulp');
var browserSync = require('browser-sync').create();

// Static server
gulp.task('browser-sync', function() {
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });
});

// or... php server for example

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "yourlocal.dev"
    });
});
```
* On le met en oeuvre en synthéhtisant 
    * [notre tutoriel](https://la-cascade.io/gulp-pour-les-debutants/)
    * [Le tutoriel coursetroo](https://coursetro.com/posts/code/130/Learn-Bootstrap-4-Final-in-2018-with-our-Free-Crash-Course)
    * [la documentation officielle de browser.io pour Gulp](https://browsersync.io/docs/gulp) précédente
    

#### Ajouter l'envoi des feuilles de styles compilées au navigateur

* On le met en oeuvre en synthéhtisant 
    * [notre tutoriel](https://la-cascade.io/gulp-pour-les-debutants/)
    * [Le tutoriel coursetroo](https://coursetro.com/posts/code/130/Learn-Bootstrap-4-Final-in-2018-with-our-Free-Crash-Course)
    * [la documentation officielle de browser.io pour Gulp](https://browsersync.io/docs/gulp) 
    



     