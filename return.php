<?php
$con = mysqli_connect('localhost', 'root', '', 'library');
if (!$con) 
{
    die('Database connection failed: ' . mysqli_connect_error());
}

if (isset($_GET['borrowed_id'])) 
{
    $borrow_id = $_GET['borrowed_id'];

    $query = "SELECT book_no FROM borrowed WHERE borrowed_id = '$borrow_id'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) 
    {
        $row = mysqli_fetch_assoc($result);
        $book_no = $row['book_no'];

        $updateQuery = "UPDATE books SET book_stock = book_stock + 1 WHERE book_no = '$book_no'";
        $updateResult = mysqli_query($con, $updateQuery);

        if (!$updateResult) 
        {
            echo "Error updating book stock: " . mysqli_error($con);
        }

        $deleteQuery = "DELETE FROM borrowed WHERE borrowed_id = '$borrow_id'";
        $deleteResult = mysqli_query($con, $deleteQuery);

        if (!$deleteResult) 
        {
            echo "Error deleting row: " . mysqli_error($con);
        }
    }
}

mysqli_close($con);
header("Location: borrow.php"); 
?>
