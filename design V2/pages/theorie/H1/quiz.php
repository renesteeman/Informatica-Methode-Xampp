<?php
	include('../../../components/headerChapter.php');
?>

<link rel="stylesheet" href="../../../css/quiz.min.css">

<body>

	<div class="title-small">
		<h2>
			H1 quiz
		</h2>
	</div>

	<div class="quiz-bar">
		<!-- TODO show actual number -->
		vraag 1/5
	</div>

	<div class="vraag">
		<div class="vraagInhoud">
			Wat is 1000111 binair in het hexadecimaal systeem?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">113
						<input type="checkbox" class="single-select-checkbox" id='checkbox1'>
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">80
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">71
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container" class="single-select-checkbox">4
						<input type="checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>
	</div>



	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
