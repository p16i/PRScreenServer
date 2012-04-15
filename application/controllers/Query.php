<?php

Class Query extends CI_Controller{
    
    function news(){
        $this->load->model("News_Model");
        if(isset($_GET['id'])){ 
        #client send last id of row that it has.
            $result = $this->News_Model->get_news_by_id($_GET['id']);          
            //echo "oat";
            
        }else{
        #if client doesn't send id parameter => return all news
            $result = $this->News_Model->get_news();
            //echo "test";
        }
        foreach($result as $row):

            $news[] = array("id"=>$row->ID,
                            "headline"=>$row->Headline,
                            "content"=>$row->Content,
                            "dateTime"=>$row->_DateTime,
                            "catagory"=>$row->Name,  #In db, column name of catagory is "Name" 
                            "cID"=>$row->CatagoryID
                            );
        endforeach;
        $en_news = json_encode($news);
        echo $en_news; 
    }
    
    function billboard(){
        $this->load->model("BillBoard_Model");
        $result = $this->BillBoard_Model->get_enable();
        
        foreach($result as $row):
            if($row->NewsID==null) $tempN = 0;
            else $tempN = $row->NewsID;
            $billboard[] = array("id"=>$row->ID, 
                            "content"=>$row->Content,
                            "imagePath"=>base_url().'resources/billboard/'.$row->ImagePath,
                            "dateTime"=>$row->_DateTime,
                            "isEnable"=>$row->isEnable, 
                            "newsID"=>$tempN
                );
        endforeach;
        echo json_encode($billboard);
    }
    
    function location(){
        $this->load->model("Location_Model");
        
        if(isset($_GET['catagory'])){ 
        #client send last id of row that it has.
            $result = $this->Location_Model->get_location_by_catagory($_GET['catagory']);          
        }else{
        #if client doesn't send id parameter => return all news
            $result = $this->Location_Model->get_location();
        }
        foreach($result as $row):
            $location[] = array("id"=>$row->ID, 
                            "name"=>$row->RoomName,
                            "hitCounter"=>$row->HitCounter,
                            "floor"=>$row->Floor,
                            "imagePath"=>base_url().'resources/location/'.$row->ImagePath,
                            "catagory"=>$row->Name, 
                            "cID"=>$row->CatagoryID
                );
        endforeach;
        echo json_encode($location);
    }
    
    function location_count(){
        $this->load->model("Location_Model");
        
        $this->Location_Model->update_counter($_GET['id']);
    }
    
    function marqueeText(){
        $this->load->model("MarqueeText_Model");
        $result = $this->MarqueeText_Model->get_enable();

        foreach($result as $row):
            //if($row->NewsID == null) $tempN = 0;
            //else $tempN = $row->NewsID;
            $marqueeText[] = array("id"=>$row->ID, 
                            "content"=>$row->Content,
                            "dateTime"=>$row->_DateTime,
                            "isEnable"=>$row->isEnable
                            //"newsID"=>$tempN
                    );
        endforeach;
        echo json_encode($marqueeText);
    }
    
    function guestbook(){
        $this->load->model("Guestbook_Model");
        if(isset($_GET['id'])){ 
        #client send last id of row that it has.
            $result = $this->Guestbook_Model->get_guestbook_by_id($_GET['id']);          
        }else{
        #if client doesn't send id parameter => return all news
            $result = $this->Guestbook_Model->get_guestbook();
        }
        foreach($result as $row):
            $guestbook[] = array("id"=>$row->ID, 
                            "name"=>$row->Name,
                            "content"=>$row->Content,
                            "imagePath"=>$row->ImagePath,
                            "dateTime"=>$row->_DateTime);
        endforeach; 
        echo json_encode($guestbook);
    }
    
    function aboutFac(){
        $this->load->model("AboutFac_Model");
        $result = $this->AboutFac_Model->get_aboutfac();
        
        foreach($result as $row):
            $aboutFac[] = array("id"=>$row->id, 
                                "description"=>$row->description, 
                                "path"=>base_url().'resources/aboutfac/'.$row->path,
                                "isEnable"=>$row->isEnable,
                                "cID"=>$row->catagory,
                                "catagory"=>$row->name
                );
        endforeach;
        echo json_encode($aboutFac);
        
    }
    
    function gallery(){
        $this->load->model("Album_Model");
        $result = $this->Album_Model->get_album();
        foreach($result as $row):
            $path = 'resources/gallery/'.$row->Name.'/';
            $images = get_filenames(realpath($path));
            for($i=0;$i<count($images);$i++){
                $images[$i]=base_url().$path.$images[$i];
            }
            
            $cat_result = $this->Album_Model->get_catagory($row->ID);
            $cat = array();
            foreach($cat_result as $cat_row):
                array_push($cat, $cat_row->ID);
            endforeach;
        
            $album[] = array("id"=>$row->ID,
                             "name"=>$row->Name,
                             "quantity"=>$row->Quantity, 
                             "cover"=>$row->Cover,
                             "images"=>$images,
                             "catagory"=>$cat
                            );
        endforeach;
        echo json_encode($album);
    }
    
    function guestbook_last(){
        $this->load->model("Guestbook_Model");
        $row = $this->Guestbook_Model->get_last_guestbook();
        $guestbook = array("id"=>$row->ID, 
                            "name"=>$row->Name,
                            "content"=>$row->Content,
                            //"imagePath"=>base_url().'resources/guestbook/'.$row->ImagePath,
                            "imagePath"=>$row->ImagePath,
                            "dateTime"=>$row->_DateTime);
        
        echo json_encode($guestbook);
    }
    
    function qr_key(){
        $client_id = $this->input->get("client_id");
        $this->load->model("Guestbook_Model");
        $row = $this->Guestbook_Model->get_qr_key($client_id);
        if($row!=null){//if client_id is exists in qr_key table
            $key = $row->key;
        }else{//if client_id isn't exist in qr_key table
            //create new row in table with new client_id
            $key = $this->Guestbook_Model->add_client($client_id);
        }
        echo json_encode($key);
    }
    
    
    
}


?>
