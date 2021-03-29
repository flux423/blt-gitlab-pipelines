#!/bin/bash
#
#

set -ev

apt-get update -y && apt-get install openssh-client -y
eval $(ssh-agent -s)
ssh-add <(echo "$SSH_PRIVATE_KEY")
mkdir -p ~/.ssh
rm -rf ~/.ssh/known_hosts
ssh-keyscan -H '$SSH_KNOWN_HOSTS' >> ~/.ssh/known_hosts
ssh-keyscan $SSH_KNOWN_HOSTS | sort -u - ~/.ssh/known_hosts -o ~/.ssh/known_hosts
echo -e "Host *\n\tStrictHostKeyChecking no\n\n" > ~/.ssh/config

set +v
