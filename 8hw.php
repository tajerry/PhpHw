<?php

// 1 Задание

function explorer($level = 1){
$idir = new DirectoryIterator($dir);
 
    foreach($idir as $file){
       if (!is_dir($file)){
           echo $file->__toString().'<br>';
       }
        else{
           explorer($level++); 
        }
    }
}

/*  2 Задание

    Определить сложность следующих алгоритмов:
поиск элемента массива с известным индексом - О(1)
дублирование массива через foreach - О(n)
рекурсивная функция нахождения факториала числа - O(n^2)
*/

/* 3 Задание 

 1.
 
    O(n);
    199;
    
2.

    O(n^2);
    10000;
*/

/* 4 Задание

    