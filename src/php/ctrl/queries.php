<?php
function executeQuery($query)
{
    require "connection.php";

    $result = mysqli_query($ser_con, $query);
    return $result;
}

function executeQueryReturnId($query)
{
    require "connection.php";

    mysqli_query($ser_con, $query);
    return mysqli_insert_id($ser_con);
}
?>