@extends('layouts.app')
@include('layouts.header')

@section('style')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
      <!--  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.6/css/select.dataTables.min.css"> -->
    <!--    <link rel="stylesheet" href="css/table/editor.dataTables.min.css"> -->
    <link rel='stylesheet prefetch' href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css'>
    <style>
      .smart-finder-pro{
        display: none;
      }
    </style>
@endsection
@section('content')
	 <section class="mt-4 flex ps-fix">
        <button class="tablink border"  id="defaultOpen" onclick="openPage('cemere', this, '#d10a11')">CAMERA</button>
        <button class="tablink border" onclick="openPage('lens', this, '#d10a11')">LENS</button>

    </section>

    <section id="cemere" class="table-add tabcontent">   
        <div class="container">
            <div class="row">
                <div class="add">
                    <a href="{{URL::asset('add-camera')}}" 
                        class="btn btn-red float-right radius-50 add-another" 
                        ><i class="fas fa-plus"></i> Add 
                    </a>
                </div>
                <div class="modal fade form-container" id="myModal">
                    <div class="modal-dialog">
                      <div class="modal-content bg-lit">
                      
                        <!-- Modal Header -->
                        <div class="modal-header pd-04">
                          <!-- <h4 class="modal-title">Modal Heading</h4> -->
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body bg-f2">
                            <form name="customer-details" class="customer-details form-horizontal width">
                                <fieldset>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="Categorie" class="col-sm-4 col-form-label font-weight-bold">Categorie</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control border-td-0">
                                                          <option>Digital</option>
                                                        </select>
                                                        <!-- <input type="text" id="txtName" name="name" class="form-control"> -->
                                                        <div class="error-msg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                 <div class="form-group row">
                                                    <label for="Categorie" class="col-sm-4 col-form-label font-weight-bold">Manufacturer</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control border-td-0">
                                                          <option>Nikon</option>
                                                        </select>
                                                        <!-- <input type="text" id="txtName" name="name" class="form-control"> -->
                                                        <div class="error-msg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                 <div class="form-group row">
                                                    <label for="Categorie" class="col-sm-4 col-form-label font-weight-bold">Categorie</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control border-td-0">
                                                          <option>3300 D</option>
                                                        </select>
                                                        <!-- <input type="text" id="txtName" name="name" class="form-control"> -->
                                                        <div class="error-msg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtName" class="control-label col-md-4 font-weight-bold">Sensor Mode </label>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="row">
                                           <div class="col-md-3 ">
                                            <div class="row">
                                                <input type="number" class="form-control border-td-0 col-md-8" id="" placeholder="" required>
                                            </div>
                                                
                                           </div>
                                           <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2"> <p class="">W</p></div>
                                                        <input type="number" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                           <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2"> <p class="">H</p></div>
                                                        <input type="number" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                           <div class="col-md-3">
                                               <div class="row">
                                                    <div class="col-md-2"> <p class="">D</p></div>
                                                        <input type="number" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <div class="row">
                                           <div class="col-md-3 ">
                                            <div class="row">
                                                <input type="number" class="form-control border-td-0 col-md-8" id="" placeholder="" required>
                                            </div>
                                                
                                           </div>
                                           <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2"> <p class="">W</p></div>
                                                        <input type="number" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                           <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2"> <p class="">H</p></div>
                                                        <input type="number" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                           <div class="col-md-3">
                                               <div class="row">
                                                    <div class="col-md-2"> <p class="">D</p></div>
                                                        <input type="number" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                        </div>
                                    </div>

                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <div class="col-md-7 ml-5">
                                            <button class="update-button btn btn-red radius-50 add-another">Save Changes</button>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                

                                  <!-- <button class="reset-button btn btn-danger">Reset</button>
                                  <button class="add-button btn btn-success">Add</button>
                                  <button class="update-button btn btn-primary">Update</button> -->
                                </fieldset>
                            </form>
                        </div>

                      </div>
                    </div>
                </div>
             
                <div class="table-container width">
                    <table   class="customer-table table table-hover datatables" style="width:100%">
                      <thead>
                        <tr class="table-head">
                          <th>Category</th>
                          <th>Manufacturer</th>
                          <th>Name</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                </div>
          
        </div>
    </section>
    <section id="lens" class="table-add tabcontent">   
        <div class="container">
            <div class="row">
                <div class="add">
                    <a href="{{ route('add-lens') }}" 
                        class="btn btn-red float-right radius-50 add-another" 
                        ><i class="fas fa-plus"></i> Add 
                    </a>
                </div>
                <div class="modal fade form-container" id="myModal_lens">
                    <div class="modal-dialog">
                      <div class="modal-content bg-lit">
                      
                        <!-- Modal Header -->
                        <div class="modal-header pd-04">
                          <!-- <h4 class="modal-title">Modal Heading</h4> -->
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body bg-f2">
                            <form name="customer-details" class="customer-details form-horizontal width">
                                <fieldset>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="Categorie" class="col-sm-4 col-form-label font-weight-bold">Categorie</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control border-td-0">
                                                          <option>Digital</option>
                                                        </select>
                                                        <!-- <input type="text" id="txtName" name="name" class="form-control"> -->
                                                        <div class="error-msg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                 <div class="form-group row">
                                                    <label for="Categorie" class="col-sm-4 col-form-label font-weight-bold">Manufacturer</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control border-td-0">
                                                          <option>Nikon</option>
                                                        </select>
                                                        <!-- <input type="text" id="txtName" name="name" class="form-control"> -->
                                                        <div class="error-msg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                 <div class="form-group row">
                                                    <label for="Categorie" class="col-sm-4 col-form-label font-weight-bold">Categorie</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control border-td-0">
                                                          <option>3300 D</option>
                                                        </select>
                                                        <!-- <input type="text" id="txtName" name="name" class="form-control"> -->
                                                        <div class="error-msg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtName" class="control-label col-md-4 font-weight-bold">Sensor Mode </label>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="row">
                                           <div class="col-md-3 ">
                                            <div class="row">
                                                <input type="number" class="form-control border-td-0 col-md-8" id="" placeholder="" required>
                                            </div>
                                                
                                           </div>
                                           <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2"> <p class="">W</p></div>
                                                        <input type="number" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                           <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2"> <p class="">H</p></div>
                                                        <input type="number" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                           <div class="col-md-3">
                                               <div class="row">
                                                    <div class="col-md-2"> <p class="">D</p></div>
                                                        <input type="number" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <div class="row">
                                           <div class="col-md-3 ">
                                            <div class="row">
                                                <input type="number" class="form-control border-td-0 col-md-8" id="" placeholder="" required>
                                            </div>
                                                
                                           </div>
                                           <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2"> <p class="">W</p></div>
                                                        <input type="number" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                           <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2"> <p class="">H</p></div>
                                                        <input type="number" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                           <div class="col-md-3">
                                               <div class="row">
                                                    <div class="col-md-2"> <p class="">D</p></div>
                                                        <input type="number" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                        </div>
                                    </div>

                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <div class="col-md-7 ml-5">
                                            <button class="update-button btn btn-red radius-50 add-another">Save Changes</button>
                                        </div>
                                        
                                    </div> 
                                </div>
                                </fieldset>
                            </form>
                        </div>

                      </div>
                    </div>
                </div>
             
                <div class="table-container width">
                    <table   class="customer-table table table-hover datatables_lens" style="width:100%">
                      <thead>
                        <tr class="table-head">
                          <th>Manufacturer</th>
                          <th>Series</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                </div>
          
        </div>
    </section>
@endsection

@section('script')
 <script>
        function openPage(pageName,elmnt,color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(pageName).style.display = "block";
            elmnt.style.backgroundColor = color;
        
        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

    <!-- table script -->
   
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script  src="{{asset('js/index.js')}}"></script>
@endsection