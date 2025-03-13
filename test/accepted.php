<?php
include('connection.php');
include('sample.php');
require 'checker.php';
requireLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #ecf0f1;
        }

        .sidebar {
            width: 260px;
            background: #2c3e50;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 12px;
            margin: 10px 0;
            background: #34495e;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .sidebar ul li:hover {
            background: #1abc9c;
        }

        .main-content {
            margin-left: 280px;
            padding: 20px;
            width: calc(100% - 280px);
            overflow-y: auto;
            height: 100vh;
        }

        .dashboard {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            align-items: center;
            flex-wrap: wrap;
        }

        .dashboard-card {
            flex: 1;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            min-width: 200px;
        }

        .date-filter {
            display: flex;
            gap: 10px;
            align-items: center;
            background: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .table-container {
            margin-top: 20px;
            max-height: 400px;
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background: #34495e;
            color: white;
            position: sticky;
            top: 0;
        }

        .action-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .accept {
            background: #2ecc71;
            color: white;
        }

        .decline {
            background: #e74c3c;
            color: white;
        }

        .action-btn:hover {
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            .dashboard {
                flex-direction: column;
            }
            .sidebar {
                width: 220px;
            }
            .main-content {
                margin-left: 240px;
            }
        }
        a{
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
        <?php
        $logout = 1;
        $home = 0;
        echo "
            <a href='index.php?home=$home'><li>Home</li></a>
            <a href='admin.php'><li>Pending Reservations</li></a>
            <a href='accepted.php'><li>Accepted Reservations</li></a>
            <a href='rejected.php'><li>Rejected Reservations</li></a>
            <a href= 'index.php?checker=$logout'><li>Logout</li></a>"
            ?>
        </ul>
    </div>
    <div class="main-content">
        <div class="dashboard">
            <div class="dashboard-card">Total Reservations: <span id="totalReservations"><?php echo ($pending_count + $accepted_count + $rejected_count);?></span></div>
            <div class="dashboard-card">Pending Approvals: <span id="pendingApprovals"><?php echo $pending_count;?></span></div>
            <div class="dashboard-card">Accepted Reservations: <span id="rejectedReservations"><?php echo $accepted_count;?></span></div>
            <div class="dashboard-card">Rejected Reservations: <span id="rejectedReservations"><?php echo $rejected_count;?></span></div>
            <!--<div class="dashboard-card">Total Users: <span id="totalUsers">0</span></div>
            <div class="date-filter">
                <label for="filterDate">Filter by Date:</label>
                <input type="date" id="filterDate" onchange="fetchReservations()">
            </div>-->
        </div>
        <div class="content">
            <h3>Users Booking List</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <!--<th>Age</th>-->
                            <th>Location</th>
                            <th>Contact Number</th>
                            <th>Fee</th>
                            <th>Activities</th>
                            <th>Islands</th>
                            <th>Reservation Date</th>
                            <th>Time</th>
                            
                        </tr>
                    </thead>
                    <tbody id="reservationTable">
                    <?php
                $sql= "SELECT * FROM accepted";
                $result = $con->query($sql);
                if(!$result){
                    die("Invalid Query: " .$connection->error);
                }
                while($row = $result->fetch_assoc())
                {

                    echo "
                    <tr>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["address"] . "</td>
                    <td>" . $row["cnum"] . "</td>
                    <td>" . $row["fee"] . "</td>
                    <td>" . $row["activities"] . "</td>
                    <td>" . $row["islands"] . "</td>
                    <td>" . $row["date"] . "</td>
                    <td>" . $row["time"] . "</td>

                    
                    </tr>";
                }
                
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        function fetchReservations() {
            let selectedDate = document.getElementById("filterDate").value;
            fetch('fetch_reservations.php?date=' + selectedDate)
            .then(response => response.json())
            .then(data => {
                let table = document.getElementById("reservationTable");
                table.innerHTML = "";

                document.getElementById("totalReservations").textContent = data.length;
                document.getElementById("pendingApprovals").textContent = data.filter(res => res.status === 'pending').length;
                document.getElementById("rejectedReservations").textContent = data.filter(res => res.status === 'rejected').length;
                document.getElementById("totalUsers").textContent = new Set(data.map(res => res.email)).size;
            })
            .catch(error => console.error("Error fetching reservations:", error));
        }
        
        fetchReservations();
    </script>
</body>
</html>