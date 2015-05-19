@extends('layout.master')

<link href="assets/styles.css" rel="stylesheet" type="text/css" />
@section('header')
@stop
@section('content')
<style type="text/css">
    .sign{
            border: 1px solid black;
            height: 200px;
    }
    .orderNr{
        color: red;
        font-weight: bold;
    }
    li{
        list-style-type: none;
    }
</style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Signera Order</h1>

                    <form method="post" action="assets/capture_signature.php" class="sigPad">
                            <div class="sig sigWrapper">
                            <canvas class="pad" width="275" height="90"></canvas>
                            <input type="hidden" name="output" class="output">
                            </div>
                            <div id="submit">
                                <button name="submit" type="submit" class="btn btn-success">Spara</button>
                            </div>
                            <div id="clear">
                                <button name="clear" type="clear" class="clearButton btn btn-warning">Gör om</button>
                            </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
<div class="row">
               
</div>
<!-- /.row -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<!--[if lt IE 9]><script src="flashcanvas.js"></script> <![endif]-->
<script src="assets/jquery.signaturepad.min.js"></script>
<script src="assets/json2.min.js"></script>
<script type="text/javascript" src="assets/functions.js"></script>
         
@stop
@section('footer')
@stop