<?php

 class Car{
    
    private $car_id;
    private $make;
    private $mileage;
    private $price;
    private $description;
    private $data = array();
    
    function __construct($id){
        $this->car_id = $id;
        $this->make = "Unknown";
        $this->mileage = "Not Registered";
        $this->price = "Unknown";
        $this->description = "Unavailable";
    }
    
    public function __set($name, $value){
        $this->data[$name] = $value;
    }
    
    public function __get($name){
        if(isset($this->data[$name])){
            return $this->data[$name];
        }else{
            return false;
        }
    }
    
    public function getPrice(){
        if(is_numeric($this->price)){
            return '$ ' . number_format($this->price, 2);
        }else{
            return $this->price;
        }
    }
    
    public function __toString(){
        $output = "Car ID: " . $this->car_id . "<br>";
        $output .= "Make: " . $this->make . "<br>";
        $output .= "Mileage: " . $this->mileage . "<br>";
        $output .= "Price: " . $this->price . "<br>";
        $output .= "Description: " . $this->description . "<br>";
        return $output;
    }
}