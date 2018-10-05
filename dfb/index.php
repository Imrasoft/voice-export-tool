<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	  
</head>
<body>
<br><br>
<div class="container">
 <form action="export.php" class="form-horizontal"  role="form" method="post">
        <fieldset>
            <legend>Select time period to export data</legend>
				<div class="row">
				<div class="col-lg-4">
					  <div class="input-group date form_datetime" data-date="2018-09-16T05:25:07Z" data-date-format="yyyy-mm-dd HH:mm:ss" data-link-field="dtp_input1">
						<input class="form-control" size="16" type="text" value="" name="fromDate" readonly>
						<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				</div>
				<div class="col-lg-4">
					  <div class="input-group date form_datetime" data-date="2018-09-16T05:25:07Z" data-date-format="yyyy-mm-dd HH:mm:ss" data-link-field="dtp_input1">
						<input class="form-control" size="16" type="text" value="" name="toDate" readonly>
						<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				</div>
				<div class="col-lg-4">
					<input class="btn btn-info btn-large" type="submit" id="" value="Export to CSV" /><br/>
				</div>
			</div>
      </form>
</div>

	<hr>
<div class="container">
	
<?php
    //database connections
    $table = 'datacaptureform'; 
    $file = 'export';
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "lvctdataform";
   
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT county, caller_name, phone, created_at FROM datacaptureform";
	$result = mysqli_query($conn, $sql);

   
    // sending query
   // $sql = "SELECT * FROM {$table} ORDER BY date desc";
    if (!$result) {
        die("Query to show fields from table failed");
    }
    $num_rows = mysqli_num_rows($result);
    $fields_num = mysqli_num_fields($result);
	
   
	echo "Ther are $num_rows records";
    echo "<h1></h1>";
    echo "<table class='table' width='80%' border='1'><tr>";
    // printing table headers
    for($i=0; $i<$fields_num; $i++)
    {
        $field = mysqli_fetch_field($result);
        echo "<td>{$field->name}</td>";
    }
    echo "</tr>\n";
    // printing table rows
    while($row = mysqli_fetch_row($result))
    {
        echo "<tr>";
   
        // $row is array... foreach( .. ) puts every element
        // of $row to $cell variable
        foreach($row as $cell)
            echo "<td>$cell</td>";
   
        echo "</tr>\n";
    }
    mysqli_free_result($result);
    ?>
</div>

 <script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
            $(function () {
                $('.form_datetime').datetimepicker();
            });
        </script>

    </body>
	</html>