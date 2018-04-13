<?php

function get_event_list(){
    include "../connection.php";

    try{
        return $reponse = $connection->query("SELECT * FROM books");
    } catch(PDOException $e){
       echo "Error : ". $e->getMessage();
       return false; 
    }
}

function get_event($id){
    include "../connection.php";

    try{
        $sql= "SELECT * FROM books WHERE owner_id= ?";
        $result=$connection->prepare($sql);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
    }
    catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
    return $result->fetch();
}

function add_event($name, $date, $description, $image, $id=null){
    include "../connection.php";

    if($id){
        $sql = "UPDATE books SET name = ?, date = ?, description = ?, image = ? WHERE owner_id = ?";
    } else {
        $sql = "INSERT INTO books (name, date, description, image) VALUE(?, ?, ?, ?)";
    }

    try{
        $result= $connection->prepare($sql);
        $result->bindValue(1, $name, PDO::PARAM_STR);
        $result->bindValue(2, $date, PDO::PARAM_STR);
        $result->bindValue(3, $description, PDO::PARAM_STR);
        $result->bindValue(4, $image, PDO::PARAM_STR);
        if($id){
            $result->bindValue(5, $id,PDO::PARAM_INT);
        }
        $result->execute();
    } catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
    return true;
}

function delete_event($id){
    include "../connection.php";

    $sql="DELETE FROM books WHERE owner_id= ?";

    try{
        $result=$connection->prepare($sql);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
    }
    catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
    return true;
}
?>