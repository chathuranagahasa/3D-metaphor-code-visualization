<style>
    .mega-menu > section.menu-list-items{
        padding: 10px;
    }


    /*.addButton{*/
        /*background: #eaa307;*/
        /*border: 1px solid #CCCCCC;*/
        /*padding: 1px;*/
        /*padding-left: 10px;*/
        /*padding-right: 10px;*/
        /*margin: 3px;*/
        /*color: #ffffff;*/
    /*}*/

    /*.addButtonCompare{*/
        /*background: #36aaf2;*/
        /*border: 1px solid #21638e;*/
        /*color: #ffffff;*/
        /*padding: 1px;*/
        /*padding-left: 20px;*/
        /*padding-right: 20px;*/
        /*margin: 3px;*/
    /*}*/


    #more_info{
        color: #666666;
    }
    #more_info a{
        color: #21638e;
        text-decoration: underline;
    }

    #more_info a:hover{
        color: #36aaf2;
    }
    
    #more_info_li a{
        color: #ed4c06;
        font-weight: 800;
        font-size: 14px;
    }

    #more_info_li a:hover{
        color: rgba(57, 57, 57, 0.96);
        text-decoration: underline;
    }

    .category-grid-box-1 .short-description-1 ul{
        margin-top: 0;
    }

    #fav_img{
        background:url('assets/images/regi/favourite.png') no-repeat 0 0;
    }

    #fav_img:hover{
        background:url('assets/images/regi/favourite_hover.png') no-repeat 0  0;
    }

    #compare_img{
        background:url('assets/images/regi/compare.png') no-repeat 0 0;
    }

    #compare_img:hover{
        background:url('assets/images/regi/compare_hover.png') no-repeat 0  0;
    }

    .parent {
        width: 100%;
        height: 175px;
        position: relative;
        display: inline-block;
        overflow: hidden;
        margin: 0;
    }

    .parent > img {
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        min-height: 100%;
        min-width: 100%;
        transform: translate(-50%, -50%);
    }

    .category-grid-box-1 .short-description-1 ul{
        line-height: 20px;
        margin-bottom: 8px;
    }

    .grid-style-2 .category-grid-box-1 .short-description-1 ul li i{
        margin-right: 4px;
    }

    .category-grid-box-1 .short-description-1 ul li i{
        line-height: 20px;
    }

    .grid-style-2 .category-grid-box-1 .short-description-1 ul li{
        font-size: 16px;
    }

    .find-home-title > h3 {
        color: #333333;
        font-size: 28px;
        font-weight: 700;
        line-height: 20px;
        padding-top: 30px;
        background: #f6f6f6;
    }

    .custom-padding{
        padding-top: 15px;
        padding-bottom: 30px;
    }

    .client-section{
        padding-top: 10px;
    }

    .section-search{
        background: #f6f6f6;
    }

    .category-grid-box-1 h3 a{
        font-size: 16px;
        color: #000;
    }

    .category-grid-box-1 a{
        font-size: 15px;
        color: #666666;
    }

    .category-grid-box-1{
        border: 1px solid #CCCCCC;

    }

    .grid-style-2 .ad-info-1 p{
        font-size: 14px;
        padding-left: 4px;
        color: #999999;
    }

    #list_contact_no a {
        color: #505050;
        font-size: 15px;
        font-weight: 700;
    }

    #list_contact_no a:hover {
        color: #081e58;
    }

    #list_contact_no{
        padding: 4px;
        background: rgba(3, 49, 152, 0.22);
        border-radius: 2px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 38px;
    }

    .select2-container--default .select2-selection--single{
        height: 40px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow{
        height:40px;
    }

    #keyword_search .form-control{
        padding: 9px 12px;
    }

    .search-bar .search-form .btn-lg{
        padding: 10px 30px;
    }

    .search-bar .search-style-2 .search-form{
        padding: 0px 0 0px 0;
    }

    .client-logo a img{
        margin-bottom: 5px;
    }

    .grid-style-2 .category-grid-box-1 .short-description-1 ul li i{
        color: #eaa307
    }

    .search-bar .search-form .btn{
        margin-top: 28px;
    }


    .list-unstyled{
        min-height: 75px;
    }

</style>

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
                            <form id="" action="<?php echo base_url(); ?>api/submit_zip" method="POST" enctype="multipart/form-data">
                                <div class="search-form pull-left">
                                    <div class="search-form-inner pull-left">
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12 no-padding" id="keyword_search">
                                            <div class="form-group">
                                                <label></label> <!-- Keyword-->
                                                <input type="file" name="zip_file" class="form-control" placeholder="Upload Project Zip" />
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




    