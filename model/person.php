<?php
 require_once('includes/pdo-connect.php');
 

 
class Person{
    private $name;
    private $meaning;
    private $gender;
    
    public function __construct() {
      
   }
   
   
    
   public function set_name($new_name){
        $this->name = $new_name;
    }
    
    public function get_name(){
        return $this->name;
    }
    
   public function set_meaning($new_meaning){
        $this->meaning = $new_meaning;
    }
    
   public function get_meaning(){
        return $this->$meaning;
    }
    
   public function set_gender($new_gender){
        $this->gender = $new_gender;
    }
    
   public function get_gender(){
        return $this->gender;
    }
}
?>