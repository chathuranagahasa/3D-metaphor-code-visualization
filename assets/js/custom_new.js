$( document ).ready(function() {
    var baseurl = $('body').data('baseurl');


    $('#register_customer').validate({
        rules : {

            cus_firstname : {
                required : true
            },
            cus_lastname : {
                required : true
            },
            cus_contactno : {
                required : true
            },
            cus_email:{
                required : true
            },
            cus_password : {
                required : true
            },
            cus_con_password : {
                required : true
            },
            cus_terms_agree :{
                required : true
            },

            // cus_sex:{
            //     selectcheck: true
            // },


        }
    });

    $('#property_save').validate({
        rules : {
            pro_body_type : {
                selectcheck : true
            },
            pro_brand : {
                selectcheck : true
            },
            pro_model:{
                selectcheck : true
            },
            pro_property_condition : {
                selectcheck : true
            },
            pro_fuel_types : {
                selectcheck : true
            },
            pro_transmission_types:{
                selectcheck : true
            },
            pro_district:{
                selectcheck : true
            },
            pro_contact_name:{
                required: true
            },
            pro_contact_email:{
                required: true
            },
            pro_contact_phone:{
                required: true
            }

        }
    });


    $('#payment_form').validate({
        rules : {
            time_du_pay : {
                selectcheck : true
            },
            payment_method : {
                required : true
            }
        }
    });

    var shortNumber = $("#clickToShow").text().trim().substring(0, $("#clickToShow").text().trim().length - 6);
    //var eventTracking = "_gaq.push(['_trackEvent', 'Advertisement', 'click', 'Track View Ads']);";
    var eventTracking = "ga('send', 'event', 'Advertisement', 'click', 'label', 'Track View Ads - CarMart')";

    $("#clickToShow").hide().after('<span id="clickToShowButton" onClick="' + eventTracking + '">' + shortNumber + '... (click to show number)</span>');
    $("#clickToShowButton").click(function () {

        var tel_no = $('#tel_no').text();
        var property_id = jQuery('#property_id').val();

        jQuery.ajax({
            url: baseurl +'/user/save_leads_phone',
            type: "POST",
            data: {'tel_no' : tel_no, 'pro_id' : property_id },
            success: function (data) {
                if(data.result == true){
                    console.log("lead saved");
                }else{
                    console.log("lead failed");
                }
            },
            error: function (error) {
                console.log(error);
                //alert(error);
            }
        });


        $("#clickToShow").show();
        $("#clickToShowButton").hide();


    });



    $("#checkAll").change(function () {
        $("#featureRow input:checkbox").prop('checked', $(this).prop("checked"));
    });


    var total = 0.00;
    var total_new = 0.00;
    var per_week_cost = 100.00;
    var total_for_time = 0.00;
    var  final_cost = 0.00;
    var loyalty_balance = 0.00;

    total_new  = per_week_cost * $("#time_du_pay option:selected").val();


    $("#feature_vehicle_is").change(function () {
       if($("#feature_vehicle_is").is(":checked")){
           total = 500.00;
           loyalty_balance = $('#loyalty_balance_val').val();

console.log("xxxx", loyalty_balance);

           if((total + total_new) >= 500 ){
               $('.total_ad_cost_ad').text((total + total_new).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
               $('.total_ad_cost').text((total + total_new).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
               $('.total_ad_cost').val(((total + total_new)).toFixed(2));

           }else{
               $('.total_ad_cost_ad').text(((total + total_new)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
               $('.total_ad_cost').text(( (total + total_new)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
               $('.total_ad_cost').val(( (total + total_new)).toFixed(2));
           }


           if($('#renew').val() == "renew"){
               $('#loyalty_balance_val').val(0);
               total_cost =  $('.total_amount_to_pay').val();
           }else{
               loyal_bal = $('#loyalty_balance_val').val();
               total_cost =  $('.total_amount_to_pay').val();
           }

           //alert(loyalty_balance);

           final_cost = total + total_new - loyalty_balance;
           $('.total_amount_pay_cost').text(final_cost.toFixed(2));

           if(final_cost >= 0){
               var bal = 0;
               $('#loyalty_balance').text(bal.toFixed(2));
           }else{
               var final_bal = loyalty_balance - total + total_new;
               $('#loyalty_balance').text(final_bal.toFixed(2));
           }

           //alert(final_cost);
           //
           //
           // console.log("111" + loyal_bal);
           // console.log("222" + total_cost);
           //
           // final_cost = total_cost - loyal_bal;
           // if(final_cost < 0){
           //     var bal = loyal_bal - total_cost;
           //     $('#loyalty_balance_val').val(bal.toFixed(2));
           //     $('#loyalty_balance').text(bal.toFixed(2) + " LKR");
           //     $('.total_ad_cost').text(0);
           //     $('.total_ad_cost').val(0);
           //
           // }else{
           //     $('#loyalty_balance_val').val(0);
           //     $('#loyalty_balance').text(0);
           //     $('.total_ad_cost').text(final_cost.toFixed(2));
           //     $('.total_ad_cost').val(final_cost.toFixed(2));
           // }


       }else{
           total_new  = per_week_cost * $("#time_du_pay option:selected").val();
           $('.total_ad_cost').text((total_new).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
           $('.total_ad_cost').val((total_new).toFixed(2));

           $('.total_amount_pay_cost').text(total_new.toFixed(2));

           var final_bal = loyalty_balance - total_new;
           if(final_bal > 0){
               // alert("xxy");
               $('#loyalty_balance').text(final_bal.toFixed(2) + " LKR");
           }else{
               // alert("yyx");
               // alert(total_new);
               // alert(loyalty_balance);
               var loyalty_balance_new = $('#loyalty_balance_val').val();
               var final_bal_2 = total_new - loyalty_balance_new;
               if (final_bal_2 > 0){
                   $('#loyalty_balance').text(0.00 + " LKR");
                   $('.total_amount_pay_cost').text(final_bal_2.toFixed(2));
               }else {
                   $('#loyalty_balance').text((loyalty_balance_new - total_new).toFixed(2) + " LKR");
                   $('.total_amount_pay_cost').text(0.00);
               }

           }


       }

        var amount_to_pay = $('.total_amount_pay_cost').text();

        $('#no_amount_to_pay_parent').hide();
        $('#pay_op_active').show();

        if(amount_to_pay == "0.00" || amount_to_pay == 0){
            $('#no_amount_to_pay_parent').show();
            $('#pay_op_active').hide();
        }else{
            $('#no_amount_to_pay_parent').hide();
            $('#pay_op_active').show();
        }
    });


    $("#time_du_pay").change(function() {
        //total_for_time = per_week_cost * $("#time_du_pay option:selected").val();

        //if(total == 0){
            //alert($("#time_du_pay option:selected").val());
            total_new  = per_week_cost * $("#time_du_pay option:selected").val();
            //alert(total_new);
        // }else{
        //     total_new = total + total_for_time;
        // }
        loyalty_balance = $('#loyalty_balance').text();
        $('.total_ad_cost').text(total_new.toFixed(2));
        //alert(($("#feature_vehicle_is").is(":checked")));
         if($("#feature_vehicle_is").is(":checked")) {
                  $('.total_ad_cost').text((total_new +500).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                  $('.total_ad_cost').val((total_new + 500).toFixed(2));

                  var a_p = $('#loyalty_balance_val').val().replace(/\d(?=(\d{3})+\.)/g, '$&,');



             $('.total_amount_pay_cost').text((total_new - loyalty_balance + (500 - parseFloat(a_p))).toFixed(2));


         } else if($("#time_du_pay option:selected").val() != 0) {
             //alert("yyyy");
             var a_p_y = $('#loyalty_balance_val').val().replace(/\d(?=(\d{3})+\.)/g, '$&,');

            $('.total_ad_cost').text(total_new.toFixed(2));
            $('.total_ad_cost').val(total_new.toFixed(2));

            var final_a_p_y = a_p_y - total_new;
            if(final_a_p_y > 0){
                $('#loyalty_balance').text((a_p_y - total_new).toFixed(2) + " LKR");
                $('.total_amount_pay_cost').text("0.00" + " LKR");
            }else{
                $('#loyalty_balance').text("0.00" + " LKR");
                $('.total_amount_pay_cost').text((total_new - a_p_y).toFixed(2));
            }

        }else{
            // alert("xxx");
            $('.total_ad_cost').text("0.00");
            $('.total_ad_cost').val("0.00");
        }

        var amount_to_pay = $('.total_amount_pay_cost').text();

        $('#no_amount_to_pay_parent').hide();
        $('#pay_op_active').show();

        if(amount_to_pay == "0.00" || amount_to_pay == 0){
            $('#no_amount_to_pay_parent').show();
            $('#pay_op_active').hide();
        }else{
            $('#no_amount_to_pay_parent').hide();
            $('#pay_op_active').show();
        }
    });



    $('#payonstore').click(function(){
        if($("#time_du_pay option:selected").val() != 0){
            if ($("#payonstore").prop("checked")) {
                $('#store_div').show();
                $('#bank_div').hide();
                $('#bank_slip_div').hide();

                $('#feature_vehicle_is').prop("disabled", true);
                $('#time_du_pay').prop("disabled", true);
            }
        }else{
            alert("Please select the above options");
            location.reload();
        }

    });

    $('#bank_tranfer').click(function(){
        if($("#time_du_pay option:selected").val() != 0) {
            if ($("#bank_tranfer").prop("checked")) {
                $('#bank_div').show();
                $('#store_div').hide();
                $('#bank_slip_div').show();

                $('#feature_vehicle_is').prop("disabled", true);
                $('#time_du_pay').prop("disabled", true);

                var loyal_bal = $('#loyalty_balance_val').val();
                var total_cost =  $('.total_ad_cost').val();
                var final_cost;

                console.log("111" + loyal_bal);
                console.log("222" + total_cost);

                final_cost = total_cost - loyal_bal;
                if(final_cost < 0){
                    var bal = loyal_bal - total_cost;
                    $('#loyalty_balance_val').val(bal.toFixed(2));
                    $('#loyalty_balance').text(bal.toFixed(2) + " LKR");
                    $('.total_ad_cost').text(0);
                    $('.total_ad_cost').val(0);

                }else{
                    $('#loyalty_balance_val').val(0);
                    $('#loyalty_balance').text(0);
                    $('.total_ad_cost').text(final_cost.toFixed(2));
                    $('.total_ad_cost').val(final_cost.toFixed(2));
                }
            }
        }else {
            alert("Please select the above options");
            location.reload();
        }
    });

    $('#onlinepay').click(function(){
        if($("#time_du_pay option:selected").val() != 0) {
            if ($("#onlinepay").prop("checked")) {
                $('#bank_div').hide();
                $('#store_div').hide();
                $('#bank_slip_div').hide();

                $('#feature_vehicle_is').prop("disabled", true);
                $('#time_du_pay').prop("disabled", true);

                var loyal_bal = $('#loyalty_balance_val').val();
                var total_cost =  $('.total_ad_cost').val();
                var final_cost;

                console.log("111" + loyal_bal);
                console.log("222" + total_cost);

                final_cost = total_cost - loyal_bal;
                if(final_cost < 0){
                    var bal = loyal_bal - total_cost;
                    $('#loyalty_balance_val').val(bal.toFixed(2));
                    $('#loyalty_balance').text(bal.toFixed(2) + " LKR");
                    $('.total_ad_cost').text(0);
                    $('.total_ad_cost').val(0);

                }else{
                    $('#loyalty_balance_val').val(0);
                    $('#loyalty_balance').text(0);
                    $('.total_ad_cost').text(final_cost.toFixed(2));
                    $('.total_ad_cost').val(final_cost.toFixed(2));
                }
            }
        }else{
            alert("Please select the above options");
            location.reload();
        }
    });




    $('.custom-select-box').on('change', '#sort_types', function () {

        var sort_Type = $('#sort_types').val();
        var cat_id = $('#cat_id').val();
        var cat_name = $('#cat_name').val();
        //alert(sort_Type);

        window.location.href = baseurl + 'Vehicle/sorting/'+ cat_id +'/'+ cat_name +'/'+ sort_Type;


    });

    $('.custom-select-box').on('change', '#sort_types_grid', function () {

        var sort_Type = $('#sort_types_grid').val();
        var cat_id = $('#cat_id').val();
        var cat_name = $('#cat_name').val();
        //alert(sort_Type);

        window.location.href = baseurl + 'Vehicle/sorting_grid/'+ cat_id +'/'+ cat_name +'/'+ sort_Type;


    });

    $('.custom-select-box').on('change', '#sort_types_feature', function () {

        var sort_Type = $('#sort_types_feature').val();
        //alert(sort_Type);

        window.location.href = baseurl + 'Vehicle/sorting_featured/'+ sort_Type;


    });

    $('.custom-select-box').on('change', '#sort_types_feature_grid', function () {

        var sort_Type = $('#sort_types_feature').val();
        //alert(sort_Type);

        window.location.href = baseurl + 'Vehicle/sorting_featured_grid/'+ sort_Type;


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



    $('.input-type').on('change', '#pro_property_condition', function () {

        var condi = $('#pro_property_condition').val();

        if(condi == "used"){
            $('#regi_no_div').show();
            $('#show_in_ad_regno_div').show();
        }else{
            $('#regi_no_div').hide();
            $('#show_in_ad_regno_div').hide();
        }

    });





    $('.form-group').on('change', '#pro_brand', function () {

        var pro_brand = $('#pro_brand').val();

        $('#pro_model').empty();
        $.ajax({
            url: baseurl + 'Property/models_by_brands/' + pro_brand,
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

    $('.input-type').on('change', '#pro_brand', function () {

        var brand = $('#pro_brand').val();


        $('#pro_model').empty();
        $.ajax({
            url: baseurl + 'property/sub_model_by_brand/' + brand,
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


    var brand = $('#pro_brand').val();



    // $('#pro_model').empty();
    $.ajax({
        url: baseurl + 'property/sub_model_by_brand/' + brand,
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

    $('.input-type').on('change', '#pro_body_type', function () {

        var body_type = $('#pro_body_type').val();


        $('#pro_sub_body_type').empty();
        $.ajax({
            url: baseurl + 'vehicle/sub_body_types_by_id/' + body_type,
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

