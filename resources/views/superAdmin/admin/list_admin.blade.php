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
                                <h4 class="card-title">Basic Datatable</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
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
                                                    <td><span class='badge light badge-danger'>In-Active</span></td>
                                                    <td><button type='submit' class='edit_client btn btn-success'>Edit</button></td>
                                                    <td><button type='submit' class='delete_client btn btn-danger'>Delete</button></td>

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
