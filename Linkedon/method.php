<?php
function DeleteAccount($conn,$curEmail){
    $conn->query("Delete from company where _email = '$curEmail'");
    truncateCur($conn,"current_company");
}

function truncateCur($conn,$type) {
    $conn->query("truncate table $type");
   
}
?>