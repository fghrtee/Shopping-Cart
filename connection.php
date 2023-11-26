<?php
                $servername = "localhost"; // Change this if your MySQL server is on a different host
                $username = "root"; // Your MySQL username
                $password = ""; // Your MySQL password
                $database = "shop"; // Your database name

                // Create a connection
                $conn = mysqli_connect($servername, $username, $password, $database);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Query to retrieve data from the "products" table
                $sql = "SELECT * FROM products" ;

                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Check if the query was successful
                if (!$result) {
                    die("Query failed: " . mysqli_error($conn));
                }
             ?>