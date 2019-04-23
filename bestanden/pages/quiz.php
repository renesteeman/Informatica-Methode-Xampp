<?php
	include('components/headerIndex.php');

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
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
        //TODO
  			CHAPTER quiz
  		</h2>
  	</div>

  	<div class='quiz-bar'>
  		<!-- filled in with JS -->
  	</div>

  	<div class='vragen'>

      //TODO for each vraag, show vraag

      <div class='vraagBalk'>
        Wat is de beste omschrijving van hoe video door een computer wordt 'begrepen'?
      </div>
      <div class='antwoorden'>
        <ul>
          <li>
            <label class='container'>Als een reeks RGB-waardes
              <input type='checkbox' class='single-select-checkbox'>
              <span class='checkmark'></span>
            </label>
          </li>
          <li>
            <label class='container'>Als een reeks afbeeldingen
              <input type='checkbox' class='single-select-checkbox'>
              <span class='checkmark'></span>
            </label>
          </li>
          <li>
            <label class='container'>Als een reeks letters
              <input type='checkbox' class='single-select-checkbox'>
              <span class='checkmark'></span>
            </label>
          </li>
          <li>
            <label class='container'>Als een reeks getallen uit het decimale stelsel
              <input type='checkbox' class='single-select-checkbox'>
              <span class='checkmark'></span>
            </label>
          </li>
        </ul>
      </div>
      <div class='uitleg'>

      </div>



  	</div>

  	<input type='submit' value='controleer' class='controleerAntwoordButton'/>

  	</div>

  	<script src='../scripts/quiz.js'></script>";


	?>


	<?php
	include('components/footerIndex.php');
	?>

</body>
