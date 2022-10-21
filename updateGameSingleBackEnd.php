<?php
include('database_connection.php');
// include('function.php');
if (isset($_POST["operation"])) {
    if ($_POST["operation"] == "Update") {
        $message = "Message from Update button! ";
        echo $message;
        $image = '';
  
        $statement = $connection->prepare(
            "UPDATE gamestat 
    SET final = :final, statusID = :statusID
   WHERE gameID = :id
   "
        );
        $result = $statement->execute(
            array(
        ':final' => $_POST["final"],
        ':statusID' => $_POST["status"],
        ':id'   => $_POST["user_id"]
       )
        );
        if (!empty($result)) {
            echo 'Data Updated!';
        }
    }
}
?>