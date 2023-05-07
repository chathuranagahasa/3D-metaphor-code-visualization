<?php

Class UserModel extends CI_Model
{
    function storeCustomer($arrayCustomer){
        $queryStore = $this->db->insert('customer', $arrayCustomer);
        if($queryStore){
            return true;
        }else{
            return false;
        }
    }

    function storeCustomerMes($arrayCustomer){
        $this->db2 = $this->load->database('mes_db', TRUE);
        $queryStore = $this->db2->insert('customer', $arrayCustomer);
        if($queryStore){
            return true;
        }else{
            return false;
        }
    }

    function storeCustomerPro($arrayCustomer){
        $this->db3 = $this->load->database('pro_db', TRUE);
        $queryStore = $this->db3->insert('customer', $arrayCustomer);
        if($queryStore){
            return true;
        }else{
            return false;
        }
    }

    function locationDropList(){
        $this->db->from('country');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Your Residence";
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;
    }

    function getUserId(){
        $queryList = $this->db->get('user_id_gen');
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function updateUserId($userId){
        $newUserId = $userId + 1;
        $queryUpdate = $this->db->query("update user_id_gen set user_id = $newUserId where user_id = $userId");
        if($queryUpdate){
            return true;
        }else{
            return false;
        }
    }

    function getCustomerId(){
        $queryList = $this->db->get('customer_id_gen');
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function updateCustomerId($userId){
        $newUserId = $userId + 1;
        $queryUpdate = $this->db->query("update customer_id_gen set customer_id = $newUserId where customer_id = $userId");
        if($queryUpdate){
            return true;
        }else{
            return false;
        }
    }

    function updateLoyaltyBalance($loyalBal,$user_id){
        $queryUpdate = $this->db->query("update customer set loyalty_balance = $loyalBal where user_id = $user_id");
        if($queryUpdate){
            return true;
        }else{
            return false;
        }
    }

    function getCustomerByUserId($userId){
        $this -> db -> select('*');
        $this -> db -> from('customer');
        $this -> db -> where('user_id', $userId);
        $query = $this -> db -> get();
        return $query->result();
    }

    function updateCustomerProfile($arrayUpdateProfile,$userId){
        $this->db->where('user_id',$userId);
        $this->db->update('customer', $arrayUpdateProfile);
        $affectedrows = $this->db->affected_rows();
        if($affectedrows == 1){
            return true;
        }else{
            return false;
        }
    }

    function updateCustomerPassword($arrayUpdatePassword,$userId){
        $this->db->where('user_id',$userId);
        $this->db->update('customer', $arrayUpdatePassword);
        $affectedrows = $this->db->affected_rows();
        if($affectedrows == 1){
            return true;
        }else{
            return false;
        }
    }

    function checkCurrentPasswordAvailable($currentPass){
        $this -> db -> select('*');
        $this -> db -> from('customer');
        $this -> db -> where('password', $currentPass);
        $query = $this -> db -> get();
        return $query->result();
    }

    function login($username, $password)
    {
        $result = null;

        $this -> db -> select('*');
        $this -> db -> from('customer');
        $this -> db -> where('email_address', $username);
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

    function validateEmailAddress($email)
    {
        $result = null;

        $this -> db -> select('*');
        $this -> db -> from('customer');
        $this -> db -> where('email_address', $email);
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

    function validateEmailForgotPassword($email)
    {
        $result = null;

        $this -> db -> select('*');
        $this -> db -> from('customer');
        $this -> db -> where('email_address', $email);
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

    function updateNewPassword($userId,$arrayChngePass){
        $this->db->where('user_id', $userId);
        $this->db->update('customer', $arrayChngePass);
        $afftectedRows = $this->db->affected_rows();

        if($afftectedRows == 1){
            return true;
        }else{
            return false;
        }
    }

    function getUserNameByUserId($userId){
        $this -> db -> select('*');
        $this -> db -> from('customer');
        $this -> db -> where('user_id', $userId);
        $query = $this -> db -> get();
        return $query->result();
    }




    public function checkUser($userData = array()){
        if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
            $this->db->select($this->primaryKey);
            $this->db->from($this->tableName);
            $this->db->where(array('oauth_provider'=>$userData['oauth_provider'],'oauth_uid'=>$userData['oauth_uid']));
            $prevQuery = $this->db->get();
            $prevCheck = $prevQuery->num_rows();

            if($prevCheck > 0){
                $prevResult = $prevQuery->row_array();

                //update user data
                $userData['modified'] = date("Y-m-d H:i:s");
                $update = $this->db->update($this->tableName,$userData,array('id'=>$prevResult['id']));

                //get user ID
                $userID = $prevResult['id'];
            }else{
                //insert user data
                $userData['created']  = date("Y-m-d H:i:s");
                $userData['modified'] = date("Y-m-d H:i:s");
                $insert = $this->db->insert($this->tableName,$userData);

                //get user ID
                $userID = $this->db->insert_id();
            }
        }

        //return user ID
        return $userID?$userID:FALSE;
    }

    function checkEmailExistingUser($email){
        $this -> db -> select('*');
        $this -> db -> from('customer');
        $this -> db -> where('email_address', $email);
        $query = $this -> db -> get();
        return $query->result();
    }

    function checkFbUserAlreadyExistsMes($email){
        $this->db2 = $this->load->database('mes_db', TRUE);
        $this -> db2 -> select('*');
        $this -> db2 -> from('customer');
        $this -> db2 -> where('email_address', $email);
        $query = $this -> db2 -> get();
        return $query->result();
    }

    function checkFbUserAlreadyExistsPro($email){
        $this->db3 = $this->load->database('pro_db', TRUE);
        $this -> db3 -> select('*');
        $this -> db3 -> from('customer');
        $this -> db3 -> where('email_address', $email);
        $query = $this -> db3 -> get();
        return $query->result();
    }

    function checkFbUserAlreadyExists($fbUserId){
        $this -> db -> select('*');
        $this -> db -> from('customer');
        $this -> db -> where('user_id', $fbUserId);
        $query = $this -> db -> get();
        return $query->result();
    }

}