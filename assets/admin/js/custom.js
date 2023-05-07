$( document ).ready(function() {
    var baseurl = $('body').data('baseurl');

    var atLeastOneIsChecked = $('input[name="feature_ad"]:checked').length;
    if(atLeastOneIsChecked == 1){
        $('#featured_ad_amount_parent').show();
    }else {
        $('#featured_ad_amount_parent').hide();
    }

    $('.input-name-1').on('click', '#feature_ad', function () {
        var atLeastOneIsChecked = $('input[name="feature_ad"]:checked').length;
        if(atLeastOneIsChecked == 1){
            $('#featured_ad_amount_parent').show();
        }else {
            $('#featured_ad_amount_parent').hide();
        }
    });

    $('#user-list-table').DataTable({
        responsive: true,
        "sScrollX": false,
        "sScrollXInner": "110%",
        "bScrollCollapse": true,
        "bLengthChange": false,
        searching: false,
        paging : false

    });

    $('#property-listing-table').DataTable({
        responsive: true,
        "sScrollX": false,
        "sScrollXInner": "110%",
        "bScrollCollapse": true,
        "bLengthChange": false,
    });

    $('#company-listing-table').DataTable({
        responsive: true,
        "sScrollX": false,
        "sScrollXInner": "110%",
        "bScrollCollapse": true,
        "bLengthChange": false,
    });

    $('#admin-user-list-table').DataTable({
        responsive: true,
        "sScrollX": false,
        "sScrollXInner": "110%",
        "bScrollCollapse": true,
        "bLengthChange": false,
      
    });

    $('#admin-user-list-table-2').DataTable({
        responsive: true,
        "sScrollX": false,
        "sScrollXInner": "110%",
        "bScrollCollapse": true,
        "bLengthChange": false,
    
    });

    if($('#postad_check_req_price').is(":checked")) {
        $('.price_row').hide();
        $('#price_nagotiable_row').hide();
    }else{
        $('.price_row').show();
        $('#price_nagotiable_row').show();
    }


    $("#postad_check_req_price").click(function() {
        if($('#postad_check_req_price').is(":checked")) {
            $('.price_row').hide();
            $('#price_nagotiable_row').hide();
        }else{
            $('.price_row').show();
            $('#price_nagotiable_row').show();
        }
    });


    $('.box-footer').on('click', '#dlt_user', function () {
        var deleteMsg = confirm("Are You sure you want to delete this User ? ");
        var userNativeId = $('#user_native_id').val();
        if(deleteMsg == true){
            $.ajax({
                url: baseurl+'User/deleteUser/',
                type: 'POST',
                data : userNativeId,
                success: function (data) {

                },
                error: function (error) {
                    console.log(error);
                }
            });


        }else {
            alert("You are secure now, You cancel the process.")
            return false;
        }
    });

    $('.input-type').on('change', '#pro_body_type', function () {

        var body_type = $('#pro_body_type').val();


        $('#pro_sub_body_type').empty();
        $.ajax({
            url: baseurl + 'admin/sub_body_types_by_id/' + body_type,
            type: "GET",
            success: function (data) {
                //alert(data.length);
                $("#pro_sub_body_type").append("<option value='0'>Select Sub Body Type</option>");
                for (var i = 0; i < data.length; i++) {
                    $("#pro_sub_body_type").append("<option value='" + data[i].category_id + "'>" + data[i].name + "</option>");
                }
            },
            error: function (error) {
                console.log(error);
                //alert(error);
            }
        });

    });

    var body_type = $('#pro_body_type').val();
    var sub_b_type_selected = $('#pro_sub_body_type_id').val();
    var sub_b_type_selected_name = $('#pro_sub_body_type_name').val();

    $('#pro_sub_body_type').empty();
    $.ajax({
        url: baseurl + 'admin/sub_body_types_by_id/' + body_type,
        type: "GET",
        success: function (data) {
            //alert(data.length);
            $("#pro_sub_body_type").append("<option selected value='"+sub_b_type_selected+"'>"+sub_b_type_selected_name+"</option>");
            $("#pro_sub_body_type").append("<option value='0'>Select Sub Body Type</option>");
            for (var i = 0; i < data.length; i++) {
                $("#pro_sub_body_type").append("<option value='" + data[i].category_id + "'>" + data[i].name + "</option>");
            }
        },
        error: function (error) {
            console.log(error);
            //alert(error);
        }
    });


    $('.box-footer').on('click', '#sub_employee_dlt', function () {
        var deleteMsg = confirm("Are You sure you want to delete this Employee  ? ");
        var empNativeId = $('#emp_native_id').val();
        if(deleteMsg == true){
            $.ajax({
                url: baseurl+'User/deleteEmployee/',
                type: 'POST',
                data : empNativeId,
                success: function (data) {

                },
                error: function (error) {
                    console.log(error);
                }
            });


        }else {
            alert("You are secure now, You cancel the process.")
            return false;
        }
    });


    var brand = $('#pro_brand').val();
    var model_selected = $('#pro_model_seleted').val();
    var model_selected_name = $('#pro_model_seleted_name').val();


    $('#pro_model').empty();
    $.ajax({
        url: baseurl + 'admin/sub_model_by_brand/' + brand,
        type: "GET",
        success: function (data) {
            //alert(data.length);
            $("#pro_model").append("<option selected value='"+model_selected+"'>"+model_selected_name+"</option>");
            $("#pro_model").append("<option value='0'>Select Model</option>");
            for (var i = 0; i < data.length; i++) {
                $("#pro_model").append("<option value='" + data[i].sub_model_id + "'>" + data[i].name + "</option>");
            }
        },
        error: function (error) {
            console.log(error);
            //alert(error);
        }
    });

    $('.input-type').on('change', '#pro_brand', function () {

        var brand = $('#pro_brand').val();


        $('#pro_model').empty();
        $.ajax({
            url: baseurl + 'admin/sub_model_by_brand/' + brand,
            type: "GET",
            success: function (data) {
                //alert(data.length);
                $("#pro_model").append("<option value='0'>Select Model</option>");
                for (var i = 0; i < data.length; i++) {
                    $("#pro_model").append("<option value='" + data[i].sub_model_id + "'>" + data[i].name + "</option>");
                }
            },
            error: function (error) {
                console.log(error);
                //alert(error);
            }
        });

    });


    $('.col-sm-4').on('change', '#product_main_cat', function () {

        var main_cat_id = $('#product_main_cat').val();

        $('#product_sub_cat').empty();
        $.ajax({
            url: baseurl + 'admin/sub_categories/' + main_cat_id,
            type: "GET",
            success: function (data) {
                //alert(data.length);
                $("#product_sub_cat").append("<option value='0'>Select Sub Category</option>");
                for (var i = 0; i < data.length; i++) {
                    $("#product_sub_cat").append("<option value='" + data[i].sub_cat_id + "'>" + data[i].name + "</option>");
                }
            },
            error: function (error) {
                console.log(error);
                //alert(error);
            }
        });

    });




    $("#checkAll").change(function () {
        $("#featureRow input:checkbox").prop('checked', $(this).prop("checked"));
    });



    $('#dev-part-features').hide();
    $('#land-part-features').hide();
    $('#house-part-features').hide();
    $('#commercial-part-features').hide();
    $('#apartment-part-features').hide();



    $('#property_save').validate({
        rules : {

            car_sale_select : {
                selectcheck : true
            },
            pro_body_type : {
                selectcheck : true
            },
            pro_brand : {
                selectcheck : true
            },
            pro_property_condition : {
                selectcheck : true
            },
            pro_fuel_types : {
                required : true
            }

        }
    });

    $('#update_property').validate({
        rules : {

            pro_offer_type : {
                selectcheck : true
            },
            pro_property_type : {
                selectcheck : true
            },
            pro_property_sub_type : {
                selectcheck : true
            },
            property_title : "required",
            // "textarea-desc-property" : "required",
            pro_price_type:{
                selectcheck : true
            },
            pro_price : {
                required : true
            },
            pro_available_from : {
                required : true
            },
            pro_district : {
                selectcheck : true
            },
            pro_city : {
                selectcheck : true
            },
            pro_address : {
                selectcheck : true
            },
            'feature_list[]' : "required",
            pro_contact_name : {
                required : true
            },
            pro_contact_email : {
                required : true
            },
            pro_contact_phone :{
                required : true
            }

        }
    });



    var options = {

        url: baseurl+"home/cities",

        getValue: "cname",

        list: {
            match: {
                enabled: true
            }
        },

        theme: "square"
    };

    // $("#location_main_search").easyAutocomplete(options);


    $("#pro_price").on('keyup', function(){
        var n = parseInt($(this).val().replace(/\D/g,''),10);
        $(this).val(n.toLocaleString());
        //do something else as per updated question
        myFunc(); //call another function too
    });


    $('.col-sm-4').on('change', '#parent_category', function () {
        var cat = $('#parent_category').val();
        if(cat == 0){
            $('#sort_div').show();
        }else{
            $('#sort_div').hide();
        }

    });


    $('.input-type').on('change', '#pro_property_condition', function () {

        var condi = $('#pro_property_condition').val();

        if(condi == "used"){
            $('#regi_no_div').show();
        }else{
            $('#regi_no_div').hide();
        }

    });


    $('.input-type').on('change', '#pro_property_type', function () {

        var property_id = $('#pro_property_type').val();
        alert(property_id);


        $('#pro_property_sub_type').empty();
        $.ajax({
            url: baseurl + 'property/sub_property/' + property_id,
            type: "GET",
            success: function (data) {
                //alert(data.length);
                $("#pro_property_sub_type").append("<option value='0'>Select</option>");
                for (var i = 0; i < data.length; i++) {
                    $("#pro_property_sub_type").append("<option value='" + data[i].sub_pro_id + "'>" + data[i].name + "</option>");
                }


                //load feature list
                var featureId = "";
                if((property_id == "P001") || (property_id == "P002") || (property_id == "P005")){
                    featureId = 1;
                }else if(property_id == "P003"){
                    featureId = 2;
                }else if(property_id == "P004"){
                    featureId = 3;
                }

                $.ajax({
                    url: baseurl + 'vehicle/getFeaturesByPropertyType/'+ featureId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var eTable="<div id='feature-list-property'>" ;
                        for(var i=0; i < data.length; i++){

                            /*$.each(data, function (i, val) {
                                alert(val.name);
                            });*/
                            /*eTable += "<tr role='row'>";
                            eTable += "<td style='text-align: center'>"+"<input type='checkbox' name='form1_acc_terms' id='form1_acc_terms'>"+"</td>";
                            eTable += "<td>"+data[i].id+"</td>";
                            eTable += "<td>"+data[i].name+"</td>";
                            eTable += "</tr>";*/

                            eTable += "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-6'> ";
                            eTable += "<div class='checkbox'> ";
                            eTable += "<label class='input-name-1'>";
                            eTable += " <input type='checkbox' class='feature_list' name='feature_list[]' id='feature_list_"+data[i].id+"' value='"+data[i].id+"'>"+ "<label>" + data[i].name + "</label>";
                            eTable += "</label>";
                            eTable += "</div>";
                            eTable += "</div>";
                        }
                        eTable +="</div>";
                        $('#feature-list-property').html(eTable);

                        //alert(data[1].name);
                        //$('.selected-area').text(data[0].name);





                        //keyinfo ajax

                        $.ajax({
                            url: baseurl + 'vehicle/getKeyInfoByPropertyTypeId/'+ property_id,
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                var eTable="<div id='keyinfo-features'>" ;
                                for(var i=0; i < data.length; i++){

                                    /*$.each(data, function (i, val) {
                                        alert(val.name);
                                    });*/
                                    /*eTable += "<tr role='row'>";
                                    eTable += "<td style='text-align: center'>"+"<input type='checkbox' name='form1_acc_terms' id='form1_acc_terms'>"+"</td>";
                                    eTable += "<td>"+data[i].id+"</td>";
                                    eTable += "<td>"+data[i].name+"</td>";
                                    eTable += "</tr>";*/

                                    eTable += "<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'> ";
                                    eTable += "<div class='input-type'> ";
                                    eTable += "<label>" + data[i].name + "</label>";
                                    eTable += "<input type='hidden' name='keyinfo_id_list[]' value='"+data[i].native_id+"'> <input type='text' class='keyinfo_list' name='keyinfo_list[]' id='keyinfo_list_"+data[i].id+"'>";
                                    eTable += "</label>";
                                    eTable += "</div>";
                                    eTable += "</div>";
                                }
                                eTable +="</div>";
                                $('#keyinfo-features').html(eTable);

                                //alert(data[1].name);
                                //$('.selected-area').text(data[0].name);
                            },
                            error: function (error) {
                                console.log(error);
                                //alert(error);
                            }
                        });




                    },
                    error: function (error) {
                        console.log(error);
                        //alert(error);
                    }
                });




            },
            error: function (error) {
                console.log(error);
                //alert(error);
            }
        });

    });


//     var shortNumber = $("#clickToShow").text().substring(0,  $("#clickToShow").text().length - 8);
// //var eventTracking = "_gaq.push(['_trackEvent', 'Advertisement', 'click', 'Track View Ads']);";
//     var eventTracking = "ga('send', 'event', 'Advertisement', 'click', 'label', 'Track View Ads - OfficeSpace')";
//
//     $("#clickToShow").hide().after('<span id="clickToShowButton" onClick="' + eventTracking + '">' + shortNumber + '... (click to show number)</span>');
//     $("#clickToShowButton").click(function() {
//         $("#clickToShow").show();
//         $("#clickToShowButton").hide();
//     });









    /*update form sub type load*/

    var property_main_cat_id = $('#pro_property_type_edit').val();
    var selected_sub_type = $('#selected_sub_type').val();
    var selected_sub_type_name  = $('#selected_sub_type_name').val();
    var property_id = $('#property_id').val();


    $('#pro_property_sub_type').empty();
    $.ajax({
        url: baseurl + 'vehicle/sub_property/' + property_main_cat_id,
        type: "GET",
        success: function (data) {
            //alert(data.length);
            $("#pro_property_sub_type").append("<option selected value='"+selected_sub_type+"'>"+selected_sub_type_name+"</option>");
            $("#pro_property_sub_type").append("<option value='0'>Select</option>");
            for (var i = 0; i < data.length; i++) {
                $("#pro_property_sub_type").append("<option value='" + data[i].sub_pro_id + "'>" + data[i].name + "</option>");
            }


            //load feature list
            var featureId = "";
            if((property_main_cat_id == "P001") || (property_main_cat_id == "P002") || (property_main_cat_id == "P005")){
                featureId = 1;
            }else if(property_main_cat_id == "P003"){
                featureId = 2;
            }else if(property_main_cat_id == "P004"){
                featureId = 3;
            }

            $.ajax({
                url: baseurl + 'vehicle/getFeaturesByPropertyTypeEdit/'+ featureId +'/'+property_main_cat_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    var eTable="<div id='feature-list-property'>" ;
                    for(var i=0; i < data.length; i++){

                        /*$.each(data, function (i, val) {
                            alert(val.name);
                        });*/
                        /*eTable += "<tr role='row'>";
                        eTable += "<td style='text-align: center'>"+"<input type='checkbox' name='form1_acc_terms' id='form1_acc_terms'>"+"</td>";
                        eTable += "<td>"+data[i].id+"</td>";
                        eTable += "<td>"+data[i].name+"</td>";
                        eTable += "</tr>";*/

                        eTable += "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-6'> ";
                        eTable += "<div class='checkbox'> ";
                        eTable += "<label class='input-name-1'>";
                        if(data[i].value != null){
                            eTable += " <input type='checkbox' class='feature_list' checked='checked' name='feature_list[]' id='feature_list_"+data[i].id+"' value='"+data[i].id+"'>"+ "<label>" + data[i].name + "</label>";
                        }else{
                            eTable += " <input type='checkbox' class='feature_list' name='feature_list[]' id='feature_list_"+data[i].id+"' value='"+data[i].id+"'>"+ "<label>" + data[i].name + "</label>";
                        }

                        eTable += "</label>";
                        eTable += "</div>";
                        eTable += "</div>";
                    }
                    eTable +="</div>";
                    $('#feature-list-property').html(eTable);

                    //alert(data[1].name);
                    //$('.selected-area').text(data[0].name);





                    //keyinfo ajax


                    $.ajax({
                        url: baseurl + 'vehicle/getKeyInfoByPropertyTypeEdit/'+ property_main_cat_id + '/' + property_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {

                            var eTable="<div id='keyinfo-features'>" ;
                            for(var i=0; i < data.length; i++){
                                //alert(data[i].value);
                                /*$.each(data, function (i, val) {
                                    alert(val.name);
                                });*/
                                /*eTable += "<tr role='row'>";
                                eTable += "<td style='text-align: center'>"+"<input type='checkbox' name='form1_acc_terms' id='form1_acc_terms'>"+"</td>";
                                eTable += "<td>"+data[i].id+"</td>";
                                eTable += "<td>"+data[i].name+"</td>";
                                eTable += "</tr>";*/

                                eTable += "<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'> ";
                                eTable += "<div class='input-type'> ";
                                eTable += "<label>" + data[i].key_info_name + "</label>";
                                eTable += "<input type='hidden' name='keyinfo_id_list[]' value='"+data[i].key_info_id+"'><input type='text' value='"+data[i].value+"' class='keyinfo_list' name='keyinfo_list[]' id='keyinfo_list_"+data[i].id+"'>";
                                eTable += "</label>";
                                eTable += "</div>";
                                eTable += "</div>";
                            }
                            eTable +="</div>";
                            $('#keyinfo-features').html(eTable);

                            //alert(data[1].name);
                            //$('.selected-area').text(data[0].name);
                        },
                        error: function (error) {
                            console.log(error);
                            //alert(error);
                        }
                    });




                },
                error: function (error) {
                    console.log(error);
                    //alert(error);
                }
            });




        },
        error: function (error) {
            console.log(error);
            //alert(error);
        }
    });



//car sale select


        var car_sale_id = $('#car_sale_select').val();

        $.ajax({
            url: baseurl + 'admin/car_sale_details_by_id/' + car_sale_id,
            type: "GET",
            success: function (data) {
                //alert(data.length);
                $('#car_sale_name').val(data[0].name);
                $('#car_sale_contactno').val(data[0].contactno);
                $('#car_sale_address').val(data[0].address);
            },
            error: function (error) {
                console.log(error);
                //alert(error);
            }
        });




    $('.input-type').on('change', '#car_sale_select', function () {

        var car_sale_id = $('#car_sale_select').val();

        $.ajax({
            url: baseurl + 'admin/car_sale_details_by_id/' + car_sale_id,
            type: "GET",
            success: function (data) {
                //alert(data.length);
                $('#car_sale_name').val(data[0].name);
                $('#car_sale_contactno').val(data[0].contactno);
                $('#car_sale_address').val(data[0].address);
            },
            error: function (error) {
                console.log(error);
                //alert(error);
            }
        });

    });


    $('#feature_ad').click(function(){
        if ($("#feature_ad").prop("checked")) {
            $('#featured_price').show();
        }else{
            $('#featured_price').hide();
        }
    });






});


function countChar(val) {
    var len = val.value.length;
    if (len >= 1000) {
        val.value = val.value.substring(0, 1000);
    } else {
        $('#charNum').text(1000 - len);
    }
};

jQuery.validator.addMethod('selectcheck', function (value) {
    return (value != '0');
}, "This field is required.");
