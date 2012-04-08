<div id="edit_news" title="Edit News" class="dialog">
        <form id="edit_news_form">
            <input type="hidden" id="news_id" name="id"/> <!--for store choosen id-->
        <?php
            //echo form_open('admin/news/edit_news');
            echo 'Headline : '.form_input('headline','','id="edit_news_headline"').'<br>';
            echo 'Content : '.form_textarea('content','','id="edit_news_content"').'<br>';
            
            $query = $this->db->get('news_catagory');
            $catagory_result = $query->result();
            $options = array();
            foreach($catagory_result as $row){
                $options[$row->ID] = $row->Name;
            }//
            echo 'Catagory : '.form_dropdown('catagoryID',$options,'','id="news_catagory"').'<br>';
            //echo 'Marquee Text : '.  form_checkbox('marquee', 'true', FALSE).'<br>';
        ?>
        </form>
</div>