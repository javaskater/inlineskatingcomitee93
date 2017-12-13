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
## 13/12/2017

* TODO: 