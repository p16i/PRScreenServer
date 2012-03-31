<div id="add_aboutfac" title="Add Information About Faculty" class="dialog"> 
    <form method="post" id="aboutfac_form" enctype="multipart/form-data"><!--action is set from addResource.js-->
        Upload Picture for Information About Faculty :<br>
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
        ?>
        
        
        <!--<label for="description">Description</label><br>
        <textarea name="description" id="description" class="input" placeholder="This's description."></textarea><br>
        <label for="path">Image</label><br>
        <input type="text" name="path" id="path" placeholder="image1.png" class="input"></input>-->
        
    </form>
</div>