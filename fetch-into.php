<?php

    try {
        require_once 'includes/pdo-connect.php';
        require_once('model/car.php');
        
       $car_id = 10;
      
       
       $sql = 'SELECT * FROM cars
        LEFT JOIN makes USING (make_id)
        WHERE car_id = ?';
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($car_id));
        
       $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Car', array($car_id));
       $car = $stmt->fetch();
       
       echo $car;
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

?>
