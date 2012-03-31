<div id="add_news" title="Add News" class="dialog">
    <form id="news_form"><!--action is set from addResource.js-->
        <?php
        $this->load->helper('form');
        echo 'Headline : ' . form_input(array('name'=>'headline','class'=>'input')) . '<br>';
        echo 'Content : ' . form_textarea(array('name'=>'content','class'=>'input')) . '<br>';

        $result = $this->db->get('news_catagory');
        $result = $result->result();
        $options = array();
        foreach ($result as $row) {
            $options[$row->ID] = $row->Name;
        }
        echo 'Catagory : ' . form_dropdown('catagoryID', $options, '1') . '<br>';
        //echo 'Marquee Text : ' . form_checkbox('marquee', 'true', FALSE) . '<br>';
        ?>
    </form>
</div>