@include('superAdmin.header');
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
                                    <form class="needs-validation" novalidate method="post" id="EmployeeAddBySuperAdmin" >
                                        @csrf
                                        <div class="row">
                                            <div >
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
														<input type="text" class="form-control" id="name" name="name"   placeholder="Enter Employee Name.." required>
														<div class="invalid-feedback">
															Please enter employee name.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Your valid email.." required>
														<div class="invalid-feedback">
															Please enter a Email.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Phone <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="mobile" name="mobile"  placeholder="Your valid Phone Number.." required>
														<div class="invalid-feedback">
															Please enter a Phone Number.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom03">Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="password" class="form-control" id="password" name="password"  placeholder="Choose a safe one.." required>
														<div class="invalid-feedback">
															Please enter a password.
														</div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="mb-4 row">
                                                    <div class="col-lg-3 ms-auto">
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
                                <h4 class="card-title">Employees Datatable</h4>
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

@include('superAdmin.footer');
<script>

$(document).ready(function() { 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        $("form#EmployeeAddBySuperAdmin").submit(function(e) {
            e.preventDefault();
            var formData  = new FormData(this);    
            alert(formData);
            $.ajax({
                type: 'POST',
                url:"{{ route('superAdmin.employees.index') }}",            
                dataType:"json",    
                data: formData,
                //Display Response Success Message
                success: function(data){
                    alert('successfully added');                   
                },
                cache: false,
                contentType: false,
                processData: false
                
            });


        });

        
        $('#EmpDataTable').DataTable()
        fetchEmployeeList(); 
        function fetchEmployeeList(){
            $.ajax({
                url: "{{ route('superAdmin.employees.list') }}",
                type: 'GET',
                dataType: 'json',
                // data:{ 
                //     _token:'{{ csrf_token() }}'
                // },
                success: function(dataResult) {
                    console.log(dataResult);
                    // var resultData = dataResult;
                    // alert(resultData);
                    // $.each(resultData.data, function(key, value) {
                    //     var empList = "<tr>" +
                    //         "<td>" + value.name + "</td>" +
                    //         "<td>" + value.email + "</td>" +
                    //         "<td>" + value.mobile + "</td>" +

                    //         // "<td>
                    //         //     <input  type='checkbox' 
                    //         //      data-toggle='toggle' 
                    //         //     data-on='Active' data-off='In-Active'
                    //         //     data-onstyle='success' data-offstyle='danger'
                    //         //      'checked'>
                    //         // </td>"+
                    //         "<td><span class="badge light badge-danger">In-Active</span></td>"+
                    //         // "<td>" + value.sms_provider_id + "</td>" +
                    //         "<td><button type='submit' value='" + value.id + "' class='edit_client btn btn-success'>Edit</button></td>" +
                    //         "<td><button type='submit' value='" + value.id + "' class='delete_client btn btn-danger'>Delete</button></td>" +


                    //         "</tr>";
                    //         $("#employees_data").append(empList);

                    // )}

                },
                cache: false,
                contentType: false,
                processData: false,
            });
        }
            
});




</script>
