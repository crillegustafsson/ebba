@extends('layout.master')

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

                    <form method="post" action="http://bloxsolution.se/sign/addons/capture_signature.php" class="sigPad">
                                <p><b>1.</b> Skriv in din signatur här och tryck "Spara"</p>
                            <div class="sig sigWrapper">
                            <canvas class="pad" width="275" height="90"></canvas>
                            <input type="hidden" name="output" class="output">
                            </div>
                            <div id="submit">
                                <button name="submit" type="submit" class="btn btn-primary">Spara</button>
                            </div>
                            <div id="clear">
                                <button name="clear" type="clear" class="clearButton btn btn-warning">Gör om</button>
                            </div><br>
                            <hr><br>
                            <div id="clear center">
                                <p><b>2.</b> För att slutföra tryck "Slutför order"</p>
                                <a href="/pdf/{{$id}}" class="button btn btn-success width100">Slutför order</a>
                            </div>
                    </form>
                </div>
            </div>
<div class="row">
               
</div>
<!-- /.row -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="http://bloxsolution.se/sign/addons/flashcanvas.js"></script>
<script src="http://bloxsolution.se/sign/addons/jquery.signaturepad.min.js"></script>
<script src="http://bloxsolution.se/sign/addons/json2.min.js"></script>
<script type="text/javascript" src="http://bloxsolution.se/sign/addons/functions.js"></script>
         
@stop
@section('footer')
@stop