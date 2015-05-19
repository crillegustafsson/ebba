@extends('layout.master')

@section('content')
<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<link href="/css/app.css" rel="stylesheet">
</head>
<style>
			#wrapper {
				margin: 0 auto;
			}
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				background: #fff url('images/bgfooter.png');
			}

			.content {
				text-align: center;
				padding: 50px 0;
			}
			.padding {
				padding: 40px 10px;
			}
			.title {
				background: none;
				font-size: 90px;
				font-family: 'Lato';
				color: #B0BEC5;
				padding: 10px 10px 0 10px;
				text-align: center;
				border: 0;
			}

			.quote {
				font-size: 24px;
				font-family: 'Lato';
				text-align: center;
			}
			footer {
				background: #f5f5f5 url('images/bgfooter.png');
			}
		</style>
		<div class="container">
	        <div class="row">
	            <div class="col-md-6 col-md-offset-3">
				<div class="padding">
					<div class="title">E B B A</div>
					<div class="quote">Lagerhanteringssystem</div>
				</div>
	                <div class="login-panel panel panel-default">
	                    <div class="panel-heading">
	                        <h3 class="panel-title"><div class="fa fa-lock"></div> Inloggning till ebba</h3>
	                    </div>
	                    <div class="panel-body">
		                @if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>!</strong> Kontrollera så alla fält är ifyllda.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
							<form class="form-horizontal" role="form" method="POST" action="">

								<input type="hidden" name="_token" value="{{ csrf_token() }}">

								<div class="form-group">
									<label class="col-md-4 control-label">E-Mail</label>
									<div class="col-md-6">
										<input type="email" class="form-control" name="email" value="{{ old('email') }}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Lösenord</label>
									<div class="col-md-6">
										<input type="password" class="form-control" name="password">
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-6 col-md-offset-4">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="remember"> Kom ihåg mig
											</label>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-9 col-md-offset-4">
										<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
											Logga in
										</button>

									</div>
								</div>
							</form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
		
		</div>

@endsection
