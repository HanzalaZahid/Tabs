<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Document</title>
    <?php
    include "./inc/conn.php";
    ?>
</head>
<body>
    <?php
    $sql = "select * from tabs";
    $result = $conn->query($sql);

    ?>
    <header>
        <ul>
            <?php
            if ($result->num_rows>0)
            {
                while($row  =   $result->fetch_assoc())
                {
                    echo '<li><a href="" data-id="'.$row['id'].'">'.$row['name'].'</a></li>';
                }
            }
            ?>
        </ul>
    </header>
    <div class="content" id="content">

    </div>
</body>
</html>

<script>
    let tabs = document.querySelectorAll('header li>a');
    tabs.forEach(
        element=>
        {
            element.addEventListener("click", function(event)
            {
                event.preventDefault();
                update_content(element.getAttribute("data-id"));
            })
        }
    )
    function update_content(id)
    {
        // console.log("UPDATE : "+id);
        const xhttp =   new XMLHttpRequest();
        xhttp.onload =   function()
        {
            let target  =   document.getElementById("content");
            console.log(this.responseText)
            if (this.responseText != "")
            {
                var data    =   JSON.parse(this.responseText);
                while(target.firstChild)
                {
                    target.removeChild(target.lastChild)
                }
            }
            else
            {
                alert ("No Data Found");
                return;
            }
            for(let [key, value] of Object.entries(data))
            {
                let content =   document.createElement("p");
                let text    =   document.createTextNode(value);
                content.appendChild(text);

                target.appendChild(content)
            }         
        }
        xhttp.open("POST", "fetch_content.php?tab_id="+id);
        xhttp.send();
    }
</script>