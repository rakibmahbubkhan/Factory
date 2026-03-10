<?php

namespace App\Helpers;

class CategoryHelper
{
    public static function getIcon($category)
    {
        $category = strtolower($category);
        
        $icons = [
            'tractor' => 'tractor',
            'harvester' => 'truck-loading',
            'planter' => 'seedling',
            'sprayer' => 'spray-can',
            'tiller' => 'screwdriver',
            'irrigation' => 'tint',
            'loader' => 'dolly',
        ];
        
        foreach ($icons as $key => $icon) {
            if (strpos($category, $key) !== false) {
                return $icon;
            }
        }
        
        return 'cog';
    }
}