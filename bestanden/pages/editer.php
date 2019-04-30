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

			<div>
				<span class="line-block">Nieuwe naam</span>
				<input type="text" id="Nchapter_Name"/>
			</div>

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

			<div>
				<span class="line-block">Nieuwe naam</span>
				<input type="text" id="Nparagraph_Name"/>
			</div>

			<div class="html-tiles">
				<span class="html-tile p">
					p
				</span>
				<span class="html-tile url">
					url
				</span>
				<span class="html-tile hover-dropdown ol">
					ol
	        <ul>
	          <li class="html-tile-sub basic">1.</li>
	          <li class="html-tile-sub ML">1.a</li>
	        </ul>
				</span>
				<span class="html-tile ul">
					ul
				</span>
				<span class="html-tile code">
					code
				</span>
				<span class="html-tile img">
					img
				</span>
				<span class="html-tile table">
					table
				</span>
				<!--<span class="html-tile html">
					html
				</span>-->
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
