/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    function readURL(input) {
//        alert(input.id);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+input.id+'_prev')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
