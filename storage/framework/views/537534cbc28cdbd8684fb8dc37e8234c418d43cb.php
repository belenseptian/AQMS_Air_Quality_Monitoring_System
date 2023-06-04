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
			<h5 class="card-header">Daily Statistics</h5>
			<div class="card-body p-4">
				<center><h6>Updated on <?php echo e($log[count($log)-1]->date); ?></h6></center>
				<div id="chart-container">
					<canvas id="graphCanvas"></canvas>
				</div>
			</div>
		</div>
	</div>
   
</div>
						
							<?php /**PATH /home/u558940034/domains/ppihyderabad.com/public_html/aqms/resources/views/backend/dashboard.blade.php ENDPATH**/ ?>