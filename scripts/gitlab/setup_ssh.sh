#!/bin/bash
#
#

set -ev

apt-get update -y && apt-get install openssh-client -y
eval $(ssh-agent -s)
cat $SSH_PRIVATE_KEY | tr -d '\r' | ssh-add -
mkdir -p ~/.ssh
chmod -R 700 ~/.ssh
ssh-keyscan $SSH_KNOWN_HOSTS >> ~/.ssh/known_hosts
chmod 644 ~/.ssh/known_hosts

set +v
