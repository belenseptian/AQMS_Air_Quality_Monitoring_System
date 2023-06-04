 

<?php $__env->startSection('title'); ?>
	
	<?php if(!isset($name) || $name==''): ?>
		<?php echo e('Home'); ?>

	<?php elseif($name=='real-time-data'): ?>
		<?php echo e('Real Time Data'); ?>

	<?php elseif($name=='log-data'): ?>
		<?php echo e('Log Data'); ?>

	<?php elseif($name=='account'): ?>
		<?php echo e('Account Setting'); ?>

	<?php elseif($name=='device'): ?>
		<?php echo e('Device Setting'); ?>

	<?php elseif($name=='list-return-inventory'): ?>
		<?php echo e('Daftar Pengembalian Barang'); ?>

	<?php elseif($name=='list-borrow-inventory'): ?>
		<?php echo e('Daftar Peminjaman Barang'); ?>	
	<?php elseif($name=='activation'): ?>
		<?php echo e('Aktivasi Akun'); ?>

	<?php elseif($name=='list-activation'): ?>
		<?php echo e('Manajemen Akun'); ?>	
	<?php elseif($name=='change-password'): ?>
		<?php echo e('Change Password'); ?>	
	<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-text'); ?>
		<?php ($navbar = 'Home'); ?>
		<?php if(!isset($name) || $name==''): ?>
			<?php ($navbar = 'Home'); ?>
		<?php elseif($name=='real-time-data'): ?>
			<?php ($navbar = 'Real Time Data'); ?>
		<?php elseif($name=='log-data'): ?>
			<?php ($navbar = 'Log Data'); ?>
		<?php elseif($name=='account'): ?>
			<?php ($navbar = 'Account Setting'); ?>
		<?php elseif($name=='device'): ?>
			<?php ($navbar = 'Device Setting'); ?>
		<?php elseif($name=='list-return-inventory'): ?>
			<?php ($navbar = 'Daftar Pengembalian Barang'); ?>
		<?php elseif($name=='list-borrow-inventory'): ?>
			<?php ($navbar = 'Daftar Peminjaman Barang'); ?>		
		<?php elseif($name=='activation'): ?>
			<?php ($navbar = 'Aktivasi Akun'); ?>		
		<?php elseif($name=='list-activation'): ?>
			<?php ($navbar = 'Manajemen Akun'); ?>		
		<?php elseif($name=='change-password'): ?>
			<?php ($navbar = 'Change Password'); ?>		
		<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
		<?php if(!isset($name) || $name==''): ?>
			<?php echo e(''); ?>

		<?php elseif($name=='create-inventory'): ?>
			<li class="breadcrumb-item active" aria-current="page">Buat Inventaris Baru</li>
		<?php elseif($name=='real-time-data'): ?>
			<li class="breadcrumb-item active" aria-current="page">Real Time Data</li>
		<?php elseif($name=='log-data'): ?>
			<li class="breadcrumb-item active" aria-current="page">Log Data</li>
		<?php elseif($name=='account'): ?>
			<li class="breadcrumb-item active" aria-current="page">Account Setting</li>
		<?php elseif($name=='device'): ?>
			<li class="breadcrumb-item active" aria-current="page">Device Setting</li>
		<?php elseif($name=='list-borrow-inventory'): ?>
			<li class="breadcrumb-item active" aria-current="page">Daftar Peminjaman Barang</li>
		<?php elseif($name=='activation'): ?>
			<li class="breadcrumb-item active" aria-current="page">Aktivasi Akun</li>
		<?php elseif($name=='list-activation'): ?>
			<li class="breadcrumb-item active" aria-current="page">Manajemen Akun</li>
		<?php elseif($name=='change-password'): ?>
			<li class="breadcrumb-item active" aria-current="page">Change Password</li>
		<?php endif; ?>
    
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php if(!isset($name) || $name==''): ?>
		<?php echo $__env->make('backend.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($name=='real-time-data'): ?>
		<?php echo $__env->make('backend.log-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($name=='log-data'): ?>
		<?php echo $__env->make('backend.data-log', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($name=='account'): ?>
		<?php echo $__env->make('backend.account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($name=='device'): ?>
		<?php echo $__env->make('backend.device', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($name=='list-return-inventory'): ?>
		<?php echo $__env->make('backend.list-return-inventory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
	<?php elseif($name=='list-borrow-inventory'): ?>
		<?php echo $__env->make('backend.list-borrow-inventory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
	<?php elseif($name=='activation'): ?>
		<?php echo $__env->make('backend.activation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
	<?php elseif($name=='list-activation'): ?>
		<?php echo $__env->make('backend.list-activation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
	<?php elseif($name=='change-password'): ?>
		<?php echo $__env->make('backend.change-password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
	<?php else: ?>
		<script>
			window.location.href = "<?php echo e(url('/')); ?>/error";
		</script>
	<?php endif; ?>
	
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u558940034/domains/ppihyderabad.com/public_html/aqms/resources/views/backend/index.blade.php ENDPATH**/ ?>