<div class="row">
	<!-- ============================================================== -->

	<!-- ============================================================== -->

	<!-- recent orders  -->
	<!-- ============================================================== -->
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="card">
			<h5 class="card-header">Change Password</h5>
			<div class="p-5 card-body p-0">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<form method="post" action="{{  url('/') }}/admin/content/change-password" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group row">
								<label for="sandilama" class="col-sm-3 col-form-label">Current Password</label>
								<div class="col-sm-9">
									<input style="display:none;" name="username" type="text" value="{{ Session::get('user_ngayauv2.0') }}">
									<input name="sandilama" type="password" class="form-control" id="sandilama" placeholder="Current Password" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="sandibaru" class="col-sm-3 col-form-label">New Password</label>
								<div class="col-sm-9">
									<input name="sandibaru" type="password" class="form-control" id="sandibaru"
									placeholder="New Password" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="ulangsandi" class="col-sm-3 col-form-label">Repeat New Password</label>
								<div class="col-sm-9">
									<input name="ulangsandi" type="password" class="form-control" id="ulangsandi"
									placeholder="Repeat New Password" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="offset-sm-3 col-sm-9">
									<button type="submit" class="btn btn-primary">Change Password</button>
								</div>
							</div>

						</form>
						@if (session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
