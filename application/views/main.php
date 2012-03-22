<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>PR Screen Management System</title>
        <?php $this->load->view('header'); ?>
        <script src="<?php echo base_url(); ?>js/fetchDataFromDataTable.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>styles/dataTable.css" />
    </head>
    <body>

        <div class="wrapper">

            <div class="main_content">
                <div class="page">
                    <div id="login_form">
                        Hi,Pattarawat <a href="#"><img src="<?php echo base_url(); ?>styles/images/icons/logout.png" width="20" height="20" style="vertical-align: bottom;"/> </a>
                    </div>
                    <div class="header_1">
                        Management
                    </div>
                    <div>
                        <ul id="menu">
                            <li class="menu">
                                <a href="#" class="marquee_link">
                                    <img src="<?php echo base_url(); ?>styles/images/Menu/Marquee.png" class="menu_icon"/>
                                    <div class="menu_description">
                                        Marquee Text
                                    </div>
                                </a>
                            </li>
                            <li class="menu">
                                <a href="#" class="news_page_link">
                                    <img src="<?php echo base_url(); ?>styles/images/Menu/News.png" class="menu_icon"/>
                                    <div class="menu_description">
                                        News
                                    </div>
                                </a>
                            </li>
                            <li class="menu">
                                <a href="#" class="about_fac_link">
                                    <img src="<?php echo base_url(); ?>styles/images/Menu/AboutFac.png" class="menu_icon"/>
                                    <div class="menu_description">
                                        About Faculty
                                    </div>
                                </a>
                            </li>
                            <li class="menu"><a href="#" class="location_link">
                                    <img src="<?php echo base_url(); ?>styles/images/Menu/Location.png" class="menu_icon"/>
                                    <div class="menu_description">
                                        Location
                                    </div>
                                </a>
                            </li>
                            <li class="menu"><a href="#" class="guestbook_link">
                                    <img src="<?php echo base_url(); ?>styles/images/Menu/GuestBook.png" class="menu_icon"/>
                                    <div class="menu_description">
                                        Guestbook
                                    </div>
                                </a>
                            </li>
                            <li class="menu"><a href="#" class="gallery_link">
                                    <img src="<?php echo base_url(); ?>styles/images/Menu/Gallery.png" class="menu_icon"/>
                                    <div class="menu_description">
                                        Gallery
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="page" id="gallery_page">
                    <div class="header_1">
                        Manage Gallery Content
                    </div>
                </div>
                <div class="page" id="marquee_page">
                    <div class="header_1">
                        Manage Marquee Text
                    </div>
                </div>
                <div class="page" id="news_page">
                    <div class="header_1">
                        Manage News Content
                     
                    </div>
                       <table cellpadding="0" cellspacing="0" border="0" class="display dataTable" id="example"  aria-describedby="example_info" >
                            <thead>
                                <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 128px; " aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Rendering engine</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 179px; " aria-label="Browser: activate to sort column ascending">Browser</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 171px; " aria-label="Platform(s): activate to sort column ascending">Platform(s)</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 108px; " aria-label="Engine version: activate to sort column ascending">Engine version</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 74px; " aria-label="CSS grade: activate to sort column ascending">CSS grade</th></tr>
                            </thead>

                            <tfoot>
                                <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                            </tfoot>
                            <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="">
                                    <td class="  sorting_1">Gecko</td>
                                    <td class=" ">Firefox 1.0</td>
                                    <td class=" ">Win 98+ / OSX.2+</td>
                                    <td class="center ">1.7</td>
                                    <td class="center ">A</td>
                                </tr><tr class="">
                                    <td class="  sorting_1">Gecko</td>
                                    <td class=" ">Firefox 1.5</td>
                                    <td class=" ">Win 98+ / OSX.2+</td>
                                    <td class="center ">1.8</td>
                                    <td class="center ">A</td>
                                </tr><tr class="">
                                    <td class="  sorting_1">Gecko</td>
                                    <td class=" ">Firefox 2.0</td>
                                    <td class=" ">Win 98+ / OSX.2+</td>
                                    <td class="center ">1.8</td>
                                    <td class="center ">A</td>
                                </tr><tr class="">
                                    <td class="  sorting_1">Gecko</td>
                                    <td class=" ">Firefox 3.0</td>
                                    <td class=" ">Win 2k+ / OSX.3+</td>
                                    <td class="center ">1.9</td>
                                    <td class="center ">A</td>
                                </tr><tr class="">
                                    <td class="  sorting_1">Gecko</td>
                                    <td class=" ">Camino 1.0</td>
                                    <td class=" ">OSX.2+</td>
                                    <td class="center ">1.8</td>
                                    <td class="center ">A</td>
                                </tr><tr class="">
                                    <td class="  sorting_1">Gecko</td>
                                    <td class=" ">Camino 1.5</td>
                                    <td class=" ">OSX.3+</td>
                                    <td class="center ">1.8</td>
                                    <td class="center ">A</td>
                                </tr><tr class="">
                                    <td class="  sorting_1">Gecko</td>
                                    <td class=" ">Netscape 7.2</td>
                                    <td class=" ">Win 95+ / Mac OS 8.6-9.2</td>
                                    <td class="center ">1.7</td>
                                    <td class="center ">A</td>
                                </tr><tr class="">
                                    <td class="  sorting_1">Gecko</td>
                                    <td class=" ">Netscape Browser 8</td>
                                    <td class=" ">Win 98SE+</td>
                                    <td class="center ">1.7</td>
                                    <td class="center ">A</td>
                                </tr><tr class="">
                                    <td class="  sorting_1">Gecko</td>
                                    <td class=" ">Netscape Navigator 9</td>
                                    <td class=" ">Win 98+ / OSX.2+</td>
                                    <td class="center ">1.8</td>
                                    <td class="center ">A</td>
                                </tr><tr class="">
                                    <td class="  sorting_1">Gecko</td>
                                    <td class=" ">Mozilla 1.0</td>
                                    <td class=" ">Win 95+ / OSX.1+</td>
                                    <td class="center ">1</td>
                                    <td class="center ">A</td>
                                </tr><tr class="">
                                    <td class="  sorting_1">Gecko</td>
                                    <td class=" ">Mozilla 1.0</td>
                                    <td class=" ">Win 95+ / OSX.1+</td>
                                    <td class="center ">1</td>
                                    <td class="center ">A</td>
                                </tr><tr class="">
                                    <td class="  sorting_1">Gecko</td>
                                    <td class=" ">Mozilla 1.0</td>
                                    <td class=" ">Win 95+ / OSX.1+</td>
                                    <td class="center ">1</td>
                                    <td class="center ">A</td>
                                </tr><tr class="">
                                    <td class="  sorting_1">Gecko</td>
                                    <td class=" ">Mozilla 1.0</td>
                                    <td class=" ">Win 95+ / OSX.1+</td>
                                    <td class="center ">1</td>
                                    <td class="center ">A</td>
                                </tr></tbody></table>
                </div>
                <div class="page" id="location_page">
                    <div class="header_1">
                        Manage Location Content
                    </div>
                </div>
                <div class="page" id="guestbook_page">
                    <div class="header_1">
                        Manage Guestbook Content
                    </div>
                </div>

                <div class="page" id="about_fac_page">
                    <div class="header_1">
                        Manage About Faculty Content
                    </div>
                </div>
            </div>

            <ul id="small_menu_panel">
                <li class="small_menu">
                    <a href="#" class="marquee_link">
                        <img src="<?php echo base_url(); ?>styles/images/Menu/Marquee.png" width="50" height="50" class="menu_icon" />
                    </a>
                </li>
                <li class="small_menu">
                    <a href="#" class="news_page_link">
                        <img src="<?php echo base_url(); ?>styles/images/Menu/News.png" width="50" height="50" class="menu_icon" />
                    </a>
                </li>
                <li class="small_menu">
                    <a href="#" class="about_fac_link">
                        <img src="<?php echo base_url(); ?>styles/images/Menu/AboutFac.png" width="50" height="50" class="menu_icon"/>
                    </a>
                </li>
                <li class="small_menu">
                    <a href="#" class="location_link">
                        <img src="<?php echo base_url(); ?>styles/images/Menu/Location.png" width="50" height="50" class="menu_icon"/>
                    </a>
                </li>
                <li class="small_menu">
                    <a href="#" class="guestbook_link">
                        <img src="<?php echo base_url(); ?>styles/images/Menu/GuestBook.png" width="50" height="50" class="menu_icon"/>
                    </a>
                </li>
                <li class="small_menu">
                    <a href="#" class="gallery_link">
                        <img src="<?php echo base_url(); ?>styles/images/Menu/Gallery.png" width="50" height="50" class="menu_icon"/>
                    </a>
                </li>
            </ul>

        </div>


    </div>
</div>
<?php
$this->load->view('footer');
?>
</body>

</div>


</body>
</html>
