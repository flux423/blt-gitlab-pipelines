<?php

/**
 * @file
 * GitLab environment specific settings.
 */

/**
 * Overwrite CI default database host name.
 *
 * @see ci.settings.php
 */

use Acquia\Blt\Robo\Common\EnvironmentDetector;
use Drupal\Component\Assertion\Handle;

$databases = [
  'default' =>
    [
      'default' =>
        [
          'database' => 'drupal',
          'username' => 'drupal',
          'password' => 'drupal',
          'host' => 'mysql',
          'port' => '3306',
          'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
          'driver' => 'mysql',
          'prefix' => '',
        ],
    ],
];
