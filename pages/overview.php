<?php
include('../php/DB_connect.php');
include('../php/header.php');
?>

<link rel="stylesheet" href="../css/overview.min.css">

<body>

	<div class="debug">
		<?php

		?>
	</div>

	<div class="main">
		<div class="title">
			<select class="overview-toggle">
				<option>Class</option>
				<option>Group</option>
			</select>
			Overview
		</div>

		<div class="main-content">

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
					</div><!--end of .table-responsive-->
				</div>
			</div>




		</div>

	</div>

</body>


<?php
include('../php/footer.php');
?>
