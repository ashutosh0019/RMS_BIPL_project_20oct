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
                                <h4 class="card-title">Add Admin</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate  method="post" id="AdminAddBySuperAdmin">
                                        @csrf
                                        <div class="row">
                                            <div >
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
														<input type="text" class="form-control" id="name" name="name"  placeholder="Enter Admin Name.." required>
														<div class="invalid-feedback">
															Please enter a Admin Name.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="email" name="email"  placeholder="Your valid email.." required>
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
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Choose a safe one.." required>
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
                                <h4 class="card-title">User Admin Datatable</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="userAdminDataTable" class="display" style="min-width: 845px">
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
                                        <tbody>
                                            @foreach($superadmin_add_admins as $superadmin_add_admin)
                                                <tr>
                                                    <td>{{$superadmin_add_admin->name}}</td>
                                                    <td>{{$superadmin_add_admin->email}}</td>
                                                    <td>{{$superadmin_add_admin->mobile}}</td>
                                                    <td>
                                                        <input  type="checkbox" onchange="changeStatus('{{$superadmin_add_admin->id}}')" data-id="{{$superadmin_add_admin->id}}" 
                                                        class="" data-toggle="toggle" 
                                                        data-on="Active" data-off="In-Active"
                                                        data-onstyle="success" data-offstyle="danger"
                                                        {{$superadmin_add_admin->status ? 'checked' : ''}}>
                                                    </td>
                                                    <!-- <td><span class='badge light badge-danger'>In-Active</span></td> -->
                                                    <td><button type='submit' class='edit_client btn btn-info'>Edit</button></td>
                                                    <td><button type='submit' class='delete_client btn btn-primary'>Delete</button></td>

                                                </tr>
                                            @endforeach
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

// Insert Form Data---------------
$(document).ready(function() {  
      $("form#AdminAddBySuperAdmin").submit(function(e) {
        e.preventDefault();
          var formData  = new FormData(this);    
          alert(formData);
          $.ajax({
              type: 'POST',
              url:"{{ route('superadmin.add_new_Admin') }}",            
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

$(document).ready(function(){
        $("#userAdminDataTable").DataTable()
    //     // alert("hey");
    //         $('.toggle-class').change(function() {
    //             var status = $(this).prop('checked') == true ? 1 : 0; 
    //             var user_id = $(this).data('id'); 
    //             alert(user_id);
    //             console.log(user_id);

    //             $.ajax({
    //                 type: "GET",
    //                 dataType: "json",
    //                 url: '/changeStatus',
    //                 data: {'status': status, 'user_id': user_id},
    //                 success: function(data){
    //                 console.log(data.success)
    //                 },
    //                 cache: false,
    //                 contentType: false,
    //                 processData: false
    //             });
    //     });
    });


    function changeStatus(user_id){
        // alert(user_id);
        var status = $(this).prop('checked') == true ? 1 : 0; 
                    alert(user_id);
                    console.log(status);

                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: '/changeStatus',
                        data: {
                            'status': status,
                            'user_id': user_id
                            },
                        success: function(data){
                        console.log(data.success)
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
    }



</script>