/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){
    var maxHeight = 133 ;
    var maxWidth = 200 ;
    var $management_panel = $("#album-image-management");
    var $album_list =$("#album-file-list");
    var  uploader= new qq.FileUploader({
        debug:true,
        element: document.getElementById('file-uploader'),
        // path to server-side upload script
        action: base_url+'admin/uploadController/upload',
        onComplete: function(id, fileName, responseJSON){
          
            var node = {
                filename:fileName ,
                path : $album_list.data("data").url_path+"/"+fileName,
                thumbnail : $album_list.data("data").url_path+"/thumbnail/"+fileName
            }
            $album_list.append(createNode(node)).fadeIn();
            $("#qq-upload-li-"+id).fadeOut();
            
        }
    });
    $management_panel.dialog({
        height:700,
        width :700,
        autoOpen: false
            
    });

    $("#uploader").click(function(){
        //  alert("UPloadfer");
        //alert(base_url);
        albumUploader("My Activity");
        return false;
    });
    function albumUploader(albumname){
        
        /// Empty previous list 
        $album_list.empty();
        $(".qq-upload-list").empty();
        
        /// Set Dialog Detail
        $management_panel.dialog( "option", "title", 'Manage "'+albumname+'" album' );
        $management_panel.dialog("open");
        
        /// Fetch JSON images from db;
        $.ajax({
            url: base_url+"admin/gallery/getImageInAlbum/"+albumname,
            dataType: 'json',
            async:true,
            success: function(data){
              
                var album =  {
                    album_name:data.album_name,
                    url_path  : data.path
                };
                /// Set album detail  to $album_list
                $album_list.data("data",album);

                $.each(data, function(key, val) {
                           
                    if(key=="images"){                           
                        // alert(key);
                        for(var i = 0 ; i<val.length;i++){
                            // alert(val[i].path);
                            var node = createNode(val[i]); 
                            $album_list.append(node);
                          
                        }
                    }
                         
                        
                });
            }
        });
        
        /// Set Albumname to uploadparam
        uploader.setParams({
            name: albumname  
        });
      
     
    }
    
    function createNode(node){
        
        
        // Create neccessory element
        var $li = $(document.createElement("li"));
        var $img_div = $(document.createElement("div"));
        var $img = $(document.createElement("img"));
        var $delete_panel = $(document.createElement("div"));
        
        $li.addClass("album-file");
        $img_div.addClass("album-image-panel");
        $img.addClass("album-image");
        $delete_panel.addClass("album-image-delete-panel");
        
        // Set Data to Element 
        $delete_panel.html("x");
        $li.data("data",node);
        $img.attr("src",node.thumbnail);
        $img.hide();
        $img.load(function(){
            scaleThumbnail($img);
            // Set center vertical image
         
            var top = (maxHeight-$img.height())/2;
            $img.css("top",top);
            $img.show();
        });
    
        /// Add Node to parent
        $img_div.append($img);
        $li.append($img_div);
        $li.append($delete_panel);
   
        /// Bind Event
        $li.bind({
            mouseenter:function(e){
                // alert("Enter");
                //   javascript:console.log(node.path+"  Enter   ,,");
                e.preventDefault();
                $delete_panel.show();
                
            },
            mouseleave:function(e){
                //javascript:console.log(node.path+"   Leave  ,,");
                e.preventDefault();
                $delete_panel.hide();
                
            }
        });
        
        $delete_panel.bind("click",function(){
           
            var $parent =   $(this).parent();
            var data = $parent.data("data");
            var album_name = $album_list.data("data").album_name;
            if(confirm("Do you want to delete '"+data.filename+"' ?")){
                // alert("Delete  : "+data.filename );
              // alert(album_name);
             javascript:console.log(base_url+"admin/gallery/deleteImage/"+album_name+"/"+data.filename);
                $.ajax({
                    url: base_url+"admin/gallery/deleteImage/"+album_name+"/"+data.filename,
                    dataType: 'json',
                    async:true,
                    success: function(data){
              
                        $parent.fadeOut('slow');
                    }
                });
               
            //$parent.remove();
            }
         
        });
    
        return $li ;
    }
    function scaleThumbnail(img){
        var scale = getMinScale(img) ;
      
        var sc_height = img.height()*scale ;
        var sc_width = img.width()*scale  ;
        
        img.height(sc_height) ;
        img.width(sc_width) ;
    }
    function getMinScale(img){
        var img_pane = img.parent() ;
        var maxHeight = img_pane.height();
        var maxWidth = img_pane.width();
        var height = img.height() ;
        var width = img.width() ;
        //   alert("H : "+height+"  W : "+width);
        if(width > maxWidth || height > maxHeight)
        {
            return (maxWidth/width < maxHeight/height)? (maxWidth/width) : (maxHeight/height);
        }
        else
        {
            return 1;
        }
	
    }

    galleryuploader = albumUploader ;
    
    
});