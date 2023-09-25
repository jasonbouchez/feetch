<?php
 $host = "localhost";
 $dbname = "fetch";
 $username = "root";
 $password = "";

 $dbConnect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

 $sql = "SELECT * FROM name";
 $stmt = $dbConnect ->query($sql);
 $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);