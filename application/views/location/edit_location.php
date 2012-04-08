<div id="edit_location" title="Edit Location in Faculty" class="dialog">
    <?php
    $this->load->helper('form');
    ?>

    <form method="post" action="" enctype="multipart/form-data" id="edit_location_form"><!--action is set from editResource.js-->
        <?= 'Room_Name : <br>' . form_input(array('id'=>'edit_location_roomname','name' => 'roomname', 'class' => 'input',  'style'=>'width:50%')) . '<br><br>'; ?>
        <img id="edit_location_image_prev" height="200" width="150"/><br>
        Upload Picture for Location :<br>
        <input id="edit_location_image" type="file" name='image' onchange="readURL(this)"/><br><br>
        <?php
        echo form_hidden("oldpath");
        echo form_hidden("id");
        
        $options = array();
        for($i=1;$i<=6;$i++){
            $options[$i] = $i;
        }
        echo '<pre>Floor     : '.form_dropdown('floor', $options).'<br>';
        
        $query = $this->db->get('location_catagory');
        $result = $query->result();
        $options = array();
        foreach ($result as $row) { //$result is result from catagory
            $options[$row->ID] = $row->Name;
        }//

        echo 'Catagory  : ' . form_dropdown('catagoryID', $options).'</pre>';
        //echo '<br><br>' . form_submit('', 'Submit');
        echo form_close();
        ?>
    </form>
</div>