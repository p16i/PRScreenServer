/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    var base_url = 'http://localhost/PRScreenServer/' ;
    $('#news_table').dataTable({ });
    $('#marqueetext_table').dataTable({ });
    $('#location_table').dataTable({});
    $('#guestbook_table').dataTable({});
    $('#gallery_table').dataTable(
    {
        "iDisplayLength": 5,
        "aLengthMenu": [[5], [5]]
    });
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

