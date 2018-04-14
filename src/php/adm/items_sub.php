<?php
if(isset($_REQUEST['action']))
{
    $action = $_REQUEST['action'];
    if(isset($_REQUEST['id']) && $action != 'new')
    {
        $id = $_REQUEST['id'];
    } else { $id = null; }
} else {
    $action = 'new';
    $id = null;
}

if($action == 'new' || $action == "modify")
{
    require_once '../model/models.php';
    $cat = $_REQUEST['category'];
    $title = $_REQUEST['title'];
    $year = $_REQUEST['year'];
    $info = $_REQUEST['info'];

    switch ($cat) {
        case 1:
            $mov_cat = $_REQUEST['mov_category'];
            $item = new Movie(
                $id,
                $title,
                $mov_cat,
                $year,
                $info
            );
            break;

        case 2:
            $tvs_cat = $_REQUEST['mov_category'];
            $item = new TVShow(
                $id,
                $title,
                $tvs_cat,
                $year,
                $info
            );
            break;

        case 3:
            $artist = $_REQUEST['song_artist'];
            $album = $_REQUEST['song_album'];
            $item = new Song(
                $id,
                $title,
                $year,
                $info,
                $artist,
                $album
            );
            break;
        
        default:
            # code...
            break;
    }
}

if(isset($item)
    || (isset($id) && ($action == "consult" || $action == "delete")))
{
    require 'items_fun.php';
    switch ($action) {
        case 'consult':
            $item = detailItem($id);
            echo json_encode($item);
            break;

        case 'new':
            addNewItem($item);
            break;

        case 'modify':
            editItem($id, $item);
            break;
        
        case 'delete':
            deleteItem($id);
            break;

        default:
            echo("Error");
            break;
    }
}
?>