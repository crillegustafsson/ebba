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
    	                    <form class="form-group adminformpanel" role="form" method="POST" action="/updateRouteDo/{{$allarundor->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label>Namn på lagret</label>
                                <input type="text" class="form-control" name="name" value="{{$allarundor->name}}">
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