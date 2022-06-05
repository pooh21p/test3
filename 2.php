<CENTER><TEXTAREA ROWS=8 style="width:90%;color:green;">
Задание 2
На странице https://alef.im есть какое-то количество ссылок. Анкором ссылки называется текст, находящийся между тегами <a> и </a>. Посчитайте сколько раз встречается буква "з" внутри анкоров ссылок на этой странице. Регистр буквы не учитывайте, считайте все вхождения этой буквы: как в прописном, так и строчном видах.
</TEXTAREA></CENTER> <BR> 

<?php

$text=isset($_REQUEST['text']) ? $_REQUEST['text'] : '';

if(empty($text))
    $text='з';

?>
<form method="POST">
Текст<br><input name="text" type="text" value="<?php echo $text; ?>"><BR>
<input type="submit" value="calculate">
</form>
<?php



    $t=file_get_contents('https://alef.im');
  
    $count=0;    
    $p=0;
    while(true){
        $p1=stripos($t,'<a ',$p);
        if($p1===false)
            break;
        $p=stripos($t,'</a>',$p1);
        $an=substr($t,$p1,$p-$p1);
        
        $p1=stripos($an,'>');
        $an=substr($an,$p1+1);

        $an=substr($an,$p1+1);

        $count += substr_count(mb_strtolower($an), mb_strtolower($text));
        
    }
  
echo "result=".$count;