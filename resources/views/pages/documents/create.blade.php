@extends('master')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact">
			<div class="card-header">
				<h3 class="card-title">Enter Document Details</h3>
			</div>
			<!--begin::Form-->

			<form class="form" action="{{route('documents.store')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="card-body">
					<div class="form-group row">
						<style>
							.type_doc select{
								width: 100%;
								color: gray;
								height: 37px;
								padding: 0px 4px;
							}
						</style>
						<div class="col-lg-2  type_doc">
							<label>File Type:</label>
							<select id="page_type" name="page_type" class="form-select" aria-label="Default select example">
								<option selected>Page Type</option>
								<option value="document" selected>Document</option>
								<option value="folder">Folder</option>
							</select>
						</div>
						<div class="col-lg-5">
							<label>Name:</label>
							<input name="name" type="text" class="form-control" placeholder="Enter Document name" required/>
						</div>
						<div class="col-lg-5" id="file">
							<label>File Browser</label>
							<div></div>
							<div class="custom-file">
								<input name="document_file" type="file" class="custom-file-input" id="customFile"/>
								<label class="custom-file-label" for="customFile">Choose Document</label>
							</div>
						</div>
					</div>
					<div class="form-group row" id="document_folder">
						<div class="col-lg-6">
							<label>Document Folder:</label>
							{{Form::select('document_folder_id', $docFolder, $docId, ['class' =>  'form-control', 'autocomplete' => 'off','required'=>true])}}
						</div>
						<div class="col-lg-6">
							<label>Fiscal Year</label>
							{{Form::select('fiscal_year_id', $fiscalYear, null, ['class' =>  'form-control', 'autocomplete' => 'off'])}}
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-12">
							<label>Document Folder:</label>
							<label>Description:</label>
							<textarea name="description" type="text" class="form-control" placeholder="Enter Description" rows="4"></textarea>		
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-lg-6">
							<input name="main_sub" type="hidden" class="form-control" value="{{$main_sub}}">
							<button type="submit" class="btn btn-primary mr-2">Save</button>
							<button type="reset" class="btn btn-secondary">Cancel</button>
						</div>
						<div class="col-lg-6 text-right">
							<button type="reset" class="btn btn-danger">Reset</button>
						</div>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
	</div>
</div>	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>
		$('#page_type').on('change', function() {
			var type = this.value;
			if(type=="folder"){
				$('#file').hide();
				$('#document_folder').hide();
			}
			else if(type=="document"){
				$('#file').show();
				$('#document_folder').show();
			}
		});
	</script>
@endsection
<!-- @section('jsLibrary')
<script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
@endsection -->