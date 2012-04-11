/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */




$(document).ready(function(){
    var base_url = 'http://localhost/PRScreenserver/';
    //base_url is defined on main.php in script code
    
    $("#add_gallery_link").click(function(e){   
        //$("#billboard_form").attr("action",base_url+"admin/billboard/add_billboard");
      
        $( "#add_gallery" ).dialog({
            modal:true,
            width:500,
            height:500,
            buttons: {
                Add: function() {
                    $("#gallery_form").attr("action",base_url+"admin/gallery/add_album"); //base_url is defined on main.php in script code    
                    $("#gallery_form").submit();
                    
                    

                }
            }


        });
        //   e.preventDefault(); 

        return false;
    });
    
    
    
    
    /// Add Billboard
    $("#add_billboard_link").click(function(e){   
        //$("#billboard_form").attr("action",base_url+"admin/billboard/add_billboard");
        $("#add_billboard_image_prev").attr("src",base_url+"resources/preview.png");
        $( "#add_billboard" ).dialog({
            modal:true,
            width:500,
            height:500,
            buttons: {
                Add: function() {

                    //check that content and image are not empty.
                    //var x = $("#add_billboard_content").attr("value");
                    //alert(x);
                    if($("#add_billboard_image").attr("value")==""){
                        alert("Please choose image to be uploaded");
                    }else if($("#add_billboard_content").attr("value")==""){
                        alert("Please enter content of billboard");
                    //string.split(' ').join('');
                    }else{
                        //add action url to form
                        //alert("OK");
                        $("#billboard_form").attr("action",base_url+"admin/billboard/add_billboard"); //base_url is defined on main.php in script code    
                        $("#billboard_form").submit();
                    }

                }
            }


        });
        //   e.preventDefault(); 

        return false;
    });
    


    
    
    
    /// Add News
    $("#add_news_link").click(function(e){   
        $( "#add_news" ).dialog({
            modal:true,
            width:500,
            height:500,
            buttons: {
                Add: function() {//
                    if($("#add_news_headline").attr("value")==""){
                        alert("Please enter news headline");
                    }else if($("#add_news_content").attr("value")==""){
                        alert("Please enter content of news");
                    }else{
                        var form_data = $("#news_form").serialize();
                        //alert(form_data);
                        $.ajax(
                        {
                            type: "POST",
                            url: base_url+"index.php/admin/news/add_news",
                            data: form_data,
                            dataType: "json",
                            success: function(data){

                                $('#news_table').dataTable().fnDraw();
                                $("#add_news").dialog('close');

                            // location.reload();
                            }
                        }
                        ); 
                    }
                    
                                    
                }
            }
                        
                        
        });
        //   e.preventDefault(); 
      
        return false;
    });
    
    
    
    /// Add Location 
    $("#add_location_link").click(function(e){   
        $("#add_location_image_prev").attr("src",base_url+"resources/preview.png");
        $( "#add_location" ).dialog({
            modal:true,
            width:500,
            height:500,
            buttons: {
                Add: function() {
                    
                    if($("#add_location_roomname").attr("value")==""){
                        alert("Please enter room name");                      
                    }else if($("#add_location_image").attr("value")==""){
                        alert("Please choose image to be uploaded");
                    //string.split(' ').join('');
                    }else{
                        $("#location_form").attr("action",base_url+"admin/location/add_location");
                        $("#location_form").submit();
                    }
                }
            }
                        
                        
        });
        //   e.preventDefault(); 
      
        return false;
    });
    
    
    
    /// Add About Fac
    $("#add_about_fac_link").click(function(e){   
        $("#add_aboutfac_image_prev").attr("src",base_url+"resources/preview.png");
        $( "#add_aboutfac" ).dialog({
            modal:true,
            width:500,
            height:500,
            buttons: {
                Add: function() {
                    //alert("aaa");
                    if($("#add_aboutfac_image").attr("value")==""){
                        alert("Please choose image to be uploaded");
                    }else if($("#add_aboutfac_desc").attr("value")==""){
                        alert("Please enter description");
                    //string.split(' ').join('');
                    }else{
                    
                        $("#aboutfac_form").attr("action",base_url+"admin/aboutfac/add_aboutfac");
                        $("#aboutfac_form").submit();
                    
                    }
                                    
                }
            }
                        
                        
        });
        //   e.preventDefault(); 
      
        return false;
    });
    

    /// Add Marquee Link
    
    $("#add_marquee_link").click(function(e){   
        $( "#add_marquee" ).dialog({
            modal:true,
            width:500,
            height:500,
            buttons: {
                Add: function() {
                    var form_data = $("#marquee_form").serialize();
                    $.ajax(
                    {
                        type: "POST",
                        url: base_url+"index.php/admin/marqueetext/add_marqueetext",
                        data: form_data,
                        dataType: "json",
                        success: function(data){
                            
                            if($("#add_marquee_content").attr("value")==""){
                                alert("Please enter content of marquee text");
                            }else{
                                $('#marqueetext_table').dataTable().fnDraw();
                                $("#add_marquee").dialog('close');
                            }
                            
                        
                        // location.reload();
                        }
                    }
                    );
                                    
                }
            }
                        
                        
        });
        //   e.preventDefault(); 
      
        return false;
    });
    

    
    
    
    
    //// Prevent Submit form when press Enter (keycode=13)
    $("input").keypress(function(e){
        if(e.keyCode== '13'){
            return false ;
           
        } 
    });
    
    
    
    
});

