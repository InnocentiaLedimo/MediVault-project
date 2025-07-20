
# MediVault

**MediVault** is a secure web-based application designed to manage and store medical records efficiently. It supports end-to-end healthcare workflows including patient registration, appointment scheduling, nurse check-ins, and doctor access — all within a clean, intuitive interface.

---


## 🔧 Technologies Used

- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP  
- **Database:** MySQL (via XAMPP & MySQL Workbench)  
- **Tools:** XAMPP, phpMyAdmin

---

## 🌟 Features

- 🗓️ **Appointment Booking**  
  - Dynamic 30-minute time slot logic per patient  
  - Conflict-free scheduling

- 👤 **Patient Registration & Login**  
  - Secure login system  
  - Personal dashboard view

- 👩‍⚕️👨‍⚕️ **Role-Based Dashboards**  
  - Separate interfaces for **Nurses** and **Doctors**  
  - Nurses check-in patients and update vitals  
  - Doctors view patient history and prescribe medication

- 📝 **Prescription System**  
  - Doctors fill prescriptions and capture e-signatures  
  - Logged in database for medical history

- ⚙️ **Real-Time Validation & Data Updates**  
  - Client-side form validation  
  - Live updates to patient records and appointment logs

---

## 📁 Project Structure

```
├── mediVault/
│   ├── index.php               # Landing/login page
│   ├── register.php            # Patient registration
│   ├── dashboard/
│   │   ├── patient.php         # Patient dashboard
│   │   ├── nurse.php           # Nurse dashboard
│   │   └── doctor.php          # Doctor dashboard
│   ├── appointments/
│   ├── prescriptions/
│   └── db/
│       └── database.sql        # MySQL schema
```

---

## 🚀 How to Run Locally

1. Clone this repo:
   ```bash
   git clone https://github.com/LesegoSenamela/MediVault.git
   ```
2. Move it to your `htdocs` directory (if using XAMPP)
   ```bash
   mv MediVault /xampp/htdocs/
   ```
3. Start Apache and MySQL in XAMPP.
4. Import the database using `phpMyAdmin`. (database setup scripts are available if you require them)
5. Visit `http://localhost/MediVault` in your browser.

---

## 🛡 Security Notes

- Input sanitization and SQL injection prevention in progress.
- Passwords are hashed before storage.
- Role-based routing prevents unauthorized access
- Data validation on both frontend and backend

---

## 📈 Future Enhancements

- Add audit trails/logging per user
- Support file upload for medical documents (e.g., lab results)
- SMS or email notifications for appointments
- Advanced encryption for sensitive fields

---

## 🧑‍💻 Author

**Innocentia Ledimo**  
University of Pretoria  
📬 For questions, collaborations, or feedback, feel free to connect with me on [LinkedIn](https://www.linkedin.com/in/innocentia-ledimo-637b9622b).
