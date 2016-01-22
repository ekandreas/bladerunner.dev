<footer>
  <div class="row">

    <hr/>

    <div class="col-lg-12 well">

      <p>
        Page rendered with Bladerunner at {{ date ("Y-m-d H:i", filemtime(__FILE__)) }} GMT
      </p>

      <p>
        <a onclick="ga( 'send', 'event', 'Downloads', 'dist', '{{ date("Y-m-d H:i", @filectime( $_SERVER['DOCUMENT_ROOT'] . '/bladerunner.zip') ) }}');" href="/bladerunner.zip">
          {!! shieldHtmlImage('https://img.shields.io/github/release/ekandreas/bladerunner.svg') !!} WordPress plugin (zip)
        </a>
      </p>

      <p>
        <a onclick="ga( 'send', 'event', 'Outbound', 'packagist', '{{ date("Y-m-d") }}' );" href="https://packagist.org/packages/ekandreas/bladerunner" target="_blank">
          {!! shieldHtmlImage('https://img.shields.io/packagist/v/ekandreas/bladerunner.svg') !!}</a>
        &nbsp;
        <a onclick="ga( 'send', 'event', 'Outbound', 'support', '{{ date("Y-m-d") }}' );" href="https://github.com/ekandreas/bladerunner/issues" target="_blank">
          {!! shieldHtmlImage('https://img.shields.io/github/issues/ekandreas/bladerunner.svg') !!}</a>
        &nbsp;
        <a onclick="ga( 'send', 'event', 'Outbound', 'github', '{{ date("Y-m-d") }}' );" href="https://github.com/ekandreas/bladerunner" target="_blank">
          {!! shieldHtmlImage('https://img.shields.io/github/release/ekandreas/bladerunner.svg') !!}</a>
      </p>

      <p>
        Made by <a href="http://www.aekab.se" rel="nofollow">AEKAB</a>.
        &nbsp;|&nbsp;
        Contact at <a href="mailto:andreas@aekab.se">andreas@aekab.se</a>.
      </p>

    </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
  </div>
</footer>