<?php

class PropertyModel extends CI_Model
{

    function storeModel($model_name,$model_id)
    {
        $arrayD = array(
            'name' => $model_name,
            'model_id' => $model_id
        );
        $queryStore = $this->db->insert('model', $arrayD);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    public function storeTopModel($model_name,$model_id)
    {
        $arrayD = array(
            'name' => $model_name,
            'model_id' => $model_id
        );
        $queryStore = $this->db->insert('top_model', $arrayD);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    public function storeSubModel($model_name,$sub_model_id, $model_id)
    {
        $arrayD = array(
            'name' => $model_name,
            'sub_model_id' => $sub_model_id,
            'model_id' => $model_id
        );
        $queryStore = $this->db->insert('sub_model', $arrayD);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    public function getLastModelId()
    {
        $this->db->select_max('model_id');
        $query = $this->db->get('model');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result[0]['model_id'];
        }
    }

    public function getLastTopModelId()
    {
        $this->db->select_max('model_id');
        $query = $this->db->get('top_model');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result[0]['model_id'];
        }
    }

  
    public function getLastSubModelId()
    {
        $this->db->select_max('sub_model_id');
        $query = $this->db->get('sub_model');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result[0]['sub_model_id'];
        }
    }

    public function getSubModelList()
    {
        $this->db->from('sub_model');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function getModelList()
    {
        $this->db->from('model');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getTopModelList()
    {
        $this->db->from('top_model');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    public function getModelDetailsById($model_id)
    {
        $this->db->from('model');
        $this->db->where('model_id', $model_id);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    public function getTopModelDetailsById($model_id)
    {
        $this->db->from('top_model');
        $this->db->where('model_id', $model_id);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function updateTopModel($model_name,$model_id, $id)
    {
       
        $arrayD = array(
            'name' => $model_name,
            'model_id' => $model_id
        );

        $this->db->where('id', $id);
        $queryStore = $this->db->update('top_model', $arrayD);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    
    }

    function updateModel($model_name,$model_id, $id)
    {
        $arrayD = array(
            'name' => $model_name,
            'model_id' => $model_id
        );

        $this->db->where('id', $id);
        $queryStore = $this->db->update('model', $arrayD);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
        
    }

    function getTopModelDropList(){

        $this->db->from('top_model');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "All Top Models";
                $return[$row['model_id']] = $row['name'];
            }
        }
        return $return;
    }

    function getModelDropList(){

        $this->db->from('model');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "All Models";
                $return[$row['model_id']] = $row['name'];
            }
        }
        return $return;
    }

    function districtDropList()
    {
        $this->db->from('district');
        $this->db->order_by('did');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "All Locations";
                $return[$row['did']] = $row['dname'];
            }
        }
        return $return;
    }

    function getColorDropList()
    {
        $this->db->from('exterior_color');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Color";
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;
    }

    function getDurationDropList()
    {
        $this->db->from('durations');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Duration";
                $return[$row['d_id']] = $row['name'];
            }
        }
        return $return;
    }

    function getPropertyTypesForSearch()
    {
        $this->db->from('property_types');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Any";
                $return[$row['pro_id']] = $row['name'];
            }
        }
        return $return;
    }

    function getPropertyTypesForForm()
    {
        $this->db->from('category');
        $this->db->where('status', 'active');
        $this->db->where('parent', '0');
        $this->db->order_by('sort', 'ASC');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Body Type";
                $return[$row['category_id']] = $row['name'];
            }
        }
        return $return;
    }


    function getMainCategoryDetails($catId)
    {
        $this->db->from('category');
        $this->db->where('category_id', $catId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getPropertyTypesForFormOld()
    {
        $this->db->from('property_types');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Any";
                $return[$row['type_id']] = $row['name'];
            }
        }
        return $return;
    }

    function getPropertyAdCategories()
    {
        $this->db->from('ad_types');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Category";
                $return[$row['type_id']] = $row['name'];
            }
        }
        return $return;
    }

    function getFuelTypesForForm()
    {
        $this->db->from('fuel_types');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Fuel Type";
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;
    }

    function getFuelTypesNameById($fuelId)
    {
        $this->db->from('fuel_types');
        $this->db->where('id', $fuelId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getBodyTypesNameById($typeId)
    {
        $this->db->from('property_types');
        $this->db->where('type_id', $typeId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getTransmissionNameById($transId)
    {
        $this->db->from('transmission_type');
        $this->db->where('id', $transId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getTransmissionTypesForForm()
    {
        $this->db->from('transmission_type');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Transmission";
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;
    }


    function getModelsForForm()
    {
        $this->db->from('model');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Brand";
                $return[$row['model_id']] = $row['name'];
            }
        }
        return $return;
    }

    function getTopModelsDropList()
    {
        //        $queryList = $this->db->get('top_model');
        //        $queryList_result = $queryList->result();
        //        return $queryList_result;
        $this->db->from('top_model');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Top Model";
                $return[$row['model_id']] = $row['name'];
            }
        }
        return $return;
    }

    function getModelsList()
    {
        $queryList = $this->db->get('model');
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getModelsListByBrand($modelId)
    {
        $this->db->select('*');
        $this->db->from('sub_model');
        $this->db->where('model_id', $modelId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getTopModelsList()
    {
        $queryList = $this->db->get('top_model');
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getAllWantedActiveAds()
    {
        $this->db->select('*');
        $this->db->from('property_wanted');
        $this->db->where('dlt_status', 0);
        $this->db->where('expire_status', 0);
        $this->db->order_by('id', 'desc');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getPropertyTypes()
    {
        $this->db->select('*');
        $this->db->from('property_types');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getModelTypes()
    {
        $this->db->select('*');
        $this->db->from('model');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    //    function getModelNameById($modelId){
    //        $this->db->from('model');
    //        $this->db->where('model_id',$modelId);
    //        $queryList = $this->db->get();
    //        $queryList_result = $queryList->result();
    //        return $queryList_result;
    //    }

    function getModelNameById($modelId)
    {
        $this->db->from('sub_model');
        $this->db->where('sub_model_id', $modelId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getTopBrandNameById($modelId)
    {
        $this->db->from('top_model');
        $this->db->where('model_id', $modelId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    //    function getBrandNameById($modelId){
    //        $this->db->from('sub_model');
    //        $this->db->where('sub_model_id',$modelId);
    //        $queryList = $this->db->get();
    //        $queryList_result = $queryList->result();
    //        return $queryList_result;
    //    }

    function getBrandNameById($modelId)
    {
        $this->db->from('model');
        $this->db->where('model_id', $modelId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getSubPropertiesByProId($proId)
    {
        $this->db->from('sub_property_types');
        $this->db->where('main_pro_id', $proId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getModelsByBrandId($brandId)
    {
        $this->db->from('sub_model');
        $this->db->where('model_id', $brandId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getSubModelByModelId($proId)
    {
        $this->db->from('sub_model');
        $this->db->where('model_id', $proId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function getAllDistricts()
    {
        $this->db->from('district');
        $this->db->order_by('did');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Location";
                $return[$row['did']] = $row['dname'];
            }
        }
        return $return;
    }

    function getCities()
    {
        $this->db->select('*');
        $this->db->from('city');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getDistricts()
    {
        $this->db->select('*');
        $this->db->from('district');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getCityNameById($cityId)
    {
        $this->db->from('city');
        $this->db->where('cid', $cityId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getDistrictNameById($districtId)
    {
        $this->db->from('district');
        $this->db->where('did', $districtId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getCitiesByDistrictId($districtId)
    {
        $this->db->from('city');
        $this->db->where('did', $districtId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getFeaturesByPropertyTypeId($featureId)
    {
        $this->db->from('property_features');
        $this->db->where('feature_id', $featureId);
        $this->db->order_by('name', 'ASC');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getProFeaturesList()
    {
        $this->db->from('property_features');
        $this->db->order_by('name', 'ASC');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }



    function getFeaturesById($featureId)
    {
        $this->db->from('property_features');
        $this->db->where('id', $featureId);
        $this->db->order_by('name', 'ASC');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getPropertyAddFeaturesByPropertyId($propertyId)
    {
        $this->db->from('property_add_features');
        $this->db->where('property_id', $propertyId);
        //$this->db->where('native_id',$nativeId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getPropertyAddFeaturesByNativeId($nativeId)
    {
        $this->db->from('property_add_features');
        $this->db->where('native_id', $nativeId);
        //$this->db->where('native_id',$nativeId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getPropertyAddKeyInfoByKeyInfoId($propertyId, $propertyTypeId)
    {
        $this->db->from('property_add_keyinfo');
        $this->db->where('property_id', $propertyId);
        $this->db->where('main_cat_id', $propertyTypeId);
        //$this->db->where('native_id',$nativeId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getFeaturesByPropertyPropertyId($propertyId)
    {
        $this->db->from('property_add_features');
        $this->db->where('property_id', $propertyId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getKeyInfoDetailsByPropertyTypeId($propertyTypeId)
    {
        //var_dump($propertyTypeId);
        $this->db->from('property_key_info');
        $this->db->where('main_pro_id', $propertyTypeId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function storePropertyImages($propertyId, $userId, $imgName)
    {
        $arrayImages = array(
            'property_id' => $propertyId,
            'user_id'  => $userId,
            'image_name' => $imgName
        );
        $queryStore = $this->db->insert('property_images', $arrayImages);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function getFeyInfoNameById($keyinfoId, $propertyTypeId)
    {
        $this->db->from('property_key_info');
        $this->db->where('native_id', $keyinfoId);
        $this->db->where('main_pro_id', $propertyTypeId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getFeatureNameById($featureId)
    {
        $this->db->from('property_features');
        $this->db->where('id', $featureId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function storeFeaturedPayment($arrayFeatured)
    {
        $queryStore = $this->db->insert('featured', $arrayFeatured);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function storePorpertyKeyInfo($arrayProKeyinfo)
    {
        $queryStore = $this->db->insert('property_add_keyinfo', $arrayProKeyinfo);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function storePropertyFeatures($arrayFeatures)
    {
        $queryStore = $this->db->insert('property_add_features', $arrayFeatures);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function storeProperty($arrayPropertyDetails)
    {
        $queryStore = $this->db->insert('property', $arrayPropertyDetails);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function storeWantedProperty($arrayPropertyWantedDetails)
    {
        $queryStore = $this->db->insert('property_wanted', $arrayPropertyWantedDetails);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function updateFeaturedStatusUser($propertyId, $featureStatus)
    {
        if ($featureStatus == 1) {
            $arrayPropertyDetails = array(
                'featured' => 1
            );
        } else {
            $arrayPropertyDetails = array(
                'featured' => null
            );
        }

        $this->db->where('property_id', $propertyId);
        $queryStore = $this->db->update('property', $arrayPropertyDetails);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }


    function updateProperty($arrayPropertyDetails, $propertyId)
    {
        $this->db->where('property_id', $propertyId);
        $queryStore = $this->db->update('property', $arrayPropertyDetails);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function updatePropertyMis($arrayPropertyDetails, $propertyId)
    {
        $this->db2 = $this->load->database('mes_db', TRUE);
        $this->db2->where('property_id', $propertyId);
        $queryStore = $this->db2->update('property', $arrayPropertyDetails);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function updatePropertyPro($arrayPropertyDetails, $propertyId)
    {
        $this->db3 = $this->load->database('pro_db', TRUE);
        $this->db3->where('property_id', $propertyId);
        $queryStore = $this->db3->update('property', $arrayPropertyDetails);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function updateWantedProperty($arrayPropertyDetails, $propertyId)
    {
        $this->db->where('id', $propertyId);
        $queryStore = $this->db->update('property_wanted', $arrayPropertyDetails);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function updateService($arrayService, $serviceId)
    {
        $this->db->where('service_id', $serviceId);
        $queryStore = $this->db->update('service', $arrayService);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function deleteExistingPropertyKeyInfo($propertyId)
    {
        $this->db->where('property_id', $propertyId);
        $del = $this->db->delete('property_add_keyinfo');
        return $del;
    }

    function deleteExistingPropertyFeatures($propertyId)
    {
        $this->db->where('property_id', $propertyId);
        $del = $this->db->delete('property_add_features');
        return $del;
    }

    function updatePorpertyKeyInfo($arrayProKeyinfo)
    {
        $queryStore = $this->db->insert('property_add_keyinfo', $arrayProKeyinfo);
        //var_dump($queryStore);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function updatePropertyFeatures($arrayFeatures)
    {
        $queryStore = $this->db->insert('property_add_features', $arrayFeatures);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function getAllPropertiesByUserId($userId)
    {
        //        $this->db->from('property');
        //        $this->db->where('user_id',$userId);
        //        $this->db->where('dlt_status',0);
        //        $this->db->where('approve_status',1);
        //        $this->db->where('expire_status',0);
        //        $queryList = $this->db->get();
        //        $queryList_result = $queryList->result();
        //        return $queryList_result;

        $query = $this->db->query("SELECT * FROM property pw, payments p WHERE pw.dlt_status=0 AND pw.property_id = p.ad_id AND pw.user_id='$userId' GROUP BY p.ad_id ORDER BY p.`payment_date` DESC "); //AND p.`renew` >= CURDATE()
        return $query->result();
    }

    function getAllPropertiesMesByUserId($userId)
    {
        $this->db2 = $this->load->database('mes_db', TRUE);
        $query = $this->db2->query("SELECT * FROM property pw, payments p WHERE pw.dlt_status=0 AND pw.property_id = p.ad_id AND pw.user_id='$userId' GROUP BY p.ad_id ORDER BY p.`payment_date` DESC "); //AND p.`renew` >= CURDATE()
        return $query->result();
    }

    function getAllPropertiesProByUserId($userId)
    {
        $this->db3 = $this->load->database('pro_db', TRUE);
        $query = $this->db3->query("SELECT * FROM property pw, payments p WHERE pw.dlt_status=0 AND pw.property_id = p.ad_id AND pw.user_id='$userId' GROUP BY p.ad_id ORDER BY p.`payment_date` DESC "); //AND p.`renew` >= CURDATE()
        return $query->result();
    }

    function getAllProperties()
    {
        $this->db->from('property');
        $this->db->where('dlt_status', 0);
        $this->db->where('approve_status', 1);
        $this->db->where('expire_status', 0);
        $this->db->where('sold', 0);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getAllPropertiesAdmin()
    {
        $this->db->from('property');
        $this->db->where('dlt_status', 0);
        $this->db->order_by('id', 'DESC');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getPropertiesByCategoryId($catId)
    {
        $this->db->from('property');
        $this->db->where('body_type', $catId);
        $this->db->where('dlt_status', 0);
        $this->db->where('expire_status', 0);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function getMaxPaymentId()
    {
        $this->db->select_max('payment_id');
        $query = $this->db->get('payments');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result[0]['payment_id'];
        }
    }

    function get_properties_by_category_pagination($catId, $per_page, $cur_page)
    {
        if ($per_page == 0) {
            $query = $this->db->query("SELECT * FROM `property` WHERE body_type='$catId' AND dlt_status='0' AND sold='0' AND approve_status='1' ORDER BY DATE(posted_date) DESC, `ref_id` DESC ");
            return $query->num_rows();
        } else {
            $query = $this->db->query("SELECT * FROM `property` WHERE body_type='$catId' AND dlt_status='0' AND sold='0' AND approve_status='1' ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
            return $query->result();
        }
    }

    function get_properties_by_subcategory_pagination($catId, $per_page, $cur_page)
    {
        if ($per_page == 0) {
            $query = $this->db->query("SELECT * FROM `property` WHERE sub_body_type='$catId' AND dlt_status='0' AND sold='0' AND approve_status='1'  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            return $query->num_rows();
        } else {
            $query = $this->db->query("SELECT * FROM `property` WHERE sub_body_type='$catId' AND dlt_status='0' AND sold='0' AND approve_status='1'  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
            return $query->result();
        }
    }

    function get_properties_by_featured_pagination($per_page, $cur_page)
    {
        if ($per_page == 0) {
            $query = $this->db->query("SELECT * FROM `property` WHERE featured='1' AND dlt_status='0' AND sold='0' AND approve_status='1'  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            return $query->num_rows();
        } else {
            $query = $this->db->query("SELECT * FROM `property` WHERE featured='1' AND dlt_status='0' AND sold='0' AND approve_status='1'  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
            return $query->result();
        }
    }



    function getAllExpirePropertiesByUserId($userId)
    {
        $this->db->from('property');
        $this->db->where('user_id', $userId);
        $this->db->where('dlt_status', 0);
        $this->db->where('expire_status', 1);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getAllWantedPropertiesByUserId($userId)
    {
        $this->db->from('property_wanted');
        $this->db->where('user_id', $userId);
        $this->db->where('dlt_status', 0);
        $this->db->where('expire_status', 0);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getLatestProperties()
    {
        $this->db->from('property');
        $this->db->order_by('id', 'desc');
        $this->db->where('dlt_status', 0);
        $this->db->where('approve_status', 1);
        $this->db->where('expire_status', 0);
        $this->db->limit(9);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }



    //    function getFeaturedPropertiesFirstThree(){
    //        $this->db->from('property');
    //        $this->db->order_by('id', 'desc');
    //        $this->db->where('dlt_status',0);
    //        $this->db->where('expire_status',0);
    //        $this->db->where('featured',1);
    //        $this->db->where('approve_status',1);
    //        $this->db->limit(3);
    //        $queryList = $this->db->get();
    //        $queryList_result = $queryList->result();
    //        return $queryList_result;
    //    }


    function getFeaturedPropertiesFirstThree()
    {
        $this->db->from('property');
        $this->db->order_by('id', 'desc');
        $this->db->where('dlt_status', 0);
        $this->db->where('expire_status', 0);
        $this->db->where('featured', 1);
        $this->db->where('approve_status', 1);
        $this->db->where('payment_status', 1);
        $this->db->where('sold', 0);
        $this->db->limit(3);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
        //        $query = $this->db->query("SELECT * FROM property pro, payments pay WHERE pro.property_id = pay.ad_id AND pay.status =1 AND pro.dlt_status=0 AND pro.approve_status = 1 AND pay.is_featured =1 AND pro.expire_status = 0 ORDER BY pro.id DESC LIMIT 3");
        //        return $query->result();
    }

    function getPendingFundTranferList()
    {
        $this->db->from('payments');
        $this->db->order_by('id', 'desc');
        //$this->db->where('status',0);
        $this->db->where('description !=', 'online');
        $this->db->limit(9);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function getFeaturedPropertiesNextSix()
    {
        //        $this->db->from('property');
        //        $this->db->order_by('id', 'desc');
        //        $this->db->where('dlt_status',0);
        //        $this->db->where('expire_status',0);
        //        $this->db->where('featured',1);
        //        $this->db->where('approve_status',1);
        //        $this->db->limit(4,12);
        //        $queryList = $this->db->get();
        //        $queryList_result = $queryList->result();
        //        return $queryList_result;

        $query = $this->db->query("SELECT * FROM property pro, payments pay WHERE pro.property_id = pay.ad_id AND pay.status =1 AND pro.dlt_status=0 AND pro.sold=0 AND pro.approve_status = 1 AND pay.is_featured =1 AND pro.expire_status = 0 ORDER BY pro.id DESC LIMIT 6 OFFSET 3 ");
        return $query->result();
    }

    function getFeaturedProperties()
    {
        //        $this->db->from('property');
        //        $this->db->order_by('id', 'desc');
        //        $this->db->where('dlt_status',0);
        //        $this->db->where('expire_status',0);
        //        $this->db->where('featured',1);
        //        $this->db->where('approve_status',1);
        //        $this->db->limit(4,12);
        //        $queryList = $this->db->get();
        //        $queryList_result = $queryList->result();
        //        return $queryList_result;

        $query = $this->db->query("SELECT * FROM property pro, payments pay WHERE pro.property_id = pay.ad_id AND pay.status =1 AND pro.dlt_status=0 AND pro.sold=0 AND pro.approve_status = 1 AND pay.is_featured =1 AND pro.expire_status = 0 ORDER BY pro.id DESC LIMIT 6 OFFSET 9 ");
        return $query->result();
    }




    function getRefId()
    {
        $this->db->select_max('ref_id');
        $query = $this->db->get('property');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result[0]['ref_id'];
        }
    }

    function getMaxPropertyId()
    {
        $this->db->select_max('property_id');
        $query = $this->db->get('property');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result[0]['property_id'];
        }
    }

    function getPropertyImagesByPropertyId($propertyId)
    {
        $this->db->from('property_images');
        $this->db->where('property_id', $propertyId);
        $this->db->where('dlt_status', 0);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function deletePropertyImagesRecord($imageId)
    {
        $this->db->where('id', $imageId);
        $result = $this->db->delete('property_images');
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function getFeaturesByPropertyPropertyAndFeatureId($propertyId, $featureId)
    {
        $this->db->from('property_add_features');
        $this->db->where('property_id', $propertyId);
        $this->db->where('feature_id', $featureId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function getPropertyDetailsByPropertyId($propertyId)
    {
        $this->db->from('property');
        $this->db->where('property_id', $propertyId);
        $this->db->where('approve_status', 1);
        $this->db->where('dlt_status', 0);
        $this->db->where('sold', 0);
        $this->db->where('expire_status', 0);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getPropertyDetailsByPropertyIdAdmin($propertyId)
    {
        $this->db->from('property');
        $this->db->where('property_id', $propertyId);
        $this->db->where('dlt_status', 0);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getWantedPropertyDetailsByPropertyId($propertyId)
    {
        $this->db->from('property_wanted');
        $this->db->where('id', $propertyId);
        $this->db->where('dlt_status', 0);
        $this->db->where('expire_status', 0);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getKeyInfoLatestByPropertyId($propertyId)
    {
        $this->db->from('property_add_keyinfo');
        $this->db->where('property_id', $propertyId);
        $this->db->limit(3);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function getKeyInfoByPropertyId($propertyId)
    {
        $this->db->from('property_add_keyinfo');
        $this->db->where('property_id', $propertyId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function getFeaturesByPropertyId($propertyId)
    {
        $this->db->from('property_add_features');
        $this->db->where('property_id', $propertyId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getFeaturesByPropertyIdFeatureId($propertyId, $feaID)
    {
        $this->db->from('property_add_features');
        $this->db->where('property_id', $propertyId);
        $this->db->where('feature_id', $feaID);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getMainTypeById($mainTypeId)
    {
        $this->db->from('property_types');
        $this->db->where('type_id', $mainTypeId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getWantedPropertyDetailsById($id)
    {
        $this->db->from('property_wanted');
        $this->db->where('id', $id);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getSubTypeBySubTypeId($subTypeId)
    {
        $this->db->from('sub_property_types');
        $this->db->where('sub_pro_id', $subTypeId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }



    function getSearchResultNew($propertyType, $make, $model, $location)
    {
        $this->db->select('*');
        $this->db->from('property');
        $this->db->like('body_type', $propertyType);
        $this->db->like('pro_desc', $make);
        $this->db->like('pro_desc', $model);
        $this->db->like('district', $location);
        $this->db->where('approve_status', 1);
        $query = $this->db->get();

        return $query->result();
    }

    function getSearchResultRowCount($propertyType, $make, $model, $location)
    {
        $this->db->select('*');
        $this->db->from('property');
        $this->db->like('body_type', $propertyType);
        $this->db->like('pro_desc', $make);
        $this->db->like('pro_desc', $model);
        $this->db->like('district', $location);
        $this->db->where('approve_status', 1);
        $query = $this->db->get()->num_rows();

        return $query;
    }


    function getSearchResult($propertyType, $status, $location)
    {
        if ($propertyType == null && $status == null && $location == null) {
            $query = "select * from property where dlt_status = 0 and sold = 0 AND approve_status=1 ORDER BY id DESC";
        } else if ($propertyType != null && $status == null && $location == null) {
            $query = "select * from property where body_type = '$propertyType' and dlt_status = 0 and sold = 0  AND approve_status=1 ORDER BY id DESC";
        } else if ($propertyType == null && $status != null && $location == null) {
            $query = "select * from property where offer_type LIKE '%" . $status . "%' and dlt_status = 0 and sold = 0  AND approve_status=1 ORDER BY id DESC";
        } else if ($propertyType == null && $status == null && $location != null) {
            $query = "select * from property where city = '$location' and dlt_status = 0 and sold = 0  AND approve_status=1 ORDER BY id DESC";
        } else if ($propertyType != null && $status != null && $location == null) {
            $query = "select * from property where offer_type LIKE '%" . $status . "%' and body_type = '$propertyType'  and dlt_status = 0 and sold = 0  AND approve_status=1 ORDER BY id DESC";
        } else if ($propertyType == null && $status != null && $location != null) {
            $query = "select * from property where offer_type LIKE '%" . $status . "%' and city = '$location'  and dlt_status = 0 and sold = 0  AND approve_status=1 ORDER BY id DESC";
        } else if ($propertyType != null && $status == null && $location != null) {
            $query = "select * from property where body_type = '$propertyType' and city = '$location'  and dlt_status = 0 and sold = 0  AND approve_status=1 ORDER BY id DESC";
        } else if ($propertyType != null && $status != null && $location != null) {
            $query = "select * from property where body_type = '$propertyType' and offer_type LIKE '%" . $status . "%' and city = '$location'  and dlt_status = 0 and sold = 0  AND approve_status=1 ORDER BY id DESC";
        }
        $queryx = $this->db->query($query);
        return $queryx->result();
    }

    function deleteProperty($propertyId)
    {
        $queryUpdate = $this->db->query("update property set dlt_status = 1 where property_id=$propertyId");
        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }

    function deleteServiceByServiceId($serviceId)
    {
        $queryUpdate = $this->db->query("update service set dlt_status = 1 where service_id=$serviceId");
        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }

    function deleteWantedProperty($propertyId)
    {
        $queryUpdate = $this->db->query("update property_wanted set dlt_status = 1 where id=$propertyId");
        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }


    function deletePropertyImages($propertyId)
    {
        $queryUpdate = $this->db->query("update property_images set dlt_status = 1 where property_id=$propertyId");
        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }

    function checkExpireAds($current_date)
    {
        $setExpire = $this->db->query("update property set expire_status = 1 WHERE expire_date < '$current_date' AND expire_status=0");
        if ($setExpire) {
            return true;
        } else {
            return false;
        }
    }

    function saveAdClickDetails($adDetailsArray)
    {
        //var_dump($adDetailsArray);
        $queryStore = $this->db->insert('ad_click_track', $adDetailsArray);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function getPostViewCountByPropertyId($proId)
    {
        $this->db->from('ad_click_track');
        $this->db->where('property_id', $proId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }



    function getCountByPostAdCategoryId()
    {
        return $this->db->query("select type_id, count(id) as count_ad from ad_click_track GROUP BY type_id")->result();
    }

    function getCountByPostAdPropertyId()
    {
        return $this->db->query("select property_id, count(id) as count_ad_property from ad_click_track GROUP BY property_id")->result();
    }

    function getServiceTypes()
    {
        $queryList = $this->db->get('services_category');
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getServiceTypesDropList()
    {
        $this->db->from('services_category');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Service";
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;
    }

    function getServiceTypesByMainCatId($mainCatId)
    {
        $this->db->from('services_category');
        $this->db->where('main_cat_id', $mainCatId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getMainServiceCategories()
    {
        $queryList = $this->db->get('services_main_category');
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getAllServicesActiveAdsByServiceType($subCatId)
    {
        $this->db->from('service');
        $this->db->where('service_type', $subCatId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getServiceTypeNameById($subId)
    {
        $this->db->from('services_category');
        $this->db->where('sub_id', $subId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getServiceImagesById($serviceId)
    {
        $this->db->from('service_images');
        $this->db->where('service_id', $serviceId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getMaxServiceId()
    {
        $this->db->select_max('service_id');
        $query = $this->db->get('service');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result[0]['service_id'];
        }
    }

    function storeServiceImages($serviceId, $imgName)
    {
        $arrayImages = array(
            'service_id' => $serviceId,
            'image_name' => $imgName
        );
        $queryStore = $this->db->insert('service_images', $arrayImages);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function storeService($arrayServiceDetails)
    {
        $queryStore = $this->db->insert('service', $arrayServiceDetails);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function saveLeadDetails($arrayLeads)
    {
        $queryStore = $this->db->insert('leads', $arrayLeads);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function getServiceImagesByServiceId($serviceId)
    {
        $this->db->from('service_images');
        $this->db->where('service_id', $serviceId);
        $this->db->where('dlt_status', 0);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getServicesList()
    {
        $this->db->from('service');
        $this->db->order_by('id', 'desc');
        $this->db->where('dlt_status', 0);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getServiceDetailsById($id)
    {
        $this->db->from('service');
        $this->db->where('id', $id);
        $this->db->where('dlt_status', 0);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function addPropertyAsFeatured($propertyId)
    {
        $queryUpdate = $this->db->query("update property set featured = 1 where property_id=$propertyId");
        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }

    //    function addPropertyAsApproved($propertyId){
    //        $queryUpdate = $this->db->query("update property set approve_status = 1 where property_id=$propertyId AND dlt_status=0");
    //        $queryUp = $this->db->query("update payment set status = 1 where ad_id=$propertyId");
    //        if($queryUpdate && $queryUp){
    //            return true;
    //        }else{
    //            return false;
    //        }
    //    }

    function addPropertyAsApproved($propertyId, $apDate, $expDate)
    {
        $queryUpdate = $this->db->query("update property set approve_status = 1, expire_status = 0, approved_date='$apDate', expire_date = '$expDate', renew_pay_app_status = '0' where property_id=$propertyId AND dlt_status=0 and sold = 0 ");
        $queryUp = $this->db->query("update payments set approved_date='$apDate', renew='$apDate' where ad_id=$propertyId");
        if ($queryUpdate && $queryUp) { //&& $queryUp
            return true;
        } else {
            return false;
        }
    }

    function getFeaturedList()
    {
        $this->db->from('featured');
        $this->db->where('dlt_status', 0);
        $this->db->order_by('id', 'DESC');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function deleteFeaturedPropertyDetails($propertyId)
    {
        $queryUpdate = $this->db->query("update featured set dlt_status = 1 where vehicle_id=$propertyId");
        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }

    function getRelatedProperties($offer_type, $body_type, $district)
    {
        $this->db->from('property');
        $this->db->where('offer_type', $offer_type);
        $this->db->or_where('body_type', $body_type);
        $this->db->or_where('district', $district);
        $this->db->where('dlt_status', 0);
        $this->db->where('approve_status', 1);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getWeeklyLanga()
    {
        $this->db->from('lagna_palapala');
        $this->db->order_by('id', 'ASC');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function storeCompany($arrayCompany)
    {
        $queryStore = $this->db->insert('company', $arrayCompany);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function updateCompany($arrayCompany, $companyId)
    {
        $this->db->where('id', $companyId);
        $queryStore = $this->db->update('company', $arrayCompany);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function updateCompanyLogo($id)
    {
        $queryUpdate = $this->db->query("update company set logo = '' where id= $id");
        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }

    function updatePropertyMainImage($id)
    {
        $queryUpdate = $this->db->query("update property set main_image = '' where property_id= $id");
        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }

    function deleteCompany($companyId)
    {
        $this->db->where('id', $companyId);
        $delete = $this->db->delete('company');
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    function getCompaniesList()
    {
        $this->db->from('company');
        $this->db->order_by('id', 'desc');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getCompanyDropList()
    {
        $this->db->from('company');
        $this->db->order_by('id');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select";
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;
    }


    function getCompanyDetailsById($companyId)
    {
        $this->db->from('company');
        $this->db->where('id', $companyId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getBPLocationNameById($locId)
    {
        $this->db->from('bp_location');
        $this->db->where('id', $locId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getCompanyDetialsByUserId($userId)
    {
        $this->db->from('company');
        $this->db->where('user_id', $userId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function checkFeatureAlreadyAdd($propertyId, $featureId)
    {
        $this->db->from('property_add_features');
        $this->db->where('property_id', $propertyId);
        $this->db->where('feature_id', $featureId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getFeatureDetailsByID($id)
    {
        $this->db->from('property_features');
        $this->db->where('id', $id);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }



    //car sale

    function getCarSaleDropList()
    {
        $this->db->from('company');
        $this->db->order_by('name');
        $queryList = $this->db->get();
        $return = array();
        if ($queryList->num_rows() > 0) {
            foreach ($queryList->result_array() as $row) {
                $return[0] = "Select Car Sale";
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;
    }


    function getColorsById($fuelId)
    {
        $this->db->from('exterior_color');
        $this->db->where('id', $fuelId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function get_properties_adv_search($veriables, $per_page, $cur_page)
    {

        //var_dump($this->input->post());
        //die();


        $queryString = "SELECT * FROM `property` WHERE approve_status=1  AND dlt_status=0 and sold = 0";
        $queryStringSub = " ORDER BY DATE(posted_date) DESC, `ref_id` DESC ";

        $queryStringPagination = "SELECT * FROM `property` WHERE approve_status=1  AND dlt_status=0 and sold = 0";
        $queryStringPaginationSub = " ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page ";

        $make = $veriables['pro_brand'];
        if ($make == "0") {
            $attach_query_1 =  " AND brand BETWEEN 0 AND 1000 ";
        } else {
            $attach_query_1 = " AND brand = '$make'";
        }

        $model = $veriables['pro_model'];
        if ($model == "0") {
            $attach_query_2 =  " AND model BETWEEN 0 AND 1000 ";
        } else {
            $attach_query_2 = " AND model = '$model' ";
        }

        $body_type = $veriables['body_type'];
        if ($body_type == "0") {
            $attach_query_14 =  " AND body_type BETWEEN 0 AND 1000 ";
        } else {
            $attach_query_14 = " AND body_type = '$body_type' ";
        }

        $yom = $veriables['yom'];
        if ($yom == "") {
            $attach_query_3 =  "AND yom BETWEEN 0 AND 2500";
        } else {
            $attach_query_3 = "AND yom = '$yom'";
        }

        $yor = $veriables['yor'];
        if ($yor == "") {
            $attach_query_4 =  " AND yor BETWEEN 0 AND 2500 ";
        } else {
            $attach_query_4 = " AND yor = '$yor' ";
        }

        $engine = $veriables['engine'];
        if ($engine == "") {
            $attach_query_5 =  "";
        } else {
            $attach_query_5 = " AND engine_size = '$engine' ";
        }

        $transmission = $veriables['transmission'];
        if ($transmission == "0") {
            $attach_query_13 =  " AND transmission BETWEEN 0 AND 5000 ";
        } else {
            $attach_query_13 = " AND transmission = '$transmission' ";
        }

        $fuel_type = $veriables['fuel_type'];
        if ($fuel_type == "0") {
            $attach_query_6 =  " AND fuel_type BETWEEN 0 AND 5000 ";
        } else {
            $attach_query_6 = " AND fuel_type = '$fuel_type' ";
        }

        $property_condition = $veriables['pro_property_condition'];
        if ($property_condition == "0") {
            $attach_query_7 =  "";
        } else {
            $attach_query_7 = " AND condition_type = '$property_condition' ";
        }

        $property_loc = $veriables['pro_district'];
        if ($property_loc == "0") {
            $attach_query_8 =  " AND district BETWEEN 0 AND 5000 ";
        } else {
            $attach_query_8 = " AND district = '$property_loc' ";
        }

        $keywords = $veriables['keyword'];
        if ($keywords == "") {
            $attach_query_9 =  "";
        } else {
            $attach_query_9 = " AND search_text LIKE '%$keywords%' ";
        }

        $car_sale = $veriables['car_sale'];
        if ($car_sale == "0") {
            $attach_query_10 =  "";
        } else {
            $attach_query_10 = " AND car_sale_id = '$car_sale' ";
        }


        $mileage_from = $veriables['mileage_from'];
        $mileage_to = $veriables['mileage_to'];
        if ($mileage_from == "" &&  $mileage_to != "") {
            $attach_query_11 =  " AND mileage BETWEEN '0' AND '$mileage_to' ";
        } else if ($mileage_from != "" &&  $mileage_to == "") {
            $attach_query_11 =  " AND mileage BETWEEN '$mileage_from' AND '10000000000' ";
        } else if ($mileage_from != "" &&  $mileage_to != "") {
            $attach_query_11 =  " AND mileage BETWEEN '$mileage_from' AND '$mileage_to' ";
        } else {
            $attach_query_11 =  "";
        }


        $price_from = $veriables['price_from'];
        $price_to = $veriables['price_to'];
        if ($price_from == "" &&  $price_to != "") {
            $attach_query_12 =  " AND price BETWEEN '0' AND $price_to ";
        } else if ($price_from != "" &&  $price_to == "") {
            //                var_dump($price_from);
            //                die();
            $attach_query_12 =  " AND price BETWEEN $price_from AND 1000000000000 ";
        } else if ($price_from != "" &&  $price_to  != "") {
            $attach_query_12 =  " AND price BETWEEN $price_from AND $price_to ";
        } else {
            $attach_query_12 =  "";
        }


        $queryDefault = $this->db->query($queryString . '' . $attach_query_1 . '' . $attach_query_2 . '' . $attach_query_3 . '' . $attach_query_4 . '' . $attach_query_5 . '' . $attach_query_6 . '' . $attach_query_7 . '' . $attach_query_8 . '' . $attach_query_9 . '' . $attach_query_10 . '' . $attach_query_11 . '' . $attach_query_12 . '' . $attach_query_13 . '' . $attach_query_14 . '' . $queryStringSub);
        //        var_dump($queryString . '' . $attach_query_1. '' . $attach_query_2. '' . $attach_query_3. '' . $attach_query_4. '' . $attach_query_5. '' . $attach_query_6. '' . $attach_query_7. '' . $attach_query_8. '' . $attach_query_9. '' . $attach_query_10. '' . $attach_query_11. '' . $attach_query_12. '' . $attach_query_13. '' . $attach_query_14 . '' . $queryStringSub);
        //var_dump($attach_query_12);
        // die();

        if ($per_page == 0) {
            $query = $queryDefault;
            return $query->num_rows();
        } else {
            $q = $queryStringPagination . '' . $attach_query_1 . '' . $attach_query_2 . '' . $attach_query_3 . '' . $attach_query_4 . '' . $attach_query_5 . '' . $attach_query_6 . '' . $attach_query_7 . '' . $attach_query_8 . '' . $attach_query_9 . '' . $attach_query_10 . '' . $attach_query_11 . '' . $attach_query_12 . '' . $attach_query_13 . '' . $attach_query_14 . '' . $queryStringPaginationSub;
            //            var_dump($q);
            //            die();
            $query = $this->db->query($queryStringPagination . '' . $attach_query_1 . '' . $attach_query_2 . '' . $attach_query_3 . '' . $attach_query_4 . '' . $attach_query_5 . '' . $attach_query_6 . '' . $attach_query_7 . '' . $attach_query_8 . '' . $attach_query_9 . '' . $attach_query_10 . '' . $attach_query_11 . '' . $attach_query_12 . '' . $attach_query_13 . '' . $attach_query_14 . '' . $queryStringPaginationSub);

            //var_dump($query->result());
            return $query->result();
        }


        //  var_dump($make . "" . $model . "" . $keywords . "" . $property_condition . "" . $property_loc);

        //            if ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("1");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE approve_status=1  AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE approve_status=1  AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }else if ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type != "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("1");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE body_type='$body_type' AND  approve_status=1  AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE body_type='$body_type' AND  approve_status=1  AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }else if ($make != "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type != "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("1");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE body_type='$body_type' AND brand='$make' AND approve_status=1  AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE body_type='$body_type' AND brand='$make'  AND approve_status=1 AND dlt_status=0 and sold = 0   ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }
        //            elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type != "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("2");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE body_type='$body_type' AND brand='$make' AND model='$model' AND approve_status=1  AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE body_type='$body_type' AND brand='$make' AND model='$model' AND approve_status=1  AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    return $query->result();
        //                }
        //            } elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type != "0"  && $yom != "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("3");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    return $query->result();
        //                }
        //            } elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type != "0"  && $yom != "" && $yor != "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("4");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yom ='$yom' AND yor ='$yor' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    return $query->result();
        //                }
        //            } elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type != "0"  && $yom != "" && $yor != "" && $engine != "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                // var_dump("6");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type != "0"  && $yom != "" && $yor != "" && $engine != "" && $transmission != "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("00");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type != "0"  && $yom != "" && $yor != "" && $engine != "" && $transmission != "0"  && $fuel_type != "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("pp");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition != "0" && $property_loc == "0" && $body_type != "0"  && $yom != "" && $yor != "" && $engine != "" && $transmission != "0"  && $fuel_type != "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("cc");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC , `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition'  AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition != "0" && $property_loc == "0" && $body_type != "0"  && $yom != "" && $yor != "" && $engine != "" && $transmission != "0"  && $fuel_type != "0" && $mileage_from != "" && $mileage_to != ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("rr");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND mileage BETWEEN '$mileage_from' AND '$mileage_to' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND mileage BETWEEN '$mileage_from' AND '$mileage_to' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition != "0" && $property_loc == "0" && $body_type != "0"  && $yom != "" && $yor != "" && $engine != "" && $transmission != "0"  && $fuel_type != "0" && $mileage_from != "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("rr");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND mileage >= '$mileage_from' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND mileage >= '$mileage_from' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition != "0" && $property_loc == "0" && $body_type != "0"  && $yom != "" && $yor != "" && $engine != "" && $transmission != "0"  && $fuel_type != "0" && $mileage_from == "" && $mileage_to != ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("rr");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND mileage <= '$mileage_to' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND mileage <=  '$mileage_to' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition != "0" && $property_loc == "0" && $body_type != "0"  && $yom != "" && $yor != "" && $engine != "" && $transmission != "0"  && $fuel_type != "0" && $mileage_from != "" && $mileage_to != ""  && $price_from != "" && $price_to != "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND mileage BETWEEN '$mileage_from' AND '$mileage_to' AND price BETWEEN '$price_from' AND '$price_to' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND BETWEEN '$mileage_from' AND '$mileage_to' AND price BETWEEN '$price_from' AND '$price_to' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition != "0" && $property_loc == "0" && $body_type != "0"  && $yom != "" && $yor != "" && $engine != "" && $transmission != "0"  && $fuel_type != "0" && $mileage_from != "" && $mileage_to != ""  && $price_from != "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND mileage BETWEEN '$mileage_from' AND '$mileage_to' AND price >= '$price_from' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND BETWEEN '$mileage_from' AND '$mileage_to' AND price >= '$price_from' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition != "0" && $property_loc == "0" && $body_type != "0"  && $yom != "" && $yor != "" && $engine != "" && $transmission != "0"  && $fuel_type != "0" && $mileage_from != "" && $mileage_to != ""  && $price_from == "" && $price_to != "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND mileage BETWEEN '$mileage_from' AND '$mileage_to' AND price <= '$price_to' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND BETWEEN '$mileage_from' AND '$mileage_to' AND price <= '$price_to' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition != "0" && $property_loc == "0" && $body_type != "0"  && $yom != "" && $yor != "" && $engine != "" && $transmission != "0"  && $fuel_type != "0" && $mileage_from != "" && $mileage_to != ""  && $price_from != "" && $price_to != "" && $car_sale != "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND BETWEEN '$mileage_from' AND '$mileage_to' AND price <= '$price_to' AND car_sale_id='$car_sale' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND BETWEEN '$mileage_from' AND '$mileage_to' AND price <= '$price_to' AND car_sale_id='$car_sale'  AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition != "0" && $property_loc != "0" && $body_type != "0"  && $yom != "" && $yor != "" && $engine != "" && $transmission != "0"  && $fuel_type != "0" && $mileage_from != "" && $mileage_to != ""  && $price_from != "" && $price_to != "" && $car_sale != "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND BETWEEN '$mileage_from' AND '$mileage_to' AND price <= '$price_to' AND car_sale_id='$car_sale' AND district='$property_loc' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom ='$yom' AND yor ='$yor' AND engine_size='$engine' AND transmission='$transmission' AND fuel_type='$fuel_type' AND condition_type ='$property_condition' AND BETWEEN '$mileage_from' AND '$mileage_to' AND price <= '$price_to' AND car_sale_id='$car_sale' AND district='$property_loc' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords != "" && $property_condition == "0" && $property_loc != "0" && $body_type != "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale != "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND district='$property_loc' AND search_text LIKE '%$keywords%' AND car_sale_id='$car_sale' AND body_type='$body_type' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND district='$property_loc' AND search_text LIKE '%$keywords%' AND car_sale_id='$car_sale' AND body_type='$body_type' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition == "0" && $property_loc != "0" && $body_type != "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale != "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND district='$property_loc' AND  car_sale_id='$car_sale' AND body_type='$body_type' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND district='$property_loc' AND car_sale_id='$car_sale' AND body_type='$body_type' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition == "0" && $property_loc != "0" && $body_type != "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND district='$property_loc' AND body_type='$body_type' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND district='$property_loc' AND body_type='$body_type' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom != "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE yom='$yom' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE yom='$yom' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor != "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE yor='$yor' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE yor='$yor' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine != "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE engine_size='$engine' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE engine_size='$engine' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission != "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE transmission='$transmission' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE transmission='$transmission' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type != "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE fuel_type='$fuel_type' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE fuel_type='$fuel_type' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition != "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE condition_type='$property_condition' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE condition_type='$property_condition' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from != "" && $mileage_to != ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE mileage BETWEEN '$mileage_from' AND '$mileage_to' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE mileage BETWEEN '$mileage_from' AND '$mileage_to' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from != "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE mileage > '$mileage_from' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE mileage > '$mileage_from' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to != ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE mileage < '$mileage_to' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE mileage < '$mileage_to' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }
        //            elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from != "" && $price_to != "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE price BETWEEN '$price_from' AND '$price_to' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE price BETWEEN '$price_from' AND '$price_to' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from != "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE price > '$price_from' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE price > '$price_from' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to != "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE price < '$price_to' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE price < '$price_to' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale != "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE car_sale_id = '$car_sale' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE car_sale_id = '$car_sale' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords != "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE search_text LIKE '%$car_sale%' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE search_text LIKE '%$car_sale%' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc != "0" && $body_type == "0"  && $yom == "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE district = '$property_loc' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE district = '$property_loc' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make != "0" && $model != "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom != "" && $yor == "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE district = '$property_loc' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND yom='$yom' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }elseif ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0" && $body_type == "0"  && $yom != "" && $yor != "" && $engine == "" && $transmission == "0"  && $fuel_type == "0" && $mileage_from == "" && $mileage_to == ""  && $price_from == "" && $price_to == "" && $car_sale == "0") {
        //                //var_dump("bb");
        //                $queryDefault = $this->db->query("SELECT * FROM `property` WHERE district = '$property_loc' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
        //                if ($per_page == 0) {
        //                    $query = $queryDefault;
        //                    return $query->num_rows();
        //                } else {
        //                    $query = $this->db->query("SELECT * FROM `property` WHERE yor='$yor' AND yom='$yom' AND approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
        //                    //var_dump($query->result());
        //                    return $query->result();
        //                }
        //            }else{
        //                var_dump($veriables);
        //                var_dump("X");
        //            }


    }

    function get_properties_pagination_search($veriables, $per_page, $cur_page)
    {
        $make = $veriables['pro_brand'];
        $model = $veriables['pro_model'];
        $keywords = $veriables['keyword'];
        $property_condition = $veriables['pro_property_condition'];
        $property_loc = $veriables['pro_district'];

        //  var_dump($make . "" . $model . "" . $keywords . "" . $property_condition . "" . $property_loc);

        if ($make != "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc == "0") {
            //var_dump("1");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND  approve_status=1  AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND  approve_status=1  AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                //var_dump($query->result());
                return $query->result();
            }
        } else if ($make == "0" && $model == "0"  && $keywords == "" && $property_condition == "0" && $property_loc != "0") {
            //var_dump("1");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE district='$property_loc' AND  approve_status=1  AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $query = $this->db->query("SELECT * FROM `property` WHERE district='$property_loc' AND  approve_status=1 AND dlt_status=0 and sold = 0   ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                //var_dump($query->result());
                return $query->result();
            }
        } elseif ($make != "0" && $model != "0" && $keywords == "" && $property_condition == "0" && $property_loc == "0") {
            //var_dump("2");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND  approve_status=1 AND dlt_status=0 and sold = 0  AND model='$model' ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND  approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                return $query->result();
            }
        } elseif ($make != "0" && $model != "0" && $property_condition != "0" && $property_loc == "0" && $keywords == "") {
            //var_dump("3");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND condition_type ='$property_condition' AND  approve_status=1 AND dlt_status=0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND condition_type ='$property_condition' AND  approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                return $query->result();
            }
        } elseif ($make != "0" && $model != "0" && $property_condition != "0" && $property_loc != "0" && $keywords == "") {
            //var_dump("4");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND condition_type ='$property_condition' AND  approve_status=1 AND dlt_status=0 and sold = 0  AND district ='$property_loc' ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {

                $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND model='$model' AND condition_type ='$property_condition' AND district ='$property_loc' AND  approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                return $query->result();
            }
        } elseif ($make == "0" && $model == "0" && $property_condition == "0" && $property_loc == "0" && $keywords != "") {
            // var_dump("6");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE search_text LIKE '%$keywords%' AND  approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $query = $this->db->query("SELECT * FROM `property`  WHERE search_text LIKE '%$keywords%' AND  approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                return $query->result();
            }
        } elseif ($make != "0" && $keywords != "" && $model == "0" && $property_condition == "0" && $property_loc == "0") {
            //var_dump("00");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND search_text LIKE '%$keywords%'  AND  approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND search_text LIKE '%$keywords%' AND  approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                //var_dump($query->result());
                return $query->result();
            }
        } elseif ($make != "0" && $keywords != "" && $model == "0" && $property_condition == "0" && $property_loc != "0") {
            //var_dump("pp");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND search_text LIKE '%$keywords%' AND district ='$property_loc'  AND  approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND search_text LIKE '%$keywords%' AND district ='$property_loc' AND approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC , `ref_id` DESC LIMIT $cur_page,$per_page");
                //var_dump($query->result());
                return $query->result();
            }
        } elseif ($make != "0" && $keywords != "" && $model == "0" && $property_condition != "0" && $property_loc == "0") {
            //var_dump("cc");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND search_text LIKE '%$keywords%' AND  condition_type ='$property_condition'   AND  approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $query = $this->db->query("SELECT * FROM `property` WHERE brand='$make' AND search_text LIKE '%$keywords%' AND  condition_type ='$property_condition'  AND approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                //var_dump($query->result());
                return $query->result();
            }
        } elseif ($make == "0" && $keywords == "" && $model == "0" && $property_condition == "0" && $property_loc == "0") {
            //var_dump("rr");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $x = "SELECT * FROM `property` WHERE approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page";
                $query = $this->db->query("SELECT * FROM `property` WHERE approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                //                    var_dump($x);
                //                    die();
                return $query->result();
            }
        } elseif ($make != "0" && $keywords == "" && $model == "0" && $property_condition != "0" && $property_loc == "0") {
            //var_dump("bb");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE  approve_status=1 AND dlt_status=0 and sold = 0  AND brand='$make' AND condition_type ='$property_condition' ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $query = $this->db->query("SELECT * FROM `property` WHERE approve_status=1 AND dlt_status=0 and sold = 0  AND brand='$make' AND  condition_type ='$property_condition'  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                //var_dump($query->result());
                return $query->result();
            }
        } elseif ($make == "0" && $keywords == "" && $model == "0" && $property_condition != "0" && $property_loc == "0") {
            //var_dump("bb");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE  approve_status=1  AND dlt_status=0 and sold = 0  AND  condition_type ='$property_condition' ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $query = $this->db->query("SELECT * FROM `property` WHERE approve_status=1 AND dlt_status=0 and sold = 0  AND condition_type ='$property_condition'  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                //var_dump($query->result());
                return $query->result();
            }
        } elseif ($make != "0" && $keywords != "" && $model != "0" && $property_condition == "0" && $property_loc == "0") {
            //var_dump("bb");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE  approve_status=1  AND dlt_status=0 and sold = 0  AND search_text LIKE '%$keywords%' AND brand='$make' AND model='$model' ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $query = $this->db->query("SELECT * FROM `property` WHERE approve_status=1 AND dlt_status=0 and sold = 0  AND search_text LIKE '%$keywords%' AND brand='$make' AND model='$model'  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                //var_dump($query->result());
                return $query->result();
            }
        } elseif ($make != "0" && $keywords == "" && $model == "0" && $property_condition == "0" && $property_loc != "0") {
            //var_dump("bb");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE  approve_status=1  AND dlt_status=0 and sold = 0  AND brand='$make'  AND district ='$property_loc' ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $query = $this->db->query("SELECT * FROM `property` WHERE approve_status=1 AND dlt_status=0 and sold = 0  AND  brand='$make'  AND district ='$property_loc'  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                //var_dump($query->result());
                return $query->result();
            }
        } elseif ($make == "0" && $keywords != "" && $model == "0" && $property_condition == "0" && $property_loc != "0") {
            //var_dump("bb");
            $queryDefault = $this->db->query("SELECT * FROM `property` WHERE  approve_status=1  AND dlt_status=0 and sold = 0  AND search_text='$keywords'  AND district ='$property_loc' ORDER BY DATE(posted_date) DESC, `ref_id` DESC");
            if ($per_page == 0) {
                $query = $queryDefault;
                return $query->num_rows();
            } else {
                $query = $this->db->query("SELECT * FROM `property` WHERE approve_status=1 AND dlt_status=0 and sold = 0  AND  search_text='$keywords'  AND district ='$property_loc'  ORDER BY DATE(posted_date) DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
                //var_dump($query->result());
                return $query->result();
            }
        } else {
            var_dump("X");
        }
        //

    }

    function get_properties_pagination_price($catId, $per_page, $cur_page)
    {

        if ($per_page == 0) {
            $query = $this->db->query("SELECT * ,price, CONVERT(REPLACE(REPLACE(price, ',', ''), '.', ''),UNSIGNED INTEGER) formattedPrice FROM property WHERE `body_type`='$catId' AND `approve_status`=1  AND dlt_status=0 and sold = 0  ORDER BY formattedPrice DESC");
            return $query->num_rows();
        } else {
            $query = $this->db->query("SELECT * ,price, CONVERT(REPLACE(REPLACE(price, ',', ''), '.', ''),UNSIGNED INTEGER) formattedPrice FROM property WHERE `body_type`='$catId' AND `approve_status`=1  AND dlt_status=0 and sold = 0  ORDER BY formattedPrice DESC LIMIT $cur_page,$per_page");
            return $query->result();
        }
    }

    function get_properties_pagination_price_sub($catId, $per_page, $cur_page)
    {

        if ($per_page == 0) {
            $query = $this->db->query("SELECT * ,price, CONVERT(REPLACE(REPLACE(price, ',', ''), '.', ''),UNSIGNED INTEGER) formattedPrice FROM property WHERE `sub_body_type`='$catId' AND `approve_status`=1  AND dlt_status=0 and sold = 0  ORDER BY formattedPrice DESC");
            return $query->num_rows();
        } else {
            $query = $this->db->query("SELECT * ,price, CONVERT(REPLACE(REPLACE(price, ',', ''), '.', ''),UNSIGNED INTEGER) formattedPrice FROM property WHERE `sub_body_type`='$catId' AND `approve_status`=1  AND dlt_status=0 and sold = 0  ORDER BY formattedPrice DESC LIMIT $cur_page,$per_page");
            return $query->result();
        }
    }

    function get_properties_pagination_date($catId, $per_page, $cur_page)
    {

        if ($per_page == 0) {
            $query = $this->db->query("SELECT * FROM `property` WHERE body_type='$catId' AND approve_status=1  AND dlt_status=0 and sold = 0  ORDER BY posted_date DESC, `ref_id` DESC");
            return $query->num_rows();
        } else {
            $query = $this->db->query("SELECT * FROM `property` WHERE body_type='$catId' AND  approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY posted_date DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
            return $query->result();
        }
    }

    function get_properties_pagination_date_sub($catId, $per_page, $cur_page)
    {

        if ($per_page == 0) {
            $query = $this->db->query("SELECT * FROM `property` WHERE sub_body_type='$catId' AND approve_status=1  AND dlt_status=0 and sold = 0  ORDER BY posted_date DESC, `ref_id` DESC");
            return $query->num_rows();
        } else {
            $query = $this->db->query("SELECT * FROM `property` WHERE sub_body_type='$catId' AND  approve_status=1 AND dlt_status=0 and sold = 0  ORDER BY posted_date DESC, `ref_id` DESC LIMIT $cur_page,$per_page");
            return $query->result();
        }
    }

    function get_properties_pagination_brand($catId, $per_page, $cur_page)
    {
        if ($per_page == 0) {
            $query = $this->db->query("SELECT * FROM `property` WHERE body_type='$catId' AND approve_status=1 AND dlt_status=0 and sold = 0   ORDER BY brand DESC");
            return $query->num_rows();
        } else {
            $query = $this->db->query("SELECT * FROM `property` WHERE body_type='$catId' AND approve_status=1 AND dlt_status=0 and sold = 0   ORDER BY brand DESC LIMIT $cur_page,$per_page");
            return $query->result();
        }
    }


    function get_properties_pagination_brand_sub($catId, $per_page, $cur_page)
    {

        if ($per_page == 0) {
            $query = $this->db->query("SELECT * FROM `property` WHERE sub_body_type='$catId' AND approve_status=1 AND dlt_status=0 and sold = 0   ORDER BY brand DESC");
            return $query->num_rows();
        } else {
            $query = $this->db->query("SELECT * FROM `property` WHERE sub_body_type='$catId' AND approve_status=1 AND dlt_status=0 and sold = 0   ORDER BY brand DESC LIMIT $cur_page,$per_page");
            return $query->result();
        }
    }


    function get_properties_pagination_featured_price($per_page, $cur_page)
    {

        if ($per_page == 0) {
            $query = $this->db->query("SELECT * ,price, CONVERT(REPLACE(REPLACE(price, ',', ''), '.', ''),UNSIGNED INTEGER) formattedPrice FROM property WHERE `featured`=1 AND `approve_status`=1 AND dlt_status=0 and sold = 0  ORDER BY formattedPrice DESC
");
            return $query->num_rows();
        } else {
            $query = $this->db->query("SELECT *, price, CONVERT(REPLACE(REPLACE(price, ',', ''), '.', ''),UNSIGNED INTEGER) formattedPrice FROM property WHERE `featured`=1 AND `approve_status`=1 AND dlt_status=0 and sold = 0  ORDER BY formattedPrice DESC LIMIT $cur_page,$per_page");
            return $query->result();
        }
    }

    function get_properties_pagination_featured_date($per_page, $cur_page)
    {

        if ($per_page == 0) {
            $query = $this->db->query("SELECT * FROM `property` WHERE approve_status=1 AND featured=1 AND dlt_status=0 and sold = 0  ORDER BY posted_date DESC");
            return $query->num_rows();
        } else {
            $query = $this->db->query("SELECT * FROM `property` WHERE approve_status=1 AND featured=1 AND dlt_status=0 and sold = 0  ORDER BY posted_date DESC LIMIT $cur_page,$per_page");
            return $query->result();
        }
    }

    function get_properties_pagination_featured_brand($per_page, $cur_page)
    {

        if ($per_page == 0) {
            $query = $this->db->query("SELECT * FROM `property` WHERE approve_status=1 AND featured=1 AND dlt_status=0 and sold = 0  ORDER BY brand DESC");
            return $query->num_rows();
        } else {
            $query = $this->db->query("SELECT * FROM `property` WHERE approve_status=1 AND featured=1 AND dlt_status=0 and sold = 0  ORDER BY brand DESC LIMIT $cur_page,$per_page");
            return $query->result();
        }
    }



    function savePaymentDetails($adDetailsArray)
    {
        //var_dump($adDetailsArray);
        $queryStore = $this->db->insert('payments', $adDetailsArray);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function savePaymentDetailsPro($adDetailsArray)
    {
        //var_dump($adDetailsArray);
        $this->db2 = $this->load->database('pro_db', TRUE);
        $queryStore = $this->db2->insert('payments', $adDetailsArray);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function savePaymentDetailsMis($adDetailsArray)
    {
        //var_dump($adDetailsArray);
        $this->db3 = $this->load->database('mes_db', TRUE);
        $queryStore = $this->db3->insert('payments', $adDetailsArray);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function saveWishListData($adDetailsArray)
    {
        //var_dump($adDetailsArray);
        $queryStore = $this->db->insert('wishlist', $adDetailsArray);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function getWishListDataByUserID($userId)
    {
        $this->db->from('wishlist');
        $this->db->where('user_id', $userId);
        $this->db->where('property_id !=', '0');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function checkPropertyAlreadyUserID($proId, $userId)
    {
        $this->db->from('wishlist');
        $this->db->where('property_id', $proId);
        $this->db->where('user_id', $userId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function deleteWishListById($id)
    {
        $this->db->where('id', $id);
        $del = $this->db->delete('wishlist');
        return $del;
    }

    function getPaymentDetailsByAdId($adId)
    {
        $this->db->from('payments');
        $this->db->order_by('payment_date', 'DESC');
        $this->db->where('ad_id', $adId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function getPaymentDetailsByAdIdForRenew($adId)
    {
        $this->db->from('payments');
        $this->db->order_by('payment_id', 'DESC');
        $this->db->where('ad_id', $adId);
        $this->db->limit(1);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    //    function getPaymentDetailsByAdIdExpireDate($adId){
    //        $this->db->from('payments');
    //        $this->db->order_by('expire_date', 'DESC');
    //        $this->db->where('ad_id',$adId);
    //        $queryList = $this->db->get();
    //        $queryList_result = $queryList->result();
    //        return $queryList_result;
    //    }

    function getDurationDetailsById($id)
    {
        $this->db->from('durations');
        $this->db->where('d_id', $id);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function updatePayment($payId, $arrayPAy)
    {
        $this->db->where('id', $payId);
        $queryStore = $this->db->update('payments', $arrayPAy);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function getLeadCountByPropertyId($proId)
    {
        $this->db->from('leads');
        $this->db->where('pro_id', $proId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function getCategoryDetailsByNativeId($catId)
    {
        $this->db->from('category');
        $this->db->where('id', $catId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }

    function approveAdvertisement($adId)
    {
        $queryUpdatex = $this->db->query("update payments set status = 1 where ad_id=$adId");
        $queryUpdate = $this->db->query("update property set payment_status = 1 where  property_id=$adId");
        //$queryUp = $this->db->query("update payments set status = 1 where ad_id=$propertyId");
        if ($queryUpdatex && $queryUpdate) { //&& $queryUp
            return true;
        } else {
            return false;
        }
    }

    function updateFeatureAdDetails($adId, $isFeatured)
    {
        //        $arrayPropertyDetails = array(
        //            'featured' => 1
        //        );
        //        $this->db->where('property_id',$adId);
        //        $queryStore = $this->db->update('property', $arrayPropertyDetails);
        // var_dump($adId);

        $queryUpdate = $this->db->query("update property set featured = 1 where property_id=$adId");
        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
        //        if($queryStore){
        //            return true;
        //        }else {
        //            return false;
        //        }
    }

    function updateFeatureAdDetailsProperty($adId, $isFeatured)
    {
        //        $arrayPropertyDetails = array(
        //            'featured' => 1
        //        );
        //        $this->db->where('property_id',$adId);
        //        $queryStore = $this->db->update('property', $arrayPropertyDetails);
        // var_dump($adId);
        $this->db3 = $this->load->database('pro_db', TRUE);
        $queryUpdate = $this->db3->query("update property set featured = 1 where property_id=$adId");
        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
        //        if($queryStore){
        //            return true;
        //        }else {
        //            return false;
        //        }
    }


    function updateFeatureAdDetailsMis($adId, $isFeatured)
    {
        //        $arrayPropertyDetails = array(
        //            'featured' => 1
        //        );
        //        $this->db->where('property_id',$adId);
        //        $queryStore = $this->db->update('property', $arrayPropertyDetails);
        // var_dump($adId);
        $this->db2 = $this->load->database('mes_db', TRUE);
        $queryUpdate = $this->db2->query("update property set featured = 1 where property_id=$adId");
        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
        //        if($queryStore){
        //            return true;
        //        }else {
        //            return false;
        //        }
    }


    function updateExpiredAds($propertyId, $user_id)
    {
        $adDetailsArray = array(
            'expire_status' => '1',
            'approve_status' => '0'
        );
        $this->db->where('property_id', $propertyId);
        $this->db->where('user_id', $user_id);
        $queryStore = $this->db->update('property', $adDetailsArray);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function updatePaySlipDetails($adDetailsArray, $propertyId)
    {
        //var_dump($adDetailsArray);

        $this->db->where('ad_id', $propertyId);
        $queryStore = $this->db->update('payments', $adDetailsArray);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function updateTheAdAsSold($propertyId)
    {
        $adDetailsArray = array(
            'sold' => '1',
        );
        $this->db->where('property_id', $propertyId);
        $queryStore = $this->db->update('property', $adDetailsArray);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function deleteCompareItemFromSession($sessId)
    {
        $this->db->where('session_id', $sessId);
        $del = $this->db->delete('compare_list');
        return $del;
    }

    function deleteCompareItemFromSessionProId($proId, $sessId)
    {
        $this->db->where('property_id', $proId);
        $this->db->where('session_id', $sessId);
        $del = $this->db->delete('compare_list');
        return $del;
    }

    function saveCompareListData($adDetailsArray)
    {
        $queryStore = $this->db->insert('compare_list', $adDetailsArray);
        if ($queryStore) {
            return true;
        } else {
            return false;
        }
    }

    function getCompareListDataBySessionID($sessionId)
    {
        $this->db->from('compare_list');
        $this->db->where('session_id', $sessionId);
        $this->db->where('property_id !=', '0');
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }


    function checkPropertyAlreadySessionID($proId, $sessionId)
    {
        $this->db->from('compare_list');
        $this->db->where('property_id', $proId);
        $this->db->where('session_id', $sessionId);
        $queryList = $this->db->get();
        $queryList_result = $queryList->result();
        return $queryList_result;
    }
}
