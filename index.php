<?php    
include('header.php');
include('getCsv.php');
include('fc.php');

require_once 'connection.php'; 

$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));

?>

<form action="" method="get">
            <p><b>Количество кластеров:</b><br>
            <input name="kol" type="text" size="40" value="2">
            <input type="submit" name="submit" value="Рассчитать">
</form>
<?
if ($_GET['submit']) {

$query ="SELECT * FROM customers";
$result = mysqli_query($link, $query); 
while($row = mysqli_fetch_array($result)) {
    $MyMassive[] = $row;
}
$value = $_GET['kol'];
$mas3 = $MyMassive;
$array = array(array(0=>"Идентификатор",1=>"Пол",2=>"Возраст",3=>"Средний чек",4=>"Количество посещений", 5=>"Наличие детей"));
$mas3 = array_merge ($array, $mas3);

$mas4 = $mas3;
$mas4 = avgStr($mas3,$mas4,$link);
$mas3 = normalize($mas3);
$a = fi($mas3,$value, $mas4);
}
include('footer.php');
?>