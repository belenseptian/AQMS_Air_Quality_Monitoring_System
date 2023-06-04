@if (session('status'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>{{ session('status') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif
<div class="row">
	<!-- ============================================================== -->

	<!-- ============================================================== -->

	<!-- recent orders  -->
	<!-- ============================================================== -->
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="card">
			<h5 class="card-header">Device Setting</h5>
			<div class="card-body p-4">
				<table class="table00" id="table00">
					<thead>
						<tr>
							<th class="text-center">Device ID</th>
							<th class="text-center">Country</th>
							<th class="text-center">Region</th>
							<th class="text-center">Status</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($main as $item)
						<tr>
							<td>{{ $item->serial }}</td>
							<td>{{ $item->country }}</td>
							<td>{{ $item->region }}</td>
							@if($item->activation==0)
								<td>Disabled</td>
							@else
								<td>Enabled</td>
							@endif
							<td><button class='btn btn-primary' data-toggle='modal' data-backdrop='static' data-keyboard='false' data-target='#myModal19'><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></td>
							@if($item->activation==0)
								<td><button class='btn btn-success' data-toggle='modal' data-backdrop='static' data-keyboard='false' data-target='#myModal20'><i class="fa fa-check" aria-hidden="true"></i> Enable</button></td>
							@else
								<td><button class='btn btn-danger' data-toggle='modal' data-backdrop='static' data-keyboard='false' data-target='#myModal21'><i class="fa fa-times" aria-hidden="true"></i> Disable</button></td>
							@endif
					
						</tr>
						@endforeach   
					</tbody>
				</table>
			</div>
		</div>
	</div>
	   
</div>
<div class="modal fade" id="myModal19" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="closeview" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-signin" method="post" action="{{  url('/') }}/admin/action/device-setting" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-label-group">
						<input type="text" name="serial" id="serial" class="form-control" placeholder="Serial Number" autocomplete="off" readonly="readonly" required>
					</div>
					<br>
					<div class="form-label-group">
						<input type="text" name="country" id="country" class="form-control" placeholder="Country" autocomplete="off" required>
					</div>
					<br>
					<div class="form-label-group">
						<input type="text" name="region" id="region" class="form-control" placeholder="Region" autocomplete="off" required>
					</div>
					<br>
					<button class="btn btn-primary btn-block" type="submit">Edit</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="closevie" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<div class="modal fade" id="myModal20" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-signin" method="post" action="{{  url('/') }}/admin/action/enable-device" enctype="multipart/form-data">
				 {{ csrf_field() }}
					Do you want to enable this device?
					<br><br>
					<input type="text" name="valsite24" id="valsite24" style="display:none;" required> 
					<button type="submit" class="btn btn-success" name="subsite" id="subsite">Yes</button>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">No</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<div class="modal fade" id="myModal21" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-signin" method="post" action="{{  url('/') }}/admin/action/disable-device" enctype="multipart/form-data">
				 {{ csrf_field() }}
					Do you want to disable this device?
					<br><br>
					<input type="text" name="valsite25" id="valsite25" style="display:none;" required> 
					<button type="submit" class="btn btn-success" name="subsite" id="subsite">Yes</button>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">No</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>