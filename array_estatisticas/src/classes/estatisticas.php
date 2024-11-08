<?php 

namespace array_estatisticas\src;

class Estatisticas {

    public static function max (array $array) {
        $max = $array[0];
    
        for ($i=1; $i < count($array); $i++) { 
            if ($array[$i] > $max) {
                $max = $array[$i];
            }
        }
    
        return $max;
    }
    
    // Calcular o valor mínimo
    public static function min (array $array) {
        $min = $array[0];
    
        for ($i=1; $i < count($array); $i++) { 
            if ($array[$i] < $min) {
                $min = $array[$i];
            }
        }
    
        return $min;
    }
    
    
    // Calcula a soma
    public static function sum (array $array) {
        $sum = 0;
    
        for ($i=0; $i < count($array); $i++) { 
            $sum += $array[$i];
        }
    
        return $sum;
    }

    public static function media(array $array) {
        $sum = 0;
    
        for ($i=0; $i < count($array); $i++) { 
            $sum += $array[$i];
        }

        $media = $sum / count($array);
    
        return $media;
    }

}

?>