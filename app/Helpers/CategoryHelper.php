<?php

use App\Models\Category;
use App\Models\Subcategory;

if (!function_exists(function: 'getCategories')) {
    function getCategories()
    {
        return Category::with('subcategories')->where('status', 'active')->latest()->get();
    }
}

if (!function_exists(function: 'getSubCategories')) {
    function getSubCategories()
    {
        return Subcategory::where('status', 'active')->latest()->get();
    }
}
