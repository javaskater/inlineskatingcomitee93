#!/bin/bash

init_repertoire=$(pwd)
projet_repertoire=$(dirname $(dirname $init_repertoire))


echo "the root theme directory is: ${projet_repertoire}"

cd ${projet_repertoire}

#change to the latest node/npm versions !!!
nvm use default
# remove odl tools
npm run uninstall-tools
#install all the tools
npm run install-tools
#compile the scss files to css for the first run
npm run grunt compile
# makes you ready to react to the changes to
npm run grunt watch


