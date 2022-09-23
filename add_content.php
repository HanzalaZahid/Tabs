<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Content</title>
    <?php
        include "./inc/conn.php";
    ?>
    <style>
        form
        {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <form action="add_content.php" method="post">
        <select name="tab_select" id="tab_select">
            <option value="0">--Select Tab--</option>
            <?php
                $sql    =   "select * from tabs";
                $result =   $conn->query($sql);

                if ($result->num_rows > 0)
                {
                    while($row  =   $result->fetch_assoc())
                    {
                        echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
                    }
                }
                else
                {
                    echo " no tabs";
                }

            ?>
        </select>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <button type="submit" name="submit">Add Content</button>
    </form>
</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $tab = $_POST['tab_select'];
        $content = $_POST['content'];

        $sql = "INSERT INTO contents (tab_id, content) VALUES ($tab,'$content')";
        if($conn->query($sql) === true)
        {
            echo "Content Inserted Successfullt";
        }
        else
        {
            echo "Insert Error";
        }
    }
?>