<?php




$host = "localhost"; //  Server Name Of Host Location Where Your Database You Can Use Ip Address Like 127.0.0.1  .
$db = "test"; // Put Here Your Database Name Where You Store And Receive Information .
$user = "root"; //Your Server Login User Name
$pass = "usbw"; // Server Login Password by Default "" for Local Pc
$charset = "utf8mb4";// Which Unicode Use To Received And Store Data Opreation utf8mb4m give More Freture than utf8
$port = 3306; //port number of server

$options = [

    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => FALSE,
    PDO::ATTR_PERSISTENT         => true,
];

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;$port";

try {
    $pdo = new PDO($dsn,$user,$pass,$options);
}

catch (PDOEXCEPTION $e){
 $e->getMessage();
}

$id = $_POST['id'];

$sql = " SELECT * FROM user where id =:id ";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id",$id,PDO::PARAM_STR,89);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// $row = array();
// $row['name']= "ashik";
// $row ['email'] = "ashik.mou.908@gmail.com";
echo json_encode($row);