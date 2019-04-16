</div>

<div class="goToTop">
	&#8593;
</div>

<footer>
	<div class="contact">
		Neem gerust contact op voor vragen, suggesties, adviezen en overigen. U mag binnen 24 uur een antwoord verwachten via de mail. Voor informatie over het privacy en cookie beleid kunt u <a href="../downloads/privacyBeleid.pdf">hier</a> klikken en voor de overige voorwaarden <a href="../downloads/voorwaarden.pdf">hier</a>. KvK-nummer 74207806
	</div>
	<div class="contact-info">
		<span id="mail">info@inforca.nl</span>
		<?php
			if (isset($_SESSION["functie"])){
				if ($_SESSION["functie"] == 'docent'){
					echo '<span id="phone">06-22155216</span>';
				}
			}
		?>
	</div>
</footer>

<script src="../scripts/UI.js" defer></script>
<!--<script src="../scripts/progression.js" defer></script>-->
<!--<script src="../scripts/updateActivityChapter.js" defer></script>-->

</html>
