<?php
date_default_timezone_set('Europe/Stockholm');

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
set('shared_files', ['.env', 'web/.htaccess', 'web/robots.txt', 'web/bladerunner.zip']);
set('env_vars', '/usr/bin/env');

task('deploy:restart', function () {
    
    writeln('Add bladerunner plugin...');
    run('cd {{release_path}} && php composer.phar require ekandreas/bladerunner');

    writeln('Create dist...');
    run('cd {{release_path}}/web/app/plugins/bladerunner && php ../../../../composer.phar update');
    run('cd {{release_path}}/web/app/plugins/bladerunner && rm -f .git .gitignore composer.json composer.lock .DS_Store .styleci.yml');
    run('cd {{release_path}}/web/app/plugins && zip -r ../../bladerunner.zip bladerunner');

    //run("curl -s http://www.skolporten.se/wp/wp-admin/admin-ajax.php?action=purge");
    run('sudo service apache2 restart && sudo service varnish restart');

})->desc('Restarting apache2 and varnish');

task( 'deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:shared',
    'deploy:symlink',
    'cleanup',
    'deploy:restart',
    'success'
] )->desc( 'Deploy your Bedrock project, eg dep deploy production' );


