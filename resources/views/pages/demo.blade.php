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
                        <tr role="row" class="odd">
                          <td class="sorting_1"></td>
                          <td></td>
                          <td>cdaniels0@java.com</td>
                          <td class=" details-control"></td>
                          <td><div style="text-align: center"><a href="" class="edit_details" data-toggle="modal" data-target="#myModal" data-id="1" title="edit">
                            Edit</a>
                            </div></td>
                          </tr>
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
   
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>

$(document).ready(function() {
  

  
  var data = [
   @foreach ($alldatas as $alldata)
    {
        "id":{{ $alldata->id }},
        "category":"{{ $alldata->categorieName }}",
        "manufacturer":"{{ $alldata->manufacturerName }}",
        "name":"{{ $alldata->cameraName }}",
        "s1_1":{{ $alldata->value }},
        "s1_w":{{ $alldata->width }},
        "s1_h":{{ $alldata->height }},
        "s1_d":{{ $alldata->diameter }},
      
    },
    @endforeach
   
    
  ];
  
  
  function format (data) {
      return '<div class="details-container">'+
          '<table cellpadding="5" cellspacing="0" border="0" class="details-table">'+
              '<tr class="inside">'+
                    '<td class="c-data">'+data.s1_1+'</td>'+
                    '<td class="c-data">'+'W'+ ' ' +data.s1_w+ ' '+ 'mm'+' </td>'+
                    '<td class="c-data">'+'H'+ ' ' +data.s1_h+ ' '+ 'mm'+ '</td>'+
                    '<td class="c-data">'+'D'+ ' '+data.s1_d+'</td>'+
              '</tr>'+
             
              
          '</table>'+
        '</div>';
  };
  
  var table = $('.datatables').DataTable({
    // Column definitions
    columns : [
    
      {data : 'category'},
      {data : 'manufacturer'},
      {data : 'name'},
      {
        className      : 'details-control',
        defaultContent : 'View Sensor Details',
        data           : null,
        orderable      : false
      },
      {
        data: null,
        render: function (data, type, row, meta) {
          return `<div style="text-align: center" data-id="${data.id}" class="ajax_edit"><a href="" class="edit_details"  data-toggle="modal" data-target="#myModal" title="edit" >
          Edit</a>
          </div>`;
          // return `<div style="text-align: center"><a href="" class="edit_details"  data-toggle="modal" data-target="#myModal" data-id="${data.id}" title="edit" >
          // <img src="http://i.imgur.com/DHma3ln.png" alt="Edit" width=20px></a>
          // <a href="" class="delete_details" data-id="${data.id}" title="delete" style="padding-left: 20px;">
          // <img src="http://i.imgur.com/HNUCXDU.png" alt="Delete" width=20px></a></div>`;
        }
                } 
    ],
    
    data : data,
    
    pagingType : 'full_numbers',
    
  });
 
  $('.datatables tbody').on('click', 'td.details-control', function () {
     var tr  = $(this).closest('tr'),
         row = table.row(tr);
    
     if (row.child.isShown()) {
       tr.next('tr').removeClass('details-row');
       row.child.hide();
       tr.removeClass('shown');
     }
     else {
       row.child(format(row.data())).show();
       tr.next('tr').addClass('details-row');
       tr.addClass('shown');
     }
  });

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

  function format (data) {
    return '<div class="details-container">'+
        '<table cellpadding="5" cellspacing="0" border="0" class="details-table">'+
            '<tr class="inside">'+
                  '<td class="c-data">'+data.s1_1+'</td>'+
                  '<td class="c-data">'+'W'+ ' ' +data.s1_w+ ' '+ 'mm'+' </td>'+
                  '<td class="c-data">'+'H'+ ' ' +data.s1_h+ ' '+ 'mm'+ '</td>'+
                  '<td class="c-data">'+'D'+ ' '+data.s1_d+'</td>'+
            '</tr>'+
          
            
        '</table>'+
      '</div>';
};

var table = $('.datatables_lens').DataTable({
  // Column definitions
  columns : [
    {data : 'category'},
    {data : 'manufacturer'},
    {data : 'name'},
    {
      className      : 'details-control',
      defaultContent : 'View Sensor Details',
      data           : null,
      orderable      : false
    },
    {
      data: null,
      render: function (data, type, row, meta) {
        return `<div style="text-align: center"><a class="edit_details"  data-toggle="modal" data-target="#myModal" data-id="${data.id}" title="edit" >
        Edit</a>
        </div>`;
        // return `<div style="text-align: center"><a href="" class="edit_details"  data-toggle="modal" data-target="#myModal" data-id="${data.id}" title="edit" >
        // <img src="http://i.imgur.com/DHma3ln.png" alt="Edit" width=20px></a>
        // <a href="" class="delete_details" data-id="${data.id}" title="delete" style="padding-left: 20px;">
        // <img src="http://i.imgur.com/HNUCXDU.png" alt="Delete" width=20px></a></div>`;
      }
              } 
  ],
  
  data : data,
  
  pagingType : 'full_numbers',
  
});

$('.datatables_lens tbody').on('click', 'td.details-control', function () {
   var tr  = $(this).closest('tr'),
       row = table.row(tr);
  
   if (row.child.isShown()) {
     tr.next('tr').removeClass('details-row');
     row.child.hide();
     tr.removeClass('shown');
   }
   else {
     row.child(format(row.data())).show();
     tr.next('tr').addClass('details-row');
     tr.addClass('shown');
   }
});

});
</script>


{{--     <script  src="{{asset('js/index.js')}}"></script> --}}
@endsection