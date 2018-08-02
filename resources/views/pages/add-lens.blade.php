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
    table tr {
        border-bottom: none!important;
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
                        <div class="col-md-8">
                             <table style="width: 100%">
                                <tbody class="dynamic row" id="pda-details">
                                    <tr class="col-md-2 flex ml-5">
                                        <td>
                                            <label for="annual_eval[1]" class="check-container">
                                                <input type="checkbox" id="focal_length_check[1]" name="focal_length_check[1]" class="dyn-input" checked="" />
                                                <span class="checkmark"></span>
                                                &nbsp;
                                            </label>
                                        </td>
                                        <td>
                                            <input type="hidden" value="{{csrf_token()}}" id="token" />
                                            <input class="dyn-input form-control focal_length border-td-0 stepby width-100 length" type="number" id="focal_length[1]" name="focal_length"/>  
                                        </td>
                                        <td>
                                            <p>mm</p>
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
                                <div id="saveHideThree" style="float:right;">
                                    <button type="button" id="sendFocalLength" class="btn btn-f btn-red font-40 radius-50" >Save</button>
                                </div>
                            </div>     
                        </div>   
                    </div>
                </div>
                <div class="add_show" id="show_hideFour">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> FOCAL LENGTH</p>
                                <p class="title-edit col-md-3"><a class="float-right edit-color " data-toggle="modal" data-target="#focalLengthModal" data-whatever="@mdo" href="">Edit</a></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 ml-3">
                                    <p  class="font-weight-bold" id="focalLengthResult"></p>
                                </div>
                            </div>
                        </div>                 
                    </div>
                    {{-- edit focal length --}}
                        <div class="modal fade" id="focalLengthModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit FOCAL LENGTH</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body" id="editFocalValueData">

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

             <!-- add adapter                -->
            <div class="tab mb-2" id="selectShowManuFour">
                <div class="add_hide" id="add_hideFive">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="bg-top ">
                                <p class="heade-title ml-3">ADD ADAPTER VALUES</p>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding ">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3 ml-3 ">
                                    <p id="focalLenthResult" class=""></p> 
                                                                                  
                                </div>
                                
                                <div class="col-md-8" id="focal_length_value_result">
                                 {{--    <div class="row">
                                        <div class="col-md-6">
                                            <p class="">Lens image diameter [Lid]</p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control border-td-0 col-md-6" id="focal_length_value" name="focal_length_value"  placeholder="Value" required=""> 
                                        </div>
                                    </div> --}}
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-3 ml-3 add_block">
                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button"  class="btn btn-f btn-red font-40 radius-50" id="addFocalValue">Save</button>
                                </div>
                            </div>     
                        </div> 
                    </div>
                </div>
                <div class="add_show" id="show_hideFive">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> ADD ADAPTER VALUES</p>
                                <p class="title-edit col-md-3"><a  class="float-right edit-color " data-toggle="modal" data-target="#focalLengthValueModal" data-whatever="@mdo" href="">Edit</a></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding">
                        <div class="col-md-8" id="focal_length_value_view">
                        </div>                 
                    </div>
                      {{-- edit focal length --}}
                    <div class="modal fade" id="focalLengthValueModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">EDIT ADD ADAPTER VALUES</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body" id="editFocalLengthValueData">

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
             <!--  T-STOP VALUE -->
            <div class="tab mb-2" id="selectShowManuFive">
                <div class="add_hide" id="add_hideSix">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="bg-top ">
                                <p class="heade-title ml-3"> T-STOP VALUE</p>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding ">
                        <div class="col-md-8" id="t-shop-value">
                           
                        </div>
                        <div class="col-md-3 ml-3 add_block">
                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button"  class="btn btn-f btn-red font-40 radius-50" id="addTshopValue" >Save</button>
                                </div>
                            </div>     
                        </div> 
                    </div>
                </div>
                <div class="add_show" id="show_hideSix">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> T-STOP VALUE</p>

                                <p class="title-edit col-md-3"><a  class="float-right edit-color " data-toggle="modal" data-target="#editButtonTShopModel" data-whatever="@mdo" href="">Edit</a></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding">
                        <div class="col-md-8" id="focal_tshop_view">
                            
                        </div>
                                                 {{-- edit focal length --}}
                    <div class="modal fade" id="editButtonTShopModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" >T-STOP VALUE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body" id="editTshopValueData">

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="saveEditTshotValue" class="btn btn-primary" data-dismiss="modal">Save</button>
                              </div>
                            </div>
                        </div>
                    </div>              
                    </div>
                </div>                  
            </div>
            <div class="tab" id="selectShowManuSix">    
                <div class="row bg-top">
                </div>
                <div class="row bg-f2 padding ">             
                    <div class="col-md-6 ml-5 add_block">
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="reviewButton"  
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
                                    <div class="modal-body" >
                                        <div class='form-row'>
                                            <div class='col-md-3'>
                                                <p class='font-40 font-weight-bold'>Lens</p>
                                            </div>
                                            <div class='col-md-3'>
                                                <p class='font-40' id="lennManufactureReview"></p>
                                            </div>
                                        </div>
                                       <div class='form-row'> 
                                            <div class="col-md-3">
                                                <p class="font-40 font-weight-bold">Focal length &amp; T-stop value</p>
                                            </div>
                                        </div>
                                        <div class="form-row" id='reviewDisplay'>
                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer" style=" justify-content: center;">
                                        <button type="button" class="btn btn-red float-right radius-50 add-another "  data-dismiss="modal">Edit</button>
                                        <button type="submit"  onClick="window.location.reload()"  class="btn btn-red float-right radius-50 add-another"  >SUBMIT</button>
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
                    var manufactures = data[i]['lens_manufactures'];
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
               url:"/add-lens-manufacturer",
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
               url:"/edit-lens-manufacturer/" + manufacturerId,
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
                    manufacturerId = data.lens_manufacturer_id;
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
        console.log(seriesId);
        $.ajax({
           type : "POST",
           data : "editSeries=" + editSeries + "&_token= "+ token ,
           url:"/add-series-name/" + seriesId,
            success:function(data){
                console.log(data);
                categorieId = data.categorie_id;
                manufacturerId = data.lens_manufacturer_id;
                cameraId = data.id;
                document.getElementById('seriesResult').innerHTML=data.name;  
                document.getElementById('editSeries').value=data.name;    
            }
        });
    });
}); 

// get id selectLensSeries
var focal_length_data = '';

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
                series_id = data[0].id;
                console.log(series_id)
                console.log(data[0].id);
                categorieId = data[0].categorie_id;
                manufacturerId = data[0].lens_manufacturer_id;
                    
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

//sendFocalLength
var serie_id = 0;
var EditFocalLengthData = null;
$('document').ready(function(){
    $('#sendFocalLength').click(function(){
        serie_id  = series_id;
        categorie_id = categorieId;
        manufacturerId = manufacturerId;
        value_array = []
       
        var count = $('#pda-details .focal_length').length

        if(count > 0){
           for(var i = 1; i <= count; i++ )
           {
            if(i === 1){
               var value = $('input[name="focal_length"]' ).val();
               if(value === ''){
                    alert ('please fill the required fields');
                    return;
                }

            }else{
                var value = $('#focal_length'+ i).val();
                if(value === ''){
                    alert ('please fill the required fields');
                    return;
                }
            }
             value_array.push(value)
           }
        }
          
        var length_value = value_array.length ;

        document.getElementById('selectShowManuFour').style.display = "block";
        document.getElementById("add_hideFour").style.display = "none";
        document.getElementById("show_hideFour").style.display = "block";
        
        $.ajax({
            type : "POST",
            data : "focal_length=" + value_array + "&categorie_id=" + categorie_id + "&manufacturerId=" + manufacturerId + "&series_id=" + serie_id,
            url:"/add-focal-length/" + series_id,
                success:function(data){
                console.log(data);
                var len = data.length;
                EditFocalLengthData = data;
                var  serie_id  = data[0].series_id;
                console.log(serie_id );
                for( var j = 0; j<len; j++){
                    var focal_length = data[j]['focal_length'];
                    var id = data[j]['id'];
                    //$("#focal_length_value_result").append("<p id='"+id+"'>"+focal_length+"</p>");
                    $("#focalLengthResult").append("<p>"+focal_length+"</p>");      
                    $("#focalLenthResult").append("<p>"+focal_length+"</p>");
                    var $newdiv1 = $( "<div class='row'> <div class ='col-md-6'><p>Lens image diameter [Lid]<p></div> <div class = 'col-md-6'><input type='number' class='form-control border-td-0 col-md-6' id='focal_length_value"+id+"'  name='focal_length_value'  placeholder='Value' required=''>  </div></div>" );
                      // newdiv2 = document.createElement( "input" ),
                      // existingdiv1 = document.getElementById("foo");
                    $("#focal_length_value_result" ).append( $newdiv1);

                     var $editData = $("<div class='form-group'><label for='recipient-name' class='col-form-label'></label><input type='text'class='form-control' value='"+focal_length+"' name='editfocalvalue' id='editfocalvalue"+id+"'></div>");  
                      $("#editFocalValueData" ).append( $editData);             

                }  
            } 
        }); 
    });
});
                     

// EditFocalLength
var getFocalId = '';

$('document').ready(function(){
    $('#editSetpFour').click(function(){
        editFocalArry = [];
        getFocalLenId =[];
       var count = $('#editFocalValueData .form-group').length

       focalObjectList = [];
       if(count > 0){
         for( var j = 0; j<count; j++){
            getFocalId = EditFocalLengthData[j]['id'];
            var focal_edit_length = $('#editfocalvalue'+ getFocalId).val(); 
            editFocalArry.push(focal_edit_length);
            getFocalLenId.push(getFocalId);
            focalObject = {
                'id':getFocalId,
                'focal_length':focal_edit_length
            }
            focalObjectList.push(focalObject)
         }
       }
        $.ajax({
            type : "PUT",
            data:"focal_obj="+JSON.stringify(focalObjectList),
            url:"/edit-focal-length/" + series_id ,
            success:function(data){
                console.log(data);
                 $("#focalLengthResult").html(""); 
                 $("#focalLenthResult").html(""); 
                 $("#focal_length_value_view").html(""); 
                
                var len = data.length;
                for( var j = 0; j<len; j++){
                    var focal_length = data[j]['focal_length'];
                    var focal_length_value = data[j]['focal_length_value'];
                    var id = data[j]['id'];
                    //$("#focal_length_value_result").append("<p id='"+id+"'>"+focal_length+"</p>");
                    $("#focalLengthResult").append("<p>"+focal_length+"</p>");      
                    $("#focalLenthResult").append("<p>"+focal_length+"</p>");
                    var $newdiv1 = $( "<div class='row ml-2'> <div class ='col-md-3'><p class='font-weight-bold'>"+focal_length+" mm</p></div> <div class ='col-md-4'><p>Lens image diameter [Lid]</p></div> <div class ='col-md-3'><p class='font-weight-bold'>"+focal_length_value+"</p></div></div>" );
                    // newdiv2 = document.createElement( "input" ),
                    // existingdiv1 = document.getElementById("foo");
                    $("#focal_length_value_view" ).append( $newdiv1);

                }  

           }
        });
    });
});


//FOCAL LENGTH VALUES
var getFocalValueId = '';
$('document').ready(function(){
    $('#addFocalValue').click(function(){
        editFocalArry = [];
        getFocalLenId =[];
       var count = $('#focal_length_value_result .row').length
       focalValueObjectList = [];

       if(count > 0){
         for( var j = 0; j<count; j++){
            getFocalValueId = EditFocalLengthData[j]['id'];
            var focal_length_value_update = $('#focal_length_value'+ getFocalValueId).val(); 
            editFocalArry.push(focal_length_value_update);
            getFocalLenId.push(getFocalValueId);
            focalValueObject = {
                'id':getFocalValueId,
                'focal_length_value':focal_length_value_update
            }
            if(focal_length_value_update === ''){
                alert('Input can not be left blank');
                return ;
           }

            focalValueObjectList.push(focalValueObject)
         }
       }
        $.ajax({
           type : "POST",
            data:"focal_length_value="+JSON.stringify(focalValueObjectList),
           url:"/focal-length-value/" + serie_id,
            success:function(data){
                console.log(data);
                var len = data.length;
                document.getElementById('selectShowManuFour').style.display = "block";
                document.getElementById("add_hideFive").style.display = "none";
                document.getElementById("show_hideFive").style.display = "block"; 
                document.getElementById("selectShowManuFive").style.display = "block";
                for( var j = 0; j<len; j++){
                var focal_length = data[j]['focal_length'];
                var focal_length_value = data[j]['focal_length_value'];
                var id = data[j]['id'];
                
                var $newdiv1 = $( "<div class='row ml-2'> <div class ='col-md-3'><p class='font-weight-bold'>"+focal_length+" mm</p></div> <div class ='col-md-4'><p>Lens image diameter [Lid]</p></div> <div class ='col-md-3'><p class='font-weight-bold'>"+focal_length_value+"</p></div></div>" );
                  // newdiv2 = document.createElement( "input" ),
                  // existingdiv1 = document.getElementById("foo");
                $("#focal_length_value_view" ).append( $newdiv1);

                 var $editFocalValueData = $("<div class='form-group'><label for='recipient-name' class='col-form-label'></label><input type='text'class='form-control' value='"+focal_length_value+"' name='editfocallengthvalue' id='editfocallengthvalue"+id+"'></div>");  
                  $("#editFocalLengthValueData" ).append( $editFocalValueData);

                   var $newdiv2 = $( "<div class='row ml-2'> <div class ='col-md-3'><p class='font-weight-bold'>"+focal_length+" mm</p></div> <div class ='col-md-4'><div class='form-group flex'><label class='width-50'>Max Value <span class='font-weight-bold ml-1'>T</span></label><input type='number' id='t-shop-max"+id+"' class='form-control mx-sm-3 width-50'></div> </div> <div class ='col-md-4'><div class='form-group flex'><label class='width-50'>Min Value <span class='font-weight-bold ml-1'>T</span></label><input type='number' id='t-shop-min"+id+"' class='form-control mx-sm-3 width-50' ></div></div></div>" );
                    $("#t-shop-value").append( $newdiv2);             

            } 

           }
        });
    });
});

//EDIT FOCAL LENGTH VALUES

$('document').ready(function(){
    $('#editSetpFive').click(function(){

       var count = $('#editFocalLengthValueData .form-group').length
       focalValueEditObjectList = [];

       if(count > 0){
         for( var j = 0; j<count; j++){
            editFocalValueId = EditFocalLengthData[j]['id'];
            var focal_length_value_edit = $('#editfocallengthvalue'+ editFocalValueId).val(); 
            focalValueEditObject = {
                'id':editFocalValueId,
                'focal_length_value':focal_length_value_edit
            }
            focalValueEditObjectList.push(focalValueEditObject)
         }
       }
        $.ajax({
           type : "PUT",
            data:"focal_length_edit_value="+JSON.stringify(focalValueEditObjectList),
           url:"/focal-length-value/" + serie_id,
            success:function(data){
                console.log(data);
                var len = data.length;
                 $("#focal_length_value_view").html(""); 
                 $("#t-shop-value").html(""); 
                for( var j = 0; j<len; j++){
                    var focal_length = data[j]['focal_length'];
                    var focal_length_value = data[j]['focal_length_value'];
                    var id = data[j]['id'];
                     // $("#focalLenthResult").html(""); 
                    var $newdiv1 = $( "<div class='row ml-2'> <div class ='col-md-3'><p class='font-weight-bold'>"+focal_length+" mm</p></div> <div class ='col-md-4'><p>Lens image diameter [Lid]</p></div> <div class ='col-md-3'><p class='font-weight-bold'>"+focal_length_value+"</p></div></div>" );
                    $("#focal_length_value_view" ).append( $newdiv1);

                    var $newdiv2 = $( "<div class='row ml-2'> <div class ='col-md-3'><p class='font-weight-bold'>"+focal_length+" mm</p></div> <div class ='col-md-4'><div class='form-group flex'><label class='width-50'>Max Value <span class='font-weight-bold ml-1'>T</span></label><input type='number' id='t-shop-max"+id+"' class='form-control mx-sm-3 width-50'></div> </div> <div class ='col-md-4'><div class='form-group flex'><label class='width-50'>Min Value <span class='font-weight-bold ml-1'>T</span></label><input type='number' id='t-shop-min"+id+"' class='form-control mx-sm-3 width-50' ></div></div></div>" );
                    $("#t-shop-value").append( $newdiv2);
                         

                } 
            }
        });
    });
});

//T-STOP VALUE
$('document').ready(function(){
    $('#addTshopValue').click(function(){
       var count = $('#t-shop-value .row').length

       tshopObjectList = [];
       if(count > 0){
         for( var j = 0; j<count; j++){
            tshopId = EditFocalLengthData[j]['id'];
            var tshop_max = $('#t-shop-max'+ tshopId).val(); 
            var tshop_min = $('#t-shop-min'+ tshopId).val(); 
            tshopObject = {
                'id':tshopId,
                'focal_length_tshop_max':tshop_max,
                'focal_length_tshop_min':tshop_min
            }
            if(tshop_max === ''){
                alert('Input can not be left blank');
                return ;
           } 
           if(tshop_min === ''){
                alert('Input can not be left blank');
                return ;
           }
            tshopObjectList.push(tshopObject)
         }
       }
        $.ajax({
           type : "POST",
            data:"focal_length_tshop="+JSON.stringify(tshopObjectList),
           url:"/focal-length-tshop-value/" + serie_id,
            success:function(data){
                console.log(data);
                var len = data.length;
                document.getElementById('selectShowManuFive').style.display = "block";
                document.getElementById("add_hideSix").style.display = "none";
                document.getElementById("show_hideSix").style.display = "block"; 
                document.getElementById("selectShowManuSix").style.display = "block";
                $("#focal_length_value_view").html(""); 
                for( var j = 0; j<len; j++){
                    var focal_length = data[j]['focal_length'];
                    var focal_length_value = data[j]['focal_length_value'];
                    var focal_length_tshop_max = data[j]['focal_length_tshop_max'];
                    var focal_length_tshop_min = data[j]['focal_length_tshop_min'];
                    var id = data[j]['id'];
                     //$("#focalLenthResult").html(""); 
                    var $newdiv1 = $( "<div class='row ml-2'> <div class ='col-md-3'><p class='font-weight-bold'>"+focal_length+" mm</p></div> <div class ='col-md-4'><p>Lens image diameter [Lid]</p></div> <div class ='col-md-3'><p class='font-weight-bold'>"+focal_length_value+"</p></div></div>" );
                    $("#focal_length_value_view" ).append( $newdiv1);

                      var $newdiv2 = $( "<div class='row ml-2'> <div class ='col-md-3'><p class='font-weight-bold'>"+focal_length+" mm</p></div> <div class ='col-md-4'><div class='form-group flex'><label class='width-50'>Max Value <span class='font-weight-bold ml-1'>T</span></label><p class='width-50 font-weight-bold'> "+focal_length_tshop_max+"</p></div> </div> <div class ='col-md-4'><div class='form-group flex'><label class='width-50'>Min Value <span class='font-weight-bold ml-1'>T</span></label><p class='width-50 font-weight-bold'>"+focal_length_tshop_min+"</p></div></div></div>" );
                    $("#focal_tshop_view").append( $newdiv2); 

                    var $editTshopData = $("<div class = 'row'> <div class='col-md-6'><div class='form-group'><label for='recipient-name' class='col-form-label'></label><input type='text'class='form-control' value='"+focal_length_tshop_max+"' name='editfocallengthvalue' id='edit_tshopmax"+id+"'></div></div><div class='col-md-6' ><div class='form-group'><label for='recipient-name' class='col-form-label'></label><input type='text'class='form-control' value='"+focal_length_tshop_min+"' name='editfocallengthvalue' id='edit_tshopmin"+id+"'></div></div></div>");  
                  $("#editTshopValueData" ).append( $editTshopData);     
                } 
            }
        });
    });
});


//EDIT T-STOP VALUE
$('document').ready(function(){
    $('#saveEditTshotValue').click(function(){

       var count = $('#editTshopValueData .row').length;
 
       tshopEditObjectList = [];
       if(count > 0){
         for( var j = 0; j<count; j++){
            tshopId = EditFocalLengthData[j]['id'];
            var edit_tshop_max = $('#edit_tshopmax'+ tshopId).val(); 
            var edit_tshop_min = $('#edit_tshopmin'+ tshopId).val(); 
            tshopEditObject = {
                'id':tshopId,
                'focal_length_tshop_max':edit_tshop_max,
                'focal_length_tshop_min':edit_tshop_min
            }
            tshopEditObjectList.push(tshopEditObject)
         }
       }
        $.ajax({
           type : "PUT",
            data:"focal_length_edit_tshop="+JSON.stringify(tshopEditObjectList),
           url:"/focal-length-tshop-value/" + serie_id,
            success:function(data){
                console.log(data);
                var len = data.length;
                $("#focal_tshop_view").html(""); 
              
                for( var j = 0; j<len; j++){
                    var focal_length = data[j]['focal_length'];
                    var focal_length_value = data[j]['focal_length_value'];
                    var focal_length_tshop_max = data[j]['focal_length_tshop_max'];
                    var focal_length_tshop_min = data[j]['focal_length_tshop_min'];
                    var id = data[j]['id'];
                      var $newdiv2 = $( "<div class='row ml-2'> <div class ='col-md-3'><p class='font-weight-bold'>"+focal_length_value+" mm</p></div> <div class ='col-md-4'><div class='form-group flex'><label class='width-50'>Max Value <span class='font-weight-bold ml-1'>T</span></label><p class='width-50 font-weight-bold'> "+focal_length_tshop_max+"</p></div> </div> <div class ='col-md-4'><div class='form-group flex'><label class='width-50'>Min Value <span class='font-weight-bold ml-1'>T</span></label><p class='width-50 font-weight-bold'>"+focal_length_tshop_min+"</p></div></div></div>" );
                    $("#focal_tshop_view").append( $newdiv2); 
 
                } 
            }
        });
    });
});


//REVIEW

$('document').ready(function(){
    $('#reviewButton').click(function(){
        $.ajax({
           type : "get",
           url:"/lens-review/" + serie_id,
            success:function(data){
                console.log(data);
                var len = data.length;
                  $("#reviewDisplay").html(""); 
                  $("#lennManufactureReview").html(""); 
                 var lensName = data[0]['name'];
                  document.getElementById('lennManufactureReview').innerHTML = lensName;
                
                 for( var j = 0; j<len; j++){
                    var focal_length_value = data[j]['focal_length_value'];
                    var focal_length = data[j]['focal_length'];
                    var focal_length_tshop_max = data[j]['focal_length_tshop_max'];
                    var focal_length_tshop_min = data[j]['focal_length_tshop_min'];
                    var id = data[j]['id'];
                    var $review = $("<div class='col-md-12'><div class='row'><div class='col'><p><span></span>"+focal_length+"</p></div><div class='col'><p>Lens image diameter [Lid]<span>"+focal_length+"</span></p></div><div class='col'><p>Max Value T<span>T "+focal_length_tshop_max+"</span></p></div><div class='col'><p>Min Value T <span>T "+focal_length_tshop_min+"</span></p></div></div></div>");  
                    $("#reviewDisplay" ).append( $review);
                }  
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

@endsection