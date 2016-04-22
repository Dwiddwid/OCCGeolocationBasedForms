<?php

function insertInto($table, $columns, $values) {
    $query = "INSERT INTO `$table` VALUES (";
    for ($i = 0; $i < count($columns); $i++) {
        if ($i == 0) {
            $query .= "`$columns[$i]`";
        } else {
            $query .= ",`$columns[$i]`";
        }
    }
    $query .= ")(";
    for ($i = 0; $i < count($values); $i++) {
        if ($i == 0) {
            $query .= "\"$values[$i]\"";
        } else {
            $query .= ",\"$values[$i]\"";
        }
    }
    $query .=")";
    $result = mysql_query($query);
    print("Result of insert: $result");  // True if successful
    if (!$result) {
        die("Couldn't query database: " . mysql_error());
    }
}

function selectFrom($field, $table) {
    return "SELECT $field FROM `$table`;";
}

function deleteFrom($table, $field, $value) {
    return "DELETE FROM $table WHERE $field='$value';";
}
?>
