@extend('admin.pages.home')
@section('content')

<div class="container">		
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h4 class="panel-title" style="padding:12px 0px;font-size:18px;"><strong>Upload Share Holding  Data</strong></h4>
		  </div>
		  <div class="panel-body">

		  		@if ($message = Session::get('success'))
					<div class="alert alert-success" role="alert">
						{{ Session::get('success') }}
					</div>
				@endif

				@if ($message = Session::get('error'))
					<div class="alert alert-danger" role="alert">
						{{ Session::get('error') }}
					</div>
				@endif

				<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
					<input type="file" name="import_file" />
					{{ csrf_field() }}
					<br/>

					<button class="btn btn-primary">Import CSV or Excel File</button>

				</form>

		  </div>
		</div>
	  </div>
@endsection