<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>PR Screen Management System</title>
        <?php $this->load->view('header') ?>
        <style>
            @font-face {
                font-family: 'th_sarabun';
                src: url('fonts/THSarabun.ttf') ;
            }

            html, body {
                height: 100%;
                margin: 0px;
                background-image: url('<?php echo base_url(); ?>styles/images/bg.png');
                background-repeat: no-repeat;
                background-color :#BDCCD4 ;
                font-family: 'th_sarabun',Arial;
                color: white;
            }

            input{
                padding : 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
            }

        </style>
    </head>
    <body style="backgroud:url('<?php echo base_url(); ?>styles/images/bg.png')">

        <div class="wrapper">
            <div style="text-align: right ;">
                <form action="<?php echo base_url(); ?>welcome" method="POST">
                    <input type="text" value="" placeholder="username" />
                    <input type="password" value="" placeholder="password" />
                    <input type="submit" value="login" />
                </form>
            </div>

        </div>


    </div>
</div>
<?php
$this->load->view('footer');
?>
</body>
</html>