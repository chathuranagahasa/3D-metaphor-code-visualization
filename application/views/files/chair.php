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
    <div class="search-bar" >
       <div class="find-home-title text-center">
       <h3 style="padding-bottom: 20px">Final - 3 Dimensional   <span class="heading-color"> Visualization of</span>  Code Smells </h3>
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
                                        <button type="submit" value="submit" class="btn btn-lg btn-theme" >Plot</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================================../SEARCH STYLE 2================================-->




    



        <canvas id="renderCanvas" touch-action="none"></canvas>
    <!-- touch-action="none" for best results from PEP -->

    <script>

        


      const canvas = document.getElementById("renderCanvas"); // Get the canvas element
      const engine = new BABYLON.Engine(canvas, true); // Generate the BABYLON 3D engine

      // Add your code here matching the playground format
      const createScene = function () {
        const scene = new BABYLON.Scene(engine);

    const camera = new BABYLON.ArcRotateCamera("camera", -Math.PI / 2, Math.PI / 2.5, 2, new BABYLON.Vector3(0, 0, 0));
    camera.attachControl(canvas, true);
    const light = new BABYLON.HemisphericLight("light", new BABYLON.Vector3(1, 1, 0));

    var ground = BABYLON.Mesh.CreateGround("ground1", 10, 10, 2, scene);

    var chair1,chair2;
    BABYLON.SceneLoader.ImportMeshAsync("", "https://assets.babylonjs.com/meshes/", "SheenChair.glb").then((newMeshes) => {
        chair1 = scene.getMeshByName("SheenChair_label");
        chair1 = newMeshes[0];
        console.log(newMeshes);
        chair1.rotation = new BABYLON.Vector3(Math.PI / 2, 0, -Math.PI / 2);
        chair1.position.y = 0.16;
        chair1.position.x = -3;
        chair1.position.z = 4;
    });

    BABYLON.SceneLoader.ImportMeshAsync("", "https://assets.babylonjs.com/meshes/", "SheenChair.glb").then((newMeshes2) => {
        chair2 = scene.getMeshByName("SheenChair_label");
        chair2 = newMeshes2[0];
        console.log(newMeshes2);
        chair2.rotation = new BABYLON.Vector3(Math.PI / 2, 0, -Math.PI / 2);
        chair2.position.y = 0.35;
        chair2.position.x = -9;
        chair2.position.z = 4;
    });

    


    

    return scene;


      };

      

      const scene = createScene(); //Call the createScene function

      // Register a render loop to repeatedly render the scene
      engine.runRenderLoop(function () {
        scene.render();
      });

      // Watch for browser/canvas resize events
      window.addEventListener("resize", function () {
        engine.resize();
      });
    </script>