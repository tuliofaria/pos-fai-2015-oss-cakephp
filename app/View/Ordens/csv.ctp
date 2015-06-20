<?
//for($i=0; $i<200000; $i++){
    foreach($ordens as $o){
        echo $o["Ordem"]["id"].",".$o["Ordem"]["valor"]."\n";
    }
//}