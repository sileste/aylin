<?php

/*  Poznámky */
/*  Tento skript vytvořil Daniel Gomola pro program "Scorpion´s WinCheater */

/*  proměnné lze měnit a nebo smazat (jak proměnnou, tak její obraz v fwrite) */
/*  a+ znamená, že při každém načtení stránky se tyto data připíší (třeba pro logování), když a+
    změníme na "w" zapíší se data pouze jednou */

/*  Před použitím by bylo dobré vytvořit si prázdný soubor s názvem "soubor.txt" (lze změnit) */  

//Vypne zobrazování chyb pro tento skript

error_reporting(0);

//Nastavení


$cesta = "soubor.txt"; 			//Cesta k souboru a jméno souboru (jméno souboru do kterého se zapíší data)
$typ   = "a+"; 				//Typ, kterým se bude zapisovat


//Definuje položky, které se zapíší do souboru


$ip 	= $_SERVER["REMOTE_ADDR"]; 	//Zapíše se IP adresa
$host 	= gethostbyaddr($ip);    	//Zapíše se DNS adresa
$datum 	= date("H:i:s d.m.Y");  	//Zapíše se Datum s časem
$text  	= " a tohle je libovolný text";	//Zapíše libovolný text

//Přehledné poskládání


$poskladane = <<<END

V $datum zde přišel návštěvník, který má IP $ip a DNS $host a nakonec přidávám svoji vlastní zprávu $text

END;


//Tělo funkce


$fh = fopen($cesta,$typ);    		//Otevře soubor "soubor.txt" a bude do něho přidávat data

fwrite($fh,$poskladane); 		//Zapíše do souboru proměnné, které jsme si nahoře nadefinovali

fclose($fh); 				//Uzavře soubor


?>

