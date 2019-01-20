</div>
<footer>
	<div class="bar-footer">
		<div class="contact">
			Neem gerust contact op voor vragen, suggesties, adviezen en overigen. U mag binnen 24 uur een antwoord verwachten via de mail. Voor informatie over het privacy en cookie beleid kunt u <a href="downloads/privacyBeleid.pdf">hier</a> klikken en voor de overige voorwaarden <a href="downloads/voorwaarden.pdf">hier</a>.
		</div>
		<div class="contact-info">
			<?php
				if (isset($_SESSION["functie"])){
					if ($_SESSION["functie"] == 'docent'){
						echo '<a id="phone" href="tel:+045622155216">06-22155216</a>';
					}
				}
			?>
			<a id="mail" href="mailto:info@inforca.nl">info@inforca.nl</a>
		</div>
	</div>
</footer>

<script src="scripts/UI.js" defer></script>
<script src="scripts/updateActivityIndex.js" defer></script>

</html>
