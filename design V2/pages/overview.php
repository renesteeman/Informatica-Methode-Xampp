<?php
	include('../components/headerGeneral.php');
	include('../scripts/DB_connect.php');
?>

<link rel="stylesheet" href="../css/overview.min.css">

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
		<!-- the table as a whole -->
		<div class="table">
			<!-- one class-->
			<div class="class">
				<!-- table header for this class-->
				<div class="classHeader">
					<span class="klas">Klas</span>
					<span class="Nleerlingen">X leerlingen </span>
					<span class="icons">
						<span class="Mail image"><img src="../icons/mail.svg"/></span>
						<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
					</span>
				</div>

				<!-- table content for this class-->
				<div class="classContent">
					<div class="row">
						<span class="name">Student</span>
						<span class="progress">icon</span>
					</div>
					<div class="row">
						<span class="name">Student</span>
						<span class="progress">icon</span>
					</div>
					<div class="row">
						<span class="name">Student</span>
						<span class="progress">icon</span>
					</div>
					<div class="row">
						<span class="name">Student</span>
						<span class="progress">icon</span>
					</div>
				</div>
			</div>
		</div>
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
