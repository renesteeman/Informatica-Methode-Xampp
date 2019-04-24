</div>
<footer>
	<div class="contact">
		Neem gerust contact op voor vragen, suggesties, adviezen en overigen. U mag binnen 24 uur een antwoord verwachten via de mail. Voor informatie over het privacy en cookie beleid kunt u <a href="../downloads/privacyBeleid.pdf">hier</a> klikken en voor de overige voorwaarden <a href="../downloads/voorwaarden.pdf">hier</a> KvK-nummer 74207806
	</div>
	<div class="contact-info">
		<span id="mail">info@inforca.nl</span>
		<?php

			//function to check and clean input
			function check_input($data) {
				$data = trim($data, " ");
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			if (isset($_SESSION["functie"])){
				if (check_input($_SESSION["functie"]) == 'docent'){
					echo '<span id="phone">06-22155216</span>';
				}
			}
		?>
	</div>
</footer>

<script src="../scripts/UI.js"></script>
<script src="../scripts/updateActivityGeneral.js" defer></script>

</html>
