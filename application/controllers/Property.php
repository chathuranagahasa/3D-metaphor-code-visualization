<?php
/**
 * Created by PhpStorm.
 * User: ChathurangaH
 * Date: 3/3/18
 * Time: 10:43 PM
 */

include('FileUploader.php');
class Property extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('UserModel');
        $this->load->model('PropertyModel');
        $this->load->helper('text');
        $this->load->library('form_validation');

//        header("Cache-Control: no cache");
//        session_cache_limiter("private_no_expire");

//        $current_date = date('Y-m-d H:i');
//        $this->PropertyModel->checkExpireAds($current_date);

        $maxPropertyId = $this->PropertyModel->getMaxPropertyId();
        if($maxPropertyId == null){
            $maxPropertyId = 0;
        }
//        if(empty($this->session->userdata("property_search"))) {
//            redirect('home','refresh');
//        }

//
    }

    function index(){
        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }
        $data['main_content'] = 'user/property_add';
        $data['main_properties'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['countries'] = $this->UserModel->locationDropList();
        $this->load->view('includes/template', $data);
    }

    function wanted(){
        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }
        $data['main_content'] = 'user/property_wanted';
        $data['main_properties'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['countries'] = $this->UserModel->locationDropList();
        $this->load->view('includes/template', $data);
    }


    function models_by_brands($brandId){
        $subproperties = $this->PropertyModel->getModelsByBrandId($brandId);
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($subproperties));
    }

    function sub_property($proId){
            $subproperties = $this->PropertyModel->getSubPropertiesByProId($proId);
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($subproperties));
    }

    function city($districtId){
        $cities = $this->PropertyModel->getCitiesByDistrictId($districtId);
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($cities));
    }

    function getFeaturesByPropertyType($main_property_id){
        header('Content-type: application/json');
        echo json_encode($this->PropertyModel->getFeaturesByPropertyTypeId($main_property_id));
    }

    function getFeaturesByPropertyTypeEdit($featureId,$propertyId){
        $result = $this->PropertyModel->getFeaturesByPropertyTypeId($featureId);

        for ($i=0; $i < count($result); $i ++){
            $result2 = $this->PropertyModel->getPropertyAddFeaturesByNativeId($result[$i]->id);
            if(count($result2) != 0){
                for ($j=0; $j < count($result2); $j ++){
                    $result[$i]->value = 1;
                }
            }

            //echo $result2[$i]->name;
            //$result->value = $result2[$i]->native_id;
        }

        header('Content-type: application/json');
        echo json_encode($result);
    }

    public function getKeyInfoByPropertyTypeId($proTypeId){
        $this->load->model('PropertyModel');
        header('Content-type: application/json');
        echo json_encode($this->PropertyModel->getKeyInfoDetailsByPropertyTypeId($proTypeId));
    }

    function getKeyInfoByPropertyTypeEdit($proTypeId, $propertyId){

//        for ($i=0; $i < count($result); $i ++){
//            if($proTypeId == $result[$i]->main_pro_id){
            $result2 = $this->PropertyModel->getPropertyAddKeyInfoByKeyInfoId($propertyId,$proTypeId);
            //var_dump($result2);

        header('Content-type: application/json');
        echo json_encode($result2);
    }




    public function uploadPropertyImages(){
        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }
        $FileUploader = new FileUploader('pro_images', array(
            'uploadDir' => 'assets/uploads/',
            'title' => 'name',
            'fileMaxSize' => '1MB',
            'limit' => 2,
        ));

        $maxPropertyId = $this->PropertyModel->getMaxPropertyId();
        if($maxPropertyId == null){
            $maxPropertyId = 0;
        }

        $maxPropertyId = $maxPropertyId + 1;

        // call to upload the files
        $data = $FileUploader->upload();

        if($data['isSuccess']) {
            // get the uploaded files
            $files = $data['files'];
        }
        if($data['hasWarnings']) {
            // get the warnings
            $warnings = $data['warnings'];
        };
        if($data['files'] != null) {
            // get the uploaded files
            $this->PropertyModel->storePropertyImages($maxPropertyId,$this->input->post('user_id'), $data['files'][0]['name']);
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));

    }

    public function uploadPropertyImagesEdit(){
        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }
        $FileUploader = new FileUploader('pro_images_edit', array(
            'uploadDir' => 'assets/uploads/',
            'title' => 'name',
            'fileMaxSize' => '1MB',
            'limit' => 2,
        ));

        $maxPropertyId = $this->PropertyModel->getMaxPropertyId();
        if($maxPropertyId == null){
            $maxPropertyId = 0;
        }

        // call to upload the files
        $data = $FileUploader->upload();

        if($data['isSuccess']) {
            // get the uploaded files
            $files = $data['files'];
        }
        if($data['hasWarnings']) {
            // get the warnings
            $warnings = $data['warnings'];
        };
        if($data['files'] != null) {
            // get the uploaded files
            $this->PropertyModel->storePropertyImages($this->input->post('property_id'),$this->input->post('user_id'), $data['files'][0]['name']);
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));

    }

    public function store_property_wanted(){
        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }

        $userId = $this->input->post('user_id');

        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+3 months");
        $expire_date =  $date->format("Y-m-d H:i:s");

        $arrayProperty = array(
            'main_type' => $this->input->post('pro_property_type'),
            'sub_type' => $this->input->post('pro_property_sub_type'),
            'title' => $this->input->post('property_title'),
            'description' => $this->input->post('textarea-desc-property'),
            'contact_name' => $this->input->post('pro_contact_name'),
            'contact_email' => $this->input->post('pro_contact_email'),
            'phone_mobile' => $this->input->post('pro_contact_phone'),
            'phone_home' => $this->input->post('pro_contact_home'),
            'posted_date' => date('Y-m-d H:i:s'),
            'expire_date' => $expire_date,
            'user_id' => $userId
        );

        //var_dump($arrayProperty);

        $saveAll = $this->PropertyModel->storeWantedProperty($arrayProperty);
        if($saveAll){
            $this->sendEmailForPostAdWanted($this->input->post('pro_contact_email'), $this->input->post('pro_contact_name'),$userId,$arrayProperty);
            $this->session->set_flashdata('message_suc_property', 'Your property (wanted) Added Successfully.');
            redirect('user/properties_wanted/'.$userId);
        }

    }

    public function store_property(){

        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }
        $userId = $this->input->post('user_id');
        $maxPropertyId = $this->PropertyModel->getMaxPropertyId();
        if($maxPropertyId == null){
            $maxPropertyId = 0;
        }
//
        $maxPropertyId = $maxPropertyId + 1;
//
        $result = $this->PropertyModel->getPropertyImagesByPropertyId($maxPropertyId);
        if(count($result) == 0){
                $this->session->set_flashdata('message_error_property', 'Apply your property images.');
                redirect('property');

        }
//
        $propertyTypeId = $this->input->post('pro_property_type');
        $propertykeyinfo_list = $this->input->post('keyinfo_list');
        $propertyfeatures_list = $this->input->post('feature_list');

        $propertykeyinfo_id_list = $this->input->post('keyinfo_id_list');


        for ($i=0; $i < count($propertykeyinfo_list); $i ++ ){
            //if($propertykeyinfo_list[$i] != "") {
                $keyInfoName = $this->PropertyModel->getFeyInfoNameById($propertykeyinfo_id_list[$i], $propertyTypeId);
                //var_dump($keyInfoName);

                $arrayKeyInfo = array(
                    'property_id' => $maxPropertyId,
                    'main_cat_id' => $propertyTypeId,
                    'key_info_id' => $propertykeyinfo_id_list[$i],
                    'key_info_name' => (count($keyInfoName) != 0) ? $keyInfoName[0]->name : null,
                    'value' => $propertykeyinfo_list[$i],
                    'user_id' => $userId
                );


               // var_dump($arrayKeyInfo);
            $save = $this->PropertyModel->storePorpertyKeyInfo($arrayKeyInfo);
           // }
        }
//
//
        for ($j=0; $j < count($propertyfeatures_list); $j ++ ){
            $featureName = $this->PropertyModel->getFeatureNameById($propertyfeatures_list[$j]);

            $arrayFeatures = array(
                'property_id' => $maxPropertyId,
                'main_pro_id' => $this->input->post('pro_property_type'),
                'feature_id' => $j+1,
                'native_id' => $featureName[0]->id,
                'name' => $featureName[0]->name,
                'user_id' => $userId
            );

            //var_dump($arrayFeatures);

            $saveFea = $this->PropertyModel->storePropertyFeatures($arrayFeatures);
        }

        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+3 months");
        $expire_date =  $date->format("Y-m-d H:i:s");


        $arrayProperty = array(
            'property_id' => $maxPropertyId,
            'offer_type' => $this->input->post('pro_offer_type'),
            'main_type' => $this->input->post('pro_property_type'),
            'subtype' => $this->input->post('pro_property_sub_type'),
            'title' => $this->input->post('property_title'),
            'pro_desc' => $this->input->post('textarea-desc-property'),
            'price_type' => $this->input->post('pro_price_type'),
            'price ' => $this->input->post('pro_price'),
            'available_from' => $this->input->post('pro_available_from'),
            'pro_video_url' => $this->input->post('pro_video_url'),
            'district' => $this->input->post('pro_district'),
            'city' => $this->input->post('pro_city'),
            'loc_lat' => $this->input->post('lat'),
            'loc_lng' => $this->input->post('lng'),
            'contact_address' => $this->input->post('pro_address'),
            'contact_name' => $this->input->post('pro_contact_name'),
            'contact_email' => $this->input->post('pro_contact_email'),
            'phone_mobile' => $this->input->post('pro_contact_phone'),
            'phone_home' => $this->input->post('pro_contact_home'),
            'posted_date' => date('Y-m-d H:i:s'),
            'expire_date' => $expire_date,
            'user_id' => $this->input->post('user_id'),
            'show_in_ad_regno' => $this->input->post('show_in_ad_regno'),
            'pro_regi_no' => $this->input->post('pro_regi_no'),
            'seat_count' => $this->input->post('property_seat_count'),
        );

        //var_dump($arrayProperty);

        $saveAll = $this->PropertyModel->storeProperty($arrayProperty);
        if($saveAll){
            $this->sendEmailForPostAd($this->input->post('pro_contact_email'), $this->input->post('pro_contact_name'),$userId, $maxPropertyId);
            $this->session->set_flashdata('message_suc_property', 'Your property Added Successfully.');
            redirect('user/properties/'.$userId);
        }
    }

    function sendEmailForPostAd($cus_email, $cus_name,$userId,$propertyId){


        $this->load->helper('path');
        $this->load->library('email');

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'ceylonautotrade@gmail.com';
        $config['smtp_pass'] = 'autotrade1987';
        $config['charset'] = 'iso-8859-1'; # Added
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config); # Added


        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");

        $this->email->from('ceylonautotrade@gmail.com', 'Ceylon Auto Trade');
        $subject = "Thank you  for choosing  Ceylon Auto Trade";

        $propertyDetails = $this->PropertyModel->getPropertyDetailsByPropertyId($propertyId);
        $propertyImages = $this->PropertyModel->getPropertyImagesByPropertyId($propertyId);

        $data = array(
            'email' => $cus_email,
            'name' => $cus_name,
            'userId' => $userId,
            'property' => $propertyDetails,
            'property_images' => $propertyImages
        );

        $this->email->to($cus_email);
        $this->email->subject($subject);

        $body = $this->load->view('email/email_post_ad',$data,TRUE);

        $this->email->message($body);
//$send = $this->email->send();
        if($this->email->send()){
//Success email Sent
//echo $this->email->print_debugger();
        }else{
//Email Failed To Send
//echo $this->email->print_debugger();
        }

    }

    function sendEmailForPostAdWanted($cus_email, $cus_name,$userId,$propertyArray){


        $this->load->helper('path');
        $this->load->library('email');

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'chathurangahas87@gmail.com';
        $config['smtp_pass'] = 'beenu1988';
        $config['charset'] = 'iso-8859-1'; # Added
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config); # Added


        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");

        $this->email->from('info@lankaresidence.com', 'Lanka Residence');
        $subject = "Thank you  for choosing  Lanka Residence";


        $data = array(
            'email' => $cus_email,
            'name' => $cus_name,
            'userId' => $userId,
            'property' => $propertyArray,
        );

        $this->email->to($cus_email);
        $this->email->subject($subject);

        $body = $this->load->view('email/email_post_ad_wanted',$data,TRUE);

        $this->email->message($body);
//$send = $this->email->send();
        if($this->email->send()){
//Success email Sent
//echo $this->email->print_debugger();
        }else{
//Email Failed To Send
//echo $this->email->print_debugger();
        }

    }


    public function update_property_wanted(){
        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }

        $userId = $this->input->post('user_id');
        $propertyId = $this->input->post('property_id');

        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+3 months");
        $expire_date =  $date->format("Y-m-d H:i:s");

        $arrayProperty = array(
            'main_type' => $this->input->post('pro_property_type'),
            'sub_type' => $this->input->post('pro_property_sub_type'),
            'title' => $this->input->post('property_title'),
            'description' => $this->input->post('textarea-desc-property'),
            'contact_name' => $this->input->post('pro_contact_name'),
            'contact_email' => $this->input->post('pro_contact_email'),
            'phone_mobile' => $this->input->post('pro_contact_phone'),
            'phone_home' => $this->input->post('pro_contact_home'),
            'posted_date' => date('Y-m-d H:i:s'),
            'expire_date' => $expire_date,
            'user_id' => $userId
        );

        //var_dump($arrayProperty);

        $saveAll = $this->PropertyModel->updateWantedProperty($arrayProperty, $propertyId);
        if($saveAll){
            //$this->sendEmailForPostAdWanted($this->input->post('pro_contact_email'), $this->input->post('pro_contact_name'),$userId);
            $this->session->set_flashdata('message_suc_property', 'Your property (wanted) Updated Successfully.');
            redirect('user/properties_wanted/'.$userId);
        }

    }


    public function update_property(){

        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }
        $userId = $this->input->post('user_id');
//        $maxPropertyId = $this->PropertyModel->getMaxPropertyId();
//        if($maxPropertyId == null){
//            $maxPropertyId = 0;
//        }
//
        $maxPropertyId = $this->input->post('property_id');
        $this->PropertyModel->deleteExistingPropertyKeyInfo($maxPropertyId);
        $this->PropertyModel->deleteExistingPropertyFeatures($maxPropertyId);
//
        $result = $this->PropertyModel->getPropertyImagesByPropertyId($maxPropertyId);
        if(count($result) == 0){
            $this->session->set_flashdata('message_error_property', 'Apply your property images.');
            redirect('property');

        }
//
        $propertyTypeId = $this->input->post('pro_property_type');
        $propertykeyinfo_list = $this->input->post('keyinfo_list');
        // var_dump($propertykeyinfo_list);
        $propertyfeatures_list = $this->input->post('feature_list');
        $propertykeyinfo_id_list = $this->input->post('keyinfo_id_list');




        for ($i=0; $i < count($propertykeyinfo_list); $i ++ ){
            //if($propertykeyinfo_list[$i] != "") {
            $keyInfoName = $this->PropertyModel->getFeyInfoNameById($propertykeyinfo_id_list[$i], $propertyTypeId);
            $arrayKeyInfo = array(
                'property_id' => $maxPropertyId,
                'main_cat_id' => $propertyTypeId,
                'key_info_id' => $propertykeyinfo_id_list[$i],
                'key_info_name' => (count($keyInfoName) != 0) ? $keyInfoName[0]->name : null,
                'value' => $propertykeyinfo_list[$i],
                'user_id' => $userId
            );

            //var_dump($arrayKeyInfo);

            $save = $this->PropertyModel->updatePorpertyKeyInfo($arrayKeyInfo);
            //}
        }


        for ($j=0; $j < count($propertyfeatures_list); $j ++ ){
            $featureName = $this->PropertyModel->getFeatureNameById($propertyfeatures_list[$j]);

            $arrayFeatures = array(
                'main_pro_id' => $this->input->post('pro_property_type'),
                'feature_id' => $j+1,
                'native_id' => $featureName[0]->id,
                'name' => $featureName[0]->name,
                'user_id' => $userId
            );


            $saveFea = $this->PropertyModel->updatePropertyFeatures($arrayFeatures, $maxPropertyId);
        }

        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+3 months");
        $expire_date =  $date->format("Y-m-d H:i:s");


        $arrayProperty = array(
            'offer_type' => $this->input->post('pro_offer_type'),
            'main_type' => $this->input->post('pro_property_type'),
            'subtype' => $this->input->post('selected_sub_type'),
            'title' => $this->input->post('property_title'),
            'pro_desc' => $this->input->post('textarea-desc-property'),
            'price_type' => $this->input->post('pro_price_type'),
            'price ' => $this->input->post('pro_price'),
            'available_from' => $this->input->post('pro_available_from'),
            'pro_video_url' => $this->input->post('pro_video_url'),
            'district' => $this->input->post('pro_district'),
            'city' => $this->input->post('pro_city_edit'),
            'loc_lat' => $this->input->post('lat'),
            'loc_lng' => $this->input->post('lng'),
            'contact_address' => $this->input->post('pro_address'),
            'contact_name' => $this->input->post('pro_contact_name'),
            'contact_email' => $this->input->post('pro_contact_email'),
            'phone_mobile' => $this->input->post('pro_contact_phone'),
            'phone_home' => $this->input->post('pro_contact_home'),
            'user_id' => $this->input->post('user_id'),
            'show_in_ad_regno' => $this->input->post('show_in_ad_regno'),
            'pro_regi_no' => $this->input->post('pro_regi_no'),
            'seat_count' => $this->input->post('property_seat_count'),
        );

        //var_dump($arrayProperty);

        $saveAll = $this->PropertyModel->updateProperty($arrayProperty, $maxPropertyId);
        if($saveAll){
            $this->session->set_flashdata('message_suc_property', 'Your property updated Successfully.');
            redirect('user/properties/'.$userId);
        }
    }


    function view($propertyId,$title){
        $property = $this->PropertyModel->getPropertyDetailsByPropertyId($propertyId);
        var_dump($property);
        $data['property'] = $property;
        $arrayAdTrack = array(
            'ip_address' => $this->input->ip_address(),
            'property_id' => $property[0]->property_id,
            'viewed_date' => date('Y-m-d H:i:s'),
            'type_id' => (count($property) != 0) ? $property[0]->body_type : null,
            'posted_date' => (count($property) != 0) ? $property[0]->posted_date : null,
            'category_id' => (count($property) != 0) ? $property[0]->model : null,
            'user_id' => (count($property) != 0) ? $property[0]->user_id : null,
            'brand' => (count($property) != 0) ? $property[0]->brand : null
        );

        $result = $this->PropertyModel->saveAdClickDetails($arrayAdTrack);

//        $data['main_content'] = 'user/property_view';
//        $this->load->view('includes/template', $data);
    }

    function edit($propertyId){
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['countries'] = $this->UserModel->locationDropList();
        $data['main_properties'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['property'] = $this->PropertyModel->getPropertyDetailsByPropertyId($propertyId);

        $data['main_content'] = 'user/property_edit';
        $this->load->view('includes/template', $data);
    }

    function wanted_edit($propertyId){
        $data['main_properties'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['property'] = $this->PropertyModel->getWantedPropertyDetailsByPropertyId($propertyId);

        $data['main_content'] = 'user/property_wanted_edit';
        $this->load->view('includes/template', $data);
    }


    function wanted_delete($propertyId){
        $data['main_properties'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['property'] = $this->PropertyModel->getWantedPropertyDetailsByPropertyId($propertyId);

        $data['main_content'] = 'user/property_wanted_delete';
        $this->load->view('includes/template', $data);
    }

    function delete_property_wanted(){
        $propertyId = $this->input->post('property_id');
        $userId = $this->input->post('user_id');
        $delete= $this->PropertyModel->deleteWantedProperty($propertyId);
        if($delete){
            $this->session->set_flashdata('message_delete_property', 'Property (wanted) deleted Successfully.');
            redirect('user/properties_wanted/'.$userId);
        }
    }

    function sub_model_by_brand($brandId){
        $carsale = $this->PropertyModel->getModelsListByBrand($brandId);
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($carsale));
    }

    function removePropertyImage($imageId,$propertyId){
        $result = $this->PropertyModel->deletePropertyImagesRecord($imageId);
        if (isset($_POST['pro_images'])) {
            $file = 'assets/uploads/' . $_POST['pro_images'];

            //var_dump($file);

            if (file_exists($file))
                unlink($file);
        }

        return redirect('property/edit/'.$propertyId);
    }

//    public function search(){
//        $data['main_content'] = 'user/search_result';
//        $this->load->view('includes/template', $data);
//    }

    function search(){
        $property_type = $this->input->post('property_type');
        $property_status = $this->input->post('property_status');
        $property_loc = $this->input->post('property_location');
        $data['property_type'] = $property_type;
        $data['status'] = $property_status;
        $data['location'] = $property_loc;

        $sess_array = array(
            'pro_type' => $property_type,
            'status' => $property_status,
            'location' => $property_loc
        );
        $this->session->set_userdata('property_search',$sess_array);

        $result = $this->PropertyModel->getSearchResult($property_type,$property_status,$property_loc);
        //var_dump($result);
        $data['property_types'] = $this->PropertyModel->getPropertyTypes();
        $data['latest_properties'] = $this->PropertyModel->getLatestProperties();
        $data['cities'] = $this->PropertyModel->getCities();
        $data['search_results'] = $result;
        $data['main_content'] = 'user/search_result';
        $this->load->view('includes/template', $data);

    }

    function search_grid($property_type="",$property_status="",$property_loc=""){
        $data['property_type'] = $property_type;
        $data['status'] = $property_status;
        $data['location'] = $property_loc;

        $result = $this->PropertyModel->getSearchResult($property_type,$property_status,$property_loc);
        //var_dump($result);
        $data['property_types'] = $this->PropertyModel->getPropertyTypes();
        $data['latest_properties'] = $this->PropertyModel->getLatestProperties();
        $data['cities'] = $this->PropertyModel->getCities();
        $data['search_results'] = $result;
        $data['main_content'] = 'user/search_result_grid';
        $this->load->view('includes/template', $data);

    }


    function delete($propertyId){
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['countries'] = $this->UserModel->locationDropList();
        $data['main_properties'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['property'] = $this->PropertyModel->getPropertyDetailsByPropertyId($propertyId);
        $data['main_content'] = 'user/property_delete';
        $this->load->view('includes/template', $data);
    }

    function property_delete(){
        $propertyId = $this->input->post('property_id');
        $userId = $this->input->post('user_id');
        $delete= $this->PropertyModel->deleteProperty($propertyId);
        $deleteImages= $this->PropertyModel->deletePropertyImages($propertyId);
        $deleteFeatures = $this->PropertyModel->deleteExistingPropertyFeatures($propertyId);
        $deleteKeyinfo = $this->PropertyModel->deleteExistingPropertyKeyInfo($propertyId);
        $deleteFeatued = $this->PropertyModel->deleteFeaturedPropertyDetails($propertyId);
        if($delete && $deleteImages && $deleteFeatures && $deleteKeyinfo){
            $this->session->set_flashdata('message_delete_property', 'Property deleted Successfully.');
            redirect('user/properties/'.$userId);
        }
    }

    function submit_message_advetiser(){
        $arrayProperty = array(
            'name' => $this->input->post('pro_name'),
            'email' => $this->input->post('pro_emails'),
            'phone' => $this->input->post('pro_phone'),
            'message' => $this->input->post('write_message'),
            'title' => $this->input->post('title_pro'),
            'property_id' => $this->input->post('id_pro'),
        );

        $cus_email = $this->input->post('email_pro');
        $cus_name = $this->input->post('name_property_owner');

            $this->sendEmailForAdvertiser($arrayProperty,$cus_email, $cus_name);
            $this->session->set_flashdata('message_suc_advertiser', 'Your message submitted to advertiser Successfully.');
            redirect('property/view/'.$arrayProperty['property_id'].'/'.str_replace(' ', '_', $arrayProperty['title']));

    }

    function sendEmailForAdvertiser($arrayProperty, $cus_email,$cus_name){


        $this->load->helper('path');
        $this->load->library('email');

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'chathurangahas87@gmail.com';
        $config['smtp_pass'] = 'beenu1988';
        $config['charset'] = 'iso-8859-1'; # Added
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config); # Added


        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");

        $this->email->from('info@lankaresidence.com', 'Lanka Residence');
        $subject = "Response to your Advertisement  - LankaResidence.Com";


        $data = array(
            'email' => $arrayProperty['email'],
            'name' => $arrayProperty['name'],
            'phone' => $arrayProperty['phone'],
            'title' => $arrayProperty['title'],
            'message' => $arrayProperty['message'],
            'owner_name' => $cus_name
        );

        $this->email->to($cus_email);
        $this->email->subject($subject);

        $body = $this->load->view('email/email_post_ad_advertiser',$data,TRUE);

        $this->email->message($body);
//$send = $this->email->send();
        if($this->email->send()){
//Success email Sent
//echo $this->email->print_debugger();
        }else{
//Email Failed To Send
//echo $this->email->print_debugger();
        }

    }



}