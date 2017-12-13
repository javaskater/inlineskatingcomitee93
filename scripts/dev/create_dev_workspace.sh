#!/bin/bash

init_repertoire=$(pwd)
projet_repertoire=$(dirname $(dirname $init_repertoire))


echo "the root theme directory is: ${projet_repertoire}"

#change to the latest node/npm versions !!!
. ~/.nvm/nvm.sh #see https://unix.stackexchange.com/questions/184508/nvm-command-not-available-in-bash-script
nvm use v8.9.3
# remove odl tools
cd ${projet_repertoire}

if [ -d "node_modules" ]; then
  npm run uninstall-tools
fi

#install all the tools
npm run install-tools
#compile the scss files to css for the first run
npm run grunt compile
#makes you ready to react to the changes to
##npm run grunt watch


