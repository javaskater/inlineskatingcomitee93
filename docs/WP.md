# ISSUES:

## 12/12/2018:

### Parent js and css are added in the resulting Source Code

* The question of overriding the parent _functions.php_ is clearly [solved on that post - 3 possible ways](https://code.tutsplus.com/tutorials/a-guide-to-overriding-parent-theme-functions-in-your-child-theme--cms-22623)
* When you gave the right priority thik about dequeing the parent script ...
* Putting true as the last parameter of _wp_enque_script_ makes it appear at the end of the page !
  * see [that blog post](http://www.wpbeginner.com/wp-tutorials/how-to-properly-add-javascripts-and-styles-in-wordpress/)
  * I used it for:
```php
    wp_enqueue_script('inlineskatingcomitee93-themejs', get_stylesheet_directory_uri() . '/inc/assets/js/theme-script.js', array('inlineskatingcomitee93-bootstrapjs'), 1.0, true );
```

## 24/12/2017

### TODO: 24//12/217

* using poedit to translate string!!!
  * starting with the search form (see _newspaper-x_)
  * And its result page

* Make the front_page taking rows with many colums:
  * like _newspaper_x_
  * like the [Jumbotron on the Bootstrap examples site](https://getbootstrap.com/docs/4.0/examples/jumbotron/)
  
## TODO 29/12/2017

* checking my navbar_walker when main menu does not have sub-menus !!!
* adapting my navbar_walker for really working with bootstrap 4 !!! 

### Ahmed's remarks:

* remaining colour on the no-child menu !!
* Dropdown on hover instead of click ?

## TODO 31/12/2017

* Taking page 2 of flyer for list of people skating Seine Saint Denis
* Seine Saint Denis Logo ?
* understanding why each gallery's thumb does get on top of eachother ?
* When a image link is link of a pdf:
  * Add the pdf _fa-icon_ (see personal portal)
  * Add the _target=_blank_ attribute