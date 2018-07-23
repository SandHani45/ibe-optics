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
             <a href="{{URL::asset('smartfinder-plus')}}" class="btn btn-f btn-red radius-50 white">Back</a>
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
                                            <select class="form-control border-td-0 dyn-input" onchange="showDiv4(this)" id="s_value[1]" name="s_value">
                                                <option value="">Choose Categorie</option>
                                               
                                               
                                                
                                            </select>
                                        </td>
                                        <td>
                                              <label class="or"> OR </label>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control border-td-0 dyn-input" id="s_v_type[1]" name="s_v_type" placeholder="Type new sensor">
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
                                    <button type="button" id="sendSensor" class="btn btn-f btn-red font-40 radius-50"  >Save</button>
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
                                <p class="title-edit col-md-3"><a  class="float-right edit-color"  class="float-right edit-color " data-toggle="modal" id="editSensor" data-target="#sensorModal" data-whatever="@mdo" href="">Edit</a></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding">
                        <div class="col-md-8" id="sersorMode">

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
                              <div class="modal-body" id="editDataShow">
                                
                                  
                               
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
                <div class="add_hide" id="add_hideFive">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="bg-top ">
                                <p class="heade-title ml-3"> WIDTH, HEIGHT & DIAMETER</p>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding " >
                        <div class="col-md-8" id="widthDisply">
                           
                        </div>
                        <div class="col-md-3 ml-3 add_block">
                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button"  class="btn btn-f btn-red font-40 radius-50" id="sendWidth"  >Save</button>
                                </div>
                            </div>     
                        </div> 
                    </div>
                </div>
                <div class="add_show" id="show_hideFive">
                    <div class="row bg-top">
                        <div class="col-md-12">
                            <div class="row bg-top">
                                <p class="heade-title ml-3 col-md-8"> WIDTH, HEIGHT & DIAMETER</p>
                                <p class="title-edit col-md-3"><a  class="float-right edit-color" data-toggle="modal" data-target="#editWidth" data-whatever="@mdo" href="">Edit</a></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row bg-f2 padding">
                        <div class="col-md-8" id="widthFinalResult">
            
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
                              <div class="modal-body" id="widthEditFinalDisply">
                                
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
            <div class="tab" id="selectShowManuReview">    
                <div class="row bg-top">
                </div>
                <div class="row bg-f2 padding ">             
                    <div class="col-md-6 ml-5 add_block">
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="reviewData" 
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
                                                            <p id="reviewValue">2.11</p>
                                                        </div>
                                                        <div class="col">
                                                            <p id="reviewWidht"> W 54.12 mm</p>   
                                                        </div>
                                                        <div class="col">
                                                            <p id="reviewHeight">H 25.58 mm</p>
                                                        </div>
                                                        <div class="col">
                                                            <p id="reviewDiameter">D 59.86</p>
                                                        </div>
                                                    </div>   
                                                </div>

                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer" style=" justify-content: center;">
                                        <button type="button" class="btn btn-red float-right radius-50 add-another "  data-dismiss="modal">Edit</button>
                                        <button type="submit"  class="btn btn-red float-right radius-50 add-another"  onClick="window.location.reload()" >SUBMIT</button>
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
            // document.getElementById("add_hideFive").style.display = "none";
            // document.getElementById("show_hideFive").style.display = "block";

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
                    $("#manufacturer").append("<option value='"+id+"'>"+manufactures[0].name+"</option>");
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
                manufacturerId = data[0].id;
                // console.log(data[0].manufacturers.name);
                var len = data.length;
                document.getElementById('manufacturerResult').innerHTML=data[0].name;

                document.getElementById("editManufacturer").value = data[0].name;
               //$("#manufacturer").empty();
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var name = data[i]['name'];
                    var cameras = data[i]['cameras'];
                    for (j = 0; j<cameras.length; j++){
                        var name = cameras[j]['name'];
                        var id = cameras[j]['id'];
                        $("#model").append("<option value='"+id+"'>"+name+"</option>");
                    }
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
            if(cameraname == ''){
                alert ('please fill the required fields');
                return;
            }
            document.getElementById('selectShowManuThree').style.display = "block";
            document.getElementById('saveHideThree').style.display = "none";
            document.getElementById("add_hideThree").style.display = "none";
            document.getElementById("show_hideThree").style.display = "block";
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
                cameraId = data[0].id;
                console.log(data[0].name);
                    
                document.getElementById('modelResult').innerHTML=data[0].name;
                //document.getElementById('editCategory').innerHTML=data[0].categories.name;
                document.getElementById("editCamera").value = data[0].name;
                var len = data.length;
               //$("#manufacturer").empty();
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var name = data[i]['name'];
                    var sensors = data[i]['sensors']
                    for( var j = 0; j<sensors.length; j++){
                        var id = sensors[j]['id'];
                        var value = sensors[j]['value'];
                        $("#s_value").append("<option value='"+id+"'>"+value+"</option>");
                    }
                   
                }    
            }
        });
    });
});


//SENSOR MODE
var sensorId = 0;
var sensoreditData = null;
$('document').ready(function(){
    $('#sendSensor').click(function(){
        var categorie_id  = categorieId;
        var camera_id = cameraId;
        value_array = []
        var count = $('#pda-details tr').length;
         if(count > 0){
           for(var i = 1; i <= count; i++ )
           {
            if(i === 1){
                // alert('#focal_length['+i+']')
               //var value = $('#focal_length[1]').val();   
               var value = $('input[name="s_v_type"]' ).val();
               

            }else{
                var value = $('#s_v_type'+ i).val();
                
            }
             if($('#s_v_type'+ i).val() === ''){
                alert('Input can not be left blank');
                return ;
           }
            //var value = $('input[name="focal_length"]' ).val();
            value_array.push(value)
           }
        }
        var length_value = value_array.length ;

        document.getElementById('selectShowManuFour').style.display = "block";
        document.getElementById('saveHideFour').style.display = "none";
        document.getElementById("add_hideFour").style.display = "none";
        document.getElementById("show_hideFour").style.display = "block"; 
        $.ajax({
           type : "POST",
           data : "value=" + value_array + "&categorie_id=" + categorie_id + "&manufacturerId=" + manufacturerId + "&camera_id=" + camera_id,
           url:"/add-sensor",
            success:function(data){
                console.log(data);
                sensoreditData = data;
                categorieId = data.categorie_id;
                manufacturerId = data.manufacturer_id;
                cameraId = data.camera_id;
                sensorId = data.id;
                    var len = data.length;
                   for( var j = 0; j<len; j++){
                    var values = data[j]['value'];
                    var id = data[j]['id'];
                    
                    var $newdiv1 = $( "<div class='row'><div class = 'col-md-6'><p>"+values+"</p></div></div>" );
                    $("#sersorMode" ).append( $newdiv1);

                    var $editData = $("<div class='row datadisplay'><div class='col-md-3'><p>"+values+"</p></div><div class='col-md-3'><div class='row'><div class='col-md-2'></div><input type='number' class='form-control border-td-0 col-md-6' id='width"+id+"' name='width' placeholder='Width' required><div class='col-md-2'><p>mm</p></div></div></div><div class='col-md-3'><div class='row'><div class='col-md-2'></div> <input type='number' class='form-control border-td-0 col-md-6' id='height"+id+"' name='height'placeholder='Height' required><div class='col-md-2'><p >mm</p></div></div></div><div class='col-md-3'><div class='row'><div class='col-md-2'> </div><input type='number' class='form-control border-td-0 col-md-6' id='diameter"+id+"' name='diameter'  placeholder='Diameter' required><div class='col-md-2'></div></div></div></div>");  
                    $("#widthDisply" ).append( $editData);

                    var $editDataDisplay  = $("<div class='form-group'><label for='recipient-name' class='col-form-label'>Sensor Name :</label><input type='text' class='form-control' name='' value='"+values+"' id='editSensor"+id+"'></div>");          
                    $("#editDataShow" ).append( $editDataDisplay);
                }  
           }
        });
    });
});
// Edit Sensor
var widthshowData = null;
$('document').ready(function(){
    $('#editSetpFour').click(function(){
        var categorie_id  = categorieId;
        var camera_id = sensoreditData[0].camera_id;
        valueObjectList = [];
        var count = $('#editDataShow .form-group').length;
         if(count > 0){
         for( var j = 0; j<count; j++){
            valueId = sensoreditData[j]['id'];
            var value_edit = $('#editSensor'+ valueId).val(); 
            valueObject = {
                'id':valueId,
                'value':value_edit
            }
            valueObjectList.push(valueObject);
         }
       }

        $.ajax({
           type : "POST",
           data : "value=" + JSON.stringify(valueObjectList),
           url:"/edit-sensor/" + camera_id,
            success:function(data){
                console.log(data);
                sensoreditData = data;
                $("#sersorMode").html("");
                $("#widthDisply").html("");
               var len = data.length;
               for( var j = 0; j<len; j++){
                var values = data[j]['value'];
                var id = data[j]['id'];
                var $newdiv1 = $( "<div class='row'><div class = 'col-md-6'><p>"+values+"</p></div></div>" );
                $("#sersorMode" ).append( $newdiv1);

                var $editData = $("<div class='row datadisplay'><div class='col-md-3'><p>"+values+"</p></div><div class='col-md-3'><div class='row'><div class='col-md-2'></div><input type='number' class='form-control border-td-0 col-md-6' id='width"+id+"' name='width' placeholder='Width' required><div class='col-md-2'><p>mm</p></div></div></div><div class='col-md-3'><div class='row'><div class='col-md-2'></div> <input type='number' class='form-control border-td-0 col-md-6' id='height"+id+"' name='height'placeholder='Height' required><div class='col-md-2'><p >mm</p></div></div></div><div class='col-md-3'><div class='row'><div class='col-md-2'> </div><input type='number' class='form-control border-td-0 col-md-6' id='diameter"+id+"' name='diameter'  placeholder='Diameter' required><div class='col-md-2'></div></div></div></div>");  
                $("#widthDisply" ).append( $editData);
            }  
               
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
            var camera_id = sensoreditData[0].camera_id;
            console.log(camera_id)
            widthObjectList = [];
            var widthCount = $('#widthDisply .datadisplay').length;

            if(widthCount > 0){
                for( var j = 0; j<widthCount; j++){
                    var _id = sensoreditData[j]['id'];
                    var widthValue = $('#width'+ _id).val(); 
                    var heightValue = $('#height'+ _id).val(); 
                    var diameterValue = $('#diameter'+ _id).val(); 
                    widthObject = {
                        'id':_id,
                        'width':widthValue,
                        'height':heightValue,
                        'diameter':diameterValue
                    }
                    widthObjectList.push(widthObject);
                }
            }
            document.getElementById("selectShowManuFour").style.display = "block";
            document.getElementById("add_hideFive").style.display = "none";
            document.getElementById("show_hideFive").style.display = "block";
            document.getElementById("selectShowManuReview").style.display = "block";  
            $.ajax({
               type : "PUT",
               data : "widthObjectList=" + JSON.stringify(widthObjectList),
               url:"/add-sensor/" + camera_id,
                success:function(data){
                    console.log(data);
                    var len = data.length;
                    for( var j = 0; j<len; j++){
                        var values = data[j]['value'];
                        var width = data[j]['width'];
                        var height = data[j]['height'];
                        var diameter = data[j]['diameter'];
                        var id = data[j]['id'];
                        
                        var $editFianlData = $("<div class='row datadisplay'><div class='col-md-3'><p>"+values+"</p></div><div class='col-md-3'><div class='row'><div class='col-md-2'></div><input type='number' class='form-control border-td-0 col-md-6' id='editwidth"+id+"' name='width' placeholder='Width' value='"+width+"' required><div class='col-md-2'><p>mm</p></div></div></div><div class='col-md-3'><div class='row'><div class='col-md-2'></div> <input type='number' class='form-control border-td-0 col-md-6' id='editheight"+id+"' name='height'placeholder='Height' value='"+height+"' required><div class='col-md-2'><p >mm</p></div></div></div><div class='col-md-3'><div class='row'><div class='col-md-2'> </div><input type='number' class='form-control border-td-0 col-md-6' value='"+diameter+"' id='editdiameter"+id+"' name='diameter'  placeholder='Diameter' required><div class='col-md-2'></div></div></div></div>");  
                        $("#widthEditFinalDisply" ).append( $editFianlData);

                        var $newdiv1 = $("<div class='row datadisplay'><div class='col-md-3'><p>"+values+"</p></div><div class='col-md-3'><div class='row'><div class='col-md-2'></div><p>"+width+"</p><div class='col-md-2'><p>mm</p></div></div></div><div class='col-md-3'><div class='row'><div class='col-md-2'></div> <p>"+height+"</p><div class='col-md-2'><p >mm</p></div></div></div><div class='col-md-3'><div class='row'><div class='col-md-2'> </div><p>"+diameter+"</p><div class='col-md-2'></div></div></div></div>");  
                        $("#widthFinalResult" ).append( $newdiv1);
                    }
               }
            });
        });
    });


// Edit with and height
$('document').ready(function(){
        $('#editSetpFive').click(function(){
            widthEditObjectList = [];
            var editwidthCount = $('#widthEditFinalDisply .datadisplay').length;
            var camera_id = sensoreditData[0].camera_id;
            if(editwidthCount > 0){
                for( var j = 0; j<editwidthCount; j++){
                    var edit_id = sensoreditData[j]['id'];
                    var widthValue = $('#editwidth'+ edit_id).val(); 
                    var heightValue = $('#editheight'+ edit_id).val(); 
                    var diameterValue = $('#editdiameter'+ edit_id).val(); 
                    widthEditObject = {
                        'id':edit_id,
                        'width':widthValue,
                        'height':heightValue,
                        'diameter':diameterValue
                    }
                    widthEditObjectList.push(widthEditObject);
                }
            }
            $.ajax({
               type : "post",
               data : "editWidthResult=" + JSON.stringify(widthEditObjectList) ,
               url:"/edit-sensor-value/" + camera_id,
                success:function(data){
                console.log(data);
                 $("#widthFinalResult" ).html(" ");
                   var len = data.length;
                    for( var j = 0; j<len; j++){
                        var values = data[j]['value'];
                        var width = data[j]['width'];
                        var height = data[j]['height'];
                        var diameter = data[j]['diameter'];
                        var id = data[j]['id'];
                       
                        var $newdiv1 = $("<div class='row datadisplay'><div class='col-md-3'><p>"+values+"</p></div><div class='col-md-3'><div class='row'><div class='col-md-2'></div><p>"+width+"</p><div class='col-md-2'><p>mm</p></div></div></div><div class='col-md-3'><div class='row'><div class='col-md-2'></div> <p>"+height+"</p><div class='col-md-2'><p >mm</p></div></div></div><div class='col-md-3'><div class='row'><div class='col-md-2'> </div><p>"+diameter+"</p><div class='col-md-2'></div></div></div></div>");  
                        $("#widthFinalResult" ).append( $newdiv1);
                    }

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
  
        
        // step-5
        $(document).ready(function(){
 
             $("#editwidth,#editheight,#editdiameter").change(function(){
 
                var sensorValueResult = 'W' + editwidth+ 'mm' + '   ' +'H'+ editheight+ 'mm' + ' '+'D'+ editdiameter;
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