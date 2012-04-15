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
          <div data-role="dialog" id="avatar-dialog" data-theme="a" >
            <div data-role="header">
                <h1>QRCode expired.</h1>
            </div>
            <div data-role="content" data-theme="a">
                <center>
                    <h5> Please refresh "QRCode" by hold on it and take it again.</h5>
                    <img src="<?php echo base_url(); ?>/styles/images/mr_tle.png"/>
              
                 </center>

            </div>
        </div>

      
    </body>
</html>
</html>
