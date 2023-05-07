<style>
    #renderCanvas {
        width: 100%;
        height: 100%;
        touch-action: none;
    }

    .find-home-title>h3 {
        margin-bottom: 0 !important;
    }
</style>

<script src="https://cdn.babylonjs.com/babylon.js"></script>
<script src="https://cdn.babylonjs.com/loaders/babylonjs.loaders.min.js"></script>
<script src="https://code.jquery.com/pep/0.4.3/pep.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
        <!-- <div class="section-search search-style-2">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="clearfix">
                            <form id="" action="<?php echo base_url(); ?>Vehicle/search_result" method="POST">
                                <div class="search-form pull-left">
                                    <div class="search-form-inner pull-left">

                                        <div class="col-md-12 col-sm-12 col-xs-12 no-padding" id="keyword_search">
                                            <div class="form-group">
                                                <label></label>
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
        </div> -->
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

            #is_code_smell {
                color: #ff0000;
                font-weight: 700;
                font-size: 17px;
            }

            .close_new {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close_new:hover,
            .close_new:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }
        </style>

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" style="width: 50%">
                <span class="close">&times;</span>
                <h3 style="width: 50%;" id="class_name"></h3>
                <h5 style="width: 50%;" id="code_lines">
                    </h3>
                    <p style="width: 50%;" id="is_code_smell"></p>
                    <p style="width: 50%;" id="code_smell_type"></p>
                    <p style="width: 50%; font-size:14px; color:#ff0000" id="code_snippet"></p>
                    <br>
                    <a id="btn_city_view" class='btn btn-default btn-danger btn-lg'>Go to CityView</a>
            </div>

        </div>

        <div id="myModal2" class="modal">

            <!-- Modal content -->
            <div class="modal-content" style="width: 50%">
                <h3 style="width: 50%;font-size:13px; color:#fff; font-weight:bolder; background-color:#2e4e9a;" id="priority_new"></h3>
                <span class="close_new">&times;</span>
                <h3 style="width: 80%;" id="class_name_new"></h3>
                <h5 style="width: 50%;" id="code_lines_new"></h5>

                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                <!-- <br>
                    <a id="btn_class_view" class='btn btn-default btn-danger btn-lg'>Go to Class Room</a> -->
            </div>

        </div>


        <?php

        //var_dump($classes);

        ?>

        <?php

        $total_cs_lines = 0;
        $total_non_cs_lines = 0;
        $total_effort = 0;
        $total_issues = 0;
        $total_major = 0;
        $total_minor = 0;
        $total_critical = 0;
        $total_info = 0;
        $array = array();
        $array_class_id = array();
        //var_dump($classes);
        for ($i = 0; $i < count($classes); $i++) {
            $total_cs_lines += $classes[$i]->method_lines_cs;
            $total_non_cs_lines += $classes[$i]->method_lines_non_cs;
            array_push($array, $classes[$i]->class_name);
            array_push($array_class_id, $classes[$i]->class_id);
            $total_effort += $classes[$i]->total_effort;
            $total_issues += $classes[$i]->total_issues;
            $total_major += $classes[$i]->major;
            $total_critical += $classes[$i]->critical;
            $total_info += $classes[$i]->info;
            $total_minor += $classes[$i]->minor;
        }

        //var_dump($total_non_cs_lines);
        $class_names = implode(", ", $array);


        ?>


        <div class="col-lg-12">
            <div class="col-lg-2" style="background-color:#ccc; height:100%; min-height:500px">


                <b style="font-size:19px; color :#000; padding : 5px">Navigation</b>

                <?php
                for ($k = 0; $k < count($array); $k++) {
                ?>
                    <p style="padding:5px; background-color : #666666; color: #fff">
                        <?php
                        echo $array[$k];
                        ?>
                    </p>

                    <p style="padding:5px; background-color : #cccccc; color: #000; font-size: 16px">
                        <?php
                        //echo $array_class_id[$h];
                        $methodD = $this->UserModelAdmin->getMethodListById($array_class_id[$k]);
                        for ($l = 0; $l < count($methodD); $l++) {
                            echo " -- " . $methodD[$l]->name . "<br>";
                        }
                        ?>
                    </p>
                    <?php

                    ?>
                <?php
                }
                ?>

            </div>
            <div class="col-lg-8"><canvas id="renderCanvas" touch-action="none"></canvas></div>
            <div class="col-lg-2" style="background-color:#ccc; height:100%; min-height:500px">
                <b style="font-size:19px; color :#000; padding : 5px">Summery</b>

                <p style="padding:5px; background-color : #666666; color: #fff">
                    <?php
                    if ($total_effort > 60) {
                        echo ($total_effort / 60) . " hrs effrot";
                    } else {
                        echo $total_effort . " min effrot";
                    }

                    ?>
                </p>

                <p style="padding:5px; background-color : #666666; color: #fff">
                    <?php
                    echo $total_issues . " issues";
                    ?>
                <p style="margin-left:15px;"><span style="color:#772428; font-weight:bold">Critical :</span> 
                    <?php
                     echo $total_critical;
                    ?>
                </p>
                <p style="margin-left:15px;"><span style="color:#ca5358; font-weight:bold">Major :</span> 
                    <?php
                    echo  $total_major;
                    ?>
                </p>
                <p style="margin-left:15px;"><span style="color:#d7a938; font-weight:bold">Minor :</span> 
                    <?php
                    echo $total_minor;
                    ?>
                </p>
                <p style="margin-left:15px;">
                <span style="color:#63c623; font-weight:bold">Info : </span> 
                    <?php
                    echo $total_info;
                    ?>
                </p>
                </p>

               

                <a onclick="showTooltipGraph(<?php echo $total_cs_lines; ?>,<?php echo $total_non_cs_lines; ?>)">
                    <div class="btn" style="">
                        <img src="<?php echo base_url(); ?>assets/pie.png" style="padding:20px"><br>Code smells Summery
                    </div>
                </a>

                <br>

            </div>
        </div>

        <!-- touch-action="none" for best results from PEP -->

        <script>
            var classes = <?php echo json_encode($classes); ?>;
            var i;
            var class_size;


            const canvas = document.getElementById("renderCanvas"); // Get the canvas element
            const engine = new BABYLON.Engine(canvas, true); // Generate the BABYLON 3D engine

            // Add your code here matching the playground format
            const createScene = function() {
                const scene = new BABYLON.Scene(engine);

                //const cylinder = BABYLON.MeshBuilder.CreateCylinder("cylinder", {});

                for (i = 0; i < classes.length; i++) {

                    if (classes[i].no_of_lines > 50) {
                        class_size = Math.round(classes[i].no_of_lines / 50);
                    } else {
                        class_size = 1;
                    }



                    const cylinder = BABYLON.Mesh.CreateCylinder("cylinder", 1, (class_size), (class_size));
                    cylinder.rotation.x = Math.PI / -25;
                    cylinder.addRotation(0, -Math.PI / 3, 0);
                    cylinder.position.x = classes[i].co_x;
                    cylinder.position.y = classes[i].co_y;
                    cylinder.position.z = classes[i].co_z;
                    cylinder.class_id = classes[i].class_id;
                    cylinder.class_name = classes[i].class_name;
                    cylinder.no_of_lines = classes[i].no_of_lines;
                    cylinder.base_url = '<?php echo base_url(); ?>';
                    cylinder.is_code_smell = classes[i].is_code_smell;
                    cylinder.smell_type = classes[i].smell_type;
                    cylinder.color_code = classes[i].color_code;
                    cylinder.code_snippet = classes[i].code_snippet;
                    // cylinder.code_smell_lines = classes[i].method_lines_cs;
                    // cylinder.non_code_smell_lines = classes[i].method_lines_non_cs;


                    if (cylinder.is_code_smell === "yes") {
                        var mat = new BABYLON.StandardMaterial("mat1", scene);
                        mat.alpha = 1.0;
                        mat.diffuseColor = new BABYLON.Color3(1, 0, 0);
                        cylinder.material = mat;
                    } else {
                        var mat2 = new BABYLON.StandardMaterial("mat2", scene);
                        mat2.diffuseColor = new BABYLON.Color3(1, 1, 1);
                        cylinder.material = mat2;
                    }

                    cylinder.actionManager = new BABYLON.ActionManager(this.scene);
                    cylinder.actionManager.registerAction(
                        new BABYLON.ExecuteCodeAction({
                                trigger: BABYLON.ActionManager.OnPickTrigger,
                                parameter: classes[i].id
                            },
                            function(e) {
                                showTooltip(e.source.class_id, e.source.class_name, e.source.no_of_lines, e.source.base_url, e.source.is_code_smell, e.source.smell_type, e.source.code_snippet);
                                console.log(e.source.class_id);
                            }
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



            function showTooltip(class_id, class_name, no_of_lines, base_url, is_code_smell_in, smell_types_val, code_snippet_val) {
                console.log("classname", class_name)

                setTimeout(() => {
                    var span = document.getElementsByClassName("close")[0];

                    var modal = document.getElementById("myModal");
                    modal.style.display = "block";

                    var classname_val = document.getElementById("class_name");
                    classname_val.innerHTML = class_name;

                    var code_lines_val = document.getElementById("code_lines");
                    code_lines_val.innerHTML = "Code Lines :- " + no_of_lines;

                    var is_code_smell = document.getElementById("is_code_smell");
                    var code_smell_type = document.getElementById("code_smell_type");
                    var code_snippet = document.getElementById("code_snippet");

                    if (is_code_smell_in == "yes") {
                        is_code_smell.innerHTML = "Includes Code Smells";
                        is_code_smell.style.display = "block";
                        code_smell_type.style.display = "block";
                        code_snippet.style.display = "block";
                        code_smell_type.innerHTML = "<b style='color:#333'>Type</b> : " + smell_types_val;
                        code_snippet.innerHTML = "<b style='color:#333'>Snippet : </b>" + code_snippet_val;
                    } else {
                        is_code_smell.style.display = "none";
                        code_smell_type.style.display = "none";
                        code_snippet.style.display = "none";
                    }



                    var btn_city_view = document.getElementById("btn_city_view");
                    btn_city_view.onclick = function() {
                        window.open(base_url + "api/city/" + class_id);
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



            function showTooltipGraph(cs_lines, non_cs_lines) {
                //console.log("method_name", method_name)

                var per_cs_lines = Math.round((cs_lines / non_cs_lines) * 100);
                setTimeout(() => {
                    var span = document.getElementsByClassName("close_new")[0];

                    var modal = document.getElementById("myModal2");
                    modal.style.display = "block";

                    var priority = document.getElementById("priority_new");
                    priority.innerHTML = " Code Smells Summery  : ";

                    var classname_val = document.getElementById("class_name_new");
                    classname_val.innerHTML = '<?php echo $class_names; ?>';

                    pie_chart(per_cs_lines, (100 - per_cs_lines));

                    span.onclick = function() {
                        modal.style.display = "none";
                        //selected_class_name = null;
                    }
                }, 100);
            }

            function pie_chart(class_noc, method_noc) {
                var cs = (method_noc / class_noc) * 100;
                if (cs != null) {
                    var cc = (100 - cs);
                }

                var xValues = ["Clean Code", "Code smells"];
                var yValues = [class_noc, method_noc];
                var barColors = [
                    "#3c9416",
                    "#cf1b1b"
                ];

                new Chart("myChart", {
                    type: "pie",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Code Smells Percentage (%) "
                        }
                    }
                });
            }
        </script>