@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Edit Category</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Edit Category</li>
			</ol>
		</nav>
	</div>
 





</div>



<!--end breadcrumb-->
<div class="container">
	<div class="main-body">
		<div class="row">
			 



	 

			<div class="col-lg-8">



<form method="post" action="{{ route('category.update') }}" enctype="multipart/form-data"> 
	 @csrf

	 <input type="hidden" name="id" value="{{ $category->id }}">

				<div class="card">
					<div class="card-body">
						<div class="row mb-3">
	<div class="col-sm-3">
		<h6 class="mb-0">Category Name </h6>
	</div>
	<div class="col-sm-9 text-secondary">
		<input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}">
		@error('category_name')
		<span class="text-danger">{{ $message }}</span>
		@enderror

	</div>
</div>
 
 
<div class="mb-3">
 <label for="formFile" class="form-label">Upload Category Image</label>
	 <input class="form-control" name="category_image" type="file" id="image">
	 </div>


	 <div class="mb-3">

	 	<img id="showImage" src="{{ asset($category->category_image)  }}" style="width:100px; height: 100px;" >
 
	 </div>



 
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-9 text-secondary">
		<input type="submit" class="btn btn-primary px-4" value="Update Category">
	</div>
</div>
					</div>
				</div>


</form>
				 
 



							</div>
						</div>
					</div>
				</div>
			</div>
		</div>




<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);

		});
	});	
</script>







@endsection