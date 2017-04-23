<?php

    try {
        require_once 'includes/pdo-connect.php';
        
        $sql = 'SELECT name, meaning
                FROM names
                ORDER BY name';
                
        $conn->setAttribute(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL);
                
        $result = $conn->query($sql);
        
        $names = $result->fetchAll(PDO::FETCH_ASSOC);
        
        $errorInfo = $conn->errorInfo();
        
        if (isset($errorInfo[2])) {
            $error = $errorInfo[2];
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Named Parameters</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>PDO Reusing a result set</h1>

<?php if (isset($error)) {
    echo "<p>$error</p>";
} else { ?>

    <ul>
        <?php foreach($names as $name) {
            echo '<li><a href=#"' . $name['name'] . '">' . $name['name'] . '</a></li>';
        } ?>
    </ul>
    <p>More content here</p>
    <dl>
        <?php 
         reset($names);
         $row = $result->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_ABS, 0);
        
         foreach($names as $name) {
            echo '<dt id="' . $name['name'] . '">' . $name['name'] . '</dt>';
            echo '<dd>' . $name['meaning'] . '</dd>';
        } ?>
    </dl>
    <?php } ?>
  </body>
</html>