/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    var base_url = 'http://10.0.100.74/PRScreenServer/' ;
    
    
    
    
   /// Fetch Billboard
     $('#billboard_table').dataTable({
           "aaSorting": [[1,'desc']],
              "bProcessing": false,
        "bServerSide": true,
        "iDisplayLength": 5,
        "aLengthMenu": [[5], [5]],
        "sAjaxSource": base_url+"admin/billboard/list_billboard",
        'fnServerData': function(sSource, aoData, fnCallback) {
            $.ajax
            ({
                'dataType': 'json',
                'type'    : 'POST',
                'url'     : sSource,
                'data'    : aoData,
                'success' : fnCallback
            }); // End Ajax
        }
        
        
        
    });
    
    
    /// Fetch Gallery
    $('#gallery_table').dataTable({
              "bProcessing": false,
        "bServerSide": true,
        "iDisplayLength": 8,
        "aLengthMenu": [[8], [8]],
        "sAjaxSource": base_url+"admin/gallery/list_gallery",
        'fnServerData': function(sSource, aoData, fnCallback) {
            $.ajax
            ({
                'dataType': 'json',
                'type'    : 'POST',
                'url'     : sSource,
                'data'    : aoData,
                'success' : fnCallback
            }); // End Ajax
        }
        
        
        
    });
    
    
    /// Fetch Location 
     
    $('#location_table').dataTable({
         "bProcessing": false,
        "bServerSide": true,
        "iDisplayLength": 5,
        "aLengthMenu": [[5], [5]],
        "sAjaxSource": base_url+"admin/location/list_location",
        'fnServerData': function(sSource, aoData, fnCallback) {
            $.ajax
            ({
                'dataType': 'json',
                'type'    : 'POST',
                'url'     : sSource,
                'data'    : aoData,
                'success' : fnCallback
            }); // End Ajax
        }
        
    });
    
    
    /// Fetch Marquee Text
    $('#marqueetext_table').dataTable({ 
          "aaSorting": [[0,'desc']],
        "bProcessing": false,
        "bServerSide": true,
        "iDisplayLength": 10,
        "aLengthMenu": [[10], [10]],
        "sAjaxSource": base_url+"admin/marqueetext/list_marqueetext",
        'fnServerData': function(sSource, aoData, fnCallback) {
            $.ajax
            ({
                'dataType': 'json',
                'type'    : 'POST',
                'url'     : sSource,
                'data'    : aoData,
                'success' : fnCallback
            }); // End Ajax
        }
    });
    
    
    /// Fetch News
    $('#news_table').dataTable({ 
         "aaSorting": [[0,'desc']],
        "bProcessing": false,
        "bServerSide": true,
        "iDisplayLength": 10,
        "aLengthMenu": [[10], [10]],
        "sAjaxSource": base_url+"admin/news/list_news",
        'fnServerData': function(sSource, aoData, fnCallback) {
            $.ajax
            ({
                'dataType': 'json',
                'type'    : 'POST',
                'url'     : sSource,
                'data'    : aoData,
                'success' : fnCallback
            }); // End Ajax
        }
    });
    
    
    /// Fetch Guestbook
    $('#guestbook_table').dataTable(
    {
          "aaSorting": [[0,'desc']],
        "bProcessing": false,
        "bServerSide": true,
        "iDisplayLength": 10,
        "aLengthMenu": [[10], [10]],
        "sAjaxSource": base_url+"admin/guestbook/list_guestbook",
        'fnServerData': function(sSource, aoData, fnCallback) {
            $.ajax
            ({
                'dataType': 'json',
                'type'    : 'POST',
                'url'     : sSource,
                'data'    : aoData,
                'success' : fnCallback
            }); // End Ajax
        }
    });
    
    
    /// Fecth Guestbook
    $('#aboutfac_table').dataTable(
    {
        "bProcessing": false,
        "bServerSide": true,
        "iDisplayLength": 5,
        "aLengthMenu": [[5], [5]],
        "sAjaxSource": base_url+"admin/aboutfac/list_aboutfac",
        'fnServerData': function(sSource, aoData, fnCallback) {
            $.ajax
            ({
                'dataType': 'json',
                'type'    : 'POST',
                'url'     : sSource,
                'data'    : aoData,
                'success' : fnCallback
            }); // End Ajax
        }
        
    }
    );


});

