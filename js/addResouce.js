/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    var base_url = 'http://localhost/PRScreenServer/' ;
    
    $("#add_about_fac_link").click(function(e){
        var scroll = $(this).offset().top;
        
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
    $("input").keypress(function(e){
        if(e.keyCode== '13'){
            return false ;
           
        } 
    });
    
    
    
    
});
