#!/usr/bin/env bash

## inspired by https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/install-node.sh

if [ $# -ne 1 ]; then
    echo $0: usage: install-node.sh 8.9.1
    exit 1
fi

if [ ! -d "$HOME/.nvm" ]; then
  # from the Github prroject https://github.com/creationix/nvm (maintaining multiple versions of NodeJS)
  echo "Downloading and installing nvm"
  curl -o- https://raw.githubusercontent.com/creationix/nvm/b546436113084d6de584c57b259b947dd467a900/install.sh   | bash
fi

NODE_VERSION=$1
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"  # This loads nvm
if [[ $(nvm ls $NODE_VERSION | grep "N/A") ]]; then
  echo "Downloading and installing node version $NODE_VERSION"
  nvm download $NODE_VERSION
  nvm install $NODE_VERSION
fi

# Sets version of node in .node-version so that
# it can be picked up by tools like avn.
echo $NODE_VERSION > .node-version

echo "Please run the following command":
echo "source ~/.bashrc && nvm use --delete-prefix $NODE_VERSION"