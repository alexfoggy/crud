<?php

function generateCategories($categories)
{
    foreach ($categories as $category) {
        echo '<li class="list-group-item d-flex justify-content-between lh-sm">
            <a href='.url('categoryEdit',$category->alias).' class="text-dark text-decoration-none">
            <h6 class="my-0">
            '.$category->name .'</h6> 
            </a>
                </li>';
        if (count($category->children) > 0) {
          echo '<span class="d-block" style="padding-left:20px !important;border-left:1px #ddd solid">';
            generateCategories($category->children);
          echo '</span>';
        }
    }
}


?>