<div id="add_location" title="Add Location in Faculty" class="dialog">
    <?php
    $this->load->helper('form');
    ?>

    <form method="post" action="http://10.0.100.74/PRScreenServer/index.php/admin/location/add_location" enctype="multipart/form-data" id="location_form">
        <?= 'Room_Name : <br>' . form_input(array('name' => 'roomname', 'class' => 'input',  'style'=>'width:50%')) . '<br><br>'; ?>
        Upload Picture for Location :<br>
        <input type="file" name='image'/><br><br>
        <?php
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
        }

        echo 'Catagory  : ' . form_dropdown('catagoryID', $options).'</pre>';
        //echo '<br><br>' . form_submit('', 'Submit');
        echo form_close();
        ?>
    </form>
</div>