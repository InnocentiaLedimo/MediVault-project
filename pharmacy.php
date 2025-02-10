<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'pharmacy') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="MediVault.png" type="image/x-icon">    
</head>
<body>
    <section style="display: flex;">
        <div class="side-bar">
            <div id="pharmacist-info">
                <img src="icon.png" alt="Profile Picture">
                <h2>Pharmacist Information</h2>
                <p id="name">John Doe</p>
                <p id="email">john.doe@example.com</p>
                <button class="sign-out">Log out</button>
                <div class="solid-line"></div>
            </div>
            <nav>
                <a href="#" data-content="dashboard" class="active"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                <a href="#" data-content="medication-list"><i class="fas fa-pills"></i>Medication List</a>
                <a href="#" data-content="medication-availability"><i class="fas fa-check-circle"></i>Check Availability</a>
                <a href="#" data-content="provide-medication"><i class="fas fa-hand-holding-medical"></i>Provide Medication</a>
                <a href="#" data-content="settings"><i class="fas fa-cogs"></i>Settings</a>
            </nav>
        </div>
        <div class="main-content">
            <header>
            </header>
    
            <div id="dashboard" class="content-section active">
                <h1>Welcome to the Pharmacy Dashboard</h1>
                <p>Here you can manage medication and patient interactions.</p>
                <div class="dashboard-metrics">
                    <div class="metric" id="medication-count">
                        <h2>Medications</h2>
                        <p>0</p>
                    </div>
                    <div class="metric" id="medication-provided-count">
                        <h2>Medications Provided</h2>
                        <p>0</p>
                    </div>
                </div>
            </div>
    
            <div id="medication-list" class="content-section">
                <h1>Medication List</h1>
                <p>View and manage medication list here.</p>
                <section>
                    <form id="medication-form">
                        <h2>Add Medication</h2>
                        <div class="input-group-book">
                            <label for="medication-name">Medication Name</label>
                            <input type="text" id="medication-name" name="medicationName" required>
                        </div>
                        <div class="input-group-book">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" required>
                        </div>
                        <button type="submit">Add Medication</button>
                    </form>
                    <h2>Current Medication List</h2>
                    <ul id="medicationList"></ul>
                </section>
            </div>
    
            <div id="medication-availability" class="content-section">
                <h1>Check Medication Availability</h1>
                <p>Check if medication is available.</p>
                <section>
                    <form id="availability-form">
                        <div class="input-group-book">
                            <label for="check-medication-name">Medication Name</label>
                            <input type="text" id="check-medication-name" name="checkMedicationName" required>
                        </div>
                        <button type="submit">Check Availability</button>
                    </form>
                    <div id="availability-result"></div>
                </section>
            </div>
    
            <div id="provide-medication" class="content-section">
                <h1>Provide Medication</h1>
                <p>Provide medication to patients here.</p>
                <section>
                    <form id="provide-form">
                        <div class="input-group-book">
                            <label for="provide-medication-name">Medication Name</label>
                            <input type="text" id="provide-medication-name" name="provideMedicationName" required>
                        </div>
                        <div class="input-group-book">
                            <label for="quantity-provide">Quantity</label>
                            <input type="number" id="quantity-provide" name="quantityProvide" required>
                        </div>
                        <button type="submit">Provide Medication</button>
                    </form>
                    <div id="provide-result"></div>
                </section>
            </div>
    
            <div id="settings" class="content-section">
                <h1>Settings</h1>
                <p>Adjust your preferences here.</p>
            </div>
        </div>
    </section>
<footer>
    <p>&copy; 2024 MediVault. All rights reserved.</p>
</footer>
<script>
        

         // Medication list
    let medicationList = [];

// Event listeners for navigation
const navLinks = document.querySelectorAll('.side-bar nav a');
const contentSections = document.querySelectorAll('.content-section');

navLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();

        navLinks.forEach(link => link.classList.remove('active'));
        this.classList.add('active');

        const contentId = this.getAttribute('data-content');
        contentSections.forEach(section => {
            section.classList.remove('active');
            if (section.id === contentId) {
                section.classList.add('active');
            }
        });
    });
});

// Function to update the medication list UI
function updateMedicationList() {
    const medicationListElement = document.getElementById('medicationList');
    medicationListElement.innerHTML = '';

    medicationList.forEach(med => {
        const li = document.createElement('li');
        li.textContent = `${med.name} (Quantity: ${med.quantity})`;
        medicationListElement.appendChild(li);
    });

    // Update medication count
    document.getElementById('medication-count').querySelector('p').textContent = medicationList.length;
}

// Event listener for adding medication
document.getElementById('medication-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.getElementById('medication-name').value;
    const quantity = parseInt(document.getElementById('quantity').value);

    medicationList.push({ name, quantity });
    updateMedicationList();
    this.reset();
});

// Event listener for checking medication availability
document.getElementById('availability-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const checkName = document.getElementById('check-medication-name').value;
    const resultElement = document.getElementById('availability-result');

    const medication = medicationList.find(med => med.name.toLowerCase() === checkName.toLowerCase());
    if (medication) {
        resultElement.textContent = `${medication.name} is available with quantity ${medication.quantity}.`;
    } else {
        resultElement.textContent = `${checkName} is not available.`;
    }
});

// Event listener for providing medication
document.getElementById('provide-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const provideName = document.getElementById('provide-medication-name').value;
    const provideQuantity = parseInt(document.getElementById('quantity-provide').value);
    const resultElement = document.getElementById('provide-result');

    const medication = medicationList.find(med => med.name.toLowerCase() === provideName.toLowerCase());
    if (medication) {
        if (medication.quantity >= provideQuantity) {
            medication.quantity -= provideQuantity;
            updateMedicationList();
            resultElement.textContent = `${provideQuantity} units of ${provideName} have been provided.`;
        } else {
            resultElement.textContent = `Not enough quantity available for ${provideName}.`;
        }
    } else {
        resultElement.textContent = `${provideName} is not available.`;
    }
});

</script>
</body>
</html>