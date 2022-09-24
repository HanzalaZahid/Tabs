<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tab</title>
</head>
<body>
    <form action="add_tabs.php" method="post">
        <input type="text" name="tab_name" placeholder="Enter Tab Name" id="tab_name">
        <button type="submit" name="submit">Add Tab</button>
    </form>
</body>
</html>

<?php
    include 'inc/conn.php';
    $sql        =    "select * from tabs";
    $result     =    $conn->query($sql);

    $class_methods = get_class_methods($result);
        foreach ($class_methods as $method_name) 
        {
            echo "$method_name<br/>";
        }

    if ($result->num_rows > 0)
    {
        while ($row =   $result->fetch_assoc())
        {
            echo "TAB NAME: " .  $row['name'] . "<br>";
        }
    }
    else
    {
        echo "0 results";
    }
    if (isset($_POST['submit']))
    {
        $tab_name = $_POST['tab_name'];
        $sql = "INSERT INTO tabs (name) VALUES ('$tab_name')";
        if($conn->query($sql) === true)
        {
            echo "TAB INSERTED";
        }
        $sql        =    "select * from tabs";
        $result     =    $conn->query($sql);

        $class_methods = get_class_methods($result);
        foreach ($class_methods as $method_name) 
        {
            echo "$method_name<br/>";
        }

        if ($result->num_rows > 0)
        {
            while ($row =   $result->fetch_assoc())
            {
                echo "TAB NAME: " .  $row['name'] . "<br>";
            }
        }
        else
        {
            echo "0 results";
        }
    }
?>