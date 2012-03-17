<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php $this->load->helper('url') ?>
        
    </head>
    <body>
        <script src="<?=base_url()?>js/jquery-1.7.1.min.js"></script>
        
       
        <?php

           // $this->load->helper('form');
            //echo form_open_multipart('admin/billboard/add_billboard');//send to funtion add_billboard() in controller
        ?>
        
        <form method="post" action="http://localhost/PRScreenServer/index.php/admin/billboard/add_billboard" enctype="multipart/form-data">
            Upload Picture for Billboard :<br>
            <input type="file" name='image'/><br><br>
        <?php
            //echo form_upload('image','onmouseover="test()"').'<br><br>';
            echo 'Content : <br>'.form_textarea('content').'<br><br>';
            $options = array('Null'=>'none');
            foreach($result as $row){ //$result is result from catagory
                $options[$row->ID] = $row->Headline;
            }
           
            echo 'Choose News to Link With : <br>'.form_dropdown('newsID',$options,'Null');
            echo '<br>'.form_submit('','Submit');
            //echo form_close();
        ?>
        </form>
        
        <script type="text/javascript">
        {
//            $("input").click(function(event){
//                 alert("testtttt");
//                 event.preventDefault()
//            });
//            $("input").click(function(){alert("testtttt");});
//            //alert("test");
//           function test(){
//                document.write("<h1>This is a heading</h1>");
//                document.write("<p>This is a paragraph.</p>");
//                document.write("<p>This is another paragraph.</p>");
//                alert("testttt");
//           }
        
        
        }
        
        </script>
        
        
    </body>
</html>
