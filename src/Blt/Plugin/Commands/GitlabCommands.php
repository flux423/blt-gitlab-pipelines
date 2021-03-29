<?php

namespace Acquia\GitlabPipelines\Blt\Plugin\Commands;

use Acquia\Blt\Robo\BltTasks;
use Acquia\Blt\Robo\Exceptions\BltException;
use Acquia\Blt\Robo\Common\YamlWriter;
use Acquia\Blt\Robo\Contract\VerbosityThresholdInterface;
use Acquia\Blt\Robo\Commands\Recipes\CiCommand;

/**
 * Defines commands related to Gitlab.
 */
class GitlabCommands extends BltTasks {

  /**
  * Initializes default gitlab configuration for this project.
  *
  * @command recipes:ci:gitlab:init
  *
  * @aliases rcgc ci:gitlab:init
  */
  public function gitlabInit() {
    $result = $this->taskFilesystemStack()
      ->copy($this->getConfigValue('blt.root') . '/vendor/flux423/blt-gitlab-pipelines/.gitlab-ci.yml', $this->getConfigValue('repo.root') . '/.gitlab-ci.yml', TRUE)
      ->stopOnFail()
      ->setVerbosityThreshold(VerbosityThresholdInterface::VERBOSITY_VERBOSE)
      ->run();

    if (!$result->wasSuccessful()) {
      throw new BltException("Could not initialize Gitlab CI configuration.");
    }

    $this->say("<info>A pre-configured .gitlab-ci.yml file was copied to your repository root.</info>");
  }
}