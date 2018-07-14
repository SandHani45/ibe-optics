@extends('layouts.app')
@include('layouts.header')

@section('style')
<style>
	.smart-finder-pro{
        display: none;
      }
     /* #selectShowManuTwo{
      	display: block;
      }*/
      #reactButton > button{
  	    background: #d10a11;
		color: #fff;
      	float: right;
      	font-weight: 700;
      	border-top-left-radius: 16px;
	    border-bottom-right-radius: 16px;
	    border-bottom-left-radius: 16px;
	    border-top-right-radius: 16px;
	    padding: 3px 37px 4px 37px!important;
      }
</style>

@endsection

@section('content')
  <section class="mt-4 flex ps-fix">
        <div class="text-center width bg-coffie pd-top-fix">
         <h5><a  class=" text-unset white">ADD LENS</a></h5>
         <div class="back">
             <a href="{{URL::asset('smartfinder-plus')}}" class="btn btn-f btn-red radius-50 white">Back</a>
         </div>
        </div>
    </section>

<section>
    <div id="regForm" >
		{{-- add catagoire --}}
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
                                    <button type="submit" id="setpOne" class="btn btn-f btn-red font-40 radius-50">Save</button>
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
            <!-- LENS MANUFACTURER -->
            <div class="tab mb-2" id="selectShowManu">
                <div class="add_hide" id="add_hideTwo">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="bg-top ">
                                <p class="heade-title ml-3"> LENS MANUFACTURER</p>
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
                                    <button type="button" id="sendManufacturer" class="btn btn-f btn-red font-40 radius-50" >Save</button>
                                </div>
                            </div>     
                        </div>   
                    </div>
                </div>
                <div class="add_show" id="show_hideTwo">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> LENS MANUFACTURER</p>
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
              <!-- LENS SERIES -->
            <div class="tab mb-2" id="selectShowManuTwo">
                <div class="add_hide" id="add_hideThree">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="bg-top ">
                                <p class="heade-title ml-3"> LENS SERIES</p>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding ">
                        <div class="col-md-8">
                            <div class="row ml-2">
                                <div class="col-md-4 ml-3">
                                    <select class="form-control border-td-0 stepby" onchange="showDiv3(this)" id="selectLensSeries" name="selectLensSeries" >
                                        <option value="">Choose series</option>
                                    </select>
                                </div>
                                <div class="col-md-2 text-center">
                                    <p class="font-weight-bold mt-2">OR</p>
                                </div>
                                <div class="col-md-4">
                                    <input type="hidden" value="{{csrf_token()}}" id="token" />
                                    <input type="text" class="form-control border-td-0 stepby" id="lensSeries"  name="lensSeries" placeholder="Type new series">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ml-3 add_block">
                            <div style="overflow:auto;">
                                <div id="saveHideTwo" style="float:right;">
                                    <button type="button" id="sendSeries" class="btn btn-f btn-red font-40 radius-50" >Save</button>
                                </div>
                            </div>     
                        </div>   
                    </div>
                </div>
                <div class="add_show" id="show_hideThree">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> LENS SERIES</p>
                                <p class="title-edit col-md-3"><a  class="float-right edit-color " data-toggle="modal" data-target="#seriesModal" data-whatever="@mdo" href="">Edit</a></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 ml-3">
                                    <p  class="font-weight-bold" id="seriesResult" ></p>
                                </div>
                            </div>
                        </div>                 
                    </div>
                      {{-- EDIT MODEL  MANUFACTURER--}}

                    <div class="modal fade" id="seriesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit LENS SERIES</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">LENS SERIES :</label>
                                    <input type="hidden" value="{{csrf_token()}}" id="token" />
                                    <input type="text" class="form-control" name="" id="editSeries">
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
                 <!-- FOCAL LENGTH -->
            <div class="tab mb-2" id="selectShowManuThree">
                <div class="add_hide" id="add_hideFour">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="bg-top ">
                                <p class="heade-title ml-3"> FOCAL LENGTH</p>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding ">
                        <div class="col-md-12" id="focalLength">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="check-container">18mm
                                        <input type="checkbox" value="18mm"   checked="checked">
                                        <span class="checkmark"></span>
                                      </label>
                                </div>
                                <div class="col-md-2 ">
                                    <label class="check-container">20mm
                                        <input type="checkbox"  value="20mm" >
                                        <span class="checkmark"></span>
                                      </label>
                                </div> 
                                <div class="col-md-2 ">
                                    <label class="check-container">24mm
                                        <input type="checkbox" value="24mm"  >
                                        <span class="checkmark"></span>
                                      </label>
                                </div>
                                <div class="col-md-2">
                                    <label class="check-container">28mm 
                                        <input type="checkbox" value="28mm"  >
                                        <span class="checkmark"></span>
                                      </label>
                                </div>
                                <div class="col-md-2">
                                    <label class="check-container">35mm
                                        <input type="checkbox" value="35mm"  >
                                        <span class="checkmark"></span>
                                      </label>
                                </div>
                                <div class="col-md-2 ">
                                    <label class="check-container">60mm
                                        <input type="checkbox"  value="60mm" >
                                        <span class="checkmark"></span>
                                      </label>
                                </div>
                                <div class="col-md-2 ">
                                    <label class="check-container">100mm
                                        <input type="checkbox"  value="100mm" >
                                        <span class="checkmark"></span>
                                      </label>
                                </div>
                                <div class="col-md-2 ">
                                    <label class="check-container">120mm
                                        <input type="checkbox" value="120mm"  >
                                        <span class="checkmark"></span>
                                      </label>
                                </div>
                                <div class="col-md-2 ">
                                    <label class="check-container">160mm
                                        <input type="checkbox" value="160mm"  >
                                        <span class="checkmark"></span>
                                      </label>
                                </div>
                                <div class="col-md-2 ">
                                    <label class="check-container">180mm
                                        <input type="checkbox"  value="180mm" >
                                        <span class="checkmark"></span>
                                      </label>
                                </div>
                                <div class="col-md-2 ">
                                    <label class="check-container">200mm
                                        <input type="checkbox"  value="200mm">
                                        <span class="checkmark"></span>
                                      </label>
                                </div>
                                <div class="col-md-2 ">
                                    <label class="check-container">250mm
                                        <input type="checkbox" value="250mm">
                                        <span class="checkmark"></span>
                                      </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3 ml-3 add_block">
                            <div style="overflow:auto;">
                               {{--  <div id="saveHideThree" style="float:right;">
                                    <button type="button" id="sendCamera" class="btn btn-f btn-red font-40 radius-50" onclick="nextPrev(1)">Save</button>
                                </div> --}}
                            </div>     
                        </div>   
                    </div>
                </div>
                <div class="add_show" id="show_hideFour">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> FOCAL LENGTH</p>
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
                </div>     
            </div>

             <!-- FOCAL LENGTH VALUES                -->
            <div class="tab mb-2" id="selectShowManuFour">
                <div class="add_hide">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="bg-top ">
                                <p class="heade-title ml-3">FOCAL LENGTH VALUES</p>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding ">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3 ml-3 ">
                                    <p id="sensorResult_2" class="">180mm</p> 
                                                                                  
                                </div>
                                
                                <div class="col-md-3">
                                    <p class="">Lens image diameter [Lid]</p>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" class="form-control border-td-0 col-md-6" id="focal_length_value" name="focal_length_value"  placeholder="Value" required="">
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-3 ml-3 add_block">
                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button"  class="btn btn-f btn-red font-40 radius-50" onclick="nextPrev(1)" >Save</button>
                                </div>
                            </div>     
                        </div> 
                    </div>
                </div>
                <div class="add_show">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> FOCAL LENGTH VALUES</p>
                                <p class="title-edit col-md-3"><a  onclick="nextPrev(-1)" class="float-right edit-color " href="">Edit</a></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3 ml-3 ">
                                    <p id="sensorResult_2" class="">180mm</p>                                               
                                </div>
                                <div class="col-md-3">
                                    <p class="">Lens image diameter [Lid]</p>
                                </div>
                                <div class="col-md-3">
                                    <p  class="font-weight-bold" id="focal_length_value_result" ></p>
                                </div>
                            </div>
                        </div>                 
                    </div>
                </div>                  
            </div>
             <!--  T-STOP VALUE -->
            <div class="tab mb-2" id="selectShowManuFive">
                <div class="add_hide">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="bg-top ">
                                <p class="heade-title ml-3"> T-STOP VALUE</p>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding ">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3 ml-3">
                                    <p id="sensorResult_3" class="">180mm</p> 
                                                                                  
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6"><p class="mt-3">Max Value <span class="font-weight-bold ml-1">T</span></p> </div>
                                        <input type="number" class="form-control border-td-0 col-md-4" id="max" name="max" placeholder="Value" required="">
                                      
                                    </div>  
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6"> <p class="mt-3">Min Value <span class="font-weight-bold ml-1">T</span></p> </div>
                                        <input type="number" class="form-control border-td-0 col-md-4" id="min" name="max" placeholder="Value" required="">

                                    </div>  
                                </div>
                              
                            </div> 
                        </div>
                        <div class="col-md-3 ml-3 add_block">
                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button"  class="btn btn-f btn-red font-40 radius-50" onclick="nextPrev(1)" >Save</button>
                                </div>
                            </div>     
                        </div> 
                    </div>
                </div>
                <div class="add_show">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> T-STOP VALUE</p>
                                <p class="title-edit col-md-3"><a  onclick="nextPrev(-1)" class="float-right edit-color " href="">Edit</a></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3 ">
                                    <p id="sensorResult_3" class="">180mm</p>                                                      
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6"><p class="mt-3">Max Value <span class="font-weight-bold ml-1">T</span></p> </div>
                                        <p  class="font-weight-bold mt-3" id="max_result" ></p>   
                                    </div>  
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6"> <p class="mt-3">Min Value <span class="font-weight-bold ml-1">T</span></p> </div>
                                        <p  class="font-weight-bold mt-3" id="min_result" ></p>

                                    </div>  
                                </div>
                            </div>
                        </div>                 
                    </div>
                </div>                  
            </div>
            <div class="tab" id="">    
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
                                                <p class="font-40 font-weight-bold">Lens</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="font-40" id="final_lens">60mm</p>
                                            </div>
                                            
                                        </div>

                                        <div class="form-row">
                                                <div class="col-md-3">
                                                    <p class="font-40 font-weight-bold">Focal length & T-stop value</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p> <span> </span> 180mm</p>
                                                        </div>
                                                        <div class="col">
                                                            <p> Lens image diameter [Lid] <span>50</span></p>   
                                                        </div>
                                                        <div class="col">
                                                            <p>Max Value T <span>T 2.9</span></p>
                                                        </div>
                                                        <div class="col">
                                                            <p>Min Value T <span>T 22</span></p>
                                                        </div>
                                                    </div>   
                                                </div>   
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
{{-- <script type="text/javascript">

$('#setpOne').click(function(){
    var validation_categorie = $('#c_type').val();

   if(validation_categorie == ''){
    alert ('please filed the data');
   }
});


</script> --}}
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
            document.getElementById("add_hideThree").style.display = "none";
            document.getElementById("show_hideThree").style.display = "block";
       } 
    } 
    function showDiv4(select){
       if(select.value !== ' '){
            document.getElementById('selectShowManuFour').style.display = "block";
            // document.getElementById('saveHideFour').style.display = "none";
            document.getElementById("add_hideFour").style.display = "none";
            document.getElementById("show_hideFour").style.display = "block"; 
            document.getElementById("add_hideFive").style.display = "none";
            document.getElementById("show_hideFive").style.display = "block";

       } 
    } 
</script>
 
<script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    //LENS MANUFACTURER
    //categorie
    var categorieId = 0;
    $('document').ready(function(){
        $('#setpOne').click(function(){
            var c_type = $("#c_type").val();
            var token  = $("#token").val();
            if(c_type == ''){
                alert ('please fill the required fields');
                return;
            }
            document.getElementById('selectShowManu').style.display = "block";
            document.getElementById('saveHide').style.display = "none";
            document.getElementById("add_hideOne").style.display = "none";
            document.getElementById("show_hideOne").style.display = "block";
            $.ajax({
               type : "POST",
               data : "c_type=" + c_type + "&_token= "+ token,
               url:"/add-categorie",
                success:function(data){
                    console.log(data);
                    categorieId = data.id;
                    document.getElementById('categorie_result').innerHTML=data.name;
                    document.getElementById('editCategory').value = data.name;
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
                        document.getElementById('editCategory').innerHTML=data.name;
                   }
                });
            });
        });

// get id categorie data
var manufacturer_data = '';
var manufacturer_id = 0;
var name = null;
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
                console.log(categorieId);
                categorieId = data[0].id;
                var len = data.length;
                document.getElementById('categorie_result').innerHTML=data[0].name;
                document.getElementById("editCategory").value = data[0].name;
               //$("#manufacturer").empty();
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var name = data[i]['name'];
                    var manufactures = data[i]['manufactures'];
                    for (j = 0; j<manufactures.length; j++){
                        var name = manufactures[j]['name'];
                        var id = manufactures[j]['id'];
                        $("#manufacturer").append("<option value='"+id+"'>"+name+"</option>");
                    }
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
            var categorie_id  = categorieId;
            if(manufacturer == ''){
                alert ('please fill the required fields');
                return;
            }
            document.getElementById('selectShowManuTwo').style.display = "block";
            document.getElementById('saveHideTwo').style.display = "none";
            document.getElementById("add_hideTwo").style.display = "none";
            document.getElementById("show_hideTwo").style.display = "block";
            $.ajax({
               type : "POST",
               data : "manufacturer=" + manufacturer + "&_token= "+ token + "&categorie_id=" + categorie_id,
               url:"/add-manufacturer",
                success:function(data){
                    console.log(data);
                    categorieId = data.categorie_id;
                    manufacturerId = data.id;
                    document.getElementById('manufacturerResult').innerHTML=data.name;
                    document.getElementById('editManufacturer').value=data.name;
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
var series_data = '';
var series_id = 0;
$('document').ready(function(){
    $("#manufacturer").change(function() {
        var manufacturer_id = $(this).val();
        $.ajax({
            url:"/get-lens-manufacturer/" + manufacturer_id,
            method: "post",
            data: {manufacturer_id:manufacturer_id},
            success: function(data){
                console.log(data);
                camera_data = data.name;
                manufacturerId = data[0].id;
                // console.log(data[0].manufacturers.name);
                var len = data.length;
                document.getElementById('manufacturerResult').innerHTML=data[0].name;

                document.getElementById("editManufacturer").value = data[0].name;
               //$("#manufacturer").empty();
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var name = data[i]['name'];
                    var series = data[i]['series'];
                    for (j = 0; j<series.length; j++){
                        var name = series[j]['name'];
                        var id = series[j]['id'];
                        $("#selectLensSeries").append("<option value='"+id+"'>"+name+"</option>");
                    }
                }    
            }
        });
    });
});


//SERIES NAME
 var series_id = 0;
$('document').ready(function(){
        $('#sendSeries').click(function(){
            var lensSeries = $("#lensSeries").val();
            var token  = $("#token").val();
            var categorie_id  = categorieId;
            if(lensSeries == ''){
                alert ('please fill the required fields');
                return;
            }
            document.getElementById('selectShowManuThree').style.display = "block";
            document.getElementById("add_hideThree").style.display = "none";
            document.getElementById("show_hideThree").style.display = "block";
            $.ajax({
               type : "POST",
               data : "lensSeries=" + lensSeries + "&_token= "+ token + "&categorie_id=" + categorie_id + "&manufacturerId=" + manufacturerId,
               url:"/add-series-name",
                success:function(data){
                    console.log(data);
                    categorieId = data.categorie_id;
                    manufacturerId = data.manufacturer_id;
                    series_id  = data.id;
                    document.getElementById('seriesResult').innerHTML=data.name;  
                    document.getElementById('editSeries').value=data.name;  
               }
            });
        });
    });

// Edit SERIES
$('document').ready(function(){
    $('#editSetpThree').click(function(){
        var editSeries = $("#editSeries").val();
        var token  = $("#token").val();
        var seriesId  = series_id;
        $.ajax({
           type : "POST",
           data : "editSeries=" + editSeries + "&_token= "+ token ,
           url:"/add-series-name/" + seriesId,
            success:function(data){
                console.log(data);
                categorieId = data.categorie_id;
                manufacturerId = data.manufacturer_id;
                cameraId = data.id;
                document.getElementById('seriesResult').innerHTML=data.name;  
                document.getElementById('editSeries').value=data.name;    
            }
        });
    });
});
// get id camera
var focal_length_data = '';
var focal_id = 0;
$('document').ready(function(){
    $("#selectLensSeries").change(function() {
        var selectLensSeries_id = $(this).val();
        $.ajax({
            url:"/get-series/" + selectLensSeries_id,
            method: "post",
            data: {selectLensSeries_id:selectLensSeries_id},
            success: function(data){
                console.log(data);
                sensor_data = data.name;
                focalId = data[0].id;
                console.log(data[0].name);
                    
                document.getElementById('seriesResult').innerHTML=data[0].name;
                document.getElementById("editSeries").value = data[0].name;
                var len = data.length;
               //$("#manufacturer").empty();
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var name = data[i]['name'];
                    var focal_length = data[i]['focal_length']
                    for( var j = 0; j<focal_length.length; j++){
                        var id = focal_length[j]['id'];
                        var value = focal_length[j]['value'];
                        $("#s_value").append("<option value='"+id+"'>"+value+"</option>");
                    }
                   
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
        if(value == ''){
            alert ('please fill the required fields');
            return;
        }
        document.getElementById('selectShowManuFour').style.display = "block";
        document.getElementById('saveHideFour').style.display = "none";
        document.getElementById("add_hideFour").style.display = "none";
        document.getElementById("show_hideFour").style.display = "block"; 
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
                document.getElementById('sensorResult_2').innerHTML=data.value;
                document.getElementById('sensorResult').innerHTML=data.value;
                document.getElementById('sensorValueResult').innerHTML=data.value;
                document.getElementById('sensorWidthResult').innerHTML=data.width;
                document.getElementById('sensorHeightResult').innerHTML=data.height;
                document.getElementById('sensorDaimeterResult').innerHTML=data.diameter; 
                document.getElementById('width').value=data.width;
                document.getElementById('height').value=data.height;
                document.getElementById('diameter').value=data.diameter;
                document.getElementById("editSensor").value = data.value;
                document.getElementById("editwidth").value = data.width;
                document.getElementById("editheight").value = data.height;
                document.getElementById("editdiameter").value = data.diameter;
                document.getElementById('reviewValue').innerHTML=data.value;
                document.getElementById('reviewWidht').innerHTML=data.width;
                document.getElementById('reviewHeight').innerHTML=data.height;
                document.getElementById('reviewDaimeter').innerHTML=data.diameter; 
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
                document.getElementById('sensorResult_2').innerHTML=data.value;
                document.getElementById('sensorResult').innerHTML=data.value;
                document.getElementById('sensorValueResult').innerHTML=data.value;
                document.getElementById('sensorWidthResult').innerHTML=data.width;
                document.getElementById('sensorHeightResult').innerHTML=data.height;
                document.getElementById('sensorDaimeterResult').innerHTML=data.diameter; 
                document.getElementById('width').value=data.width;
                document.getElementById('height').value=data.height;
                document.getElementById('diameter').value=data.diameter;
                document.getElementById("editSensor").value = data.value;
                document.getElementById("editwidth").value = data.width;
                document.getElementById("editheight").value = data.height;
                document.getElementById("editdiameter").value = data.diameter;
                document.getElementById('reviewValue').innerHTML=data.value;
                document.getElementById('reviewWidht').innerHTML=data.width;
                document.getElementById('reviewHeight').innerHTML=data.height;
                document.getElementById('reviewDaimeter').innerHTML=data.diameter; 
           }
        });
    });
});


// get id sensor
var width_data = '';
var width_id = 0;
$('document').ready(function(){
    $("#s_value").change(function() {
        var sensor_id = $(this).val();
        $.ajax({
            url:"/get-sensor/" + sensor_id,
            method: "post",
            data: {sensor_id:sensor_id},
            success: function(data){
                console.log(data);
                width_data = data.name;
                // cameraId = data[0].id;
                // console.log(data[0].name);
                  sensorId = data.id;
                  console.log(data.value) ;  
                document.getElementById('sensorResult_2').innerHTML=data.value;
                document.getElementById('sensorResult').innerHTML=data.value;
                document.getElementById('sensorValueResult').innerHTML=data.value;
                document.getElementById('sensorWidthResult').innerHTML=data.width;
                document.getElementById('sensorHeightResult').innerHTML=data.height;
                document.getElementById('sensorDaimeterResult').innerHTML=data.diameter; 
                document.getElementById('width').value=data.width;
                document.getElementById('height').value=data.height;
                document.getElementById('diameter').value=data.diameter;
                document.getElementById("editSensor").value = data.value;
                document.getElementById("editwidth").value = data.width;
                document.getElementById("editheight").value = data.height;
                document.getElementById("editdiameter").value = data.diameter;
                document.getElementById('reviewValue').innerHTML=data.value;
                document.getElementById('reviewWidht').innerHTML=data.width;
                document.getElementById('reviewHeight').innerHTML=data.height;
                document.getElementById('reviewDaimeter').innerHTML=data.diameter; 

                var len = data.length;
               //$("#manufacturer").empty();
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var name = data[i]['name'];
                    var sensors = data[i]['sensors']
                    for( var j = 0; j<sensors.length; j++){
                        var id = data[j]['id'];
                        var name = data[j]['name'];
                        $("#model").append("<option value='"+id+"'>"+name+"</option>");
                    }
                   
                }    
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
             if(width == '' || height == '' || diameter == ''){
            alert ('please fill the required fields');
            return;
            }
            document.getElementById("selectShowManuFour").style.display = "block";
            document.getElementById("add_hideFive").style.display = "none";
            document.getElementById("show_hideFive").style.display = "block";
            document.getElementById("selectShowManuReview").style.display = "block";
            
            $.ajax({
               type : "PUT",
               data : "width=" + width + "&_token= "+ token + "&height=" + height + "&diameter=" + diameter,
               url:"/add-sensor/" + sensor_id,
                success:function(data){
                    console.log(data);
                    sensorId = data.id;
                    var categorie_id = data.categorie_id
                document.getElementById('sensorResult_2').innerHTML=data.value;
                document.getElementById('sensorResult').innerHTML=data.value;
                document.getElementById('sensorValueResult').innerHTML=data.value;
                document.getElementById('sensorWidthResult').innerHTML=data.width;
                document.getElementById('sensorHeightResult').innerHTML=data.height;
                document.getElementById('sensorDaimeterResult').innerHTML=data.diameter; 
                document.getElementById('width').value=data.width;
                document.getElementById('height').value=data.height;
                document.getElementById('diameter').value=data.diameter;
                document.getElementById("editSensor").value = data.value;
                document.getElementById("editwidth").value = data.width;
                document.getElementById("editheight").value = data.height;
                document.getElementById("editdiameter").value = data.diameter;
                document.getElementById('reviewValue').innerHTML=data.value;
                document.getElementById('reviewWidht').innerHTML=data.width;
                document.getElementById('reviewHeight').innerHTML=data.height;
                document.getElementById('reviewDaimeter').innerHTML=data.diameter; 
                
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
                var categorie_id = data.categorie_id
                document.getElementById('sensorResult_2').innerHTML=data.value;
                document.getElementById('sensorResult').innerHTML=data.value;
                document.getElementById('sensorValueResult').innerHTML=data.value;
                document.getElementById('sensorWidthResult').innerHTML=data.width;
                document.getElementById('sensorHeightResult').innerHTML=data.height;
                document.getElementById('sensorDaimeterResult').innerHTML=data.diameter; 
                document.getElementById('width').value=data.width;
                document.getElementById('height').value=data.height;
                document.getElementById('diameter').value=data.diameter;
                document.getElementById("editSensor").value = data.value;
                document.getElementById("editwidth").value = data.width;
                document.getElementById("editheight").value = data.height;
                document.getElementById("editdiameter").value = data.diameter;
                document.getElementById('reviewValue').innerHTML=data.value;
                document.getElementById('reviewWidht').innerHTML=data.width;
                document.getElementById('reviewHeight').innerHTML=data.height;
                document.getElementById('reviewDaimeter').innerHTML=data.diameter; 
               }
            });
        });
    });



// $('document').ready(function(){
//         $('#reviewData').click(function(){
//             var categorie_id = categorie_id;
//             $.ajax({
//                type : "post",
//                data : {categorie_id:categorie_id},
//                url:"/camera-review/" + categorie_id,
//                 success:function(data){
//                     console.log(data);
             
//                }
//             });
//         });
//     });
</script>

<script>
    $(document).ready(function(){
        var selectFiled,selectFiledTwo,selectFiledThree,selectFiledFour;
        //checking the length of the value of message and assigning to a variable(checkField) on load
        selectFiled = $("#categorie").val().length; 
        selectFiledTwo = $("#manufacturer").val().length; 
        // selectFiledThree = $("#model").val().length;
        // selectFiledFour = $("#s_value").val().length;
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
            // selectFiledThree = $("#model").val().length; 
            // selectFiledFour = $("#s_value").val().length; 
            //calling enableDisableButton() function on keyup
            enableDisableSelect();
        });

        var checkField,checkFieldtwo,checkFieldthree,checkFieldfour;
        //checking the length of the value of message and assigning to a variable(checkField) on load
        checkField = $("input#c_type").val().length; 
        checkFieldtwo = $("input#m_type").val().length;
        // checkFieldthree = $("input#mo_type").val().length;
        // checkFieldfour = $("input#s_v_type").val().length;
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
            // checkFieldthree = $("input#mo_type").val().length;
            // checkFieldfour = $("input#s_v_type").val().length;
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
            //document.getElementById('sensorResult').textContent = sensorResult;
            // document.getElementById('sensorResult2').textContent = sensorResult2;
            // document.getElementById('sensorResult3').textContent = sensorResult3;

            // document.getElementById('sensorResult_2').textContent = sensorResult;
            document.getElementById('sensorValueFinalResult').textContent = sensorResult;
            document.getElementById('editSensor').value = sensorResult;
            $("#editSensor").change(function(){
                var editSensor = document.getElementById("editSensor").value;
                document.getElementById('s_v_type').value = editSensor;
               //document.getElementById('sensorResult').textContent = editSensor;
                // document.getElementById('sensorResult_2').textContent = editSensor;
                document.getElementById('sensorValueFinalResult').textContent = editSensor;

               //document.getElementById('editCategory').value = editCategory;
            });
        });
        

        // step-5
        $(document).ready(function(){
            // var categorie = document.getElementById("categorie").value;
            // $('input[name="s_value2"]').val();
            // var camera = document.getElementById("model").value;
            // document.getElementById('editwidth').value = width;       
            // document.getElementById('editheight').value = height;       
            // document.getElementById('editdiameter').value = diameter;

            //var sensorValueResult = 'W' + width+ 'mm' + '   ' +'H'+ height+ 'mm' + ' '+'D'+ diameter;
            // document.getElementById('categorieFinalResult').textContent = categorie;
            // document.getElementById('cameraFinalResult').textContent = camera;
             // document.getElementById('sensorWidthResult').textContent = width;
             // document.getElementById('sensorHeightResult').textContent = height;
             // document.getElementById('sensorDiameterResult').textContent = diameter;
             $("#editwidth,#editheight,#editdiameter").change(function(){
                // var editwidth = document.getElementById("editwidth").value;
                //  var editheight = document.getElementById("editheight").value;
                //  var editdiameter = document.getElementById("editdiameter").value;
                // document.getElementById('width').value = editwidth;
                //  document.getElementById('height').value = editheight;
                //  document.getElementById('diameter').value = editdiameter;
                var sensorValueResult = 'W' + editwidth+ 'mm' + '   ' +'H'+ editheight+ 'mm' + ' '+'D'+ editdiameter;
                // document.getElementById('sensorValueResult').textContent = sensorValueResult;
                //  document.getElementById('sensorWidthResult').textContent = editwidth;
                // document.getElementById('sensorHeightResult').textContent = editheight;
                // document.getElementById('sensorDiameterResult').textContent = editdiameter;

               
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
   <script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react-dom.min.js'></script>
	<script  src="js/reactIndex.js"></script>

@endsection