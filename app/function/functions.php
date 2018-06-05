<?php
    function subMenu($data,$id){
        foreach($data as $item){
            if($item['id']==$id){
                echo '<li><a href="#">'.$item['name'].'</a>';
                subMenu($data,$item['id']);
                echo '</li>';
            }
        }
    }
?>