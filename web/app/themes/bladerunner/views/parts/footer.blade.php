<footer>
  <div class="row">

    <hr/>

    <div class="col-lg-12 well">

      <p>
        Page rendered with Bladerunner at {{ date ("Y-m-d H:i", filemtime(__FILE__)) }} GMT
      </p>

      <p>
        <a onclick="ga( 'send', 'event', 'Downloads', 'dist', '{{ date("Y-m-d H:i", @filectime( $_SERVER['DOCUMENT_ROOT'] . '/bladerunner.zip') ) }}');" href="/bladerunner.zip">
          Not using Composer? Here is the latest WordPress Bladerunner plugin (zip)
        </a>
      </p>

      <p>
        Made by <a href="http://www.aekab.se" rel="nofollow">AEKAB</a>.
        &nbsp;|&nbsp;
        Contact at <a href="mailto:andreas@aekab.se" rel="nofollow">andreas@aekab.se</a>.
      </p>

    </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
  </div>
</footer>