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
        //get the right info for the containers
        $info = mysqli_fetch_assoc($result);

        //if the person is in a group, get his groupmates
        $sqlGroupName = $info['group_name'];
        $sqlNaam = $info['naam'];
        if(strlen($sqlGroupName) > 0){
          $sql = "SELECT naam, klas, group_role FROM users WHERE school='$school' AND group_name='$sqlGroupName' AND functie='leerling' AND naam!='$sqlNaam'";

        	if (mysqli_query($conn, $sql)) {
            $result = mysqli_query($conn, $sql);

            //add each name to the array of group_members
            while($row = mysqli_fetch_assoc($result)) {
              $Cnaam = $row['naam'];
              $Cklas = $row['klas'];
              $Cgroup_role= $row['group_role'];

              $add = [$Cnaam, $Cklas, $Cgroup_role];
              $info['groepsgenoten'][] = $add;
            }

          } else {
            $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 1";
          }
        }

        //get test results
        $sqlID = $info['id'];
        $sql = "SELECT hoofdstuk, cijfer FROM quiz_results WHERE userid='$sqlID'";

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
          $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 2";
        }

        //get progression
        $sqlID = $info['id'];
        $sql = "SELECT * FROM progressie WHERE userid='$sqlID'";

      	if (mysqli_query($conn, $sql)) {
          $result = mysqli_query($conn, $sql);
          $result = mysqli_fetch_assoc($result);

          $info['progression'] = $result;
        } else {
          $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 3";
        }
      }

    } else {
      $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 4";
    }

  } else {
    $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 5";
  }

  //remove NULL values and empty values
  if(isset($info['naam'])){
    if(is_null($info['naam'])){
      $info['naam'] = '';
    }
  } else {
    $info['naam'] = '';
  }

  if(isset($info['klas'])){
    if(is_null($info['klas'])){
      $info['klas'] = '';
    }
  } else {
    $info['klas'] = '';
  }

  if(isset($info['group_name'])){
    if(is_null($info['group_name'])){
      $info['group_name'] = '';
    }
  } else {
    $info['group_name'] = '';
  }

  if(isset($info['group_role'])){
    if(is_null($info['group_role'])){
      $info['group_role'] = '';
    }
  } else {
    $info['group_role'] = '';
  }

  if(isset($info['email'])){
    if(is_null($info['email'])){
      $info['email'] = '';
    }
  } else {
    $info['email'] = '';
  }

  if(isset($info['LActivity'])){
    if(is_null($info['LActivity'])){
      $info['LActivity'] = '';
    }
  }
  else {
    $info['LActivity'] = '';
  }

  if(isset($info['groepsgenoten'])){
    if(empty($info['groepsgenoten'])){
      $info['groepsgenoten'] = '';
    }
  } else {
    $info['groepsgenoten'] = '';
  }

  if(isset($info['quizResults'])){
    if(empty($info['quizResults'])){
      $info['quizResults'] = '';
    }
  } else {
    $info['quizResults'] = '';
  }

  if(isset($info['progression'])){
    if(empty($info['progression'])){
      $info['progression'] = '';
    }
  } else {
    $info['progression'] = '';
  }

  //return data via json
  $toReturn = array('info' => $info, 'error' => $error);
	$toReturn = json_encode($toReturn, JSON_FORCE_OBJECT);
  echo $toReturn;

?>
