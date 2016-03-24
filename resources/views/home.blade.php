<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cube Summation</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<style>
		.space-below{
			margin-bottom: 2em;
		}
		.main-content{
			max-width: 1200px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="main-content center-block">
			<div class="page-header">
				<h1>Solve The Cube Summation Problem</h1>
			</div>
			<form id="form">
				<input type="hidden" id="_token" name="_token" value="{{{ csrf_token() }}}" />
				<div class="row form-group">
					<div class="col-md-4">
						<div>
							<h4><label class="text-center">Sample input</label></h4>
						</div>
						<div class="panel panel-default">
							<div class="panel-body">
								<small>
									2<br>
									4 5<br>
									UPDATE 2 2 2 4<br>
									QUERY 1 1 1 3 3 3<br>
									UPDATE 1 1 1 23<br>
									QUERY 2 2 2 4 4 4<br>
									QUERY 1 1 1 3 3 3<br>
									2 4<br>
									UPDATE 2 2 2 1<br>
									QUERY 1 1 1 1 1 1<br>
									QUERY 1 1 1 2 2 2<br>
									QUERY 2 2 2 2 2 2<br>
								</small>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<h4><label for="problem">Problem</label></h4>
						<textarea id="problem" name="problem" class="form-control" rows="13"></textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-4">
						<div>
							<h4><label class="text-center">Sample output</label></h4>
						</div>
						<div class="panel panel-default">
							<div class="panel-body">
								<small>
									4<br>
									4<br>
									27<br>
									0<br>
									1<br>
									1<br>
								</small>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<h4><label for="result">Result</label></h4>
						<textarea id="result" class="form-control" rows="7" readonly></textarea>
					</div>
				</div>
			</form>
			<div class="row space-below">
				<div class="col-md-12 text-center">
					<button id="send-button" class="btn btn-primary">Solve problem</button>
				</div>
			</div>
			<div class="well">
				<p class="text-center">
					Problem description <a href="https://www.hackerrank.com/challenges/cube-summation">here</a>
				</p>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			$("#send-button").on('click', function(){
				var data = $("#form").serialize();
				$.ajax({
					url: "{{ url('summ') }}",
					type: "POST",
					data: data,
					 success: function(result){
						$("#result").val(result);
					}
				});
			});
		});
	</script>
</body>
</html>