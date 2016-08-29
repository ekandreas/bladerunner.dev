<?php
date_default_timezone_set('Europe/Stockholm');

include_once 'vendor/ekandreas/valet-deploy/recipe.php';

server( 'production', 'elseif.se', 22 )
    ->env('deploy_path','~/bladerunner.elseif.se')
    ->user( 'forge' )
    ->env('branch', 'master')
    ->stage('production')
    ->identityFile();

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

    $version = '0';
    preg_match('/ekandreas\/bladerunner\s\((.*)\)/i', $output, $matches);
    if( $matches ) {
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

task('deploy:restart', function () {
    //run('sudo service apache2 restart && sudo service varnish restart');
    run("rm -f {{deploy_path}}/shared/web/app/uploads/.cache/*.*");
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


