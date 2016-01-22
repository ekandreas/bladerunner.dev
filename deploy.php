<?php
date_default_timezone_set('Europe/Stockholm');

include_once 'vendor/ekandreas/docker-bedrock/recipe.php';
set('mysql.database','bladerunner');

include_once 'vendor/deployer/deployer/recipe/common.php';
include_once 'vendor/ekandreas/dipwpe/main.php';

env('remote.name','bladerunner');
env('remote.path','/mnt/persist/www/bladerunner.aekab.se');
env('remote.ssh','root@c3583.cloudnet.se');
env('remote.database','bladerunner');
env('remote.domain','bladerunner.aekab.se');
env('local.domain','bladerunner.dev');
env('local.is_elastic',false);

server( 'development', 'andreasek.se', 22 )
    ->env('deploy_path','/var/www/html')
    ->env('branch', 'master')
    ->stage('development')
    ->user( 'vagrant', 'vagrant' );

server( 'production', 'c3583.cloudnet.se', 22 )
    ->env('deploy_path','/mnt/persist/www/bladerunner.aekab.se')
    ->user( 'root' )
    ->env('branch', 'master')
    ->stage('production')
    ->identityFile();

set('repository', 'https://github.com/ekandreas/bladerunner.dev');

// Symlink the .env file for Bedrock
set('env', 'prod');
set('keep_releases', 10);
set('shared_dirs', ['web/app/uploads']);
set('shared_files', ['.env', 'web/.htaccess', 'web/robots.txt']);
set('env_vars', '/usr/bin/env');

task('deploy:create_dist', function () {
    writeln('Creating dist');

    run("curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer");

    $output = run('cd /tmp/ && rm -Rf bladerunner && composer create-project ekandreas/bladerunner bladerunner --no-dev');

    $version = '0';
    preg_match('/ekandreas\/bladerunner\s\((.*)\)/i', $output, $matches);
    if( $matches ) {
        $version = $matches[1];
    }

    writeln("<comment>Bladerunner version $version</comment>");

    run('cd /tmp/bladerunner && rm -Rf tests && rm -f .git .gitignore composer.json composer.lock .DS_Store .styleci.yml .travis.yml phpunit.xml.dist');
    run('rm -f /tmp/bladerunner.zip && cd /tmp/bladerunner && zip -r ../bladerunner.zip .');

    writeln('Copy dist to plugin folder');
    run('chown www-data:www-data /tmp/bladerunner.zip');
    run('chown -R www-data:www-data /tmp/bladerunner');
    run('cp -r /tmp/bladerunner {{release_path}}/web/app/plugins');
    run('cp -r /tmp/bladerunner.zip {{release_path}}/web');
    run('rm -Rf /tmp/bladerunner');
    run('rm -f /tmp/bladerunner.zip');

})->desc('Creating dist of plugin');

task('deploy:restart', function () {
    run('sudo service apache2 restart && sudo service varnish restart');
    run("rm {{release_path}}/web/app/uploads/.cache/*.*");
})->desc('Restarting apache2 and varnish');

task( 'deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:shared',
    'deploy:create_dist',
    'deploy:symlink',
    'cleanup',
    'deploy:restart',
    'success'
] )->desc( 'Deploy your Bedrock project, eg dep deploy production' );


