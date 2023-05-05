<?php include('db_connect.php');?>

<div class="container-fluid" style="font-family: 'Ubuntu', sans-serif;">
	
	<div class="col-lg-12">
	<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-package">
				<div class="card" style="-webkit-box-shadow: 10px 10px 13px 7px rgba(0,0,0,0.35); 
box-shadow: 10px 10px 13px 7px rgba(0,0,0,0.35);
border: 0px solid #1C6EA4;
border-radius: 40px 10px 40px 10px;">
					<div class="card-header">
						    Duty Shift Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Shift Name</label>
								<input type="text" class="form-control" name="package">
							</div>
							
							<div class="form-group">
								<label class="control-label">Number of Personnels</label>
								<input type="number" class="form-control text-right" step="any" name="number">
							</div>
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-success col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-danger col-sm-3" type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card" style="-webkit-box-shadow: 10px 10px 13px 7px rgba(0,0,0,0.35); 
box-shadow: 10px 10px 13px 7px rgba(0,0,0,0.35);
border: 0px solid #1C6EA4;
border-radius: 40px 10px 40px 10px;">
					<div class="card-header">
						<b>Duty Entries</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<colgroup>
								<col width="5%">
								<col width="55%">
								<col width="20%">
								<col width="20%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Shift Name</th>
									<th class="text-center">Number of Personnels</th>
								
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$package = $conn->query("SELECT * FROM packages order by id asc");
								while($row=$package->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p>Duty Shift: <b><?php echo $row['package'] ?></b></p>
										
										
									</td>
									<td class="text-right">
										<b><?php echo number_format($row['amount']) ?></b>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-success edit_package" type="button" data-id="<?php echo $row['id'] ?>" data-package="<?php echo $row['package'] ?>" data-description="<?php echo $row['description'] ?>" data-amount="<?php echo $row['amount'] ?>" >UPDATE</button>
										<BR></BR>
										<button class="btn btn-sm btn-danger delete_package" type="button" data-id="<?php echo $row['id'] ?>">REMOVE</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Lora&family=Ubuntu:wght@300&display=swap');
	td{
		vertical-align: middle !important;
	}
</style>
<script>
	function _reset(){
		$('#manage-package').get(0).reset()
		$('#manage-package input,#manage-package textarea').val('')
	}
	$('#manage-package').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_package',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_package').click(function(){
		start_load()
		var cat = $('#manage-package')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='package']").val($(this).attr('data-package'))
		cat.find("[name='description']").val($(this).attr('data-description'))
		cat.find("[name='amount']").val($(this).attr('data-amount'))
		end_load()
	})
	$('.delete_package').click(function(){
		_conf("Are you sure to delete this duty plan?","delete_package",[$(this).attr('data-id')])
	})
	function delete_package($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_package',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	$('table').dataTable()
</script>