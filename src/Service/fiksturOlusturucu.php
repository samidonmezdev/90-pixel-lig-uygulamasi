<?php
namespace App\Service;
class fiksturOlusturucu{
    public function fiksturOLustur($array){
         //[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16]
        $fikstur=[];
        $liste=$array;
        $ilk=array_shift($array);
        for ($i=0;$i<17;$i++){
            array_push($fikstur,[$ilk,$array[0],$i+1]);
            array_push($fikstur,[$array[1],$array[16],$i+1]);
            array_push($fikstur,[$array[2],$array[15],$i+1]);
            array_push($fikstur,[$array[3],$array[14],$i+1]);
            array_push($fikstur,[$array[4],$array[13],$i+1]);
            array_push($fikstur,[$array[5],$array[12],$i+1]);
            array_push($fikstur,[$array[6],$array[11],$i+1]);
            array_push($fikstur,[$array[7],$array[10],$i+1]);
            array_push($fikstur,[$array[8],$array[9],$i+1]);
            $degis=array_pop($array);
            array_unshift($array,$degis);
        }
        $array=array_reverse($liste);
        $ilk=array_shift($array);
        for ($i=0;$i<17;$i++){
            array_push($fikstur,[$ilk,$array[0],$i+18]);
            array_push($fikstur,[$array[1],$array[16],$i+18]);
            array_push($fikstur,[$array[2],$array[15],$i+18]);
            array_push($fikstur,[$array[3],$array[14],$i+18]);
            array_push($fikstur,[$array[4],$array[13],$i+18]);
            array_push($fikstur,[$array[5],$array[12],$i+18]);
            array_push($fikstur,[$array[6],$array[11],$i+18]);
            array_push($fikstur,[$array[7],$array[10],$i+18]);
            array_push($fikstur,[$array[8],$array[9],$i+18]);
            $degis=array_pop($array);
            array_unshift($array,$degis);
        }
        return $fikstur;
    }
}
