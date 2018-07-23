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
                                            <button id="save_change" class="update-button btn btn-red radius-50 add-another">Save Changes</button>
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
                      <tbody>
                          @foreach ($camera_datas as $camera)

                            <tr role="row" class="odd">
 
                                <td>{{$camera->categories['name']}}</td>
                                <td>{{$camera->name}}</td>
                               
                                    <td >{{$camera->manufacturers['name']}}</td>
                                
                                
                                <td class="details-control" onclick="myFunction()">View Sensor Details</td>
                                <td>
                                    <div style="text-align: center" data-id="{{$camera->id}}" class="ajax_edit"><a href=""  data-toggle="modal" data-target="#cameraModel" title="edit">
                                        Edit</a>
                                    </div>
                                </td>
                            </tr>
                             @foreach ($camera->sensors as $sensor)
                                <tr class="details-row"  id="myDIV">
                                    <td colspan="5">
                                        <div class="details-container">
                                            <table cellpadding="5" cellspacing="0" border="0" class="details-table">
                                                <tbody class="row">
                                                    <tr class="inside">
                                                        <td class="c-data">{{$sensor->id}}</td>
                                                        <td class="c-data">W {{$sensor->id}} mm </td>
                                                        <td class="c-data">H {{$sensor->id}} mm</td>
                                                        <td class="c-data">D {{$sensor->id}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach 
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
                                        <label for="txtName" class="control-label col-md-4 font-weight-bold">Sensor Mode </label>
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
                          <th></th>
                          
                        </tr>
                      </thead>
                      <tbody>
                         @foreach ($lensdatas as $lensData)

                            <tr role="row" class="odd">
                                @foreach ($lensData->manufactures as $manufacture)
                                    <td >{{$manufacture->name}}</td>
                                @endforeach
                                <td>{{$lensData->name}}</td>
                                <td class="details-control" onclick="myFunction()">View Sensor Details</td>
                                <td>
                                    <div style="text-align: center" data-id="{{$lensData->id}}" class="lensEditButton"><a href=""  data-toggle="modal" data-target="#lensModel" title="edit">
                                        Edit</a>
                                    </div>
                                </td>
                            </tr>
                             @foreach ($lensData->focalLengths as $focalLength)
                                <tr class="details-row"  id="myDIV">
                                    <td colspan="5">
                                        <div class="details-container">
                                            <table cellpadding="5" cellspacing="0" border="0" class="details-table">
                                                <tbody class="row">
                                                    <tr class="inside">
                                                        <td class="c-data">{{$focalLength->focal_length}} mm</td>
                                                        <td class="c-data">Lens image diameter [Lid] {{$focalLength->focal_length_value}}  </td>
                                                        <td class="c-data">Max Value T {{$focalLength->focal_length_tshop_max}} </td>
                                                        <td class="c-data">Min Value T {{$focalLength->focal_length_tshop_min}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @endforeach
                      </tbody>
                    </table>
                </div>
          
        </div>
    </section>
@endsection

@section('script')
<script>

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

    <!-- table script -->
   <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "";
            } else {
                x.style.display = "none";
            }
        }
   </script>
{{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 --}}
<script>

// Ajax call
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

  var id= 0;
  var cameraEditAllDataArray = [];
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
              console.log(data[0].manufacturers.name);
              
              var divNew = $(" <div class='col-md-12'><div class='row'><div class='col-md-4'><div class='form-group row'><label for='Categorie' class='col-sm-4 col-form-label font-weight-bold'>Categorie</label><div class='col-sm-8'><input type='name' id='camera_categorie' class='form-control border-td-0 col-md-10' value='"+data[0].categories.name+"' placeholder=''required></div></div></div><div class='col-md-4'><div class='form-group row'><label for='' class='col-sm-4 col-form-label font-weight-bold'>Manufacturer</label><div class='col-sm-8'><input type='name' id='camera_manufacturer' value='"+data[0].manufacturers.name+"' class='form-control border-td-0 col-md-10' placeholder=''required></div></div></div><div class='col-md-4'><div class='form-group row'><label for='' class='col-sm-4 col-form-label font-weight-bold'>Name</label><div class='col-sm-8'><input type='name' id='camera_name' class='form-control border-td-0' value='"+data[0].name+"'  placeholder=''required></div></div></div></div></div>");
                var len = data.length;
                $('#showModelData').append(divNew)

                for( var i = 0; i<len; i++){
                    var sensors = data[i].sensors;
                    for(var j = 0; j<sensors.length; j++){
                        var value = sensors[j].value;
                        var width = sensors[j].width;
                        var height = sensors[j].height;
                        var diameter = sensors[j].diameter;
                        var id = sensors[j].id;
                        cameraEditAllData = sensors[j].id;
                        console.log(diameter)
                    var divNew2 = $("<div class='row ml-2'><div class='col-md-3'><div class='row'><input type='number' id='camera_value"+id+"' class='form-control border-td-0 col-md-8' value='"+value+"'  placeholder='' required></div></div><div class='col-md-3'><div class='row'><div class='col-md-2'> <p class=''>W</p></div><input type='number' id='camera_width"+id+"' value='"+width+"' class='form-control border-td-0 col-md-6' required><div class='col-md-2'><p class=''>mm</p></div></div></div><div class='col-md-3'><div class='row'><div class='col-md-2'> <p >H</p></div><input type='number' id='camera_height"+id+"' value='"+height+"' class='form-control border-td-0 col-md-6' placeholder='' required><div class='col-md-2'><p>mm</p></div></div></div><div class='col-md-3'><div class='row'><div class='col-md-2'> <p>D</p></div><input type='number' value='"+diameter+"'  id='camera_diameter"+id+"' class='form-control border-td-0 col-md-6' placeholder='' required><div ><p >mm</p></div></div></div></div>");
                    $('#showModelWidthData').append(divNew2);
                    cameraEditAllDataArray.push(cameraEditAllData);
                }
               }
            }
        });
    });
});
   
   $('document').ready(function(){
        $('#save_change').click(function(){
            var camera_categorie = $("#camera_categorie").val();
            var camera_manufacturer = $("#camera_manufacturer").val();
            var camera_name  = $("#camera_name").val();
            var id = id;
           console.log(cameraEditAllDataArray);
            var count = $('#showModelWidthData .row').length;
    
                   cameraEditObjectList = [];
                   if(count > 0){
                     for( var j = 0; j<count; j++){
                        
                        cameraId = cameraEditAllData[j]['id'];
                        var camera_value = $('#camera_value'+ cameraId).val(); 
                        var edit_tshop_min = $('#edit_tshopmin'+ cameraId).val(); 
                        cameraEditObject = {
                            'id':tshopId,
                            'focal_length_tshop_max':edit_tshop_max,
                            'focal_length_tshop_min':edit_tshop_min
                        }
                        cameraEditObjectList.push(tshopEditObject)
                     }
            }

            $.ajax({
               type : "PUT",
               data : "camera_categorie=" + camera_categorie + "&_token= "+ token + "&camera_manufacturer=" + camera_manufacturer + "&camera_name=" + camera_name + "&camera_id=" + camera_id +"&sensor_id=" + sensor_id + "&height=" + height + "&diameter=" + diameter,
               url:"/smartfinder-plus/" + sensor_id,
                success:function(data){
                    console.log(data);
                    sensorId = data.id;
                    var categorie_id = data.categorie_id
               }
            });
        });
    });


</script>



{{-- Lens Script --}}
<script>
  
$(document).ready(function() {
    // Ajax call
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var id= 0;
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
                  var divNew = $(" <div class='col-md-12'><div class='row'><div class='col-md-4'><div class='form-group row'><label for='Manufacturer' class='col-sm-4 col-form-label font-weight-bold'>Manufacturer</label><div class='col-sm-8'><input type='name' id='camera_categorie' class='form-control border-td-0 col-md-10' value='"+data[0].manufactures[0].name+"' placeholder=''required></div></div></div><div class='col-md-4'><div class='form-group row'><label for='' class='col-sm-4 col-form-label font-weight-bold'>Series</label><div class='col-sm-8'><input type='name' id='series' value='"+data[0].name+"' class='form-control border-td-0 col-md-10' placeholder=''required></div></div></div></div></div>");
                  $('#showLensModelData').append(divNew)
                    var len = data.length;
                   for( var i = 0; i<len; i++){
                    var focalData = data[i].focal_lengths;
                    for(var j = 0; j<focalData.length; j++){
                        var focal_length = focalData[j].focal_length;
                        var focal_length_value = focalData[j].focal_length_value;
                        var focal_length_tshop_max = focalData[j].focal_length_tshop_max;
                        var focal_length_tshop_min = focalData[j].focal_length_tshop_min;
                         var lensDivNew2 = $("<div class='row ml-2'><div class='col-md-3'><div class='form-group flex'><input type='number' id='t-shop-min9'value='"+focal_length+"' class='form-control mx-sm-3 width-50'><label class='width-50'>mm </label></div></div> <div class='col-md-3'><div class='form-group flex'><label class='width-50 font-weight-bold'>[LiD]</label><input type='number' id='t-shop-max9' value='"+focal_length_value+"' class='form-control mx-sm-3 width-50'></div> </div> <div class='col-md-3'><div class='form-group flex'><label class='width-50'>Max Value </label><input type='number' id='t-shop-min9' class='form-control  mx-sm-3 width-50' value='"+focal_length_tshop_max+"'></div></div><div class='col-md-3'><div class='form-group flex'><label class='width-50'>Min Value </label><input type='number' value='"+focal_length_tshop_min+"' id='t-shop-min9' class='form-control mx-sm-3 width-50'></div></div></div>");
                     $('#showModelLensValueData').append(lensDivNew2);
                    }

                   }
                }
            });
        });
    });


  $('document').ready(function(){
        $('#lenSave').click(function(){
            var camera_categorie = $("#camera_categorie").val();
            var camera_manufacturer = $("#camera_manufacturer").val();
            var camera_name  = $("#camera_name").val();
            var id = id;
           console.log(cameraEditAllDataArray);
            var count = $('#showModelWidthData .row').length;
    
                   cameraEditObjectList = [];
                   if(count > 0){
                     for( var j = 0; j<count; j++){
                        
                        cameraId = cameraEditAllData[j]['id'];
                        var camera_value = $('#camera_value'+ cameraId).val(); 
                        var edit_tshop_min = $('#edit_tshopmin'+ cameraId).val(); 
                        cameraEditObject = {
                            'id':tshopId,
                            'focal_length_tshop_max':edit_tshop_max,
                            'focal_length_tshop_min':edit_tshop_min
                        }
                        cameraEditObjectList.push(tshopEditObject)
                     }
            }

            $.ajax({
               type : "PUT",
               data : "camera_categorie=" + camera_categorie + "&_token= "+ token + "&camera_manufacturer=" + camera_manufacturer + "&camera_name=" + camera_name + "&camera_id=" + camera_id +"&sensor_id=" + sensor_id + "&height=" + height + "&diameter=" + diameter,
               url:"/smartfinder-plus/" + sensor_id,
                success:function(data){
                    console.log(data);
                    sensorId = data.id;
                    var categorie_id = data.categorie_id
               }
            });
        });
    });
  
});
</script>
@endsection