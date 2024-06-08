<html>

<head>
<title>Dodana</title>
</head>

<body>

<?php 

$isbn=$_POST['isbn'];
$autor=$_POST['autor'];
$tytul=$_POST['tytul'];
$cena=$_POST['cena'];

if (!$isbn || !$autor || !$tytul || !$cena)
{
	echo 'Podaj wszystkie dane';
	exit;
}

@ $db=new mysqli('192.168.11.152','julia', 'zaq1@WSX', 'julia');

if (mysqli_connect_errno())
{
	echo 'Blad polaczenia';
	exit;
}

$zapytanie="insert into piec values ('".$isbn."','".$autor."','".$tytul."','".$cena."')";

echo $zapytanie;
echo '<br>';

$wynik=$db->query($zapytanie);
if ($wynik)
{
	echo $db->affected_rows.' ksiazka dopisana do bazy';
}

?>

</body>

</html>