<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Admin Panel</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

       
        .navbar {
            background-color: #1E1E2F;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar a {
            color: #FFFFFF;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }

        .navbar a:hover {
            color: #6C5DD3;
        }

        .nav-right {
            color: white;
            font-size: 14 px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .container {
            width: 95%;
            max-width: 1200px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        
        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f7f6;
            color: #2D3748;
        }

        .btn-add {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 15px;
            background-color: #6C5DD3; 
            color: white !important;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            border: none;
        }

        .btn-add:hover {
            background-color: #5a4bba; 
        }

        .status-active { color: #4BAC50; font-weight: bold; }
        .status-passive { color: #A0AEC0; font-weight: bold; }

        /* --- FORM --- */
        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #34495e;
        }

        input[type="text"],
        input[type="password"],
        select,
        textarea {
            width: 100%; 
            padding: 10px; 
            border: 1px solid #ccc; 
            border-radius: 4px;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 14px;
        }


        input:focus, select:focus, textarea:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }


        button[type="submit"] {
            background-color: #2ecc71;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%; 
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #27ae60;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }
        
        a:hover {
            text-decoration: underline;
        }

        td {
            vertical-align: middle; 
        }

        td form {
            margin: 0 !important;
            display: inline-block; 
        }

        
        td button[type="submit"] {
            width: auto !important;
            margin-top: 0 !important;
            padding: 0 !important;
            font-size: 16px;
            background: none !important;
            color: #FF4A55 !important; 
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        td button[type="submit"]:hover {
            background: none !important;
            text-decoration: underline;
        }
        /* --- POP-UP --- */
        .modal-overlay {
            display: none; 
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.6); 
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-box {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 350px;
            width: 100%;
        }

        .modal-box h3 {
            margin-top: 0;
            color: #e74c3c; 
        }

        .modal-actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .btn-cancel { background-color: #A0AEC0 !important; color: white; border:none; padding: 10px 15px; border-radius: 4px; cursor:pointer;}
        .btn-cancel:hover { background-color: #7f8c8d !important; }
        
        .btn-confirm { background-color: #FF4A55 !important; color: white; border:none; padding: 10px 15px; border-radius: 4px; cursor:pointer;}
        .btn-confirm:hover { background-color: #e03c46 !important; }

        td:last-child, th:last-child {
            white-space: nowrap; 
            width: 1%; 
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="nav-left">
            <a href="{{ route('users.index') }}">Users</a>
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="{{ route('products.index') }}">Products</a>
        </div>

        <div class="nav-right">

            @auth
                <span>Hello, <b>{{ auth()->user()->username }}</b></span>

                <form action="{{ route('logout') }}" method:"POST" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background-color: #e74c3c; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-weight: bold; width: auto; margin-top: 0;">
                        Log Out
                    </button>
                </form>
            @endauth            
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>


    <div id="deleteModal" class="modal-overlay">
        <div class="modal-box">
            <h3>Are you sure?</h3>
            <p>Do you really want to delete this record? This action cannot be undone.</p>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closeModal()">Cancel</button>
                <button type="button" class="btn-confirm" onclick="confirmDelete()">Delete</button>
            </div>
        </div>
    </div>

    <script>
        let formToSubmit = null; 


        function openDeleteModal(event, formElement) {
            event.preventDefault(); 
            formToSubmit = formElement; 
            document.getElementById('deleteModal').style.display = 'flex'; 
        }


        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none'; 
            formToSubmit = null; 
        }

        function confirmDelete() {
            if (formToSubmit) {
                formToSubmit.submit(); 
            }
        }
    </script>

</body>
</html>