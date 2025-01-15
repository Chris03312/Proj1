<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column; /* Stack navbar on top */
            height: 100vh;
        }
        nav {
            background-color: #007bff;
            color: white;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between; 
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        nav .logo {
            font-size: 20px;
            font-weight: bold;
        }
        nav .welcome {
            font-size: 16px;
        }
        .container {
            display: flex;
            height: 100vh; /* Full height for the container */
            margin-top: 60px; /* Space for the navbar */
        }
        .sidebar {
            width: 250px;
            background-color: #f4f4f9;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
        }
        .sidebar a {
            text-decoration: none;
            color: #333;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #007bff;
            color: white;
        }
        .sidebar .logout {
            margin-top: auto;
            color: red;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #ffffff;
            overflow-y: auto; /* Scrollable content */
        }
        .volunteers-list table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ddd; /* Border around the table */
        }

        .volunteers-list th, .volunteers-list td {
            padding: 8px 12px;
            text-align: left;
            border: 1px solid #ddd; /* Border for each cell */
        }

        .volunteers-list th {
            background-color: #f4f4f9;
            font-weight: bold;
        }

        .volunteers-list tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .volunteers-list tr:hover {
            background-color: #f1f1f1;
        }

        label { font-weight: bold; margin-right: 10px; }
        select { padding: 5px; margin-right: 10px; }
            /* Modal background */
    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: none;
      justify-content: center;
      align-items: center;
    }

    /* Modal container */
    .modal-container {
      background: white;
      width: 400px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
      padding: 10px 15px;
      border-bottom: 1px solid #ddd;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .modal-header h3 {
      margin: 0;
    }

    .modal-header .close-btn {
      cursor: pointer;
      font-size: 18px;
      background: none;
      border: none;
    }

    .modal-body {
      padding: 15px;
    }

    .notification-item {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .notification-item img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .notification-item .content {
      flex: 1;
    }

    .notification-item .content h4 {
      margin: 0;
      font-size: 14px;
      font-weight: bold;
    }

    .notification-item .content p {
      margin: 5px 0 0;
      font-size: 12px;
      color: #666;
    }

    .notification-category {
      font-size: 14px;
      font-weight: bold;
      color: #444;
      margin-bottom: 10px;
    }
    </style>
</head>
<body>
    <nav>
        <div class="logo">Profile</div>
        <button onclick="showModal()">Show Notifications</button>
            <div class="modal-overlay" id="modalOverlay">
                <div class="modal-container">
                <div class="modal-header">
                    <h3>Notifications</h3>
                    <button class="close-btn" onclick="closeModal()">×</button>
                </div>
                <div class="modal-body">
                    <div class="notification-category">New</div>
                    <div class="notification-item">
                    <img src="https://via.placeholder.com/40" alt="User Avatar">
                    <div class="content">
                        <h4>Servify</h4>
                        <p>Congratulations! You submitted the application successfully.</p>
                    </div>
                    </div>
                    <div class="notification-item">
                    <img src="https://via.placeholder.com/40" alt="User Avatar">
                    <div class="content">
                        <h4>Shiela Galero</h4>
                        <p>Dear Mr. Sotelo, your profile information was edited successfully.</p>
                    </div>
                    </div>
                    <div class="notification-category">Earlier</div>
                    <div class="notification-item">
                    <p>No earlier notifications.</p>
                    </div>
                </div>
                </div>
                <script>
                    function showModal() {
                    document.getElementById('modalOverlay').style.display = 'flex';
                    }

                    function closeModal() {
                    document.getElementById('modalOverlay').style.display = 'none';
                    }
                </script>
            </div>
        <div class="welcome">Welcome Mr. <?php echo htmlspecialchars($username); ?></div>
    </nav>

    <div class="container">
        <div class="sidebar">
            <div>
                <a href="/dashboard">Home</a>
                <a href="/profile">Profile</a>
                <a href="#">Application</a>
                <a href="#">Contacts</a>
            </div>
            <a href="/logout" class="logout">Logout</a>
        </div>
        
        <div class="main-content">
            <h1>Dashboard Content</h1>
            <p>Welcome to your dashboard. Use the sidebar to navigate.</p>
                <form action="/profile/submit" method="POST">
                    <h2>Sign Up Form</h2>
                    <div class="form-grid">
                    <?php if (isset($_GET['update']) && $_GET['update'] === 'success'): ?>
                        <div class="alert alert-success">
                            Profile updated successfully!
                        </div>
                    <?php endif; ?>
                        <div>
                            <input type="hidden" id="registration_id" name="registration_id" value="<?= $registration_id ?? '' ?>">

                            <label for="surname">Surname:</label>
                            <input type="text" id="surname" name="surname" value="<?= $surname ?? '' ?>" disabled required>
                        </div>
                        <div>
                            <label for="first_name">First Name:</label>
                            <input type="text" id="first_name" name="first_name" value="<?= $first_name ?? '' ?>" disabled required>
                        </div>
                        <div>
                            <label for="middle_name">Middle Name:</label>
                            <input type="text" id="middle_name" name="middle_name" value="<?= $middle_name ?? '' ?>" disabled placeholder="Write N/A if None">
                        </div>
                        <div>
                            <label for="name_suffix">Name Suffix:</label>
                            <input type="text" id="name_suffix" name="name_suffix" value="<?= $name_suffix ?? '' ?>" disabled placeholder="Write N/A if None">
                        </div>
                        <div>
                            <label for="birth_date">Birth Date:</label>
                            <input type="date" id="birth_date" name="birth_date" value="<?= $birth_date ?? '' ?>" disabled required>
                        </div>
                        <div>
                            <label for="street_address">Address:</label>
                            <input type="text" id="street_address" name="street_address" value="<?= $street_address ?? '' ?>" disabled placeholder="Street/Unit/Bldg/Village" required>
                        </div>
                        <div>
                            <label for="barangay">Barangay:</label>
                            <select id="barangay" name="barangay" disabled required>
                                <option value="">Select Barangay</option>
                                <option value="Barangay 177" <?= isset($barangay) && $barangay === 'Barangay 177' ? 'selected' : '' ?>>Barangay 177</option>
                            </select>
                        </div>
                        <div>
                            <label for="municipality">Municipality:</label>
                            <select id="municipality" name="municipality" disabled required>
                                <option value="">Select Municipality</option>
                                <option value="Caloocan City" <?= isset($municipality) && $municipality === 'Caloocan City' ? 'selected' : '' ?>>Caloocan City</option>
                            </select>
                        </div>

                        <div>
                            <label for="zip_code">Zip Code:</label>
                            <input type="text" id="zip_code" name="zip_code" value="<?= $zip_code ?? '' ?>" disabled required>
                        </div>
                        <div>
                            <label for="precinct_number">Precinct Number:</label>
                            <input type="text" id="precinct_number" name="precinct_number" value="<?= $precinct_number ?? '' ?>" disabled required>
                        </div>
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?= $email ?? '' ?>" disabled required>
                        </div>
                        <div>
                            <button type="button" id="editBtn">EDIT</button>
                            <button type="submit" id="submitBtn" style="display:none;">Submit</button>
                        </div>
                        <script>
                            document.getElementById('editBtn').addEventListener('click', function() {
                            // Enable all input fields for editing
                            const inputs = document.querySelectorAll('input, select');
                            inputs.forEach(input => input.removeAttribute('disabled'));

                            // Hide the "EDIT" button and show the "Submit" button
                            document.getElementById('editBtn').style.display = 'none';
                            document.getElementById('submitBtn').style.display = 'inline';
                        });
                        </script>
                    </div>
                </form>
    </div>
</body>
</html>
