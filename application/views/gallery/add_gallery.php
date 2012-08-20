<div id="add_gallery" title="Add Album" class="dialog">
        
        <form method="post"   id="gallery_form" action="" enctype="multipart/form-data"><!--action is set from addResource.js-->
            Upload new album :<br/><br/>
            <img id="add_album_cover_prev" height="150" width="200" /><br/>
            <input id="add_album_cover" type="file" name='cover' onchange="readURL(this)" /><br><br>
        <?php
            //echo form_upload('image','onmouseover="test()"').'<br><br>';
            $this->load->helper('form');
            echo 'Album name : <br>'.form_input(array('id'=>'add_album_name','name'=>'name','class'=>'input')).'<br><br>';
    
            $result = $this->db->get('album_catagory');
            $result = $result->result();
            echo "Category :"."<br><br>";
            foreach($result as $row){ //$result is result from catagory
                //$options[$row->ID] = $row->catagory_name;
                echo form_checkbox('catagoryID[]', $row->ID)." ".$row->catagory_name."   ";
            }
            
           //

        ?>
            
        </form>
    </div>