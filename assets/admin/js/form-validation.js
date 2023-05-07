jQuery(document).ready(function($) {
    var baseurl = $('body').data('baseurl');


    $('#create_bus').validate({
        rules: {
            bus_no: {
                required: true
            },
            bus_company:{
                selectcheck: true
            },
            depart_time: {
                required: true
            },
            arrival_time: {
                required: true
            },
            bus_picture:{
                required:true
            },
            no_of_busses:{
                required:true
            },
            no_of_seats:{
                required:true
            },
            route_no:{
                required:true
            },
            contact_person:{
                required:true
            },
            contact_no:{
                required:true
            },
            bus_features:{
                required:true
            },
            from_where:{
                selectcheck: true
            },
            to_where:{
                selectcheck: true
            },
            bus_category:{
                selectcheck: true
            },
            start_location:{
                selectcheck: true
            },
            start_location_to:{
                selectcheck: true
            }
        },
        messages: {
            'subjects[]': {
                required: "You must check at least 1 box",
                maxlength: "Check no more than {0} boxes"
            }
        }
    });

    $('#create_location').validate({
        rules: {
            from_where: {
                selectcheck: true
            },
            to_where: {
                selectcheck: true
            },
            pick_where: {
                selectcheck: true
            },
            drop_where: {
                selectcheck: true
            },
            time_duration: {
                required: true
            }
        }
    });

    $('#create_teacher').validate({
        rules: {
            teacher_name: {
                required: true
            },
            teacher_nic:{
               required: true
            },
            teacher_subject: {
                selectcheck: true
            },
            teacher_phone: {
                required: true
            },
            teacher_address:{
                required:true
            },
        },
        messages: {
            'subjects[]': {
                required: "You must check at least 1 box",
                maxlength: "Check no more than {0} boxes"
            }
        }
    });

    $('#create_subject').validate({
        rules: {
            select_examtype: {
                selectcheck: true
            },
            select_substream: {
                selectcheck: true
            },
            subject_name: {
                required: true
            }
        },
        messages: {
            'select_examtype': {
                selectcheck: "Please Select Grade",
            },
            'select_substream': {
                selectcheck: "Please Enter subject stream",
            },'subject_name': {
                required: "Please Enter Subject Name",
            }
        }
    });


    $('#create_lesson').validate({
        rules: {
            select_course_type_create_lesson: {
                selectcheck: true, placeholder: true
            },
            select_subject: {
                selectcheck: true, placeholder: true
            },
            lesson_name: {
                required: true
            }
        },
        messages: {
            'select_course_type_create_lesson': {
                selectcheck: "Please Select Grade"
            },
            'select_subject': {
                selectcheck: "Please Select Subject"
            },'lesson_name': {
                required: "Please Enter Lesson Name"
            }
        }
    });


    $('#upload_student').validate({
        rules: {
            select_teacher_create_session: {
                selectcheck: true, placeholder: true
            },
            select_subject_session: {
                selectcheck: true, placeholder: true
            },
            file: {
                required: true
            }
        },
        messages: {
            'select_course_type_create_lesson': {
                selectcheck: "Please Select Grade"
            },
            'select_subject': {
                selectcheck: "Please Select Subject"
            },'lesson_name': {
                required: "Please Enter Lesson Name"
            }
        }
    });

    $('#update_student').validate({
        rules: {
            select_teacher_for_student_class:{
                selectcheck : true, placeholder: true
            },
            stu_name: {
                required: true
            },
            select_course_type:{
                selectcheck : true
            },
            select_session:{
                selectcheck : true
            },
            'subject_in_class[]': {
                required: true,
                // maxlength:2
            },
            stu_school: {
                required: true
            },
            stu_gender: {
                selectcheck:true, placeholder: true
            },
            stu_address:{
                required:true
            },
            parent_name: {
                required: true
            },
            parent_guardian:{
                selectcheck : true
            },
            parent_phone:{
                required : true
            },
            stu_join_date:{
                required : true
            }
        },
        messages: {
            'subjects[]': {
                required: "You must check at least 1 box",
                maxlength: "Check no more than {0} boxes"
            }
        }
    });


    $('#createUser').validate({
        rules: {
            user_fname: {
                required: true
            },
            user_lname:{
                required: true
            },
            user_nic:{
                required: true
            },
            user_role: {
                selectcheck:true
            },
            user_phone: {
                required:true,
                phoneUS : true
            },
            user_email:{
                required:true,
                email: true
            },
            user_password: {
                required: true
            },
            user_status: {
                selectcheck:true
            }
        }
    });

    $('#createCompany').validate({
        rules: {
            company_name: {
                required: true
            },
            // emp_bplocation: {
            //     selectcheck:true
            // },
            // company_description:{
            //     required: true
            // },
            // company_address:{
            //     required: true
            // },
            //
            company_contactno: {
                phoneUS : true
            },
            // company_email:{
            //     required:true,
            //     email: true
            // },
            // company_logo: {
            //     required: true
            // },
            // company_banner: {
            //     required: true
            // }
        }
    });

    $('#editCompany').validate({
        rules: {
            company_name: {
                required: true
            },
            // emp_bplocation: {
            //     selectcheck:true
            // },
            // company_description:{
            //     required: true
            // },
            // company_address:{
            //     required: true
            // },

            company_contactno: {
                phoneUS : true
            },
            company_email:{
                email: true
            },
        }
    });

    $('#createCategory').validate({
        rules: {
            category_name: {
                required: true
            },
            // category_description: {
            //     required: true
            // },
            // parent_category:{
            //     selectcheck : true
            // },
            // user_status: {
            //     selectcheck : true
            // },
        }
    });


    $('#create_session').validate({
        rules: {
            select_teacher_create_session:{
                selectcheck : true
            },
            select_subject:{
                selectcheck : true
            },
            select_type:{required: true, placeholder: true},
            select_year:{
                selectcheck : true
            },
            select_day:{
                selectcheck : true
            },
            select_district:{
                selectcheck : true
            },
            start_time:{
                required : true, placeholder: true
            },
            end_time:{
                required : true, placeholder: true
            },
            select_course_type_session_create:{
                selectcheck : true
            },
            fee_amount:{
                required: true
            }
        }
    });

    $('#create_hall').validate({
        rules: {
            hall_no: {
                required: true
            },
            hall_capacity: {
                required: true
            }
        }
    });

    $('#create_payment').validate({
        rules: {
            select_student_id_for_payment: {
                selectcheck: true
            },
            select_class:{
                selectcheck: true
            }
        }


    });

    $('#create_paper').validate({
        rules: {
            select_lesson: {
                selectcheck: true
            },
            paper_name:{
                required: true
            },
            select_paper_type:{
                selectcheck: true
            }
        }


    });

    $('#add_marks_paper').validate({
        rules: {
            class_date_add_marks_papers: {
                required: true
            }
        }


    });

    $('#upload_student').validate({
        rules: {
            file: {
                required: true
            }
        }
    });

    $('#select_class_add_marks').validate({
        rules: {
            select_teacher_stu_marks: {
                selectcheck: true
            },
            select_session_stu_marks:{
                selectcheck: true
            },
            filter_class_date:{
                required: true
            }
        }
    });
});

jQuery.validator.addMethod('selectcheck', function (value) {
    return (value != '0');
}, "This field is required.");

jQuery.validator.addMethod("placeholder", function(value, element) {
    return value!=$(element).attr("placeholder");
}, jQuery.validator.messages.required);


jQuery.validator.addMethod("phoneUS", function (phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/^\+[0-9]{11}$/);
}, "Please specify a valid phone number");