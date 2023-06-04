<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
	<link rel="shortcut icon" href="{{ url('/') }}/public/favicon.ico">
    <link rel="stylesheet" href="{{ url('/') }}/public/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{ url('/') }}/public/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/public/assets/libs/css/style.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
	<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/css/jquery.dataTables.css">
	
    <title>@yield('title')</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="{{ url('/') }}/admin">AQMS v0.1</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                       
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <!--<span class="indicator"></span>--></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title">There is no notification</div>
                                  
                                </li>
                               
                            </ul>
                        </li>
                    
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-user-circle"></i></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
								@if(isset($_COOKIE['cookie_ngayau_user']) && $_COOKIE['cookie_ngayau_user']!='')
									<h5 class="mb-0 text-white nav-user-name">{{ $_COOKIE['cookie_ngayau_user'] }}</h5>
								@else
									<h5 class="mb-0 text-white nav-user-name">{{ Session::get('user_ngayauv2.0') }}</h5>
								@endif
	
                                    
                                    <span class="status"></span><span class="ml-2">Online</span>
                                </div>
                                <a class="dropdown-item" href="{{ url('/') }}/admin/logout"><i class="fas fa-power-off mr-2"></i>Log Out</a>
								<a class="dropdown-item" href="{{ url('/') }}/admin/content/change-password"><i class="fas fa-key"></i> Change Password</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ url('/') }}/admin"><i class="fa fa-fw fa-user-circle"></i>Home <span class="badge badge-success">6</span></a>
                               
                            </li>
								
							<li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa fa-fw fa-database"></i>Data</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                       
											<a class="nav-link" href="{{ url('/') }}/admin/content/real-time-data">Real Time<span class="badge badge-secondary">New</span></a>
                                        </li>
										<li class="nav-item">
                                       
											<a class="nav-link" href="{{ url('/') }}/admin/content/log-data">Log<span class="badge badge-secondary">New</span></a>
                                        </li>
                      
                                    </ul>
                                </div>
							</li>
							
							@if(isset($_COOKIE['cookie_ngayau_admin']))
									@if($_COOKIE['cookie_ngayau_admin']==1)
										<li class="nav-item">
											<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fa fa-fw fa-cog"></i>Setting</a>
											<div id="submenu-5" class="collapse submenu" style="">
												<ul class="nav flex-column">
													<li class="nav-item">											   
														<a class="nav-link" href="{{ url('/') }}/admin/content/account">Account<span class="badge badge-secondary">New</span></a>
													</li>
													<li class="nav-item">
												   
														<a class="nav-link" href="{{ url('/') }}/admin/content/device">Device<span class="badge badge-secondary">New</span></a>
													</li>
												
												
								  
												</ul>
											</div>
										</li>
									@endif
							@else
									@if(Session::get('admin_ngayauv2.0')==1)
										<li class="nav-item">
											<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fa fa-fw fa-cog"></i>Setting</a>
											<div id="submenu-5" class="collapse submenu" style="">
												<ul class="nav flex-column">
													<li class="nav-item">
												   
														<a class="nav-link" href="{{ url('/') }}/admin/content/account">Account<span class="badge badge-secondary">New</span></a>
													</li>
													<li class="nav-item">
												   
														<a class="nav-link" href="{{ url('/') }}/admin/content/device">Device<span class="badge badge-secondary">New</span></a>
													</li>
												
								  
												</ul>
											</div>
										</li>
									@endif
							@endif
					
                           
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
								@yield('header-text')
                               
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}/admin" class="breadcrumb-link">Home</a></li>
											@yield('breadcrumb')
											<!--
                                            <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template</li>
											-->
									
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
						@yield('content')
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2021 AQMS by Belen Septian
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ url('/') }}/public/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
	<script src="{{ url('/') }}/public/js/Chart.min.js"></script>
    <script src="{{ url('/') }}/public/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="{{ url('/') }}/public/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="{{ url('/') }}/public/assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="{{ url('/') }}/public/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="{{ url('/') }}/public/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="{{ url('/') }}/public/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="{{ url('/') }}/public/assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="{{ url('/') }}/public/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="{{ url('/') }}/public/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="{{ url('/') }}/public/assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="{{ url('/') }}/public/assets/libs/js/dashboard-ecommerce.js"></script>
	<script type="text/javascript" language="javascript" src="{{ url('/') }}/public/js/jquery.dataTables.min.js"></script>
	<script>
		$.ajaxSetup({

			headers: {

				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			}

		});

		
		$(document).ready(function() {
			
			$.ajax({

				type:'POST',

				url:"{{ route('ajaxRequest.post') }}",

				data:{data1:'', data2:'', data3:''},

				success:function(data){
					console.log(data);
					var time = [];
					var co2 = [];

					for (var i in data) {
						time.push(data[i].date);
						co2.push(data[i].co2);
						
					}

					var chartdata = {
						labels: time,
						datasets: [
							{
								label: "Carbon Dioxide Concentration in the Air (ppm)",
								fill:true,
								borderColor: '#46d5f1',
								hoverBackgroundColor: '#46d5f1',
								hoverBorderColor: '#46d5f1',
								data: co2
							},
							/*
							{
								label: "Air Quality Meter's Value in ppm",
								borderColor: '#46d5f1',
								hoverBackgroundColor: '#CCCCCC',
								hoverBorderColor: '#666666',
								data: [10, 20, 60, 95, 64, 78, 90, 100, 70,40,70]
							}
							*/
						]
					};

					var graphTarget = $("#graphCanvas");

					var barGraph = new Chart(graphTarget, {
						type: 'line',
						data: chartdata
					});
				  

				}

			});
			var table4 = $('#table4').DataTable();
			$('#table4 tbody').on( 'click', 'button', function () {
				var dataku = table4.row( $(this).parents('tr') ).data();
				//$("#valsite18").attr("src","{{ url('/') }}/storage/app/"+dataku[1]);			
				
			});	
			$('#table4 tbody').on( 'click', 'button', function () {
				$("#loadlog").show();
				var dataku = table4.row( $(this).parents('tr') ).data();
				$("#simku").val(dataku[0]);
				$("#rfr").click(function(){
					$("#loadlog").show();
					
					$.ajax({

					   type:'POST',

					   url:"{{ route('ajaxRequestData.post') }}",

					   data:{data1:$("#simku").val(), data2:'', data3:''},

					   success:function(data){
							$("#loadlog").hide();
							
							$("#co2").html(data[0].co2+" ppm");
							$("#temp").html(data[0].temp+" &deg;C");
							$("#hum").html(data[0].hum+" %");
							$("#hix").html(data[0].hix+" &deg;C");
							$("#date").html(data[0].date);
					   }

					});
				});
						
				$.ajax({

				   type:'POST',

				   url:"{{ route('ajaxRequestData.post') }}",

				   data:{data1:$("#simku").val(), data2:'', data3:''},

				   success:function(data){
						$("#loadlog").hide();
						
						$("#co2").html(data[0].co2+" ppm");
						$("#temp").html(data[0].temp+" &deg;C");
						$("#hum").html(data[0].hum+" %");
						$("#hix").html(data[0].hix+" &deg;C");
						$("#date").html(data[0].date);
				   }

				});
			
			});
			//not used
			var table00 = $('#table00').DataTable();
			$('#table00 tbody').on( 'click', 'button', function () {
				var dataku = table00.row( $(this).parents('tr') ).data();
				//$("#valsite18").attr("src","{{ url('/') }}/storage/app/"+dataku[1]);
				$("#serial").val(dataku[0]);
				$("#country").val(dataku[1]);
				$("#region").val(dataku[2]);
				$("#valsite24").val(dataku[0]);
				$("#valsite25").val(dataku[0]);					
			});	
			//not used
			var table5 = $('#table5').DataTable();
			$('#table5 tbody').on( 'click', 'button', function () {
				var dataku = table5.row( $(this).parents('tr') ).data();		
				
			});
			//not used
			$("#closeview").click(function(){
				$("#fuel").html("");
				$("#rh").html("");
				$("#volt").html("");
				$("#curr").html("");
				$("#time").html("");
				$("#date").html("");
			});
			//not used
			$("#closevie").click(function(){
				$("#fuel").html("");
				$("#rh").html("");
				$("#volt").html("");
				$("#curr").html("");
				$("#time").html("");
				$("#date").html("");
			});
			
			var table8 = $('#table8').DataTable();
			$('#table8 tbody').on( 'click', 'button', function () {
				var dataku = table8.row( $(this).parents('tr') ).data();
				$("#valsite22").val(dataku[1]);
				$("#valsite23").val(dataku[1]);
				$("#valsite24").val(dataku[1]);
			});
			
			$("#chkall").dblclick(function () {
				$(".checkBoxClass").prop('checked', true);
			});
			
			$("#chkall").click(function () {
				$(".checkBoxClass").prop('checked', false);
			});
			
			$("#actve").click(function(){
				//$('#myModal25').modal('show');
				
				var checkedNum = $('.checkBoxClass:checked').length;
				if (!checkedNum) {
					// User didn't check any checkboxes
					alert("Please select any accounts!");
				}
				else
				{
					$('#myModal26').modal('show');
				}
				
				//table8.row('#1').data(["a","a","a","a","a","a","a"]).draw();
			});
			
			$("#trsh").click(function(){
				//$('#myModal25').modal('show');
				var checkedNum = $('.checkBoxClass:checked').length;
				if (!checkedNum) {
					// User didn't check any checkboxes
					alert("Please select any accounts!");
				}
				else
				{
					$('#myModal25').modal('show');
				}
			});
			
			$("#deactve").click(function(){
				//$('#myModal25').modal('show');
				
				var checkedNum = $('.checkBoxClass:checked').length;
				if (!checkedNum) {
					// User didn't check any checkboxes
					alert("Please select any accounts!");
				}
				else
				{
					$('#myModal27').modal('show');
				}
				
				//table8.row('#1').data(["a","a","a","a","a","a","a"]).draw();
			});
			
			$("#t").click(function () {
				var cb = [];
				$.each($('.checkBoxClass:checked'), function() {
					cb.push($(this).val());
					
				});
				
				$.ajax({

				   type:'POST',

				   url:"{{ route('ajaxRequestAcc.post') }}",

				   data:{data1:cb, data2:'', data3:''},

				   success:function(data){
						//alert(data);
						//table8.row('#'+data).remove().draw( false );
						$.each( data, function( i, val ) {
							table8.row('#'+val).remove().draw( false );
						});
						
						$('#myModal25').modal('hide');
						$("#rmv").css("display","block");
				   }

				});
			
				//table8.row('#3').remove().draw( false );
				
			});
			
			$("#u").click(function () {
				var cb = [];
				$.each($('.checkBoxClass:checked'), function() {
					cb.push($(this).val());
					
				});
				
				$.ajax({

				   type:'POST',

				   url:"{{ route('ajaxRequestActivate.post') }}",

				   data:{data1:cb, data2:'', data3:''},

				   success:function(data){
						//alert(data.length);
						//table8.row('#'+data).remove().draw( false );
						for(i=0; i<data.length; i++)
						{
							table8.row('#'+data[i].id).data(['<td><input class="checkBoxClass" type="checkbox" name="accid[]" value="'+data[i].id+'" /></td>','<td style="display:none;">'+data[i].id+'</td>','<td>'+data[i].username+'</td>','<td>'+data[i].registered_date+'</td>','<td>Activated</td>','<td><button class="btn btn-warning" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal22"><i class="fas fa-fw fa fa-times"></i> Deactivate</button></td>','<td><button class="btn btn-danger" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal23"><i class="fas fa-fw fa fa-trash"></i> Remove</button></td>']).draw();
						}
						
						$('#myModal26').modal('hide');
						$("#act").css("display","block");
				   }

				});
			
				//table8.row('#3').remove().draw( false );
				
			});
			
			$("#v").click(function () {
				var cb = [];
				$.each($('.checkBoxClass:checked'), function() {
					cb.push($(this).val());
					
				});
					
				$.ajax({

				   type:'POST',

				   url:"{{ route('ajaxRequestDeactivate.post') }}",

				   data:{data1:cb, data2:'', data3:''},

				   success:function(data){
						//alert(data.length);
						//table8.row('#'+data).remove().draw( false );
						for(i=0; i<data.length; i++)
						{
							table8.row('#'+data[i].id).data(['<td><input class="checkBoxClass" type="checkbox" name="accid[]" value="'+data[i].id+'" /></td>','<td style="display:none;">'+data[i].id+'</td>','<td>'+data[i].username+'</td>','<td>'+data[i].registered_date+'</td>','<td>Deactivated</td>','<td><button class="btn btn-success" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal22"><i class="fas fa-fw fa fa-check"></i> Activate</button></td>','<td><button class="btn btn-danger" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal23"><i class="fas fa-fw fa fa-trash"></i> Remove</button></td>']).draw();
						}
						
						$('#myModal27').modal('hide');
						$("#dct").css("display","block");
				   }

				});
				
				//table8.row('#3').remove().draw( false );
				
			});	
		
		});
			
	</script>
</body>
 
</html>