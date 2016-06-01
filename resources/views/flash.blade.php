@if (session()->has('flash_message')) 
	<div style="margin-top: 30px" class="alert {{ session('flash_status') }}">
		{{ session('flash_message') }}
	</div>
@endif