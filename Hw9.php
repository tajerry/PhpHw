<?php

    $arr = [];
    function createArray(){
        for($i = 0; $i < 100; $i++){
            $arr[$i] = $i;
        }
         return($arr);
    }
    $arr = createArray();
    

    function bubbleSort($array){
        for($i=0; $i<count($array); $i++){
            $count = count($array);
            for($j=$i+1; $j<$count; $j++){
               if($array[$i]<$array[$j]){
                   $temp = $array[$j];
                   $array[$j] = $array[$i];
                   $array[$i] = $temp;
               }
            }         
        }
        return $array;
    }

    $arrSort = bubbleSort($arr);
    //print_r($arrSort);
    
    function deleteFromArr($array){
         for($i=0; $i<count($array); $i++){
             if($array[$i] > 40 && $array[$i] < 60){
                 unset($array[$i]);
             }
         } return $array;
    }

    $arrSort = deleteFromArr($arr);
    print_r($arrSort);