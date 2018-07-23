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

/*.table>tbody>tr.active>td,
.table>tbody>tr.active>th,
.table>tbody>tr>td.active,
.table>tbody>tr>th.active,
.table>tfoot>tr.active>td,
.table>tfoot>tr.active>th,
.table>tfoot>tr>td.active,
.table>tfoot>tr>th.active,
.table>thead>tr.active>td,
.table>thead>tr.active>th,
.table>thead>tr>td.active,
.table>thead>tr>th.active {
  background-color: #fff;
}

.table-bordered > tbody > tr > td,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > td,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > thead > tr > th {
  border-color: #e4e5e7;
}
*/
.table tr.header {
  /*font-weight: bold;
  background-color: #fff;
  cursor: pointer;*/
  -webkit-user-select: none;
  /* Chrome all / Safari all */
  -moz-user-select: none;
  /* Firefox all */
  -ms-user-select: none;
  /* IE 10+ */
  user-select: none;
  /* Likely future */

}

.table tr:not(.header) {
  display: none;
 
}

.table .header td:after {

  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  float: right;
  color: #999;
  text-align: center;
  padding: 3px;
  transition: transform .25s linear;
  -webkit-transition: -webkit-transform .2s linear;
}

/*.table .header.active td:after {
  content: "\2212";
}*/
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
                                                         <input type="name" id="camera_categorie" class="form-control border-td-0 col-md-10" placeholder="" required="">
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
                                                        <input type="name" id="camera_manufacturer" class="form-control border-td-0 col-md-10" placeholder="" required="">
                                                        <!-- <input type="text" id="txtName" name="name" class="form-control"> -->
                                                        <div class="error-msg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                 <div class="form-group row">
                                                    <label for="Categorie" class="col-sm-4 col-form-label font-weight-bold">Name</label>
                                                    <div class="col-sm-8">
                                                         <input type="name" id="camera_name" class="form-control border-td-0 col-md-10" placeholder="" required="">
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
                                                <input type="number" id="camera_value" class="form-control border-td-0 col-md-8" id="" placeholder="" required>
                                            </div>
                                                
                                           </div>
                                           <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2"> <p class="">W</p></div>
                                                        <input type="number" id="camera_width" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                           <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-2"> <p class="">H</p></div>
                                                        <input type="number" id="camera_height" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                           <div class="col-md-3">
                                               <div class="row">
                                                    <div class="col-md-2"> <p class="">D</p></div>
                                                        <input type="number"  id="camera_diameter" class="form-control border-td-0 col-md-6" id="" placeholder="" required>
                                                    <div class="col-md-2"><p class="">mm</p></div> 
                                                </div>  
                                           </div>
                                        </div>
                                    </div>

                                    

                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <div class="col-md-7 ml-5">
                                            <button id="save_change" class="update-button btn btn-red radius-50 add-another">Save Changes</button>
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
             
                <div class="container">      
                  <table class=" table table-hover ">
                    <thead class="table-head">
                      <tr  style="    display: contents;">
                      
                          <th>Category</th>
                          <th>Manufacturer</th>
                          <th>Name</th>
                          <th colspan="2"></th>
                          <th ></th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($alldatas as $alldata)
                        <tr class="header">
                          <td >{{ $alldata->categorieName }}</td>
                          <td>{{ $alldata->manufacturerName }}</td>
                          <td>{{ $alldata->cameraName }}</td>
                          <td colspan="2">
                           View Sensor Details
                          </td>
                          <td>
                            <input type="hidden" value="{{ $alldata->id }}" class="getId">
                            <div style="text-align: center"><a href="" id="ajax_edit" class="edit_details" data-toggle="modal" data-target="#myModal" data-id="{{ $alldata->id }}" title="edit">
                            Edit</a>
                            </div>
                          </td>
                             <tr id="wrapper" class="open">
                                <div id="list">
                                  <td> {{ $alldata->value}} </td>
                                  <td>WW {{ $alldata->width}} mm</td>
                                  <td>H {{ $alldata->height}} mm</td>
                                  <td>{{ $alldata->diameter}}</td>
                                  <td></td>
                              </div>
                            </tr>
                          
                        </tr>
                         
                          
                          @endforeach
                    </tbody>
                  </table>
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
             
                
                    <table   class=" table table-hover " style="width:100%">
                      <thead>
                        <tr class="table-head">
                          <th>Manufacturer</th>
                          <th>Series</th>
                          <th>dfsd</th>
                          <th>df</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <tb>fdh</tb>
                            <tb>fdh</tb>
                            <tb>fdh</tb>
                            <tb>fdh</tb>
                        </tr>
                      </tbody>
                    </table>
                
          
        </div>
    </section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
  //Fixing jQuery Click Events for the iPad
  var ua = navigator.userAgent,
    event = (ua.match(/iPad/i)) ? "touchstart" : "click";
  if ($('.table').length > 0) {
    $('.table .header').on(event, function() {
      $(this).toggleClass("active", "").nextUntil('.header').css('display', function(i, v) {
        return this.style.display === 'table-row' ? 'none' : 'table-row';
      });
    });
  }
})

    $(function() {
  var b = $(".header");
  var w = $("#wrapper");
  var l = $("#list");
  
  w.height(l.outerHeight(true));

  b.click(function() {
  
    if(w.hasClass('open')) {
      w.removeClass('open');
      w.height(0);
    } else {
      w.addClass('open');
      w.height(l.outerHeight(true));
    }
  
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
   $('document').ready(function(){
      $('.ajax_edit').click(function(){
        var edit_id = $(this).data("id");
        $.ajax({
            url: "/smartfinder-plus-edit/"+ edit_id,
            data: {edit_id: edit_id},
            method: "post",
            success: function(data)
            {
              console.log(data);
                id =  data[0].id;
               document.getElementById('camera_width').value=data[0].width;
               document.getElementById('camera_value').value=data[0].value;
               document.getElementById('camera_height').value=data[0].height;
               document.getElementById('camera_diameter').value=data[0].diameter;
               document.getElementById('camera_name').value=data[0].cameraName;
               document.getElementById('camera_categorie').value=data[0].categorieName;
               document.getElementById('camera_manufacturer').value=data[0].manufacturerName;
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
            
            $.ajax({
               type : "PUT",
               data : "width=" + width + "&_token= "+ token + "&categorie_id=" + categorie_id + "&manufacturerId=" + manufacturerId + "&camera_id=" + camera_id +"&sensor_id=" + sensor_id + "&height=" + height + "&diameter=" + diameter,
               url:"/smartfinder-plus/" + sensor_id,
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

  </script>


{{--     <script  src="{{asset('js/index.js')}}"></script> --}}
@endsection