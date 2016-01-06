<footer>
  <div class="row">
    <div class="col-lg-12">
      <hr/>

      <p>
        Page rendered: {{ date('Y-m-d H:i:s') }} GMT
      </p>

      <p>
        <a onclick="ga( 'send', 'event', 'Downloads', 'dist', '{{ date("Y-m-d H:i", @filectime( $_SERVER['DOCUMENT_ROOT'] . '/bladerunner.zip') ) }}');" href="/bladerunner.zip">
          <strong>(+) Download dist bladrunner.zip, created {{ date("Y-m-d H:i", @filectime( $_SERVER['DOCUMENT_ROOT'] . '/bladerunner.zip') ) }} GMT</strong>
        </a>
      </p>

      <p>
        <a onclick="ga( 'send', 'event', 'Outbound', 'packagist', '{{ date("Y-m-d") }}' );" href="https://packagist.org/packages/ekandreas/bladerunner" target="_blank">
          Packagist
        </a>
        &nbsp;|&nbsp;
        <a onclick="ga( 'send', 'event', 'Outbound', 'support', '{{ date("Y-m-d") }}' );" href="https://github.com/ekandreas/bladerunner/issues" target="_blank">
          Support
        </a>
        &nbsp;|&nbsp;
        <a onclick="ga( 'send', 'event', 'Outbound', 'github', '{{ date("Y-m-d") }}' );" href="https://github.com/ekandreas/bladerunner" target="_blank">
          Github
        </a>
      </p>

      <p>
        Made by <a href="http://www.aekab.se" rel="nofollow">AEKAB</a>.
        &nbsp;|&nbsp;
        Contact at <a href="mailto:andreas@aekab.se">andreas@aekab.se</a>.
      </p>
      
    </div>
  </div>
</footer>