<?php

function generateCategories($categories)
{
    foreach ($categories as $category) {
        echo '<li class="list-group-item d-flex justify-content-between lh-sm">
            <a href='.url('categoryEdit',$category->alias).' class="text-dark text-decoration-none">
            <h6 class="my-0">
            '.$category->name .'</h6> 
            </a>
            <span class="text-muted">'.$category->p_id.'</span>
            </li>';
        if (count($category->children) > 0) {
          echo '<span class="d-block" style="padding-left:'.$category->p_id * 10 .'px !important">';
            generateCategories($category->children);
          echo '</span>';
        }
    }
}


?>