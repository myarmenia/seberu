<?php
use App\Models\Category;

    function Category() {
        $cat= Category::where('parent_id',NULL)->get();
        return $cat;
    }
?>
