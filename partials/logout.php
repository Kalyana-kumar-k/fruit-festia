<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['Logout'])){
        session_unset();
        session_destroy();
        header("Location: index.html");
    }

}

?>