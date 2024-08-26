<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            box-sizing: border-box;
            overflow-y: auto;
        }

        .sidebar h2 {
            margin-top: 0;
            font-size: 1.5em;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            font-size: 1.2em;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            box-sizing: border-box;
            overflow-y: auto;
        }

        header {
            background-color: #f8f9fa;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .modal-content {
            border-radius: 8px;
        }

        .form-group label {
            font-weight: bold;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
        }

        .modal-title {
            margin: 0;
        }

        .close {
            color: white;
            opacity: 1;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        footer {
            background-color: #f8f9fa;
            padding: 10px 20px;
            border-top: 1px solid #ddd;
            text-align: center;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }
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

    <div class="main-content">
        <header>
            <h1>Store Keeping Management System</h1>
            <p>List of items in store</p>
        </header>

        <main>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Deficit</th>
                        <th>Price per Item</th>
                        <th>Item Picture</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fetchitems as $item)
                        <tr>
                            <td>{{ $item->item_id }}</td>
                            <td>{{ $item->item }}</td>
                            <td>{{ $item->Quantity }}</td>
                            <td>{{ $item->deficit }}</td>
                            <td>{{ $item->price_per_item }}</td>
                            <td>{{ $item->itempicture }}</td>
                            <td class="actions">
                                <!-- Edit Button -->
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal" data-item_id="{{ $item->item_id }}" data-item="{{ $item->item }}" data-quantity="{{ $item->quantity }}" data-deficit="{{ $item->deficit }}" data-price_per_item="{{ $item->price_per_item }}" data-itempicture="{{ $item->itempicture }}">
                                    Edit
                                </button>
                                <!-- Delete Button -->
                                <form action="{{ url('delete_item/' . $item->item_id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ml-2">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>

        <footer>
            <p>&copy; 2024 Store Keeping Management System</p>
        </footer>
    </div>

    <!-- Modal HTML -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="{{ url('update_item/'.$item->item_id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="item_id">Item ID</label>
                            <input type="number" id="item_id" name="item_id" value="{{ $item->item_id }}" placeholder="Enter item id" required>
                        </div>

                        <div class="form-group">
                            <label for="item">Item</label>
                            <input type="text" id="item" name="item" value="{{ $item->item }}" placeholder="Enter item name" step="1" required>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" value="{{ $item->Quantity }}" placeholder="Enter item quantity" step="1" required>
                        </div>

                        <div class="form-group">
                            <label for="deficit">Deficit</label>
                            <input type="number" id="deficit" name="deficit" value="{{ $item->deficit }}" placeholder="Enter item deficit" step="1" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price per Item</label>
                            <input type="number" id="price" name="price_per_item" value="{{ $item->price_per_item }}" placeholder="Enter price per item" step="1" required>
                        </div>

                        <div class="form-group">
                            <label for="itempicture">Item Picture</label>
                            <input type="file" id="itempicture" name="item_picture" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script to populate modal fields -->
 
</body>
</html>
