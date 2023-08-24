<?php
$connection = mysqli_connect('localhost', 'root', '', 'library');
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}
$query = "SELECT * FROM borrowed";
$result = mysqli_query($connection, $query);
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>List of Books</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #9C9C98;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 80%;
            max-width: 1000px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color:#DADAD8;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e1e1e1;
        }
        th {
            background-color: #f2f2f2;
            color: #2c3e50;
        }
        th:nth-child(1),
        td:nth-child(1) 
        {
            width: 100px; 
        }

        th:nth-child(2),
        td:nth-child(2) 
        {
            width: 100px; 
        }
        th:nth-child(3),
        td:nth-child(3) 
        {
            width: 100px; 
        }

        th:nth-child(4),
        td:nth-child(4) 
        {
            width: 100px; 
        }
        th:nth-child(5),
        td:nth-child(5) 
        {
            width: 100px; 
        }

        th:nth-child(6),
        td:nth-child(6)
        {
            width: 100px 
        }
        tr:hover {
            background-color: #f9f9f9;
        }

        .but {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
        .return-link {
            text-decoration: none;
        }

        .return-button {
            padding: 5px 10px;
            font-size: 14px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .return-button:hover {
            background-color: #2980b9;
        }

        #but {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #but:hover {
            background-color: #c0392b;
        }
    </style>
<body>
<div class="container">
    <h1>Borrowed Books</h1>
    <table>
        <thead>
            <tr>
                <th>Student Id</th>
                <th>Book No</th>
                <th>Book Name</th>
                <th>Borrowed date</th>
                <th>Return date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) 
            {
                echo '<tr>';
                echo '<td>' . $row['stu_id'] . '</td>';
                echo '<td>' . $row['book_no'] . '</td>';
                echo '<td>' . $row['book_name'] . '</td>';
                echo '<td>' . $row['given_date'] . '</td>';
                echo '<td>' . $row['return_date'] . '</td>';
                echo '<td><a href="return.php?borrowed_id=' . $row['borrowed_id'] . '" class="return-link"><button class="return-button">Returned</button></a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <div class="but">
            <a href="facultyhome.php" target="_self">
                <button id="but">Home</button>
            </a>
    </div>
</div>
</body>
</html>
