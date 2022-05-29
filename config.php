				<?php
				session_start();

				$hostname = "localhost";
				$username = "root";
				$password = "";
				$database = "vote";

				$conn = mysqli_connect($hostname, $username, $password, $database)
					or die("Couldn't Connect to Database :");



				?>