<div id="edit_aboutfac" title="Edit Information About Faculty" class="dialog">
    <form method="post" id="edit_aboutfac_form" action="" enctype="multipart/form-data"><!--action is set from editResource.js-->
        Current Picture for Information About Faculty :<br>
        <img id="edit_aboutfac_image_prev" height="150" width="150"/><br>
        Change Picture for Information About Faculty :<br>
        <input id="edit_aboutfac_image" type="file" name='image' onchange="readURL(this)"/><br><br>
        <?php
            $this->load->helper('form');
            echo 'Description : <br>'.form_textarea(array('id'=>'edit_aboutfac_desc','name'=>'description','class'=>'input')).'<br><br>';
            $result = $this->db->get('aboutfac_catagory');
            $result = $result->result();
            foreach($result as $row){ //$result is result from catagory
                $options[$row->id] = $row->name;
            }
            echo 'Catagory : <br>'.form_dropdown('catagory',$options);
            
            echo form_hidden('id');
            echo form_hidden('oldpath');
        ?>
        
        
        <!--<label for="description">Description</label><br>
        <textarea name="description" id="description" class="input" placeholder="This's description."></textarea><br>
        <label for="path">Image</label><br>
        <input type="text" name="path" id="path" placeholder="image1.png" class="input"></input>-->
        
    </form>
</div>