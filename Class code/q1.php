<!DOCTYPE html>
<html>
<head><title>Lab 11</title></head>
<body>

<form name="addfrm" method="post" action="">
<p>Enter a number : <input type="text" name="num"></p>
<p><input type="submit" name="addbtn" value="Add All Number">
   <input type="submit" name="mulbtn" value="Multiply All Number">
</p>
</form>

<?php
error_reporting(0);

if (isset($_POST["addbtn"]))
{
    $num = $_POST["num"];
    $total = 0;

    for($i = 1; $i <= $num; $i++){
        $total = $total + $i;
    }

    echo "The total of all numbers is $total";
}

if (isset($_POST["mulbtn"]))
{
    $num = $_POST["num"];
    $product = 1;
    $i = 1;

    while($i <= $num){
        $product = $product * $i;
        $i++;
    }

    echo "The product of all numbers is $product";
}
?>

</body>
</html>