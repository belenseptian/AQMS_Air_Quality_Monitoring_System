<?php if(session('status')): ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong><?php echo e(session('status')); ?></strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif; ?>
<div class="row">
	<!-- ============================================================== -->

	<!-- ============================================================== -->

	<!-- recent orders  -->
	<!-- ============================================================== -->
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="card">
			<h5 class="card-header">Real Time Data</h5>
			<div class="card-body p-4">
				<table class="table4" id="table4">
					<thead>
						<tr>
							<th class="text-center">Device ID</th>
							<th class="text-center">Country</th>
							<th class="text-center">Region</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $main; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($item->serial); ?></td>
							<td><?php echo e($item->country); ?></td>
							<td><?php echo e($item->region); ?></td>
							<td><button class='btn btn-primary' data-toggle='modal' data-backdrop='static' data-keyboard='false' data-target='#myModal17'><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
					</tbody>
				</table>
			</div>
		</div>
	</div>
	   
</div>
<div class="modal fade" id="myModal17" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="closeview" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<input type="text" name="simku" id="simku" style="display:none;">
				<table class="table table-striped">
					<tbody>
						<tr>
							<td>CO<i style="font-size:10px">2</i></td>
							<td>Temp</td>
							<td>Hum</td>
							<td>Hix</td>
							<td>Date</td>
						</tr>
						<tr>
							<td id="co2"></td>
							<td id="temp"></td>
							<td id="hum"></td>
							<td id="hix"></td>
							<td id="date"></td>
						</tr>
					</tbody>
				</table>
				<center id="loadlog"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></center>
				<div id="gagalkoneksi" class="alert alert-danger" style="display:none;">There is a connection problem!</div>
			</div>
			<div class="modal-footer">
				<button id="rfr" type="button" class="btn btn-default btn-sm">
					Refresh
				</button>
				<button type="button" id="closevie" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
							<?php /**PATH /home/u558940034/domains/ppihyderabad.com/public_html/aqms/resources/views/backend/log-data.blade.php ENDPATH**/ ?>