/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var base_url = 'http://10.0.100.74/PRScreenServer';


//Edit Billboard
function edit_billboard_link(id){
    $.getJSON(base_url+'/admin/billboard/get_billboard?id='+id, function(data){
        image = data['ImagePath'];
        $("#image").attr("src",base_url+'/resources/billboard/'+image);
        $("#textarea").attr("value",data['Content']);
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
                 $("#edit_billboard_form").submit();
              
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
                        url: base_url+"/admin/billboard/delete_billboard",
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
    $("#news_id").attr("value", id);
    $("#news_headline").attr("value", headline);
    $("#news_content").attr("value", content);
    $("#news_catagory option[value="+catagoryid+"]").attr("selected", "selected");
    //alert(id);
    
    $( "#edit_news" ).dialog({
            modal:true,
            width:500,
            height:500,
            buttons: {
                Edit: function() {
                  var form_data = $("#edit_news_form").serialize();
                  alert(form_data);
                    $.ajax(
                    {
                        type: "POST",
                        url: base_url+"/admin/news/edit_news",
                        data: form_data,
                        dataType: "json",
                        success: function(data){
                            
                            $('#news_table').dataTable().fnDraw();
                            $("#edit_news").dialog('close');
                        
                        // location.reload();
                        },
                        error: function(data){
                            //alert(data);
                        }
                    }
                    );                   
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
                        url: base_url+"/admin/news/delete_news",
                        data: news_data,
                        dataType: "json",
                        success: function(data){
                            
                            $('#news_table').dataTable().fnDraw();
                            //$("#edit_news").dialog('close');
                        
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
    $("#preview").attr("src",base_url+'/resources/location/'+imagepath);
    $("input[name^='oldpath']").attr("value",imagepath);
    $("input[name^='id']").attr("value",id);
    $("select[name^='floor'] option[value="+floor+"]").attr('selected', 'selected');
    $("select[name^='catagoryID'] option[value="+catagoryid+"]").attr('selected','selected');

    $( "#edit_location" ).dialog({
        modal:true,
        width:500,
        height:500,
        buttons: {
            Add: function() {
                $("#edit_location_form").submit();
            }
        }


    });
    //   e.preventDefault(); 


    return false;
    
    
}
    
    

$(document).ready(function(){
   
    /// Add About Fac
    $("#add_about_fac_link").click(function(e){   
        $( "#add_about_fac" ).dialog({
            modal:true,
            width:500,
            height:500,
            buttons: {
                Add: function() {
                    var form_data = $("#about_fac_form").serialize();
                    $.ajax(
                    {
                        type: "POST",
                        url: base_url+"admin/aboutfac/add_aboutfac",
                        data: form_data,
                        dataType: "json",
                        success: function(data){
                            $('#aboutfac_table').dataTable().fnDraw();
                            $("#add_about_fac").dialog('close');
                        
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
                        url: base_url+"admin/marqueetext/add_marqueetext",
                        data: form_data,
                        dataType: "json",
                        success: function(data){
                            $('#marqueetext_table').dataTable().fnDraw();
                            $("#add_marquee").dialog('close');
                        
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
