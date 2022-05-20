<?php
    class DataBase {

            //Запрос в справочник
            public static function bookName($table, $id) {
                global $db;
                if($table AND $id){$result = mysqli_query($db, "SELECT name FROM $table WHERE id = '{$id}'");
                $row = mysqli_fetch_array($result);
                return $row['name'];}
            }
            //Свободный запрос в справочник
            public static function bookRequestData($table, $id, $name) {
                global $db;
                if($table AND $id){$result = mysqli_query($db, "SELECT * FROM $table WHERE id = '{$id}'");
                $row = mysqli_fetch_array($result);
                return $row[$name];}
            }
            
        }
?>