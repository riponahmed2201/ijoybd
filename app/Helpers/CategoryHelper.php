<?php

use App\Models\Category;

if (!function_exists(function: 'getCategories')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function getCategories()
    {
        return Category::with('subcategories')->latest()->get();
    }
}
