<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    color: #444; /* Set text color to a darker shade */
    background-color: #ffffff; /* Light background */
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
        <div class="logo">MyDashboard</div>

        <button onclick="showModal()">Show Notifications</button>
            <div class="modal-overlay" id="modalOverlay">
            <div class="modal-container">
                <div class="modal-header">
                    <h3>Notifications</h3>
                    <button class="close-btn" onclick="closeModal()">×</button>
                </div>
                <div class="modal-body">
                    <!-- New Notifications -->
                    <?php if (!empty($newNotifications)): ?>
                        <div class="notification-category">New</div>
                        <?php foreach ($newNotifications as $notification): ?>
                            <div class="notification-item">
                                <img src="https://via.placeholder.com/40" alt="User Avatar">
                                <div class="content">
                                    <h4><?= htmlspecialchars($notification['from']) ?></h4>
                                    <p><?= htmlspecialchars($notification['message']) ?></p>
                                    <small><?= htmlspecialchars($notification['date_sent']) ?> <?= htmlspecialchars($notification['time_sent']) ?></small>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="notification-category">New</div>
                        <div class="notification-item">
                            <p>No new notifications.</p>
                        </div>
                    <?php endif; ?>

                    <!-- Earlier Notifications -->
                    <div class="notification-category">Earlier</div>
                    <?php if (!empty($earlierNotifications)): ?>
                        <?php foreach ($earlierNotifications as $notification): ?>
                            <div class="notification-item">
                                <img src="https://via.placeholder.com/40" alt="User Avatar">
                                <div class="content">
                                    <h4><?= htmlspecialchars($notification['from']) ?></h4>
                                    <p><?= htmlspecialchars($notification['message']) ?></p>
                                    <small><?= htmlspecialchars($notification['date_sent']) ?> <?= htmlspecialchars($notification['time_sent']) ?></small>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="notification-item">
                            <p>No earlier notifications.</p>
                        </div>
                    <?php endif; ?>
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
        
            <script>
                function fetchParishes(city) {
                    const parishDropdown = document.getElementById('parish');
                    parishDropdown.innerHTML = '<option value="">-- Select Parish --</option>';

                    if (city) {
                        fetch(`/parishes?city=${encodeURIComponent(city)}`)
                            .then(response => response.json())
                            .then(data => {
                                for (const parish of data) {
                                    const option = document.createElement('option');
                                    option.value = parish.id;
                                    option.textContent = parish.PARISH_NAME;
                                    parishDropdown.appendChild(option);
                                }
                            })
                            .catch(error => console.error('Error fetching parishes:', error));
                    }
                }
            </script>
            <div>
                <label for="city">Select City:</label>
                <select id="city" onchange="fetchParishes(this.value)">
                    <option value="">-- Select City --</option>
                    <?php foreach ($cities as $city): ?>
                        <option value="<?php echo htmlspecialchars($city); ?>">
                            <?php echo htmlspecialchars($city); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <br>
                <label for="parish">Select Parish:</label>
                <select id="parish">
                    <option value="">-- Select Parish --</option>
                </select>
            </div><br>

            <h1>Volunteers List</h1>

            <form method="GET" action="/dashboard">
                <input type="text" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>" />
                <button type="submit">Search</button>
            </form>
            <table border="1">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Parish</th>
                        <th>Volunteers ID</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($volunteers)) : ?>
                        <tr>
                            <td colspan="5">No volunteers found.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($volunteers as $volunteer) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($volunteer['FIRST_NAME']); ?></td>
                                <td><?php echo htmlspecialchars($volunteer['LAST_NAME']); ?></td>
                                <td><?php echo htmlspecialchars($volunteer['ASSIGNED_PARISH']); ?></td>
                                <td><?php echo htmlspecialchars($volunteer['VOLUNTEERS_ID']); ?></td>
                                <td><?php echo htmlspecialchars($volunteer['STATUS']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</body>
</html>
