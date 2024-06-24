<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "nafdac");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $drug_name = $_POST['drug_name'];
    $drug_number = $_POST['drug_number'];
    $manufacturer = $_POST['manufacturer'];

    $sql = "INSERT INTO drug_submissions (user_id, drug_name, drug_number, manufacturer) VALUES ('$user_id', '$drug_name', '$drug_number', '$manufacturer')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Submit a New Drug</h2>
<form method="post">
  User ID: <input type="text" name="user_id" required><br><br>
  Drug Name: <input type="text" name="drug_name" required><br><br>
  Drug Number: <input type="text" name="drug_number" required><br><br>
  Manufacturer: <input type="text" name="manufacturer" required><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
