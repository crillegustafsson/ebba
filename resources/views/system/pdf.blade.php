<html>

	<link href="css/pdf.css" rel="stylesheet">

	<body>
		<div class="container">

			<div id="size1">
				<div id="block30">
					<h1>Engelholmsglass AB</h1>
						<li>Helsingborgsvägen 29</li>
						<li>26272 ÄNGELHOLM</li>
						<li>Fax 043188218 Innehar F-skattebevis</li>
						<li>Reg nr för moms SE556194757201</li>
						<li>Plusgiro 7 38 79-9 Bankgiro 330-4433</li>
				</div>

				<div id="block30">
						<img src="images/engelholmsglass.jpg" width="120">
				</div>

				<div id="block30">
					<h1 class="red">Ordernr: {{$last->id}}</h1>
						<li>{{$customer->company}}</li>
						<li>{{$customer->adress}}</li>
						<li>{{$customer->id}}</li>
						<li>{{$customer->mail}}</li>
				</div>
			</div>
			<div id="line"></div>
			<br>
			
    	<div id="produkterbox">
			<div id="produkter bold">
				<li class="w50">Art.nr</li>
				<li class="w150">Artikelnamn</li>
				<li class="w50">Kvant/krt</li>
				<li class="w150 sp">Antal</li>
				<li class="w50 sp">UD</li>
				<li class="w186 sp">Pris (st)</li>
			</div>
			@foreach($order as $o )
			
			<br>
			<div id="produkter">
				<li class="w50">{{$o->artnr}}</li>
				<li class="w150">{{$o->productName}}</li>
				<li class="w50">{{$o->quantitypackage}}</li>
				<li class="w150 sp">{{$o->quantity}}</li>
				<li class="w50 sp">
					@if($o->nd == 1)
						JA
					@endif
				</li>
				<li class="w186 sp">{{$o->price}}</li>
			</div>
			@endforeach
			
		</div>

			<br><br>

			<div id="size1 absolute">
				<div id="block50 left50">
					<div id="signaturbox">
					<div id="padding">
					<h6>Signatur:</h6>
						<img src="http://bloxsolution.se/sign/addons/signature.png">
					</div>
					</div>
				</div>

				<div id="block50 right50top">
					<div id="tidbox">
					<div id="padding">
					<h6>Datum:</h6>
					<p>
						{{$last->created_at->format('Y-m-d') }}

					</p>
					</div>
					</div>
				</div>

			</div>


		</div>
	</body>
</html>