<?php

namespace App\Helpers;

class Helper {
    
    public static function getCategories($categories, $userCategories = [], $count = 0, $exclude = false)
    {
        // Condition for create page
        if($userCategories == null) {
            foreach ($categories as $category) {
                echo '<option value="'.$category->id.'">'.str_repeat('&nbsp;&nbsp;', $count) . ' ' . $category->name . '</option>';
                if (count($category->children) > 0) 
                    Helper::getCategories($category->children, $userCategories, $count + 1, $exclude);
            }
        } 
        // Condition for edit and show page
        else {
            foreach ($categories as $category) {
                $selected = '';
                
                if($category->id == ($userCategories->parent_id ?? $userCategories)){
                    $selected = 'selected';
                }
                if ($category->id !== ($userCategories->id ?? $userCategories) || $exclude)
                    echo '<option value="'.$category->id.'" '.$selected.'>'.str_repeat('&nbsp;&nbsp;', $count) . ' ' . $category->name . '</option>';
            
                if (count($category->children) > 0 && ($category->id !== ($userCategories->id ?? $userCategories) || $exclude))
                    Helper::getCategories($category->children, $userCategories, $count + 1, $exclude);
            }
        }
    }
}