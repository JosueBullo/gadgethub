<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: white; 
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .side-panel {
            background-color: #1c1c1c;
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
        .main-content {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
            padding: 20px;
            position: relative;
            text-align: center;
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
            color: #ddd;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 5px 0;
            transition: background-color 0.3s, color 0.3s;
        }
        .side-panel-nav .nav-link:hover,
        .side-panel-nav .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }
        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            margin: 10px;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .openbtn:hover {
            background-color: #0056b3; /* Darker blue */
        }
        .profile-section {
            text-align: center;
            margin-bottom: 20px;
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .profile-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 2px solid #007bff;
        }
        .profile-name {
            color: #ddd;
            margin-top: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="side-panel" id="mySidepanel">
        <div class="side-panel-logo">
            <img src="logo.png" alt="Logo">
        </div>
        <nav class="side-panel-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/customer') }}">
                        <span class="icon"><i class="fas fa-home"></i></span> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/cusprod') }}">
                        <span class="icon"><i class="fas fa-box"></i></span> Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="icon"><i class="fas fa-tags"></i></span> Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/customer/cart') }}">
                        <span class="icon"><i class="fas fa-shopping-cart"></i></span> Cart
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        
       

    <script>
        function openNav() {
            document.getElementById("mySidepanel").style.width = "250px";
            document.querySelector(".main-content").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
            document.querySelector(".main-content").style.marginLeft= "0";
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    @yield('scripts')
</body>
</html>
