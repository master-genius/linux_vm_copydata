<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,">
    <title>copy data</title>
    <style>
        .container{
            width:100%;
            overflow:hidden;
        }

    </style>
    <script src="brutal_1711.js"></script>
    <link href="fdflex642.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="column small-12 medium-12 large-12">
        <?php

            $file = '/tmp/datatmp';
            $data = '';
            if (file_exists($file)) {
                $data = file_get_contents($file);
            }

            if (empty($data)) {
                $data = '<div style="text-align:center;margin-top:5rem;">'.
                    '<p style="font-size:145%;color:#696969">'.
                        '-*-  N o t h i n g  -*-' .     
                    '</p></div>';
            }
            echo str_replace("\n",'<br>',$data);
        ?>
        </div>
    </div>
    <p>&nbsp;<p>&nbsp;</p></p>
    <br><br><br><br>
</div>
<div class="container" style="z-index:10;position:fixed;background:#ffffff;bottom:0;">
    <div class="row">
        <div class="small-12 column">
            <div style="font-size:85%;color:#696969;" id="send-ret-tip"></div>
            <form onsubmit="return false;">
                <input type="text" value="" id="send-content">
                <input type="submit" class="button hollow small" value="submit" onclick="ajax_send_data()">
                <button class="button alert small" onclick="ajax_send_data('sendadd')">
                    Add-data
                </button>

            </form>
        </div>
    </div>
</div>
<script>
    function ajax_send_data(act) {
        if (brutal.autod('#send-content')=='') {
            return ;
        }
        if (act===undefined) {
            act = 'send';
        }
        brutal.areq.post({
            url:'/api.php?act='+act,
            data:'data='+encodeURIComponent(brutal.autod('#send-content')),
            retformat:'text',
            success:function(xr){
                if (xr=='ok') {
                    brutal.autod('#send-content','');
                    brutal.autod('#send-ret-tip','ok');

                } else {
                    brutal.autod('#send-ret-tip',xr);
                }
                setTimeout(function(){
                    brutal.autod('#send-ret-tip','');
                },2000);
            }
        });
    }
</script>
</body>
</html>

