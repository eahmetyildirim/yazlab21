<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eng">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Upload Crop Image</title>
    <link rel="shortcut icon" type="image/png" href="img/icon.png"/>
	<link rel="stylesheet" href="admin/js/jquery.Jcrop.min.js" type="text/css" media="screen"/>
	<link type="text/css" href="css/bootstrap.min.css"/>
    <script type="text/javascript"src="js/jquery-3.4.1.min.js"> </script>
	<script type="text/javascript" src="admin/js/jquery.Jcrop.min.js"> </script>

	<script type="text/javascript">

	$(function(){
		$("#crop").Jcrop({
			onChange: showCoords,
		    onSelect: showCoords
			});
	});

	function showCoords(c){

	$("#x").val(c.x);
	$("#y").val(c.y);
	$("#x2").val(c.x2);
	$("#y2").val(c.y2);
	$("#w").val(c.w);
	$("#h").val(c.h);
	}
    </script>
    <style type="text/css">
        #buton{
            text-align: center;
            margin-top:25px;

        }
        #buton input[type="submit"]{
            width:50%;
            height:35px ;
            border-radius:15px 15px ;
        }
        #buton input[type="submit"]:hover{
            color: white;
            background-color:#000000 ;
        }

    </style>
</head>
<body>
<?php
session_start();

require_once "admin/class/class.upload.php";
if(file_exists('kitap_teslim_image/barcode.jpg')) {
    unlink('kitap_teslim_image/barcode.jpg');
}
if(@!$_POST["resimcrop"]){


    ?>

                        <form action="" method="post">

                        <div class="col-sm-2" id="image">
                        <img src="kitap_teslim_image/arka.jpg" id="crop">
                        </div>
                            <input type="hidden" name="x" id="x">
                        <input type="hidden" name="y" id="y">
                        <input type="hidden" name="x2" id="x2">
                        <input type="hidden" name="y2" id="y2">
                        <input type="hidden" name="w" id="w">
                        <input type="hidden" name="h" id="h">
                         <input type="hidden" name="resimlink" value="kitap_teslim_image/arka.jpg">
                        <div class="mt-2" id="buton">
                        <input type="submit" class="" value="Kırpmayı bitir" name="resimcrop">
                        </div>

                        </form>

                        <?php
}
if(@$_POST["resimcrop"]){
    $_SESSION["kitapver_islem"]++;
    $x=$_POST["x"];
    $x2=$_POST["x2"];
    $y=$_POST["y"];
    $y2=$_POST["y2"];
    $w=$_POST["w"];
    $h=$_POST["h"];

    $upload =new \Verot\Upload\Upload($_POST["resimlink"]);
    if($upload->uploaded){
        $rand ="barcode";
        $upload->file_new_name_body=$rand;
        $resimGenislik=$upload->image_src_x-$x2;
        $resimYukseklik=$upload->image_src_y-$y2;
        $upload->image_crop="{$y} {$resimGenislik} {$resimYukseklik} {$x}";


        $upload->process("kitap_teslim_image/");
        if($upload->processed){?>
            <div>
            <form action="" method="post">

            <img style="max-height:500px; " src="kitap_teslim_image/barcode.jpg" >
                <br>
            <p>Barcodu indirip aşağıdaki butonla seçiniz:
            <a class="btn btn-primary" id="download" href="kitap_teslim_image/barcode.jpg" download="upload/barcode.jpg">Barkodu İndir</a>
            </p>
            </form>
            </div>
                        <?php
        }else{
            echo "Hata:".$upload->error;
        }
    }else{
        echo "Hata:".$upload->error;
    }


?>
<hr>
<canvas style="height:200px;"></canvas>
<hr>

<input type="button" id="upload" value="Barkod Seç" onclick="decodeLocalImage();">
    <p>Barkod okunamadıysa tekrar kırpmak için <a href="crop.php">buraya tıklayınız</a></p>
<script type="text/javascript" src="js/filereader.js"></script>
<script type="text/javascript" src="js/qrcodelib.js"></script>
<script type="text/javascript" src="js/webcodecamjs.js"></script>
<script type="text/javascript">
    var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
    var arg = {
        resultFunction: function(result) {
            var aChild = document.createElement('a');
            aChild[txt] ="Barkod Okundu Buraya tıkla";
            aChild.setAttribute("href","kitapTeslim.php?id="+result.code);
            document.querySelector('body').appendChild(aChild);

        }
    };
    var decoder = new WebCodeCamJS("canvas").init(arg);
    function decodeLocalImage(){
        decoder.decodeLocalImage();
    }
</script>

<?php } ?>

</body>
</html>