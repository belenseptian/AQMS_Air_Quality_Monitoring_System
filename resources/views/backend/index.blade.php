@extends('backend.master') 

@section('title')
	
	@if(!isset($name) || $name=='')
		{{ 'Home' }}
	@elseif($name=='real-time-data')
		{{ 'Real Time Data' }}
	@elseif($name=='log-data')
		{{ 'Log Data' }}
	@elseif($name=='account')
		{{ 'Account Setting' }}
	@elseif($name=='device')
		{{ 'Device Setting' }}
	@elseif($name=='list-return-inventory')
		{{ 'Daftar Pengembalian Barang' }}
	@elseif($name=='list-borrow-inventory')
		{{ 'Daftar Peminjaman Barang' }}	
	@elseif($name=='activation')
		{{ 'Aktivasi Akun' }}
	@elseif($name=='list-activation')
		{{ 'Manajemen Akun' }}	
	@elseif($name=='change-password')
		{{ 'Change Password' }}	
	@endif
@endsection


@section('header-text')
		@php ($navbar = 'Home')
		@if(!isset($name) || $name=='')
			@php ($navbar = 'Home')
		@elseif($name=='real-time-data')
			@php ($navbar = 'Real Time Data')
		@elseif($name=='log-data')
			@php ($navbar = 'Log Data')
		@elseif($name=='account')
			@php ($navbar = 'Account Setting')
		@elseif($name=='device')
			@php ($navbar = 'Device Setting')
		@elseif($name=='list-return-inventory')
			@php ($navbar = 'Daftar Pengembalian Barang')
		@elseif($name=='list-borrow-inventory')
			@php ($navbar = 'Daftar Peminjaman Barang')		
		@elseif($name=='activation')
			@php ($navbar = 'Aktivasi Akun')		
		@elseif($name=='list-activation')
			@php ($navbar = 'Manajemen Akun')		
		@elseif($name=='change-password')
			@php ($navbar = 'Change Password')		
		@endif

@endsection

@section('breadcrumb')
		@if(!isset($name) || $name=='')
			{{ '' }}
		@elseif($name=='create-inventory')
			<li class="breadcrumb-item active" aria-current="page">Buat Inventaris Baru</li>
		@elseif($name=='real-time-data')
			<li class="breadcrumb-item active" aria-current="page">Real Time Data</li>
		@elseif($name=='log-data')
			<li class="breadcrumb-item active" aria-current="page">Log Data</li>
		@elseif($name=='account')
			<li class="breadcrumb-item active" aria-current="page">Account Setting</li>
		@elseif($name=='device')
			<li class="breadcrumb-item active" aria-current="page">Device Setting</li>
		@elseif($name=='list-borrow-inventory')
			<li class="breadcrumb-item active" aria-current="page">Daftar Peminjaman Barang</li>
		@elseif($name=='activation')
			<li class="breadcrumb-item active" aria-current="page">Aktivasi Akun</li>
		@elseif($name=='list-activation')
			<li class="breadcrumb-item active" aria-current="page">Manajemen Akun</li>
		@elseif($name=='change-password')
			<li class="breadcrumb-item active" aria-current="page">Change Password</li>
		@endif
    
@endsection


@section('content')
    @if(!isset($name) || $name=='')
		@include('backend.dashboard')
	@elseif($name=='real-time-data')
		@include('backend.log-data')
	@elseif($name=='log-data')
		@include('backend.data-log')
	@elseif($name=='account')
		@include('backend.account')
	@elseif($name=='device')
		@include('backend.device')
	@elseif($name=='list-return-inventory')
		@include('backend.list-return-inventory')	
	@elseif($name=='list-borrow-inventory')
		@include('backend.list-borrow-inventory')	
	@elseif($name=='activation')
		@include('backend.activation')	
	@elseif($name=='list-activation')
		@include('backend.list-activation')	
	@elseif($name=='change-password')
		@include('backend.change-password')	
	@else
		<script>
			window.location.href = "{{ url('/') }}/error";
		</script>
	@endif
	
	
@endsection