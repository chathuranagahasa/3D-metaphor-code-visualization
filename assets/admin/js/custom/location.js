$(document).ready(function() {

    $(document).on('click','#btn_add',function(){
        $('#dealer_id').val();
        $('#dealer_name').val();
        $('#address_lineone').val();
        $('#address_linetwo').val();
        $('#district').val();
        $('#contact_no').val();
        $('#delear_cat').val();
        $('#delear_type').val();
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
        }else if($('#loc_latitude').val() === ""){
            alert("Field cannot be empty.");
            return false;
        }else if($('#loc_longitude').val() === ""){
            alert("Field cannot be empty.");
            return false;
        }

        else if($("[name='delear_cat[]']:checked").length === 0 ){
            $('.error_msg_cat').html("Dealer Category cannot be empty.");
            return false;
        }

        else if($("[name='delear_type[]']:checked").length === 0){
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


});