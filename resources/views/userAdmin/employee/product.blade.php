@include('mainHeader');
@include('userAdmin.employee.header');


@php
// $store_user_id = Auth::guard('')->user()->store_id;
$email = "alok@gm.com";
$kitchen = DB::table('user_admin_employees')->select('kitchen')->where('email', $email)->first();
$getData = explode(',' , $kitchen->kitchen);
// print_r($getData);
@endphp
{{-- @foreach($getData as $d)
	@if ($d == "C")
	<h1>create</h1>	

	@elseif ($d == "R")
	<h1>Read</h1>
	@elseif ($d == "U")
	<h1>update</h1>
	@elseif ($d == "D")
	<h1>DELETE</h1>
	@endif
@endforeach --}}
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
			<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
					<h2 class="mb-3 me-auto">Product List</h2>
					<div class="d-flex align-items-center flex-wrap">
					@foreach($getData as $d)
						@if ($d == "C")
						<button type="button" class="btn btn-primary btn-rounded me-3 mb-2" data-bs-toggle="modal" data-bs-target="#add_new_product"><i class="fas fa-user-friends me-2"></i>+ Add New Product</button>
						@endif
					@endforeach
						{{-- <button type="button" class="btn btn-primary btn-rounded me-3 mb-2" data-bs-toggle="modal" data-bs-target="#add_new_product"><i class="fas fa-user-friends me-2"></i>+ Add New Product</button> --}}
					</div>
				</div>
                <div class="row">
					
                    <div class="col-lg-12 col-xl-6">
                        <div class="card">
                            <div class="card-body">
								<div class="menu-product d-flex">
									<img src="/images/product/pizz1.jpg">
									<div class="content-detail-wrap">	
										<div>
											<h4>Margherita Pizza</h4>
											<span>Lots of cheese</span>
										</div>
										<div class="mt-4 d-flex justify-content-between align-items-center">
											<div>
												<h5 class="mb-0"><span class="fs-14 me-2">start From</span>$15.00</h5>
												<span class="text-danger">Customization available</span>
											</div>
											<div>
												@foreach($getData as $d)
													@if ($d == "U")
													<button type="button" class="btn btn-primary btn-rounded me-3 mb-2" data-bs-toggle="modal" data-bs-target="#edit_product">Edit</button>
													@elseif($d == "D")
													<button type="button" class="btn btn-danger btn-rounded me-3 mb-2">Delete</button>

													@endif
												@endforeach
												
											</div>
										</div>
									</div>	
								</div>
                            </div>
                        </div>
					</div>
					
					<!-- review -->
					
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		<div class="modal fade bd-example-modal-lg" id="add_new_product" aria-modal="true" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Modal title</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal">
						</button>
					</div>
					<div class="modal-body">
					<form>
						<div class="form-row">
							
							<div class="row">
								<div class="mb-3 col-md-6">
									<label class="form-label">Product Name</label>
									<input type="text" class="form-control" placeholder="Product Name">
								</div>
								<div class="mb-4 col-md-3">
									<label class="form-label">Product Price </label>
									<input type="text" class="form-control" placeholder="Product Price">
								</div>
								<div class="mb-4 col-md-3">
									<label class="form-label">Product Image </label>
									<input type="file" class="form-control" placeholder="Product Image">
								</div>
								
								<div class="table-responsive-sm">
												
									<table class="table" id="service_info_table">
										<thead>
										<tr>
											<th><label for="">Ingredient Name</label></th>
											<th><label for="">Ingredient Quantity</label></th>
											<th style="width:5%"><button type="button" onclick="addDynamicServiceField()" id="add_row" class="btn btn-default"><i class="fa fa-plus" style="color: green;"></i></button></th>
										</tr>
										</thead>

										<tbody>
											<input type="hidden" name="count_service" id="count_service" value="1">
											<tr id="row_1">
																
												<td><input type="text" name="ingredent_name[]" id="ingredent_name_1" class="form-control" ></td>
												<td><input type="text" name="ingredent_qty[]" id="ingredent_qty_1" class="form-control"></td>																	
							
												<td><button type="button"  class="btn btn-sm btn-danger" onclick="removeServiceRow(1)"><i class="fas fa-times"></i></button></td>
											</tr>
										</tbody>
									</table>
								</div>     
							</div>
								
							<!-- </div> -->
						</div>
					</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
        </div>
		<div class="modal fade bd-example-modal-lg" id="edit_product" aria-modal="true" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Modal title</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal">
						</button>
					</div>
					<div class="modal-body">
					<form>
						<div class="form-row">
							
							<div class="row">
								<div class="mb-3 col-md-8">
									<label class="form-label">Product Name</label>
									<input type="text" class="form-control" placeholder="Product Name">
								</div>
								<div class="mb-4 col-md-4">
									<label class="form-label">Product Price </label>
									<input type="text" class="form-control" placeholder="Product Price">
								</div>
								
								<div class="table-responsive-sm">
												
									<table class="table" id="service_info_table">
										<thead>
										<tr>
											<th><label for="">Ingredient Name</label></th>
											<th><label for="">Ingredient Quantity</label></th>
											<th style="width:5%"><button type="button" onclick="addDynamicServiceField()" id="add_row" class="btn btn-default"><i class="fa fa-plus" style="color: green;"></i></button></th>
										</tr>
										</thead>

										<tbody>
											<input type="hidden" name="count_service" id="count_service" value="1">
											<tr id="row_1">
																
												<td><input type="text" name="ingredent_name[]" id="ingredent_name_1" class="form-control" ></td>
												<td><input type="text" name="ingredent_qty[]" id="ingredent_qty_1" class="form-control"></td>																	
							
												<td><button type="button"  class="btn btn-sm btn-danger" onclick="removeServiceRow(1)"><i class="fas fa-times"></i></button></td>
											</tr>
										</tbody>
									</table>
								</div>     
							</div>
								
							<!-- </div> -->
						</div>
					</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
        </div>
		
@include('mainFooter');
<script>
	function addDynamicServiceField(){
             
			 var count_table_tbody_tr = $("#count_service").val();
			 var row_id = ++count_table_tbody_tr;
			 $("#count_service").val(row_id);
			 $('#service_info_table tbody').append(`<tr id="row">		   

				<td><input type="text" name="ingredent_name[]" id="ingredent_name" class="form-control"></td>
				<td><input type="text" name="ingredent_qty[]" id="ingredent_qty" class="form-control"></td>			

				<td><button type="button"  class="btn btn-sm btn-danger" onclick="removeServiceRow"><i class="fas fa-times"></i></button></td>
		</tr>`);
	
	   }
	  
	   
	   function removeServiceRow(val){
	   
		   $("#service_info_table tbody tr#row_"+val).remove();
		   var count= $("#count_service").val();
		   count = count-1;

		   $("#count_service").val(count);
		   calculation();
		 
		 }
</script>

