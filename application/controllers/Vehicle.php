<?php
/**
 * Created by PhpStorm.
 * User: ChathurangaH
 * Date: 3/3/18
 * Time: 10:43 PM
 */

include('FileUploader.php');
class Vehicle extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('UserModel');
        $this->load->model('PropertyModel');
        $this->load->model('UserModelAdmin');
        $this->load->helper('text');
        $this->load->library('form_validation');

        header('Cache-Control: max-age=900');
//        $current_date = date('Y-m-d H:i');
//        $this->PropertyModel->checkExpireAds($current_date);

        $maxPropertyId = $this->PropertyModel->getMaxPropertyId();
        if($maxPropertyId == null){
            $maxPropertyId = 0;
        }
    }

    function index(){
        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }


        $refId = $this->PropertyModel->getRefId();

        $str2 = substr($refId, 3);

        if($str2 == null){
            $str2 = 0;
        }


        $plusrefId = $str2 + 1;

        $newRefId = "BA" . sprintf("%04d", $plusrefId);

        $data['main_content'] = 'user/property_add';
        $data['car_sales'] =$this->PropertyModel->getCarSaleDropList(1);
        $data['features'] =$this->PropertyModel->getFeaturesByPropertyTypeId(1);
        $data['body_types'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['models'] = $this->PropertyModel->getModelsList();
        $data['top_models'] = $this->PropertyModel->getTopModelsList();
        $data['colors'] = $this->PropertyModel->getColorDropList();
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['countries'] = $this->UserModel->locationDropList();
        $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
        $data['trans_types'] = $this->PropertyModel->getTransmissionTypesForForm();
        $data['main_properties'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['ad_types'] = $this->PropertyModel->getPropertyAdCategories();
        $data['refid'] = $newRefId;
        $this->load->view('includes/template', $data);
    }


    function featured(){
        $this->load->library('pagination');
        //$property = $this->PropertyModel->getPropertiesByCategoryId($catId);

        //$related_properties = $this->PropertyModel->getAllProperties(); ;//$this->PropertyModel->getRelatedProperties($property[0]->offer_type, $property[0]->body_type, $property[0]->district);
        //$data['property'] = $property;

        //$data['related_properties'] = $related_properties;
        $data['main_content'] = 'user/property_featured';
        $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
        $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
        $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
        $data['models'] = $this->PropertyModel->getModelsForForm();
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
        $config['per_page'] = 12;
        $config['total_rows'] = $this->PropertyModel->get_properties_by_featured_pagination(0, 0);
        $config['base_url'] = base_url('vehicle/featured');
        $config['num_links'] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['all_properties'] = $this->PropertyModel->get_properties_by_featured_pagination($config['per_page'], $page);
        $data['latest_properties'] = $this->PropertyModel->getAllProperties();
        $this->load->view('includes/template', $data);
    }

    function featured_grid(){
        $this->load->library('pagination');
        //$property = $this->PropertyModel->getPropertiesByCategoryId($catId);

        //$related_properties = $this->PropertyModel->getAllProperties(); ;//$this->PropertyModel->getRelatedProperties($property[0]->offer_type, $property[0]->body_type, $property[0]->district);
        //$data['property'] = $property;
        $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
        $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
        $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
        $data['models'] = $this->PropertyModel->getModelsForForm();
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
        //$data['related_properties'] = $related_properties;
        $data['main_content'] = 'user/property_featured_grid';
        $config['per_page'] = 12;
        $config['total_rows'] = $this->PropertyModel->get_properties_by_featured_pagination(0, 0);
        $config['base_url'] = base_url('vehicle/featured_grid');
        $config['num_links'] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['all_properties'] = $this->PropertyModel->get_properties_by_featured_pagination($config['per_page'], $page);
        $data['latest_properties'] = $this->PropertyModel->getAllProperties();
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

    function sub_model($modelId){
        $submodels = $this->PropertyModel->getSubModelByModelId($modelId);
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($submodels));
    }

    function sub_body_types_by_id($bodytypeId){
        $submodels = $this->UserModelAdmin->getSubMenuItemsByParentId($bodytypeId);
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($submodels));
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
            'fileMaxSize' => '1000MB',
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
            'fileMaxSize' => '10MB',
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

    public function store_vehicle(){
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
//        $result = $this->PropertyModel->getPropertyImagesByPropertyId($maxPropertyId);
//        if(count($result) == 0){
//            $this->session->set_flashdata('message_error_property', 'Apply your property images.');
//            redirect('admin/create_property');
//        }



        $config['upload_path'] = 'assets/uploads';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';

        $this->load->library('upload', $config);

        $this->upload->do_upload('property_main_image');
        $data = array('upload_data' => $this->upload->data());
        $image_banner = $data['upload_data']['file_name'];
        if($image_banner != null){
            $image_banner = $data['upload_data']['file_name'];
        }

        $propertyfeatures_list = $this->input->post('feature_list');

        for ($j=0; $j < count($propertyfeatures_list); $j ++ ){
            //$featureName = $this->PropertyModel->getFeatureNameById($propertyfeatures_list[$j]);

            $resultAlreadyAdd = $this->PropertyModel->checkFeatureAlreadyAdd($maxPropertyId,$propertyfeatures_list[$j]);
            if(count($resultAlreadyAdd) == 0){
                $arrayFeatures = array(
                    'property_id' => $maxPropertyId,
                    'feature_id' => $propertyfeatures_list[$j],
                    'user_id' => $userId
                );

                //var_dump($arrayFeatures);

                $saveFea = $this->PropertyModel->storePropertyFeatures($arrayFeatures);
            }


        }

        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+3 months");
        $expire_date =  $date->format("Y-m-d H:i:s");

        $car_sale="";
        $car_brand="";
        $loc="";
        $model="";
        $car_sale_arr = $this->PropertyModel->getCompanyDetailsById($this->input->post('car_sale_select'));
        if(is_array($car_sale_arr) && count($car_sale_arr) != 0){
            $car_sale = $car_sale_arr[0]->name;
        }



        $car_brand_arr = $this->PropertyModel->getBrandNameById($this->input->post('pro_brand'));
        if(is_array($car_brand_arr) && count($car_brand_arr) != 0){
            $car_brand = $car_brand_arr[0]->name;
        }else{
            $modelTop = $this->PropertyModel->getTopBrandNameById($this->input->post('pro_brand'));
            $car_brand = (is_array($modelTop) && count($modelTop) != 0) ? $modelTop[0]->name : null;
        }



        $model_arr = $this->PropertyModel->getModelNameById($this->input->post('pro_model'));
        if(is_array($model_arr) && count($model_arr) != 0){
            $model = $model_arr[0]->name;
        }

        //var_dump($model_arr);

        $loc_arr = $this->PropertyModel->getDistrictNameById($this->input->post('pro_district'));
        if(is_array($loc_arr) && count($loc_arr) != 0){
            $loc = $loc_arr[0]->dname;
        }

        $search_text = $car_sale . " " . $car_brand . " " . $model . " " . $loc . " " . $this->input->post('pro_refid');
//        var_dump($search_text);
//        die();


        $arrayProperty = array(
            'property_id' => $maxPropertyId,
            'car_sale_id' => $this->input->post('car_sale_select'),
            'body_type' => $this->input->post('pro_body_type'),
            'sub_body_type' => $this->input->post('pro_sub_body_type'),
            'brand' => $this->input->post('pro_brand'),
            'model' => $this->input->post('pro_model'),
            'title' => $this->input->post('property_title'),
            'price_type' => $this->input->post('pro_price_type'),
            'price ' => $this->input->post('pro_price'),
//            'price_on_request' => $this->input->post('price_onrequest'),
            'price_negotiable' => $this->input->post('price_nagotiable'),
            'main_image' => $image_banner,
            //  'available_from' => $this->input->post('pro_available_from'),
//            'pro_video_url' => $this->input->post('pro_video_url'),
            'district' => $this->input->post('pro_district'),
            'city' => $this->input->post('pro_city'),
            'loc_lat' => $this->input->post('lat'),
            'loc_lng' => $this->input->post('lng'),
            'contact_name' => $this->input->post('pro_contact_name'),
            'contact_email' => $this->input->post('pro_contact_email'),
            'contact_mobile' => $this->input->post('pro_contact_phone'),
            'condition_type' => $this->input->post('pro_property_condition'),
            'transmission' => $this->input->post('pro_transmission_types'),
            'yom' => $this->input->post('property_year_manu'),
            'yor' => $this->input->post('property_regi_year'),
            'engine_size' => $this->input->post('property_engine_size'),
            'edition' => $this->input->post('pro_edition'),
            'mileage' => $this->input->post('property_mileage'),
            'door_count' => $this->input->post('property_door_count'),
            'pro_desc' => $this->input->post('textarea-desc-property'),
            'ad_type' => $this->input->post('pro_ad_type'),
            'fuel_type' => $this->input->post('pro_fuel_types'),
            'posted_date' => date('Y-m-d H:i:s'),
            'user_id' => $this->input->post('user_id'),
            'featured' => $this->input->post('feature_ad'),
            'color' => $this->input->post('property_color'),
            'interior_color' => $this->input->post('property_inte_color'),
            'show_in_ad_regno' => $this->input->post('show_in_ad_regno'),
            'pro_regi_no' => $this->input->post('pro_regi_no'),
            'seat_count' => $this->input->post('property_seat_count'),
            'ref_id' => $this->input->post('pro_refid'),
            'search_text' => $search_text
        );

        //var_dump($arrayProperty);

        $saveAll = $this->PropertyModel->storeProperty($arrayProperty);
        if($saveAll){
            //$this->session->set_flashdata('message_suc', 'Your vehicle Added Successfully.');
            redirect('vehicle/payment/'.$userId.'/'.$maxPropertyId);
        }
    }



    function sendEmailForPostAdWanted($cus_email, $cus_name,$userId,$propertyArray){


        $this->load->helper('path');
        $this->load->library('email');

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'ceylonautotrade@gmail.com';
        $config['smtp_pass'] = 'autotrade1987'; //beenu1988
        $config['charset'] = 'iso-8859-1'; # Added
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config); # Added


        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");

        $this->email->from('info@ceylonautotrade.com', 'Ceylon Auto Trade');
        $subject = "Thank you  for choosing  Ceylon Auto Trade";


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


    public function update_vehicle(){

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

//
        $propertyfeatures_list = $this->input->post('feature_list');

        if(count($propertyfeatures_list) > 0){
            $this->PropertyModel->deleteExistingPropertyFeatures($maxPropertyId);
        }


        for ($j=0; $j < count($propertyfeatures_list); $j ++ ){


            $resultAlreadyAdd = $this->PropertyModel->checkFeatureAlreadyAdd($maxPropertyId,$propertyfeatures_list[$j]);
            if(count($resultAlreadyAdd) == 0) {
                $arrayFeatures = array(
                    'property_id' => $maxPropertyId,
                    'feature_id' => $propertyfeatures_list[$j],
                    'user_id' => $userId
                );


                $saveFea = $this->PropertyModel->updatePropertyFeatures($arrayFeatures);
            }
        }

        $config['upload_path'] = 'assets/uploads';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';

        $this->load->library('upload', $config);

        $this->upload->do_upload('property_main_image');
        $data = array('upload_data' => $this->upload->data());
        $image_banner = $data['upload_data']['file_name'];
        if($image_banner != null){
            $image_banner = $data['upload_data']['file_name'];
        }

        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+3 months");
        $expire_date =  $date->format("Y-m-d H:i:s");


        $arrayProperty = array(
            'car_sale_id' => $this->input->post('car_sale_select'),
            'body_type' => $this->input->post('pro_body_type'),
            'sub_body_type' => $this->input->post('pro_sub_body_type'),
            'brand' => $this->input->post('pro_brand'),
            'model' => $this->input->post('pro_model'),
            'title' => $this->input->post('property_title'),
            'price_type' => $this->input->post('pro_price_type'),
            'price ' => $this->input->post('pro_price'),
            'price_on_request' => $this->input->post('price_onrequest'),
            'price_negotiable' => $this->input->post('price_nagotiable'),
            'main_image' => $image_banner,
            //  'available_from' => $this->input->post('pro_available_from'),
//            'pro_video_url' => $this->input->post('pro_video_url'),
            'district' => $this->input->post('pro_district'),
            'city' => $this->input->post('pro_city_edit'),
            'loc_lat' => $this->input->post('lat'),
            'loc_lng' => $this->input->post('lng'),
            'contact_name' => $this->input->post('pro_contact_name'),
            'contact_email' => $this->input->post('pro_contact_email'),
            'contact_mobile' => $this->input->post('pro_contact_phone'),
            'condition_type' => $this->input->post('pro_property_condition'),
            'transmission' => $this->input->post('pro_transmission_types'),
            'yom' => $this->input->post('property_year_manu'),
            'yor' => $this->input->post('property_regi_year'),
            'engine_size' => $this->input->post('property_engine_size'),
            'edition' => $this->input->post('pro_edition'),
            'mileage' => $this->input->post('property_mileage'),
            'door_count' => $this->input->post('property_door_count'),
            'pro_desc' => $this->input->post('textarea-desc-property'),
            'ad_type' => $this->input->post('pro_ad_type'),
            'fuel_type' => $this->input->post('pro_fuel_types'),
            'posted_date' => date('Y-m-d H:i:s'),
            'expire_date' => $expire_date,
            'user_id' => $this->input->post('user_id'),
            'color' => $this->input->post('property_color'),
            'interior_color' => $this->input->post('property_inte_color'),
            'pro_regi_no' => $this->input->post('pro_regi_no')
        );


        //var_dump($arrayProperty);

        $saveAll = $this->PropertyModel->updateProperty($arrayProperty, $maxPropertyId);
        if($saveAll){
            $this->session->set_flashdata('message_suc_property', 'Your vehicle updated Successfully.');
            redirect('user/ads/'.$userId);
        }
    }

    function category($catId,$catName){
        $this->load->library('pagination');
        //$property = $this->PropertyModel->getPropertiesByCategoryId($catId);

        //$related_properties = $this->PropertyModel->getAllProperties(); ;//$this->PropertyModel->getRelatedProperties($property[0]->offer_type, $property[0]->body_type, $property[0]->district);
        //$data['property'] = $property;

        //$data['related_properties'] = $related_properties;
        $data['main_content'] = 'user/property_category';
        $data['model_type_name'] = $catName;
        $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
        $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
        $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
        $data['models'] = $this->PropertyModel->getModelsForForm();
        $data['models'] = $this->PropertyModel->getModelsList();
        $data['top_models'] = $this->PropertyModel->getTopModelsList();
        $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['catId'] = $catId;
        $config['per_page'] = 12;
        $config['total_rows'] = $this->PropertyModel->get_properties_by_category_pagination($catId,0, 0);
        $config['base_url'] = base_url('vehicle/category/'.$catId.'/'.$catName);
        $config['num_links'] = 10;
        $config["uri_segment"] = 5;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data['all_properties'] = $this->PropertyModel->get_properties_by_category_pagination($catId,$config['per_page'], $page);
        $data['latest_properties'] = $this->PropertyModel->getAllProperties();
        $this->load->view('includes/template', $data);
    }

    function category_grid($catId,$catName){
        $this->load->library('pagination');
        //$property = $this->PropertyModel->getPropertiesByCategoryId($catId);

        //$related_properties = $this->PropertyModel->getAllProperties(); ;//$this->PropertyModel->getRelatedProperties($property[0]->offer_type, $property[0]->body_type, $property[0]->district);
        //$data['property'] = $property;

        //$data['related_properties'] = $related_properties;
        $data['main_content'] = 'user/property_category_grid';
        $data['model_type_name'] = $catName;
        $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
        $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
        $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
        $data['models'] = $this->PropertyModel->getModelsForForm();
        $data['models'] = $this->PropertyModel->getModelsList();
        $data['top_models'] = $this->PropertyModel->getTopModelsList();
        $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['catId'] = $catId;
        $config['per_page'] = 12;
        $config['total_rows'] = $this->PropertyModel->get_properties_by_category_pagination($catId,0, 0);
        $config['base_url'] = base_url('vehicle/category_grid/'.$catId.'/'.$catName);
        $config['num_links'] = 10;
        $config["uri_segment"] = 5;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data['all_properties'] = $this->PropertyModel->get_properties_by_category_pagination($catId,$config['per_page'], $page);
        $data['latest_properties'] = $this->PropertyModel->getAllProperties();
        $this->load->view('includes/template', $data);
    }


    function sub_category($catId,$catName){
        $this->load->library('pagination');
        //$property = $this->PropertyModel->getPropertiesByCategoryId($catId);

        //$related_properties = $this->PropertyModel->getAllProperties(); ;//$this->PropertyModel->getRelatedProperties($property[0]->offer_type, $property[0]->body_type, $property[0]->district);
        //$data['property'] = $property;

        //$data['related_properties'] = $related_properties;
        $data['main_content'] = 'user/property_sub_category';
        $data['model_type_name'] = $catName;
        $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
        $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
        $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
        $data['models'] = $this->PropertyModel->getModelsForForm();
        $data['models'] = $this->PropertyModel->getModelsList();
        $data['top_models'] = $this->PropertyModel->getTopModelsList();
        $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['catId'] = $catId;
        $config['per_page'] = 12;
        $config['total_rows'] = $this->PropertyModel->get_properties_by_subcategory_pagination($catId,0, 0);
        $config['base_url'] = base_url('vehicle/sub_category/'.$catId.'/'.$catName);
        $config['num_links'] = 10;
        $config["uri_segment"] = 5;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data['all_properties'] = $this->PropertyModel->get_properties_by_subcategory_pagination($catId,$config['per_page'], $page);
        $data['latest_properties'] = $this->PropertyModel->getAllProperties();
        $this->load->view('includes/template', $data);
    }

    function sub_category_grid($catId,$catName){
        $this->load->library('pagination');
        //$property = $this->PropertyModel->getPropertiesByCategoryId($catId);

        //$related_properties = $this->PropertyModel->getAllProperties(); ;//$this->PropertyModel->getRelatedProperties($property[0]->offer_type, $property[0]->body_type, $property[0]->district);
        //$data['property'] = $property;

        //$data['related_properties'] = $related_properties;
        $data['main_content'] = 'user/property_sub_category_grid';
        $data['model_type_name'] = $catName;
        $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
        $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
        $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
        $data['models'] = $this->PropertyModel->getModelsForForm();
        $data['models'] = $this->PropertyModel->getModelsList();
        $data['top_models'] = $this->PropertyModel->getTopModelsList();
        $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['catId'] = $catId;
        $config['per_page'] = 12;
        $config['total_rows'] = $this->PropertyModel->get_properties_by_subcategory_pagination($catId,0, 0);
        $config['base_url'] = base_url('vehicle/sub_category_grid/'.$catId.'/'.$catName);
        $config['num_links'] = 10;
        $config["uri_segment"] = 5;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data['all_properties'] = $this->PropertyModel->get_properties_by_subcategory_pagination($catId,$config['per_page'], $page);
        $data['latest_properties'] = $this->PropertyModel->getAllProperties();
        $this->load->view('includes/template', $data);
    }

    function sorting($catId,$catName,$val){
        $this->load->library('pagination');
//var_dump($this->uri->segment(5));
//die();


            if($val == "brand") {
                $config['per_page'] = 12;

                $config['base_url'] = base_url('vehicle/sorting/'.$catId.'/'.$catName.'/'.$val);
                $config['num_links'] = 10;
                $config["uri_segment"] = 6;
                $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
                $catD = $this->PropertyModel->getMainCategoryDetails($catId);
                if(is_array($catD) && count($catD) != 0){
                    if($catD[0]->parent == 0) {
                        $total_rows = $this->PropertyModel->get_properties_pagination_brand($catId,0, 0);
                        $all_properties = $this->PropertyModel->get_properties_pagination_brand($catId,$config['per_page'], $page);
                    }else{
                        $total_rows = $this->PropertyModel->get_properties_pagination_brand_sub($catId,0, 0);
                        $all_properties = $this->PropertyModel->get_properties_pagination_brand_sub($catId,$config['per_page'], $page);
                    }
                }
                $config['total_rows'] = $total_rows;
                $this->pagination->initialize($config);
                $data['main_content'] = 'user/property_category';
                $data['model_type_name'] = $catName;
                $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
                $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
                $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
                $data['models'] = $this->PropertyModel->getModelsForForm();
                $data['models'] = $this->PropertyModel->getModelsList();
                $data['top_models'] = $this->PropertyModel->getTopModelsList();
                $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
                $data['districts'] = $this->PropertyModel->getAllDistricts();
                $data['catId'] = $catId;
                $data['all_properties'] = $all_properties;
                $data['latest_properties'] = $this->PropertyModel->getAllProperties();

            }elseif ($val == "date"){
                $config['per_page'] = 12;
                $config['total_rows'] = $this->PropertyModel->get_properties_pagination_date($catId,0, 0);
                $config['base_url'] = base_url('vehicle/sorting/'.$catId.'/'.$catName.'/'.$val);
                $config['num_links'] = 10;
                $config["uri_segment"] = 6;
                $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;

                $catD = $this->PropertyModel->getMainCategoryDetails($catId);
                if(is_array($catD) && count($catD) != 0){
                    if($catD[0]->parent == 0) {
                        $total_rows = $this->PropertyModel->get_properties_pagination_date($catId,0, 0);
                        $all_properties = $this->PropertyModel->get_properties_pagination_date($catId,$config['per_page'], $page);
                    }else{
                        $total_rows = $this->PropertyModel->get_properties_pagination_date_sub($catId,0, 0);
                        $all_properties = $this->PropertyModel->get_properties_pagination_date_sub($catId,$config['per_page'], $page);
                    }
                }
                $config['total_rows'] = $total_rows;
                $this->pagination->initialize($config);

                $data['main_content'] = 'user/property_category';
                $data['model_type_name'] = $catName;
                $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
                $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
                $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
                $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
                $data['models'] = $this->PropertyModel->getModelsForForm();
                $data['models'] = $this->PropertyModel->getModelsList();
                $data['top_models'] = $this->PropertyModel->getTopModelsList();
                $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
                $data['districts'] = $this->PropertyModel->getAllDistricts();
                $data['catId'] = $catId;
                $data['all_properties'] = $all_properties;
                $data['latest_properties'] = $this->PropertyModel->getAllProperties();

            }elseif ($val == "price"){
                $config['per_page'] = 12;
                $config['total_rows'] = $this->PropertyModel->get_properties_pagination_price($catId,0, 0);
                $config['base_url'] = base_url('vehicle/sorting/'.$catId.'/'.$catName.'/'.$val);
                $config['num_links'] = 10;
                $config["uri_segment"] = 6;
                $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
                $catD = $this->PropertyModel->getMainCategoryDetails($catId);
                if(is_array($catD) && count($catD) != 0){
                    if($catD[0]->parent == 0) {
                        $total_rows = $this->PropertyModel->get_properties_pagination_price($catId,0, 0);
                        $all_properties = $this->PropertyModel->get_properties_pagination_price($catId,$config['per_page'], $page);
                    }else{
                        $total_rows = $this->PropertyModel->get_properties_pagination_price_sub($catId,0, 0);
                        $all_properties = $this->PropertyModel->get_properties_pagination_price_sub($catId,$config['per_page'], $page);
                    }
                }
                $config['total_rows'] = $total_rows;
                $this->pagination->initialize($config);

                $data['main_content'] = 'user/property_category';
                $data['model_type_name'] = $catName;
                $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
                $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
                $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
                $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
                $data['models'] = $this->PropertyModel->getModelsForForm();
                $data['models'] = $this->PropertyModel->getModelsList();
                $data['districts'] = $this->PropertyModel->getAllDistricts();
                $data['top_models'] = $this->PropertyModel->getTopModelsList();
                $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();

                $data['catId'] = $catId;



                $data['all_properties'] = $all_properties;
                $data['latest_properties'] = $this->PropertyModel->getAllProperties();
            }

            $this->load->view('includes/template', $data);



    }

    function sorting_grid($catId,$catName,$val){
        $this->load->library('pagination');

//        $catD = $this->PropertyModel->getMainCategoryDetails($catId);
//        var_dump($catId);
//        if(is_array($catD) && count($catD) != 0){
//            if($catD[0]->parent = 0) {
//                $catId = $catId;
//            }else{
//                $catId = $catD[0]->parent;
//            }
//        }
//
//        var_dump($catId);

        if($val == "brand") {
            $data['main_content'] = 'user/property_category_grid';
            $data['model_type_name'] = $catName;
            $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
            $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
            $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
            $data['models'] = $this->PropertyModel->getModelsForForm();
            $data['models'] = $this->PropertyModel->getModelsList();
            $data['top_models'] = $this->PropertyModel->getTopModelsList();
            $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
            $data['districts'] = $this->PropertyModel->getAllDistricts();
            $data['catId'] = $catId;
            $config['per_page'] = 20;
            $config['total_rows'] = $this->PropertyModel->get_properties_pagination_brand($catId,0, 0);
            $config['base_url'] = base_url('vehicle/category_grid/'.$catId.'/'.$catName.'/'.$val);
            $config['num_links'] = 10;
            $config["uri_segment"] = 6;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
            $data['all_properties'] = $this->PropertyModel->get_properties_pagination_brand($catId,$config['per_page'], $page);
            $data['latest_properties'] = $this->PropertyModel->getAllProperties();

        }elseif ($val == "date"){
            $data['main_content'] = 'user/property_category_grid';
            $data['model_type_name'] = $catName;
            $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
            $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
            $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
            $data['models'] = $this->PropertyModel->getModelsForForm();
            $data['models'] = $this->PropertyModel->getModelsList();
            $data['top_models'] = $this->PropertyModel->getTopModelsList();
            $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
            $data['districts'] = $this->PropertyModel->getAllDistricts();
            $data['catId'] = $catId;
            $config['per_page'] = 20;
            $config['total_rows'] = $this->PropertyModel->get_properties_pagination_date($catId,0, 0);
            $config['base_url'] = base_url('vehicle/category_grid/'.$catId.'/'.$catName.'/'.$val);
            $config['num_links'] = 10;
            $config["uri_segment"] = 6;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
            $data['all_properties'] = $this->PropertyModel->get_properties_pagination_date($catId,$config['per_page'], $page);
            $data['latest_properties'] = $this->PropertyModel->getAllProperties();

        }elseif ($val == "price"){
            $data['main_content'] = 'user/property_category_grid';
            $data['model_type_name'] = $catName;
            $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
            $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
            $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
            $data['models'] = $this->PropertyModel->getModelsForForm();
            $data['models'] = $this->PropertyModel->getModelsList();
            $data['top_models'] = $this->PropertyModel->getTopModelsList();
            $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
            $data['districts'] = $this->PropertyModel->getAllDistricts();
            $data['catId'] = $catId;
            $config['per_page'] = 20;
            $config['total_rows'] = $this->PropertyModel->get_properties_pagination_price($catId,0, 0);
            $config['base_url'] = base_url('vehicle/category_grid/'.$catId.'/'.$catName.'/'.$val);
            $config['num_links'] = 10;
            $config["uri_segment"] = 6;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
            $data['all_properties'] = $this->PropertyModel->get_properties_pagination_price($catId,$config['per_page'], $page);
            $data['latest_properties'] = $this->PropertyModel->getAllProperties();
        }

        $this->load->view('includes/template', $data);
    }


    function sorting_featured($val){
        $this->load->library('pagination');

//        $catD = $this->PropertyModel->getMainCategoryDetails($catId);
//        if(is_array($catD) && count($catD) != 0){
//            if($catD[0]->parent = 0) {
//                $catId = $catId;
//            }else{
//                $catId = $catD[0]->parent;
//            }
//        }

        if($val == "brand") {
            $data['main_content'] = 'user/property_featured';
            $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
            $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
            $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
            $data['models'] = $this->PropertyModel->getModelsForForm();
            $data['models'] = $this->PropertyModel->getModelsList();
            $data['top_models'] = $this->PropertyModel->getTopModelsList();
            $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
            $data['districts'] = $this->PropertyModel->getAllDistricts();
            $config['per_page'] = 20;
            $config['total_rows'] = $this->PropertyModel->get_properties_pagination_featured_brand(0, 0);
            $config['base_url'] = base_url('vehicle/featured/'.$val);
            $config['num_links'] = 10;
            $config["uri_segment"] = 4;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['all_properties'] = $this->PropertyModel->get_properties_pagination_featured_brand($config['per_page'], $page);
            $data['latest_properties'] = $this->PropertyModel->getAllProperties();

        }elseif ($val == "date"){
            $data['main_content'] = 'user/property_featured';

            $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
            $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
            $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
            $data['models'] = $this->PropertyModel->getModelsForForm();
            $data['models'] = $this->PropertyModel->getModelsList();
            $data['top_models'] = $this->PropertyModel->getTopModelsList();
            $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
            $data['districts'] = $this->PropertyModel->getAllDistricts();
            $config['per_page'] = 20;
            $config['total_rows'] = $this->PropertyModel->get_properties_pagination_featured_date(0, 0);
            $config['base_url'] = base_url('vehicle/featured/'.$val);
            $config['num_links'] = 10;
            $config["uri_segment"] = 4;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['all_properties'] = $this->PropertyModel->get_properties_pagination_featured_date($config['per_page'], $page);
            $data['latest_properties'] = $this->PropertyModel->getAllProperties();

        }elseif ($val == "price"){
            $data['main_content'] = 'user/property_featured';
            $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
            $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
            $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
            $data['models'] = $this->PropertyModel->getModelsForForm();
            $data['models'] = $this->PropertyModel->getModelsList();
            $data['top_models'] = $this->PropertyModel->getTopModelsList();
            $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
            $data['districts'] = $this->PropertyModel->getAllDistricts();
            $config['per_page'] = 20;
            $config['total_rows'] = $this->PropertyModel->get_properties_pagination_featured_price(0, 0);
            $config['base_url'] = base_url('vehicle/featured/'.$val);
            $config['num_links'] = 10;
            $config["uri_segment"] = 4;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['all_properties'] = $this->PropertyModel->get_properties_pagination_featured_price($config['per_page'], $page);
            $data['latest_properties'] = $this->PropertyModel->getAllProperties();
        }

        $this->load->view('includes/template', $data);
    }


    function sorting_featured_grid($val){
        $this->load->library('pagination');


//        $catD = $this->PropertyModel->getMainCategoryDetails($catId);
//        if(is_array($catD) && count($catD) != 0){
//            if($catD[0]->parent = 0) {
//                $catId = $catId;
//            }else{
//                $catId = $catD[0]->parent;
//            }
//        }

        if($val == "brand") {
            $data['main_content'] = 'user/property_featured_grid';
            $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
            $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
            $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
            $data['models'] = $this->PropertyModel->getModelsForForm();
            $data['models'] = $this->PropertyModel->getModelsList();
            $data['top_models'] = $this->PropertyModel->getTopModelsList();
            $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
            $data['districts'] = $this->PropertyModel->getAllDistricts();
            $config['per_page'] = 20;
            $config['total_rows'] = $this->PropertyModel->get_properties_pagination_featured_brand(0, 0);
            $config['base_url'] = base_url('vehicle/featured_grid/'.$val);
            $config['num_links'] = 10;
            $config["uri_segment"] = 4;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['all_properties'] = $this->PropertyModel->get_properties_pagination_featured_brand($config['per_page'], $page);
            $data['latest_properties'] = $this->PropertyModel->getAllProperties();

        }elseif ($val == "date"){
            $data['main_content'] = 'user/property_featured_grid';

            $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
            $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
            $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
            $data['models'] = $this->PropertyModel->getModelsForForm();
            $data['models'] = $this->PropertyModel->getModelsList();
            $data['top_models'] = $this->PropertyModel->getTopModelsList();
            $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
            $data['districts'] = $this->PropertyModel->getAllDistricts();
            $config['per_page'] = 20;
            $config['total_rows'] = $this->PropertyModel->get_properties_pagination_featured_date(0, 0);
            $config['base_url'] = base_url('vehicle/featured_grid/'.$val);
            $config['num_links'] = 10;
            $config["uri_segment"] = 4;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['all_properties'] = $this->PropertyModel->get_properties_pagination_featured_date($config['per_page'], $page);
            $data['latest_properties'] = $this->PropertyModel->getAllProperties();

        }elseif ($val == "price"){
            $data['main_content'] = 'user/property_featured_grid';
            $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
            $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
            $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
            $data['models'] = $this->PropertyModel->getModelsForForm();
            $data['models'] = $this->PropertyModel->getModelsList();
            $data['top_models'] = $this->PropertyModel->getTopModelsList();
            $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
            $data['districts'] = $this->PropertyModel->getAllDistricts();
            $config['per_page'] = 20;
            $config['total_rows'] = $this->PropertyModel->get_properties_pagination_featured_price(0, 0);
            $config['base_url'] = base_url('vehicle/featured_grid/'.$val);
            $config['num_links'] = 10;
            $config["uri_segment"] = 4;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['all_properties'] = $this->PropertyModel->get_properties_pagination_featured_price($config['per_page'], $page);
            $data['latest_properties'] = $this->PropertyModel->getAllProperties();
        }

        $this->load->view('includes/template', $data);
    }






    function view($propertyId){
        $property = $this->PropertyModel->getPropertyDetailsByPropertyId($propertyId);

        //var_dump($property);
        $related_properties = $this->PropertyModel->getAllProperties(); ;//$this->PropertyModel->getRelatedProperties($property[0]->offer_type, $property[0]->body_type, $property[0]->district);
        $data['property'] = $property;
        $arrayAdTrack = array(
            'ip_address' => $this->input->ip_address(),
            'property_id' => $propertyId,
            'viewed_date' => date('Y-m-d H:i:s'),
            'brand' => (count($property) != 0) ? $property[0]->brand : null,
            'model' => (count($property) != 0) ? $property[0]->model : null,
            'posted_date' => (count($property) != 0) ? $property[0]->posted_date : null,
            'user_id' => (count($property) != 0) ? $property[0]->user_id : null,
            'brand' => (count($property) != 0) ? $property[0]->brand : null
        );

        $result = $this->PropertyModel->saveAdClickDetails($arrayAdTrack);
        $data['related_properties'] = $related_properties;
        $data['main_content'] = 'user/property_view';
        $this->load->view('includes/template', $data);
    }

    function edit($propertyId){
        $data['property'] = $this->PropertyModel->getPropertyDetailsByPropertyId($propertyId);

        $data['body_types'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['models'] = $this->PropertyModel->getModelsForForm();
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['countries'] = $this->UserModel->locationDropList();
        $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
        $data['trans_types'] = $this->PropertyModel->getTransmissionTypesForForm();

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

    function removePropertyImage($imageId,$propertyId){
        $result = $this->PropertyModel->deletePropertyImagesRecord($imageId);
        if (isset($_POST['pro_images'])) {
            $file = 'assets/uploads/' . $_POST['pro_images'];

            //var_dump($file);

            if (file_exists($file))
                unlink($file);
        }

        return redirect('vehicle/edit/'.$propertyId);
    }

//    public function search(){
//        $data['main_content'] = 'user/search_result';
//        $this->load->view('includes/template', $data);
//    }



    function search_result(){
        // var_dump($this->input->post());
//        $this->session->set_userdata('search_paras',$this->input->post());
        $data['search_result'] = "yes";
        $this->load->library('pagination');
        $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
        $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
        $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
        $data['models'] = $this->PropertyModel->getModelsForForm();
        $data['models'] = $this->PropertyModel->getModelsList();
        $data['top_models'] = $this->PropertyModel->getTopModelsList();
        $data['car_sales'] =$this->PropertyModel->getCarSaleDropList();
        $data['selected_fields'] = $this->input->post();
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['main_content'] = 'user/search_result_grid';
        $data['property_types'] =$this->PropertyModel->getPropertyTypes();
        $config['per_page'] = 20000000;
        $search_paras  = $this->session->userdata('search_paras');
//        if(is_array($this->input->post()) && count($this->input->post() == 0)){
//
//            $config['total_rows'] = $this->PropertyModel->get_properties_pagination_search($search_paras,0, 0);
//        }else{
            $config['total_rows'] = $this->PropertyModel->get_properties_pagination_search($this->input->post(),0, 0);
        //}

        $config['base_url'] = base_url('vehicle/search_result');
        $config['num_links'] = 15;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


//        if(is_array($this->input->post()) && count($this->input->post() == 0)){
//
//            $data['all_properties'] = $this->PropertyModel->get_properties_pagination_search($search_paras,$config['per_page'], $page);
//        }else{
            $data['all_properties'] = $this->PropertyModel->get_properties_pagination_search($this->input->post(),$config['per_page'], $page);
        //}
//        var_dump($this->input->post());
//        var_dump($search_paras);
        //die();

        $data['latest_properties'] = $this->PropertyModel->getAllProperties();
        //var_dump($data['search_results']);
        $this->load->view('includes/template', $data);

    }


    function search_result_grid(){
        // var_dump($this->input->post());
        $data['search_result'] = "yes";
        $this->load->library('pagination');

        $data['main_content'] = 'user/search_result_grid';
        $data['property_types'] =$this->PropertyModel->getPropertyTypes();
        $config['per_page'] = 20;
        $config['total_rows'] = $this->PropertyModel->get_properties_pagination_search($this->input->post(),0, 0);
        $config['base_url'] = base_url('vehicle/search_result_grid');
        $config['num_links'] = 15;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['all_properties'] = $this->PropertyModel->get_properties_pagination_search($this->input->post(),$config['per_page'], $page);
        $data['latest_properties'] = $this->PropertyModel->getAllProperties();
        //var_dump($data['search_results']);
        $this->load->view('includes/template', $data);

    }


    function search(){

        $property_type = $this->input->post('property_type');
        $property_status = $this->input->post('property_status');
        $property_loc = $this->input->post('property_location');
        $proMake = $this->input->post('vehicle_make');
        $proModel = $this->input->post('vehicle_model');

        $data['property_type'] = $property_type;
        $data['status'] = $property_status;
        $data['location'] = $property_loc;

        $sess_array = array(
            'pro_type' => $property_type,
            'status' => $property_status,
            'location' => $property_loc,
            'make' => $proMake,
            'model' => $proModel
        );
        $this->session->set_userdata('property_search',$sess_array);

        $this->load->library('pagination');
        $config['base_url'] = base_url()."vehicle/search";
        $config['per_page'] = 2;
        $config['num_links'] = 5;
        $config['total_rows'] = $this->PropertyModel->getSearchResultRowCount($property_type,$proMake,$proModel,$property_loc);

        $this->pagination->initialize($config);
        $result = $this->PropertyModel->getSearchResultNew($property_type,$proMake,$proModel,$property_loc,$config['per_page'],$this->uri->segment(3));

        //$data['query'] = $result;





        //var_dump($result);
        $data['districts'] = $this->PropertyModel->getDistricts();
        $data['makes'] =$this->PropertyModel->getModelTypes();
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
        $data['body_types'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['models'] = $this->PropertyModel->getModelsForForm();
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['countries'] = $this->UserModel->locationDropList();
        $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
        $data['trans_types'] = $this->PropertyModel->getTransmissionTypesForForm();
        $data['property'] = $this->PropertyModel->getPropertyDetailsByPropertyId($propertyId);
        $data['main_content'] = 'user/property_delete';
        $this->load->view('includes/template', $data);
    }

    function property_delete(){
        $propertyId = $this->input->post('property_id');
        $userId = $this->input->post('user_id');
        $delete= $this->PropertyModel->deleteProperty($propertyId);
        $deleteImages= $this->PropertyModel->deletePropertyImages($propertyId);
        $deleteFeatued = $this->PropertyModel->deleteFeaturedPropertyDetails($propertyId);
        if($delete && $deleteImages){
            $this->session->set_flashdata('message_delete_property', 'Vehicle deleted Successfully.');
            redirect('user/ads/'.$userId);
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

        $this->email->from('info@ceylonautotrade.com', 'Ceylon Auto Trade');
        $subject = "Response to your Advertisement  - Ceylon Auto Trade";


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

    function validate_captcha() {
        $captcha = $this->input->post('g-recaptcha-response');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeVol8UAAAAAG0Kk6rgY6Cm4EirUQefvgZcW9U0&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }




    function advanced_search(){
//        $arrayPost = array(
//            'pro_brand'  => 0,
//            'pro_model' => 0,
//            'keyword'  => 0,
//            'pro_property_condition'  => 0,
//            'pro_district' => 0
//        );

//        var_dump($this->input->post());
//        die();

        if(isset($_POST['adv_search_clear'])){


                $_POST['body_type'] = 0;
                $_POST['pro_brand'] = 0;
                $_POST['pro_model'] = 0;
                $_POST['yom'] = "";
                $_POST['yor'] = "";
                $_POST['engine'] = "";
                $_POST['transmission'] = 0;
                $_POST['fuel_type'] = 0;
                $_POST['pro_property_condition'] = 0;
                $_POST['mileage_from'] = "";
                $_POST['mileage_to'] = "";
                $_POST['price_from'] = "";
                $_POST['price_to'] = "";
                $_POST['pro_district'] = 0;
                $_POST['car_sale'] = 0;
                $_POST['keyword'] = "";



            $data['search_result'] = "adv";
            $this->load->library('pagination');
            $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
            $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
            $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
            $data['models'] = $this->PropertyModel->getModelsForForm();
            $data['models'] = $this->PropertyModel->getModelsList();
            $data['top_models'] = $this->PropertyModel->getTopModelsList();
            $data['districts'] = $this->PropertyModel->getAllDistricts();
            $data['car_sales'] = $this->PropertyModel->getCarSaleDropList();
            $data['selected_fields'] = $this->input->post();
            $data['main_content'] = 'user/search_result_grid';
            $data['property_types'] = $this->PropertyModel->getPropertyTypes();
            $config['per_page'] = 20;
            $config['total_rows'] = $this->PropertyModel->get_properties_adv_search($this->input->post(), 0, 0);
            $config['base_url'] = base_url('vehicle/advanced_search');
            $config['num_links'] = 15;
            $config["uri_segment"] = 3;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['all_properties'] = $this->PropertyModel->get_properties_adv_search($this->input->post(), $config['per_page'], $page);
            $data['latest_properties'] = $this->PropertyModel->getAllProperties();
            //var_dump($this->input->post());
            $this->load->view('includes/template', $data);
        }else {


            $data['search_result'] = "adv";
            $this->load->library('pagination');
            $data['transmissions'] = $this->PropertyModel->getTransmissionTypesForForm();
            $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
            $data['body_types'] = $this->PropertyModel->getPropertyTypesForForm();
            $data['models'] = $this->PropertyModel->getModelsForForm();
            $data['models'] = $this->PropertyModel->getModelsList();
            $data['top_models'] = $this->PropertyModel->getTopModelsList();
            $data['districts'] = $this->PropertyModel->getAllDistricts();
            $data['car_sales'] = $this->PropertyModel->getCarSaleDropList();
            $data['selected_fields'] = $this->input->post();
            $data['main_content'] = 'user/search_result_grid';
            $data['property_types'] = $this->PropertyModel->getPropertyTypes();
            $config['per_page'] = 20;
            $config['total_rows'] = $this->PropertyModel->get_properties_adv_search($this->input->post(), 0, 0);
            $config['base_url'] = base_url('vehicle/advanced_search');
            $config['num_links'] = 15;
            $config["uri_segment"] = 3;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['all_properties'] = $this->PropertyModel->get_properties_adv_search($this->input->post(), $config['per_page'], $page);
            $data['latest_properties'] = $this->PropertyModel->getAllProperties();
            //var_dump($this->input->post());
            $this->load->view('includes/template', $data);
        }
    }


    function compare_item_store(){

        $compare_item_session = $this->session->userdata('compare_items');
        $received_items = $this->input->post('property_id');
        $this->session->set_userdata('compare_items',$received_items);

        $flowers = array_diff($compare_item_session, array("",0,null));

        if (is_array($compare_item_session)) {
            array_push($compare_item_session, $this->input->post('property_id'));
            $this->session->set_userdata('compare_items',$compare_item_session);
        }


        var_dump($compare_item_session);



    }




    function compare(){
 //       $vehicles  = $this->session->userdata('compare_list')['vehicle_ids'];
        //$vehicle_id = explode(",", $this->input->post('compare_array'));
//        //var_dump($vehicles);
//        //var_dump($this->input->post('compare_array'));
//        if($this->input->post('compare_array') != null && $vehicles != null){
//            array_push($vehicles,  $this->input->post('compare_array'));
//        }
//
//
//        //var_dump($vehicle_id);
//
//        $sess_array = array(
//            'vehicle_ids' => $vehicle_id
//        );
        //$this->session->set_userdata('compare_list',$sess_array);
//        $this->session->unset_userdata('compare_items');
//        $this->session->sess_destroy();
        $data['main_content'] = 'user/compare';
        $this->load->view('includes/template', $data);
    }

    function compare_clear(){
        $this->session->unset_userdata('compare_items');
        $this->session->sess_destroy();
        $data['main_content'] = 'user/compare';
        $this->load->view('includes/template', $data);
    }




    function payment($userId,$adId, $type = null){
        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }
        if($type != null){
            $data['type'] = $type;
        }
        $data['user_id'] = $userId;
        $data['ad_id'] = $adId;
        $data['renew'] = 0;
        $data['main_content'] = 'user/payment';
        $data['durations'] = $this->PropertyModel->getDurationDropList();
        $this->load->view('includes/template', $data);
    }

    function payment_response(){
        $data['main_content'] = 'user/pay_response';
        $this->load->view('includes/template', $data);
    }


    function payment_submit(){
        // $config['upload_path'] = 'assets/uploads/wanted';
        // $config['allowed_types'] = 'gif|jpg|jpeg|png';

//        $this->load->library('upload', $config);
//
//        $this->upload->do_upload('bank_slip');
//        $data = array('upload_data' => $this->upload->data());
//        $pay_slip = $data['upload_data']['file_name'];
//        if($pay_slip != null){
//            $pay_slip = $data['upload_data']['file_name'];
//        }

        $data['renew'] = $this->input->post('renew');

        if( $this->input->post('renew') == "renew"){

            $maxPayId = $this->PropertyModel->getMaxPaymentId();
            if($maxPayId == null){
                $maxPayId = 0;
            }

            $maxPayId = $maxPayId + 1;


            //var_dump($this->input->post());
            $paymethod = $this->input->post('payment_method');
            $userId = $this->input->post('user_id');
            $adID = $this->input->post('ad_id');

            $adD = $this->PropertyModel->getPropertyDetailsByPropertyIdAdmin($adID);
            $renew_cu = (is_array($adD) && count($adD) != 0) ? $adD[0]->renew_status : 0;

//            var_dump($paymethod);
//            die();

            if($paymethod == "online"){
//                var_dump("online pay");
//                die();
                $amountN = round(preg_replace('/[^A-Za-z0-9. -]/', '', $this->input->post('total_ad_pay')));
//                var_dump($amountN);
//                die();
                $data['time_du_pay'] = $this->input->post('time_du_pay');
                $data['amount'] = $amountN;
                $data['is_featured'] = $this->input->post('feature_vehicle_is');
                $data['payment_id'] = $maxPayId;
                $data['ad_id'] = $adID;
                $data['user_id'] = $userId;
                $data['renew'] = 1;
                $data['main_content'] = 'user/online_pay';
                $this->load->view('includes/template', $data);
            }else if($paymethod == "bank"){
                $arrayPay = array(
                    'payment_id' => $maxPayId,
                    'amount' => $this->input->post('total_ad_pay'),
                    'user_id' => $userId,
                    'payment_date' => date('Y-m-d'),
                    'payment_time' => date('H:i:s'),
                    'ad_id' => $adID,
                    'duration' => $this->input->post('time_du_pay'),
                    'year' => date('Y'),
                    'status'=> "pending",
                    'reference' => "REF_BANK_". $adID,
                    'transactionId' => "REF_BANK_". $adID,
                    'description' => "bank_transfer",
                    'is_featured' => $this->input->post('feature_vehicle_is'),
                    'payment_method' => 'bank',

                );

                $arrayProRenew = array(
                    'renew_status' => ($renew_cu + 1),
                    'renew_pay_app_status' => '1'
                );
                $this->PropertyModel->updateProperty($arrayProRenew, $adID);

//            var_dump($this->input->post('feature_vehicle_is'));

                if($this->input->post('feature_vehicle_is') == 1){
                    //var_dump("pay bank");
                    $this->PropertyModel->updateFeatureAdDetails($adID, $this->input->post('feature_vehicle_is'));
                }

                $this->PropertyModel->savePaymentDetails($arrayPay);
                $this->session->set_flashdata('message_suc', 'Ad submit for approval, Please whatsapp your bank slip to the 0769234567 with REF ID.');
                redirect('user/ads/'.$userId);

            }else if($paymethod == "payonstore"){

                $arrayPay = array(
                    'payment_id' => $maxPayId,
                    'amount' => $this->input->post('total_ad_pay'),
                    'user_id' => $userId,
                    'payment_date' => date('Y-m-d'),
                    'payment_time' => date('H:i:s'),
                    'ad_id' => $adID,
                    'duration' => $this->input->post('time_du_pay'),
                    'year' => date('Y'),
                    'status'=> "pending",
                    'reference' => "REF_PAYONSTORE_". $adID,
                    'transactionId' => "REF_PAYONSTORE_". $adID,
                    'description' => "payonstore",
                    'is_featured' => $this->input->post('feature_vehicle_is'),
                    'payment_method' => 'payonstore',
                );

                $arrayProRenew = array(
                    'renew_status' => ($renew_cu + 1),
                    'renew_pay_app_status' => '1'
                );
                $this->PropertyModel->updateProperty($arrayProRenew, $adID);
                // var_dump($arrayPay);
                // die();
                //var_dump($this->input->post('feature_vehicle_is'));
                if($this->input->post('feature_vehicle_is') == 1){
                    //var_dump("pay sote");
                    $this->PropertyModel->updateFeatureAdDetails($adID, $this->input->post('feature_vehicle_is'));
                }
                $this->PropertyModel->savePaymentDetails($arrayPay);
                $this->session->set_flashdata('message_suc', 'Ad submit for approval, Please come to our office and do your payment using the REF ID.');
                redirect('user/ads/'.$userId);
            }
        }else{
            $maxPayId = $this->PropertyModel->getMaxPaymentId();
            if($maxPayId == null){
                $maxPayId = 0;
            }

            $maxPayId = $maxPayId + 1;



            //var_dump($this->input->post());
            $paymethod = $this->input->post('payment_method');
            $userId = $this->input->post('user_id');
            $adID = $this->input->post('ad_id');

            $loyal_bal = $this->input->post('loyalty_balance_val');
            $this->UserModel->updateLoyaltyBalance($loyal_bal,$userId);

            if($paymethod == "online"){
                $amountN = round(preg_replace('/[^A-Za-z0-9. -]/', '', $this->input->post('total_ad_pay')));
//                var_dump($amountN);
//                die();
                $data['time_du_pay'] = $this->input->post('time_du_pay');
                $data['amount'] = $amountN;
                $data['is_featured'] = $this->input->post('feature_vehicle_is');
                $data['payment_id'] = $maxPayId;
                $data['ad_id'] = $adID;
                $data['user_id'] = $userId;
                $data['main_content'] = 'user/online_pay';
                $this->load->view('includes/template', $data);
            }else if($paymethod == "bank"){

                $arrayPay = array(
                    'payment_id' => $maxPayId,
                    'amount' => $this->input->post('total_ad_pay'),
                    'user_id' => $userId,
                    'payment_date' => date('Y-m-d'),
                    'payment_time' => date('H:i:s'),
                    'ad_id' => $adID,
                    'duration' => $this->input->post('time_du_pay'),
                    'year' => date('Y'),
                    'status'=> "pending",
                    'reference' => "REF_BANK_". $adID,
                    'transactionId' => "REF_BANK_". $adID,
                    'description' => "bank_transfer",
                    'is_featured' => $this->input->post('feature_vehicle_is'),
                    'payment_method' => 'bank',
                );

//            var_dump($this->input->post('feature_vehicle_is'));

                if($this->input->post('feature_vehicle_is') == 1){
                    //var_dump("pay bank");
                    $this->PropertyModel->updateFeatureAdDetails($adID, $this->input->post('feature_vehicle_is'));
                }
                $this->PropertyModel->savePaymentDetails($arrayPay);
                $this->session->set_flashdata('message_suc', 'Ad submit for approval, Please whatsapp your bank slip to the 0769234567 with REF ID.');
                redirect('user/ads/'.$userId);

            }else if($paymethod == "payonstore"){
                $arrayPay = array(
                    'payment_id' => $maxPayId,
                    'amount' => $this->input->post('total_ad_pay'),
                    'user_id' => $userId,
                    'payment_date' => date('Y-m-d'),
                    'payment_time' => date('H:i:s'),
                    'ad_id' => $adID,
                    'duration' => $this->input->post('time_du_pay'),
                    'year' => date('Y'),
                    'status'=> "pending",
                    'reference' => "REF_PAYONSTORE_". $adID,
                    'transactionId' => "REF_PAYONSTORE_". $adID,
                    'description' => "payonstore",
                    'is_featured' => $this->input->post('feature_vehicle_is'),
                    'payment_method' => 'payonstore',
                );

                //var_dump($this->input->post('feature_vehicle_is'));
                if($this->input->post('feature_vehicle_is') == 1){
                    //var_dump("pay sote");
                    $this->PropertyModel->updateFeatureAdDetails($adID, $this->input->post('feature_vehicle_is'));
                }
                $this->sendEmailForPostAdOffline($userId,$adID);
                $this->PropertyModel->savePaymentDetails($arrayPay);
                $this->session->set_flashdata('message_suc', 'Ad submit for approval, Please come to our office and do your payment using the REF ID.');
                redirect('user/ads/'.$userId);
            }
            else if($paymethod == "free"){
                $arrayPay = array(
                    'payment_id' => $maxPayId,
                    'amount' => 0,
                    'user_id' => $userId,
                    'payment_date' => date('Y-m-d'),
                    'payment_time' => date('H:i:s'),
                    'ad_id' => $adID,
                    'duration' => $this->input->post('time_du_pay'),
                    'year' => date('Y'),
                    'status'=> "pending",
                    'reference' => "REF_FREE_". $adID,
                    'transactionId' => "REF_FREE_". $adID,
                    'description' => "loyalty points",
                    'is_featured' => $this->input->post('feature_vehicle_is'),
                    'payment_method' => 'free',
                );

                //var_dump($this->input->post('feature_vehicle_is'));
                if($this->input->post('feature_vehicle_is') == 1){
                    //var_dump("pay sote");
                    $this->PropertyModel->updateFeatureAdDetails($adID, $this->input->post('feature_vehicle_is'));
                }
                $this->sendEmailForPostAdOffline($userId,$adID);
                $this->PropertyModel->savePaymentDetails($arrayPay);
                $this->session->set_flashdata('message_suc', 'Ad submit for approval, Please come to our office and do your payment using the REF ID.');
                redirect('user/ads/'.$userId);
            }
        }


    }


    function payment_renew($userId,$adId){
        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }
        $data['renew'] = "renew";
        $data['user_id'] = $userId;
        $data['ad_id'] = $adId;
        $data['main_content'] = 'user/payment';
        $data['durations'] = $this->PropertyModel->getDurationDropList();
        $this->load->view('includes/template', $data);
    }

    function submit_bankslip($userId){
        $pro_id  = $this->input->post('pro_id');

        $config['upload_path'] = 'assets/uploads/slips';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);

        $this->upload->do_upload('bank_slip');
        $data = array('upload_data' => $this->upload->data());
        $pay_slip = $data['upload_data']['file_name'];



        //var_dump($pay_slip);

        if($pay_slip != null){
            $pay_slip = $data['upload_data']['file_name'];

            $arrayPaySlip = array(
                'pay_slip' => $pay_slip
            );

            $save = $this->PropertyModel->updatePaySlipDetails($arrayPaySlip,$pro_id);
            if($save){
                $this->sendEmailForPostAdOffline($userId,$pro_id);
                $this->session->set_flashdata('message_suc', 'Bankslip updated Successfully.');
                redirect('user/ads/'.$userId);
            }
        }else{
            $this->session->set_flashdata('message_danger', 'Please attach the bankslip.');
            redirect('user/ads/'.$userId);
        }
    }


    function delete_item_compare($proId,$sessionId){
        $result = $this->PropertyModel->deleteCompareItemFromSessionProId($proId,$sessionId);
        if($result){
            $this->session->set_flashdata('message_suc', 'Compare Property Deleted.');
            redirect(base_url(). 'user/compare_list/'.$sessionId.'/delete');
        }
    }

    function sendEmailForPostAdOffline($userId,$propertyId){

        $property = $this->PropertyModel->getPropertyDetailsByPropertyIdAdmin($propertyId);
        //var_dump($property);

        $this->load->helper('path');
        $this->load->library('email');

        $config['protocol'] = 'mail';
        $config['smtp_host'] = 'ssl://mail.bizlink.lk';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'info@bizlink.lk';
        $config['smtp_pass'] = 'yoYt43*4'; //beenu1988
        $config['charset'] = 'iso-8859-1'; # Added
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config); # Added

        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");

        $this->email->from('info@bizlink.lk', 'Bizlink');
        $subject = "We’re on it Bizlink";

        $propertyDetails = $this->PropertyModel->getPropertyDetailsByPropertyIdAdmin($propertyId);
        $propertyImages = $this->PropertyModel->getPropertyImagesByPropertyId($propertyId);

        $data = array(
            'email' => (is_array($property) && count($property) != 0) ? $property[0]->contact_email : null,
            'name' => (is_array($property) && count($property) != 0) ? $property[0]->contact_name : null,
            'userId' => $userId,
            'property' => $propertyDetails,
            'property_images' => $propertyImages
        );

        $this->email->to((is_array($property) && count($property) != 0) ? $property[0]->contact_email : null,"chathu.hasantha@gmail.com");
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

    function sendEmailForPostAdOnline($userId,$propertyId){

        $property = $this->PropertyModel->getPropertyDetailsByPropertyIdAdmin($propertyId);
        //var_dump($property);

        $this->load->helper('path');
        $this->load->library('email');

        $config['protocol'] = 'mail';
        $config['smtp_host'] = 'ssl://mail.bizlink.lk';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'info@bizlink.lk';
        $config['smtp_pass'] = 'yoYt43*4'; //beenu1988
        $config['charset'] = 'iso-8859-1'; # Added
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config); # Added

        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");

        $this->email->from('info@bizlink.lk', 'Bizlink');
        $subject = "We’re on it Bizlink";

        $propertyDetails = $this->PropertyModel->getPropertyDetailsByPropertyIdAdmin($propertyId);
        $propertyImages = $this->PropertyModel->getPropertyImagesByPropertyId($propertyId);

        $data = array(
            'email' => (is_array($property) && count($property) != 0) ? $property[0]->contact_email : null,
            'name' => (is_array($property) && count($property) != 0) ? $property[0]->contact_name : null,
            'userId' => $userId,
            'property' => $propertyDetails,
            'property_images' => $propertyImages
        );

        $this->email->to((is_array($property) && count($property) != 0) ? $property[0]->contact_email : null,"chathu.hasantha@gmail.com");
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

}