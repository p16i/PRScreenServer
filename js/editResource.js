/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var base_url = 'http://10.0.100.59/PRScreenServer';

function edit_billboard_link(id){
    $.getJSON(base_url+'/admin/billboard/get_billboard?id='+id, function(data){
        image = data['ImagePath'];
        $("#image").attr("src",base_url+'/resources/billboard/'+image);
        $("#textarea").attr("value",data['Content']);
        $("#bill_id").attr("value",data['ID']);
        $("#bill_oldpath").attr("value",data['ImagePath']);
        if(data['NewsID']==null)data['NewsID']='Null';
        $('#dropdown option[value='+data['NewsID']+']').attr('selected', 'selected');
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

function set_billboard_enable_link(id){
    alert(id);
    
    return false;
}


$(document).ready(function(){
    
    

    

     /// Add Billboard
        $(".edit_billboard_link").click(function(){   
            alert("aaaaaass");
        
        $( "#add_billboard" ).dialog({
            modal:true,
            width:500,
            height:500,
            buttons: {
                Add: function() {
                 $("#billboard_form").submit();
              
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
                Add: function() {
                  var form_data = $("#news_form").serialize();
                  //alert(form_data);
                    $.ajax(
                    {
                        type: "POST",
                        url: base_url+"admin/news/add_news",
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
                        
                        
        });
        //   e.preventDefault(); 
      
        return false;
    });
    
    
    
    /// Add Location 
    $("#add_location_link").click(function(e){   
        $( "#add_location" ).dialog({
            modal:true,
            width:500,
            height:500,
            buttons: {
                Add: function() {
                    $("#location_form").submit();
                 
                }
            }
                        
                        
        });
        //   e.preventDefault(); 
      
        return false;
    });
    
    
    
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
