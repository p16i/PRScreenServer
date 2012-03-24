<div id="add_location" title="Add Location in Faculty" class="dialog">
    <?php
    $this->load->helper('form');
    ?>

    <form method="post" action="http://localhost/PRScreenServer/index.php/admin/location/add_location" enctype="multipart/form-data" id="location_form">
        <?= 'Room_Name : <br>' . form_input(array('name' => 'roomname', 'class' => 'input')) . '<br><br>'; ?>
        Upload Picture for Location :<br>
        <input type="file" name='image'/><br><br>
        <?php
        $result = $this->db->get('location_catagory');
        $result = $result->result();
        $options = array();
        foreach ($result as $row) { //$result is result from catagory
            $options[$row->CatagoryID] = $row->Name;
        }

        echo 'Catagory : ' . form_dropdown('catagoryID', $options);
        //echo '<br><br>' . form_submit('', 'Submit');
        echo form_close();
        ?>
    </form>
</div>