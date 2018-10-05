<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	  
</head>
<body>
<nav class="navbar navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="#">LVCT Data Export Tool</a>
  </div>
</nav>
<br><br>

<div class="container" style="padding-top: 5%">
 <form action="export.php" class="form-horizontal"  role="form" method="post">
        <fieldset>
            <legend>Select time period to export data</legend>
			<span>NB: This Tool exports records from the voice system only</span><br><br>
				<div class="row">
				<div class="col-lg-4">
				<label>Start Date</label>
					  <div class="input-group date form_datetime" data-date="2018-09-16T05:25:07Z" data-date-format="yyyy-mm-dd HH:mm:ss" data-link-field="dtp_input1">
						<input class="form-control" size="16" type="text" value="" name="fromDate" readonly>
						<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				</div>
				<div class="col-lg-4">
				<label>End Date</label>
					  <div class="input-group date form_datetime" data-date="2018-09-16T05:25:07Z" data-date-format="yyyy-mm-dd HH:mm:ss" data-link-field="dtp_input1">
						<input class="form-control" size="16" type="text" value="" name="toDate" readonly>
						<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				</div>
				<div class="col-lg-4">
				<br>
					<input class="btn btn-info btn-large" type="submit" id="" value="Export to CSV" /><br/>
				</div>
			</div>
      </form>
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
