<?php
#require 'connection.php';
#$conn    = Connect();
$connect = mysqli_connect("rileyghost.com", "your username", "add your pass", "regform_db");

$form_data = json_decode(file_get_contents("php://input"));
$data = array();
$error = array();

if(empty($form_data->first_name))
{
    $error["first_name"] = "First Name is required";
}
if(empty($form_data->last_name))
{
    $error["last_name"] = "Last Name is required";
}
if(empty($form_data->dob))
{
    $error["dob"] = "birthday is required";
}
if(empty($form_data->age))
{
    $error["age"] = "Age is required";
}
if(empty($form_data->city))
{
    $error["city"] = "City is required";
}
if(empty($form_data->email))
{
    $error["email"] = "email address is required";
}
if(empty($form_data->phone))
{
    $error["phone"] = "Phone number is required";
}
if(empty($form_data->pass))
{
    $error["pass"] = " A Password is required";
}
if(!empty($error))
{
    $data["error"] = $error;
}
else
{
    $fname = mysqli_real_escape_string($connect, $form_data->first_name);
    $lname = mysqli_real_escape_string($connect, $form_data->last_name);
    $dob = mysqli_real_escape_string($connect, $form_data->dob);
    $age = mysqli_real_escape_string($connect, $form_data->age);
    $city = mysqli_real_escape_string($connect, $form_data->city);
    $email = mysqli_real_escape_string($connect,$form_data->email);
    $phone = mysqli_real_escape_string($connect,$form_data->phone);
    $pass = mysqli_real_escape_string($connect, $form_data->pass);

    $query = "
  INSERT INTO user(fname, lname, dob, age, city, email, phone, pass) VALUES ('$fname', '$lname','$dob','$age','$city','$email','$phone','$pass')
 ";
    if(mysqli_query($connect, $query)) {
        $data["message"] = "Successful";
    }

}
echo json_encode($data);
?>