<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";



// $sql = "SELECT * FROM users";
// $result = mysqli_query($conn, $sql);


// if (mysqli_num_rows($result) > 0) {
//     // Output data of each row
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
//     }
// } else {
//     echo "0 results";
// }

// mysqli_close($conn);



// Add a new alumni
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $admNo = $_POST["adm_no"];
    $gradDate = $_POST["graduation_date"];

    $sql = "INSERT INTO alumni (name, adm_no, graduation_date) VALUES ('$name', '$admNo', '$gradDate')";

    if (mysqli_query($conn, $sql)) {
        echo "New alumni added successfully";

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// // Update an existing alumni
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
//     $id = $_POST["id"];
//     $name = $_POST["name"];
//     $admNo = $_POST["adm_no"];
//     $gradDate = $_POST["graduation_date"];

//     $sql = "UPDATE alumni SET name='$name', adm_no='$admNo', graduation_date='$gradDate' WHERE id=$id";

//     if (mysqli_query($conn, $sql)) {
//         echo "Alumni updated successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }
// }

// // Delete an alumni
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
//     $id = $_POST["id"];

//     $sql = "DELETE FROM alumni WHERE id=$id";

//     if (mysqli_query($conn, $sql)) {
//         echo "Alumni deleted successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }
// }


// Retrieve all alumni;
$alumni = "SELECT * FROM alumni";
$result = mysqli_query($conn, $alumni);

if (mysqli_num_rows($result) > 0) {
    $data = array();

    // Output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {

        $data[] = $row;
    }

    //return data as json;
    header('Content-Type: application/json');
    echo json_encode($data);
    
} else {
    echo "No alumni found";
}

// mysqli_close($conn);
?>