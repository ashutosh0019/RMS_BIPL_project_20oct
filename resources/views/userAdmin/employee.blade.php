@include('userAdmin.header');
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Employee</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form action="{{route('userAdmin.employee') }}" class="needs-validation" novalidate method="post" id="EmployeeAddBySuperAdmin" >
                                        @if(Session::get('success'))
                                            <div class="alert alert-success">
                                                {{Session::get('success')}}
                                            </div>
                                        @endif
                                        @if(Session::get('fail'))
                                            <div class="alert alert-danger">
                                                {{Session::get('fail')}}
                                            </div>
                                        @endif
                                        @csrf    
                                    
                                        <div class="row">
                                            <div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
														<input type="text" class="form-control" id="name" name="name"   placeholder="Enter Employee Name.." value="{{ old('name')}}">
                                                        <span class="text-danger">@error('name'){{$message}}@enderror</span>

                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Your valid email.." value="{{ old('name')}}">
                                                        <span class="text-danger">@error('email'){{$message}}@enderror</span>

                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Phone <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Your valid Phone Number.." value="{{ old('name')}}">
                                                        <span class="text-danger">@error('mobile'){{$message}}@enderror</span>

                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom03">Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="password" class="form-control" id="password" name="password"  placeholder="Choose a safe one.." value="{{ old('name')}}">
                                                        <span class="text-danger">@error('password'){{$message}}@enderror</span>

                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                            <h3>Give Access to Employee</h3>
                                                <hr>                                       
                                                            
                                                       
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-4">
                                                            <h4 class="card-title">Kitchen</h4>
                                                        </div>
                                                        <select class="multi-select" name="kitchen[]" multiple="multiple">
                                                            <option value="C">Create</option>
                                                            <option value="R">Read</option>
                                                            <option value="U">Update</option>
                                                            <option value="D">Delete</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-4">
                                                            <h4 class="card-title">Order</h4>
                                                        </div>
                                                        <select class="multi-select" name="order[]" multiple="multiple">
                                                            <option value="C">Create</option>
                                                            <option value="R">Read</option>
                                                            <option value="U">Update</option>
                                                            <option value="D">Delete</option>
                                                        </select>
                                                    </div> 
                                                    <div class="col">
                                                        <div class="mb-4">
                                                            <h4 class="card-title">Product</h4>
                                                        </div>
                                                        <select class="multi-select" name="product[]" multiple="multiple">
                                                            <option value="C">Create</option>
                                                            <option value="R">Read</option>
                                                            <option value="U">Update</option>
                                                            <option value="D">Delete</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-4">
                                                            <h4 class="card-title">Vendor</h4>
                                                        </div>
                                                        <select class="multi-select" name="vendor[]" multiple="multiple">
                                                            <option value="C">Create</option>
                                                            <option value="R">Read</option>
                                                            <option value="U">Update</option>
                                                            <option value="D">Delete</option>
                                                        </select>
                                                    </div>                                                
                                                    
                                                   
                                                    
								                </div>
                                            
                                            <div class="mb-4 row">                                            
                                                <div class="col-lg-3">
                                                    <br><br>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>  
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Employees List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="EmpDataTable" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile No.</th>
                                                <th>Status</th>                                                
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody id="employees_data">                                          
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile No.</th>
                                                <th>Status</th>                                                
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@include('userAdmin.footer');
{{-- 
            @php
                $store_user_id = Auth::guard('store')->user()->store_id;
                $store = DB::table('store')->select('billing_types')->where('store_id', $store_user_id)->first();
                $getData = explode(',', $store->billing_types);
            @endphp
            @foreach($getData as $d)
              @if ($d == '1')
                <li>
                    <a class="has-arrow" href="#" data-toggle="collapse" aria-expanded="false"><i class="fa fa-cubes pr-1"></i>Products</a>
                     <ul class="collapse list-unstyled">
                        <li><a href="/store/add_product">Add New</a></li>
                        <li><a href="/store/product_list">Show List</a></li>
                    </ul>
                </li>
                @elseif($d == '2')
                <li>
                    <a class="has-arrow" href="#" data-toggle="collapse" aria-expanded="false"><i class="fab fa-speakap pr-1"></i>Services</a>
                     <ul class="collapse list-unstyled">
                        <li><a href="/store/add_service">Add New</a></li>
                        <li><a href="/store/service_list">Show List</a></li>
                    </ul>
                </li> 
              @endif
            @endforeach --}}
    
