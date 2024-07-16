<!-- resources/views/Charts/productchart.blade.php -->
@extends('adminindex')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <h1>Product Distribution</h1>
        </div>
        <div class="chart-container">
            <canvas id="productPieChart"></canvas>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('productPieChart').getContext('2d');

            var productLabels = @json($productLabels);
            var productCounts = @json($productCounts);

            var productPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: productLabels,
                    datasets: [{
                        label: 'Product Distribution',
                        data: productCounts,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)'
                        ],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                        },
                        title: {
                            display: true,
                            text: 'Product Distribution by Name',
                        }
                    },
                }
            });
        });
    </script>
</body>
</html>
