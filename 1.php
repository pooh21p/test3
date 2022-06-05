<CENTER><TEXTAREA ROWS=8 style="width:90%;color:green;">
Задание 1
Дан массив [[399, 9160, 144, 3230, 407, 8875, 1597, 9835], [2093, 3279, 21, 9038, 918, 9238, 2592, 7467], [3531, 1597, 3225, 153, 9970, 2937, 8, 807], [7010, 662, 6005, 4181, 3, 4606, 5, 3980], [6367, 2098, 89, 13, 337, 9196, 9950, 5424], [7204, 9393, 7149, 8, 89, 6765, 8579, 55], [1597, 4360, 8625, 34, 4409, 8034, 2584, 2], [920, 3172, 2400, 2326, 3413, 4756, 6453, 8], [4914, 21, 4923, 4012, 7960, 2254, 4448, 1]]. Среди его ячеек некоторые числа являются числами Фибоначчи (числами, участвующими в последовательности Фибоначчи: 1, 1, 2, 3, 5, 8, 13, 21).
Найдите сумму чисел Фибоначчи в этом массиве.
</TEXTAREA></CENTER> <BR> 

<?php

$json=isset($_REQUEST['json']) ? $_REQUEST['json'] : '';

if(empty($json))
    $json='[[399, 9160, 144, 3230, 407, 8875, 1597, 9835], [2093, 3279, 21, 9038, 918, 9238, 2592, 7467], [3531, 1597, 3225, 153, 9970, 2937, 8, 807], [7010, 662, 6005, 4181, 3, 4606, 5, 3980], [6367, 2098, 89, 13, 337, 9196, 9950, 5424], [7204, 9393, 7149, 8, 89, 6765, 8579, 55], [1597, 4360, 8625, 34, 4409, 8034, 2584, 2], [920, 3172, 2400, 2326, 3413, 4756, 6453, 8], [4914, 21, 4923, 4012, 7960, 2254, 4448, 1]]';

?>
<form method="POST">
Массив (json)<br><TEXTAREA name="json" ROWS="8" style="width:90%;color:green;"><?php echo $json; ?></TEXTAREA><BR>
<input type="submit" value="calculate">
</form>
<?php

	function is_fib_number($n){
		global $fib;
		while($fib[count($fib)-1]<$n)
			$fib[]=$fib[count($fib)-1]+$fib[count($fib)-2];
		return in_array($n,$fib);
	}

    
    
	function process_array($numbers){
		global $fib, $sum;
        
		foreach($numbers as $number){
            if(is_int($number))
                if(is_fib_number($number))
                    $sum+=$number;
             if(is_array($number)){
                process_array($number);
             } 
        }
	}
    

    $numbers=json_decode($json);

    
	$fib=[1,1];
    $sum=0;
    
    process_array($numbers);
    
    echo "result=".$sum;
    