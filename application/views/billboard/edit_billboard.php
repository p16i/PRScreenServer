<div id="edit_billboard" title="Edit Billboard" class="dialog">
        
        <form method="post"   id="edit_billboard_form" action="" enctype="multipart/form-data"><!--action is set from editResource.js-->
            Current Billboard :<br>
            <img id="image" height="150" width="150"/><br>
            Change Picture for Billboard :<br>
            <input type="file" name='image'/><br>
            <input type="hidden" name="id" id="bill_id"/>
            <input type="hidden" name="oldpath" id="bill_oldpath" value="asads"/> <!-- use in case user doesn't change picture -->
        <?php
            $this->load->helper('form');
            echo 'Content : <br>'.form_textarea(array('name'=>'content','class'=>'input','id'=>'textarea')).'<br><br>';
            $options = array('Null'=>'none');
            $result = $this->db->get('news');
            $result = $result->result();
            foreach($result as $row){ //$result is result from catagory
                $options[$row->ID] = $row->Headline;
            }
            echo 'Choose News to Link With : <br>'.form_dropdown('newsID',$options,'Null','id=dropdown');
            form_close();
        ?>
        </form>
    </div>