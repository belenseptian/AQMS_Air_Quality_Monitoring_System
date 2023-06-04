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
			<h5 class="card-header">Log Data</h5>
			<div class="card-body p-4">
				<table class="table5" id="table5">
					<thead>
						<tr>
							<th class="text-center">Device ID</th>
							<th class="text-center">Country</th>
							<th class="text-center">Region</th>
							<th class="text-center">CO<i style="font-size:10px;">2</i></th>
							<th class="text-center">Date</th>
						</tr>
					</thead>
					<tbody>
						@foreach($log as $item)
						<tr>
							<td>{{ $item->serial }}</td>
							<td>{{ $item->country }}</td>
							<td>{{ $item->region }}</td>
							<td>{{ $item->co2 }}</td>
							<td>{{ $item->date }}</td>
						</tr>
						@endforeach   
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
								
						