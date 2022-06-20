<?php

function showCate($data, $parent = 0, $str = '', $select = 2){
    foreach ($data as $val){
        $id = $val->id;
        $name = $val->cate_name;
        if ($val->parent_id == $parent){
           if($select != -1 && $id == $select){
               echo "<option value='$id' selected='selected'>$str $name</option>";
           }
           else{
               if ($parent == 0){
                   echo "<option value='$id'>".$str ."". $name."</option>";
               }
               else{
                   echo "<option value='$id'>".$str ."=> ". $name."</option>";
               }
           }
            showCate($data, $id, $str .'&nbsp;&nbsp;&nbsp;', $select);
        }
    }
}

function showNav($data, $parent = 0, $str = ''){
    foreach ($data as $val){
        $id = $val->id;
        $name = $val->cate_name;
        if ($val->parent_id == $parent){
            if (Request::url() == route('show.cates', ['id' => $val->cate_slug])){
                echo '<li><a class="actives dropdown-item" href="'.route('show.cates', ['id' => $val->cate_slug]).'">' . $str .'<i class="fas fa-angle-right"></i> &nbsp;&nbsp;'.$name . '</a>';
            }
            else{
                echo '<li><a class="dropdown-item" href="'.route('show.cates', ['id' => $val->cate_slug]).'">' . $str .'<i class="fas fa-angle-right"></i> &nbsp;&nbsp;'.$name . '</a>';
            }
            echo '<ul class="sub-nav-menu">';
            showNav($data, $id, $str .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
            echo '</ul>';
            echo '</li>';
        }
    }
}

?>


