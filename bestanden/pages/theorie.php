<?php
  include('../components/headerTheory.php');

  $chapter = "";
  $chapter_name = "";
  $paragraph = "";
  $paragraph_name = "";
  $amountOfParagraphs = "";

  $theory_main = "";
  $theory_questions = "";
  $theory_answers = "";

  //TODO set actual values
  $chapter = "T1";
  $chapter_name = "Test chapter";
  $paragraph = "1";
  $paragraph_name = "test paragraph";
  $amountOfParagraphs = 3;

  $theory_main = "theorie";
  $theory_questions = "vragen";
  $theory_answers = "antwoorden";

  echo "
  <body>
    <div class='title-small'>
      <h2>
        ".$chapter." ".$chapter_name." ".$paragraph." ".$paragraph_name."
      </h2>
     </div>

    <div class='bar-par-overview'>
      <div class='paragraph-tiles'>";

        for($i=1; $i<=$amountOfParagraphs; $i++){
          echo "
          <div class='ptile'>
            <span class='ptile-content'>
              §"."$i"."
            </a></span>
          </div>
          ";
        }

      echo "
      </div>
    </div>

    <div class='theorie'>
      <div class='bar-s'>
        <h3>
          Theorie
        </h3>
      </div>

      <div class='theorie-content'>

        ".$theory_main."

      </div>

      <div class='bar-s'>
        <h3>
          Opdrachten
        </h3>
      </div>

      <div class='theorie-content'>

        ".$theory_questions."

      </div>

      <div class='bar-s'>
        <h3>
          Antwoorden
        </h3>
      </div>

      <div class='theorie-content theorie-answers'>

        ".$theory_answers."

      </div>
    </div>
  ";

	include('../components/footerTheory.php');

  echo "</body>";

?>
