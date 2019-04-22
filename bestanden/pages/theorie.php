<?php
  include('../components/headerTheory.php');

  $hoofdstuk_id = "";
  $paragraph = "";
  $paragraph_name = "";

  $theory_main = "";
  $theory_questions = "";
  $theory_answers = "";

  $chapter_school = "";
  $chapter = "";
  $chapter_name = "";

  $user_school = "";

  //TODO get amountOfParagraphs
  $amountOfParagraphs = "";

  $paragraph_id = $_GET['paragraph_id'];

  $sql = "SELECT hoofdstuk_id, paragraaf, paragraaf_naam, main, questions, answers FROM theorie_paragrafen WHERE paragraaf_id='$paragraph_id'";

  if (mysqli_query($conn, $sql)) {
    //find school of teacher
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($result);
    $hoofdstuk_id = $result['hoofdstuk_id'];
    $paragraph = $result['paragraaf'];
    $paragraph_name = $result['paragraaf'];
    $theory_main = $result['main'];
    $theory_questions = $result['questions'];
    $theory_answers = $result['answers'];
  } else {
    echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
  }

  $sql = "SELECT school, hoofdstuk, hoofdstuk_naam FROM theorie_hoofdstukken WHERE hoofdstuk_id='$hoofdstuk_id'";

  if (mysqli_query($conn, $sql)) {
    //find school of teacher
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($result);
    $chapter_school = $result['school'];
    $chapter = $result['hoofdstuk'];
    $chapter_name = $result['hoofdstuk_naam'];
  } else {
    echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
  }


  if (isset($_SESSION['id'])){
    $id = $_SESSION['id'];

    //look for current values
    $sql = "SELECT school FROM users WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
      $result = mysqli_query($conn, $sql);
      $result = mysqli_fetch_assoc($result);
      $user_school = $result['school'];
    }else {
      echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
    }

  }

  if($chapter_school == $user_school OR $chapter_school=="Inforca"){
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

    echo "</body>";

  	include('../components/footerTheory.php');



  } else {
    echo "Deze pagina hoort niet bij uw school.";
  }

?>
