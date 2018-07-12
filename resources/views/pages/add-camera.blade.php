@extends('layouts.app')
@include('layouts.header')

@section('style')
<style>
	.smart-finder-pro{
        display: none;
      }
</style>

@endsection
@section('content')
 <!--  section top -->
    <section class="mt-4 flex ps-fix">
        <div class="text-center width bg-coffie pd-top-fix">
         <h5><a  class=" text-unset white">ADD CAMERA</a></h5>
         <div class="back">
             <a href="smartfinder-pro.html" class="btn btn-f btn-red radius-50 white">Back</a>
         </div>
        </div>
    </section>

    <section>
        <div id="regForm">
            <!-- One "tab" for each step in the form: -->
            <div class="tab mb-2">
                <div class="add_hide" id="add_hideOne">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="bg-top ">
                                <p class="heade-title ml-3"> CAMERA CATEGORIE</p>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding " >
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 ml-3">
                                       
                                    <select class="form-control border-td-0 stepby" onchange="showDiv(this)" id="categorie" name="categorie" >
                                       
                                        <option value="">Choose Categorie</option>
                                         @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}" >{{$categorie->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 text-center">
                                    <p class="font-weight-bold mt-2">OR</p>
                                </div>
                                <div class="col-md-4">
                                    <input type="hidden" value="{{csrf_token()}}" id="token" />
                                    <input type="text" class="form-control border-td-0 stepby"  id="c_type"   name="c_type" placeholder="Type new category">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ml-3 add_block">   
                            <div style="overflow:auto;">
                                <div id="saveHide" style="float:right;">
                                    <button type="submit" id="setpOne" class="btn btn-f btn-red font-40 radius-50" onclick="nextPrev(1)">Save</button>
                                </div>
                            </div> 
                        </div> 

                    </div>
                </div>
                <div class="add_show" id="show_hideOne">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> CAMERA CATEGORIE</p>
                                <p class="title-edit col-md-3"><a class="float-right edit-color " data-toggle="modal" data-target="#categorieModal" data-whatever="@mdo" href="">Edit</a></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 ml-3">
                                    <p class="font-weight-bold" id="categorie_result" ></p> 
                                </div>
                            </div>
                        </div>                 
                    </div>

                    {{-- EDIT MODEL  --}}


                    <div class="modal fade" id="categorieModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Categorie</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">category:</label>
                                    <input type="hidden" value="{{csrf_token()}}" id="token" />
                                    <input type="text" class="form-control" name="categorie" id="editCategory">
                                  </div>
                               
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="editSetpOne" class="btn btn-primary" data-dismiss="modal">Save</button>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            <!-- CAMERA MANUFACTURER -->
            <div class="tab mb-2" id="selectShowManu">
                <div class="add_hide" id="add_hideTwo">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="bg-top ">
                                <p class="heade-title ml-3"> CAMERA MANUFACTURER</p>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding ">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 ml-3">
                                    <select class="form-control border-td-0 stepby" onchange="showDiv2(this)" id="manufacturer" name="manufacturer" >
                                        <option value="">Choose Manufacturer</option>
                                    </select>
                                </div>
                                <div class="col-md-2 text-center">
                                    <p class="font-weight-bold mt-2">OR</p>
                                </div>
                                <div class="col-md-4">
                                     <input type="hidden" value="{{csrf_token()}}" id="token" />
                                    <input type="text" class="form-control border-td-0 stepby" id="m_type"  name="m_type" placeholder="Type new Manufacturer">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ml-3 add_block">
                            <div style="overflow:auto;">
                                <div id="saveHideTwo" style="float:right;">
                                    <button type="button" id="sendManufacturer" class="btn btn-f btn-red font-40 radius-50" onclick="nextPrev(1)">Save</button>
                                </div>
                            </div>     
                        </div>   
                    </div>
                </div>
                <div class="add_show" id="show_hideTwo">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> CAMERA MANUFACTURER</p>
                                <p class="title-edit col-md-3"><a  class="float-right edit-color " data-toggle="modal" data-target="#manufacturerModal" data-whatever="@mdo" href="">Edit</a></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 ml-3">
                                    <p  class="font-weight-bold" id="manufacturerResult" ></p>
                                </div>
                            </div>
                        </div>                 
                    </div>
                      {{-- EDIT MODEL  MANUFACTURER--}}

                    <div class="modal fade" id="manufacturerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Manufacturer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Manufacturer :</label>
                                    <input type="hidden" value="{{csrf_token()}}" id="token" />
                                    <input type="text" class="form-control" name="" id="editManufacturer">
                                  </div>
                               
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="editSetpTwo" class="btn btn-primary" data-dismiss="modal">Save</button>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
                <!-- CAMERA NAME -->
            <div class="tab mb-2" id="selectShowManuTwo">
                <div class="add_hide" id="add_hideThree">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="bg-top ">
                                <p class="heade-title ml-3"> CAMERA NAME</p>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding ">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 ml-3">
                                    <select class="form-control border-td-0 stepby" onchange="showDiv3(this)" id="model"  name="model" >
                                        <option value="">Choose model name</option>

                                    </select>
                                </div>
                                <div class="col-md-2 text-center">
                                    <p class="font-weight-bold mt-2">OR</p>
                                </div>
                                <div class="col-md-4">
                                    <input type="hidden" value="{{csrf_token()}}" id="token" />
                                    <input type="text" class="form-control border-td-0 stepby"  id="mo_type" name="mo_type" placeholder="Type new Model">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ml-3 add_block">
                            <div style="overflow:auto;">
                                <div id="saveHideThree" style="float:right;">
                                    <button type="button" id="sendCamera" class="btn btn-f btn-red font-40 radius-50" onclick="nextPrev(1)">Save</button>
                                </div>
                            </div>     
                        </div>   
                    </div>
                </div>
                <div class="add_show" id="show_hideThree">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> CAMERA NAME</p>
                                <p class="title-edit col-md-3"><a   class="float-right edit-color " data-toggle="modal" data-target="#cameraModal" data-whatever="@mdo" href="">Edit</a></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 ml-3">
                                    <p  class="font-weight-bold" id="modelResult"></p>
                                </div>
                            </div>
                        </div>                 
                    </div>
                    {{-- EDIT MODEL CAMERA --}}
                     <div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Camera</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Camera Name :</label>
                                    <input type="hidden" value="{{csrf_token()}}" id="token" />
                                    <input type="text" class="form-control" name="" id="editCamera">
                                  </div>
                               
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="editSetpThree" class="btn btn-primary" data-dismiss="modal">Save</button>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
            <!-- SENSOR MODE -->
            <div class="tab mb-2" id="selectShowManuThree">
                <div class="add_hide" id="add_hideFour">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="bg-top ">
                                <p class="heade-title ml-3">SENSOR MODE</p>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding ">
                        <div class="col-md-8 ">
                            <table style="width: 100%">
                                <tbody class="dynamic" id="pda-details">
                                    <tr>
                                        <td>
                                            <select class="form-control border-td-0 dyn-input" onchange="showDiv4(this)" id="s_value" name="s_value[1]">
                                                <option value="">Choose Categorie</option>
                                                @foreach($sensors as $sensor)
                                                <option value="{{$sensor->value}}">{{$sensor->value}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                              <label class="or"> OR </label>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control border-td-0 dyn-input" id="s_v_type" name="s_v_type[1]" placeholder="Type new sensor">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-4 ml-3">
                                    <button type="button" class="button-my tiny secondary" data-table="pda-details" id="add-row" ><i class="fas fa-plus"></i> Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ml-3 add_block">
                            <div style="overflow:auto;">
                                <div id="saveHideFour" style="float:right;">
                                    <button type="button" id="sendSensor" class="btn btn-f btn-red font-40 radius-50" onclick="nextPrev(1)" >Save</button>
                                </div>
                            </div>     
                        </div> 
                    </div>
                </div>
                <div class="add_show" id="show_hideFour">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> SENSOR MODE</p>
                                <p class="title-edit col-md-3"><a  class="float-right edit-color"  class="float-right edit-color " data-toggle="modal" data-target="#sensorModal" data-whatever="@mdo" href="">Edit</a></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding">
                        <div class="col-md-8">
                            <div class="row">
                                    <div class="col-md-4 ml-3">
                                        <p  class="font-weight-bold" id="sensorResult" ></p>
                                        <p  class="font-weight-bold" id="sensorResult2" ></p>
                                        <p  class="font-weight-bold" id="sensorResult3" ></p>
                                        <p  class="font-weight-bold" id="sensorResult4" ></p>
                                        <p  class="font-weight-bold" id="sensorResult5" ></p>
                                        <p  class="font-weight-bold" id="sensorResult6" ></p>
                                        <p  class="font-weight-bold" id="sensorResult7" ></p>
                                        <p  class="font-weight-bold" id="sensorResult8" ></p>
                                        <p  class="font-weight-bold" id="sensorResult9" ></p>
                                        <p  class="font-weight-bold" id="sensorResult10" ></p>
                                    </div>
                            </div>
                        </div>                 
                    </div>
                     {{-- EDIT MODEL CAMERA --}}
                     <div class="modal fade" id="sensorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Sensor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Sensor Name :</label>
                                    <input type="hidden" value="{{csrf_token()}}" id="token" />
                                    <input type="text" class="form-control" name="" id="editSensor">
                                  </div>
                               
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="editSetpFour" class="btn btn-primary" data-dismiss="modal">Save</button>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
             <!-- WIDTH, HEIGHT & DIAMETER                   -->
            <div class="tab mb-2" id="selectShowManuFour">
                <div class="add_hide">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="bg-top ">
                                <p class="heade-title ml-3"> WIDTH, HEIGHT & DIAMETER</p>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding ">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3 ">
                                    <p id="sensorResult_2" class="ml-3"></p> 
                                                                                  
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <input type="hidden" value="{{csrf_token()}}" id="token" />
                                            <input type="number" class="form-control border-td-0 col-md-6" id="width" name="width" placeholder="Width" required="">
                                        <div class="col-md-2"><p class="">mm</p></div> 
                                    </div>  
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                            <input type="number" class="form-control border-td-0 col-md-6" id="height" name="height" placeholder="Height" required="">
                                        <div class="col-md-2"><p class="">mm</p></div> 
                                    </div>  
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-2"> </div>
                                            <input type="number" class="form-control border-td-0 col-md-6" id="diameter" name="diameter"  placeholder="Diameter" required="">
                                        <div class="col-md-2"></div> 
                                    </div>  
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-3 ml-3 add_block">
                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button"  class="btn btn-f btn-red font-40 radius-50" id="sendWidth" onclick="nextPrev(1)" >Save</button>
                                </div>
                            </div>     
                        </div> 
                    </div>
                </div>
                <div class="add_show">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> WIDTH, HEIGHT & DIAMETER</p>
                                <p class="title-edit col-md-3"><a  class="float-right edit-color" data-toggle="modal" data-target="#editWidth" data-whatever="@mdo" href="">Edit</a></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding">
                        <div class="col-md-8">
                            <div class="row">
                                    <div class="col-md-4 ml-3">
                                        <p  class="font-weight-bold" id="sensorValueResult" ></p>
                                    </div>
                            </div>
                        </div>                 
                    </div>

                       {{-- EDIT Width CAMERA --}}
                     <div class="modal fade" id="editWidth" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">WIDTH, HEIGHT & DIAMETER</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">WIDTH :</label>
                                    <input type="hidden" value="{{csrf_token()}}" id="token" />
                                    <input type="text" class="form-control" name="" id="editwidth">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">HEIGHT :</label>
                                    <input type="text" class="form-control" name="" id="editheight">
                                  </div>
                                   <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">DIAMETER :</label>
                                    <input type="text" class="form-control" name="" id="editdiameter">
                                  </div>
                               
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="editSetpFive" class="btn btn-primary" data-dismiss="modal">Save</button>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>                  
            </div>
            <div class="tab" id="selectShowManuFour">    
                <div class="row bg-top">
                </div>
                <div class="row bg-f2 padding ">             
                    <div class="col-md-6 ml-5 add_block">
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button"  
                                    class="btn btn-f btn-red font-40 radius-50 float-right" 
                                    data-toggle="modal"
                                    data-target="#review" 
                                    data-whatever="@getbootstrap" 
                                    >
                                REVIEW
                                </button>
                            </div>
                            <div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">REVIEW DATA</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <div class="form-row">
                                            <div class="col-md-3">
                                                <p class="font-40">Categorie</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="font-40" id="categorieFinalResult"></p>
                                            </div>
                                            
                                        </div>
                                        <div class="form-row">
                                                <div class="col-md-3">
                                                    <p class="font-40">Camera</p>
                                                </div>
                                                <div class="col-md-3">
                                                        <p class="font-40" id="cameraFinalResult"></p>
                                                </div>
                                                    
                                        </div>
                                        <div class="form-row">
                                                <div class="col-md-3">
                                                    <p class="font-40">Sensor Mode</p>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p id="sensorValueFinalResult">2.11</p>
                                                        </div>
                                                        <div class="col">
                                                            <p id="sensorWidthResult"> W 54.12 mm</p>   
                                                        </div>
                                                        <div class="col">
                                                            <p id="sensorHeightResult">H 25.58 mm</p>
                                                        </div>
                                                        <div class="col">
                                                            <p id="sensorDiameterResult">D 59.86</p>
                                                        </div>
                                                    </div>   
                                                </div>
                                                {{-- <div class="col-md-3">
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p>2.11</p>
                                                        </div>
                                                        <div class="col">
                                                            <p> W 54.12 mm</p>   
                                                        </div>
                                                        <div class="col">
                                                            <p>H 25.58 mm</p>
                                                        </div>
                                                        <div class="col">
                                                            <p>D 59.86</p>
                                                        </div>
                                                    </div>       
                                                </div> --}}
                                                    
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer" style=" justify-content: center;">
                                        <button type="button" class="btn btn-red float-right radius-50 add-another "  data-dismiss="modal">Edit</button>
                                        <button type="submit"  class="btn btn-red float-right radius-50 add-another"  >SUBMIT</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>   
            </div>


            <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
            </div>
        </div> 
          
      
    </section>
@endsection

@section('script')
<script type="text/javascript">
    function showDiv(select){
       if(select.value !== ' '){
            document.getElementById('selectShowManu').style.display = "block";
            document.getElementById('saveHide').style.display = "none";
            document.getElementById("add_hideOne").style.display = "none";
            document.getElementById("show_hideOne").style.display = "block";
       } 
    } 

     function showDiv2(select){
       if(select.value !== ' '){
            document.getElementById('selectShowManuTwo').style.display = "block";
            document.getElementById('saveHideTwo').style.display = "none";
            document.getElementById("add_hideTwo").style.display = "none";
            document.getElementById("show_hideTwo").style.display = "block";
       } 
    } 
    function showDiv3(select){
       if(select.value !== ' '){
            document.getElementById('selectShowManuThree').style.display = "block";
            document.getElementById('saveHideThree').style.display = "none";
             document.getElementById("add_hideThree").style.display = "none";
            document.getElementById("show_hideThree").style.display = "block";
       } 
    } 
    function showDiv4(select){
       if(select.value !== ' '){
            document.getElementById('selectShowManuFour').style.display = "block";
            document.getElementById('saveHideFour').style.display = "none";
             document.getElementById("add_hideFour").style.display = "none";
            document.getElementById("show_hideFour").style.display = "block";
       } 
    } 
</script>
 
<script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    //categorie
    var categorieId = 0;
    $('document').ready(function(){
        $('#setpOne').click(function(){
            var c_type = $("#c_type").val();
            var token  = $("#token").val();
            $.ajax({
               type : "POST",
               data : "c_type=" + c_type + "&_token= "+ token,
               url:"/add-categorie",
                success:function(data){
                    console.log(data);
                    categorieId = data.id;
                    document.getElementById('categorie_result').innerHTML=data.name;
               }
            });
        });
    });

    //edit categorie
        $('document').ready(function(){
            $('#editSetpOne').click(function(){
                var c_type = $("#editCategory").val();
                var token  = $("#token").val();
                $.ajax({
                   type : "POST",
                   data : "c_type=" + c_type + "&_token= "+ token,
                   url:"/add-categorie/" + categorieId,
                    success:function(data){
                        console.log(data);
                        categorieId = data.id;
                        document.getElementById('categorie_result').innerHTML=data.name;
                   }
                });
            });
        });

// get id data
var manufacturer_data = '';
var manufacturer_id = 0;
$('document').ready(function(){
    $("#categorie").change(function() {
        var categorie_id = $(this).val();
        $.ajax({
            url:"/get-categorie/" + categorie_id,
            method: "post",
            data: {categorie_id:categorie_id},
            success: function(data){
                console.log(data);
                manufacturer_data = data.name;
                categorieId = data[0].categorie_id;
                console.log(data[0].categories.name);
                var len = data.length;
                document.getElementById('categorie_result').innerHTML=data[0].categories.name;
                //document.getElementById('editCategory').innerHTML=data[0].categories.name;
                document.getElementById("editCategory").value = data[0].categories.name;
               //$("#manufacturer").empty();
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var name = data[i]['name'];
                    $("#manufacturer").append("<option value='"+id+"'>"+name+"</option>");
                }    
            }
        });
    });
});


    //manufacturer
    var manufacturerId = 0;
    $('document').ready(function(){
        $('#sendManufacturer').click(function(){
            var manufacturer = $("#m_type").val();
            var token  = $("#token").val();
            var categorie_id  = categorieId
        
            $.ajax({
               type : "POST",
               data : "manufacturer=" + manufacturer + "&_token= "+ token + "&categorie_id=" + categorie_id,
               url:"/add-manufacturer",
                success:function(data){
                    console.log(data);
                    categorieId = data.categorie_id;
                    manufacturerId = data.id;
                    document.getElementById('manufacturerResult').innerHTML=data.name;
               }
            });
        });
    }); 
//edit manufacturer
    $('document').ready(function(){
        $('#editSetpTwo').click(function(){
            var manufacturer = $("#editManufacturer").val();
            var token  = $("#token").val();
            var categorie_id  = categorieId;
        
            $.ajax({
               type : "POST",
               data : "manufacturer=" + manufacturer + "&_token= "+ token,
               url:"/add-manufacturer/" + manufacturerId,
                success:function(data){
                    console.log(data);
                    categorieId = data.categorie_id;
                    manufacturerId = data.id;
                    document.getElementById('manufacturerResult').innerHTML=data.name;
               }
            });
        });
    });

// get id manufacturer
var camera_data = '';
var camera_id = 0;
$('document').ready(function(){
    $("#manufacturer").change(function() {
        var manufacturer_id = $(this).val();
        $.ajax({
            url:"/get-manufacturer/" + manufacturer_id,
            method: "post",
            data: {manufacturer_id:manufacturer_id},
            success: function(data){
                console.log(data);
                camera_data = data.name;
                manufacturerId = data[0].manufacturer_id;
                console.log(data[0].manufacturers.name);
                var len = data.length;
                document.getElementById('manufacturerResult').innerHTML=data[0].manufacturers.name;
                //document.getElementById('editCategory').innerHTML=data[0].categories.name;
                document.getElementById("editManufacturer").value = data[0].manufacturers.name;
               //$("#manufacturer").empty();
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var name = data[i]['name'];
                    $("#model").append("<option value='"+id+"'>"+name+"</option>");
                }    
            }
        });
    });
});


//CAMERA NAME
 var cameraId = 0;
$('document').ready(function(){
        $('#sendCamera').click(function(){
            var cameraname = $("#mo_type").val();
            var token  = $("#token").val();
            var categorie_id  = categorieId;
            $.ajax({
               type : "POST",
               data : "cameraname=" + cameraname + "&_token= "+ token + "&categorie_id=" + categorie_id + "&manufacturerId=" + manufacturerId,
               url:"/add-camera-name",
                success:function(data){
                    console.log(data);
                    categorieId = data.categorie_id;
                    manufacturerId = data.manufacturer_id;
                    cameraId = data.id;
                    document.getElementById('modelResult').innerHTML=data.name;  
               }
            });
        });
    });
// Edit Camera
$('document').ready(function(){
    $('#editSetpThree').click(function(){
        var cameraname = $("#editCamera").val();
        var token  = $("#token").val();
        var categorie_id  = categorieId;
        $.ajax({
           type : "POST",
           data : "cameraname=" + cameraname + "&_token= "+ token ,
           url:"/add-camera-name/" + cameraId,
            success:function(data){
                console.log(data);
                categorieId = data.categorie_id;
                manufacturerId = data.manufacturer_id;
                cameraId = data.id;
                document.getElementById('modelResult').innerHTML=data.name;  
                
           }
        });
    });
});


// get id camera
var sensor_data = '';
var sensor_id = 0;
$('document').ready(function(){
    $("#model").change(function() {
        var model_id = $(this).val();
        $.ajax({
            url:"/get-camera/" + model_id,
            method: "post",
            data: {model_id:model_id},
            success: function(data){
                console.log(data);
                sensor_data = data.name;
                cameraId = data[0].camera_id;
                console.log(data[0].cameras.name);
                    
                document.getElementById('modelResult').innerHTML=data[0].cameras.name;
                //document.getElementById('editCategory').innerHTML=data[0].categories.name;
                document.getElementById("editCamera").value = data[0].cameras.name;
               //$("#manufacturer").empty();
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var name = data[i]['name'];
                    $("#model").append("<option value='"+id+"'>"+name+"</option>");
                }    
            }
        });
    });
});


//SENSOR MODE
var sensorId = 0;
$('document').ready(function(){
    $('#sendSensor').click(function(){
        var value = $("#s_v_type").val();
        var token  = $("#token").val();
        var categorie_id  = categorieId;
        var camera_id = cameraId;
        $.ajax({
           type : "POST",
           data : "value=" + value + "&_token= "+ token + "&categorie_id=" + categorie_id + "&manufacturerId=" + manufacturerId + "&camera_id=" + camera_id,
           url:"/add-sensor",
            success:function(data){
                console.log(data);
                categorieId = data.categorie_id;
                manufacturerId = data.manufacturer_id;
                cameraId = data.camera_id;
                sensorId = data.id;

           }
        });
    });
});
// Edit Sensor
$('document').ready(function(){
    $('#editSetpFour').click(function(){
        var value = $("#editSensor").val();
        var token  = $("#token").val();
        var categorie_id  = categorieId;
        var camera_id = cameraId;
        $.ajax({
           type : "POST",
           data : "value=" + value + "&_token= "+ token ,
           url:"/add-sensor/" + sensorId,
            success:function(data){
                console.log(data);
                categorieId = data.categorie_id;
                manufacturerId = data.manufacturer_id;
                cameraId = data.camera_id;
                sensorId = data.id;
           }
        });
    });
});

//width,hight
$('document').ready(function(){
        $('#sendWidth').click(function(){
            var width = $("#width").val();
            var height = $("#height").val();
            var diameter  = $("#diameter").val();
            var categorie_id  = categorieId;
            var camera_id = cameraId;
            var sensor_id = sensorId;
            $.ajax({
               type : "PUT",
               data : "width=" + width + "&_token= "+ token + "&categorie_id=" + categorie_id + "&manufacturerId=" + manufacturerId + "&camera_id=" + camera_id +"&sensor_id=" + sensor_id + "&height=" + height + "&diameter=" + diameter,
               url:"/add-sensor/" + sensor_id,
                success:function(data){
                    console.log(data);
                    sensorId = data.id;
               }
            });
        });
    });
// Edit with and height
$('document').ready(function(){
        $('#editSetpFive').click(function(){
            var width = $("#editwidth").val();
            var height = $("#editheight").val();
            var diameter  = $("#editdiameter").val();
            var categorie_id  = categorieId;
            var camera_id = cameraId;
            var sensor_id = sensorId;
            $.ajax({
               type : "post",
               data : "width=" + width + "&_token= "+ token + "&height=" + height + "&diameter=" + diameter,
               url:"/add-sensor-value/" + sensor_id,
                success:function(data){
                    console.log(data);
               }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        var selectFiled,selectFiledTwo,selectFiledThree,selectFiledFour;
        //checking the length of the value of message and assigning to a variable(checkField) on load
        selectFiled = $("#categorie").val().length; 
        selectFiledTwo = $("#manufacturer").val().length; 
        selectFiledThree = $("#model").val().length;
        selectFiledFour = $("#s_value").val().length;
        var enableDisableSelect = function(){         
            if(selectFiled > 0 ){
                $('#c_type').attr("disabled","disabled");
            } 
            else {
                $('#c_type').removeAttr("disabled");
                // $('#selectShowManu').removeAttr("disabled");
              
            }
            if( selectFiledTwo > 0){
                $('#m_type').attr("disabled","disabled");
            } 
            else {
                $('#m_type').removeAttr("disabled");
            }
            if( selectFiledThree > 0){
                $('#mo_type').attr("disabled","disabled");
            } 
            else {
                $('#mo_type').removeAttr("disabled");
            }
            if( selectFiledFour > 0){
                $('#s_v_type').attr("disabled","disabled");
            } 
            else {
                $('#s_v_type').removeAttr("disabled");
            }
        }        
        //calling enableDisableButton() function on load
        enableDisableSelect();            
        $(".stepby").change(function() { 
            //checking the length of the value of message and assigning to the variable(checkField) on keyup
            selectFiled = $("#categorie").val().length;
            selectFiledTwo = $("#manufacturer").val().length;
            selectFiledThree = $("#model").val().length; 
            selectFiledFour = $("#s_value").val().length; 
            //calling enableDisableButton() function on keyup
            enableDisableSelect();
        });

        var checkField,checkFieldtwo,checkFieldthree,checkFieldfour;
        //checking the length of the value of message and assigning to a variable(checkField) on load
        checkField = $("input#c_type").val().length; 
        checkFieldtwo = $("input#m_type").val().length;
        checkFieldthree = $("input#mo_type").val().length;
        checkFieldfour = $("input#s_v_type").val().length;
        var enableDisableButton = function(){         
            if(checkField > 0 ){
                $('#categorie').attr("disabled","disabled");
            } 
            else {
                $('#categorie').removeAttr("disabled");
            }
            if(checkFieldtwo > 0 ){
                $('#manufacturer').attr("disabled","disabled");
            } 
            else {
                $('#manufacturer').removeAttr("disabled");
            }
            if(checkFieldthree > 0 ){
                $('#model').attr("disabled","disabled");
            } 
            else {
                $('#model').removeAttr("disabled");
            }
            if(checkFieldfour > 0 ){
                $('#s_value').attr("disabled","disabled");
            } 
            else {
                $('#s_value').removeAttr("disabled");
            }
        }        
        //calling enableDisableButton() function on load
        enableDisableButton();            
        $('input.stepby').keyup(function(){ 
            //checking the length of the value of message and assigning to the variable(checkField) on keyup
            checkField = $("input#c_type").val().length;
            checkFieldtwo = $("input#m_type").val().length;
            checkFieldthree = $("input#mo_type").val().length;
            checkFieldfour = $("input#s_v_type").val().length;
            //calling enableDisableButton() function on keyup
            enableDisableButton();
        });
    });

    
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the crurrent tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        
        //... and fix the Previous/Next buttons:
        if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
        } else {
        document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1 )) {
        document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
        document.getElementById("nextBtn").innerHTML = "Save";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }
    
    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        var add = document.getElementsByClassName("add_block");
        var add_hide = document.getElementsByClassName("add_hide");
        var add_show = document.getElementsByClassName("add_show");

        // disply form data
        // step-1
        
        //var editCategory = document.getElementById("editCategory").value;
        $(document).ready(function(){
            var categorie = document.getElementById("categorie").value;          
            var c_type = document.getElementById("c_type").value;
            var categorie_result = c_type ;
            //document.getElementById('categorie_result').textContent = sandhani;
            document.getElementById('categorieFinalResult').textContent = categorie_result;
            document.getElementById('editCategory').value = categorie_result;
            $("#editCategory").change(function(){
                var editCategory = document.getElementById("editCategory").value;
                document.getElementById('c_type').value = editCategory;
               document.getElementById('categorie_result').textContent = editCategory;
               document.getElementById('categorieFinalResult').textContent = editCategory;
            });
        });
            
        // step-2
        $(document).ready(function(){
            var manufacturer = document.getElementById("manufacturer").value;          
            var m_type = document.getElementById("m_type").value;
            var manufacturerResult = manufacturer + ' ' + m_type;
            // document.getElementById('manufacturerResult').textContent = manufacturerResult;
            document.getElementById('editManufacturer').value = manufacturerResult;
            $("#editManufacturer").change(function(){
                var editManufacturer = document.getElementById("editManufacturer").value;
                document.getElementById('m_type').value = editManufacturer;
               document.getElementById('manufacturerResult').textContent = editManufacturer;
               //document.getElementById('editCategory').value = editCategory;
            });
        });

        // step-3
        $(document).ready(function(){
            var model = document.getElementById("model").value;          
            var mo_type = document.getElementById("mo_type").value;
            var modelResult = model + ' ' + mo_type;
            // document.getElementById('modelResult').textContent = modelResult;
            document.getElementById('cameraFinalResult').textContent = modelResult;
            document.getElementById('editCamera').value = modelResult;
            $("#editCamera").change(function(){
                var editCamera = document.getElementById("editCamera").value;
                document.getElementById('mo_type').value = editCamera;
                document.getElementById('modelResult').textContent = editCamera;
                document.getElementById('cameraFinalResult').textContent = editCamera;
               //document.getElementById('editCategory').value = editCategory;
            });
        });
        // step 4
        $(document).ready(function(){
            var s_value = document.getElementById("s_value").value;          
            var s_v_type = document.getElementById("s_v_type").value; 

            var s_value2 = $('input[name="s_value2"]').val();         
            var s_v_type2 = $('input[name="s_v_type2"]').val();

            var s_value3 = $('input[name="s_value3"]').val();         
            var s_v_type3 = $('input[name="s_v_type3"]').val(); 

            // var s_value3 = document.getElementById("s_value3").value;          
            // var s_v_type3 = document.getElementById("s_v_type3").value;

            var sensorResult = s_value + ' ' + s_v_type;
            var sensorResult2 =  ''+ s_v_type2;
            var sensorResult3 =  ' ' + s_v_type3;
            document.getElementById('sensorResult').textContent = sensorResult;
            document.getElementById('sensorResult2').textContent = sensorResult2;
            document.getElementById('sensorResult3').textContent = sensorResult3;

            document.getElementById('sensorResult_2').textContent = sensorResult;
            document.getElementById('sensorValueFinalResult').textContent = sensorResult;
            document.getElementById('editSensor').value = sensorResult;
            $("#editSensor").change(function(){
                var editSensor = document.getElementById("editSensor").value;
                document.getElementById('s_v_type').value = editSensor;
               document.getElementById('sensorResult').textContent = editSensor;
                document.getElementById('sensorResult_2').textContent = editSensor;
                document.getElementById('sensorValueFinalResult').textContent = editSensor;

               //document.getElementById('editCategory').value = editCategory;
            });
        });
        

        // step-5
        $(document).ready(function(){
            var width = document.getElementById("width").value;
            var height = document.getElementById("height").value;
            var diameter = document.getElementById("diameter").value;  
            document.getElementById('editwidth').value = width;       
            document.getElementById('editheight').value = height;       
            document.getElementById('editdiameter').value = diameter;

            var sensorValueResult = 'W' + width+ 'mm' + '   ' +'H'+ height+ 'mm' + ' '+'D'+ diameter;
            document.getElementById('sensorValueResult').textContent = sensorValueResult;
             document.getElementById('sensorWidthResult').textContent = width;
             document.getElementById('sensorHeightResult').textContent = height;
             document.getElementById('sensorDiameterResult').textContent = diameter;
             $("#editwidth,#editheight,#editdiameter").change(function(){
                var editwidth = document.getElementById("editwidth").value;
                 var editheight = document.getElementById("editheight").value;
                 var editdiameter = document.getElementById("editdiameter").value;
                document.getElementById('width').value = editwidth;
                 document.getElementById('height').value = editheight;
                 document.getElementById('diameter').value = editdiameter;
                var sensorValueResult = 'W' + editwidth+ 'mm' + '   ' +'H'+ editheight+ 'mm' + ' '+'D'+ editdiameter;
                document.getElementById('sensorValueResult').textContent = sensorValueResult;
                 document.getElementById('sensorWidthResult').textContent = editwidth;
                document.getElementById('sensorHeightResult').textContent = editheight;
                document.getElementById('sensorDiameterResult').textContent = editdiameter;

               
            });
        });
        
        // Exit the function if any field in the current tab is invalid:
    //   if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "block";
        add[currentTab].style.display = "none";
        add_hide[currentTab].style.display = "none";
        add_show[currentTab].style.display = "block";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length ) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }
    
    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }
    
    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
    </script>
        <!-- Add Row Functionality -->
   
@endsection