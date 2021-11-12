@include('mainHeader');
@include('userAdmin.employee.header');
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
                                <h4 class="card-title">Add Items</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate  method="" id="">
                                        <div class="row">
                                            <div >
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
														<input type="text" class="form-control" id="name" name="name"  placeholder="Enter Provider or Vendor Name.." required>
														<div class="invalid-feedback">
															Please enter a Provider or Vendor Name.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="email" name="email"  placeholder="Vendor valid email.." required>
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
                                                        <input type="text" class="form-control" id="mobile" name="mobile"  placeholder="Vendor valid Phone Number.." required>
														<div class="invalid-feedback">
															Please enter a Phone Number.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom03">Item Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Enter Item Name.." required>
														<div class="invalid-feedback">
															Please enter a Item Name.
														</div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <select class="default-select wide form-control" id="validationCustom05">
                                                            <option  data-display="Select Category">Select Category</option>
                                                            <option value="html">HTML</option>
                                                            <option value="css">CSS</option>
                                                            
                                                        </select>
														<div class="invalid-feedback">
															Please select a one.
														</div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom03">Item Quantity
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter Item Quantity.." required>
														<div class="invalid-feedback">
															Please enter a Item Quantity.
														</div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <select class="default-select wide form-control" id="validationCustom05">
                                                            <option  data-display="Select Unit">Select Unit</option>
                                                            <option value="html">KILO-GRAM</option>
                                                            <option value="css">GRAM</option>
                                                            <option value="css">LITTER</option>
                                                            <option value="css">MILI-LITTER</option>
                                                            <option value="css">PICE</option>

                                                            
                                                        </select>
														<div class="invalid-feedback">
															Please select a one.
														</div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="mb-4 row">
                                                    <div class="col-lg-3 ms-auto">
                                                        <button type="submit" class="btn btn-primary">ADD</button>
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
                                <h4 class="card-title">Item List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Vendor Name</th>
                                                <th>Email</th>
                                                <th>Mobile No.</th>
                                                <th>Item Name</th>
                                                <th>Item Quantity</th>
                                                <th>Date</th>
                                                <th>Edit</th>
                                                <th>Delete</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Ashutosh</td>
                                                <td>ashu@gm.com</td>
                                                <td>7700809858</td>
                                                <td>Fish</td>
                                                <td>10 KG</td>
                                                <td>05/11/2021</td>    
                                                <!-- <td><span class='badge light badge-danger'>In-Active</span></td> -->
                                                <td><button type='submit' class='edit_client btn btn-info'>Edit</button></td>
                                                <td><button type='submit' class='delete_client btn btn-primary'>Delete</button></td>
                                                                                                
                                               
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Vendor Name</th>
                                                <th>Email</th>
                                                <th>Mobile No.</th>
                                                <th>Item Name</th>
                                                <th>Item Quantity</th>
                                                <th>Date</th>
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

@include('mainFooter');
