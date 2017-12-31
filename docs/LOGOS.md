# getting CDRS Logos

## GIMP

### Making tranparent the white background:

* The Menu _Couleur / Couleur vers Alpha_ does appear only in certain cases (see [Answer 49](https://graphicdesign.stackexchange.com/questions/28058/gimp-color-to-alpha-is-not-selectable))...
  * First import a pdf page and apply that menu immediatly (do not wait for selecting what you need and making a new image of it !!!!)
  * It will by default take the white background as a candidate for transparency


## ImageMagik

* to make a transparent image out of what I got grom the CDRS
  * found at that [imageMagick Forum](http://www.imagemagick.org/discourse-server/viewtopic.php?t=31549)

```bash
jpmena@jpmena-HP-ProDesk-600-G2-MT:~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/images$ convert cdrs93.png -alpha set -background none -channel A -evaluate multiply 0.5 +channel cdrs93_transparent.png
```