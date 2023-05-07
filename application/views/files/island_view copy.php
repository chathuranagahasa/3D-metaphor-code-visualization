<style>
    #renderCanvas {
        width: 100%;
        height: 100%;
        touch-action: none;
    }
</style>

<script src="https://cdn.babylonjs.com/babylon.js"></script>
<script src="https://cdn.babylonjs.com/loaders/babylonjs.loaders.min.js"></script>
<script src="https://code.jquery.com/pep/0.4.3/pep.js"></script>

<!-- =-=-=-=-=-=-= Primary Header End =-=-=-=-=-=-= -->
<!-- Master Slider -->

<!-- end Master Slider -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Search Bar =-=-=-=-=-=-= -->
    <div class="search-bar">
        <div class="find-home-title text-center">
            <h3 style="padding-bottom: 20px">Final - 3 Dimensional <span class="heading-color"> Visualization of</span> Code Smells </h3>
        </div>
        <div class="section-search search-style-2">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="clearfix">
                            <form id="" action="<?php echo base_url(); ?>Vehicle/search_result" method="POST">
                                <div class="search-form pull-left">
                                    <div class="search-form-inner pull-left">

                                        <div class="col-md-12 col-sm-12 col-xs-12 no-padding" id="keyword_search">
                                            <div class="form-group">
                                                <label></label> <!-- Keyword-->
                                                <input type="text" name="keyword" class="form-control" placeholder="Enter Text" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group pull-right">
                                        <button type="submit" value="submit" class="btn btn-lg btn-theme">Plot</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================================../SEARCH STYLE 2================================-->
        <style>
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                padding-top: 100px;
                /* Location of the box */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
                /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
            }

            /* The Close Button */
            .close {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }

            #is_code_smell{
                color: #ff0000; 
                font-weight: 700; 
                font-size:17px;
            }
        </style>

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" style="width: 50%">
                <span class="close">&times;</span>
                <h3 style="width: 50%;" id="class_name"></h3>
                <h5 style="width: 50%;" id="code_lines"></h3>
                <p style="width: 50%;" id="is_code_smell"></p>
                <br>
                <a id="btn_city_view" class='btn btn-default btn-danger btn-lg'>Go to CityView</a>
            </div>

        </div>


        <?php

        var_dump($classes);

        $array_num = array();
        for($i=0; $i < count($classes); $i ++){
            array_push($array_num, $classes[$i]->codelines);
        

                $min_code_lines = min($array_num);



                        // $class_methods = file_get_contents($linkName);
                        // $arrayPublic = explode('public static', $class_methods);
                        // $arrayPrivate = explode('private static', $class_methods);
                        
                        $fh = fopen($classes[$i]->file_path, 'r');

                        // $contents = fread($fh,100);
                        // echo nl2br($contents);

                       $text = file_get_contents($classes[$i]->file_path);
                       $text = preg_replace('!/\*.*?\*/!s', '', $text);
                       $text = preg_replace('![ \t]*//.*[ \t]*[\r\n]!', '', $text);

                      $arrayD = array(
                        'class_id' => $classes[$i]->id,
                        'value' => $text,
                      );
                        $this->UserModelAdmin->storeClassContent($arrayD);
                       
                       

                     //  var_dump($text);
                        while ($line = fgets($fh)) {
                            
                            
                             // echo($line);
                             if (str_contains($line, 'private static')) { 
                                $strArray = explode(' ',$line);
                                //echo $line."<br>";
                                //echo $strArray[5]."<br>";
                                $strArrayNew = explode('(',$strArray[5]);
                                $arrayM = array(
                                    'class_id' => $classes[$i]->id,
                                    'no_of_lines' => $classes[$i]->codelines,
                                    'method_name' => $strArrayNew[0]
                                );
                                //echo $strArrayNew[0]."<br>";

                                //$this->UserModelAdmin->storeMethods($arrayM);
                            }else if (str_contains($line, 'public static')) { 
                                $strArray = explode(' ',$line);
                                //echo $line."<br>";
                                //echo $strArray[5]."<br>";
                                $strArrayNew = explode('(',$strArray[5]);
                                $arrayM = array(
                                    'class_id' => $classes[$i]->id,
                                    'no_of_lines' => $classes[$i]->codelines,
                                    'method_name' => $strArrayNew[0]
                                );
                                //$this->UserModelAdmin->storeMethods($arrayM);
                            }
                        }
                        fclose($fh);
                        //var_dump(count($arrayPublic));

                        //var_dump ($arrayPrivate);

        }


        function get_string_between($string, $start, $end){
            $string = ' ' . $string;
            $ini = strpos($string, $start);
            if ($ini == 0) return '';
            $ini += strlen($start);
            $len = strpos($string, $end, $ini) - $ini;
            return substr($string, $ini, $len);
        }
        ?>



        <canvas id="renderCanvas" touch-action="none"></canvas>
        <!-- touch-action="none" for best results from PEP -->

        <script>
            var classes = <?php echo json_encode($classes); ?>;
            var i;
            var selected_class_name;
            var min_code_lines = <?php  echo $min_code_lines; ?>

            const canvas = document.getElementById("renderCanvas"); // Get the canvas element
            const engine = new BABYLON.Engine(canvas, true); // Generate the BABYLON 3D engine

            // Add your code here matching the playground format
            const createScene = function() {
                const scene = new BABYLON.Scene(engine);

                //const cylinder = BABYLON.MeshBuilder.CreateCylinder("cylinder", {});
                
                for ( i = 0; i < classes.length; i++) {
                   

                    var mat = new BABYLON.StandardMaterial("mat1", scene);
            mat.alpha = 1.0;
            mat.diffuseColor = new BABYLON.Color3(1, 0, 0);

            var mat2 = new BABYLON.StandardMaterial("mat2", scene);
            mat2.diffuseColor = new BABYLON.Color3(1, 1, 1);

                    const cylinder = BABYLON.Mesh.CreateCylinder("cylinder", 2, ((classes[i].codelines/min_code_lines) *6), ((classes[i].codelines/min_code_lines) *6));
                    cylinder.rotation.x = Math.PI / -25;
                    cylinder.addRotation(0, -Math.PI / 3, 0);
                    cylinder.position.x = classes[i].co_x;
                    cylinder.position.y = classes[i].co_y;
                    cylinder.position.z = classes[i].co_z;
                    cylinder.class_id = classes[i].id;
                    cylinder.class_name = classes[i].class_name;
                    cylinder.no_of_lines = classes[i].codelines;
                    cylinder.base_url = '<?php echo base_url(); ?>';
                    cylinder.is_code_smell = classes[i].is_code_smell;
                    cylinder.smell_type = classes[i].smell_type;

                    if(cylinder.is_code_smell === "1"){
                        cylinder.material = mat;
                    }else{
                        cylinder.material = mat2;
                    }
                    

                    selected_class_name = classes[i].class_name;
                    
                    cylinder.actionManager = new BABYLON.ActionManager(this.scene);
                    cylinder.actionManager.registerAction(
                       

                        new BABYLON.ExecuteCodeAction(
                            {
                                trigger: BABYLON.ActionManager.OnPointerOverTrigger,
                                parameter: classes[i].id
                            },
                            function (e) { 
                                showTooltip(e.source.class_id,e.source.class_name,e.source.no_of_lines, e.source.base_url, e.source.is_code_smell, e.source.smell_type);
                                
                                console.log(e.source.class_id); }
                        )
                    );

                    

                    // cylinder.actionManager.registerAction(
                    //     new BABYLON.ExecuteCodeAction(
                    //         BABYLON.ActionManager.OnPointerOutTrigger,
                    //         hideTooltip()
                    //     )
                    // );

                }

                // const cylinder = BABYLON.Mesh.CreateCylinder("cylinder",  1,4,4);    
                // cylinder.rotation.x = Math.PI / -25;
                // cylinder.addRotation(0, -Math.PI / 3, 0);
                // cylinder.position.x = 3;
                // cylinder.position.y = -5;
                // cylinder.position.z = -2;

                // const cylinder2 = BABYLON.Mesh.CreateCylinder("cylinder2",  1,6,6);    
                // cylinder2.rotation.x = Math.PI / -25;
                // cylinder2.addRotation(0, -Math.PI / 3, 0);
                // cylinder2.position.x = 12;
                // cylinder2.position.y = -12;
                // cylinder2.position.z = -4;

                // const cylinder3 = BABYLON.Mesh.CreateCylinder("cylinder3",  1,8,8);    
                // cylinder3.rotation.x = Math.PI / -25;
                // cylinder3.addRotation(0, -Math.PI / 3, 0);
                // cylinder3.position.x = 22;
                // cylinder3.position.y = -2;
                // cylinder3.position.z = -4;

                const camera = new BABYLON.ArcRotateCamera("camera", -Math.PI / 2, Math.PI / 2.5, 15, new BABYLON.Vector3(0, 0, 0));
                camera.attachControl(canvas, true);
                camera.useAutoRotationBehavior = false;
                const light = new BABYLON.HemisphericLight("light", new BABYLON.Vector3(1, 1, 0));


                // tooltip




                return scene;
            };



            const scene = createScene(); //Call the createScene function

            // Register a render loop to repeatedly render the scene
            engine.runRenderLoop(function() {
                scene.render();
            });

            // Watch for browser/canvas resize events
            window.addEventListener("resize", function() {
                engine.resize();
            });



            function showTooltip(class_id, class_name, no_of_lines, base_url, is_code_smell_in, smell_types) {
                console.log("classname", class_name)

                setTimeout(() => {
                    var span = document.getElementsByClassName("close")[0];

                    var modal = document.getElementById("myModal");
                    modal.style.display = "block";


                    var classname_val = document.getElementById("class_name");
                    classname_val.innerHTML  = class_name;

                    var code_lines_val = document.getElementById("code_lines");
                    code_lines_val.innerHTML  = "Code Lines :- " + no_of_lines;

                    var is_code_smell = document.getElementById("is_code_smell");
                    if(is_code_smell_in == 1){
                       
                        is_code_smell.innerHTML  = "Code Smell Includes :- " + smell_types;
                        is_code_smell.style.display = "block";
                    }else{
                        is_code_smell.style.display = "none";
                    }
                   

                    var btn_city_view = document.getElementById("btn_city_view");
                    btn_city_view.onclick = function(){
                        window.open(base_url+"api/city/"+class_id);
                    }



                    span.onclick = function() {
                        modal.style.display = "none";
                        //selected_class_name = null;
                    }
                }, 100);
            }

            // function hideTooltip() {
            //     var span = document.getElementsByClassName("close")[0];
            //     var modal = document.getElementById("myModal");
            //     modal.style.display = "none";
            //     span.onclick = function() {
            //             modal.style.display = "none";
            //         }
            // }
        </script>