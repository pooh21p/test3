<CENTER><TEXTAREA ROWS = "8" style = "width:90%;color:green;"> 
Задание 3.
Возьмите все числа от 1 до 10000 (включительно). Выбросьте из этой последовательности все числа, где встречаются последовательности из трех последовательно восходящих цифр (например 012 или 678). Найдите сумму оставшихся чисел. 
 </TEXTAREA></CENTER> <BR> 

<?php

    $n1 = isset($_REQUEST['n1']) ? $_REQUEST['n1'] : 1;
    $n2 = isset($_REQUEST['n2']) ? $_REQUEST['n2'] : 10000;
?>
 <form method = "POST"> 
от <br><input name = "n1" type = "text" value = "<?php echo $n1; ?>"><BR> 
до <br><input name = "n2" type = "text" value = "<?php echo $n2; ?>"><BR> 
 <input type = "submit" value = "calculate"> 
 </form> 
<?php

    function has_sequence($n)
    {
        
        $c = 0;
        $val = 0;
        while ($n> 0) {
            $d = $n%10;
            $n = floor($n / 10);
            
            if ($d != $val - 1) {
                $c = 1;
            }else{
                $c ++ ;
            }
            $val = $d;
            if ($c >= 3)
                return true;
        }
        return false;
    }


    $sum = 0;
    for ($n = $n1; $n <= $n2; $n ++ ) {
        if (!has_sequence($n))
            $sum += $n;         
    }
  
echo "result = " . $sum;