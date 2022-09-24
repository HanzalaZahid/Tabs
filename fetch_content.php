<?php
    $tab_id =   $_REQUEST['tab_id'];
    include "./inc/conn.php";

    $sql    =   "select content from contents where tab_id = $tab_id";
    $result =   $conn->query($sql);
    if ($result->num_rows   >   0)
    {
        echo json_encode($result->fetch_all());
    }
?>