@include('superAdmin.header');

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
				
                <!-- row -->


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

