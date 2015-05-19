@extends('layout.master')

@section('header')
@stop
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Uppdatera</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    <div class="row">
        <div class="col-xs-12">
    	                    <form class="form-group adminformpanel" role="form" method="POST" action="updateProduct/{{$allaprodukter->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label>Produktnamn</label>
                                <input type="text" class="form-control" name="productName" value="{{ $allaprodukter->productName }}">
                            </div>

                            <div class="form-group">
                                <label>Artikelnummer</label>
                                <input class="form-control" name="artnr" value="{{ $allaprodukter->artnr }}">
                            </div>

                            <div class="form-group">
                                <label>Pris</label>
                                <input class="form-control" name="price" value="{{ $allaprodukter->price }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-warning">
                                        Ändra
                                </button>
                                
                                <a href="/adminpanel" class="btn btn-danger">
                                        Avbryt
                                </a>
                            </div>
                        </form>
        </div>
    </div>
    <!--/.Row -->      
</div>
<!-- /.page-wrapper -->

@stop
@section('footer')
@stop