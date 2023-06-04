@if (session('status'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>{{ session('status') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

<div style="display:none;" id="rmv" class="alert alert-warning alert-dismissible fade show" role="alert">
	<strong>The selected accounts have been removed</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
	

<div style="display:none;" id="act" class="alert alert-warning alert-dismissible fade show" role="alert">
	<strong>The selected accounts have been activated</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
	

<div style="display:none;" id="dct" class="alert alert-warning alert-dismissible fade show" role="alert">
	<strong>The selected accounts have been deactivated</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>


<table class="table8" id="table8">
    <thead>
        <tr>
			<th>
			
				<a data-toggle="tooltip" title="Double click to select all accounts" id="chkall" class='btn btn-default'><i class="fas fa-fw fa fa-check-square"></i></a>
				<a data-toggle="tooltip" title="Remove" id="trsh" class='btn btn-danger'><i class="fas fa-fw fa fa-trash"></i></a>
				<a data-toggle="tooltip" title="Activate" id="actve" class='btn btn-success'><i class="fas fa-fw fa fa-check"></i></a>
				<a data-toggle="tooltip" title="Deactivate" id="deactve" class='btn btn-warning'><i class="fas fa-fw fa fa-times"></i></a>
			</th>
			<th class="text-center" style="display:none;">Nama</th>
            <th class="text-center">Username</th>
            <th class="text-center">Date Registered</th>
            <th class="text-center">Activation Status</th>
			<th></th>
			<th></th>
        </tr>
    </thead>
    <tbody>
        
		@foreach($account as $item)
			<tr id="{{ $item->id }}">
			<td><input class="checkBoxClass" type="checkbox" name="accid[]" value="{{ $item->id }}" /></td>
			<td style="display:none;">{{ $item->id }}</td>
			<td>{{ $item->username }}</td>
			<td>{{ $item->registered_date }}</td>
			@if($item->activation==0)
				<td>Deactivated</td>
			@else
				<td>Activated</td>
			@endif
			
			@if($item->activation==1)
				<td><button class='btn btn-warning' data-toggle='modal' data-backdrop='static' data-keyboard='false' data-target='#myModal22'><i class="fas fa-fw fa fa-times"></i> Deactivate</button></td>
			@else
				<td><button class='btn btn-success' data-toggle='modal' data-backdrop='static' data-keyboard='false' data-target='#myModal24'><i class="fas fa-fw fa fa-check"></i> Activate</button></td>
			@endif
			
			<td><button class='btn btn-danger' data-toggle='modal' data-backdrop='static' data-keyboard='false' data-target='#myModal23'><i class="fas fa-fw fa fa-trash"></i> Remove</button></td>
			</tr>
		@endforeach
         
        
    </tbody>
</table>

<div class="modal fade" id="myModal22" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">
				<form class="form-signin" method="post" action="{{  url('/') }}/admin/action/block-activation" enctype="multipart/form-data">
				 {{ csrf_field() }}
					Do you want to deactivate this account?
					<br><br>
					<input type="text" name="valsite22" id="valsite22" style="display:none;" required> 
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

<div class="modal fade" id="myModal23" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-signin" method="post" action="{{  url('/') }}/admin/action/remove-activation" enctype="multipart/form-data">
				 {{ csrf_field() }}
					Do you want to remove this account?
					<br><br>
					<input type="text" name="valsite23" id="valsite23" style="display:none;" required> 
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


<div class="modal fade" id="myModal24" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-signin" method="post" action="{{  url('/') }}/admin/action/activate-activation" enctype="multipart/form-data">
				 {{ csrf_field() }}
					Do you want to activate this account?
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

<div class="modal fade" id="myModal25" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-signin" method="post" action="{{  url('/') }}/admin/action/activate-activation" enctype="multipart/form-data">
				 {{ csrf_field() }}
					Do you want to remove these selected accounts?
					<br><br>
					<input type="text" name="valsite24" id="valsite24" style="display:none;" required> 
					<button id="t" type="button" class="btn btn-success" name="subsite" id="subsite">Yes</button>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">No</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<div class="modal fade" id="myModal26" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-signin" method="post" action="{{  url('/') }}/admin/action/activate-activation" enctype="multipart/form-data">
				 {{ csrf_field() }}
					Do you want to activate these selected accounts?
					<br><br>
					<input type="text" name="valsite24" id="valsite24" style="display:none;" required> 
					<button id="u" type="button" class="btn btn-success" name="subsite" id="subsite">Yes</button>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">No</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<div class="modal fade" id="myModal27" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-signin" method="post" action="{{  url('/') }}/admin/action/activate-activation" enctype="multipart/form-data">
				 {{ csrf_field() }}
					Do you want to deactivate these selected accounts?
					<br><br>
					<input type="text" name="valsite24" id="valsite24" style="display:none;" required> 
					<button id="v" type="button" class="btn btn-success" name="subsite" id="subsite">Yes</button>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">No</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>