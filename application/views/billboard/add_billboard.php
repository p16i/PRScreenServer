<div id="add_billboard" title="Add Billboard" class="dialog">
        
        <form method="post"   id="billboard_form" action="" enctype="multipart/form-data"><!--action is set from addResource.js-->
            Upload Picture for Billboard :<br/><br/>
            <img id="add_billboard_image_prev" height="200" width="150" /><br/>
            <input id="add_billboard_image" type="file" name='image' onchange="readURL(this)" /><br><br>
        <?php
            //echo form_upload('image','onmouseover="test()"').'<br><br>';
            $this->load->helper('form');
            echo 'Content : <br>'.form_textarea(array('id'=>'add_billboard_content','name'=>'content','class'=>'input')).'<br><br>';
            $options = array('Null'=>'none');
            $result = $this->db->get('news');
            $result = $result->result();
            foreach($result as $row){ //$result is result from catagory
                $options[$row->ID] = $row->Headline;
            }
           //
            echo 'Choose News to Link With : <br>'.form_dropdown('newsID',$options,'Null');
        ?>
        </form>
    </div>