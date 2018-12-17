<!DOCTYPE html>
<html>

<head>
    <title> Trash || Delivery </title>
    <?php 
		include 'meta.php';
		include 'css.php';
?>
    <style>
    .preloader-background {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #eee;
        position: fixed;
        z-index: 100;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }
    </style>
</head>

<body>
    <div class="preloader-background">
        <div class="preloader-wrapper big active hide-on-med-and-down" style="margin-left:200px">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <div class="preloader-wrapper big active hide-on-large-only">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>