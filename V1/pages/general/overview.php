<?php
include('../../php/DB_connect.php');
include('../../php/header.php');
?>

<link rel="stylesheet" href="../../css/main.min.css">
<script src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src="../../js/overview/overview.js"></script>

<body>

	<div class="debug">
		<?php

		?>
	</div>

	<div class="main">
		<div class="title">
			<select id="selectedStatus" class="overview-toggle">
				<option>Klassen</option>
				<option>Groepen</option>
			</select>
			overzicht
		</div>

		<div class="main-content">

		<!--IF Groepen
			<div class="row">
				<div class="col-lg-12">
					<div class="table-responsive">
						<table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
						<thead class="thead-dark">
							<tr>
								<th scope="col" class="number">#</th>
								<th scope="col" class="klas">Klas</th>
								<th scope="col" class="groepsnaam">Groepsnaam</th>
								<th scope="col" class="leden">Leden</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1 (make auto increment)</td>
								<td>H51 (klas(sen) waar de leden in zitten)</td>
								<td>group_name (must be exclusive for school)</td>
								<td>namen</td>
							</tr>
							<tr>
								<td>2</td>
								<td>H51</td>
								<td>Testers2</td>
								<td>x, y, z</td>
							</tr>
							<tr>
								<td>3</td>
								<td>H52</td>
								<td>Creatieve namen</td>
								<td>x, y, z</td>
							</tr>
							<tr>
								<td>4</td>
								<td>A61</td>
								<td>Te lang op Bernardinus</td>
								<td>x, y, z</td>
							</tr>
							<tr>
								<td>5</td>
								<td>H51</td>
								<td>HEIL KOFFIE</td>
								<td>René</td>
							</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>-->

		<div id="result">
      <?php

      $studentInfo;

      $statement = 'SELECT * FROM `group` ORDER BY `klas`';
      if ($query = mysqli_query($conn, $statement)) {
        while($fetch = mysqli_fetch_assoc($query)) {
          $klas = $fetch['klas'];
          $query1 = mysqli_query($conn, 'SELECT * FROM `account` WHERE id='.$fetch['id']);
          while ($fetch1 = mysqli_fetch_assoc($query1)) {
            $username = $fetch1['usr_name'];
          }
          if (isset($studentInfo[$klas])) {
            $studentInfo[$klas] .= ', '.$username;
          } else {
            $studentInfo[$klas] = $username;
          }
        }
      } else {
        echo 'Error';
      }

      ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">
            <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="number">#</th>
                <th scope="col" class="klas">Klas</th>
                <th scope="col" class="leden">Leden</th>
              </tr>
            </thead>
            <tbody>
      <?php

      $count = 1;
      foreach ($studentInfo as $key => $value) {
        echo '<tr>
          <td>'.$count.'</td>
          <td>'.$key.'</td>
          <td>'.$value.'</td>
        </tr>';
        $count++;
      }

      ?>
      </tbody>
      </table>
      </div><!--end of .table-responsive-->
      </div>
      </div>

    </div>


		</div>

	</div>

</body>

<?php
include('../../php/footer.php');
?>
