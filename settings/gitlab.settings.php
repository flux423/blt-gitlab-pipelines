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
