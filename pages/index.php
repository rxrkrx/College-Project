<?php
session_start();
if(isset($_SESSION["student_id"]) || isset($_SESSION["id"]) || isset($_SESSION["teacher_id"]))
{
    
    header("Location: dashboard.php");
}
else
{
    header("Location: login.php");   
}
exit();