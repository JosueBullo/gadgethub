<!-- resources/views/Charts/userchart.blade.php -->
@extends('adminindex')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-6VxQvlA9jDM2Y7t6d/6fMyZ5w5I2KMJf1mKq6mVqVt/YZsNRgh0rZU/NZDJQHwD3iJeqf9k3DBw//GJv4lh60A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .dashboard-container {
            max-width: 1200px;
            margin: auto;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .dashboard-header h1 {
            font-size: 24px;
            color: #333333;
            margin: 0;
            text-align: center; /* Center the title */
            width: 100%; /* Ensure title takes full width */
        }
        .chart-container {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            width: 90%; /* Adjust width */
            margin: 0 auto; /* Center the chart */
        }
        canvas {
            max-width: 100%; /* Ensure canvas is responsive */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>User Creations Per Day</h1>
        </div>
        <div class="chart-container">
            <canvas id="userCreationChart"></canvas>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('userCreationChart').getContext('2d');

            var labels = @json($labels);
            var userCreations = @json($userCreations);
            var totalUsersData = @json($totalUsersData);

            var userCreationChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'User Creations',
                        data: userCreations,
                        backgroundColor: 'rgba(75, 192, 192, 0.8)',
                    }, {
                        label: 'Total Users',
                        data: totalUsersData,
                        backgroundColor: 'rgba(255, 99, 132, 0.8)',
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'User Creations and Total Users',
                        }
                    },
                }
            });
        });
    </script>
</body>
</html>
