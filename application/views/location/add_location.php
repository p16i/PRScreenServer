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

           // $this->load->helper('form');
            //echo form_open_multipart('admin/billboard/add_billboard');//send to funtion add_billboard() in controller
            
        ?>
        
        <form method="post" action="http://localhost/PRScreenServer/index.php/admin/location/add_location" enctype="multipart/form-data">
            <?= 'Room_Name : <br>'.form_input('roomname').'<br><br>'; ?>
            Upload Picture for Billboard :<br>
            <input type="file" name='image'/><br><br>
        <?php
            
            $options = array();
            foreach($result as $row){ //$result is result from catagory
                $options[$row->ID] = $row->Name;
            }
           
            echo 'Catagory : '.form_dropdown('catagoryID',$options);
            echo '<br><br>'.form_submit('','Submit');
            //echo form_close();
        ?>
        </form>
    </body>
</html>
