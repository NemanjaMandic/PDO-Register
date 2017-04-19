<html><body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

 require_once('includes/pdo-connect.php');
 
 $sql = 'SELECT name, meaning, gender FROM names
         ORDER BY name';

?>
</body>
<table>
    <tr>
        <th>Name</th>
        <th>Meaning</th>
        <th>Gender</th>
    </tr>
    <?php 
     $result = $conn->query($sql);
     while($row = $result->fetch_assoc()){
         echo "<tr><td>". $row["name"] . "</td><td>" . $row["meaning"] . "</td><td>" . $row["gender"] . "</td></tr>";
     }
    ?>
    <tr>
        <td></td>
    </tr>
</table>
</html>