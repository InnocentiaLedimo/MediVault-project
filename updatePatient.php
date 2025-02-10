<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "medivault");

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
$patientID = $_POST['patientID']; 

// Update the existing data in the database
$sql = "UPDATE patients 
        SET firstName='$firstName', lastName='$lastName', gender='$gender', pastConditions='$pastConditions', 
            allergies='$allergies', familyMedicalHistory='$familyMedicalHistory', BP='$BP', 
            heartrate='$heartrate', temperature='$temperature', respiratoryRate='$respiratoryRate'
        WHERE patientID='$patientID'"; 


if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Patient info updated successfully');</script>";
} else {
    echo "<script>alert('Error updating record: " . $conn->error."');</script>";
}

// Redirect back to the appointments page
$conn->close();
?>
