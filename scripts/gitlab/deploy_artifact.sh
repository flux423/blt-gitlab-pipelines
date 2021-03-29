#!/usr/bin/env bash

set -ev

vendor/bin/blt artifact:deploy --commit-msg "Automated commit by Gitlab Pipelines for Build $CI_CONCURRENT_ID" --branch "$CI_COMMIT_BRANCH-build" --no-interaction --verbose

set +v
