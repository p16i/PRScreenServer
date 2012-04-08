<div id="edit_billboard" title="Edit Billboard" class="dialog">
        
        <form method="post"   id="edit_billboard_form" action="" enctype="multipart/form-data"><!--action is set from editResource.js-->
            Current Billboard :<br/><br/>
            <img id="edit_billboard_image_prev" height="200" width="150" value="aaaa"/><br>
            Change Picture for Billboard :<br>
            <input id="edit_billboard_image" type="file" name='image' onchange="readURL(this)"/><br>
            <input type="hidden" name="id" id="bill_id"/>
            <input type="hidden" name="oldpath" id="bill_oldpath"/> <!-- use in case user doesn't change picture -->
        <?php
            $this->load->helper('form');
            echo 'Content : <br>'.form_textarea(array('name'=>'content','class'=>'input','id'=>'edit_billboard_content')).'<br><br>';
            $options = array('Null'=>'none');
            $result = $this->db->get('news');
            $result = $result->result();
            foreach($result as $row){ //$result is result from catagory
                $options[$row->ID] = $row->Headline;
            }
            echo 'Choose News to Link With : <br>'.form_dropdown('newsID',$options,'Null','id=dropdown');
            form_close();//
        ?>
        </form>
    </div>