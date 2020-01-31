<?php
include 'db.php';
$food = $_POST['food_name'];

$sql = "SELECT * FROM nutrition WHERE name = '$food'";
$result_query = mysqli_query($link, $sql);

if (mysqli_num_rows($result_query) == 0) {
    print("No such item in database<br>\n");
}
else {
    print("Information about search item");
    echo "<table border='1'>"; //define an html table
    //<th> Defines a header cell in a table //<tr> Defines a row in a table
    //<td> Defines a cell in a table
    echo "<tr><th>Name</th><th>Fat</th><th>Carbohydrates</th><th>Sugars</th><th>Fiber</th><th>Protein</th><th>Alcohol</th></tr>";
    while($row = mysqli_fetch_row($result_query)){
    echo "<tr><td>";
    echo $row[1];
    echo "</td><td>";
    echo $row[2];
    echo "</td><td>";
    echo $row[3];
    echo "</td><td>";
    echo $row[4];
    echo "</td><td>";
    echo $row[5];
    echo "</td><td>";
    echo $row[6];
    echo "</td><td>";
    echo $row[7];
    echo "</td></tr>";
}
    echo "</table>";
}
?>
