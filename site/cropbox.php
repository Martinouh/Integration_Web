<?php
/**
 * Created by PhpStorm.
 * User: Rom
 * Date: 10/12/2016
 * Time: 18:28
 */
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<title>Crop Box</title>
<link rel="stylesheet" href="styles/cropbox.css" type="text/css" />
<style>
    .container
    {
        position: absolute;
        top: .5em; left: .5em; right: 0; bottom: 0;
    }
    .action
    {
        width: 400px;
        height: 30px;
        margin: 10px 0;
    }
    .cropped>img
    {
        margin-right: 10px;
    }
    #droppable,#trash,#avatar { border: 1px solid black;background-color:whitesmoke; width: 200px; height: 200px; padding: 0.5em; float: left; margin: 10px; }
    #boite{float: left;}

</style>
</head>
<body>

<script src="http://code.jquery.com/jquery-1.12.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script src="js/cropbox.js"></script>
<div class="container">
    <h1>Modifier mon avatar</h1>

    <div id=boite>
        <div class="imageBox">
            <div class="thumbBox"></div>
            <div class="spinner" style="display: none">Loading...</div>
        </div>
        <div class="action">
            <input type="file" id="file" style="float:left; width: 250px">
            <input type="button" id="btnCrop" value="Crop" style="float: right">
            <input type="button" id="btnZoomIn" value="+" style="float: right">
            <input type="button" id="btnZoomOut" value="-" style="float: right">
        </div>
    </div>

    <div id="droppable">
        <p style="color: grey;"><i>Déposez ici pour sauvegarder l'image en tant qu'avatar.</i></p>
    </div>
    <div class="cropped">

    </div>
</div>


<script type="text/javascript">
    var num=0;
    $(window).load(function() {
        var options =
        {
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            imgSrc: 'images/unknownIcon.png'
        }
        var cropper;
        $('#file').on('change', function(){
            var reader = new FileReader();
            reader.onload = function(e) {
                options.imgSrc = e.target.result;
                cropper = $('.imageBox').cropbox(options);
            }
            reader.readAsDataURL(this.files[0]);
            this.files = [];
        })
        $('#btnCrop').on('click', function(){
            var img = cropper.getDataURL()
            var id = 'img_'+ ++num;
            $('.cropped').append('<img id='+id+' src="'+img+'">');
            $('#'+id).draggable({ revert: "invalid" });

        })
        $('#btnZoomIn').on('click', function(){
            cropper.zoomIn();
        })
        $('#btnZoomOut').on('click', function(){
            cropper.zoomOut();
        })
        $( "#droppable" ).droppable({
            drop: function( event, ui ) {
                $( this )
                    .addClass( "ui-state-highlight" )
                    .find( "p" )
                    .html( "<i>Avatar sauvegardé!</i>" );
                var data = ui.draggable.attr('src');
                $.post('../index.php?rq=avatarCrop','avatar='+data,function(re){
                    $('#avatar img').attr('src',re.avatar);
                })
            }
        });
        $( "#trash" ).droppable({
            drop: function( event, ui ) {
                var id = ui.draggable.attr('id');
                $('.cropped #'+id).remove();
            }
        });
    });

</script>

</body>
</html>
