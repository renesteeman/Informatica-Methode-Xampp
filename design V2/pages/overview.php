<?php
	include('../components/headerGeneral.php');
	include('../scripts/DB_connect.php');
?>

<link rel="stylesheet" href="../css/overview.min.css">
<script src="../scripts/UI.js"></script>

<body>

	<div class="title">
		<h2>
			Overzicht
		</h2>
	</div>

	<div class="bar">
		<h3>
			Klassen
		</h3>
	</div>

	<div class="classOverview">
		<table>
			<div class="class">
				<!-- table header for this class-->
				<tr class="classRow">
					<td>Klas</td>
					<td>
						<span class="tableHeaderElement"> X leerlingen </span>
						<span class="tableHeaderElement"> <img src="../icons/mail.svg"/> </span>
					</td>
					<td><img src="../icons/arrow.svg" class="arrow"/></td>
				</tr>

				<!-- table content -->
				<tr class="classContent">
					<td>René</td>
					<td>Steeman</td>
					<td>icon</td>
				</tr>
				<tr class="classContent">
					<td>Luc</td>
					<td>Tans</td>
					<td>icon</td>
				</tr>
				<tr class="classContent">
					<td>AI</td>
					<td>Robot</td>
					<td>icon=alarm</td>
				</tr>
				<tr class="classContent">
					<td>AI</td>
					<td>Robot</td>
					<td>icon=alarm</td>
				</tr>
				<tr class="classContent">
					<td>AI</td>
					<td>Robot</td>
					<td>icon=alarm</td>
				</tr>
			</div>

			<div class="class">
				<!-- table header for this class-->
				<tr class="classRow">
					<td>Klas</td>
					<td>
						<span class="tableHeaderElement"> X leerlingen </span>
						<span class="tableHeaderElement"> mail icon </span>
					</td>
					<td>collapse icon</td>
				</tr>

				<!-- table content -->
				<tr>
					<td>René</td>
					<td>Steeman</td>
					<td>icon</td>
				</tr>
				<tr>
					<td>Luc</td>
					<td>Tans</td>
					<td>icon</td>
				</tr>
				<tr>
					<td>AI</td>
					<td>Robot</td>
					<td>icon=alarm</td>
				</tr>
				<tr>
					<td>AI</td>
					<td>Robot</td>
					<td>icon=alarm</td>
				</tr>
				<tr>
					<td>AI</td>
					<td>Robot</td>
					<td>icon=alarm</td>
				</tr>
			</div>
		</table>
	</div>

	<div class="bar">
		<h3>
			Groepen
		</h3>
	</div>

	<?php
	include('../components/footer.php');
	?>

</body>
