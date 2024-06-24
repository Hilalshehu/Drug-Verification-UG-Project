<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "nafdac");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $submission_id = $_POST['submission_id'];
    $action = $_POST['action'];

    if ($action == 'accept') {
        // Move the drug to the `drugs` table and update the status
        $sql = "SELECT * FROM drug_submissions WHERE id = '$submission_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $drug_name = $row['drug_name'];
            $drug_number = $row['drug_number'];
            $manufacturer = $row['manufacturer'];
            $user_id = $row['user_id'];

            $insert_sql = "INSERT INTO drugs (drug_name, drug_number, manufacturer, created_by, created_at, updated_by, updated_at, status) VALUES ('$drug_name', '$drug_number', '$manufacturer', '$user_id', NOW(), '$user_id', NOW(), 'accepted')";
            if ($conn->query($insert_sql) === TRUE) {
                $update_sql = "UPDATE drug_submissions SET status = 'accepted' WHERE id = '$submission_id'";
                $conn->query($update_sql);
                echo "Drug accepted successfully";
            } else {
                echo "Error: " . $insert_sql . "<br>" . $conn->error;
            }
        }
    } elseif ($action == 'reject') {
        $update_sql = "UPDATE drug_submissions SET status = 'rejected' WHERE id = '$submission_id'";
        if ($conn->query($update_sql) === TRUE) {
            echo "Drug rejected successfully";
        } else {
            echo "Error: " . $update_sql . "<br>" . $conn->error;
        }
    }
}

$sql = "SELECT * FROM drug_submissions WHERE status = 'pending'";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Admin Review Page</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>User ID</th>
    <th>Drug Name</th>
    <th>Drug Number</th>
    <th>Manufacturer</th>
    <th>Date of Submission</th>
    <th>Action</th>
</tr>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['drug_name'] . "</td>";
        echo "<td>" . $row['drug_number'] . "</td>";
        echo "<td>" . $row['manufacturer'] . "</td>";
        echo "<td>" . $row['date_of_submission'] . "</td>";
        echo "<td>
              <form method='post'>
              <input type='hidden' name='submission_id' value='" . $row['id'] . "'>
              <input type='submit' name='action' value='accept'>
              <input type='submit' name='action' value='reject'>
              </form>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No pending submissions</td></tr>";
}
?>
</table>

</body>
</html>
