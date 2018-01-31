<?php
include('../php/DB_connect.php');
include('../php/header.php');
?>


<body>

	<div class="debug">
		<?php

			$sql = "SELECT * FROM account";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {

			    while($row = $result->fetch_assoc()) {
			        echo $row["usr_name"];
					echo "--".$row["psw"];
					echo "--".$row["school"];
					echo "</br>";
			    }

			} else {
			    echo "0 results";
			}


		?>
	</div>

	<div class="main">
		<ul>
			<li>
				H1 Werking computer
			</li>
			<li>
				H2 Logica
			</li>
			<li>
				H3 Programmeren
			</li>
			<li>
				Keuze H4 arduino
			</li>
			<li>
				Keuze H5 web development
			</li>
			<li>
				H6 Project management
			</li>
			<li>
				H7 Project uitvoeren
			</li>
		</ul>
	</div>

</body>


<?php
include('../php/footer.php');
?>
