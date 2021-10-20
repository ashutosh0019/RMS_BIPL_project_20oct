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
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

@include('superAdmin.footer');
<script>

// Insert Form Data---------------
$(document).ready(function() {  
      $("form#EmployeeAddBySuperAdmin").submit(function(e) {
        e.preventDefault();
          var formData  = new FormData(this);    
          alert(formData);
          $.ajax({
              type: 'POST',
              url:"{{ route('superadmin.add_employee') }}",            
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
});


</script>