<footer>
  <div class="row">

    <hr/>

    <div class="col-lg-12 well">

      <p>
        Page rendered with Bladerunner at {{ date ("Y-m-d H:i", filemtime(__FILE__)) }} GMT
      </p>

      <p>
        <a onclick="ga( 'send', 'event', 'Downloads', 'dist', '{{ date("Y-m-d H:i", @filectime( $_SERVER['DOCUMENT_ROOT'] . '/uploads/bladerunner.zip') ) }}');" href="/app/uploads/bladerunner.zip">
          Not using Composer? Here is the latest WordPress Bladerunner plugin (zip)
        </a>
      </p>

      <p>
        Made by <a href="https://www.elseif.se" rel="nofollow">Elseif AB</a>.
        &nbsp;|&nbsp;
        Contact at <a href="mailto:andreas@elseif.se" rel="nofollow">andreas@elseif.se</a>.
      </p>

    </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
  </div>
</footer>