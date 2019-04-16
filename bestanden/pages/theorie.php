<?php
  include('../components/headerTheory.php');

  echo "
  <body>
    <div class='title-small'>
      <h2>
        Hoofstuk + hoofdstuk_naam + paragraaf + paragraaf_naam
      </h2>
     </div>

    <div class='bar-par-overview'>
      <div class='paragraph-tiles'>

        Foreach paragraph

        <div class='ptile'>
          <span class='ptile-content'>
            §i
          </a></span>
        </div>

      </div>
    </div>

    <div class='theorie'>
      <div class='bar-s'>
        <h3>
          Theorie
        </h3>
      </div>

      <div class='theorie-content'>

        THEORY

      </div>

      <div class='bar-s'>
        <h3>
          Opdrachten
        </h3>
      </div>

      <div class='theorie-content'>

        QUESTIONS

      </div>

      <div class='bar-s'>
        <h3>
          Antwoorden
        </h3>
      </div>

      <div class='theorie-content theorie-answers'>

        ANSWERS

      </div>
    </div>
  ";

	include('../components/footerTheory.php');

  echo "</body>";

?>
