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
    echo "Connected successfully";

    $sql = "SELECT product_id, product_name, product_price, product_category, product_img FROM product";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $matrix_product_data = array();
            array_push($matrix_product_data,array("product_id"=>$row["product_id"],
            "product_name"=>$row["product_name"],
            "product_price"=>$row["product_price"],
            "product_category"=>$row["product_category"],
            "product_img"=>$row["product_img"]));
            echo json_encode($matrix_product_data);
        }
      } else {
        echo "0 results";
      }
    $conn->close();
?>