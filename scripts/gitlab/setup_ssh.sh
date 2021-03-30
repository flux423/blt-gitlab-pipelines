#!/bin/bash
#
#

set -ev

apt-get update -y && apt-get install rsync openssh-client yarn libnss3 libgconf-2-4 -y
eval $(ssh-agent -s)
ssh-add <(echo "$SSH_PRIVATE_KEY")
mkdir -p ~/.ssh
ssh-keyscan -H 'acquia.com' >> ~/.ssh/known_hosts
ssh-keyscan acquia.com | sort -u - ~/.ssh/known_hosts -o ~/.ssh/known_hosts
echo -e "Host *\n\tStrictHostKeyChecking no\n\n" > ~/.ssh/config
chmod 700 ~/.ssh
chmod 644 ~/.ssh/known_hosts

set +v


