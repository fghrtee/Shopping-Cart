<table >
    <tr>
        <td>
        <a href="home3.php" style=color:black;>Home</a>
        </td>

    </tr>
</table>
<?php

    include ('connection.php');
     echo "<table border='1px' cellpadding='10px'>";
                echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Category</th><th>active</th><th>Edit</th><th>Delete</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['category'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo '<td><a href=edit.php><img src="pics/edit.webp"style=height:30px;></a></td>';  
                    echo '<td><a href=delete.php><img src="pics/delete.png"style=height:30px;></a></td>';                     
                    echo "</tr>";
                }
                echo "</table>";
                include ('close.php');
                ?>