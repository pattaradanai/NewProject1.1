<?php 

    include("config.php");

    // $sql = "SELECT * FROM class12 WHERE no = '1' ";
    $sql = "SELECT * FROM class12 ";
    $query = mysqli_query($conn,$sql);
    // $objResult = mysqli_fetch_array($query);
    if($query->num_rows > 0)
    {
        while($data = $query->fetch_assoc())
        {
            echo "<tr>";
            echo "<td class='nocol'>".$data["no"]."</td>";
            echo "<td class='namecol'>".$data["name"]."</td>";
            echo "<td>";
            if ($data["work1"] == "0")
            {
                echo "<img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/101/cross-red-256.png' />";
            } else if ($data["work1"] == "1")
            {
                echo "<img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/130/tick-green-512.png' />";
            } else 
            {
                echo "<img src='https://cdn2.iconfinder.com/data/icons/color-svg-vector-icons-2/512/warning_alert_attention_search-512.png' />";
            }
            echo "</td>";
            echo "<td>";
            if ($data["work2"] == "0")
            {
                echo "<img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/101/cross-red-256.png' />";
            } else if ($data["work2"] == "1")
            {
                echo "<img src='https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/130/tick-green-512.png' />";
            } else 
            {
                echo "<img src='https://cdn2.iconfinder.com/data/icons/color-svg-vector-icons-2/512/warning_alert_attention_search-512.png' />";
            }
            echo "</td>";
            echo "</tr>";
        }
    }
    session_write_close();
    mysqli_close($conn);
?>