<?php

    //$input = $_GET['inp'];
    
    $command = escapeshellcmd("C:\\Users\\ASUS\\AppData\\Local\\Programs\\Python\\Python36\\python.exe C:\\xampp\\htdocs\\foody\\query\\query2.py");
    exec($command, $output);
    //var_dump($output);
     foreach($output as $each_output){
        echo $each_output.'<br>';  
    }
   
    ?>