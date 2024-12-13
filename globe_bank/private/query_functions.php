<?php

function find_all_subjects(){
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY position ASC";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_subject_by_id($id) {
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id ='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; //returns an assoc. array
}

function insert_subject($menu_name, $position, $visible){
    global $db;

    $sql = "INSERT INTO subjects ";
    $sql .= "(menu_name, position, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . $menu_name . "',";
    $sql .= "'" . $position . "',";
    $sql .= "'" . $visible . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
        return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}

function find_all_pages(){
    global $db;

    $sql_page = "SELECT * FROM pages ORDER BY subject_id ASC, position ASC";
    $result_page = mysqli_query($db, $sql_page);
    confirm_result_set($result_page);
    return $result_page;
}

function find_page_by_id($id) {
    global $db;

    $sql = "SELECT * FROM pages WHERE id ='" . $id . "'";
    $result =  mysqli_query($db, $sql); 
    confirm_result_set($result);
    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page;
}

function insert_page($subject_id, $menu_name, $position, $visible, $content) {
    global $db;

    $sql = "INSERT INTO pages ";
    $sql .= "(subject_id, menu_name, position, visible, content) ";
    $sql .= "VALUES (";
    $sql .= "'" . $subject_id . "',";
    $sql .= "'" . $menu_name . "',";
    $sql .= "'" . $position . "',";
    $sql .= "'" . $visible . "',";
    $sql .= "'" . $content . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
        return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}

?>
