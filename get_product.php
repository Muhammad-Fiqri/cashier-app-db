<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Credentials: true');
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cashier app db";

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully,";

    $sql = "SELECT product_id, product_name, product_price, product_category, product_img FROM product";
    $result = $conn->query($sql);

    $product_data = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($product_data,$row);
        }
        echo json_encode($product_data);
      } else {
        echo "0 results";
      }
    $conn->close();
?>