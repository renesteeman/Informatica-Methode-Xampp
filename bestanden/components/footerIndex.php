</div>
<footer>
	<div class="bar-large">
		<div class="contact">
			Neem gerust contact op voor vragen, suggesties, adviezen en overigen. U mag binnen 24 uur een antwoord verwachten via de mail. Voor informatie over het privacy en cookie beleid kunt u <a href="downloads/privacyBeleid.docx" download>hier</a> klikken.
		</div>
		<div class="contact-info">
			<?php
				if (isset($_SESSION["username"])){
					if ($_SESSION["functie"] == 'docent'){
						echo '<a id="phone" href="tel:+045622155216">06-22155216</a>';
					}
				}
			?>
			<a id="mail" href="mailto:koffieandcode@gmail.com?SUBJECT=Inforca">koffieandcode@gmail.com</a>
		</div>
	</div>
</footer>

<script src="scripts/UI.js" defer></script>

</html>