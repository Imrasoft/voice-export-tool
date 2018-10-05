	  
<?php

	// call export function
	exportMysqlToCsv('call_records.csv');


	// export csv
	function exportMysqlToCsv($filename = 'call_records.csv')
	{

	   $conn = dbConnection();
	// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$fromDate = $_POST['fromDate'];
        $toDate = $_POST['toDate'];
		//$sql_query = "SELECT county, caller_name, phone FROM datacaptureform";
		$sql_query = "SELECT county, caller_name, phone, created_at FROM datacaptureform WHERE created_at BETWEEN '$fromDate' AND '$toDate'";

		// Gets the data from the database
		$result = $conn->query($sql_query);

		$f = fopen('php://temp', 'wt');
		$first = true;
		while ($row = $result->fetch_assoc()) {
			if ($first) {
				fputcsv($f, array_keys($row));
				$first = false;
			}
			fputcsv($f, $row);
		} // end while

		$conn->close();

		$size = ftell($f);
		rewind($f);

		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Length: $size");
		// Output to browser with appropriate mime type, you choose ;)
		header("Content-type: text/x-csv");
		header("Content-type: text/csv");
		header("Content-type: application/csv");
		header("Content-Disposition: attachment; filename=$filename");
		fpassthru($f);
		exit;

	}

	// db connection function
	function dbConnection(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "lvctdataform";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		return $conn;
		
		
	}


?>

