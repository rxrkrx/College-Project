<?php
include("../includes/config.php");
$student = view_count(7);
$teacher = view_count(5);
$courses = view_count(6);
$data = array("student"=>$student, "teacher"=>$teacher, "courses"=> $courses);

//$headers = getallheaders();
header('Content-Type: application/json');
/*
if(isset($headers["Token"]))
{
    $value = $headers["Token"];
    if($value == "dhirajisdev")
    {
        echo json_encode($data);
    }
    else
    {
        echo '{"error": "Invalid Auth Token"}';
    }
}
else
{
    echo '{"error": "Auth Header Missing"}';
}
*/
echo json_encode($data);
?>