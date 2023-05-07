<?php

Class UserModelAdmin extends CI_Model
{
    function login($username, $password)
    {
        $result = null;

        $this -> db -> select('*');
        $this -> db -> from('user');
        $this -> db -> where('email', $username);
        $this -> db -> where('password', $password);
        $this -> db -> limit(1);

        $query = $this -> db -> get();
        $result = $query->result();

        if($query -> num_rows() == 1)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }



    function validateNICPPForgotPassword($nicpp)
    {
        $result = null;

        $this -> db -> select('*');
        $this -> db -> from('user');
        $this -> db -> where('nic', $nicpp);
        $this -> db -> limit(1);

        $query = $this -> db -> get();
        $result = $query->result();

        if(count($result) != 0){
            $result = $query->result();
        }else{
            $this -> db -> select('*');
            $this -> db -> from('user');
            $this -> db -> where('passport', $nicpp);
            $this -> db -> limit(1);

            $query = $this -> db -> get();
            $result = $query->result();
        }


        if($query -> num_rows() == 1)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }


    function updateNewPassword($userId,$arrayChngePass){
        $this->db->where('user_id', $userId);
        $this->db->update('user', $arrayChngePass);
        $afftectedRows = $this->db->affected_rows();

        if($afftectedRows == 1){
            return true;
        }else{
            return false;
        }
    }

    function getUserNameByUserId($userId){
        $this -> db -> select('*');
        $this -> db -> from('user');
        $this -> db -> where('user_id', $userId);
        $query = $this -> db -> get();
        return $query->result();
    }

    function updateUserPicture($userid){
        $queryUpdate = $this->db->query("update user set picture = '' where user_id= $userid");
        if($queryUpdate){
            return true;
        }else{
            return false;
        }
    }

    function getUserRoleById($roleId){
        $this -> db -> select('*');
        $this -> db -> from('user_roles');
        $this -> db -> where('id', $roleId);
        $query = $this -> db -> get();
        return $query->result();
    }


    function updateSignUpVerificationStatus($userId, $status){
        $arrayChgStatus = array(
            'user_verified' => $status
        );
        $this->db->where('user_id', $userId);
        $this->db->update('user', $arrayChgStatus);
        $afftectedRows = $this->db->affected_rows();

        if($afftectedRows == 1){
            return true;
        }else{
            return false;
        }
    }

    function checkSignUpEmailAvailability($email){
        $this->db->from('user');
        $this->db->where('email',$email);
        $queryList = $this->db->get();
        return $queryList->result();
    }

    function checkSignUpIDPassport($nicpp_type, $nicpp){
        if($nicpp_type == "nic"){
            $this->db->from('user');
            $this->db->where('nic',$nicpp);
            $queryList = $this->db->get();
        }else{
            $this->db->from('user');
            $this->db->where('passport',$nicpp);
            $queryList = $this->db->get();
        }
        return $queryList->result();
    }

    function updateUserId($userId){
        $newUserId = $userId + 1;
        $queryUpdate = $this->db->query("update user_id_gen set user_id = $newUserId where user_id=$userId");
        if($queryUpdate){
            return true;
        }else{
            return false;
        }
    }

    function getUserId(){
        $queryList = $this->db->get('user_id_gen');
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getBPLocations(){
        $queryList = $this->db->get('bp_location');
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getDesignations(){
        $queryList = $this->db->get('designation');
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function store_user($arrayUser){
        $queryStore = $this->db->insert('user', $arrayUser);
        if($queryStore){
            return true;
        }else{
            return false;
        }
    }

    function update_user($arrayUser,$userId){
        $this->db->where('user_id',$userId);
        $this->db->update('user', $arrayUser);
        $affectedrows = $this->db->affected_rows();
//        if($affectedrows == 1){
            return true;
//        }else{
//            return false;
//        }
    }

    function delete_user($userId){
        $this->db->where('user_id', $userId);
        $this->db->delete('user');
        return true;
    }

    function categoryDropList(){
        $this->db->from('category');
        $this->db->where('parent','0');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "None";
                $return[$row['category_id']] = $row['name'];
            }
        }
        return $return;
    }

    function getMaxCategoryId(){
        $this->db->select_max('category_id');
        $query = $this->db->get('category');
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result[0]['category_id'];
        }
    }

    function storeCategory($arrayShippingAddress){
        $queryStore = $this->db->insert('category', $arrayShippingAddress);
        if($queryStore){
            return true;
        }else {
            return false;
        }
    }

    function updateCategory($arrayAccDetails, $catId){

        $this->db->where('id', $catId);
        $this->db->update('category', $arrayAccDetails);
        $afftectedRows = $this->db->affected_rows();
        return true;
    }

    function deleteCategory($userId){
        $this->db->where('id', $userId);
        $this->db->delete('category');
        return true;
    }
    function getCategoriesList(){
        $this->db->from('category');
        $this->db->order_by('id', 'desc');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getCategoriesListForMenu(){
        $this->db->from('category');
        $this->db->where('parent','0');
        $this->db->where('sort >=','1');
        $this->db->where('sort <=','5');
        $this->db->where('status','active');
        $this->db->limit(5);
        $this->db->order_by('sort', 'asc');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getCategoriesListForMenuFirstFive(){
        $this->db->from('category');
        $this->db->where('parent','0');
        $this->db->where('status','active');
        $this->db->limit(6);
        $this->db->order_by('sort', 'asc');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function getSubMenuItemsByParentId($parentId){
        $this->db->from('category');
        $this->db->where('parent',$parentId);
        $this->db->where('status','active');
        $this->db->order_by('sort', 'asc');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function getCategoryDetailsById($catId){
        $this -> db -> select('*');
        $this -> db -> from('category');
        $this -> db -> where('id', $catId);
        $query = $this -> db -> get();
        return $query->result();
    }

    function getCategoryDetailsByCatId($catId){
        $this -> db -> select('*');
        $this -> db -> from('category');
        $this -> db -> where('category_id', $catId);
        $query = $this -> db -> get();
        return $query->result();
    }


    function locationDropList(){
        $this->db->from('bp_location');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Location";
                $return[$row['id']] = $row['loc_name'];
            }
        }
        return $return;
    }

    function getUserRoles(){
        $this->db->from('user_roles');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select User Role";
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;
    }

    function designationDropList(){
        $this->db->from('designation');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Designation";
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;
    }

    function getUsersList(){
        $this -> db -> select('*');
        $this -> db -> from('user');
        $this -> db -> where('dlt_status', 0);
        $query = $this -> db -> get();
        return $query->result();
    }

    function getBPLocationNameById($locId){
        $this -> db -> select('*');
        $this -> db -> from('bp_location');
        $this -> db -> where('id', $locId);
        $query = $this -> db -> get();
        return $query->result();
    }

    function getDesignationById($desId){
        $this -> db -> select('*');
        $this -> db -> from('designation');
        $this -> db -> where('id', $desId);
        $query = $this -> db -> get();
        return $query->result();
    }

    function getUserByUserId($userId){
        $this -> db -> select('*');
        $this -> db -> from('user');
        $this -> db -> where('user_id', $userId);
        $query = $this -> db -> get();
        return $query->result();
    }

    function login_user($username, $password)
    {
        $result = null;

        $this -> db -> select('*');
        $this -> db -> from('user_product');
        $this -> db -> where('email', $username);
        $this -> db -> where('password', $password);
        $this -> db -> limit(1);

        $query = $this -> db -> get();
        $result = $query->result();

        if($query -> num_rows() == 1)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    function getUserIdProduct(){
        $queryList = $this->db->get('user_product_id_gen');
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function updateUserIdProduct($productUserID){
        $newproductUserId = $productUserID + 1;
        $queryUpdate = $this->db->query("update user_product_id_gen set user_id = $newproductUserId where user_id=$productUserID");
        if($queryUpdate){
            return true;
        }else{
            return false;
        }
    }

    function saveRegisterUser($arrayUserRegister){
        $queryStore = $this->db->insert('user_product', $arrayUserRegister);
        if($queryStore){
            return true;
        }else {
            return false;
        }
    }

    function updateAccountDetails($arrayAccDetails, $userId){

        $this->db->where('user_id', $userId);
        $this->db->update('user_product', $arrayAccDetails);
        $afftectedRows = $this->db->affected_rows();

        if($afftectedRows == 1){
            return true;
        }else{
            return false;
        }
    }

    function getProductUserByUserId($userId){
        $this -> db -> select('*');
        $this -> db -> from('user_product');
        $this -> db -> where('user_id', $userId);
        $query = $this -> db -> get();
        return $query->result();
    }

    function storeBillingAddress($arrayBillingAddress){
        $queryStore = $this->db->insert('billing_address', $arrayBillingAddress);
        if($queryStore){
            return true;
        }else {
            return false;
        }
    }

    function storeShippingAddress($arrayShippingAddress){
        $queryStore = $this->db->insert('shipping_address', $arrayShippingAddress);
        if($queryStore){
            return true;
        }else {
            return false;
        }
    }

    function checkAvailabilityOfAddressBilling($userId){
        $this -> db -> select('*');
        $this -> db -> from('billing_address');
        $this -> db -> where('user_id', $userId);
        $query = $this -> db -> get();
        return $query->result();
    }

    function checkAvailabilityOfAddressShipping($userId){
        $this -> db -> select('*');
        $this -> db -> from('shipping_address');
        $this -> db -> where('user_id', $userId);
        $query = $this -> db -> get();
        return $query->result();
    }


    function checkSortOrderExists($sortNo){
        $this -> db -> select('*');
        $this -> db -> from('category');
        $this -> db -> where('sort', $sortNo);
        $query = $this -> db -> get();
        return $query->result();
    }



    function saveClass($arrayClass){
        $queryStore = $this->db->insert('class', $arrayClass);
        if($queryStore){
            return true;
        }else {
            return false;
        }
    }

    function saveMethod($arrayMethod){
        $queryStore = $this->db->insert('method', $arrayMethod);
        if($queryStore){
            return true;
        }else {
            return false;
        }
    }

    function storeParamters($arrayPara){
        $queryStore = $this->db->insert('parameters', $arrayPara);
        if($queryStore){
            return true;
        }else {
            return false;
        }
    }

    function storeClasses($arrayClass){
        $queryStore = $this->db->insert('classes', $arrayClass);
        if($queryStore){
            return true;
        }else {
            return false;
        }
    }

    function storeClassContent($arrayClass){
        $queryStore = $this->db->insert('class_content', $arrayClass);
        if($queryStore){
            return true;
        }else {
            return false;
        }
    }

    function getParamtersListByClassMethodId($class_id,$method_id)
    {
        $this -> db -> select('*');
        $this -> db -> from('parameters');
        $this -> db -> where('class_id', $class_id);
        $this -> db -> where('method_id', $method_id);
        $query = $this -> db -> get();
        return $query->result();
    }

    function getMethodDetailsById($methodId){
        $this -> db -> select('*');
        $this -> db -> from('method');
        $this -> db -> where('id', $methodId);
        $query = $this -> db -> get();
        return $query->result();
    }

    function getClassContentListById($id){
        $this -> db -> select('*');
        $this -> db -> from('class');
        $this -> db -> where('class_id', $id);
        $query = $this -> db -> get();
        return $query->result();
    }

    function getMethodListById($id){
        $this -> db -> select('*');
        $this -> db -> from('method');
        $this -> db -> where('class_id', $id);
        $query = $this -> db -> get();
        return $query->result();
    }

    function storeMethods($arrayMethod){
        $queryStore = $this->db->insert('methods', $arrayMethod);
        if($queryStore){
            return true;
        }else {
            return false;
        }
    }

    function getMethodsByClassId($id){
        $this -> db -> select('*');
        $this -> db -> from('methods');
        $this -> db -> where('class_id', $id);
        $query = $this -> db -> get();
        return $query->result();
    }

    function getMethodsByClassIdNative($id){
        $this -> db -> select('*');
        $this -> db -> from('method');
        $this -> db -> where('class_id', $id);
        $query = $this -> db -> get();
        return $query->result();
    }


    function getClassList(){
        $this -> db -> select('*');
        $this -> db -> from('class');
        $query = $this -> db -> get();
        return $query->result();
    }

    function getXYZVals(){
        $this -> db -> select('*');
        $this -> db -> from('x_y_z');
        $query = $this -> db -> get();
        return $query->result();
    }

    function updateClassMethods($class_id, $no_of_methods){
        $queryUpdate = $this->db->query("update  classes set no_of_methods = $no_of_methods where id = $class_id ");
        if($queryUpdate){
            return true;
        }else{
            return false;
        }
    }

}
?>