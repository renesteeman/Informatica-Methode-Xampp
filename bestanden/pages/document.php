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
  $document_id = check_input($_GET['document_id']);

  if (isset($_SESSION['id'])){
    $id = check_input(['id']);

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

        if($user_school == $chapter_school)
      }
    }
  }

  echo "
    <body>

    	<div class="title-small">
    		<h2>
    			H4 Installatie van de software
    		</h2>
    	</div>

    	<div class="installation-bar">
    		<h3>Arduino editor</h3>
    	</div>

    	<div class="theorie">
    		<div class="bar-s">
    			<h3>
    				Installatie instructies
    			</h3>
    		</div>

    		<div class="theorie-content">
    			<!-- CONTENT -->
    		</div>

    	</div>
  ";

	include('../components/footerTheory.php');
	?>

</body>
