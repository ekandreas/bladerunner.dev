<!DOCTYPE html>
<html>
    <head>
        <title>Bladerunner {{ date('Y-m-d H:i') }}</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
    	@include( 'views.parts.ga' )
        <div class="container">
            <div class="content">
                <div class="title">Bladerunner</div>
                <p>
                	Page rendered: {{ date('Y-m-d H:i') }}
                </p>
                <p>
                	<a onclick="ga( 'send', 'event', 'Bladerunner', 'download', 'distro');" href="/bladerunner.zip">
                		<strong>(+) Download dist bladrunner.zip, created {{ date("Y-m-d H:i", @filectime( $_SERVER['DOCUMENT_ROOT'] . '/bladerunner.zip') ) }}</strong>
                	</a>
                </p>
            </div>
        </div>
    </body>
</html>
