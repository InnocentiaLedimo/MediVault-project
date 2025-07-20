
# MediVault

**MediVault** is a secure web-based application designed to manage and store medical records efficiently. It supports end-to-end healthcare workflows including patient registration, appointment scheduling, nurse check-ins, and doctor access — all within a clean, intuitive interface.

---

## 🌐 Live Preview

> *Currently hosted locally using XAMPP – can be deployed to any LAMP stack.*

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

## 🔐 Security Notes

- Passwords securely handled via PHP sessions
- Role-based routing prevents unauthorized access
- Data validation on both frontend and backend

---

## 🚀 Setup Instructions

1. Clone the repository or copy files into your `htdocs` folder (XAMPP):
   ```bash
   git clone https://github.com/your-username/medivault.git
   ```

2. Import `database.sql` into phpMyAdmin to create the required schema.

3. Start Apache and MySQL in XAMPP.

4. Access the app at:
   ```
   http://localhost/mediVault/
   ```

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

📬 For questions, collaborations, or feedback, feel free to connect with me on LinkedIn.
