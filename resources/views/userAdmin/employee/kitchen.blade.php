@include('mainHeader');
@include('userAdmin.employee.header');
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
                                <h4 class="card-title">Item List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Item Quantity</th>
                                                <th>Item Quantity In Stock</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Fish</td>
                                                <td>10 KG</td>
                                                <td>5 KG</td>                                                
                                               
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Item Quantity</th>
                                                <th>Item Quantity in Stock</th>
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
    
    
@include('mainFooter');
