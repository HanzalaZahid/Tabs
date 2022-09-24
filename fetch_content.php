<?php
    $tab_id =   $_REQUEST['tab_id'];
    include "./inc/conn.php";

    $sql    =   "select content from contents where tab_id = $tab_id";
    $result =   $conn->query($sql);
    $arr[]    =   "";
    if ($result->num_rows   >   0)
    {
        // while ($row =   $result->fetch_all())
        // {
        //     $arr    +=  $row;
        // }
        echo json_encode($result->fetch_all());
    }
?>