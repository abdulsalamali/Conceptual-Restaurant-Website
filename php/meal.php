<?php 
class Meal{
    private $meal;
    
    public function getAllMeals() // Will make it return All meals as an array.
    { 
        include 'meals.php';
        $this->meal = $meals;
       return $this->meal;
    }
    public function getMealById($id)
    {
        include 'meals.php';
        $this->meal = $meals;
        $filter =array_filter($this->meal,function($storeElement) use($id){
            return $storeElement["id"]==$id;
        });
        return array_pop($filter);

        }
    
    
}



?>