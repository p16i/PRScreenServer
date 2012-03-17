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
            $this->load->helper('form');
            echo form_open('admin/news');
            foreach($result as $row){
                echo form_radio("id", $row->ID);
                echo $row->ID.' : '.$row->Headline."<br>";
            }
            echo "<br>";
            echo form_submit("option","Edit Selected").  form_submit("option","Add News").  form_submit("option","Delete");
        ?>
    </body>
</html>
