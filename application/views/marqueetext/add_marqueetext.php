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
            echo form_open('admin/marqueetext/add_marqueetext');
            echo 'Headline : '.form_input('headline').'<br>';
            echo 'Content : '.form_textarea('content').'<br>';
            $options = array();
            foreach($result as $row){
                $options[$row->ID] = $row->Name;
            }
            echo 'Catagory : '.form_dropdown('catagoryID',$options,'1').'<br>';
            echo 'Marquee Text : '.  form_checkbox('marquee', 'true', FALSE).'<br>';
            echo form_submit('','Add');
        ?>
    </body>
</html>
