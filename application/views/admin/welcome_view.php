<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
           echo form_open("admin/welcome/verify");
           echo "Username : ".form_input("username")."<br>";
           echo "Password : ".form_input("password")."<br>";
           echo form_submit("","Login");
        ?>
    </body>
</html>
