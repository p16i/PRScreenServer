/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//var base_url = 'http://10.0.100.191/PRScreenServer';
//use base_url which is assigned in main.php page

//Edit Billboard
function edit_billboard_link(id){
    $.getJSON(base_url+'admin/billboard/get_billboard?id='+id, function(data){
        content = data['Content'].replace(/\<br\/>/g, "\n");//replace all of <br/> to \n to show text in textarea
        image = data['ImagePath'];
        $("#edit_billboard_image_prev").attr("src",base_url+'resources/billboard/'+image);
        $("#edit_billboard_content").attr("value",content);
        $("#bill_id").attr("value",data['ID']);
        $("#bill_oldpath").attr("value",data['ImagePath']);
        if(data['NewsID']==null)data['NewsID']='Null';
        $('#dropdown option[value='+data['NewsID']+']').attr('selected', 'selected');
        
        //alert($('input[name^="oldpath"]').attr("name"));
    });
    
    $( "#edit_billboard" ).dialog({
            modal:true,
            width:500,
            height:500,
            buttons: {
                Edit: function() {
                    //alert($("#edit_billboard_content").attr("value"));
                    if($("#edit_billboard_content").attr("value")==""){
                        alert("Please enter content of billboard");
                    }else{
                        
                        //Check image Size.
                        var $input = document.getElementById('edit_billboard_image');
                            if ($input.files && $input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var image = new Image();
                                    image.src = reader.result;
                                          image.onload = function() {
                                            var maxWidth = 10000,
                                                minWidth = 0,
                                                maxHeight = 10000,
                                                minHeight = 0,
                                                imageWidth = image.width,
                                                imageHeight = image.height;
                                                alert("Width : "+imageWidth);
                                                alert("Height : "+imageHeight);
                                                if((imageWidth > maxWidth || imageWidth < minWidth )||(imageHeight > maxHeight || imageHeight < minHeight )){
                                                    alert("Picture size out of specific range.\n  Width : "+minWidth+" to "+maxWidth+"\n  Height : "+minHeight+" to "+maxHeight);
                                                }else{
                                                    //add action url to form
                                                    //alert("OK");
                                                    $("#edit_billboard_form").attr("action",base_url+"admin/billboard/edit_billboard");
                                                    $("#edit_billboard_form").submit();
                                                }  
                                          }
                                };
                                reader.readAsDataURL($input.files[0]);
                            }
                        
                        
                        
                    }
                    
              
                }
            }            
        });
    
    return false;
}

//Delete Billboard
function delete_billboard_link(id){
    var news_data = 'id='+id;
    $.ajax(
                    {
                        type: "POST",
                        url: base_url+"admin/billboard/delete_billboard",
                        data: news_data,
                        dataType: "json",
                        success: function(data){
                            $('#billboard_table').dataTable().fnDraw();
                        },
                        error: function(data){
                            //alert(data);
                        }
                    }
           );  
    return false;
}

//Edit news
function edit_news_link(id,headline,content,catagoryid){
    //alert(id+" : "+headline+" : "+content+" : "+catagoryid);
    content = content.replace(/\<br\/>/g, "\n");  //replace all of <br/> to \n to show text in textarea
    $("#news_id").attr("value", id);
    $("#edit_news_headline").attr("value", headline);
    $("#edit_news_content").attr("value", content);
    $("#news_catagory option[value="+catagoryid+"]").attr("selected", "selected");
    //alert(id);
    
    $( "#edit_news" ).dialog({
            modal:true,
            width:500,
            height:500,
            buttons: {
                Edit: function() {
                   if($("#edit_news_headline").attr("value")==""){
                      alert("Please enter news headline");
                  }else if($("#edit_news_content").attr("value")==""){
                      alert("Please enter content of news");
                  }else{
                      var form_data = $("#edit_news_form").serialize();
                        $.ajax(
                        {
                            type: "POST",
                            url: base_url+"admin/news/edit_news",
                            data: form_data,
                            dataType: "json",
                            success: function(data){
                                //var c = $('#news_content').attr("value");
                                //$('#news_content').attr("value",c.replace('\n','<br/>'));
                                $('#news_table').dataTable().fnDraw();
                                $("#edit_news").dialog('close');

                            // location.reload();
                            },
                            error: function(data){
                                alert("error");
                                //alert(data);
                            }
                        }
                        );    
                  }
                    
                    
                                 
                }
            }
                        
                        
        });
    
    
    return false;
}

//Delete News
function delete_news_link(id){
    var news_data = 'id='+id;
    $.ajax(
                    {
                        type: "POST",
                        url: base_url+"admin/news/delete_news",
                        data: news_data,
                        dataType: "json",
                        success: function(data){
                            
                            $('#news_table').dataTable().fnDraw();
                        
                        // location.reload();
                        },
                        error: function(data){
                            //alert(data);
                        }
                    }
           );  
    return false;
}

/// Edit Location 
function edit_location_link(id,roomname,imagepath,catagoryid,floor){
    //alert("id:"+id+" roomname:"+roomname+" imagepath : "+imagepath+" cID:"+catagoryid+" floor:"+floor);
    
    $("input[name^='roomname']").attr("value",roomname);
    $("#edit_location_image_prev").attr("src",base_url+'resources/location/'+imagepath);
    $("input[name^='oldpath']").attr("value",imagepath);
    $("input[name^='id']").attr("value",id);
    $("select[name^='floor'] option[value="+floor+"]").attr('selected', 'selected');
    $("select[name^='catagoryID'] option[value="+catagoryid+"]").attr('selected','selected');

    $( "#edit_location" ).dialog({
        modal:true,
        width:500,
        height:500,
        buttons: {
            Edit: function() {
                
                if($("#edit_location_roomname").attr("value")==""){
                        alert("Please enter room name");                      
                }else{
                    
                    //check image size
                    var $input = document.getElementById('edit_location_image');
                        if ($input.files && $input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var image = new Image();
                                image.src = reader.result;
                                      image.onload = function() {
                                        var maxWidth = 10000,
                                            minWidth = 0,
                                            maxHeight = 10000,
                                            minHeight = 0,
                                            imageWidth = image.width,
                                            imageHeight = image.height;
                                            alert("Width : "+imageWidth);
                                            alert("Height : "+imageHeight);
                                            if((imageWidth > maxWidth || imageWidth < minWidth )||(imageHeight > maxHeight || imageHeight < minHeight )){
                                                alert("Picture size out of specific range.\n  Width : "+minWidth+" to "+maxWidth+"\n  Height : "+minHeight+" to "+maxHeight);
                                            }else{
                                                //add action url to form
                                                //alert("OK");
                                                $("#edit_location_form").attr("action",base_url+"admin/location/edit_location");
                                                $("#edit_location_form").submit();
                                            }  
                                      }
                            };
                            reader.readAsDataURL($input.files[0]);
                        }
                    
                    
                }
            }
        }


    });
    //   e.preventDefault(); 


    return false;
    
    
}

//Delete Location
function delete_location_link(id){
    var location_data = 'id='+id;
    $.ajax(
                    {
                        type: "POST",
                        url: base_url+"admin/location/delete_location",
                        data: location_data,
                        dataType: "json",
                        success: function(data){
                            
                            $('#location_table').dataTable().fnDraw();
                        
                        // location.reload();
                        },
                        error: function(data){
                            //alert(data);
                        }
                    }
           );  
    return false;
}

// Edit AboutFac
function edit_aboutfac_link(id,desc,imagepath,catagoryid){
    //alert(id);alert(desc);alert(imagepath);alert(catagoryID);
    desc = desc.replace(/\<br\/>/g, "\n");  //replace all of <br/> to \n to show text in textarea
    $("#edit_aboutfac_image_prev").attr("src",base_url+'resources/aboutfac/'+imagepath);
    $("input[name^='oldpath']").attr("value",imagepath);
    $("input[name^='id']").attr("value",id);
    $("textarea[name^='description']").attr("value",desc);
    $("select[name^='catagoryID'] option[value="+catagoryid+"]").attr('selected','selected');
    
    $("#edit_aboutfac").dialog({
       modal:true,
       width:500,
       height:500,
       buttons: {
           Edit: function() {
               //alert("aaaa");
               if($("#edit_aboutfac_desc").attr("value")==""){
                   alert("Please enter description");
                   //string.split(' ').join('');
               }else{
                   
                   //check image size
                    var $input = document.getElementById('edit_aboutfac_image');
                    if ($input.files && $input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var image = new Image();
                            image.src = reader.result;
                                  image.onload = function() {
                                    var maxWidth = 10000,
                                        minWidth = 0,
                                        maxHeight = 10000,
                                        minHeight = 0,
                                        imageWidth = image.width,
                                        imageHeight = image.height;
                                        alert("Width : "+imageWidth);
                                        alert("Height : "+imageHeight);
                                        if((imageWidth > maxWidth || imageWidth < minWidth )||(imageHeight > maxHeight || imageHeight < minHeight )){
                                            alert("Picture size out of specific range.\n  Width : "+minWidth+" to "+maxWidth+"\n  Height : "+minHeight+" to "+maxHeight);
                                        }else{
                                            //add action url to form
                                            //alert("OK");
                                            $("#edit_aboutfac_form").attr("action",base_url+"admin/aboutfac/edit_aboutfac");
                                            $("#edit_aboutfac_form").submit();
                                        }  
                                  }
                        };
                        reader.readAsDataURL($input.files[0]);
                    }
                    
                   
               }
           }
       }
    });
    return false;
}    

// Delete AboutFac
function delete_aboutfac_link(id){
   var location_data = 'id='+id;
    $.ajax(
                    {
                        type: "POST",
                        url: base_url+"admin/aboutfac/delete_aboutfac",
                        data: location_data,
                        dataType: "json",
                        success: function(data){
                            $('#aboutfac_table').dataTable().fnDraw();
                        
                        // location.reload();
                        },
                        error: function(data){
                            //alert(data);
                        }
                    }
           );  
    return false;
}

//Edit marquee text
function edit_marquee_link(id,content){
    //alert(id);alert(content);
    content = content.replace(/\<br\/>/g, "\n");  //replace all of <br/> to \n to show text in textarea
    $("input[name^='id']").attr("value",id);
    $("textarea[name^='content']").attr("value",content);
    
    $( "#edit_marquee" ).dialog({
            modal:true,
            width:500,
            height:500,
            buttons: {
                Edit: function() {
                    
                    if($("#edit_marquee_content").attr("value")==""){
                                alert("Please enter content of marquee text");
                    }else{
                    
                        var form_data = $("#edit_marquee_form").serialize();
                        $.ajax(
                        {
                            type: "POST",
                            url: base_url+"admin/marqueetext/edit_marqueetext",
                            data: form_data,
                            dataType: "json",
                            success: function(data){
                                $('#marqueetext_table').dataTable().fnDraw();
                                $("#edit_marquee").dialog('close');

                            // location.reload();
                            },
                            error: function(data){
                                alert('error');
                            }
                        }
                        );
                    }
                                    
                }
            }
                        
                        
        });
    
    
    
    
    return false;
}

// Delete Marquee
function delete_marquee_link(id){
    var marquee_data = 'id='+id;
    $.ajax(
                    {
                        type: "POST",
                        url: base_url+"admin/marqueetext/delete_marqueetext",
                        data: marquee_data,
                        dataType: "json",
                        success: function(data){
                            $('#marqueetext_table').dataTable().fnDraw();
                        
                        // location.reload();
                        },
                        error: function(data){
                            
                            //alert(data);
                        }
                    }
           );  
    return false;
}

function delete_guestbook_link(id){
    var guestbook_data = 'id='+id;
    $.ajax(
                    {
                        type: "POST",
                        url: base_url+"admin/guestbook/delete_guestbook",
                        data: guestbook_data,
                        dataType: "json",
                        success: function(data){
                            //alert("success");
                            $('#guestbook_table').dataTable().fnDraw();
                        
                        // location.reload();
                        },
                        error: function(data){
                            alert("error");
                            //alert(data);
                        }
                    }
           );  
    return false;
}

function delete_gallery_link(id){
    var album_data = 'id='+id;
    $.ajax(
                    {
                        type: "POST",
                        url: base_url+"admin/gallery/delete_album",
                        data: album_data,
                        dataType: "json",
                        success: function(data){
                            //alert("success");
                            $('#gallery_table').dataTable().fnDraw();
                        
                        // location.reload();
                        },
                        error: function(data){
                            alert("error");
                            //alert(data);
                        }
                    }
           );  
    return false;
}

$(document).ready(function(){
   
    
    //// Prevent Submit form when press Enter (keycode=13)
    $("input").keypress(function(e){
        if(e.keyCode== '13'){
            return false ;
           
        } 
    });
});
