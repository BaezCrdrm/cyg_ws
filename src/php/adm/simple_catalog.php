<?php
if(isset($_GET['target']) && !empty($_GET['target']))
{
    $target = $_GET['target'];

    require_once '../ctrl/queries.php';
    switch($target)
    {
        case "cat":
            loadItemCategorySelectData();
            break;

        case "movcat":
            loadMovieCategorySelectData();
            break;
    }
}

function loadItemCategorySelectData()
{
    $query = "SELECT * FROM item_category";
    $consult = executeQuery($query);

    while($row = mysqli_fetch_row($consult))
    {
        echo "<option value='$row[0]'>$row[1]</option>";
    }
}

function loadMovieCategorySelectData()
{
    $query = "SELECT * FROM mov_category";
    $consult = executeQuery($query);

    while($row = mysqli_fetch_row($consult))
    {
        echo "<option value='$row[0]'>$row[1]</option>";
    }
}
?>