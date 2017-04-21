<html>
    <head>
        <title>Php pdo</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
<body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

 require_once('includes/pdo-connect.php');
 include('model/person.php');
 
 $sql = 'SELECT name, meaning, gender FROM names
         ORDER BY name';
         
 $result = $conn->query($sql);
 $numrows = $result->rowCount();
 $all = $result->fetchAll(PDO::FETCH_ASSOC);
 
  $insertSql = "INSERT INTO names(name, meaning, gender) VALUES('Mikloš', 'drkoš', 'boy')";
  $res = $conn->exec($insertSql);
  $last_id = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    
 var_dump($res);
 
 $a = new Person;
 $a->set_name(444);
 echo $a->get_name();
?>
</body>
<?php echo "Total $numrows"; ?>


<table>
    <tr>
        <th>Name</th>
        <th>Meaning</th>
        <th>Gender</th>
    </tr>
    <?php 
     $rezika = $result->fetch(PDO::FETCH_ASSOC);
    
     foreach ($all as $row) { ?>
         
    
    <tr>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["meaning"]; ?></td>
        <td><?php echo $row["gender"]; ?></td>
    </tr>
    <?php } ?>
</table>
<pre>
    <?php print_r($all); ?>
</pre>

</html>