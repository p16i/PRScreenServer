<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
            Writing Guestbook
        </title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>styles/jquerymobile/blue-orange-jquery-moblie.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile.structure-1.0.1.min.css" /> 
        <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script> 
        <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script> 

    </head>
    <body>
        <?php
        $avatar_path = base_url() . "styles/images/avatar.png";
        ?>
        <div data-role="page" id="page" data-theme="a">
            <div  data-role="header" data-theme="a">
                <h1>
                    <img src="<?php echo base_url() ?>styles/images/it_logo.png"/>
                </h1>
            </div>
            <form action="<?php echo base_url(); ?>admin/guestbook/add_guestbook" method="post" data-ajax="false" id="write_guestbook">
                <div data-role="content" data-theme="a">
                    <center>
                        <img src="<?php echo base_url() ?>styles/images/itbuilding.png"/>
                        <a href="#avatar-dialog" data-rel="dialog">
                            <div id="avatar-div"style="width: 100px; height: 100px; padding:5px; position: relative; background-color: #fbfbfb; border: 1px solid #b8b8b8;left: auto;right: auto">

                                <img src="<?php echo $avatar_path; ?>" alt="image" id="avatar-image" 
                                     width="100" height="100" />

                            </div>
                        </a>
                    </center>
<!--                    <div data-role="fieldcontain">
                        <fieldset data-role="controlgroup">
                            <label for="textinput1">

                            </label>-->
                            <input id="name" placeholder="Name" value="" type="text" name="name" />
                            <input type="hidden" name="imagepath" value="" id="imagepath"/>
                            <input type="hidden" name="cid" value="<?php echo $this->input->get('cid')?>" />
                            <input type="hidden" name="key" value="<?php echo $this->input->get('key')?>" />
                            
<!--                            <label for="textarea1">
                            </label>-->
                            <textarea id="textarea1" name="content"  placeholder="Your text" ></textarea>


                        </fieldset>
                        <input data-theme="a" value="Write" type="submit" data-icon="star"/>
<!--                    </div>-->
                </center>
                </div>
            </form> 
        </div>
        <div data-role="dialog" id="avatar-dialog" data-theme="a" >
            <div data-role="header">
                <h1>Tip</h1>
            </div>
            <div data-role="content" data-theme="a">
                <center><img src="<?php echo base_url(); ?>/styles/images/twitter.png"/></center>
                You can use Twitter's avatar by use Twitter's name

            </div>
        </div>
        <script>
            //App custom javascript
            $(function(){
                $("#avatar-div").click(function(){
                    //   alert("Avatar click"); 
                });
                $("#name").focusout(function(){
                    getAvatarPath(true);
                }); // End Focusout
                
                $("#write_guestbook").submit(function(){
                    getAvatarPath(false);
                   /// Check Valid Check 
                   
                });
                function getAvatarPath(async){
                    var name = $("#name").val();
                    
                    $.ajax({
                        url: "<?php echo base_url(); ?>admin/guestbook/getAvatar/"+name,
                        dataType: 'json',
                        async:async,
                        success: function(data){
                            //alert(data);
                            var image_url =  "";
                            // java:console.log(data.profile_image_url);
                            $.each(data, function(key, val) {
                           
                                if(key=="profile_image_url"){
                                
                                    var big_image = val.replace("normal", "reasonably_small");
                                    image_url = big_image ;
                                    $("#avatar-image").attr('src',image_url);
                                    $("#imagepath").val(image_url);
                                   //   alert(image_url);
                                }
                         
                        
                            });
                        },
                        error:function(){
                            var default_image = "";
                            $("#avatar-image").attr('src',"<?php echo $avatar_path ?>");
                            $("#imagepath").val(default_image);
                         //   javascript:console.log("Chage Avatar");
                        }
                    });
           
                }
            });
        </script>
    </body>
</html>
</html>
