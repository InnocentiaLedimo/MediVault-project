<?php
// Connect to the database
$connection = new mysqli("localhost", "root", "", "medivault");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if 'id' is provided and sanitize it
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];  // Cast to integer to prevent SQL injection
} else {
    echo "Error: No ID provided.";
    exit();
}

// Fetch the specific record using a prepared statement to avoid SQL injection
$stmt = $connection->prepare("SELECT * FROM patients WHERE patientID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Error: Patient not found.";
    exit();
}
$stmt->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Patient</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="icon" href="MediVault.png" type="image/x-icon">
    </head>
    <body>
    <div class="register-patient-container">
        <form class="register-patient-form" action="updatePatient.php" method="POST">
            <h2>Edit Patient Details</h2>
            <input type="hidden" name="patientID" value="<?php echo htmlspecialchars($row['patientID']); ?>" />

            <div class="input-group-book">
                <label for="patientFirstName">First Name</label>
                <input type="text" id="patientFirstName" name="firstName" value="<?php echo htmlspecialchars($row['firstName']); ?>" >
            </div>  
            <div class="input-group-book">
                <label for="patientLastName">Last Name</label>
                <input type="text" id="patientLastName" name="lastName" value="<?php echo htmlspecialchars($row['lastName']); ?>" >
            </div>

            <fieldset>
                <legend> Gender</legend>
                <label><input type="radio" name="gender" value="m" <?php if ($row['gender'] == 'm') echo 'checked'; ?> required> Male</label> <br>
                <label><input type="radio" name="gender" value="f" <?php if ($row['gender'] == 'f') echo 'checked'; ?>> Female</label>
            </fieldset>
            
            <div class="input-group-book">
                <label for="pastConditions">Past Conditions</label>
                <input type="text" id="pastConditions" name="pastConditions" value="<?php echo htmlspecialchars($row['pastConditions']); ?>" >
            </div>
            <div class="input-group-book">
                <label for="allergies">Allergies</label>
                <input type="text" id="allergies" name="allergies" value="<?php echo htmlspecialchars($row['allergies']); ?>" >
            </div>
            <div class="input-group-book">
                <label for="familyMedicalHistory">Family Medical History</label>
                <input type="text" id="familyMedicalHistory" name="familyMedicalHistory" value="<?php echo htmlspecialchars($row['familyMedicalHistory']); ?>" >
            </div>
            <div class="input-group-book">
                <label for="BP">BP</label>
                <input type="text" id="BP" name="BP" value="<?php echo htmlspecialchars($row['BP']); ?>" >
            </div>
            <div class="input-group-book">
                <label for="heartrate">Heartrate</label>
                <input type="text" id="heartrate" name="heartrate" value="<?php echo htmlspecialchars($row['heartrate']); ?>" >
            </div>
            <div class="input-group-book">
                <label for="temperature">Temperature</label>
                <input type="text" id="temperature" name="temperature" value="<?php echo htmlspecialchars($row['temperature']); ?>" >
            </div>
            <div class="input-group-book">
                <label for="respiratoryRate">Respiratory Rate</label>
                <input type="text" id="respiratoryRate" name="respiratoryRate" value="<?php echo htmlspecialchars($row['respiratoryRate']); ?>" >
            </div>

            <button type="submit">Update Patient</button>
        </form>
    </div>
</body>
</html>
