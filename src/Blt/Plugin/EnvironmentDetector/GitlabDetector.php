<?php

namespace Acquia\GitlabPipelines\Blt\Plugin\EnvironmentDetector;

use Acquia\Blt\Robo\Common\EnvironmentDetector;

class GitlabDetector extends EnvironmentDetector {
    public static function getCiEnv() {
        return isset($_ENV['GITLAB_CI']) ? 'gitlab' : null;
    }

    public static function getCiSettingsFile() {
        return sprintf('%s/vendor/flux423/blt-gitlab-pipelines/settings/gitlab.settings.php', dirname(DRUPAL_ROOT));
    }
}