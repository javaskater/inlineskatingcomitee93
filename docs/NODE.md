## Resources for preparing a toolkit

* What I already started for [My Personal Portal](https://github.com/javaskater/personal_portal)
* On the new [COG Starter theme for Drupal8](https://github.com/acquia-pso/cog/)
  * There is [a script for locally installing the Node Toolkit](https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/install-node.sh)
  * Le fichier [package.json](https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/package.json) est un très bon exemple d'un tel outillage !

### install-node.sh script:

```bash
jpmena@jpmena-P34:~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/scripts/dev$ ./install-node.sh 8.9.3
Downloading and installing nvm
  % Total    % Received % Xferd  Average Speed   Time    Time     Time  Current
                                 Dload  Upload   Total   Spent    Left  Speed
100 12492  100 12492    0     0  12492      0  0:00:01 --:--:--  0:00:01 28520
=> Downloading nvm from git to '/home/jpmena/.nvm'
=> Cloning into '/home/jpmena/.nvm'...
remote: Counting objects: 263, done.
remote: Compressing objects: 100% (228/228), done.
remote: Total 263 (delta 31), reused 107 (delta 25), pack-reused 0
Receiving objects: 100% (263/263), 116.03 KiB | 377.00 KiB/s, done.
Resolving deltas: 100% (31/31), done.
Note: checking out 'b546436113084d6de584c57b259b947dd467a900'.

You are in 'detached HEAD' state. You can look around, make experimental
changes and commit them, and you can discard any commits you make in this
state without impacting any branches by performing another checkout.

If you want to create a new branch to retain commits you create, you may
do so (now or later) by using -b with the checkout command again. Example:

  git checkout -b <new-branch-name>

=> Compressing and cleaning up git repository

=> Appending nvm source string to /home/jpmena/.bashrc
=> Appending bash_completion source string to /home/jpmena/.bashrc
=> You currently have modules installed globally with `npm`. These will no
=> longer be linked to the active version of Node when you install a new node
=> with `nvm`; and they may (depending on how you construct your `$PATH`)
=> override the binaries of modules installed with `nvm`:

/usr/local/lib
├── bower@1.8.2
├── grunt-cli@1.2.0
=> If you wish to uninstall t```hem at a later point (or re-install them under your
=> `nvm` Nodes), you can remove them from the system Node as follows:

     $ nvm use system
     $ npm uninstall -g a_module

=> Close and reopen your terminal to start using nvm or run the following to use it now:

export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"  # This loads nvm bash_completion
Downloading and installing node version 8.9.3

Node Version Manager

Note: <version> refers to any version-like string nvm understands. This includes:
  - full or partial version numbers, starting with an optional "v" (0.10, v0.1.2, v1)
  - default (built-in) aliases: node, stable, unstable, iojs, system
  - custom aliases you define with `nvm alias foo`

 Any options that produce colorized output should respect the `--no-colors` option.

Usage:
  nvm --help                                Show this message
  nvm --version                             Print out the installed version of nvm
  nvm install [-s] <version>                Download and install a <version>, [-s] from source. Uses .nvmrc if available
    --reinstall-packages-from=<version>     When installing, reinstall packages installed in <node|iojs|node version number>
    --lts                                   When installing, only select from LTS (long-term support) versions
    --lts=<LTS name>                        When installing, only select from versions for a specific LTS line
    --skip-default-packages                 When installing, skip the default-packages file if it exists
    --latest-npm                            After installing, attempt to upgrade to the latest working npm on the given node version
  nvm uninstall <version>                   Uninstall a version
  nvm uninstall --lts                       Uninstall using automatic LTS (long-term support) alias `lts/*`, if available.
  nvm uninstall --lts=<LTS name>            Uninstall using automatic alias for provided LTS line, if available.
  nvm use [--silent] <version>              Modify PATH to use <version>. Uses .nvmrc if available
    --lts                                   Uses automatic LTS (long-term support) alias `lts/*`, if available.
    --lts=<LTS name>                        Uses automatic alias for provided LTS line, if available.
  nvm exec [--silent] <version> [<command>] Run <command> on <version>. Uses .nvmrc if available
    --lts                                   Uses automatic LTS (long-term support) alias `lts/*`, if available.
    --lts=<LTS name>                        Uses automatic alias for provided LTS line, if available.
  nvm run [--silent] <version> [<args>]     Run `node` on <version> with <args> as arguments. Uses .nvmrc if available
    --lts                                   Uses automatic LTS (long-term support) alias `lts/*`, if available.
    --lts=<LTS name>                        Uses automatic alias for provided LTS line, if available.
  nvm current                               Display currently activated version
  nvm ls                                    List installed versions
  nvm ls <version>                          List versions matching a given <version>
  nvm ls-remote                             List remote versions available for install
    --lts                                   When listing, only show LTS (long-term support) versions
  nvm ls-remote <version>                   List remote versions available for install, matching a given <version>
    --lts                                   When listing, only show LTS (long-term support) versions
    --lts=<LTS name>                        When listing, only show versions for a specific LTS line
  nvm version <version>                     Resolve the given description to a single local version
  nvm version-remote <version>              Resolve the given description to a single remote version
    --lts                                   When listing, only select from LTS (long-term support) versions
    --lts=<LTS name>                        When listing, only select from versions for a specific LTS line
  nvm deactivate                            Undo effects of `nvm` on current shell
  nvm alias [<pattern>]                     Show all aliases beginning with <pattern>
  nvm alias <name> <version>                Set an alias named <name> pointing to <version>
  nvm unalias <name>                        Deletes the alias named <name>
  nvm install-latest-npm                    Attempt to upgrade to the latest working `npm` on the current node version
  nvm reinstall-packages <version>          Reinstall global `npm` packages contained in <version> to current version
  nvm unload                                Unload `nvm` from shell
  nvm which [<version>]                     Display path to installed node version. Uses .nvmrc if available
  nvm cache dir                             Display path to the cache directory for nvm
  nvm cache clear                           Empty cache directory for nvm

Example:
  nvm install 8.0.0                     Install a specific version number
  nvm use 8.0                           Use the latest available 8.0.x release
  nvm run 6.10.3 app.js                 Run app.js using node 6.10.3
  nvm exec 4.8.3 node app.js            Run `node app.js` with the PATH pointing to node 4.8.3
  nvm alias default 8.1.0               Set default node version on a shell
  nvm alias default node                Always default to the latest available node version on a shell

Note:
  to remove, delete, or uninstall nvm - just remove the `$NVM_DIR` folder (usually `~/.nvm`)

Downloading and installing node v8.9.3...
Downloading https://nodejs.org/dist/v8.9.3/node-v8.9.3-linux-x64.tar.xz...
######################################################################## 100.0%
Computing checksum with sha256sum
Checksums matched!
Now using node v8.9.3 (npm v5.5.1)
Creating default alias: default -> 8.9.3 (-> v8.9.3)
Please run the following command:
source ~/.bashrc && nvm use --delete-prefix 8.9.3
#I pass the corresponding commands
jpmena@jpmena-P34:~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/scripts/dev$ source ~/.bashrc && nvm use --delete-prefix 8.9.3
Now using node v8.9.3 (npm v5.5.1)
```

* [nvm](https://github.com/creationix/nvm) is to Nodejs what [virtualenv](https://github.com/pypa/virtualenv) is to Python

### [nvm](https://github.com/creationix/nvm) usage 

```bash
# which node versions are actually available through the Node Virtual Manager ?
## type "nvm help" if you want the list of available commands !
jpmena@jpmena-P34:~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93$ nvm ls
->       v8.9.3
         system
default -> 8.9.3 (-> v8.9.3)
node -> stable (-> v8.9.3) (default)
stable -> 8.9 (-> v8.9.3) (default)
iojs -> N/A (default)
lts/* -> lts/carbon (-> v8.9.3)
lts/argon -> v4.8.7 (-> N/A)
lts/boron -> v6.12.2 (-> N/A)
lts/carbon -> v8.9.3
# I decide to use the default version
jpmena@jpmena-P34:~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93$ nvm use default 
Now using node v8.9.3 (npm v5.5.1)
## I confirm the npm version ...
jpmena@jpmena-P34:~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93$ npm --version
5.5.1
## But also the node version (the nodejs version is only the one of the apt package) 
jpmena@jpmena-P34:~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93$ node --version
v8.9.3
```

## Using Bootstrap with SASS:

* [This french Blog](https://makina-corpus.com/blog/metier/2015/utiliser-bootstrap-avec-un-pre-processeur) seems to be a good tutorial
* A good [free video tutorial](https://coursetro.com/posts/design/73/How-to-Customize-Bootstrap-4-with-Sass)
  * it explains also that default variables _!default_ exist only if not redefined !!!

### Adapting styles.scss

```bash
jpmena@jpmena-P34:~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93$ npm run grunt

> inlineskatingcomitee93@0.0.1 grunt /home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93
> node node_modules/grunt-cli/bin/grunt

Running "watch" task
Waiting...
```

### comparing with the sources at node_modules/bootstrap

* installing the sources !!!

```bash
jpmena@jpmena-P34:~/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/node_modules/bootstrap$ npm i
npm WARN deprecated qunitjs@2.4.1: 2.4.1 is the last version where QUnit will be published as 'qunitjs'. To receive future updates, you will need to change the package name to 'qunit'.

> node-sass@4.7.2 install /home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/node_modules/bootstrap/node_modules/node-sass
> node scripts/install.js

Downloading binary from https://github.com/sass/node-sass/releases/download/v4.7.2/linux-x64-57_binding.node
Download complete  ] - :
Binary saved to /home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/node_modules/bootstrap/node_modules/node-sass/vendor/linux-x64-57/binding.node
Caching binary to /home/jpmena/.npm/node-sass/4.7.2/linux-x64-57_binding.node

> phantomjs-prebuilt@2.1.16 install /home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/node_modules/bootstrap/node_modules/phantomjs-prebuilt
> node install.js

PhantomJS not found on PATH
Downloading https://github.com/Medium/phantomjs/releases/download/v2.1.1/phantomjs-2.1.1-linux-x86_64.tar.bz2
Saving to /tmp/phantomjs/phantomjs-2.1.1-linux-x86_64.tar.bz2
Receiving...
  [=======================================-] 97%
Received 22866K total.
Extracting tar contents (via spawned process)
Removing /home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/node_modules/bootstrap/node_modules/phantomjs-prebuilt/lib/phantom
Copying extracted folder /tmp/phantomjs/phantomjs-2.1.1-linux-x86_64.tar.bz2-extract-1512888808481/phantomjs-2.1.1-linux-x86_64 -> /home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/node_modules/bootstrap/node_modules/phantomjs-prebuilt/lib/phantom
Writing location.js file
Done. Phantomjs binary available at /home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/node_modules/bootstrap/node_modules/phantomjs-prebuilt/lib/phantom/bin/phantomjs

> node-sass@4.7.2 postinstall /home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/node_modules/bootstrap/node_modules/node-sass
> node scripts/build.js

Binary found at /home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/node_modules/bootstrap/node_modules/node-sass/vendor/linux-x64-57/binding.node
Testing binary
Binary is fine

> nodemon@1.12.5 postinstall /home/jpmena/CDRS/wordpress/wp-content/themes/inlineskatingcomitee93/node_modules/bootstrap/node_modules/nodemon
> node -e "console.log('\u001b[32mLove nodemon? You can now support the project via the open collective:\u001b[22m\u001b[39m\n > \u001b[96m\u001b[1mhttps://opencollective.com/nodemon/donate\u001b[0m\n')"

Love nodemon? You can now support the project via the open collective:
 > https://opencollective.com/nodemon/donate

npm notice created a lockfile as package-lock.json. You should commit this file.
npm WARN bootstrap@4.0.0-beta.2 requires a peer of jquery@1.9.1 - 3 but none is installed. You must install peer dependencies yourself.
npm WARN postcss-html@0.11.0 requires a peer of postcss-sass@>=0.2.0 but none is installed. You must install peer dependencies yourself.
npm WARN optional SKIPPING OPTIONAL DEPENDENCY: fsevents@1.1.3 (node_modules/fsevents):
npm WARN notsup SKIPPING OPTIONAL DEPENDENCY: Unsupported platform for fsevents@1.1.3: wanted {"os":"darwin","arch":"any"} (current: {"os":"linux","arch":"x64"})

added 1001 packages in 103.903s
```

* Interesing link: how to create a [styleguide for bootstrap](https://github.com/kalamuna/kss-bootstrap)