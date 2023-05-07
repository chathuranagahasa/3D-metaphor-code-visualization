<?php

/**
 * Created by PhpStorm.
 * User: ChathurangaH
 * Date: 1/24/18
 * Time: 7:02 PM
 */



class Api extends CI_Controller
{
    public $array_x_co = array();
    public $array_z_co = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModelAdmin');
        $this->load->model('PropertyModel');
        $this->load->model('UserModel');
       
        
    }

    public function get_json(){
        $dir = realpath(".") . '/application/views/files/format.json';
        $jsondata = file_get_contents($dir);
        $data = json_decode($jsondata, true);
        //var_dump();
        $classes = $data["classes"];
        

        for($j=0; $j < count($classes); $j++){
            
            $arrayClass = array(
                'class_id' => $classes[$j]['class_id'],
                'class_name' => $classes[$j]['class_name'],
                'no_of_lines' => $classes[$j]['no_of_lines'],
                'co_x' => $classes[$j]['position'][0]['x'],
                'co_y' => $classes[$j]['position'][0]['y'],
                'co_z' => $classes[$j]['position'][0]['z'],
                'is_code_smell' => $classes[$j]['is_code_smell'],
                'smell_type' => $classes[$j]['smell_type'],
                'color_code' => $classes[$j]['color_code'],
                'code_snippet' => $classes[$j]['code_snippet'],
            );

            $save = $this->UserModelAdmin->saveClass($arrayClass);

            $methods = $classes[$j]["methods"];
            for($i=0; $i < count($methods); $i++){
                $parameters = $methods[$i]['parameters'];
                for($k=0; $k < count($parameters); $k++){
                    $arrayParamters = array(
                        'method_id' => $methods[$i]['method_id'],
                        'class_id' => $methods[$i]['class_id'],
                        'pname' => $parameters[$k]['pname'],
                    );
            
                    $saveP = $this->UserModelAdmin->storeParamters($arrayParamters);
                }
                $arrayMethod = array(
                    'method_id' => $methods[$i]['class_id'],
                    'name' => $methods[$i]['name'],
                    'no_of_lines' => $methods[$i]['no_of_lines'],
                    'co_x' => $methods[$i]['position'][0]['x'],
                    'co_y' => $methods[$i]['position'][0]['y'],
                    'co_z' => $methods[$i]['position'][0]['z'],
                    'is_code_smell' => $methods[$i]['is_code_smell'],
                    'smell_type' => $methods[$i]['smell_type'],
                    'color_code' => $methods[$i]['color_code'],
                    'code_snippet' => $methods[$i]['code_snippet'],
                    'no_of_attributes' => $methods[$i]['no_of_attributes'],
                    'class_id' => $methods[$i]['class_id'],
                    'priority' => $methods[$i]['priority'],
                );
        
                $saveM = $this->UserModelAdmin->saveMethod($arrayMethod);
            }

           
        }
        
        

        

        //$data['main_content'] = 'files/island_view';
        //$this->load->view('includes/template', $data);
    }

    public function island()
    {
        $classes = $this->UserModelAdmin->getClassList();
        for($i=0; $i < count($classes); $i++){
            $methods = $this->UserModelAdmin->getMethodsByClassIdNative($classes[$i]->class_id);
            $total_method_lines_codesmell = 0;
            $total_method_lines_non_codesmell = 0;
            $total_issues = null;
            $total_effort = 0;
            $total_major = 0;
            $total_minor = 0;
            $total_critical = 0;
            $total_info = 0;
            for($j=0; $j < count($methods); $j ++){
                if($methods[$j]->is_code_smell == "yes"){
                    $total_method_lines_codesmell += $methods[$j]->no_of_lines;
                    $total_issues +=  $methods[$j]->co_y;
                }else{
                    $total_method_lines_non_codesmell += $methods[$j]->no_of_lines;
                }

                if($methods[$j]->priority == "Major"){
                    $total_major += $methods[$j]->co_y;
                }else if($methods[$j]->priority == "Minor"){
                    $total_minor += $methods[$j]->co_y;
                }else if($methods[$j]->priority == "Info"){
                    $total_info += $methods[$j]->co_y;
                }else if($methods[$j]->priority == "Critical"){
                    $total_critical += $methods[$j]->co_y;
                }
                $total_effort += $methods[$j]->effort;
            }
            $classes[$i]->method_lines_cs = $total_method_lines_codesmell;
            $classes[$i]->method_lines_non_cs = $total_method_lines_non_codesmell;
            $classes[$i]->total_issues = $total_issues;
            $classes[$i]->major = $total_major;
            $classes[$i]->critical = $total_critical;
            $classes[$i]->info = $total_info;
            $classes[$i]->minor = $total_minor;
            $classes[$i]->total_effort = $total_effort;
            
            
        }
        //$classes[0]->total_cs_lines = 
       
        $data['classes'] =  $classes;
        $data['main_content'] = 'files/island_view';
        $this->load->view('includes/template', $data);
    }

    public function city($id)
    {
        $classes =  $this->UserModelAdmin->getClassContentListById($id);
        
        for($i=0; $i < count($classes); $i++){
            $methods = $this->UserModelAdmin->getMethodsByClassIdNative($classes[$i]->class_id);
            $total_method_lines_codesmell = 0;
            $total_method_lines_non_codesmell = 0;
            $total_issues = null;
            $total_effort = 0;
            $total_major = 0;
            $total_minor = 0;
            $total_critical = 0;
            $total_info = 0;
            for($j=0; $j < count($methods); $j ++){
                if($methods[$j]->is_code_smell == "yes"){
                    $total_method_lines_codesmell += $methods[$j]->no_of_lines;
                    $total_issues +=  $methods[$j]->co_y;
                }else{
                    $total_method_lines_non_codesmell += $methods[$j]->no_of_lines;
                }

                if($methods[$j]->priority == "Major"){
                    $total_major += $methods[$j]->co_y;
                }else if($methods[$j]->priority == "Minor"){
                    $total_minor += $methods[$j]->co_y;
                }else if($methods[$j]->priority == "Info"){
                    $total_info += $methods[$j]->co_y;
                }else if($methods[$j]->priority == "Critical"){
                    $total_critical += $methods[$j]->co_y;
                }
                $total_effort += $methods[$j]->effort;
            }
            $classes[$i]->method_lines_cs = $total_method_lines_codesmell;
            $classes[$i]->method_lines_non_cs = $total_method_lines_non_codesmell;
            $classes[$i]->total_issues = $total_issues;
            $classes[$i]->major = $total_major;
            $classes[$i]->critical = $total_critical;
            $classes[$i]->info = $total_info;
            $classes[$i]->minor = $total_minor;
            $classes[$i]->total_effort = $total_effort;
            $classes[$i]->class_code_lines = $classes[$i]->no_of_lines;
            
            
        }
        //$classes[0]->total_cs_lines = 
    //    var_dump($classes);
    //    die();
        $data['class'] =  $classes;
        ///$data['class'] = $this->UserModelAdmin->getClassContentListById($id);
        $data['methods'] = $this->UserModelAdmin->getMethodListById($id);
        $data['main_content'] = 'files/city_view';
        $this->load->view('includes/template', $data);
    }

    public function class_room($class_id,$method_id,$method_native_id)
    {
        
        $data['paramters'] = $this->UserModelAdmin->getParamtersListByClassMethodId($class_id, $method_id);
        $data['method'] = $this->UserModelAdmin->getMethodDetailsById($method_native_id);
        $data['class'] = $this->UserModelAdmin->getClassContentListById($class_id);
        $data['main_content'] = 'files/class_room_2';
        $this->load->view('includes/template', $data);
    }

    public function chair()
    {
        $data['main_content'] = 'files/chair';
        $this->load->view('includes/template', $data);
    }

    public function submit_zip()
    {



        $dir = realpath(".") . '/assets/uploads/data';
        foreach (glob($dir . '*.*') as $v) {
            unlink($v);
        }


        if ($_FILES["zip_file"]["name"]) {
            $filename = $_FILES["zip_file"]["name"];
            $source = $_FILES["zip_file"]["tmp_name"];
            $type = $_FILES["zip_file"]["type"];

            $name = explode(".", $filename);
            $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
            foreach ($accepted_types as $mime_type) {
                if ($mime_type == $type) {
                    $okay = true;
                    break;
                }
            }

            $continue = strtolower($name[1]) == 'zip' ? true : false;
            if (!$continue) {
                $message = "The file you are trying to upload is not a .zip file. Please try again.";
            }

            /* PHP current path */
            $path = realpath(".") . '/assets/uploads/data/';  // absolute path to the directory where zipper.php is in
            //   var_dump($path);
            //   die();
            $filenoext = basename($filename, '.zip');  // absolute path to the directory where zipper.php is in (lowercase)
            $filenoext = basename($filenoext, '.ZIP');  // absolute path to the directory where zipper.php is in (when uppercase)

            $targetdir = $path . $filenoext; // target directory
            $targetzip = $path . $filename; // target zip file

            /* create directory if not exists', otherwise overwrite */
            /* target directory is same as filename without extension */

            if (is_dir($targetdir))  rmdir_recursive($targetdir);


            mkdir($targetdir, 0777);


            /* here it is really happening */

            if (move_uploaded_file($source, $targetzip)) {
                $zip = new ZipArchive();
                $x = $zip->open($targetzip);  // open the zip file to extract
                if ($x === true) {
                    $zip->extractTo($targetdir); // place in the directory with same name  
                    $zip->close();

                    unlink($targetzip);
                }
                $message = "Your .zip file was uploaded and unpacked.";
            } else {
                $message = "There was a problem with the upload. Please try again.";
            }
        }
    }

    function rmdir_recursive($dir)
    {
        foreach (scandir($dir) as $file) {
            if ('.' === $file || '..' === $file) continue;
            if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
            else unlink("$dir/$file");
        }

        rmdir($dir);
    }




    function search_classes()
    {
        $dir = realpath(".") . '/assets/uploads/data';
        // $files = glob("*.java");
        // foreach(glob('includes/*.java') as $file) {
        //     var_dump($file);
        // }

        // $array = array();
        // foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir)) as $f) {
        //     //echo "$f <br>";   
        //     array_push($array, $f);
        // }



        $pathLen = strlen($dir);

        $this->myScanDir($dir, 0, strlen($dir));
    }




    function prePad($level)
    {
        $ss = "";

        for ($ii = 0; $ii < $level; $ii++) {
            $ss = $ss . "|&nbsp;&nbsp;";
        }

        return $ss;
    }

    function myScanDir($dir, $level, $rootLen)
    {
        global $pathLen;

        if ($handle = opendir($dir)) {

            $allFiles = array();

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    if (is_dir($dir . "/" . $entry)) {
                        $allFiles[] = "D: " . $dir . "/" . $entry;
                    } else {
                        $allFiles[] = "F: " . $dir . "/" . $entry;
                    }
                }
            }
            closedir($handle);

            natsort($allFiles);
            $i = 1;
            $num_array = array();
        
            foreach ($allFiles as $value) {

                $displayName = substr($value, $rootLen + 4);
                $fileName    = substr($value, 3);
                $linkName    = str_replace(" ", "%20", substr($value, $pathLen + 3));
                //echo $fileName."<br>";

                //echo $this->a($i)."<br>";
                if (is_dir($fileName)) {
                    //echo $this->prePad($level) . $linkName . "<br>\n";
                    $this->myScanDir($fileName, $level + 1, strlen($fileName));
                } else {
                    $this->prePad($level) . "<a href=\"" . $linkName . "\" style=\"text-decoration:none;\">" . $displayName . "</a><br>\n";

                    if (str_contains($displayName, 'java')) {


                        $lines = count(file($linkName));

                        $xyz = $this->UserModelAdmin->getXYZVals();
                        $min = 1;
                        $max = 70;
                        $rand_no = rand($min, $max);

                        $min2 = 20;
                        $max2 = 130;
                        $rand_no2 = rand($min2, $max2);
                        //var_dump($xyz[0]->x);
                        //var_dump($rand_no);
                        // echo "Y". $i."<br>";
                        // echo "Z". $i."<br>";

                        $co_x = $xyz[0]->x + $rand_no;
                        $co_z = $xyz[0]->z + $rand_no2 + ($i + 10);


                        $arrayClass = array(
                            'class_name' => $displayName,
                            'posted_date' => date('Y-m-d'),
                            'co_x' => $this->co_x_duplicate($co_x),
                            'co_y' => 1,
                            'co_z' => - ($xyz[0]->z + $rand_no2 + ($i + 10)),
                            'codelines' => $lines,
                            'file_path' => $linkName
                        );

                        $this->UserModelAdmin->storeClasses($arrayClass);

                    } else {
                        //echo "PHP string does not contain 'src"."<br>";
                    }
                }

                $i++;
            }
        }
    }

    function co_x_duplicate($co_x_val){
        $result = array_search($co_x_val,$this->array_x_co);
        if($result <= 0){
            array_push($this->array_x_co, $co_x_val);
            return ($co_x_val);
        }else{
            $min1 = 0;
            $max2 = 40;
            $rand_no2 = rand($min1, $max2);
            
            array_push($this->array_x_co, ($co_x_val * $rand_no2));
            return ($co_x_val * $rand_no2); 
        }
        
    }

    function co_y_duplicate(){
        
    }


    

    
    
}
