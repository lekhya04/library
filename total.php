<?php
$connection = mysqli_connect('localhost', 'root', '', 'library');
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}
$query = "SELECT book_no,book_name FROM books";
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
            width: 60%;
            max-width: 600px;
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

        tr:hover {
            background-color: #f9f9f9;
        }

        .but {
            display: flex;
            justify-content: center;
            margin-top: 30px;
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
    <h1>List of Books</h1>
    <table>
        <thead>
            <tr>
                <th>Book No</th>
                <th>Book Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['book_no'] . '</td>';
                echo '<td>' . $row['book_name'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <div class="but">
            <a href="search.php" target="_self">
                <button id="but">Home</button>
            </a>
    </div>
</div>
</body>
</html>
