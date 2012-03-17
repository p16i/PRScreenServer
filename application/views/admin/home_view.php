<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            echo anchor(site_url("admin/news/"),"News")."<br>";
            echo anchor(site_url("admin/billboard/"),"Billboard")."<br>";
            echo anchor(site_url("admin/location/"),"Location")."<br>";
            echo anchor(site_url("admin/marqueetext/"),"Marquee Text")."<br>";
            echo anchor(site_url("admin/guestbook/"),"Guestbook")."<br>";
            
            
        
        
        
        
        
           
//           echo form_open('/admin/test');
//           echo form_input(array('name'=>'name'))."<br>";
//           $option = array(
//               'A' => '1',
//               'B' => '2',
//               'C' => '3'
//           );
//           echo form_dropdown('surname',$option,'A')."<br>";
//           echo form_submit("", "OK!!");
        ?>
    </body>
</html>
