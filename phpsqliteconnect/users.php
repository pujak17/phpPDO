<?php

// require 'vendor/autoload.php';
use App\Config;
require 'vendor/autoload.php';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // enable PDO errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   // fetch associative arrays by default
    PDO::ATTR_EMULATE_PREPARES => false,                // Use native prepared statements
];
//  
// use App\SQLiteConnection;
// $pdo = (new SQLiteConnection())->connect();
// if ($pdo != null)
//     echo 'Connected to the SQLite database successfully!';
// else
//     echo 'Whoops, could not connect to the SQLite database!';
//     // handle the exception here  








function allusers() {
    $pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
    $id = $_GET['id'] ? $_GET['id'] : "";
    if($id) {
        $statement = $pdo->query("SELECT * FROM users WHERE ID = $id");
        $rows = json_encode($statement->fetchAll(PDO::FETCH_ASSOC));
        return  $rows;
    } else{
        $statement = $pdo->query("SELECT * FROM users");
    $rows = json_encode($statement->fetchAll(PDO::FETCH_ASSOC));
    return  $rows;
            
    }
}

print allusers();
// class index {

//     function openDb() {    
//         try {
//             $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
//         } catch (PDOException $e) {
//             die("error, please try again");
//         }        
//        echo("successfullyconnected");
//     }

//     function getAllData($qty) {
//         //prepared query to prevent SQL injections
//         $query = "select * from TABLE where qty = ?";
//         $stmt = $this->openDb()->prepare($query);
//         $stmt->bindValue(1, $qty, PDO::PARAM_INT);
//         $stmt->execute();
//         $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         return $rows;
//     }   


// }?>

<!-- <html>
   <body>
   
      <form action = "<?php $_PHP_SELF ?>" method = "GET">
         id: <input type = "number" name = "id" />
         <input type = "submit" />
      </form>
      
   </body>
</html> -->