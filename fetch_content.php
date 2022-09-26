<?php
    $tab_id =   $_REQUEST['tab_id'];
    include "./inc/conn.php";

    $sql    =   "select content from contents where tab_id = $tab_id";
    $result =   $conn->query($sql);
    $arr = array();
    if ($result->num_rows   >   0)
    {
        while ($row =   $result->fetch_assoc())
        {
            $arr[]   =   $row['content'];
        }
        echo json_encode($arr);
    }
?>