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
