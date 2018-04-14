<?php
require_once '../model/models.php';

function exQuery($_query)
{
    require_once '../ctrl/queries.php';
    return executeQuery($_query);
}

function detailItem($id)
{
    // General item data
    $query = "SELECT i.item_id, ic.cat_id, i.item_title, i.item_category, i.item_year, i.item_info 
    FROM items i INNER JOIN item_category ic ON i.item_category = ic.cat_id 
    WHERE i.item_id = $id GROUP BY 1,2,3,4,5,6;";

    $consult = exQuery($query);
    while($row = mysqli_fetch_row($consult))
    {
        switch ($row[1]) {
            case 1:
                // For movie items
                $query = "SELECT m.mov_cat FROM movies m WHERE m.mov_id = $row[0]";
                $consult_t = exQuery($query);
                // ??
                while ($row_r = mysqli_fetch_row($consult_t)) {
                    $mov_cat = $row_r[0];
                }

                $item = new Movie($row[0], $row[2], $mov_cat, $row[4], $row[5]);
                break;
        }
    }

    return $item;
}

/**
 * Esta función agrega todos los items
 * @param Object Elemento a agregar
 */
function addNewItem($item)
{
    // All items
    $query = "INSERT INTO items (item_title, item_category, item_year, item_info)
    VALUES ('$item->originalTitle', $item->itemCategory, $item->year, '$item->info'); ";

    switch ($item->itemCategory) {
        case 1:
            // Movies
            require_once '../ctrl/queries.php';
            $item->id = executeQueryReturnId($query);
            $query = "INSERT INTO movies (mov_id, mov_cat) VALUES ($item->id, $item->movieCategory); ";
            $res = exQuery($query);
            break;

        case 2:
            // TV shows
            require_once '../ctrl/queries.php';            
            $item->id = executeQueryReturnId($query);
            $query = "INSERT INTO tvshows (ts_id, ts_cat) VALUES ($item->id, $item->showCategory); ";
            $res = exQuery($query);
            break;

        case 3:
            // Songs
            require_once '../ctrl/queries.php';
            $item->id = executeQueryReturnId($query);
            $query = "INSERT INTO songs (song_id, song_artist, song_album) VALUES ($item->id, '$item->artist', '$item->album'); ";
            $res = exQuery($query);
            break;

        default:
            echo ('Error: "addNewItem"');
            break;
    }
}

function editItem($id, $item)
{
    $flag_ok = true;
    $query = "UPDATE items 
    SET item_title = '$item->originalTitle', item_category = $item->itemCategory, item_year = $item->year, item_info = '$item->info' 
    WHERE item_id = $item->id; ";
    $res = exQuery($query);

    if($res == true)
    {
        switch ($item->itemCategory) {
            case 1:
                $_id = $item->movieCategory->id;
                $query = "UPDATE movies SET mov_cat = $_id WHERE item_id = $item->id; ";
                break;

            default:
                echo ('Error: "addNewItem"');
                $flag_ok = false;
                break;
        }

        if($flag_ok == true)
        {
            $res = exQuery($query);
        }
    }
}

function deleteItem($id)
{
    $query = "DELETE FROM items WHERE item_id = $id; ";
    $res = exQuery($query);
}
?>