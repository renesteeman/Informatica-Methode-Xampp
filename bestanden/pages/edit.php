<?php
	include('../components/headerGeneral.php');
?>

<link rel="stylesheet" href="../css/editer.min.css">

<head>
	<meta name="description" content="Een planner waarop leerlingen kunnen zien wat voor wanneer af moet zijn en docenten opdrachten kunnen toevoegen." />
	<meta name="keywords" content="Informatica, lesmethode, betaalbaar, duidelijk, overzicht, planner" />
	<meta name="author" content="René Steeman" />
</head>

<body>

	<div class="title">
		<h2>
			Aanpassen
		</h2>
	</div>

	<div class="bar">
		<h3>
			Theorie aanpassen
		</h3>
	</div>

	<div class="editor">
    Hoofdstuk
    <div class="selector">
      <select>
        <option value=""></option>
        <option value="'.$CurrentClass.'">'.$CurrentClass.'</option>
      </select>
    </div>
  </div>

	<?php
	include('../components/footerGeneral.php');
	?>

</body>

<!--<script src="../scripts/editer.js"></script>-->
