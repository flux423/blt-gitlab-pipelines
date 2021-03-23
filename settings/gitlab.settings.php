<?php
declare(strict_types=1);

// @codingStandardsIgnoreFile

/**
 * Database configuration.
 */

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

$dir = dirname(DRUPAL_ROOT);

// Use development service parameters.
$settings['container_yamls'][] = $dir . '/docroot/sites/development.services.yml';
$settings['container_yamls'][] = $dir . '/docroot/sites/blt.development.services.yml';

/**
 * Assertions.
 *
 * The Drupal project primarily uses runtime assertions to enforce the
 * expectations of the API by failing when incorrect calls are made by code
 * under development.
 *
 * @see http://php.net/assert
 * @see https://www.drupal.org/node/2492225
 *
 * If you are using PHP 7.0 it is strongly recommended that you set
 * zend.assertions=1 in the PHP.ini file (It cannot be changed from .htaccess
 * or runtime) on development machines and to 0 in production.
 *
 * @see https://wiki.php.net/rfc/expectations
 */
assert_options(ASSERT_ACTIVE, TRUE);
Handle::register();

/**
 * Show all error messages, with backtrace information.
 *
 * In case the error level could not be fetched from the database, as for
 * example the database connection failed, we rely only on this value.
 */
$config['system.logging']['error_level'] = 'verbose';

/**
 * Disable CSS and JS aggregation.
 */
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;

/**
 * Disable the render cache (this includes the page cache).
 */
$settings['extension_discovery_scan_tests'] = FALSE;


/**
 * Configure static caches.
*/

/**
 * Enable access to rebuild.php.
 */
$settings['rebuild_access'] = FALSE;

/**
 * Temporary file path.
 *
 * A local file system path where temporary files will be stored. This
 * directory should not be accessible over the web.
 *
 * Note: Caches need to be cleared when this value is changed.
 *
 * See https://www.drupal.org/node/1928898 for more information
 * about global configuration override.
 */
$config['system.file']['path']['temporary'] = '/tmp';

/**
 * Private file path.
 */
$settings['file_private_path'] = $dir . '/files-private';

/**
 * Trusted host configuration.
 *
 * See full description in default.settings.php.
 */
$settings['trusted_host_patterns'] = [
  '^.+$',
];

