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
    	                    <form class="form-group adminformpanel" role="form" method="POST" action="/updateUserDo/{{$allakonton->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label>Förnamn</label>
                                    <input type="text" class="form-control" name="fname" value="{{ $allakonton->fname }}">
                                </div>

                                <div class="form-group">
                                    <label>Efternamn</label>
                                    <input type="text" class="form-control" name="sname" value="{{ $allakonton->sname }}">
                                </div>

                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" class="form-control" name="email" value="{{ $allakonton->email }}">
                                </div>

                                <div class="form-group">
                                    <label>Lösenord</label>
                                    <input type="password" class="form-control" name="password">
                                </div>

                                <div class="form-group">
                                    <label>Bekräfta lösenord</label>
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>

                                <div class="form-group check">
                                        <label>Admin?</label>
                                    <div class="checkbox">
                                        <input type="checkbox" name="isAdmin">
                                    </div>
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