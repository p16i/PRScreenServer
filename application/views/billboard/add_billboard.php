<div id="add_billboard" title="Add Billboard" class="dialog">
        
        <form method="post"   id="billboard_form" action="http://localhost/PRScreenServer/index.php/admin/billboard/add_billboard" enctype="multipart/form-data">
            Upload Picture for Billboard :<br>
            <input type="file" name='image'/><br><br>
        <?php
            //echo form_upload('image','onmouseover="test()"').'<br><br>';
            $this->load->helper('form');
            echo 'Content : <br>'.form_textarea(array('name'=>'content','class'=>'input')).'<br><br>';
            $options = array('Null'=>'none');
            $result = $this->db->get('news');
            $result = $result->result();
            foreach($result as $row){ //$result is result from catagory
                $options[$row->ID] = $row->Headline;
            }
           
            echo 'Choose News to Link With : <br>'.form_dropdown('newsID',$options,'Null');
            //echo form_close();
        ?>
        </form>
    </div>