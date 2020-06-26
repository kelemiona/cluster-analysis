<?
function Evclid($arr, $one, $two){
    $val = 0;
    for ($col=1; $col < count($arr[$one]); $col++) {
        $val +=  pow($arr[$one][$col] - $arr[$two][$col], 2);                      
    }                
return sqrt($val);
}

function newRow($arr, $first, $second){
    for ($i = 1; $i < count($arr[$first]); $i++){
        if ($arr[$first][$i] > $arr[$second][$i]) {
            $arr2[$first][$i] = $arr[$second][$i];
        }
        else {
            $arr2[$first][$i] = $arr[$first][$i];
        }
    }
return $arr2[$first];
}

function deleteRows($arr, $rw){
    $new = [];
    $c = count($arr)-1;
    for ($i = 0; $i<$rw; $i++){
        for ($j = 0; $j<$rw; $j++){
            $new[$i][$j] = $arr[$i][$j];
        }
    }
    for ($i = 0; $i<$rw; $i++){
        for ($j = $rw; $j<$c; $j++){
            $new[$i][$j] = $arr[$i][$j+1];
        }
    }
    for ($i = $rw; $i<$c; $i++){
        for ($j = 0; $j<$rw; $j++){
            $new[$i][$j] = $arr[$i+1][$j];
        }
    }
    for ($i = $rw; $i<$c; $i++){
        for ($j = $rw; $j<$c; $j++){
            $new[$i][$j] = $arr[$i+1][$j+1];
        }
    }
    return $new;
}
function updateTable($arr, $first, $second) {
    $minRow = newRow($arr, $first, $second);
    // $minCol = newCol($arr, $first, $second);
    $c = count($arr);
    for($i=1; $i < $c; $i++){
        $arr[$first][$i] = $minRow[$i];
        $arr[$i][$first] = $minRow[$i];

    }
    $newName =  $arr[0][$first].','.$arr[0][$second];
    $arr[$first][0] = strval($newName);
    $arr[0][$first] = strval($newName);
    $arr = deleteRows($arr,$second);
    return $arr;
}

function findSex($mas2,$names){
    $boys = 0;
    $girls = 0;
    for ($j=0;$j<count($names);$j++){
        if ($mas2[$names[$j]][1] == 0) {
            $boys = $boys + 1;
        }
        else if ($mas2[$names[$j]][1] == 1) {
            $girls += 1;
        }
    }
        echo $girls.' женщин и '.$boys.' мужчин';

}

function avg($mas2,$names) {
    $allAge = 0;
    $allCheck = 0;
    $allVisits = 0;
    $child = 0;
    $ages = array(
        1 => 'меньше 25',
        2 => 'от 25 до 35',
        3 => 'от 35 до 45',
        4 => 'от 45 до 55',
        5 => 'от 55 до 65',
        6 => 'от 65'
    );
    $cheks = array(
        1 => 'меньше 1000',
        2 => 'от 1000 до 1500',
        3 => 'от 1500 до 2000',
        4 => 'от 2000 до 3000',
        5 => 'от 3000'
    );
    for ($j=0;$j<count($names);$j++){
        if ($mas2[$names[$j]][2] == 1) {
            $m1[1] += 1;
        } else if ($mas2[$names[$j]][2] == 2) {
            $m1[2] += 1;
        }
        else if ($mas2[$names[$j]][2] == 3) {
            $m1[3] += 1;
        }
        else if ($mas2[$names[$j]][2] == 4) {
            $m1[4] += 1;
        }
        else if ($mas2[$names[$j]][2] == 5) {
            $m1[5] += 1;
        }
        else if ($mas2[$names[$j]][2] == 6) {
            $m1[6] += 1;
        }

        if ($mas2[$names[$j]][3] == 1) {
            $m2[1] += 1;
        } else if ($mas2[$names[$j]][3] == 2) {
            $m2[2] += 1;
        }
        else if ($mas2[$names[$j]][3] == 3) {
            $m2[3] += 1;
        }
        else if ($mas2[$names[$j]][3] == 4) {
            $m2[4] += 1;
        }
        else if ($mas2[$names[$j]][3] == 5) {
            $m2[5] += 1;
        }
        

    //    $allAge += $mas2[$names[$j]][2];
    //    $allCheck += $mas2[$names[$j]][3];
       $allVisits += $mas2[$names[$j]][4];
       if ($mas2[$names[$j]][5] == 1) {
        $child += 1;
       }
    }
    $maxEl = max($m1);
    foreach($m1 as $key => $value)
        {
            if ($value == $maxEl) {
                $Elkey = $key;
            break;
            }
        }

    $maxEl2 = max($m2);
    foreach($m2 as $key => $value)
        {
            if ($value == $maxEl2) {
                $Elkey2 = $key;
            break;
            }
        }
    
    // $avgAge = $allAge / count($names);
    // $avgCheck = $allCheck / count($names);
    $avgVisits = $allVisits / count($names);
    $perChild = ($child / count($names))*100;
    echo 'Средний чек: '.$cheks[$Elkey2].'<br>';
    echo 'Средний Возраст: '.$ages[$Elkey].'<br>';
    // echo 'Средний возраст: '.round($avgAge).' лет<br>';
    // echo 'Средний чек: '.round($avgCheck,2).', рублей<br>';
    echo 'Среднее количество посещений: '.round($avgVisits).'<br>';
    echo 'В группе у '.round($perChild).' % людей есть дети';

}

function avgStr($mas3,$mas4,$link){
    for ($i=1;$i<count($mas3);$i++)
    {   if ($mas4[$i][1] == 1) {
            $mas4[$i][1] = 'Ж';
        }
        else $mas4[$i][1] = 'М';
        if ($mas4[$i][5] == 1) {
            $mas4[$i][5] = 'Есть';
        }
        else $mas4[$i][5] = 'Нет';
        $abc = $mas3[$i][0];
        $sql = mysqli_query($link,"SELECT `name` FROM user WHERE `id`= $abc");
        $name = mysqli_fetch_array($sql);
        $mas4[$i][0] = $mas3[$i][0].' - '.$name[0]; 
    }
    return $mas4;
}

function normalize($mas) {
    for ($i=1;$i<count($mas);$i++)
    {   if (($mas[$i][2]<=25)) {
            $mas[$i][2] = 1;
        } else if (($mas[$i][2] > 25)&&($mas[$i][2]<=35)){ 
            $mas[$i][2] = 2;
        } else if (($mas[$i][2] > 35)&&($mas[$i][2]<=45)) {
            $mas[$i][2] = 3;
        } else if (($mas[$i][2] > 45)&&($mas[$i][2]<=55)) {
            $mas[$i][2] = 4;
        } else if (($mas[$i][2] > 55)&&($mas[$i][2]<=65)) {
            $mas[$i][2] = 5;
        } else if ($mas[$i][2] > 65) {
            $mas[$i][2] = 6;
        }

        if ($mas[$i][3]<=1000) {
            $mas[$i][3] = 1;
        } else if (($mas[$i][3] > 1000)&&($mas[$i][3]<=1500)) {
            $mas[$i][3] = 2;
        } else if (($mas[$i][3] > 1500)&&($mas[$i][3]<=2000)) {
            $mas[$i][3] = 3;
        } else if (($mas[$i][3] > 2000)&&($mas[$i][3]<=3000)) {
            $mas[$i][3] = 4;
        }  else if ($mas[$i][3] > 3000) {
            $mas[$i][3] = 5;
        }   

    }
    return $mas;
}

function fi($mas2, $value, $mas4) {   
    ?>
    <div>
        <button type="button" id="gifsBtn" class="btn btn-outline-dark" data-toggle="collapse" data-target="#gifs2">Просмотреть данные клиентов</button>
        <div id="gifs2" class="collapse">
    <?
    echo "<table class='table table-bordered table-hover'>";
        for ($row = 0; $row < count($mas4); $row++) {
            echo "<tr>";
            for ($col=0; $col < 6; $col++) {
                if (!$mas4[$row][$col]) {
                    $mas4[$row][$col] = 0;
                }
                echo "<td>{$mas4[$row][$col]}</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
    ?>
        </div>
    </div>
    <?
        
    for ($i=0;$i<(count($mas2)-1);$i++){
        $name[$i+1] = $mas2[$i+1][0];
        $allNumberStr[$i+1] = $i+1;
    }
    if (($value <= 1) || ($value > count($mas2)-2)){
        echo 'Вы ввели некорректное количество кластеров, попробуйте еще раз';
    }
    else {
            ?>
            <div>
                <button type="button" id="gifsBtn" class="btn btn-outline-dark" data-toggle="collapse" data-target="#gifs1">Просмотреть матрицу расстояний</button>
                <div id="gifs1" class="collapse">
            <?
            $k = count($mas2) - 1 ;
            echo "Матрица расстояний:";
            echo "<table class='table table-bordered table-hover'>";
            for ($row = 0; $row < count($mas2); $row++) {
                echo "<tr>";
                for ($col=0; $col < count($mas2); $col++) {
                    if ($col == $row and ($row == 0)) {
                        $mas3[$row][$col] = '№ П/П';
                    }
                    else if (($row == 0) and ($col > 0)) {
                        $mas3[$row][$col] = $col;
                    }
                    else if (($col == 0) and ($row > 0)) {
                        $mas3[$row][$col] = $row;
                    }
                    else if (($col == $row) and ($row > 0)) { 
                        $mas3[$row][$col] = '0';
                    }
                    else {
                        $mas3[$row][$col] = Evclid($mas2, $row, $col);
                    }
                    echo "<td>{$mas3[$row][$col]}</td>";
                }
                echo "</tr>";
                }
            echo "</table>";
            ?>
                </div>
            </div>

            <div>
            <button type="button" id="gifsBtn" class="btn btn-outline-dark" data-toggle="collapse" data-target="#gifs">Просмотреть разложение на кластеры</button>
            <div id="gifs" class="collapse">
                <?
            
                do {
               $min = $mas3[1][2];
                for ($row = 1; $row < count(($mas3)); $row++) {
                    for ($col=$row+1; $col < (count($mas3[$row])); $col++) {
                        if ($min >= $mas3[$row][$col]) {
                            $min = $mas3[$row][$col];
                            $minRow = $row;
                            $minCol = $col;
                            $minRowName = $mas3[$row][0];
                            $minColName = $mas3[$col][0];
                        }
                    }
                }
                echo 'Самыми близкими объектами являются объекты под номерами: '.$minRowName.' и '.$minColName.', расстояние между ними равно '.$min;
                echo '<br/>';
                echo 'Следовательно, их можно объединить в одну группу – при формировании новой матрицы оставляем наименьшее значение.';
                $mas3 = updateTable($mas3,  $minRow, $minCol);
                echo "<table class='table table-bordered table-hover'>";
                        for ($row = 0; $row < count($mas3); $row++) {
                            echo "<tr>";
                           for ($col=0; $col < count($mas3[$row]); $col++) {
                                echo "<td>{$mas3[$row][$col]}</td>";
                            }
                            echo "</tr>";
                        }
                echo "</table>";

            } while  ((count($mas3)-1)>$value);
                ?>
                </div>
            </div>
                <?
                echo '<hr>';
                if ($value < 5) {
                    echo 'Выполнено разбиение на '.$value.' кластера';
                }
                else echo 'Выполнено разбиение на '.$value.' кластеров';
                    echo '<br/><hr>';
                    for ($i=1; $i<=$value; $i++) {
                        echo '<b> В '.$i.' - кластер входят люди с следуюшими индентификаторами: '.$mas3[0][$i].'</b><br>';
                        $names = explode(",", $mas3[0][$i]);
                        echo 'Всего в кластере '.count($names).' человек, ';
                        findSex($mas2,$names);
                        echo '<br/>';
                        avg($mas2, $names);
                          
                        echo '<br/><hr>';
                    }
        }
    }
?>