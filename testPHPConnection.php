<html>
	<head>

	</head>
	<body>
		
		<?php
			
			// SQL Server Extension Sample Code:
			$connectionInfo = array("UID" => "testPolyAR", "pwd" => "{your_password_here}", "Database" => "testAzureSQL", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
			$serverName = "tcp:testtestserver.database.windows.net,1433";
			$connection = sqlsrv_connect($serverName, $connectionInfo);
			
			//$locationID = $_POST["location"];
			//$tourType = $_POST["tourType"];
			$locationID = 1002;
			$tourType = 0;
			
			
			if ($connection === false) {
				if (($errors = sqlrv_errors()) != NULL) {
					foreach( $errors as $error ) {
					    echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
					    echo "code: ".$error[ 'code']."<br />";
					    echo "message: ".$error[ 'message']."<br />";
					}
				}
				
				die("Connection failed");
			}
			
			$sql = "SELECT thing FROM testAssets WHERE location=" . $locationID . " AND tourType=" . $tourType;

			$statement = sqlsrv_query($connection, $sql);
			
			if (sqlsrv_fetch($statement) === false) {
				die("Invalid Query: " . sqlsrv_errors());
			}
			
			$fileName = sqlsrv_get_field($statement, 0);
			
			echo $fileName;
			
		?>
			
	</body>
</html>
