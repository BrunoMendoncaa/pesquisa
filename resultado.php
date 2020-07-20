<head>
	<link rel="stylesheet" type="text/css" href="resultado.css">
</head>
<body>
	<header>
		<div class="container">
			<h2>Sistema INOVE+ de pesquisa de titulos</h2>
		</div>
				
		<p>
			<input type="button" value="Voltar" onclick="location.href='index.html'"> <br><br>
		</p>

		<img src="img/LOGO.png" id="inove">
		<img src="img/logosbk.png" id="sbk">

		<p id="cdt">
			<?php
				echo "<strong>Copyryght &copy Bruno mendonça / Diego henrique - 2020</strong>";
			?>
		</p>
	</header>
	<br>
	<section>
		<?php
		try{
			$nConn = new PDO("mysql:dbname=inove;host=localhost","bruno.mendonca","theo2020");
		}catch(PDOException $e){
			echo "Erro: " . $e->getMessage();
		}


		$aut = $_GET['aut'];
		$valor = $_GET['valor'];
		$data = $_GET['data'];

		$sql = $nConn->prepare("SELECT * FROM titulos WHERE aut = :a AND valor = :v AND data = :d");
		$sql->bindValue(":a" , $aut);
		$sql->bindValue(":v" , $valor);
		$sql->bindValue(":d" , $data);
		$sql->execute();

		if ($sql->rowcount() > 0){
			$resultado = $sql->fetchAll();
			
			

			foreach ($resultado as $row) {
				$script = "<table border='1'>";

				$script = $script . "<tr>";

				$script = $script . "<th>CHAVE</th>";
				$script = $script . "<th>MOVIMENTO</th>";
				$script = $script . "<th>AGÊNCIA</th>";
				$script = $script . "<th>COD DE BARRAS</th>";
				$script = $script . "<th>BANCO</th>";
				$script = $script . "<th>VALOR R$</th>";
				$script = $script . "<th>AUTENTICAÇÃO</th>";

				$script = $script . "</tr>";

				$id = 		$row[0];
				$data = 	$row[1];

				$agencia = 	$row[2];
				switch (strlen($agencia)){
					case 3 : $agencia = "0$agencia"; break;
					case 2 : $agencia = "00$agencia"; break;
					case 1 : $agencia = "000$agencia"; break;
					case 0 : $agencia = "0000"; break;
				}

				$um = 		$row[3];
				switch (strlen($um)){
					case 9 : $um = "0$um"; break;
					case 8 : $um = "00$um"; break;
					case 7 : $um = "000$um"; break;
					case 6 : $um = "0000$um"; break;
					case 5 : $um = "00000$um"; break;
					case 4 : $um = "000000$um"; break;
					case 3 : $um = "0000000$um"; break;
					case 2 : $um = "00000000$um"; break;
					case 1 : $um = "000000000$um"; break;
					case 0 : $um = "0000000000"; break;
				}

				$dois = 	$row[4];
				switch (strlen($dois)){
					case 9 : $dois = "0$dois"; break;
					case 8 : $dois = "00$dois"; break;
					case 7 : $dois = "000$dois"; break;
					case 6 : $dois = "0000$dois"; break;
					case 5 : $dois = "00000$dois"; break;
					case 4 : $dois = "000000$dois"; break;
					case 3 : $dois = "0000000$dois"; break;
					case 2 : $dois = "00000000$dois"; break;
					case 1 : $dois = "000000000$dois"; break;
					case 0 : $dois = "0000000000"; break;
				}

				$tres = 	$row[5];
				switch (strlen($tres)){
					case 9 : $tres = "0$tres"; break;
					case 8 : $tres = "00$tres"; break;
					case 7 : $tres = "000$tres"; break;
					case 6 : $tres = "0000$tres"; break;
					case 5 : $tres = "00000$tres"; break;
					case 4 : $tres = "000000$tres"; break;
					case 3 : $tres = "0000000$tres"; break;
					case 2 : $tres = "00000000$tres"; break;
					case 1 : $tres = "000000000$tres"; break;
					case 0 : $tres = "0000000000"; break;
				}

				$quatro = 	$row[6];
				switch (strlen($quatro)){
					case 9 : $quatro = "0$quatro"; break;
					case 8 : $quatro = "00$quatro"; break;
					case 7 : $quatro = "000$quatro"; break;
					case 6 : $quatro = "0000$quatro"; break;
					case 5 : $quatro = "00000$quatro"; break;
					case 4 : $quatro = "000000$quatro"; break;
					case 3 : $quatro = "0000000$quatro"; break;
					case 2 : $quatro = "00000000$quatro"; break;
					case 1 : $quatro = "000000000$quatro"; break;
					case 0 : $quatro = "0000000000"; break;
				}

				$cinco = 	$row[7];
				switch (strlen($cinco)){
					case 3 : $cinco = "0$cinco"; break;
					case 2 : $cinco = "00$cinco"; break;
					case 1 : $cinco = "000$cinco"; break;
					case 0 : $cinco = "0000"; break;
				}

				$banco = 	$row[8];
				switch (strlen($banco)){
					case 2 : $banco = "0$banco"; break;
					case 1 : $banco = "00$banco"; break;
					case 0 : $banco = "000"; break;
				}

				$aut = 		$row[9];
				$valor = 	$row[10];

				$script = $script . "<tr>";

				$script = $script . "<td>$id</td>";
				$script = $script . "<td>$data</td>";
				$script = $script . "<td>$agencia</td>";
				$script = $script . "<td>$um$dois$tres$quatro$cinco</td>";
				$script = $script . "<td>$banco</td>";
				$script = $script . "<td>$aut</td>";
				$script = $script . "<td>$valor</td>";

				$script = $script . "</tr>";

				$script = $script . "</table>";

				echo "<strong>PAGAMENTO DE TRIBUTO - CB01</strong><br><br>";
				echo "$script <br>";
			}

			
			

			
		}
		else {
			echo "<h3>Titilo não localizado</h3><br>";
			echo "<img src='img/erro.jpg' style='width: 500px; height: 300px; float: center;'> <br>";
			
		}


	?>
	</section>
	


	
</body>