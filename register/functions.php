<?php 
function calculateAge($dob) {
    $currentYear = date("Y");
    $birthYear = date("Y", strtotime($dob));
    return $currentYear - $birthYear;
}

function calculateExp($exp) {
    $currentYear = date("Y");
    $startYear = date("Y", strtotime($exp));
    return $currentYear - $startYear;
  }

  
?>