<?php
include 'db.php';

// Get search term 
$searchTerm = $_GET['term'];
//$query = mysqli_query($db,"SELECT id,name FROM food WHERE name LIKE '%".$searchTerm."%' ORDER BY name ASC");
$query = $link->query("SELECT id,name FROM food WHERE name LIKE '%".$searchTerm."%' "); 
//$sql = "SELECT name FROM food WHERE name = '$food'";
//$result_query = mysqli_query($link, $sql);

// Generate array with skills data 
$names = array();
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $data['id'] = $row['id']; 
        $data['value'] = $row['name']; 
        array_push($names, $data); 
    } 
} 
 
// Return results as json encoded array 
echo json_encode($names); 
?>