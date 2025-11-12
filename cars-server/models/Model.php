<?php
abstract class Model{

    protected static string $table;
   

    public static function find(mysqli $connection, string $id, string $primary_key = "id"){
        $sql = sprintf("SELECT * from %s WHERE %s = ?",
                       static::$table,
                       $primary_key);
                     
        $query = $connection->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();               

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }

    public static function findAll(mysqli $connection) {
        $sql = sprintf("SELECT * FROM %s", static::$table);
    
        $query = $connection->prepare($sql);
        $query->execute();                 
        $result = $query->get_result();    
    
        $rows = [];
        while ($data = $result->fetch_assoc()) {
            $rows[] = new static($data);  
        }
    
        return $rows;
    }

    function get_values_type($value) {
    if (is_int($value)) return 'i';
    if (is_float($value)) return 'd';
    if (is_string($value)) return 's';
    if (is_null($value)) return 's'; 
    return 's'; 
   }


    public function create($table, $data,mysqli $connection) {

        $columns = implode(', ', array_keys($data));

        $placeholders = implode (',' ,array_fill(0, count($data),?));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $result = $connection->prepare($sql);
        
        foreach($data as $value){
            $res =get_values_type($value);
            $value_type.=$res;
        }

         $result ->bind_param($value_type,array_value($data));
        return $result->execute();

    }


}
?>
