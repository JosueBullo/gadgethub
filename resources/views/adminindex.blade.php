<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Gadget Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .side-panel {
            background-color: #343a40; /* Dark side panel */
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            padding: 60px 20px 20px;
            overflow-y: auto;
            transition: left 0.3s ease;
            z-index: 1000;
            text-align: left;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
        }
        .side-panel-logo {
            margin-bottom: 20px;
            text-align: center;
        }
        .side-panel-logo img {
            max-width: 80%;
            height: auto;
        }
        .side-panel-nav {
            margin-top: 20px;
        }
        .side-panel-nav .nav-link {
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 5px 0;
            transition: background-color 0.3s, color 0.3s;
        }
        .side-panel-nav .nav-link:hover,
        .side-panel-nav .nav-link.active {
            background-color: #007bff; /* Blue background on hover */
            color: #fff; /* White text */
        }
        .nav-item .icon {
            margin-right: 10px;
        }
        .nav-item {
            position: relative;
        }
        .nav-item::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            height: 60%;
            width: 5px;
            background-color: transparent;
            transition: background-color 0.3s;
            border-radius: 5px;
        }
        .nav-item:hover::before,
        .nav-item.active::before {
            background-color: #007bff; /* Active line on the left */
        }
    </style>
</head>
<body>
<div class="side-panel">
    <div class="side-panel-logo">
        <img src="logo.png" alt="Logo">
    </div>
    <nav class="side-panel-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/') }}">
                    <span class="icon"><i class="fas fa-home"></i></span> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/users') }}">
                    <span class="icon"><i class="fas fa-users"></i></span> Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/products') }}">
                    <span class="icon"><i class="fas fa-box"></i></span> Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/category') }}">
                    <span class="icon"><i class="fas fa-tags"></i></span> Categories
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="chartsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="icon"><i class="fas fa-chart-bar"></i></span> Charts
                </a>
                <div class="dropdown-menu" aria-labelledby="chartsDropdown">
                    <a class="dropdown-item" href="{{ url('/chart') }}">Chart</a>
                    <a class="dropdown-item" href="{{ url('/userchart') }}">Users Chart</a>
                    <a class="dropdown-item" href="{{ url('/productchart') }}">Products Chart</a>
                    <a class="dropdown-item" href="{{ url('/charts/categories') }}">Category Chart</a>
                </div>
            </li>
        </ul>
    </nav>
</div>

<div class="main-content">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
@yield('scripts')
</body>
</html>
