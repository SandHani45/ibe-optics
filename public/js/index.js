
$(document).ready(function() {
  
  var data = [
    {
        "id":1,
        "category":"Charles",
        "manufacturer":"Daniels",
        "name":"cdaniels0@java.com",
        "s1_1":2.1,
        "s1_w":3.1,
        "s1_h":4.5,
        "s1_d":6.5,
        "s2_1":2.1,
        "s2_w":3.1,
        "s2_h":4.5,
        "s2_d":6.5,
    },
    {
        "id":2,
        "category":"Charles",
        "manufacturer":"Daniels",
        "name":"cdaniels0@java.com",
        "s1_1":2.1,
        "s1_w":3.1,
        "s1_h":4.5,
        "s1_d":6.5,
        "s2_1":2.1,
        "s2_w":3.1,
        "s2_h":4.5,
        "s2_d":6.5,
    },
    {   
        "id":3,
        "category":"Charles",
        "manufacturer":"Daniels",
        "name":"cdaniels0@java.com",
        "s1_1":2.1,
        "s1_w":3.1,
        "s1_h":4.5,
        "s1_d":6.5,
        "s2_1":2.1,
        "s2_w":3.1,
        "s2_h":4.5,
        "s2_d":6.5,
    },
    {
        "id":4,
        "category":"Charles",
        "manufacturer":"Daniels",
        "name":"cdaniels0@java.com",
        "s1_1":2.1,
        "s1_w":3.1,
        "s1_h":4.5,
        "s1_d":6.5,
        "s2_1":2.1,
        "s2_w":3.1,
        "s2_h":4.5,
        "s2_d":6.5,

    },
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
              '<tr class="inside">'+
                    '<td class="title">'+data.s2_1+ '</td>'+
                    '<td>'+'W'+ ' ' +data.s2_w+ ' '+ 'mm'+'</td>'+
                    '<td>'+'H'+ ' '+data.s2_h+ ' '+ 'mm'+'</td>'+
                    '<td>'+'D'+ ' '+data.s2_d+'</td>'+
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
          return `<div style="text-align: center"><a href="" class="edit_details"  data-toggle="modal" data-target="#myModal" data-id="${data.id}" title="edit" >
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








  function format (data) {
    return '<div class="details-container">'+
        '<table cellpadding="5" cellspacing="0" border="0" class="details-table">'+
            '<tr class="inside">'+
                  '<td class="c-data">'+data.s1_1+'</td>'+
                  '<td class="c-data">'+'W'+ ' ' +data.s1_w+ ' '+ 'mm'+' </td>'+
                  '<td class="c-data">'+'H'+ ' ' +data.s1_h+ ' '+ 'mm'+ '</td>'+
                  '<td class="c-data">'+'D'+ ' '+data.s1_d+'</td>'+
            '</tr>'+
            '<tr class="inside">'+
                  '<td class="title">'+data.s2_1+ '</td>'+
                  '<td>'+'W'+ ' ' +data.s2_w+ ' '+ 'mm'+'</td>'+
                  '<td>'+'H'+ ' '+data.s2_h+ ' '+ 'mm'+'</td>'+
                  '<td>'+'D'+ ' '+data.s2_d+'</td>'+
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
        return `<div style="text-align: center"><a href="" class="edit_details"  data-toggle="modal" data-target="#myModal" data-id="${data.id}" title="edit" >
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


// Pure JS
// let myCustomers = (function () {
//   let customers = [
//     {
//       'id': 1,
//       'category': 'Manas Ranjan',
//       'manufacturer': 'Male',
//       'name': 'India',
//       'phone': 7978022452,
//       "first_name":"Charles",
//       "last_name":"Daniels",
//       "email":"cdaniels0@java.com",
//       "country":"China",
//       "ip_address":"27.159.97.60"
      
//     },
//     {
//       'id': 1,
//       'category': 'Manas Ranjan',
//       'manufacturer': 'Male',
//       'name': 'India',
//       'phone': 7978022452,
//       "first_name":"Charles",
//       "last_name":"Daniels",
//       "email":"cdaniels0@java.com",
//       "country":"China",
//       "ip_address":"27.159.97.60"
//     },
//     {
//       'id': 1,
//       'category': 'Manas Ranjan',
//       'manufacturer': 'Male',
//       'name': 'India',
//       'phone': 7978022452,
//       "first_name":"Charles",
//       "last_name":"Daniels",
//       "email":"cdaniels0@java.com",
//       "country":"China",
//       "ip_address":"27.159.97.60"
//     }
//   ];

//   function format (customers) {
//     return '<div class="details-container">'+
//         '<table cellpadding="5" cellspacing="0" border="0" class="details-table">'+
//             '<tr>'+
//                 '<td class="title">Person ID:</td>'+
//                 '<td>'+data.first_name+'</td>'+
//             '</tr>'+
//             '<tr>'+
//                 '<td class="title">Name:</td>'+
//                 '<td>'+data.first_name + ' ' + data.last_name +'</td>'+
//                 '<td class="title">Email:</td>'+
//                 '<td>'+data.email+'</td>'+
//             '</tr>'+
//             '<tr>'+
//                 '<td class="title">Country:</td>'+
//                 '<td>'+data.country+'</td>'+
//                 '<td class="title">IP Address:</td>'+
//                 '<td>'+data.ip_address+'</td>'+
//             '</tr>'+
//         '</table>'+
//       '</div>';
// };

//   $('.datatables tbody').on('click', 'td.details-control', function () {
//     var tr  = $(this).closest('tr'),
//         row = table.row(tr);
   
//     if (row.child.isShown()) {
//       tr.next('tr').removeClass('details-row');
//       row.child.hide();
//       tr.removeClass('shown');
//     }
//     else {
//       row.child(format(row.data())).show();
//       tr.next('tr').addClass('details-row');
//       tr.addClass('shown');
//     }
//  });


//   // Setting some sample values if no cutomers exists in storage
//   localStorage.setItem('customers', localStorage.getItem('customers') || JSON.stringify(customers));

//   // Adding a new customer
//   let addCustomer = function (input) {
//     let customers = JSON.parse(localStorage.getItem('customers'));
//     // Checking possible errors
//     try {
//       if (!input.gender) {
//         throw false;
//       }
//       if (!isNaN(parseInt(input.name))) {
//         throw false;
//       }
//       if (!isNaN(parseInt(input.country))) {
//         throw false;
//       }
//       if (isNaN(parseInt(input.phone))) {
//         throw false;
//       }
//     }
//     catch (err) {
//       return err;
//     }
//     input.phone = parseInt(input.phone);
//     input.id = autoIncrementId();
//     customers.push(input);
//     localStorage.setItem('customers', JSON.stringify(customers));
//     return true;
//   };

//   // To increment id
//   let autoIncrementId = function () {
//     let customers = JSON.parse(localStorage.getItem('customers'));
//     let ids = [];
//     for (let i = 0; i < customers.length; i++) {
//       ids.push(customers[i].id);
//     }
//     let newId = Math.max(...ids) + 1;
//     return newId;
//   };

//   // To get list of all the customers
//   let getCustomers = function () {
//     let customers = JSON.parse(localStorage.getItem('customers'));
//     return customers;
//   }

//   // To find customer
//   let findCustomer = function (id) {
//     let customers = JSON.parse(localStorage.getItem('customers'));
//     let requestedCustomer = {};
//     for (let i = 0; i < customers.length; i++) {
//       if (id === customers[i].id) {
//         requestedCustomer.id = customers[i].id;
//         requestedCustomer.name = customers[i].name;
//         requestedCustomer.gender = customers[i].gender;
//         requestedCustomer.country = customers[i].country;
//         requestedCustomer.phone = customers[i].phone;
//       }
//     }
//     return requestedCustomer;
//   };

//   // Update customer details
//   let updateCustomer = function (updatedCustomer) {
//     let customers = JSON.parse(localStorage.getItem('customers'));
//     // Checking all possible exceptions
//     try {
//       if (!updatedCustomer.name || !isNaN(parseInt(updatedCustomer.name))) {
//         throw false;
//       }
//       if (!updatedCustomer.country || !isNaN(parseInt(updatedCustomer.country))) {
//         throw false;
//       }
//       if (!updatedCustomer.phone || isNaN(parseInt(updatedCustomer.phone))) {
//         throw false;
//       }
//     }
//     catch (err) {
//       return err;
//     }
//     for (let i = 0; i < customers.length; i++) {
//       if (updatedCustomer.id === customers[i].id) {
//         customers[i].id = updatedCustomer.id;
//         customers[i].name = updatedCustomer.name;
//         customers[i].gender = updatedCustomer.gender;
//         customers[i].country = updatedCustomer.country;
//         customers[i].phone = updatedCustomer.phone;
//       }
//     }
//     localStorage.setItem('customers', JSON.stringify(customers));
//     return true;
//   };

//   // Delete customer
//   let deleteCustomer = function (id) {
//     let customers = JSON.parse(localStorage.getItem('customers'));
//     let index = 0;
//     for (let i = 0; i < customers.length; i++) {
//       if (id === customers[i].id) {
//         index = i;
//       }
//     }
//     if (index >= 0) {
//       customers.splice(index, 1);
//     }
//     localStorage.setItem('customers', JSON.stringify(customers));
//   };

//   return {
//     addCustomer: addCustomer,
//     findCustomer: findCustomer,
//     getCustomers: getCustomers,
//     updateCustomer: updateCustomer,
//     deleteCustomer: deleteCustomer
//   };

// }());

// // jQuery part
// $(document).ready(function () {

//   let customerTable = '';
//   let id = '';
//   const timeToHide = 2000;

//   // Catching frequently used DOM elements
//   let $customerTable = $('.customer-table');
//   let $formContainer = $('.form-container');
//   let $messageBox = $('.message');
//   let $addCustomer = $('.add-button');
//   let $updateCustomer = $('.update-button');
//   let $errorMessage = $('.error-msg');

//   // Function to create a table using DataTable plugin
//   let createTable = function (customers) {
//     customerTable = $customerTable.DataTable({
//       data: customers,
//       columns: [
//         { data: 'category' },
//         { data: 'manufacturer' },
//         { data: 'Name' },
//         {
//           className      : 'details-control',
//           defaultContent : 'View Sensor Details',
//           data           : null,
//           orderable      : false
//         },
//         {
//           data: null,
//           render: function (data, type, row, meta) {
//             return `<div style="text-align: center"><a href="" class="edit_details"  data-toggle="modal" data-target="#myModal" data-id="${data.id}" title="edit" >
//             Edit</a>
//             </div>`;
//             // return `<div style="text-align: center"><a href="" class="edit_details"  data-toggle="modal" data-target="#myModal" data-id="${data.id}" title="edit" >
//             // <img src="http://i.imgur.com/DHma3ln.png" alt="Edit" width=20px></a>
//             // <a href="" class="delete_details" data-id="${data.id}" title="delete" style="padding-left: 20px;">
//             // <img src="http://i.imgur.com/HNUCXDU.png" alt="Delete" width=20px></a></div>`;
//           }
//         }

//       ],
//       columnDefs: [
//         { width: "30%", targets: 0 },
//         { width: "15%", targets: 1 },
//         { width: "25%", targets: 2 },
//         { width: "20%", targets: 3 },
//         { width: "10%", targets: 4, orderable: false }
//       ]
//     });
//   }

//   // Creating the table on page load
//   createTable(JSON.parse(localStorage.getItem('customers')));

//   // Function  to scroll to form
//   let scrollToForm = function () {
//     $('html, body').stop().animate({
//       scrollTop: $formContainer.offset().top
//     }, timeToHide);
//   };

//   // To pop up a message according to action performed
//   let showMessage = function () {
//     $messageBox.show();
//     setTimeout(function () {
//       $messageBox.hide('slow');
//     }, timeToHide);
//   };

//   $addCustomer.click(function (e) {
//     e.preventDefault();
//     /**
//      * Extracting customer details from form of webpage and reducing it to an object
//      * to operate on it.
//      */
//     let customerDetails = $('.customer-details').serializeArray().reduce(function (obj, item) {
//       obj[item.name] = item.value;
//       return obj;
//     }, {});
//     let status = myCustomers.addCustomer(customerDetails);
//     if (status) {
//       let customers = myCustomers.getCustomers();
//       if ($.fn.DataTable.isDataTable(customerTable)) {
//         customerTable.destroy();
//       }
//       createTable(customers);
//       $('.customer-details')[0].reset();
//       $messageBox.text(`${customerDetails.name} has been added to customers list.`);
//       showMessage();
//       $errorMessage.text('');
//     }
//     else {
//       $errorMessage.text('Please fill all fields with valid details.');
//     }
//   });

//   // Resetting form details when clicked on reset button
//   $('.reset-button').click(function (e) {
//     e.preventDefault();
//     $('.customer-details')[0].reset();
//     $errorMessage.text('');
//   })

//   // Method to delete customers from table
//   $(document).on('click', '.delete_details', function (e) {
//     e.preventDefault(); // Prevents link from following the URL
//     // Asking for confirmation before deleting
//     if (confirm("Are you sure?")) {
//       id = $(this).data('id');
//       myCustomers.deleteCustomer(parseInt(id));
//       let customers = myCustomers.getCustomers();
//       if ($.fn.DataTable.isDataTable(customerTable)) {
//         customerTable.destroy();
//       }
//       createTable(customers);
//       $messageBox.text(`Customer has been deleted from customers list.`);
//       showMessage();
//     }
//   });

//   // Method to edit details of customer form customers list
//   $(document).on('click', '.edit_details', function (e) {
//     e.preventDefault(); // Prevents link from following the URL
//     id = $(this).data('id');
//     let clickedCustomer = myCustomers.findCustomer(id);
//     $('#txtName').val(clickedCustomer.name);
//     $('#txtCountry').val(clickedCustomer.country);
//     $('#txtNumber').val(clickedCustomer.phone);
//     if (clickedCustomer.gender === 'male') {
//       $("#rdoGenderMale").prop("checked", true);
//     } else {
//       $("#rdoGenderFemale").prop("checked", true);
//     }
//     $addCustomer.hide();      // Hiding the add button
//     $updateCustomer.show();   // Showing update button
//     $formContainer.show();    // Showing form
//     scrollToForm();
//     $('#txtName').focus();
//   });

//   // Method to update details from updated form data
//   $(document).on('click', '.update-button', function (e) {
//     /**
//      * This method is used to stop from submiting the form which is it's default action
//      */
//     e.preventDefault();
//     let updatedCustomerDetails = $('.customer-details').serializeArray().reduce(function (obj, item) {
//       obj[item.name] = item.value;
//       return obj;
//     }, {});
//     updatedCustomerDetails.id = id;
//     let status = myCustomers.updateCustomer(updatedCustomerDetails);
//     if (status) {
//       let customers = myCustomers.getCustomers();
//       if ($.fn.DataTable.isDataTable(customerTable)) {
//         customerTable.destroy();
//       }
//       createTable(customers);
//       $formContainer.hide();
//       $('.customer-details')[0].reset();
//       $messageBox.text(`${updatedCustomerDetails.name}'s data has been updated in customers list.`);
//       showMessage();
//       $errorMessage.text('');
//     }
//     else {
//       $errorMessage.text('Please fill all fields with valid details.');
//     }
//   });

//   $('.add-another').click(function () {
//     $('.customer-details')[0].reset();
//     $formContainer.show();
//     scrollToForm();
//     $('#txtName').focus();
//     $addCustomer.show();
//     $updateCustomer.hide();
//   })
// });










// function format ( d ) {
//   return 'Full name: '+d.first_name+' '+d.last_name+'<br>'+
//       'Salary: '+d.salary+'<br>'+
//       'The child row can contain any data you wish, including links, images, inner tables etc.';
// }

// $(document).ready(function() {
//   var dt = $('#example').DataTable( {
//       "processing": true,
//       "serverSide": true,
//       "ajax": "scripts/ids-objects.php",
//       "columns": [
//           {
//               "class":          "details-control",
//               "orderable":      false,
//               "data":           null,
//               "defaultContent": ""
//           },
//           { "data": "first_name" },
//           { "data": "last_name" },
//           { "data": "position" },
//           { "data": "office" }
//       ],
//       "order": [[1, 'asc']]
//   } );

//   // Array to track the ids of the details displayed rows
//   var detailRows = [];

//   $('#example tbody').on( 'click', 'tr td.details-control', function () {
//       var tr = $(this).closest('tr');
//       var row = dt.row( tr );
//       var idx = $.inArray( tr.attr('id'), detailRows );

//       if ( row.child.isShown() ) {
//           tr.removeClass( 'details' );
//           row.child.hide();

//           // Remove from the 'open' array
//           detailRows.splice( idx, 1 );
//       }
//       else {
//           tr.addClass( 'details' );
//           row.child( format( row.data() ) ).show();

//           // Add to the 'open' array
//           if ( idx === -1 ) {
//               detailRows.push( tr.attr('id') );
//           }
//       }
//   } );

//   // On each draw, loop over the `detailRows` array and show any child rows
//   dt.on( 'draw', function () {
//       $.each( detailRows, function ( i, id ) {
//           $('#'+id+' td.details-control').trigger( 'click' );
//       } );
//   } );
// } );