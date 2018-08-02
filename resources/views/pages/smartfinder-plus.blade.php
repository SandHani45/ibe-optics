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
      .table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: none;
    font-weight: 400;
}
    </style>
@endsection
@section('content')
   <section class="mt-4 flex ps-fix">
        <button class="tablink border"  id="defaultOpen" onclick="openPage('cemere', this, '#d10a11')">CAMERA</button>
        <button class="tablink border" id="lensButton" onclick="openPage('lens', this, '#d10a11')">LENS</button>

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
                <div class="modal fade form-container" id="cameraModel">
                    <div class="modal-dialog">
                      <div class="modal-content bg-lit">
        
                        <!-- Modal Header -->
                        <div class="modal-header pd-04">
                          <!-- <h4 class="modal-title">Modal Heading</h4> -->
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body bg-f2">
                            <div name="customer-details" class="customer-details form-horizontal width">
                                <fieldset>
                                   <div class="col-md-12">
                                     <div class="row" id="showModelData">
                                       
                                     </div>
                                   </div>
                                    <div class="form-group">
                                        <label for="txtName" class="control-label col-md-4 font-weight-bold">Sensor Mode </label>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="row" id="showModelWidthData">
                                       
                                        </div>
                                    </div>

                                    

                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <div class="col-md-7 ml-5">
                                            <button id="save_change" onClick="window.location.reload()" class="update-button btn btn-red radius-50 add-another">Save Changes</button>
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                                </fieldset>
                            </div>
                        </div>

                      </div>
                    </div>
                </div>
             
                <div class="table-container width">
                    <table  class="customer-table table table-hover datatables" style="width:100%">
                      <thead>
                        <tr class="table-head">
                          <th>Category</th>
                          <th>Manufacturer</th>
                          <th>Name</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody style="border-top: 5px solid #fff;">
                        @foreach ($camera_datas as $camera)
                        <tbody>
                            <tr role="row" class="odd" style=" border-top: 6px solid #fff;">
                                <td>{{$camera->categories['name']}}</td>
                                <td >{{$camera->manufacturers['name']}}</td>
                                <td>{{$camera->name}}</td>
                               
                                <td >
                                    <label class="clr-bg" for="{{$camera->name}}">View Sensor Details</label>
                                    <input type="checkbox" name="{{$camera->name}}" id="{{$camera->name}}" data-toggle="toggle">
                                </td>
                                <td>
                                    <div style="text-align: center" data-id="{{$camera->id}}" class="ajax_edit"><a href="" class="clr" data-toggle="modal" data-target="#cameraModel" title="edit">
                                        Edit</a>
                                    </div>
                                </td>
                            </tr>
                           </tbody> 
                                <tbody class="hide" style="display: none;">
                                     @foreach ($camera->sensors as $sensor)
                                    <tr class="details-row" style="border-bottom:none;">
                                        <td colspan="5" style="padding: 0;">
                                            <div class="details-container">
                                                <table cellpadding="5" cellspacing="0" border="0" class="details-table">
                                                    <tbody class="row">
                                                        <tr class="inside">
                                                            <td class="c-data">{{$sensor->value}}</td>
                                                            <td class="c-data">W {{$sensor->width}} mm </td>
                                                            <td class="c-data">H {{$sensor->height}} mm</td>
                                                            <td class="c-data">PX {{$sensor->res_width}}</td>
                                                            <td class="c-data">PX {{$sensor->res_height}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach 
                            </tbody>
                            @endforeach
                     </tbody>
                    </table>
                </div>
          
        </div>
    </section>
    <section id="lens" class="table-add tabcontent">   
        <div class="container">
            <div class="row">
                <div class="add">
                    <a href="{{URL::asset('add-lens') }}" 
                        class="btn btn-red float-right radius-50 add-another" 
                        ><i class="fas fa-plus"></i> Add 
                    </a>
                </div>
                <div class="modal fade form-container" id="lensModel">
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
                                        <div class="row" id="showLensModelData">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtName" class="control-label col-md-4 font-weight-bold">Focal length & T-stop Values </label>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="row" id="showModelLensValueData">

                                        </div>
                                    </div>
                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <div class="col-md-7 ml-5">
                                            <button id="lenSave" class="update-button btn btn-red radius-50 add-another">Save Changes</button>
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
                    <table id="lens_datatables" class="customer-table table table-hover " style="width:100%">
                      <thead>
                        <tr class="table-head">
                          <th>Manufacturer</th>
                          <th>Series</th>
                          <th></th>
                          <th></th>
                          
                          
                        </tr>
                      </thead>
                     <tbody  style="border-top: 5px solid #fff;">
                         @foreach ($lensdatas as $lensData)
                        <tbody>
                            <tr role="row" class="odd" style=" border-top: 6px solid #fff;">
                                @foreach ($lensData->lensManufactures as $lensManufacture)
                                    <td >{{$lensManufacture->name}}</td>
                                @endforeach
                                <td>{{$lensData->name}}</td>
                                 <td >
                                    <label for="{{$lensData->name}}" class="clr-bg">View Focal length & T-stop Values Details</label>
                                    <input type="checkbox" name="{{$lensData->name}}" id="{{$lensData->name}}" data-toggle="toggle">
                                </td>
                                <td>
                                    <div style="text-align: center" data-id="{{$lensData->id}}" class="lensEditButton"><a href="" class="clr" data-toggle="modal" data-target="#lensModel" title="edit">
                                        Edit</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                         <tbody class="hide" style="display: none;">
                             @foreach ($lensData->focalLengths as $focalLength)

                                <tr class="details-row" style="border-bottom:none;">
                                    <td colspan="5" style="padding: 0;">
                                        <div class="details-container">
                                            <table cellpadding="5" cellspacing="0" border="0" class="details-table">
                                                <tbody class="row">
                                                    <tr class="inside">
                                                        <td class="c-data-lens" >{{$focalLength->focal_length}} mm</td>
                                                        <td class="c-data-lens" > Adapter Value {{$focalLength->focal_length_value}}  </td>
                                                        <td class="c-data-lens">Max Value T {{$focalLength->focal_length_tshop_max}} </td>
                                                        <td class="c-data-lens" >Min Value T {{$focalLength->focal_length_tshop_min}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            @endforeach
                      </tbody>
                    </table>
                </div>
          
        </div>
    </section>
@endsection

@section('script') 
    <!-- table script -->
<script>
$(document).ready(function() {
    $('[data-toggle="toggle"]').change(function(){
        $(this).parents().next('.hide').toggle();
    });
});
</script>

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



<script>

// Ajax call
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

  var id= 0;
  var sensors = '';
  var cameraEditAllDataArray = [];
  var cameraEditAllData = '';
   $('document').ready(function(){
      $('.ajax_edit').click(function(){
        var edit_id = $(this).data("id");
        $.ajax({
            url: "/smartfinder-plus-edit/"+ edit_id,
            data: {edit_id: edit_id},
            method: "post",
            success: function(data)
            {
              $('#showModelData').html(' ');
              $('#showModelWidthData').html(' ');
              console.log(data[0].name);
              console.log(data);
              cameraEditAllData = data;
              console.log(data[0].manufacturers.name);
              
              var divNew = $(" <div class='col-md-12'><div class='row'><div class='col-md-4'><div class='form-group row'><label for='Categorie' class='col-sm-4 col-form-label font-weight-bold'>Categorie</label><div class='col-sm-8'><input type='name' id='camera_categorie' class='form-control border-td-0 col-md-10' value='"+data[0].categories.name+"' placeholder=''required></div></div></div><div class='col-md-4'><div class='form-group row'><label for='' class='col-sm-4 col-form-label font-weight-bold'>Manufacturer</label><div class='col-sm-8'><input type='name' id='camera_manufacturer' value='"+data[0].manufacturers.name+"' class='form-control border-td-0 col-md-10' placeholder=''required></div></div></div><div class='col-md-4'><div class='form-group row'><label for='' class='col-sm-4 col-form-label font-weight-bold'>Name</label><div class='col-sm-8'><input type='name' id='camera_name' class='form-control border-td-0' value='"+data[0].name+"'  placeholder=''required></div></div></div></div></div>");
                var len = data.length;
                $('#showModelData').append(divNew)

                for( var i = 0; i<len; i++){
                     sensors = data[i].sensors;
                    for(var j = 0; j<sensors.length; j++){
                        var value = sensors[j].value;
                        var width = sensors[j].width;
                        var height = sensors[j].height;
                        var res_width = sensors[j].res_width;
                        var res_height = sensors[j].res_height;
                        var id = sensors[j].id;
                        // cameraEditAllData = sensors[j].id;
                    var divNew2 = $("<div class='row data-len ml-2'><div class='col'><div class='row'><input type='number' id='camera_value"+id+"' class='form-control border-td-0 col-md-8' value='"+value+"'  placeholder='' required></div></div><div class='col'><div class='row'><div class='col-md-2 align-item'> <p class='mb-0'>W</p></div><input type='number' id='camera_width"+id+"' value='"+width+"' class='form-control border-td-0 col-md-6' required><div class='col-md-2 align-item'><p class='mb-0'>mm</p></div></div></div><div class='col'><div class='row'><div class='col-md-2 align-item'> <p class='mb-0'>H</p></div><input type='number' id='camera_height"+id+"' value='"+height+"' class='form-control border-td-0 col-md-6' placeholder='' required><div class='col-md-2 align-item'><p class='mb-0'>mm</p></div></div></div><div class='col'><div class='row'><div class='col-md-2 align-item'> <p class='mb-0'>W</p></div><input type='number' value='"+res_width+"'  id='res_width"+id+"' class='form-control border-td-0 col-md-6' placeholder='' required><div class='col-md-2 align-item' ><p class='mb-0' >px</p></div></div></div><div class='col'><div class='row'><div class='col-md-2 align-item'> <p class='mb-0'>H</p></div><input type='number' value='"+res_height+"'  id='res_height"+id+"' class='form-control border-td-0 col-md-6' placeholder='' required><div class='col-md-2 align-item'><p class='mb-0'>px</p></div></div></div></div>");
                    $('#showModelWidthData').append(divNew2);
                   
                }
               }
            }
        });
    });
});
   
   // edit Camera Data
   $('document').ready(function(){
        $('#save_change').click(function(){
            var camera_categorie = $("#camera_categorie").val();
            var camera_manufacturer = $("#camera_manufacturer").val();
            var camera_name  = $("#camera_name").val();
            var id = cameraEditAllData[0].id;

            var save_count = $('#showModelWidthData .data-len').length;
                cameraEditObjectList = [];
                if(save_count > 0){
                    sensors = sensors;
                    for(var k= 0; k <sensors.length; k++){
                      cameraId = sensors[k].id;
                      var camera_value = $('#camera_value'+ cameraId).val(); 
                      var camera_width = $('#camera_width'+ cameraId).val(); 
                      var camera_height = $('#camera_height'+ cameraId).val(); 
                      var camera_res_width = $('#res_width'+ cameraId).val(); 
                      var camera_res_height = $('#res_height'+ cameraId).val(); 
                      cameraEditObject = {
                          'id':cameraId,
                          'camera_value':camera_value,
                          'camera_width':camera_width,
                          'camera_height':camera_height,
                          'camera_res_width':camera_res_width, 
                          'camera_res_height':camera_res_height, 
                      }
                    cameraEditObjectList.push(cameraEditObject)
                    }
                }

            $.ajax({
               type : "PUT",
               data : "camera_categorie=" + camera_categorie  + "&camera_manufacturer=" + camera_manufacturer + "&camera_name=" + camera_name + "&id=" + id +"&cameraEditObject=" + JSON.stringify(cameraEditObjectList),
               url:"/smartfinder-plus/" + id,
                success:function(data){
                    console.log(data);
                   
               }
            });
        });
    });


{{-- Lens Script --}}
    var id= 0;
    var lensDataId = '';
    var focalData = '';
    $('document').ready(function(){
        $('.lensEditButton').click(function(){
            var lens_edit_id = $(this).data("id");
            $.ajax({
                url: "/smartfinder-plus-lens-edit/"+ lens_edit_id,
                data: {lens_edit_id: lens_edit_id},
                method: "post",
                success: function(data)
                {
                  $('#showLensModelData').html('');
                  $('#showModelLensValueData').html('');
                  console.log(data);
                  lensDataId = data;
                  var divNew = $(" <div class='col-md-12'><div class='row'><div class='col-md-4'><div class='form-group row'><label for='Manufacturer' class='col-sm-4 col-form-label font-weight-bold'>Manufacturer</label><div class='col-sm-8'><input type='name' id='manufactures' class='form-control border-td-0 col-md-10' value='"+data[0].manufactures[0].name+"' placeholder=''required></div></div></div><div class='col-md-4'><div class='form-group row'><label for='' class='col-sm-4 col-form-label font-weight-bold'>Series</label><div class='col-sm-8'><input type='name' id='series' value='"+data[0].name+"' class='form-control border-td-0 col-md-10' placeholder=''required></div></div></div></div></div>");
                  $('#showLensModelData').append(divNew)
                    var len = data.length;
                   for( var i = 0; i<len; i++){
                     focalData = data[i].focal_lengths;
                    for(var j = 0; j<focalData.length; j++){
                        var focal_length = focalData[j].focal_length;
                        var focal_length_id = focalData[j].id;
                        var focal_length_value = focalData[j].focal_length_value;
                        var focal_length_tshop_max = focalData[j].focal_length_tshop_max;
                        var focal_length_tshop_min = focalData[j].focal_length_tshop_min;
                         var lensDivNew2 = $("<div class='row lenDatarow ml-2'><div class='col-md-3'><div class='form-group flex'><input type='number' id='focal_length"+focal_length_id+"'value='"+focal_length+"' class='form-control mx-sm-3 width-50'><label class='width-50'>mm </label></div></div> <div class='col-md-3'><div class='form-group flex'><label class='width-50 font-weight-bold'>[LiD]</label><input type='number' id='focal_length_value"+focal_length_id+"' value='"+focal_length_value+"' class='form-control mx-sm-3 width-50'></div> </div> <div class='col-md-3'><div class='form-group flex'><label class='width-50'>Max Value </label><input type='number' id='focal_length_tshop_max"+focal_length_id+"' class='form-control  mx-sm-3 width-50' value='"+focal_length_tshop_max+"'></div></div><div class='col-md-3'><div class='form-group flex'><label class='width-50'>Min Value </label><input type='number' value='"+focal_length_tshop_min+"' id='focal_length_tshop_min"+focal_length_id+"' class='form-control mx-sm-3 width-50'></div></div></div>");
                     $('#showModelLensValueData').append(lensDivNew2);
                    }

                   }
                }
            });
        }); 
    });

// EDIT LENS DATA
  $('document').ready(function(){
        $('#lenSave').click(function(){
            
            var manufactures = $("#manufactures").val();
            var series = $("#series").val();
            var id = lensDataId[0].id;
            lenEditObjectList = [];
            var editcount = $('#showModelLensValueData .lenDatarow').length;
              if(editcount > 0){
                    focalData = focalData;
                    for(var k = 0; k < focalData.length;k++){
                      focal_id = focalData[k].id;
                      var focal_length = $('#focal_length'+ focal_id).val(); 
                      var focal_length_value = $('#focal_length_value'+ focal_id).val(); 
                      var focal_length_tshop_max = $('#focal_length_tshop_max'+ focal_id).val(); 
                      var focal_length_tshop_min = $('#focal_length_tshop_min'+ focal_id).val(); 
                      lensEditObject = {
                          'id':focal_id,
                          'focal_length':focal_length,
                          'focal_length_value':focal_length_value,
                          'focal_length_tshop_max':focal_length_tshop_max,
                          'focal_length_tshop_min':focal_length_tshop_min 
                      }
                    lenEditObjectList.push(lensEditObject);
                   
                    }
                }
                 
            $.ajax({
               type : "post",
               data : "lenEditObjectList=" + JSON.stringify(lenEditObjectList) + "&manufactures=" + manufactures + "&series=" + series + "&id=" + id,
               url:"/smartfinder-plus-update-lens/" + id,
                success:function(data){
                    console.log(data);
                 
               }
            });
        });
    });
  
</script>
@endsection