<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form (Landscape)</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 1000px;
            width: 100%;
            box-sizing: border-box;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
            color: #333;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
        }

        .error {
            grid-column: span 3;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 4px;
        }

        button {
            grid-column: span 3;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            grid-column: span 3;
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }

        p a {
            color: #007bff;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="/signup/submit" method="POST">
        <h2>Sign Up Form</h2>
        <div class="form-grid">
            <div>
                <label for="role">Role in Organization:</label>
                <select id="role" name="role">
                    <option value="">Select Role</option>
                    <option value="Volunteer" <?= isset($input['role']) && $input['role'] === 'Volunteer' ? 'selected' : '' ?>>Volunteer</option>
                    <option value="Coordinator" <?= isset($input['role']) && $input['role'] === 'Coordinator' ? 'selected' : '' ?>>Coordinator</option>
                    <option value="Admin" <?= isset($input['role']) && $input['role'] === 'Admin' ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>
            <div>
                <label for="surname">Surname:</label>
                <input type="text" id="surname" name="surname" value="<?= htmlspecialchars($input['surname'] ?? '') ?>" required>
            </div>
            <div>
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($input['first_name'] ?? '') ?>" required>
            </div>
            <div>
                <label for="middle_name">Middle Name:</label>
                <input type="text" id="middle_name" name="middle_name" value="<?= htmlspecialchars($input['middle_name'] ?? '') ?>" placeholder="Write N/A if None">
            </div>
            <div>
                <label for="name_suffix">Name Suffix:</label>
                <input type="text" id="name_suffix" name="name_suffix" value="<?= htmlspecialchars($input['name_suffix'] ?? '') ?>" placeholder="Write N/A if None">
            </div>
            <div>
                <label for="birth_date">Birth Date:</label>
                <input type="date" id="birth_date" name="birth_date" value="<?= htmlspecialchars($input['birth_date'] ?? '') ?>" required>
            </div>
            <div>
                <label for="street_address">Address:</label>
                <input type="text" id="street_address" name="street_address" value="<?= htmlspecialchars($input['street_address'] ?? '') ?>" placeholder="Street/Unit/Bldg/Village" required>
            </div>
            <div>
                <label for="barangay">Barangay:</label>
                <select id="barangay" name="barangay" required>
                    <option value="">Select Barangay</option>
                    <option value="Barangay 177" <?= isset($input['barangay']) && $input['barangay'] === 'Barangay 177' ? 'selected' : '' ?>>Barangay 177</option>
                </select>
            </div>
            <div>
                <label for="municipality">Municipality:</label>
                <select id="municipality" name="municipality" required>
                    <option value="">Select Municipality</option>
                    <option value="Caloocan City" <?= isset($input['municipality']) && $input['municipality'] === 'Caloocan City' ? 'selected' : '' ?>>Caloocan City</option>
                </select>
            </div>

            <div>
                <label for="zip_code">Zip Code:</label>
                <input type="text" id="zip_code" name="zip_code" value="<?= htmlspecialchars($input['zip_code'] ?? '') ?>" required>
            </div>
            <div>
                <label for="precinct_number">Precinct Number:</label>
                <input type="text" id="precinct_number" name="precinct_number" value="<?= htmlspecialchars($input['precinct_number'] ?? '') ?>" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($input['email'] ?? '') ?>" required>
            </div>
            <div>
                <label for="username">Create Username:</label>
                <input type="text" id="username" name="username" value="<?= htmlspecialchars($input['username'] ?? '') ?>" required>
            </div>
            <div>
                <label for="password">Create Password:</label>
                <input type="password" id="password" name="password" value="<?= htmlspecialchars($input['password'] ?? '') ?>" required>
            </div>
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" value="<?= htmlspecialchars($input['confirm_password'] ?? '') ?>" required>
            </div>
            
            <?php if (isset($errors) && !empty($errors)): ?>
                <div class="error">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <button type="submit">Sign Up</button>
            <p>Already registered? <a href="/login">Sign in!</a></p>
        </div>
    </form>
</body>
</html>
