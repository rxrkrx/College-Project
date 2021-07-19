<?php
//Approve & Reject
//Example of Request: id=1&user=applicant&action=accept
include_once("../includes/config.php");
session_handle();
if(isset($_GET["id"]))
{
    if(isset($_GET["user"]))
    {
        if(isset($_GET["action"]))
        {
            if($_GET["action"] === "accept" or $_GET["action"] === "reject" )
            {
                profile_action($_GET["id"],$_GET["action"]);
                header("Location: ".$_SERVER['HTTP_REFERER']);
                exit();

            }
            
        }
    }
}
?>