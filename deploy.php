<?php
namespace Deployer;

date_default_timezone_set('Europe/Stockholm');

require_once 'vendor/deployer/deployer/recipe/composer.php';

host('178.62.249.226')
    ->port(22)
    ->set('deploy_path', '~/bladerunner.elseif.se')
    ->user('forge')
    ->set('branch', 'master')
    ->stage('production')
    ->forwardAgent(true)
    ->multiplexing(true)
    ->identityFile('~/.ssh/id_rsa');

set('repository', 'https://github.com/ekandreas/bladerunner.dev');

// Symlink the .env file for Bedrock
set('env', 'prod');
set('keep_releases', 10);
set('shared_dirs', ['web/app/uploads']);
set('shared_files', ['bladerunner.zip', '.env', 'web/.htaccess', 'web/robots.txt']);
set('env_vars', '/usr/bin/env');

task('deploy:create_dist', function () {
    writeln('Creating dist');

    //run("curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer");

    $output = run('cd /tmp/ && rm -Rf bladerunner && composer create-project ekandreas/bladerunner bladerunner --prefer-dist --no-dev ');

    writeln($output);

    $version = '0';
    preg_match('/ekandreas\/bladerunner\s\((.*)\)/i', $output, $matches);
    if ($matches) {
        $version = $matches[1];
    }

    writeln("<comment>Bladerunner version $version</comment>");

    run('cd /tmp/bladerunner && rm -Rf tests && rm -f .git .gitignore composer.json composer.lock .DS_Store .styleci.yml .travis.yml phpunit.xml.dist');
    run('rm -f /tmp/bladerunner.zip && cd /tmp/bladerunner && zip -r ../bladerunner.zip .');

    writeln('Copy dist to plugin folder');
    run('chown forge:www-data /tmp/bladerunner.zip');
    run('chown -R forge:www-data /tmp/bladerunner');
    run('cp -r /tmp/bladerunner {{release_path}}/web/app/plugins');
    run('cp -r /tmp/bladerunner.zip {{deploy_path}}/shared/web/app/uploads');
    run('rm -Rf /tmp/bladerunner');
    run('rm -f /tmp/bladerunner.zip');

})->desc('Creating dist of plugin');
after('cleanup', 'deploy:create_dist');

task('deploy:restart', function () {
    //run('sudo service apache2 restart && sudo service varnish restart');
    run("rm -f {{deploy_path}}/shared/web/app/uploads/.cache/*.*");
})->desc('Restarting apache2 and varnish');
after('cleanup', 'deploy:restart');

task('pull', function () {
    $actions = [
        "ssh forge@elseif.se 'cd {{deploy_path}}/current && wp db export - | gzip' > bladerunner.sql.gz",
        "gzip -df bladerunner.sql.gz",
        "wp db import bladerunner.sql",
        "rm -f bladerunner.sql",
        "wp search-replace 'bladerunner.elseif.se' 'bladerunner.app' --all-tables",
        "rsync --exclude .cache -rve ssh " .
        "forge@elseif.se:~/bladerunner.elseif.se/current/web/app/uploads web/app",
        "wp rewrite flush",
        "wp plugin activate query-monitor",
    ];

    foreach ($actions as $action) {
        writeln("{$action}");
        writeln(runLocally($action, ['timeout' => 9999]));
    }
});