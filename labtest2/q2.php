<?php
$servername = "localhost";
$username = "libraryadmin";
$password = "admin123";
$dbname = "smartlibrary";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Book</title>
</head>
<body>
    <form method="POST" action="">
        <h3>Insert Book Record</h3>

        <label>Product Category:</label><br>
        <select name="cat_ID">
            <?php
            $sql_cat = "SELECT * FROM category";
            $result_cat = mysqli_query($conn, $sql_cat);

            if (mysqli_num_rows($result_cat) > 0) {
                while($row = mysqli_fetch_assoc($result_cat)) {
                    echo "<option value='" . $row['cat_ID'] . "'>" . $row['cat_name'] . "</option>";
                }
            } else {
                echo "<option value=''>No categories available</option>";
            }
            ?>
        </select><br><br>

        <label>Book Title:</label><br>
        <input type="text" name="book_title" required><br><br>

        <label>Author: </label><br>
        <input type="text" name="book_author" required><br><br>

        <label>Quantity:</label><br>
        <input type="number" name="book_qty" required><br><br>

        <label>Price: </label><br>
        <input type="text" name="book_price" required><br><br>

        <input type="submit" name="btn_submit" value="Submit">
    </form>

    <?php
    if (isset($_POST['btn_submit'])) {

        $cat_ID = $_POST['cat_ID'];
        $title = $_POST['book_title'];
        $author = $_POST['book_author'];
        $qty = $_POST['book_qty'];
        $price = $_POST['book_price'];
        $sql_insert = "INSERT INTO books (book_title, book_author, book_qty, book_price, cat_ID) 
                       VALUES ('$title', '$author', '$qty', '$price', '$cat_ID')";

        if (mysqli_query($conn, $sql_insert)) {
            echo "<p style='color:green;'>New book record created successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $sql_insert . "<br>" . mysqli_error($conn) . "</p>";
        }
    }

    mysqli_close($conn);
    ?>

</body>
</html>