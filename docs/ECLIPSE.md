## [PDT Debugging through Vagrant](https://fusionforge.org/plugins/mediawiki/wiki/fusionforge/index.php/Debugging_PHP_over_xdebug_with_Eclipse_and_Vagrant)

* The [WIKI Ressource found](https://fusionforge.org/plugins/mediawiki/wiki/fusionforge/index.php/Debugging_PHP_over_xdebug_with_Eclipse_and_Vagrant)

###  I was missing one move

Then set up Eclipse to listen for incoming Xdebug connections

> Ecplipse->Preferences...

> PHP->Debug->Installed Debuggers

> Select Xdebug click on Configure

> Set "Accept remote session (JIT)" to "prompt"

> Click OK, Click OK

* I had too deselect loalhost, but select __any__

## The index.php stops

* But not my theme / function.php!!! Why ?
  * is it due to the stack ?
  * perhaps adding _xdebug.max_nesting_level = 400;_ ?