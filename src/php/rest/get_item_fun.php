<?php
/**
 * Get a single item element
 * 
 * Note: Edit so it could get any kind of item, not just movies.
 */
function get_single_item($id = null)
{
    $query = "SELECT m.mov_id, i.item_title, t.lang, t.title, m.mov_cat, i.item_year, i.item_info 
    FROM movies m
    LEFT JOIN titles t ON m.mov_id = t.item_id
    INNER JOIN items i ON m.mov_id = i.item_id ";

    if(isset($id))
    {
        $query .= "WHERE i.item_id = $id ";
    }

    $query .= "GROUP BY 1,2,3,4,5,6,7";

    require '../../src/php/ctrl/queries.php';
    $res = executeQuery($query);
    $movies = array();
    $i = 0;
    while($reg = mysqli_fetch_array($res, MYSQLI_NUM))
    {
        $movies[$i] = array(
            'item_id' => $reg[0],
            'item_title' => $reg[1],
            'lang' => $reg[2],
            'title' => $reg[3],
            'mov_cat' => $reg[4],
            'item_year' => $reg[5],
            'item_info' => $reg[6]
        );
        $i++;
    }
    return $movies;
}
?>