<?php
/**
 * Get a single item element
 * 
 * Note: Edit so it could get any kind of item, not just movies.
 */
function get_single_item($id = null)
{
    $_reltive_root_dir = "../../";
    // Need to change in the near future
    $query = "SELECT i.item_id, i.item_title, i.item_category, i.item_year, i.item_info, 
    t.lang, t.title, m.mov_cat 
    FROM items i
    INNER JOIN movies m ON m.mov_id = i.item_id 
    LEFT JOIN titles t ON t.item_id = m.mov_id ";

    if(isset($id))
    {
        $query .= "WHERE i.item_id = $id ";
    }

    $query .= "GROUP BY 1,2,3,4,5,6,7,8;";

    require $_reltive_root_dir.'src/php/ctrl/queries.php';
    require_once $_reltive_root_dir.'src/php/model/models.php';
    $res = executeQuery($query);
    $items = array();
    $i = 0;
    while($reg = mysqli_fetch_array($res, MYSQLI_NUM))
    {
        // $reg[0], // ID
        // $reg[1], // Item title
        // $reg[2], // Item category
        // $reg[3], // Item year
        // $reg[4], // Item info
        // $reg[5], // Item title language ID
        // $reg[6], // Item translated title
        // $reg[7], // Movie cat

        // 1. Movies
        if($reg[2] == 1)
        {
            $items[$i] = new Movie(
                $reg[0], // ID
                $reg[1], // Item title
                $reg[7], // Movie cat
                $reg[3], // Item year
                $reg[4] // Item info
            );
        }
        $i++;
    }
    return $items;
}
?>