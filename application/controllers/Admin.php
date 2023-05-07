<?php
/**
 * Created by PhpStorm.
 * User: ChathurangaH
 * Date: 1/24/18
 * Time: 7:02 PM
 */

include('FileUploader.php');

class Admin extends CI_Controller{

    function __construct() {
        parent::__construct();
        if(empty($this->session->userdata("logged_in_admin")))
        {
            redirect('LoginAdmin','refresh');
        }

        $this->load->model('UserModelAdmin');
        $this->load->model('PropertyModel');
        $this->load->model('UserModel');
    }

    public function index(){
        $data['main_content'] = 'admin/dashboard';
        $this->load->view('admin/includes/template', $data);
    }

    public function new_user(){
        $data['main_content'] = 'admin/user/create';
        $data['userId'] = $this->UserModelAdmin->getUserId()[0]->user_id;
        $data['bp_locations'] = $this->UserModelAdmin->getBPLocations();
        $data['user_roles'] = $this->UserModelAdmin->getUserRoles();
        $data['designations'] = $this->UserModelAdmin->getDesignations();
        $this->load->view('admin/includes/template', $data);
    }

    function store_user(){

        $userId = $this->input->post('user_id');

        $config['upload_path'] = './assets/uploads';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';

        $this->load->library('upload', $config);

        $this->upload->do_upload('user_picture');
        $data = array('upload_data' => $this->upload->data());

        $arrayUser = array(
            'user_id' => $userId,
            'nic' => $this->input->post('user_nic'),
            'first_name' => $this->input->post('user_fname'),
            'last_name' => $this->input->post('user_lname'),
            'email' => $this->input->post('user_email'),
            'phone' => $this->input->post('user_phone'),
            'user_role' => $this->input->post('user_role'),
            'status' => $this->input->post('user_status'),
            'picture' => $data['upload_data']['file_name'],
            'password' => $this->input->post('user_password'),
        );

        $save = $this->UserModelAdmin->store_user($arrayUser);
        $this->UserModelAdmin->updateUserId($userId);
        if ($save){
            return redirect('admin/user_list');
        }else{
            return redirect('errors/html/error_404');
        }
    }

    function delete_user_photo($user_id){
        $delete = $this->UserModelAdmin->getUserNameByUserId($user_id);
        $res = $this->UserModelAdmin->updateUserPicture($user_id);
        $re = unlink("assets/uploads/".$delete[0]->picture);

        if($re){
            return redirect(base_url().'Admin/update_user/'.$user_id);
        }
    }

    function user_list(){
        $data['main_content'] = 'admin/user/list';
        $data['usersList'] = $this->UserModelAdmin->getUsersList();
        $this->load->view('admin/includes/template', $data);
    }

    function update_user($userId){
        $data['main_content'] = 'admin/user/edit';
        $data['user_roles'] = $this->UserModelAdmin->getUserRoles();
        $data['user_details'] = $this->UserModelAdmin->getUserByUserId($userId);
        $data['bp_locations'] = $this->UserModelAdmin->locationDropList();
        $data['designations'] = $this->UserModelAdmin->designationDropList();
        $this->load->view('admin/includes/template', $data);
    }

    function update_user_data(){

        $userId = $this->input->post('user_id');


        $user = $this->UserModelAdmin->getUserNameByUserId($userId);

        $config['upload_path'] = './assets/uploads';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';

        $this->load->library('upload', $config);

        $this->upload->do_upload('user_picture');
        $data = array('upload_data' => $this->upload->data());
        //$image_banner = $data['upload_data']['file_name'];

        if($data['upload_data']['file_name'] != null || $data['upload_data']['file_name'] != ""){
            $image_banner = $data['upload_data']['file_name'];
            $arrayUser = array(
                'nic' => $this->input->post('user_nic'),
                'first_name' => $this->input->post('user_fname'),
                'last_name' => $this->input->post('user_lname'),
                'email' => $this->input->post('user_email'),
                'phone' => $this->input->post('user_phone'),
                'user_role' => $this->input->post('user_role'),
                'status' => $this->input->post('user_status'),
                'picture' => $image_banner,
                'password' => $this->input->post('user_password'),
            );
        }else{
            $image_banner = $user[0]->picture;
            $arrayUser = array(
                'nic' => $this->input->post('user_nic'),
                'first_name' => $this->input->post('user_fname'),
                'last_name' => $this->input->post('user_lname'),
                'email' => $this->input->post('user_email'),
                'phone' => $this->input->post('user_phone'),
                'user_role' => $this->input->post('user_role'),
                'status' => $this->input->post('user_status'),
                'picture' => $image_banner,
                'password' => $this->input->post('user_password'),
            );
        }

//        var_dump($arrayUser);
//        die();




        $save = $this->UserModelAdmin->update_user($arrayUser,$userId);
        if ($save){
            return redirect('admin/user_list');
        }else{
            $this->session->set_flashdata('message_error', 'User not saved, try again.');
            return redirect('admin/update_user/'.$userId);
        }
    }

    function delete_user($userId){
        $data['main_content'] = 'admin/user/delete';
        $data['user_details'] = $this->UserModelAdmin->getUserByUserId($userId);
        $data['bp_locations'] = $this->UserModelAdmin->locationDropList();
        $data['designations'] = $this->UserModelAdmin->designationDropList();
        $this->load->view('admin/includes/template', $data);
    }

    function delete_user_data(){

        $userId = $this->input->post('user_id');

        $save = $this->UserModelAdmin->delete_user($userId);
        if ($save){
            return redirect('admin/user_list');
        }else{
            return redirect('errors/html/error_404');
        }
    }


    //model management

    public function create_model(){
        $data['main_content'] = 'admin/model/create';
        $data['userId'] = $this->UserModelAdmin->getUserId()[0]->user_id;
        $data['bp_locations'] = $this->UserModelAdmin->getBPLocations();
        $data['user_roles'] = $this->UserModelAdmin->getUserRoles();
        $data['designations'] = $this->UserModelAdmin->getDesignations();
        $this->load->view('admin/includes/template', $data);
    }

    public function create_sub_model(){
        $data['main_content'] = 'admin/model/create_submodel';
        $data['userId'] = $this->UserModelAdmin->getUserId()[0]->user_id;
        $data['bp_locations'] = $this->UserModelAdmin->getBPLocations();
        $data['user_roles'] = $this->UserModelAdmin->getUserRoles();
        $data['top_models'] = $this->PropertyModel->getTopModelDropList();
        $data['models'] = $this->PropertyModel->getModelDropList();
        $this->load->view('admin/includes/template', $data);
    }

    public function store_model(){
         $model_id = $this->input->post('model_id');
         $model_name = $this->input->post('model_name');

        $model_type = $this->input->post('model_type');
        if($model_type == "top"){
            $result = $this->PropertyModel->storeTopModel($model_name,$model_id);
        }else{
            $result = $this->PropertyModel->storeModel($model_name,$model_id);
        }
       
        if ($result){
            return redirect('admin/model_list');
        }else{
            return redirect('errors/html/error_404');
        }
    }

    function store_sub_model(){
        $model_id = $this->input->post('model_id');
        $model_name = $this->input->post('model_name');

       $model_type_top = $this->input->post('model_type_top');
       if($model_type_top != "0"){
           $result = $this->PropertyModel->storeSubModel($model_name,$model_id,$model_type_top);
       }else{
           $model_type_normal = $this->input->post('model_type_normal');
           $result = $this->PropertyModel->storeSubModel($model_name,$model_id,$model_type_normal);
       }
      
       if ($result){
           return redirect('admin/model_list');
       }else{
           return redirect('errors/html/error_404');
       }
    }

    function model_list(){
        $data['main_content'] = 'admin/model/list';
        $data['modelList'] = $this->PropertyModel->getModelList();
        $data['topModelList'] = $this->PropertyModel->getTopModelList();
        $this->load->view('admin/includes/template', $data);
    }

    function model_top_list(){
        $data['main_content'] = 'admin/model/list_top';
        $data['modelList'] = $this->PropertyModel->getModelList();
        $data['topModelList'] = $this->PropertyModel->getTopModelList();
        $this->load->view('admin/includes/template', $data);
    }

    function sub_model_list()
    {
        $data['main_content'] = 'admin/model/list_submodel';
        $data['submodelList'] = $this->PropertyModel->getSubModelList();
        $this->load->view('admin/includes/template', $data);
    }

    public function update_model($model_id)
    {
        $data['main_content'] = 'admin/model/edit';
        $data['model'] = $this->PropertyModel->getModelDetailsById($model_id);
        $data['bp_locations'] = $this->UserModelAdmin->getBPLocations();
        $data['user_roles'] = $this->UserModelAdmin->getUserRoles();
        $data['designations'] = $this->UserModelAdmin->getDesignations();
        $this->load->view('admin/includes/template', $data);
    }

    public function update_model_data(){
        
        $id = $this->input->post('id');
        $model_id = $this->input->post('model_id');
        $model_name = $this->input->post('model_name');

       $model_type = $this->input->post('model_type');
       if($model_type == "top"){
           $result = $this->PropertyModel->updateTopModel($model_name,$model_id,$id);
       }else{
           $result = $this->PropertyModel->updateModel($model_name,$model_id,$id);
       }
      
       if ($result){
           return redirect('admin/model_list');
       }else{
           return redirect('errors/html/error_404');
       }
   }

    public function update_top_model($model_id)
    {
        $data['main_content'] = 'admin/model/edit_top';
        $data['topmodel'] = $this->PropertyModel->getTopModelDetailsById($model_id);
        $data['bp_locations'] = $this->UserModelAdmin->getBPLocations();
        $data['user_roles'] = $this->UserModelAdmin->getUserRoles();
        $data['designations'] = $this->UserModelAdmin->getDesignations();
        $this->load->view('admin/includes/template', $data);
    }

    public function delete_model($model_id)
    {
        $data['main_content'] = 'admin/model/delete';
        $data['model'] = $this->UserModelAdmin->getModelDetailsById($model_id);
        $data['bp_locations'] = $this->UserModelAdmin->getBPLocations();
        $data['user_roles'] = $this->UserModelAdmin->getUserRoles();
        $data['designations'] = $this->UserModelAdmin->getDesignations();
        $this->load->view('admin/includes/template', $data);
    }


    public function delete_top_model($model_id)
    {
        $data['main_content'] = 'admin/model/delete_top';
        $data['topmodel'] = $this->UserModelAdmin->getTopModelDetailsById($model_id);
        $data['bp_locations'] = $this->UserModelAdmin->getBPLocations();
        $data['user_roles'] = $this->UserModelAdmin->getUserRoles();
        $data['designations'] = $this->UserModelAdmin->getDesignations();
        $this->load->view('admin/includes/template', $data);
    }

//     function delete_user_photo($user_id){
//         $delete = $this->UserModelAdmin->getUserNameByUserId($user_id);
//         $res = $this->UserModelAdmin->updateUserPicture($user_id);
//         $re = unlink("assets/uploads/".$delete[0]->picture);

//         if($re){
//             return redirect(base_url().'Admin/update_user/'.$user_id);
//         }
//     }

//     function user_list(){
//         $data['main_content'] = 'admin/user/list';
//         $data['usersList'] = $this->UserModelAdmin->getUsersList();
//         $this->load->view('admin/includes/template', $data);
//     }

//     function update_user($userId){
//         $data['main_content'] = 'admin/user/edit';
//         $data['user_roles'] = $this->UserModelAdmin->getUserRoles();
//         $data['user_details'] = $this->UserModelAdmin->getUserByUserId($userId);
//         $data['bp_locations'] = $this->UserModelAdmin->locationDropList();
//         $data['designations'] = $this->UserModelAdmin->designationDropList();
//         $this->load->view('admin/includes/template', $data);
//     }

//     function update_user_data(){

//         $userId = $this->input->post('user_id');


//         $user = $this->UserModelAdmin->getUserNameByUserId($userId);

//         $config['upload_path'] = './assets/uploads';
//         $config['allowed_types'] = 'gif|jpg|jpeg|png';

//         $this->load->library('upload', $config);

//         $this->upload->do_upload('user_picture');
//         $data = array('upload_data' => $this->upload->data());
//         //$image_banner = $data['upload_data']['file_name'];

//         if($data['upload_data']['file_name'] != null || $data['upload_data']['file_name'] != ""){
//             $image_banner = $data['upload_data']['file_name'];
//             $arrayUser = array(
//                 'nic' => $this->input->post('user_nic'),
//                 'first_name' => $this->input->post('user_fname'),
//                 'last_name' => $this->input->post('user_lname'),
//                 'email' => $this->input->post('user_email'),
//                 'phone' => $this->input->post('user_phone'),
//                 'user_role' => $this->input->post('user_role'),
//                 'status' => $this->input->post('user_status'),
//                 'picture' => $image_banner,
//                 'password' => $this->input->post('user_password'),
//             );
//         }else{
//             $image_banner = $user[0]->picture;
//             $arrayUser = array(
//                 'nic' => $this->input->post('user_nic'),
//                 'first_name' => $this->input->post('user_fname'),
//                 'last_name' => $this->input->post('user_lname'),
//                 'email' => $this->input->post('user_email'),
//                 'phone' => $this->input->post('user_phone'),
//                 'user_role' => $this->input->post('user_role'),
//                 'status' => $this->input->post('user_status'),
//                 'picture' => $image_banner,
//                 'password' => $this->input->post('user_password'),
//             );
//         }

// //        var_dump($arrayUser);
// //        die();




//         $save = $this->UserModelAdmin->update_user($arrayUser,$userId);
//         if ($save){
//             return redirect('admin/user_list');
//         }else{
//             $this->session->set_flashdata('message_error', 'User not saved, try again.');
//             return redirect('admin/update_user/'.$userId);
//         }
//     }

//     function delete_user($userId){
//         $data['main_content'] = 'admin/user/delete';
//         $data['user_details'] = $this->UserModelAdmin->getUserByUserId($userId);
//         $data['bp_locations'] = $this->UserModelAdmin->locationDropList();
//         $data['designations'] = $this->UserModelAdmin->designationDropList();
//         $this->load->view('admin/includes/template', $data);
//     }

//     function delete_user_data(){

//         $userId = $this->input->post('user_id');

//         $save = $this->UserModelAdmin->delete_user($userId);
//         if ($save){
//             return redirect('admin/user_list');
//         }else{
//             return redirect('errors/html/error_404');
//         }
//     }

    //end of model management

    function create_property(){

        $refId = $this->PropertyModel->getRefId();

        $str2 = substr($refId, 3);

        if($str2 == null){
            $str2 = 0;
        }


        $plusrefId = $str2 + 1;

        $newRefId = "BA" . sprintf("%04d", $plusrefId);

        $data['main_content'] = 'admin/product/create';
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
        $this->load->view('admin/includes/template', $data);
    }

    public function store_property(){
        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
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


        if(is_array($car_brand_arr) && count($car_brand_arr) != 0){
            $car_brand = $car_sale_arr[0]->name;
        }

        $model_arr = $this->PropertyModel->getModelNameById($this->input->post('pro_model'));
        if(is_array($model_arr) && count($model_arr) != 0){
            $model = $model_arr[0]->name;
        }

        $loc_arr = $this->PropertyModel->getDistrictNameById($this->input->post('pro_district'));
        if(is_array($loc_arr) && count($loc_arr) != 0){
            $loc = $loc_arr[0]->dname;
        }

        $search_text = $car_sale . " " . $car_brand . " " . $model . " " . $loc;

        $arrayProperty = array(
            'property_id' => $maxPropertyId,
            'car_sale_id' => $this->input->post('car_sale_select'),
            'body_type' => $this->input->post('pro_body_type'),
            'brand' => $this->input->post('pro_brand'),
            'model' => $this->input->post('pro_model'),
//            'title' => $this->input->post('property_title'),
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

        $maxPayId = $this->PropertyModel->getMaxPaymentId();
        if($maxPayId == null){
            $maxPayId = 0;
        }

        $maxPayId = $maxPayId + 1;

        $arrayPay = array(
            'payment_id' => $maxPayId,
            'amount' => $this->input->post('featured_ad_amount'),
            'user_id' => $userId,
            'payment_date' => date('Y-m-d'),
            'payment_time' => date('H:i:s'),
            'ad_id' => $maxPropertyId,
            'duration' => 4,
            'year' => date('Y'),
            'status'=> "pending",
            'reference' => "REF_ADMIN_". $maxPropertyId,
            'transactionId' => "REF_ADMIN_". $maxPropertyId,
            'description' => "admin",
            'is_featured' => $this->input->post('feature_ad'),
            'payment_method' => 'admin',
        );

        $this->PropertyModel->savePaymentDetails($arrayPay);
        $saveAll = $this->PropertyModel->storeProperty($arrayProperty);
        if($saveAll){
            $this->sendEmailForPostAd($this->input->post('pro_contact_email'), $this->input->post('pro_contact_name'),$userId, $maxPropertyId);
            $this->session->set_flashdata('message_suc_property', 'Your property Added Successfully.');
            redirect('admin/list_properties');
        }
    }

    function list_properties(){
        $data['properties'] = $this->PropertyModel->getAllPropertiesAdmin();
        $data['main_content'] = 'admin/product/list';
        $this->load->view('admin/includes/template', $data);
    }

    function list_wanted_properties(){
        $data['properties'] = $this->PropertyModel->getAllWantedActiveAds();
        $data['main_content'] = 'admin/product/list_wanted';
        $this->load->view('admin/includes/template', $data);
    }

    function sub_model_by_brand($brandId){
        $carsale = $this->PropertyModel->getModelsListByBrand($brandId);
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($carsale));
    }

    function car_sale_details_by_id($carsaleId){
        $carsale = $this->PropertyModel->getCompanyDetailsById($carsaleId);
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($carsale));
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
        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
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
        if(empty($this->session->userdata("logged_in_admin"))) {
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

    function sendEmailForPostAd($cus_email, $cus_name,$userId,$propertyId){


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

    public function update_property(){

        //var_dump($this->input->post());

        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
        }
        $userId = $this->input->post('user_id');
//        $maxPropertyId = $this->PropertyModel->getMaxPropertyId();
//        if($maxPropertyId == null){
//            $maxPropertyId = 0;
//        }
//
        $maxPropertyId = $this->input->post('property_id');
        $property = $this->PropertyModel->getPropertyDetailsByPropertyIdAdmin($maxPropertyId);

//
//        $result = $this->PropertyModel->getPropertyImagesByPropertyId($maxPropertyId);
//        if(count($result) == 0){
//            $this->session->set_flashdata('message_error_property', 'Apply your property images.');
//            redirect('admin/edit/'.$maxPropertyId);
//
//        }

        $propertyfeatures_list = $this->input->post('feature_list');

        if(is_array($propertyfeatures_list) && count($propertyfeatures_list) > 0){
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
        }elseif($image_banner != ""){
            $image_banner = $data['upload_data']['file_name'];
        }elseif ($image_banner == NULL){
            $image_banner = $property[0]->main_image;
        }else{
            $image_banner = $property[0]->main_image;
        }

        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+3 months");
        $expire_date =  $date->format("Y-m-d H:i:s");

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

        $loc_arr = $this->PropertyModel->getDistrictNameById($this->input->post('pro_district'));
        if(is_array($loc_arr) && count($loc_arr) != 0){
            $loc = $loc_arr[0]->dname;
        }

        $arrayProperty = array(
            'car_sale_id' => $this->input->post('car_sale_select'),
            'body_type' => $this->input->post('pro_body_type'),
            'brand' => $this->input->post('pro_brand'),
            'model' => $this->input->post('pro_model'),
//            'title' => $this->input->post('property_title'),
            'price_type' => $this->input->post('pro_price_type'),
            'price ' => $this->input->post('pro_price'),
//            'price_on_request' => $this->input->post('price_onrequest'),
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
            'featured' => $this->input->post('feature_ad'),
            'posted_date' => date('Y-m-d H:i:s'),
            'user_id' => $this->input->post('user_id'),
            'color' => $this->input->post('property_color'),
            'interior_color' => $this->input->post('property_inte_color'),
            'show_in_ad_regno' => $this->input->post('show_in_ad_regno'),
            'pro_regi_no' => $this->input->post('pro_regi_no'),
            'seat_count' => $this->input->post('property_seat_count'),
            'ref_id' => $this->input->post('pro_refid'),
            'search_text' => $car_sale . " " . $car_brand . " " . $model . " " . $loc
        );


        //var_dump($arrayProperty);

        $saveAll = $this->PropertyModel->updateProperty($arrayProperty, $maxPropertyId);
        if($saveAll){
            $this->session->set_flashdata('message_suc_property', 'Your property updated Successfully.');
            redirect('admin/list_properties');
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

        return redirect('admin/edit/'.$propertyId);
    }

    function view($propertyId,$title){
        $data['property'] = $this->PropertyModel->getPropertyDetailsByPropertyId($propertyId);
        $data['main_content'] = 'user/property_view';
        $this->load->view('admin/includes/template', $data);
    }

    function edit($propertyId){
        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
        }
        $data['car_sales'] =$this->PropertyModel->getCarSaleDropList(1);
        $data['ad_types'] = $this->PropertyModel->getPropertyAdCategories();
        $data['features'] =$this->PropertyModel->getFeaturesByPropertyTypeId(1);
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['countries'] = $this->UserModel->locationDropList();
        $data['body_types'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['colors'] = $this->PropertyModel->getColorDropList();
        $data['models'] = $this->PropertyModel->getModelsList();
        $data['top_models'] = $this->PropertyModel->getTopModelsList();
        $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
        $data['trans_types'] = $this->PropertyModel->getTransmissionTypesForForm();
        $data['main_properties'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['property'] = $this->PropertyModel->getPropertyDetailsByPropertyIdAdmin($propertyId);
        $data['main_content'] = 'admin/product/edit';
        $this->load->view('admin/includes/template', $data);
    }

    function wanted_edit($propertyId){
        $data['main_properties'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['property'] = $this->PropertyModel->getWantedPropertyDetailsByPropertyId($propertyId);

        $data['main_content'] = 'admin/product/edit_wanted';
        $this->load->view('admin/includes/template', $data);
    }

    public function update_property_wanted(){

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
            $this->session->set_flashdata('message_suc_property_wanted', 'Your property (wanted) Updated Successfully.');
            redirect('admin/list_wanted_properties');
        }

    }


    function wanted_delete($propertyId){
        $data['main_properties'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['property'] = $this->PropertyModel->getWantedPropertyDetailsByPropertyId($propertyId);

        $data['main_content'] = 'admin/product/wanted_delete';
        $this->load->view('admin/includes/template', $data);
    }



    function delete_property_wanted(){
        $propertyId = $this->input->post('property_id');
        $userId = $this->input->post('user_id');
        $delete= $this->PropertyModel->deleteWantedProperty($propertyId);
        if($delete){
            $this->session->set_flashdata('message_delete_property_wanted', 'Property (wanted) deleted Successfully.');
            redirect('admin/list_wanted_properties');
        }
    }

    function delete($propertyId){
        $data['car_sales'] =$this->PropertyModel->getCarSaleDropList(1);
        $data['ad_types'] = $this->PropertyModel->getPropertyAdCategories();
        $data['features'] =$this->PropertyModel->getFeaturesByPropertyTypeId(1);
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['colors'] = $this->PropertyModel->getColorDropList();
        $data['countries'] = $this->UserModel->locationDropList();
        $data['body_types'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['models'] = $this->PropertyModel->getModelsForForm();
        $data['fuel_types'] = $this->PropertyModel->getFuelTypesForForm();
        $data['trans_types'] = $this->PropertyModel->getTransmissionTypesForForm();
        $data['property'] = $this->PropertyModel->getPropertyDetailsByPropertyIdAdmin($propertyId);
        $data['main_content'] = 'admin/product/delete';
        $this->load->view('admin/includes/template', $data);
    }

    function property_delete(){
        $propertyId = $this->input->post('property_id');
        $userId = $this->input->post('user_id');
        $delete= $this->PropertyModel->deleteProperty($propertyId);
        $deleteImages= $this->PropertyModel->deletePropertyImages($propertyId);
        $deleteFeatued = $this->PropertyModel->deleteFeaturedPropertyDetails($propertyId);
        if($delete && $deleteImages){
            $this->session->set_flashdata('message_delete_property', 'Property deleted Successfully.');
            redirect('admin/list_properties');
        }
    }

    function analytics(){
        //var_dump($this->PropertyModel->getCountByPostAdCategoryId());
        $data['districts'] = $this->PropertyModel->getAllDistricts();
        $data['countries'] = $this->UserModel->locationDropList();
        $data['postViewCount'] = $this->PropertyModel->getCountByPostAdCategoryId();
        $data['viewAdsCount'] = $this->PropertyModel->getCountByPostAdPropertyId();
        $data['main_properties'] =$this->PropertyModel->getPropertyTypesForForm();
        $data['main_content'] = 'admin/analytic/view';
        $this->load->view('admin/includes/template', $data);
    }

    function service(){
        $data['main_content'] = 'admin/service/create';
        $data['bp_locations'] = $this->PropertyModel->getServiceTypes();
        $this->load->view('admin/includes/template', $data);
    }

    function edit_service($serviceId){
        $data['main_content'] = 'admin/service/edit';
        $data['bp_locations'] = $this->PropertyModel->getServiceTypesDropList();
        $data['service'] = $this->PropertyModel->getServiceDetailsById($serviceId);
        $this->load->view('admin/includes/template', $data);
    }

    function delete_service($serviceId){
        $data['main_content'] = 'admin/service/delete';
        $data['bp_locations'] = $this->PropertyModel->getServiceTypesDropList();
        $data['service'] = $this->PropertyModel->getServiceDetailsById($serviceId);
        $this->load->view('admin/includes/template', $data);
    }

    function delete_service_post(){
        $serviceId = $this->input->post('service_id');
        $delete= $this->PropertyModel->deleteServiceByServiceId($serviceId);
        if($delete){
            $this->session->set_flashdata('message_delete_property_service', 'Service deleted Successfully.');
            redirect('admin/list_services');
        }
    }

    function list_services(){
        $data['main_content'] = 'admin/service/list';
        $data['services'] = $this->PropertyModel->getServicesList();
        $this->load->view('admin/includes/template', $data);
    }


    public function uploadServiceImages(){
        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
        }
        $FileUploader = new FileUploader('banner_image', array(
            'uploadDir' => 'assets/uploads/',
            'title' => 'name',
            'fileMaxSize' => '500MB',
            'limit' => 2,
        ));

        $maxServiceId = $this->PropertyModel->getMaxServiceId();
        if($maxServiceId == null){
            $maxServiceId = 0;
        }

        $maxServiceId = $maxServiceId + 1;

        // call to upload the files
        $data = $FileUploader->upload();
        var_dump($data);

        if($data['isSuccess']) {
            // get the uploaded files
            $files = $data['files'];
            var_dump($files);
        }
        if($data['hasWarnings']) {
            // get the warnings
            $warnings = $data['warnings'];
            var_dump($warnings);
        };
        if($data['files'] != null) {
            // get the uploaded files
            //$this->PropertyModel->storeServiceImages($maxServiceId,$data['files'][0]['name']);
        }
//        return $this->output
//            ->set_content_type('application/json')
  //          ->set_output(json_encode($data));

    }

    public function store_services(){

        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
        }

        $maxServicesId = $this->PropertyModel->getMaxServiceId();
        if($maxServicesId == null){
            $maxServicesId = 0;
        }
//
        $maxServicesId = $maxServicesId + 1;
//
        $result = $this->PropertyModel->getServiceImagesByServiceId($maxServicesId);
        if(count($result) == 0){
            $this->session->set_flashdata('message_error_property', 'Apply your services images.');
            redirect('admin/services');

        }

        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+3 months");
        $expire_date =  $date->format("Y-m-d H:i:s");


        $arrayServices = array(
            'service_id' => $maxServicesId,
            'title' => $this->input->post('service_title'),
            'service_type' => $this->input->post('service_type'),
            'service_desc' => $this->input->post('service_desc'),
            'locations' => $this->input->post('service_loc'),
            'service_category' => $this->input->post('service_category'),
            'name' => $this->input->post('contact_name'),
            'phone' => $this->input->post('contact_phone'),
            'email ' => $this->input->post('contact_email'),
            'posted_date' => date('Y-m-d H:i:s')
        );

        //var_dump($arrayProperty);

        $saveAll = $this->PropertyModel->storeService($arrayServices);
        if($saveAll){
            redirect('admin/list_services');
        }
    }

    public function update_services(){

        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
        }

        $maxServicesId = $this->input->post('service_id');

        $result = $this->PropertyModel->getServiceImagesByServiceId($maxServicesId);
        if(count($result) == 0){
            $this->session->set_flashdata('message_error_property', 'Apply your services images.');
            redirect('admin/services');

        }

        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+3 months");
        $expire_date =  $date->format("Y-m-d H:i:s");


        $arrayServices = array(
            'title' => $this->input->post('service_title'),
            'service_type' => $this->input->post('service_type'),
            'service_desc' => $this->input->post('service_desc'),
            'locations' => $this->input->post('service_loc'),
            'service_category' => $this->input->post('service_category'),
            'name' => $this->input->post('contact_name'),
            'phone' => $this->input->post('contact_phone'),
            'email ' => $this->input->post('contact_email')
        );

        //var_dump($arrayProperty);

        $saveAll = $this->PropertyModel->updateService($arrayServices, $maxServicesId);
        if($saveAll){
            $this->session->set_flashdata('message_service_edit', 'Service updated Successfully.');
            redirect('admin/list_services');
        }
    }

    function getServiceImagesByServiceId($serviceId){
        $this->db->from('service_images');
        $this->db->where('service_id',$serviceId);
        $this->db->where('dlt_status',0);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function featured($propertyId){

            $update = $this->PropertyModel->addPropertyAsFeatured($propertyId);
            if($update){
                $this->session->set_flashdata('message_featured', 'Vehicle add as featured property.');
                redirect('admin/list_properties');
            }


    }

//    function approved($propertyId){
//
//        $update = $this->PropertyModel->addPropertyAsApproved($propertyId);
//        if($update){
//            $this->session->set_flashdata('message_featured', 'Vehicle ad approved Successfully.');
//            redirect('admin/list_properties');
//        }
//
//
//    }

    function approved($propertyId){
        $pay = $this->PropertyModel->getPaymentDetailsByAdIdForRenew($propertyId);
        //var_dump($pay[0]->duration);
        if(is_array($pay) && count($pay) != 0){
            $duration = $this->PropertyModel->getDurationDetailsById($pay[0]->duration);
            // var_dump($duration);
            if(is_array($duration) && count($duration) != 0){
                $expires = strtotime($pay[0]->approved_date." + " . $duration[0]->name);
                $expire_date =  date("Y-m-d", $expires);
            }

        }
        $update = $this->PropertyModel->addPropertyAsApproved($propertyId, date('Y-m-d'),$expire_date);
        if($update){
            $this->session->set_flashdata('message_featured', 'Vehicle ad approved Successfully.');
            redirect('admin/list_properties');
        }


    }

    function set_featured($propertyId){
        $data['property_id'] = $propertyId;
        $data['main_content'] = 'admin/product/featured';
        $this->load->view('admin/includes/template', $data);
    }

    function store_featured_property(){
        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
        }

        $config['upload_path'] = './assets/uploads';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';

        $this->load->library('upload', $config);

        $this->upload->do_upload('payment_slip_img');
        $data = array('upload_data' => $this->upload->data());

        $arrayServices = array(
            'vehicle_id' => $this->input->post('property_id'),
            'customer_name' => $this->input->post('customer_name'),
            'email' => $this->input->post('customer_email'),
            'amount' => $this->input->post('pro_price'),
            'description' => $this->input->post('ad_description'),
            'user_id' => $this->input->post('user_id'),
            'payment_date' => date('Y-m-d H:i:s'),
            'file_name' => $data['upload_data']['file_name']
        );

        //var_dump($arrayProperty);

        $saveAll = $this->PropertyModel->storeFeaturedPayment($arrayServices);
        $update = $this->PropertyModel->addPropertyAsFeatured($this->input->post('property_id'));
        if($saveAll){
            $this->session->set_flashdata('message_featured', 'Featured vahicle payment details added Successfully.');
            redirect('admin/list_featured');
        }
    }

    function list_featured(){
        $data['featured_list'] = $this->PropertyModel->getFeaturedList();
        $data['main_content'] = 'admin/product/featured_list';
        $this->load->view('admin/includes/template', $data);
    }

    function create_company(){
        $data['main_content'] = 'admin/company/create';
        $data['bp_locations'] = $this->PropertyModel->getAllDistricts();
        $this->load->view('admin/includes/template', $data);
    }

    function storeCompany(){
        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
        }

        $config['upload_path'] = 'assets/uploads/company';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 100;

        $this->load->library('upload', $config);

        //$this->upload->do_upload('company_logo');
        //$data = array('upload_data' => $this->upload->data());


        $this->upload->do_upload('company_logo');
        $datax = array('upload_data' => $this->upload->data());

        $this->upload->do_upload('company_banner');
        $data = array('upload_data_banner' => $this->upload->data());

//        var_dump($data);
//        var_dump($datax);

//        if ( ! $this->upload->do_upload('company_logo'))
//        {
//            $error = array('error' => $this->upload->display_errors());
//        }
//        else
//        {
//            $data = array('upload_data' => $this->upload->data());
//        }
//
//        if ( ! $this->upload->do_upload('company_banner'))
//        {
//            $error = array('error' => $this->upload->display_errors());
//        }
//        else
//        {
//            $datax = array('upload_data' => $this->upload->data());
//        }

        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+3 months");
        $expire_date =  $date->format("Y-m-d H:i:s");



        $arrayCompany = array(
            'name' => $this->input->post('company_name'),
            'location' => $this->input->post('emp_bplocation'),
            'description' => $this->input->post('company_description'),
            'address' => $this->input->post('company_address'),
            'email' => $this->input->post('company_email'),
            'contactno' => $this->input->post('company_contactno'),
            'cperson' => $this->input->post('company_contactp'),
            'user_status' => "active",
            'logo' =>  (count($datax['upload_data']) != 0) ? $datax['upload_data']['file_name'] : null,
            'banner' => (count($data['upload_data_banner']) != 0) ?  $data['upload_data_banner']['file_name'] : null,
            'posted_date' => date('Y-m-d H:i:s')
        );

        //var_dump($arrayCompany);

        $saveAll = $this->PropertyModel->storeCompany($arrayCompany);
        if($saveAll){
            $this->session->set_flashdata('message_save_c', 'Company added successfully.');
            redirect('admin/list_companies');
        }
    }

    function list_companies(){
        $data['main_content'] = 'admin/company/list';
        $data['companies'] = $this->PropertyModel->getCompaniesList();
        $this->load->view('admin/includes/template', $data);
    }

    function update_company($companyId){
        $data['bp_locations'] = $this->UserModelAdmin->locationDropList();
        $data['company'] = $this->PropertyModel->getCompanyDetailsById($companyId);

        $data['main_content'] = 'admin/company/edit';
        $this->load->view('admin/includes/template', $data);
    }

    function delete_company($companyId){
        $data['bp_locations'] = $this->UserModelAdmin->locationDropList();
        $data['company'] = $this->PropertyModel->getCompanyDetailsById($companyId);

        $data['main_content'] = 'admin/company/delete';
        $this->load->view('admin/includes/template', $data);
    }

    function deleteCompanyDetails(){
        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
        }
        $companyId = $this->input->post('company_id');

        $delete = $this->PropertyModel->getCompanyDetailsById($companyId);
        $re = unlink("assets/uploads/".$delete[0]->logo);

        $res = $this->PropertyModel->deleteCompany($companyId);
        if($res){
            $this->session->set_flashdata('message_company_delete', 'Company deleted Successfully.');
            redirect('admin/list_companies');
        }
    }

    function updateCompanyDetails(){
        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
        }

        $config['upload_path'] = 'assets/uploads/company';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 100;

        $this->load->library('upload', $config);

        $this->upload->do_upload('company_logo');
        $data = array('upload_data' => $this->upload->data());

        $this->upload->do_upload('company_banner');
        $dataBanner = array('upload_data_banner' => $this->upload->data());

       // var_dump($data);


//        if ( ! $this->upload->do_upload('company_logo'))
//        {
//            $error = array('error' => $this->upload->display_errors());
//        }
//        else
//        {
//            $data = array('upload_data' => $this->upload->data());
//        }
//
//        if ( ! $this->upload->do_upload('company_banner'))
//        {
//            $error = array('error' => $this->upload->display_errors());
//        }
//        else
//        {
//            $datax = array('upload_data_ban' => $this->upload->data());
//        }


        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+3 months");
        $expire_date =  $date->format("Y-m-d H:i:s");

        $companyId = $this->input->post('company_id');

        $arrayCompany = array(
            'name' => $this->input->post('company_name'),
            'location' => $this->input->post('emp_bplocation'),
            'description' => $this->input->post('company_description'),
            'address' => $this->input->post('company_address'),
            'email' => $this->input->post('company_email'),
            'contactno' => $this->input->post('company_contactno'),
            'cperson' => $this->input->post('company_contactp'),
            'logo' => $data['upload_data']['file_name'],
            'user_status' => $this->input->post('user_status'),
            'banner' => $dataBanner['upload_data_banner']['file_name'],
            'posted_date' => date('Y-m-d H:i:s')
        );

        //var_dump($arrayProperty);

        $saveAll = $this->PropertyModel->updateCompany($arrayCompany, $companyId);
        if($saveAll){
            $this->session->set_flashdata('message_company_edit', 'Company updated Successfully.');
            redirect('admin/list_companies');
        }
    }

    function delete_main_image($id){
        $delete = $this->PropertyModel->getPropertyDetailsByPropertyId($id);
        $res = $this->PropertyModel->updatePropertyMainImage($id);
        $re = unlink("assets/uploads/".$delete[0]->logo);

        if($re){
            $this->session->set_flashdata('message_logo_dlt', 'Main Image deleted Successfully.');
            return redirect(base_url().'Admin/edit/'.$id);
        }
    }



    function create_category(){
        $data['main_content'] = 'admin/category/create';
        $data['categories'] = $this->UserModelAdmin->categoryDropList();
        $this->load->view('admin/includes/template', $data);
    }

    function storeCategory(){
        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
        }

        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+3 months");
        $expire_date =  $date->format("Y-m-d H:i:s");

        $sort_order = $this->input->post('category_sort_order');

        if($this->input->post('parent_category') == "0"){
            $sort_result = $this->UserModelAdmin->checkSortOrderExists($sort_order);
            if(is_array($sort_result) && count($sort_result) != 0){
                $this->session->set_flashdata('message_company_delete', 'Sort number already exists, try again.');
                redirect('admin/create_category');
            }
        }


        $maxCatId = $this->UserModelAdmin->getMaxCategoryId();
        if($maxCatId == null){
            $maxCatId = 0;
        }
//
        $maxCatId = $maxCatId + 1;
//

        $arrayCompany = array(
            'category_id' => $maxCatId,
            'name' => $this->input->post('category_name'),
            'description' => $this->input->post('category_description'),
            'parent' => $this->input->post('parent_category'),
            'sort' => $this->input->post('category_sort_order'),
            'status' => "active",
            'posted_date' => date('Y-m-d H:i:s')
        );

        //var_dump($arrayProperty);

        $saveAll = $this->UserModelAdmin->storeCategory($arrayCompany);
        if($saveAll){
            $this->session->set_flashdata('message_save_c', 'Category added successfully.');
            redirect('admin/list_categories');
        }
    }

    function list_categories(){
        $data['main_content'] = 'admin/category/list';
        $data['categories'] = $this->UserModelAdmin->getCategoriesList();
        $this->load->view('admin/includes/template', $data);
    }

    function update_category($catId){
        $data['bp_locations'] = $this->UserModelAdmin->locationDropList();
        $data['category'] = $this->UserModelAdmin->getCategoryDetailsById($catId);
        $data['categories'] = $this->UserModelAdmin->categoryDropList();
        $data['main_content'] = 'admin/category/edit';
        $this->load->view('admin/includes/template', $data);
    }

    function delete_category($catId){
        $data['bp_locations'] = $this->UserModelAdmin->locationDropList();
        $data['category'] = $this->UserModelAdmin->getCategoryDetailsById($catId);
        $data['categories'] = $this->UserModelAdmin->categoryDropList();
        $data['main_content'] = 'admin/category/delete';
        $this->load->view('admin/includes/template', $data);
    }

    function deleteCategoryDetails(){
        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
        }
        $catId = $this->input->post('cat_id');


        $res = $this->UserModelAdmin->deleteCategory($catId);
        if($res){
            $this->session->set_flashdata('message_company_delete', 'Category deleted Successfully.');
            redirect('admin/list_categories');
        }
    }

    function updateCategoryDetails(){
        if(empty($this->session->userdata("logged_in_admin"))) {
            redirect('LoginAdmin','refresh');
        }

        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+3 months");
        $expire_date =  $date->format("Y-m-d H:i:s");

        $catId = $this->input->post('cat_id');

        $sort_order = $this->input->post('category_sort_order');

//        $sort_result = $this->UserModelAdmin->checkSortOrderExists($sort_order);
//        if(is_array($sort_result) && count($sort_result) != 0){
//            $this->session->set_flashdata('message_company_delete', 'Sort number already exists, try again.');
//            redirect('admin/update_category/'. $catId);
//        }


        $arrayCompany = array(
            'name' => $this->input->post('category_name'),
            'description' => $this->input->post('category_description'),
            'parent' => $this->input->post('parent_category'),
            'sort' => $this->input->post('category_sort_order'),
            'status' => $this->input->post('user_status'),
            'posted_date' => date('Y-m-d H:i:s')
        );

        //var_dump($arrayProperty);

        $saveAll = $this->UserModelAdmin->updateCategory($arrayCompany, $catId);
        if($saveAll){
            $this->session->set_flashdata('message_company_edit', 'Category updated Successfully.');
            redirect('admin/list_categories');
        }
    }


    function sub_body_types_by_id($bodytypeId){
        $submodels = $this->UserModelAdmin->getSubMenuItemsByParentId($bodytypeId);
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($submodels));
    }

    //payment functions

    function fund_transfer_list(){
        $data['enrolls'] = $this->PropertyModel->getPendingFundTranferList();
        $data['main_content'] = 'admin/payments/list';
        $this->load->view('admin/includes/template', $data);
    }

    function approve_payment_fund($paymentId,$duration){

        $durationD = $this->PropertyModel->getDurationDetailsById($duration);
        $noOfWeeks = (is_array($durationD) && count($durationD) ? $durationD[0]->d_id : null);


        $current_date = date('Y-m-d H:i:s');
        $date = new DateTime("+" .$noOfWeeks. "weeks");
        $expire_date =  $date->format("Y-m-d H:i:s");

        $arraySession = array(
            'status' => 1,
            'approved_date' => date('Y-m-d'),
            'expire_date' => $expire_date
        );

        $save = $this->PropertyModel->updatePayment($paymentId,$arraySession);
        if($save){
            $this->session->set_flashdata('message_suc_payment', 'Payment has been approved Successfully.');
            redirect(base_url().'admin/fund_transfer_list');
        }
    }


    function payment_details($propertyId){
        $data['payment'] = $this->PropertyModel->getPaymentDetailsByAdIdForRenew($propertyId);
        $data['main_content'] = 'admin/product/payment_details';
        $this->load->view('admin/includes/template', $data);
    }

    function approve_payment(){
        $adId = $this->input->post('ad_id');
        $update = $this->PropertyModel->approveAdvertisement($adId);
        if($update){
            $this->session->set_flashdata('message_suc_product', 'Payment of the ad approved Successfully.');
            redirect('admin/list_properties');
        }
    }


}