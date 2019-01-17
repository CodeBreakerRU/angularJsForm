<?php
$connect = new PDO("mysql:host=rileyghost.com;dbname=regform_db", "username", "dbpass");

$form_data = json_decode(file_get_contents("php://input"));

$query = '';
$data = array();

if(isset($form_data->search_query))
{
    $search_query = $form_data->search_query;
    $query = "
 SELECT * FROM user 
 WHERE (user_id LIKE '%$search_query%' OR fname LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR dob LIKE '%$search_query%' OR age LIKE '%$search_query%' OR city LIKE '%$search_query%' OR email LIKE '%$search_query%' OR phone LIKE '%$search_query%')";

}
else
{
    $query = "SELECT user_id, fname, lname, dob, age, city, email ,phone FROM user ORDER BY user_id DESC";
}

$statement = $connect->prepare($query);

if($statement->execute())
{
    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}

?>
