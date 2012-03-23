/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
     $('#news_table').dataTable({ });
     $('#marqueetext_table').dataTable({ });
     $('#location_table').dataTable({});
     $('#guestbook_table').dataTable({});
     $('#gallery_table').dataTable(
     {"iDisplayLength": 5,
     "aLengthMenu": [[5], [5]]});

});

