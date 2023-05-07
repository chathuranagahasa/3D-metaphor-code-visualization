<section class="content-header">

    <h3>Property Management</h3>

</section>
<section class="content">
    <div class="page-breadcrumb">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <ol class="breadcrumb">
            <li><a href="http://favr-susl.dev">Home</a></li>
            <li class="active">Property Management</li>
            <li class="active">Analytics Dashboard</li>
        </ol>
    </div>
    <div class="panel-heading clearfix" style="background-color: #823168">
        <h4 class="panel-title" style=" color: #FFFFFF;">Analytics Dashboard</h4>
    </div>


    <div class="panel panel-white">

        <div class="panel-body">

            <?php if ($this->session->flashdata('message_suc_product')) { ?>
                <div class="alert alert-success"> <?= $this->session->flashdata('message_suc_product') ?> </div>
            <?php } ?>

            <div class="row">
                <div class="col-sm-12">

                    <div class="box">
                        <div class="box-header">
                            <!--   <h3 class="box-title">Users List</h3> -->
                        </div>
                        <div class="box-body">

                            <div class="panel panel-white">
                                <div class="panel-body">


            <div class="row" style="">
                <div  id="piechart" style="width: 900px; height: 500px;"></div>
            </div>

            <script>
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Category', 'Clicks'],
                        <?php
                        foreach ($postViewCount  as $ad_click){
                        $name = "";
                        $postAdCategories = $this->PropertyModel->getMainTypeById($ad_click->type_id);
                        if(count($postAdCategories) != 0){
                            $name= $postAdCategories[0]->name;
                        }
                        ?>
                        ['<?php echo $name; ?>', <?php echo ($ad_click->count_ad); ?>],
                        <?php
                        }
                        ?>
                    ]);

                    var options = {
                        title: 'Most Viewed Categories',
                        is3D: true,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }
            </script>

            <div class="col-lg-12 col-md-12 col-sn-12 col-xs-12" style="margin-bottom: 30px">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <h4>Most Viewed Categories</h4>
                    <table class="table table-striped">
                        <thead style=" background-color: #1e3863; color: #fff;">
                        <tr>
                            <th>#</th><th>Category</th><th>Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($postViewCount  as $ad_click){
                            $name = "";
                            $postAdCategories = $this->PropertyModel->getMainTypeById($ad_click->type_id);
                            if(count($postAdCategories) != 0){
                                $name= $postAdCategories[0]->name;
                            }
                            ?>

                            <tr>
                                <td></td><td><?php echo $name; ?></td><td><?php echo ($ad_click->count_ad); ?></td>
                            </tr>


                        <?php } ?>
                        </tbody>
                    </table>
                </div>


                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <h4>Most Viewed Ads</h4>

                    <table class="table table-striped">
                        <thead style=" background-color: #1e3863; color: #fff;">
                        <tr>
                            <th>#</th><th>Title</th>
                            <th>Rental / Sale</th>
                            <th>Category</th>
                            <th>Count</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($viewAdsCount  as $postAds){
                            $title = "";
                            $postAdIds = $this->PropertyModel->getPropertyDetailsByPropertyId($postAds->property_id);
                            if(count($postAdIds) != 0){
                                $title= $postAdIds[0]->title;
                                $category =  $postAdIds[0]->offer_type;
                                $postCatId = $postAdIds[0]->main_type;
                            }
                            ?>

                            <tr>
                                <td></td>
                                <td><?php echo ucwords($title); ?></td>
                                <td><?php echo ucwords($category); ?></td>
                                <td><?php
                                    $postCat = $this->PropertyModel->getMainTypeById($postCatId);
                                    if(count($postCat) != 0){
                                        echo $postCat[0]->name;
                                    }
                                    ?>
                                </td>
                                <td><?php echo $postAds->count_ad_property; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>property/view/<?php echo $postAds->property_id; ?>/<?php echo str_replace(' ', '_', (count($postAdIds) != 0) ? $postAdIds[0]->title : null); ?>">
                                        <span class="label label-primary"> View</span>
                                    </a>
                                </td>
                            </tr>


                        <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>


    </div>
</section>
</div>