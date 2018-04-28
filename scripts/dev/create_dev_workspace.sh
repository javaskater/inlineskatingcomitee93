#!/bin/bash

node_version="8.11.1"

init_repertoire=$(pwd)
projet_repertoire=$(dirname $(dirname $init_repertoire))


echo "the root theme directory is: ${projet_repertoire}"

#change to the latest node/npm versions !!!
. ~/.nvm/nvm.sh #see https://unix.stackexchange.com/questions/184508/nvm-command-not-available-in-bash-script
nvm use "v${node_version}"
# remove odl tools
cd ${projet_repertoire}

if [ -d "node_modules" ]; then
  rm -rf node_modules
fi

#install all the tools
npm i
#compile the scss files to css for the first run
npm run gulp dist
#makes you ready to react to the changes to
##npm run grunt watch


