$(document).ready(function() {

 $('.form-group').on('change','#category-list',function(){

 	element = $(this);
 		$.ajax({
            url : '/category/rate_change/'+($('#category-list').val()),
            dataType : 'json',
            success : function(data){

            	$('#category-id').val(data.id);
            	$('#cat-code').val(data.code);
            	$('#cat-rate').val(data.rate);
            	

            },
            error : function(error){
            	$('#cat-code').val("");
            	$('#cat-rate').val(0);
            	
                console.log(error);
            }
        });
 });

// $('.box-primary').on('click','#btn-rate-change', function(){

// 	if($('#category-list').val() != 0){
//              result = confirm("Are you sure, You want to change the Depreciation Rate ? ");
//         }else{
//             result = alert("Please select Category for change the Rate");
//         }
// 	var cateogryId = $('#category-id').val();
	
// 	element = $(this);

// 	var data = {
// 			'category-rate' : $('#cat-rate').val()
// 			}

// 	$.ajax({
// 		url : '/category/rate_change/' + cateogryId,
// 		method : 'PUT',
// 		contentType : 'application/json',
//         data: JSON.stringify(data),
//         dataType: "json",
//         success: function (data) {
//             console.log(data);
//         },
//         error: function (error) {
//                 console.log(error);
//             }
// 	});

// });
		
});



