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

	<div class="main">
		<form class="editTheory" method="post" action="../scripts/editTheory.php" accept-charset="UTF-8">
			<div>
				<span class="line-block">Hoofdstuk</span>
		    <span class="selector">
		      <select id="chapter_selector">
		        <option value=""></option>
		        <option value="'.$CurrentClass.'">'.$CurrentClass.'</option>
						<option value="'.$CurrentClass.'">+ aanmaken</option>
		      </select>
		    </span>
			</div>

			<!--
			<div>
				<span class="line-block">Naam hoofdstuk</span>
				<input type="text" class="Nclass" name="Nclass"/>
			</div>
			-->

			<div>
				<span class="line-block">Paragraaf</span>
		    <span class="selector">
		      <select id="paragraph_selector">
		        <option value=""></option>
		        <option value="'.$CurrentClass.'">'.$CurrentClass.'</option>
						<option value="'.$CurrentClass.'">+ aanmaken</option>
		      </select>
		    </span>
			</div>

			<!--
			<div>
				<span class="line-block">Naam paragraaf</span>
				<input type="text" class="Nclass" name="Nclass"/>
			</div>
			-->

			<div class="html-tiles">
				<span class="html-tile">
					url
				</span>
				<span class="html-tile hover-dropdown">
					ol
	        <ul>
	          <li>1.</li>
	          <li>1.a</li>
	          <li>1.1.</li>
	        </ul>
				</span>
				<span class="html-tile">
					ul
				</span>
				<span class="html-tile">
					code
				</span>
				<span class="html-tile">
					img
				</span>
				<span class="html-tile">
					html
				</span>
			</div>

			<div>
				<div>
					Theorie
				</div>
				<textarea id="theorie"></textarea>
			</div>

			<div>
				<div>
					Vragen
				</div>
				<textarea id="vragen"></textarea>
			</div>

			<div>
				<div>
					Antwoorden
				</div>
				<textarea id="antwoorden"></textarea>
			</div>

			<button type="submit">Opslaan</button>
		</form>
  </div>

	<?php
	include('../components/footerGeneral.php');
	?>

</body>

<script src="../scripts/editer.js"></script>
