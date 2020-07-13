<!DOCTYPE html>
<html>
<head>
	<title>Import Test</title>
	<script src="js/jquery.min.js"></script>
</head>
<body>
	<div>
		<span id="message"></span>
		<form method="POST" id="import_excel_form" enctype="multipart/form-data">
			<table class="table">
				<tr>
					<td width="25%" align="right">
						Select Excel File
					</td>
					<td width="50%">
						<input type="file" name="import_excel"/>
					</td>
					<td width="25%">
						<input type="submit" name="import" id="import" class="btn btn-primary" value="import"/>
					</td>
				</tr>
			</table>
		</form>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#import_excel_form').on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url:"import.php",
				method:"POST",
				data: new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(){
					$('#import').attr('disabled', 'disabled');
					$('#import').val('importing...');
				},
				success:function(data){
					$('#message').html(data);
					$('#import_excel_form')[0].reset();
					$('#import').attr('disabled', false);
					$('#import').val('import');
				}
			});
		});
	});
</script>
</body>
</html>