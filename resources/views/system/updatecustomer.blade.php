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
    	                    <form class="form-group adminformpanel" role="form" method="POST" action="/updateCustomerDo/{{$allakunder->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label>Företags ID</label>
                                    <input type="text" class="form-control" name="companyId" value="{{$allakunder->companyId}}">
                                </div>
                                <div class="form-group">
                                    <label>Företag</label>
                                    <input type="text" class="form-control" name="company" value="{{$allakunder->company}}">
                                </div>
                                <div class="form-group">
                                    <label>Stad</label>
                                    <input type="text" class="form-control" name="city" value="{{$allakunder->city}}">
                                </div>
                                <div class="form-group">
                                    <label>Adress</label>
                                    <input type="text" class="form-control" name="adress" value="{{$allakunder->adress}}">
                                </div>
                                <div class="form-group">
                                    <label>Google Adress</label>
                                    <input type="text" class="form-control" name="gadress" value="{{$allakunder->gadress}}">
                                </div>
                                <div class="form-group">
                                    <label>Telefon</label>
                                    <input type="text" class="form-control" name="phone" value="{{$allakunder->phone}}">
                                </div>
                                <div class="form-group">
                                    <label>Mail</label>
                                    <input type="text" class="form-control" name="mail" value="{{$allakunder->mail}}">
                                </div>
                                <div class="form-group">
                                    <label>Orgnr</label>
                                    <input type="text" class="form-control" name="orgnr" value="{{$allakunder->orgnr}}">
                                </div>
                                <div class="form-group">
                                    <label>Ägare</label>
                                    <input type="text" class="form-control" name="owner" value="{{$allakunder->owner}}">
                                </div>
                                <div class="form-group check">
                                        <label>Ringkund</label>
                                    <div class="checkbox">
                                        <input type="checkbox" value="1" name="callupCustomer" value="{{$allakunder->callupCustomer}}">
                                    </div>
                                </div>
                                <div class="form-group check">
                                    <label>Orderkund</label>
                                    <div class="checkbox">
                                        <input type="checkbox" value="1" name="orderCustomer" value="{{$allakunder->orderCustomer}}">
                                    </div>
                                </div>
                                <div class="form-group check">
                                    <label>RundID</label>
                                        <input type="text" class="form-control" name="routes_id" value="{{$allakunder->routes_id}}">
                                </div>
                                <div class="form-group check">
                                    <label>Sortering</label>
                                        <input type="text" class="form-control" name="sort" value="{{$allakunder->sort}}">
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