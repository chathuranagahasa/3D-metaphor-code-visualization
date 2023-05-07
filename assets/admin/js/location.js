
$(document).ready(function() {

    $(document).on('click','#upload_dealer_images',function(){
        $.ajax({
            url : '/list.php/UserController/uploadDealerImages',
            dataType : 'json',
            type:'POST',
            data:$('#dealerfile').val(),
            success : function(data){
                alert($('#dealerfile').val());
            },
            error : function(error){
                console.log(error);
            }
        });
    });

    $(document).on('click','#subDeleteLocation',function(){
        var status = confirm("Are you sure You want to Delete this Dealer? ");
        if(status == true){
            $.ajax({
                url:'<?php echo base_url() ?>list.php/UserController/deleteLocation',
                type:'POST',
                dataType:'json',
                data: $("#dealer_id").val(),
                success : function(data){
                        alert("Record delete successfully.");
                }, error :function(){
                    alert("Record not found");
                }
            });
        }else{
            return false;
        }
    });

    //$(document).on('click','#upload_images', function(){
    //    $.ajax({
    //        url:'<?php echo base_url() ?>list.php/Product/uploadImages',
    //        dataType:'json',
    //        success : function(data){
    //            alert("Image Upload successfully.");
    //        }, error :function(){
    //            alert("Record not found");
    //        }
    //    });
    //});

    $(document).on('click','#sub_location',function(){

        $('#dealer_id').val();
        $('#dealer_name').val();
        $('#address_lineone').val();
        $('#address_linetwo').val();
        $('#district').val();
        $('#contact_no').val();
        $('#dealer_cat').val();
        $('#dealer_type').val();
        $('#loc_latitude').val();
        $('#loc_longitude').val();

        if($('#dealer_id').val() === ""){
            alert("Field cannot be empty.");
            return false;
        }else if($('#dealer_name').val() === "" ){
            alert("Field cannot be empty.");
            return false;
        }else if($('#address_lineone').val() === "" ){
            alert("Field cannot be empty.");
            return false;
        }else if($('#address_linetwo').val() === "" ){
            alert("Field cannot be empty.");
            return false;
        }else if($('#district').val() === "" ){
            alert("Field cannot be empty.");
            return false;
        }else if($('#contact_no').val() === "" ){
            alert("Field cannot be empty.");
            return false;
        }

        else if($("[name='dealer_cat[]']:checked").length === 0 ){
            $('.error_msg_cat').html("Dealer Category cannot be empty.");
            return false;
        }

        else if($("[name='dealer_type[]']:checked").length === 0){
            $('.error_msg_type').html("Dealer Type cannot be empty.");
            return false;
        }
    });

    $('#dealer_id').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    $('#loc_latitude').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    $('#loc_longitude').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    $('#contact_no').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    $('#dealer_name').keyup(function() {
        if (this.value.match(/[^a-zA-Z0-9 ]/g)) {
            this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
        }
    });

    $('#district').keyup(function() {
        if (this.value.match(/[^a-zA-Z0-9 ]/g)) {
            this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
        }
    });


    $('#mc_price').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    $('#th_price').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    $('#fuel_tank_liters').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    $('#die_width').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    $('#die_height').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    $('#weight_kerb').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    $('#eng_tank_capacity').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    $('#die_length').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    $('#weight_grossweight').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });



});
