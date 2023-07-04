<?php



function test_input($data) {
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  
?>