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

            ul li{
                list-style: square;
                margin-left: 10px;
            }
        </style>

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" style="width: 50%">
                <h3 style="width: 50%;font-size:13px; color:#fff; font-weight:bolder; background-color:#2e4e9a;" id="priority"></h3>
                <span class="close">&times;</span>
                <h3 style="width: 50%;" id="class_name"></h3>
                <h5 style="width: 50%;" id="code_lines"></h5>


                <!-- <br>
                    <a id="btn_class_view" class='btn btn-default btn-danger btn-lg'>Go to Class Room</a> -->
            </div>

        </div>

        <div id="myModal2" class="modal">

            <!-- Modal content -->
            <div class="modal-content" style="width: 50%">
                <h3 style="width: 50%;font-size:13px; color:#fff; font-weight:bolder; background-color:#2e4e9a;" id="priority_new"></h3>
                <span class="close_new">&times;</span>
                <h3 style="width: 70%;" id="class_name_new"></h3>
                <h5 style="width: 50%;" id="code_lines_new"></h5>

                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                <!-- <br>
                    <a id="btn_class_view" class='btn btn-default btn-danger btn-lg'>Go to Class Room</a> -->
            </div>

        </div>

        <div id="myModal3" class="modal">

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

        //var_dump($method);

        $array_num = array();


        //var_dump(json_encode($methods));

        ?>



        <?php



        //var_dump($total_non_cs_lines);




        ?>


        <div class="col-lg-12">
            <div class="col-lg-2" style="background-color:#ccc; height:100%; min-height:500px">


                <b style="font-size:19px; color :#000; padding : 5px;">Navigation</b>
                <p style="padding:5px; background-color : #666666; color: #fff">
                    <?php
                    echo $class[0]->class_name;
                    ?>
                </p>

                <p style="padding:5px; background-color : #cccccc; color: #000; font-size: 16px">
                    <?php
                    //echo $array_class_id[$h];

                    echo " -- " . $method[0]->name . "<br>";

                    ?>
                </p>
                <?php

                ?>
            </div>

            <div class="col-lg-8"><canvas id="renderCanvas" touch-action="none"></canvas></div>
            <div class="col-lg-2" style="background-color:#ccc; height:100%; min-height:500px">
                <b style="font-size:19px; color :#000; padding : 5px">Summery</b>

                <p style="padding:5px; background-color : #666666; color: #fff">
                    <?php
                    if ($method[0]->effort > 60) {
                        echo ($method[0]->effort / 60) . " hrs effort";
                    } else {
                        echo $method[0]->effort . " min effort";
                    }

                    ?>
                </p>

                <div style="background-color : #fff; color: #333; padding-left:5px; padding-top:3px; ">
                        <?php
                        if ($method[0]->priority == "Critical") {
                        ?>
                            <p>Status : <span style="color:#772428; font-weight:bold">Critical </span></p>
                        <?php
                                } else if ($method[0]->priority == "Major") {
                        ?>
                            <p>Status : <span style="color:#ca5358; font-weight:bold">Major </span></p>
                        <?php
                                } else if ($method[0]->priority == "Minor") {
                        ?>
                            <p>Status : <span style="color:#d7a938; font-weight:bold">Minor </span></p>
                        <?php
                                } else if ($method[0]->priority == "Info") {
                        ?>
                            <p>Status :<span style="color:#63c623; font-weight:bold">Info </span></p>
                        <?php
                        }
                        ?>
                </div>

                <p style="padding:5px; background-color :  	#50C878; color: #fff; font-size:13px !important; font-weight:bold">
                    Refactoring (Support Links)
                </p>
                <div style="background-color : #fff; color: #333; padding-left:5px; padding-top:3px;  ">
                    <p>
                    <ul>
                    <?php
                    $array = explode(' ', $method[0]->suggested_links);
                    for($o=0; $o < count($array); $o++){
                        ?>
                            <li  style="font-size:13px !important;"><a href="<?php echo $array[$o]; ?>"><u><?php echo $array[$o]; ?></u></a></li>
                        <?php
                    }
                    ?>
                    </ul>
                   </p>
                       
                </div>

                <!-- <a onclick="showTooltipGraphSummery(<?php //echo $total_cs_lines; ?>,<?php //echo $total_class_codelines; ?>)">
                    <div class="btn">
                        <img src="<?php //echo base_url(); ?>assets/pie.png" style="padding:20px"><br>Code smells Summery
                    </div>
                </a> -->

                <br>

            </div>
        </div>


        <!-- touch-action="none" for best results from PEP -->

        <script>
            var INITIAL_ROOM_WIDTH = 45;
            var INITIAL_ROOM_LENGTH = 35;
            var INITIAL_ROOM_HEIGHT = 22;
            var currentRoomSize = {
                "width": INITIAL_ROOM_WIDTH,
                "length": INITIAL_ROOM_LENGTH,
                "height": INITIAL_ROOM_HEIGHT
            };
            var ROOM_LIGHT = 5;
            var LAMP_LIGHT = 7;
            var METER_UNIT = 5;
            var MAX_LIGHT_RANGE = 24 * METER_UNIT;
            var mainCameraTargetPostion = new BABYLON.Vector3(0, 5, 0);

            var paramters = <?php echo json_encode($paramters); ?>;
            var method = <?php echo json_encode($method); ?>;
            var classD = <?php echo json_encode($class); ?>;

            const canvas = document.getElementById("renderCanvas"); // Get the canvas element
            const engine = new BABYLON.Engine(canvas, true); // Generate the BABYLON 3D engine

            // Add your code here matching the playground format
            const createScene = function() {
                // This creates a basic Babylon Scene object (non-mesh)
                var scene = new BABYLON.Scene(engine);

                // Camera
                var camera1 = new BABYLON.ArcRotateCamera("Camera", -0.2, 0.9, 14, mainCameraTargetPostion, scene);
                camera1.attachControl(canvas);
                camera1.maxZ = 5000;
                camera1.lowerRadiusLimit = 1;
                camera1.upperRadiusLimit = 130;
                // camera1.lowerBetaLimit = 0.25;
                // camera1.upperBetaLimit = 1.62;
                camera1.setPosition(new BABYLON.Vector3(30, 30, -30));
                // camera1.speed = 1.5;
                // camera1.inertia = 1.5;
                camera1.inertia = 0.3;


                // Point Light
                var light1 = new BABYLON.PointLight("Omni0", new BABYLON.Vector3(0, currentRoomSize.height - 9, 0), scene);
                light1.diffuse = new BABYLON.Color3(1, 1, 1);
                light1.specular = new BABYLON.Color3(0.3, 0.3, 0.3);
                light1.intensity = parseFloat(LAMP_LIGHT / 10);
                light1.falloffType = BABYLON.Light.FALLOFF_STANDARD;
                light1.range = MAX_LIGHT_RANGE;


                // Hemis Light
                // var lightHemi = new BABYLON.HemisphericLight("hemiLight", new BABYLON.Vector3(0, 10, 0), scene);
                // lightHemi.intensity = parseFloat(ROOM_LIGHT / 10);
                // // lightHemi.diffuse = new BABYLON.Color3(0.89, 0.89, 0.89);
                // // lightHemi.specular = new BABYLON.Color3(0.99, 0.99, 0.99);
                // lightHemi.floorColor = new BABYLON.Color3(1, 1, 1);
                // lightHemi.falloffType = BABYLON.Light.FALLOFF_STANDARD;
                // lightHemi.range = MAX_LIGHT_RANGE;
                // lightHemi.groundColor = new BABYLON.Color3.White();


                // Floor
                var floor = BABYLON.MeshBuilder.CreatePlane("Floor", {
                    size: 0,
                    width: currentRoomSize.width,
                    height: currentRoomSize.length,
                    updatable: true
                }, scene);
                floor.notMovable = true;
                floor.position.y = 0;
                floor.rotation.x = Math.PI / 2;

                // Walls
                var width = currentRoomSize.width;
                var height = currentRoomSize.height;
                var length = currentRoomSize.length;
                var frontWall = BABYLON.MeshBuilder.CreatePlane("FrontWall", {
                    size: 0,
                    width: width,
                    height: height,
                    updatable: true
                }, scene);
                var rearWall = BABYLON.MeshBuilder.CreatePlane("RearWall", {
                    size: 0,
                    width: width,
                    height: height,
                    updatable: true
                }, scene);
                var rightWall = BABYLON.MeshBuilder.CreatePlane("RightWall", {
                    size: 0,
                    width: length,
                    height: height,
                    updatable: true
                }, scene);
                var leftWall = BABYLON.MeshBuilder.CreatePlane("LeftWall", {
                    size: 0,
                    width: length,
                    height: height,
                    updatable: true
                }, scene);

                rearWall.rotation.y = Math.PI;
                rightWall.rotation.y = Math.PI / 2;
                leftWall.rotation.y = Math.PI / 2 * 3;



                // Ceiling
                var ceiling = BABYLON.MeshBuilder.CreatePlane("Ceiling", {
                    size: 0,
                    width: currentRoomSize.width,
                    height: currentRoomSize.length,
                    updatable: true
                }, scene);
                ceiling.position.y = currentRoomSize.height;
                ceiling.notMovable = true;
                ceiling.rotation.x = Math.PI / 2 * 3;
                var myMaterial = new BABYLON.StandardMaterial("myMaterial", scene);
                ceiling.material = myMaterial;
                ceiling.material.backFaceCulling = false;

                // myMaterial.diffuseColor = new BABYLON.Color3(1, 0, 1);
                myMaterial.specularColor = new BABYLON.Color3(1, 1, 1);
                myMaterial.emissiveColor = new BABYLON.Color3(0.1, .1, 0.1);
                // myMaterial.ambientColor = new BABYLON.Color3(0.5, .51, 0.5);

                var roomSize = currentRoomSize;
                rightWall.position.x = (roomSize.width / 2);
                leftWall.position.x = -(roomSize.width / 2);
                frontWall.position.z = (roomSize.length / 2);
                rearWall.position.z = -(roomSize.length / 2);
                rightWall.position.y = roomSize.height / 2;
                leftWall.position.y = roomSize.height / 2;
                frontWall.position.y = roomSize.height / 2;
                rearWall.position.y = roomSize.height / 2;

                var widthScale = (roomSize.width / INITIAL_ROOM_WIDTH);
                frontWall.scaling.x = widthScale;
                rearWall.scaling.x = widthScale;

                var lengthScale = (roomSize.length / INITIAL_ROOM_LENGTH);
                rightWall.scaling.x = lengthScale;
                leftWall.scaling.x = lengthScale;

                var heightScale = (roomSize.height / INITIAL_ROOM_HEIGHT);
                frontWall.scaling.y = heightScale;
                rearWall.scaling.y = heightScale
                rightWall.scaling.y = heightScale;
                leftWall.scaling.y = heightScale;

                ceiling.scaling.x = widthScale;
                ceiling.scaling.y = lengthScale;
                ceiling.position.y = roomSize.height;

                floor.scaling.x = widthScale;
                floor.scaling.y = lengthScale;


                var box2 = BABYLON.MeshBuilder.CreateBox("box2", {
                    height: 4,
                    width: 35,
                    depth: 3
                }, scene);
                box2.position.y = 9;
                box2.position.x = 0;
                box2.position.z = 18;



                var mato2 = new BABYLON.StandardMaterial("mat2", scene);
                mato2.alpha = 1.0;
                mato2.diffuseColor = new BABYLON.Color3(255, 255, 255);
                box2.material = mato2;

                //box3

                var box3 = BABYLON.MeshBuilder.CreateBox("box3", {
                    height: 4,
                    width: 35,
                    depth: 3
                }, scene);
                box3.position.y = 13;
                box3.position.x = 0;
                box3.position.z = 18;



                var mato3 = new BABYLON.StandardMaterial("mat3", scene);
                mato3.alpha = 1.0;
                mato3.diffuseColor = new BABYLON.Color3(255, 255, 255);
                box3.material = mato3;

                //box34

                var box34 = BABYLON.MeshBuilder.CreateBox("box3", {
                    height: 4,
                    width: 35,
                    depth: 3
                }, scene);
                box34.position.y = 5;
                box34.position.x = 0;
                box34.position.z = 18;



                var mato34 = new BABYLON.StandardMaterial("mat34", scene);
                mato34.alpha = 1.0;
                mato34.diffuseColor = new BABYLON.Color3(255, 255, 255);
                box34.material = mato34;


                //box4

                var box4 = BABYLON.MeshBuilder.CreateBox("box4", {
                    height: 4,
                    width: 35,
                    depth: 3
                }, scene);
                box4.position.y = 17;
                box4.position.x = 0;
                box4.position.z = 18;



                var mato4 = new BABYLON.StandardMaterial("mat4", scene);
                mato4.alpha = 1.0;
                mato4.diffuseColor = new BABYLON.Color3(255, 255, 255);
                box4.material = mato4;

                //box5

                var box5 = BABYLON.MeshBuilder.CreateBox("box5", {
                    height: 3,
                    width: 35,
                    depth: 3
                }, scene);
                box5.position.y = 20;
                box5.position.x = 0;
                box5.position.z = 18;



                var mato5 = new BABYLON.StandardMaterial("mat5", scene);
                mato5.alpha = 1.0;
                mato5.diffuseColor = new BABYLON.Color3(255, 255, 255);
                box5.material = mato5;


                //box6

                var box6 = BABYLON.MeshBuilder.CreateBox("box6", {
                    height: 16,
                    width: 1,
                    depth: 3
                }, scene);
                box6.position.y = 18;
                box6.position.x = 22;
                box6.position.z = -3;

                box6.rotate(BABYLON.Axis.X, -Math.PI / 2);

                var mato6 = new BABYLON.StandardMaterial("mat6", scene);
                mato6.alpha = 1.0;
                mato6.diffuseColor = new BABYLON.Color3(255, 111, 233);
                box6.material = mato6;

                const dynamicTexture6 = new BABYLON.DynamicTexture("text", {
                        width: 100,
                        height: 30
                    }, scene);
                    mato6.diffuseTexture = dynamicTexture6;
                    dynamicTexture6.drawText("Suggestions (Tips)", null, null, "12px solid Arial", "blue", "white");

                
                //box15

                var box15 = BABYLON.MeshBuilder.CreateBox("box15", {
                    height: 16,
                    width: 1,
                    depth: 2
                }, scene);

                box15.position.y = 16
                box15.position.x = 22;
                box15.position.z = -3;

                box15.rotate(BABYLON.Axis.X, -Math.PI / 2);

                var mato15 = new BABYLON.StandardMaterial("mat15", scene);
                mato15.alpha = 1.0;
                mato15.diffuseColor = new BABYLON.Color3(255, 111, 233);
                box15.material = mato15;

                const dynamicTexture15= new BABYLON.DynamicTexture("text", {
                        width: 200,
                        height: 30
                    }, scene);
                    mato15.diffuseTexture = dynamicTexture15;
                    dynamicTexture15.drawText(method[0].suggestion.split(' ').slice(0, 4).join(' '), null, null, "12px solid Arial", "black", "white");

               
                    //box16

                var box16 = BABYLON.MeshBuilder.CreateBox("box16", {
                    height: 16,
                    width: 1,
                    depth: 2
                }, scene);
                box16.position.y = 14
                box16.position.x = 22;
                box16.position.z = -3;

                box16.rotate(BABYLON.Axis.X, -Math.PI / 2);

                var mato16 = new BABYLON.StandardMaterial("mat16", scene);
                mato16.alpha = 1.0;
                mato16.diffuseColor = new BABYLON.Color3(255, 111, 233);
                box16.material = mato16;

                const dynamicTexture16 = new BABYLON.DynamicTexture("text", {
                        width: 200,
                        height: 30
                    }, scene);
                    mato16.diffuseTexture = dynamicTexture16;
                    dynamicTexture16.drawText(method[0].suggestion.split(' ').slice(4, 10).join(' '), null, null, "12px solid Arial", "black", "white");

                     //box17

                var box17 = BABYLON.MeshBuilder.CreateBox("box17", {
                    height: 16,
                    width: 1,
                    depth: 2
                }, scene);
                box17.position.y = 12
                box17.position.x = 22;
                box17.position.z = -3;

                box17.rotate(BABYLON.Axis.X, -Math.PI / 2);

                var mato17 = new BABYLON.StandardMaterial("mat17", scene);
                mato17.alpha = 1.0;
                mato17.diffuseColor = new BABYLON.Color3(255, 111, 233);
                box17.material = mato17;

                const dynamicTexture17 = new BABYLON.DynamicTexture("text", {
                        width: 200,
                        height: 30
                    }, scene);
                    mato17.diffuseTexture = dynamicTexture17;
                    dynamicTexture17.drawText(method[0].suggestion.split(' ').slice(10, 16).join(' '), null, null, "12px solid Arial", "black", "white");

                    //box18

                var box18 = BABYLON.MeshBuilder.CreateBox("box18", {
                    height: 16,
                    width: 1,
                    depth: 2
                }, scene);
                box18.position.y = 10
                box18.position.x = 22;
                box18.position.z = -3;

                box18.rotate(BABYLON.Axis.X, -Math.PI / 2);

                var mato18 = new BABYLON.StandardMaterial("mat18", scene);
                mato18.alpha = 1.0;
                mato18.diffuseColor = new BABYLON.Color3(255, 111, 233);
                box18.material = mato18;

                const dynamicTexture18 = new BABYLON.DynamicTexture("text", {
                        width: 200,
                        height:30
                    }, scene);
                    mato18.diffuseTexture = dynamicTexture18;
                    dynamicTexture18.drawText(method[0].suggestion.split(' ').slice(16, 22).join(' '), null, null, "12px solid Arial", "black", "white");
                    

                    //box19

                var box19 = BABYLON.MeshBuilder.CreateBox("box19", {
                    height: 16,
                    width: 1,
                    depth: 2
                }, scene);
                box19.position.y = 8
                box19.position.x = 22;
                box19.position.z = -3;

                box19.rotate(BABYLON.Axis.X, -Math.PI / 2);

                var mato19 = new BABYLON.StandardMaterial("mat19", scene);
                mato19.alpha = 1.0;
                mato19.diffuseColor = new BABYLON.Color3(255, 111, 233);
                box19.material = mato19;

                const dynamicTexture19 = new BABYLON.DynamicTexture("text", {
                        width: 200,
                        height:30
                    }, scene);
                    mato19.diffuseTexture = dynamicTexture19;
                    dynamicTexture19.drawText(method[0].suggestion.split(' ').slice(22, 30).join(' '), null, null, "12px solid Arial", "black", "white");
                    

                //box7

                var box7 = BABYLON.MeshBuilder.CreateBox("box7", {
                    height: 16,
                    width: 1,
                    depth: 4
                }, scene);
                box7.position.y = 4;
                box7.position.x = -22;
                box7.position.z = -3;

                box7.rotate(BABYLON.Axis.X, Math.PI/2 );
                var mato7 = new BABYLON.StandardMaterial("mat7", scene);
                mato7.diffuseColor = new BABYLON.Color3(10, 110, 200);
                box7.material = mato7;

                const dynamicTexture7 = new BABYLON.DynamicTexture("text", {
                        width: 200,
                        height:50
                    }, scene);
                    mato7.diffuseTexture = dynamicTexture7;
                    dynamicTexture7.drawText("Code Smells Graph", null, null, "20px solid Arial", "white", "green");

                //box8

                var box8 = BABYLON.MeshBuilder.CreateBox("box8", {
                    height: 16,
                    width: 1,
                    depth: 4
                }, scene);
                box8.position.y = 8;
                box8.position.x = -22;
                box8.position.z = -3;
                box8.rotate(BABYLON.Axis.X, Math.PI/2 );
                var mato8 = new BABYLON.StandardMaterial("mat8", scene);
                mato8.diffuseColor = new BABYLON.Color3(255, 255, 255);
                box8.material = mato8;

                const dynamicTexture8 = new BABYLON.DynamicTexture("text", {
                        width: 200,
                        height:50
                    }, scene);
                    mato8.diffuseTexture = dynamicTexture8;
                    dynamicTexture8.drawText("", null, null, "12px solid Arial", "black", "white");

                    //box88

                var box88 = BABYLON.MeshBuilder.CreateBox("box88", {
                    height: 16,
                    width: 1,
                    depth: 4
                }, scene);
                box88.position.y = 12;
                box88.position.x = -22;
                box88.position.z = -3;
                box88.rotate(BABYLON.Axis.X, Math.PI/2 );
                var mato88 = new BABYLON.StandardMaterial("mat8", scene);
                mato88.diffuseColor = new BABYLON.Color3(255, 255, 255);
                box88.material = mato88;

                const dynamicTexture88 = new BABYLON.DynamicTexture("text", {
                        width: 200,
                        height:40
                    }, scene);
                    mato88.diffuseTexture = dynamicTexture88;
                    dynamicTexture88.drawText(method[0].no_of_attributes, null, null, "16px solid Arial", "black", "white");

                //box9

                var box9 = BABYLON.MeshBuilder.CreateBox("box9", {
                    height: 16,
                    width: 1,
                    depth: 4
                }, scene);
                box9.position.y = 16;
                box9.position.x = -22;
                box9.position.z = -3;
                box9.rotate(BABYLON.Axis.X, Math.PI/2 );
                var mato9 = new BABYLON.StandardMaterial("mat9", scene);
                
                mato9.diffuseColor = new BABYLON.Color3(255, 255, 255);
                box9.material = mato9;


                const dynamicTexture9 = new BABYLON.DynamicTexture("text", {
                        width: 200,
                        height: 50
                    }, scene);
                    mato9.diffuseTexture = dynamicTexture9;
                    dynamicTexture9.drawText("Local Variables", null, null, "17px solid Arial", "green", "white");


                for (i = 0; i < paramters.length; i++) {
                    const box1 = BABYLON.MeshBuilder.CreateBox("box1", {
                        height: 2,
                        width: 3,
                        depth: 3
                    }, scene);
                    box1.position.y = paramters[i].co_y;
                    box1.position.x = paramters[i].co_x;
                    box1.position.z = paramters[i].co_z;
                    box1.pname = paramters[i].pname;
                    box1.code_snippet = method[0].code_snippet;
                    box1.code_smell_type = method[0].smell_type;
                    box1.priority = method[0].priority;

                    box7.class_name = classD[0].class_name;
                    box7.method_name = method[0].name;
                    box7.class_NOC = classD[0].no_of_lines;
                    box7.method_NOC = method[0].no_of_lines;

                    if(paramters.length > 5){
                        var mato = new BABYLON.StandardMaterial("mat1", scene);
                        mato.alpha = 1.0;
                        mato.diffuseColor = new BABYLON.Color3(255, 0, 0);
                        box1.material = mato;
                    }else{
                        var mato = new BABYLON.StandardMaterial("mat1", scene);
                        mato.alpha = 1.0;
                        mato.diffuseColor = new BABYLON.Color3(0, 255, 0);
                        box1.material = mato;
                    }
                   


                    const dynamicTexture = new BABYLON.DynamicTexture("text", {
                        width: 500,
                        height: 70
                    }, scene);

                    mato2.diffuseTexture = dynamicTexture;
                    dynamicTexture.drawText("Error Code : " + `${box1.code_snippet}`.split(' ').slice(0, 7).join(' '), null, null, "19px solid Arial", "black", "white");


                    const dynamicTexture2 = new BABYLON.DynamicTexture("text", {
                        width: 500,
                        height: 70
                    }, scene);
                    mato3.diffuseTexture = dynamicTexture2;
                    dynamicTexture2.drawText(`${box1.code_smell_type}`, null, null, "18px solid Arial", "red", "white");

                    const dynamicTexture4 = new BABYLON.DynamicTexture("text", {
                        width: 500,
                        height: 40
                    }, scene);
                    mato5.diffuseTexture = dynamicTexture4;
                    dynamicTexture4.drawText(`(${box1.priority})`, null, null, "18px solid Arial", "red", "white");



                    const dynamicTexture3 = new BABYLON.DynamicTexture("text", {
                        width: 500,
                        height: 70
                    }, scene);
                    mato4.diffuseTexture = dynamicTexture3;
                    dynamicTexture3.drawText("Code Smell (Type | Snippet)", null, null, "24px solid Arial", "black", "white");

                    const dynamicTexture34 = new BABYLON.DynamicTexture("text", {
                        width: 500,
                        height: 70
                    }, scene);
                    mato34.diffuseTexture = dynamicTexture34;
                    dynamicTexture34.drawText( `${box1.code_snippet}`.split(' ').slice(7, 16).join(' '), null, null, "19px solid Arial", "black", "white");

                   
                    

                    // const dynamicTexture2 = new BABYLON.DynamicTexture("text", {width: 500, height: 500}, scene);

                    // mato2.diffuseTexture = dynamicTexture2;
                    // dynamicTexture2.drawText("xxxx", null, null, "60px solid Arial", "blue", "white");


                    // var box2 = BABYLON.MeshBuilder.CreateBox("box1", {
                    //     height: 2,
                    //     width: 3,
                    //     depth: 3
                    // }, scene);
                    // box2.position.y = 0;
                    // box2.position.x = -10;
                    // box2.position.z = -5;

                    // var box3 = BABYLON.MeshBuilder.CreateBox("box1", {
                    //     height: 2,
                    //     width: 3,
                    //     depth: 3
                    // }, scene);
                    // box3.position.y = 0;
                    // box3.position.x = -2;
                    // box3.position.z = -15;


                    box1.actionManager = new BABYLON.ActionManager(this.scene);
                    box1.actionManager.registerAction(
                        new BABYLON.ExecuteCodeAction({
                                trigger: BABYLON.ActionManager.OnPointerOverTrigger,
                                parameter: paramters[i].pname
                            },
                            function(e) {
                                showTooltip(e.source.pname);


                                console.log(e.source.pname);
                            }
                        )
                    );

                    box7.actionManager = new BABYLON.ActionManager(this.scene);
                    box7.actionManager.registerAction(
                        new BABYLON.ExecuteCodeAction({
                                trigger: BABYLON.ActionManager.OnPointerOverTrigger,
                                parameter: paramters[i].pname
                            },
                            function(e) {
                                showTooltipGraph(e.source.class_name, e.source.method_name, e.source.class_NOC, e.source.method_NOC);


                                console.log(e.source.class_name);
                            }
                        )
                    );

                }




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


            function showTooltip(pname) {
                //console.log("method_name", method_name)

                setTimeout(() => {
                    var span = document.getElementsByClassName("close")[0];

                    var modal = document.getElementById("myModal");
                    modal.style.display = "block";

                    var priority = document.getElementById("priority");
                    priority.innerHTML = "Paramter Name : ";

                    var classname_val = document.getElementById("class_name");
                    classname_val.innerHTML = pname;

                    // var code_lines_val = document.getElementById("code_lines");
                    // code_lines_val.innerHTML = "Code Lines :- " + no_of_lines;

                    // var is_code_smell = document.getElementById("is_code_smell");
                    // var code_smell_type = document.getElementById("code_smell_type");
                    // var code_snippet = document.getElementById("code_snippet");

                    // if (is_code_smell_in == "yes") {
                    //     is_code_smell.innerHTML = "Includes Code Smells";
                    //     is_code_smell.style.display = "block";
                    //     code_smell_type.style.display = "block";
                    //     code_snippet.style.display = "block";
                    //     code_smell_type.innerHTML = "<b style='color:#333'>Type</b> : " + smell_types_val;
                    //     code_snippet.innerHTML = "<b style='color:#333'>Snippet : </b>"  + code_snippet_val;
                    // } else {
                    //     is_code_smell.style.display = "none";
                    //     code_smell_type.style.display = "none";
                    //     code_snippet.style.display = "none";
                    // }

                    // var btn_class_view = document.getElementById("btn_class_view");
                    // btn_class_view.onclick = function() {
                    //     window.open(base_url+"api/class_room/"+class_id+"/"+method_id);
                    // }



                    span.onclick = function() {
                        modal.style.display = "none";
                        //selected_class_name = null;
                    }
                }, 100);
            }


            function showTooltipGraph(class_name, method_name, class_noc, method_noc) {
                //console.log("method_name", method_name)

                setTimeout(() => {
                    var span = document.getElementsByClassName("close_new")[0];

                    var modal = document.getElementById("myModal2");
                    modal.style.display = "block";

                    var priority = document.getElementById("priority_new");
                    priority.innerHTML = " Graph - Code Smells % : ";

                    var classname_val = document.getElementById("class_name_new");
                    classname_val.innerHTML = class_name + " | " + method_name + " Method";

                    pie_chart(class_noc, method_noc);









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
                var yValues = [cc, cs];
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


            function showTooltipGraphSummery(cs_lines, class_lines) {
                //console.log("method_name", method_name)

                var per_cs_lines = Math.round(((class_lines - cs_lines) / class_lines) * 100);
                setTimeout(() => {
                    var span = document.getElementsByClassName("close_new")[0];

                    var modal = document.getElementById("myModal2");
                    modal.style.display = "block";

                    var priority = document.getElementById("priority_new");
                    priority.innerHTML = " Code Smells Summery  : ";

                    var classname_val = document.getElementById("class_name_new");
                   // classname_val.innerHTML = '<?php //echo $class_names; ?>';

                    pie_chart_summery(per_cs_lines, (100 - per_cs_lines));

                    span.onclick = function() {
                        modal.style.display = "none";
                        //selected_class_name = null;
                    }
                }, 100);
            }

            function pie_chart_summery(class_noc, method_noc) {
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