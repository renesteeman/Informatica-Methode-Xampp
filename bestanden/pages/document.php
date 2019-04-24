<?php
	include('../components/headerTheory.php');

  $chapter_id = check_input($_GET['chapter_id']);
	$chapter_name = check_input($_GET['chapter_name']);
  $document_id = check_input($_GET['document_id']);

	$document_title = "";
	$document_subtitle = "";
	$document_content = "";

  if (isset($_SESSION['id'])){
    $id = check_input($_SESSION['id']);

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

        if($user_school == $chapter_school OR $chapter_school == 'Inforca'){

					$sql = "SELECT document_title, document_subtitle, document_content FROM theorie_documenten WHERE document_id=$document_id";

		      if (mysqli_query($conn, $sql)) {
		        //find school of teacher
		        $result = mysqli_query($conn, $sql);
		        $result = mysqli_fetch_assoc($result);
						$document_title = $result['document_title'];
						$document_subtitle = $result['document_subtitle'];
						$document_content = $result['document_content'];

					} else {
						echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
					}

				} else {
					echo "U zit niet op deze school";
				}
      }  else {
				echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			}
    }  else {
			echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		}
  }

  echo "
    <body>

    	<div class='title-small'>
    		<h2>
    			".$chapter_name."
    		</h2>
    	</div>

    	<div class='installation-bar'>
    		<h3>".$document_title."</h3>
    	</div>

    	<div class='theorie'>
    		<div class='bar-s'>
    			<h3>
    				".$document_subtitle."
    			</h3>
    		</div>

    		<div class='theorie-content'>
    			".$document_content."
    		</div>

    	</div>
  ";

	include('../components/footerTheory.php');
	?>

</body>
