<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'medivault');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Retrieve form data
$gender = $_POST['gender'];
$pastConditions = $_POST['pastConditions'];
$allergies = $_POST['allergies']; 
$familyMedicalHistory = $_POST['familyMedicalHistory'];
$BP = $_POST['BP']; 
$heartrate = $_POST['heartrate'];
$temperature = $_POST['temperature'];
$respiratoryRate = $_POST['respiratoryRate'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];


// Insert data into the database
$sql = "INSERT INTO patients ( firstName, lastName, gender, pastConditions, allergies, familyMedicalHistory, BP, heartrate, temperature , respiratoryRate)
 VALUES ('$firstName','$lastName','$gender','$pastConditions','$allergies','$familyMedicalHistory','$BP', '$heartrate', '$temperature','$respiratoryRate')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
// Close the connection
$conn->close();
?>