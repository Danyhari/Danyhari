<?php
$BMI=0;
$masa=$_POST['masa'];
$wzrost=$_POST['wzrost']; 

$BMI=$masa/(pow($wzrost,2));
echo $BMI;

switch ($BMI)
{
	case ($BMI<16):
	echo "<br> Wyg�odzenie";
	break;
	
	case ($BMI=16&&$BMI<=16.9):
	echo "<br> Wych�dzenie";
	break;
	
	case ($BMI=17&&$BMI<=18.5):
	echo "<br> Niedowaga";
	break;
	
	case ($BMI=18.5&&$BMI<24.9):
	echo "<br> Waga prawid�owa";
	break;
	
	case ($BMI=25&&$BMI<=29.9):
	echo "<br> Nadwaga";
	break;
	
	case ($BMI=30&&$BMI<=34.9):
	echo "<br> Oty�o�� I stopnia";
	break;
	
	case ($BMI=35&&$BMI<=39.9):
	echo "<br> Oty�o�� II stopnia";
	break;
	
	case ($BMI>=40):
	echo "<br> Oty�o�� III stopnia";
	break;
	
}

?>
