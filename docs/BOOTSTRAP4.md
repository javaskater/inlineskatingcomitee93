# REFERENCES

## Official WebSite

* [The New theming Guide](http://getbootstrap.com/docs/4.0/getting-started/theming/)
  * Based on SASS
  * When Bootstrap 3 was based on LESS
  * Especially interesting : [the way of overloading Boostrap Variables](http://getbootstrap.com/docs/4.0/getting-started/theming/#variable-defaults)

* In case of the [NavBars Color Choices](http://getbootstrap.com/docs/4.0/components/navbar/#color-schemes) 

# ISSUES

## 12/12/2017

* I got the problem related to *node_modules/bootstrap/scss/_root.scss* discussed on that [GitHub Issue](https://github.com/twbs/bootstrap/issues/24549) 
  * a variable name may not start with __--__ only !!! 
  * It has itself to be interpolated 
  * I solved it by surrounding __--#{color}__  with another _#{}_

```scss
:root {
  // Custom variable values only support SassScript inside `#{}`.
  @each $color, $value in $colors {
    @debug "#{$color} for #{$value}";
    #{--#{$color}}: #{$value};
  }

  @each $color, $value in $theme-colors {
    #{--#{$color}}: #{$value};
  }

  @each $bp, $value in $grid-breakpoints {
    --breakpoint-#{$bp}: #{$value};
  }

  // Use `inspect` for lists so that quoted items keep the quotes.
  // See https://github.com/sass/sass/issues/2383#issuecomment-336349172
  --font-family-sans-serif: #{inspect($font-family-sans-serif)};
  --font-family-monospace: #{inspect($font-family-monospace)};
}
```

## navbar

### customisation like [93 Parcs Website](http://parcsinfo.seine-saint-denis.fr/)

* I tried to follow [The 93's design like used on the Pacs of that county](http://parcsinfo.seine-saint-denis.fr/)

#### Still TODO on the 29/12/2017

* Seems to work except for en error in the menu_walker when having 
  * a top menu element without any children
    * (_color of hover remains permanently after a JQuery error !!!_) 
* Perhaps should we change the default menu extension:
  * prefer it to extend on hover
  * instead of on click (default Bootstrap4 behaviour)
  
## General

### using Bootstrap4 Breakpoints:

```scss
/* includes a background image
   *  only in case of a medium to large device
   */
  @include media-breakpoint-up(sm) {
    .site-content {
      background-color: transparent;
      //&:before {
      background-image: url('../images/cdrs93_transparent.png');
      background-repeat: no-repeat;
      background-size: 100%;
      z-index: 1;
      //}
    }
  }
```

## NAVBAR

* Choosing a navbar whose font change from the default link
  * see [The Navbar in Bootstrap4](https://getbootstrap.com/docs/4.0/components/navbar/)
### Walker

* test the walker to understand how to replace ul by [div with reference to the parent a](https://getbootstrap.com/docs/4.0/components/navbar/#supported-content)!!! 
* The Guys wo made the Wlaker mde himself a [walker](http://simonpadbury.github.io/2016/03/09/bootstrap-4-navbar-with-dropdowns-for-wordpress.html)
  * It is about his [navbar on GitHub](https://github.com/SimonPadbury/b4st/blob/master/functions/navbar.php)


