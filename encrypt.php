<!DOCTYPE html>
<html>
<head>
    <title>Szyfrowanie plików tekstowych</title>
</head>
<body style="text-align: center;">
<br/><br/><br/><br/><br/><br/><br/><h1>Zaszyfrowany tekst z pliku KSIAZKA1.txt schowany do pliku KSIAZKA2.txt</h1>
</body>
</html>

<?php
//display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//open file for read
$file = fopen("KSIAZKA1.txt", "r");
$data = fread($file, filesize("KSIAZKA1.txt"));
$size = filesize("KSIAZKA1.txt");
fclose($file);

//encryption
$newData = "";
for ($i=0; $i<$size; $i++){
    $code = ord($data[$i]);
    if(($code>=97) and ($code<=122)){
        $code += 1;
    }else if(($code>=65) and ($code<=90)){
        $code += 1;
    }else if(($code>=48) and ($code<=57)){
        $code += 1;
    }
    $newData .= chr($code);
    // echo $i." ";
}
//open or create file txt for writing encrypted data
$file = fopen("KSIAZKA2.txt","w");
fwrite($file,$newData);
fclose ($file);
?>

