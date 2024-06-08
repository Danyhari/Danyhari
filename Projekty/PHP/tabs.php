<html>

<head>
<title>Wyswietlenie</title>
</head>

<body>

<?php 

$decyzja=$_POST['decyzja'];

if ($decyzja=='n')
{
	echo 'Nie zobaczysz tabeli';
	exit;
}
else
{
	
	@ $db=new mysqli('192.168.11.152','julia', 'zaq1@WSX', 'julia');
	
	if (mysqli_connect_errno())
	{
		echo 'Blad polaczenia';
		exit;
	}
	
$zapytanie="select * from piec";

$wynik=$db->query($zapytanie);

$ile_znalezionych = $wynik->num_rows;

echo '<p>Ilosc znalezionych pozycji: '.$ile_znalezionych.'</p>';

for ($i=0; $i<$ile_znalezionych; $i++)
{
	$wiersz = $wynik->fetch_assoc();
	
	echo '<p><strong>'.($i+1).'. Tytul: ';
	echo stripslashes ($wiersz['tytul']);
	echo '</strong><br/> Autor: ';
	echo stripslashes ($wiersz['autor']);
	echo '<br/> ISBN: ';
	echo stripslashes ($wiersz['isbn']);
	echo '<br/> Cena: ';
	echo stripslashes ($wiersz['cena']);
	echo '</p>';
}

$wynik->free();
$db->close();
	
}

?>

</body>

</html>