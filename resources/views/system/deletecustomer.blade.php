@extends('layout.master')

@section('header')
@stop
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ta bort</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    <div class="row">
        <div class="col-xs-12">
    	                    <form class="form-group adminformpanel" role="form" method="POST" action="/deleteCustomerDo/{{$allakunder->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <h3>Är du säker på att du vill ta bort <b>{{$allakunder->company}}</b>?</h3>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">
                                        Ta bort
                                </button>
                                
                                <a href="/adminpanel" class="btn btn-warning">
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