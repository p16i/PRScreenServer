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
            echo form_open('admin/news/edit_news');
            echo 'Headline : '.form_input('headline',$news_result->Headline).'<br>';
            echo 'Content : '.form_textarea('content',$news_result->Content).'<br>';
            $options = array();
            foreach($catagory_result as $row){
                $options[$row->ID] = $row->Name;
                if($row->ID==$news_result->CatagoryID){
                    $default = $row->ID;
                }
            }
            echo 'Catagory : '.form_dropdown('catagoryID',$options,$default).'<br>';
            //echo 'Marquee Text : '.  form_checkbox('marquee', 'true', FALSE).'<br>';
            echo form_hidden('id', $news_result->ID);
            echo form_submit('','Edit');
        ?>
    </body>
</html>
