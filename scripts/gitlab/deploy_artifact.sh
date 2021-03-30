#!/usr/bin/env bash

set -ev

# Prep date format for deploy  ******
 date +'FORMAT'
 date +'%m/%d/%Y'
 date +'%r'
 TIMESTAMP=$(date +'%m-%d-%Y')
 echo "${TIMESTAMP}"
 
vendor/bin/blt artifact:deploy --commit-msg "$CI_CONCURRENT_ID-$CI_COMMIT_MESSAGE" --branch "$CI_COMMIT_BRANCH-build" --tag release-"${TIMESTAMP}"--$CI_JOB_ID -n --ignore-dirty --no-interaction --verbose

set +v
