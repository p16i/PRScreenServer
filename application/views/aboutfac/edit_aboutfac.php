<div id="edit_aboutfac" title="Edit Information About Faculty" class="dialog">
    <form method="post" id="edit_aboutfac_form" action="http://10.0.100.74/PRScreenServer/index.php/admin/aboutfac/edit_aboutfac" enctype="multipart/form-data">
        Current Picture for Information About Faculty :<br>
        <img id="aboutfac_preview" height="150" width="150"/><br><br>
        Change Picture for Information About Faculty :<br>
        <input type="file" name='image'/><br><br>
        <?php
            $this->load->helper('form');
            echo 'Description : <br>'.form_textarea(array('name'=>'description','class'=>'input')).'<br><br>';
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