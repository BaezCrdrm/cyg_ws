<?php
require "../../src/php/rest/get_item_fun.php";

if(isset($_GET['id']))
{ 
    $id = $_GET['id'];
}
elseif (isset($_GET['item_id'])) {
    $id = $_GET['item_id'];
}
else { $id = null; }

$movies = get_single_item($id);
echo json_encode($movies);
unset($movies);
?>