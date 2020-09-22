$(document).ready(function(){
var edit_id;
var $edit_cont;
$(document).on('click', '.edit', function(){
  $('#gr-modal').removeClass("modal-lg");
    $('#mvcont').show();
    $('#update_btn').show();
    $('#group2').hide();
  	edit_id = $(this).data('id');
    $edit_cont = $(this).parent();
    //grab the cont
    var mvcont = $(this).siblings('.display-cont').text();
    $('#mvcont').val(mvcont);
 	
 	console.log('hel.lo');

  });
	$(document).on('click', '#update_btn', function(){
  	var id = edit_id;
  	var mvcont = $('#mvcont').val();
  	$.ajax({
      url: 'about-server.php',
      type: 'POST',
      data: {
      	'update': 1,
      	'id': id,
      	'mvcont': mvcont, 
      },
      success: function(response){
        // $edit_cont.replaceWith(response);
      }
  	});		
  });// .css({"color": "red", "border": "2px solid red"})
  $(document).on('click', '#ftext', function(){
    $edit_cont = $(this).parent().parent();
    var prof_full_name = $(this).parent().siblings(".display_name").text();
    var prof_id = $(this).parent().siblings(".display_id").text();
    var prof_bio = $(this).parent().siblings(".display_bio").text();
    $('#update').show();
    $('#save').hide();
    $('#name').val(prof_full_name);
    $('#bio').val(prof_bio);
    $('#id').val(prof_id);
    $('#ade').show();
    $('#cpic').hide();


  });
  $(document).on('click', '#f-add', function(){
    $('#update').hide();
    $('#save').show();
    $('#name').val('');
    $('#bio').val('');
    $('#id').val('');
    $('#ade').show();
    $('#cpic').hide();

  });
  $(document).on('click', '#save', function(){
    if($('#name').val() == "")  
      {  
        alert("Name is required");
        return false;  
      }  
      else if($('#bio').val() == '')  
      {  
        alert("Faculty's Description is required");  
        return false;  
      } 


  });
  $(document).on('click', '#fpic', function(){
    $('#ade').hide();
    $('#cpic').show();
    var prof_id = $(this).parent().siblings(".display_id").text();
    $('#img-id').val(prof_id);


  });
  $('#insert-img').click(function(){  
   var image_name = $('#save-image').val(); 

   if(image_name == '')  
   {  
     alert("Please Select Image");  
     return false;  
   }else{  
     var extension = $('#save-image').val().split('.').pop().toLowerCase();  
     if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
   {  
     alert('Invalid Image File');  
     $('#save-mage').val('');  
     return false;  
   }  
  }  
  });  
  // $(document).on('click', '#c-edit', function(){
  //   $('#gr-modal').addClass("modal-lg");
  //   $('#mvcont').hide();
  //   $('#update_btn').hide();
  //   $('#group2').show();
  //   $edit_cont = $(this).parent();
  //   edit_id = $(this).data('id');
  //   var name = $(this).siblings('.display-name').text()
  //   $('#name').val(name);
  //   var bio = $(this).siblings('.display-bio').text()
  //   $('#bio').val(bio);
  //   var img = $(this).siblings('img.display-img').attr('src');
  //   $('#img').attr('src', img)
  //   // $('#img').val(img);
  //   console.log(edit_id);
  //   console.log(name);
  //   console.log(bio);
  //   console.log(img);
  // });
  // $(document).on('click', '#group-edit', function(){
  //   $('#gr-modal').addClass("modal-lg");
  //   $('#mvcont').hide();
  //   $('#update_btn').hide();
  //   $('#group2').show();
  //   $edit_cont = $(this).parent().parent();
  //   edit_id = $(this).data('id');
  //   var name = $(this).siblings('center').children('.display-name').text()
  //   $('#name').val(name);
  //   var bio = $(this).siblings('center').children('.display-bio').text()
  //   $('#bio').val(bio);
  //   var img = $(this).parent('div').siblings('div').children().attr('src');
  //   $('#img').attr('src', img)
  //   // $('#img').val(img);

  // });
  // $(document).on('click', '#update_btn2', function(){
  //   var prof_id = edit_id;
  //   var prof_full_name = $('#name').val();
  //   var prof_bio = $('#bio').val();
  //   var prof_img = $('#img').attr('src');
  //   console.log(prof_id);
  //   console.log(prof_full_name);
  //   console.log(prof_bio);
  //   console.log(prof_img);

  //   $.ajax({
  //     url: 'about-server2.php',
  //     type: 'POST',
  //     data: {
  //       'update': 1,
  //       'prof_id': prof_id,
  //       'prof_full_name': prof_full_name,
  //       'prof_bio': prof_bio,
  //       'prof_img': prof_img,
  //     },
  //     success: function(response){
  //       $edit_cont.replaceWith(response);
  //     }
  //   });   
  //   });   

//   $(document).on('click', '.close', function(){
//     $('#gr-modal').removeClass("modal-lg");
//     $('#update_btn').hide();
//     $('#mvcont').show();
//   });
//   $(document).mouseup(function (e){

//   var container = $("#gr-modal");

//   if (!container.is(e.target) && container.has(e.target).length === 0){

//     container.removeClass("modal-lg");
//     $('#update_btn').hide();
//     $('#mvcont').show();
//   }
// });
});