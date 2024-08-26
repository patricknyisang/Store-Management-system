<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .sidebar h2 {
            margin-top: 0;
            font-size: 1.5em;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px 0;
            font-size: 1.2em;
        }

        .sidebar a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        .main-content {
            margin-left: 220px;
            padding: 20px;
            width: calc(100% - 220px);
            box-sizing: border-box;
        }

        header {
            background-color: #f8f9fa;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        .nav-buttons {
            margin-bottom: 20px;
        }

        .nav-buttons button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            margin-right: 10px;
        }

        .nav-buttons button:hover {
            background-color: #0056b3;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        footer {
            background-color: #f8f9fa;
            padding: 10px 20px;
            border-top: 1px solid #ddd;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="viewitem">Home</a>
        <a href="contact">Contact Us</a>
        <a href="about">About Us</a>
    </div>

    <main class="main-content">
        <header>
            <h1>Store Management System</h1>
        </header>

        <div class="nav-buttons">
            <button onclick="location.href='fetchallitem'">View Items</button>
            <button onclick="location.href='viewitem'">Add Item</button>
        </div>

        <div class="container">
            <form method="post" action="{{url('store_item')}}" enctype="multipart/form-data" class="registration-form">
                {{ csrf_field() }} 
                <div class="form-group">
                    <label for="item_id">Item ID</label>
                    <input type="number" id="item_id" name="item_id" placeholder="Enter item id" required>
                </div>

                <div class="form-group">
                    <label for="item">Item</label>
                    <input type="text" id="item" name="item" placeholder="Enter item name" step="1" required>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" placeholder="Enter items quantity" step="1" required>
                </div>

                <div class="form-group">
                    <label for="deficit">Deficit</label>
                    <input type="number" id="deficit" name="deficit" placeholder="Enter items deficit in store" step="1" required>
                </div>

                <div class="form-group">
                    <label for="price">Price per Item</label>
                    <input type="number" id="price" name="price_per_item" placeholder="Enter price per item" step="1" required>
                </div>

                <div class="form-group">
                    <label for="itempicture">Item Picture</label>
                    <input type="file" id="file" name="item_picture" required>
                </div>

                <button type="submit">Add an Item to Store</button>
            </form>
        </div>

        <footer>
            <p>&copy; 2024 Store Management System</p>
        </footer>
    </main>
</body>
</html>
