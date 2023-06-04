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
						<?php $__currentLoopData = $log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($item->serial); ?></td>
							<td><?php echo e($item->country); ?></td>
							<td><?php echo e($item->region); ?></td>
							<td><?php echo e($item->co2); ?></td>
							<td><?php echo e($item->date); ?></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
								
						<?php /**PATH /home/u558940034/domains/ppihyderabad.com/public_html/aqms/resources/views/backend/data-log.blade.php ENDPATH**/ ?>