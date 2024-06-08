<html>
 
<head>
<title>create</title>
</head>

<body>

<?php 

$decyzja=$_POST['decyzja'];
$nazwa=$_POST['nazwa'];

if ($decyzja=='n')
{
	echo 'Nie stworzono tabeli';
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
	
	$zapytanie="create table ".$nazwa.
				"(isbn char(13) not null primary key,
				  autor char(50),
				  tytul char(100),
				  cena float(4,2)
				  );";
				  
	echo "<br>$zapytanie<br>";
	
	$wynik=$db->query($zapytanie);
	echo $wynik."<br>";
	
	if ($wynik)
	{
		echo $db->affected_rows.' Utworzyles tabele w bazie.';
	}
	
}

?>

</body>

</html>