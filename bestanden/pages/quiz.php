<?php
	include('../components/headerTheory.php');

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

  $chapter_id = check_input($_GET['chapter_id']);
  $chapter_name = check_input($_GET['chapter_name']);
  $questions = [];

  if (isset($_SESSION['id'])){
    $id = $_SESSION['id'];

    //look for current values
    $sql = "SELECT school FROM users WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
      $result = mysqli_query($conn, $sql);
      $result = mysqli_fetch_assoc($result);
      $user_school = $result['school'];

      $sql = "SELECT school FROM theorie_hoofdstukken WHERE hoofdstuk_id='$chapter_id'";

      if (mysqli_query($conn, $sql)) {
        //find school of teacher
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($result);
        $chapter_school = $result['school'];
      } else {
        echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
      }

      if($chapter_school == $user_school OR $chapter_school=="Inforca"){

        $sql = "SELECT questionID, vraag, optie1, optie2, optie3, optie4, antwoord, uitleg FROM quiz_vragen WHERE hoofdstuk_id='$chapter_id'";

        if (mysqli_query($conn, $sql)) {
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $questionID = $row['questionID'];
              $vraag = $row['vraag'];
              $optie1 = $row['optie1'];
              $optie2 = $row['optie2'];
              $optie3 = $row['optie3'];
              $optie4 = $row['optie4'];
              $antwoord = $row['antwoord'];
              $uitleg = $row['uitleg'];

              $questions[] = [$questionID, $vraag, $optie1, $optie2, $optie3, $optie4, $antwoord, $uitleg];
            }
          }
        } else {
          echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
        }

      } else {
        echo "Deze pagina hoort niet bij uw school.";
        header('Location: ../index.php');
      }

    } else {
      echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
    }
  }

?>

<head>
	<meta name='description' content='Een informatica methode met structuur en keuze. Voor docenten is er een duidelijk overzicht en leerlingen kunnen zich specialiseren in wat ze interessant vinden, zonder de basis te missen.' />
	<meta name='keywords' content='Informatica, lesmethode, betaalbaar, duidelijk' />
	<meta name='author' content='René Steeman' />
</head>

<body>

	<?php

  echo "

  <link rel='stylesheet' href='../css/quiz.min.css'>

  <body>

  	<div class='title-small'>
  		<h2>
        ".$chapter_name." quiz
  		</h2>
  	</div>

  	<div class='quiz-bar'>
  		<!-- filled in with JS -->
  	</div>

  	<div class='vragen'>";

      for($i=0; $i<count($questions); $i++){

        $vraag = $questions[$i][1];
        $optie1 = $questions[$i][2];
        $optie2 = $questions[$i][3];
        $optie3 = $questions[$i][4];
        $optie4 = $questions[$i][5];
        //$antwoord = $questions[$i][6];
        //$uitleg = $questions[$i][7];

        echo "
        <div class='vraagBalk'>
          ".$vraag."
        </div>
        <div class='antwoorden'>
          <ul>
            <li>
              <label class='container'>".$optie1."
                <input type='checkbox' class='single-select-checkbox'>
                <span class='checkmark'></span>
              </label>
            </li>
            <li>
              <label class='container'>".$optie2."
                <input type='checkbox' class='single-select-checkbox'>
                <span class='checkmark'></span>
              </label>
            </li>";

            if(!is_null($optie3)){
              echo "
              <li>
                <label class='container'>".$optie3."
                  <input type='checkbox' class='single-select-checkbox'>
                  <span class='checkmark'></span>
                </label>
              </li>";

              if(!is_null($optie4)){
                echo "
                <li>
                  <label class='container'>".$optie4."
                    <input type='checkbox' class='single-select-checkbox'>
                    <span class='checkmark'></span>
                  </label>
                </li>";
              }
            }

          echo "
          </ul>
        </div>
        <div class='uitleg'>

        </div>";
      }




    echo "
  	</div>

  	<input type='submit' value='controleer' class='controleerAntwoordButton'/>

  	</div>

  	<script src='../scripts/quiz.js'></script>";

	include('../components/footerTheory.php');
	?>

</body>
