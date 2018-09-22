<?php
	include('DB_connect.php');
	session_start();

  $id = $_SESSION["id"];
  $school = '';
  $input = '';
  $error = '';
  $info = [];

  #get school and (part of a) name
  #search DB for possible (student) matches

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$input = mysqli_real_escape_string($conn, check_input($_POST['input']));

	$sql = "SELECT school FROM users WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];

    //check if there's a student with the given name and if so start to gather info
    $sql = "SELECT id, naam, klas, group_name, group_role, email, LActivity FROM users WHERE school='$school' AND naam='$input' AND functie='leerling'";

    if (mysqli_query($conn, $sql)) {
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) == 1){
        $result = mysqli_fetch_assoc($result);

        $info['id'] = $result['id'];
        $info['naam'] = $result['naam'];
        $info['klas'] = $result['klas'];
        $info['group_name'] = $result['group_name'];
        $info['group_role'] = $result['group_role'];
        $info['email'] = $result['email'];
        $info['LActivity'] = $result['LActivity'];

        $info['groepsgenoten'] = [];
        $info['quizResults'] = [];
        $info['progression'] = [];

        //if the person is in a group, get his groupmates
        $sqlGroupName = $info['group_name'];
        if(strlen($sqlGroupName) > 0){
          $sql = "SELECT naam FROM users WHERE school='$school' AND group_name=$sqlGroupName AND functie='leerling'";

        	if (mysqli_query($conn, $sql)) {
            $result = mysqli_query($conn, $sql);

            //add each name to the array of group_members
            while($row = mysqli_fetch_assoc($result)) {
              $Cnaam = $row['naam'];
              $info['groepsgenoten'][] = $Cnaam;
            }

          } else {
            $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 1";
          }
        }

        //get test results
        $sqlID = $info['id'];
        $sql = "SELECT hoofdstuk, cijfer FROM quiz WHERE userid='$sqlID'";

      	if (mysqli_query($conn, $sql)) {
          $result = mysqli_query($conn, $sql);

          //add each name to the array of group_members
          while($row = mysqli_fetch_assoc($result)) {
            $Cchapter = $row['hoofdstuk'];
            $Cgrade = $row['cijfer'];
            $add = [$Cchapter => $Cgrade];
            $info['quizResults'][] = $add;
          }

        } else {
          $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 1";
        }

        //get progression
        $sqlID = $info['id'];
        $sql = "SELECT * FROM progressie WHERE userid='$sqlID'";

      	if (mysqli_query($conn, $sql)) {
          $result = mysqli_query($conn, $sql);
          $result = mysqli_fetch_assoc($result);

          $info['progression'] = $result;


        } else {
          $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 1";
        }


      }

    } else {
      $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 1";
    }

  } else {
    $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 2";
  }

  //return data via json
  $toReturn = array('info' => $info, 'error' => $error);
	$toReturn = json_encode($toReturn, JSON_FORCE_OBJECT);
  echo $toReturn;

?>
