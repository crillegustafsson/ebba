<html>
<head>
	<title>Ebba</title>
</head>
<link href='//fonts.googleapis.com/css?family=Lato:100,300' rel='stylesheet' type='text/css'>
		<link href="../css/app.css" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<style>
	html{
		height: 100%;
	}
	body{
		height: 100%;
		color: rgba(175, 187, 192, 1);
		text-align: center;
		font-family: 'Lato';
		font-weight: 100;
		background: #fff;
	}
	.50{
		height: 60%;

	}
	.col-md-12{
		height: 500px;
		padding: 70px;
	}
	.line{
		margin: 0 auto;
		height: 2px;
		background-color: #646D71;
		width: 0;
	}
	.blocks{

		height: 100%;
		
	}
	.title {
		font-size: 90px;
		margin-bottom: 0px;
		font-family: 'Lato';
	}
	.left,
	.right,
	.btn,
	.quote,
	.title
	{
		opacity: 0;
	}
	.btn-primary {
		padding: 22px 40px;
		font-size: 20px;
	}
	.quote {
		font-size: 24px;
		
	}
	.left,
	.right{
		font-size: 22px;
		font-weight: 300;
		
	}
	.left{
		float: left;
	}
	.right{
		float: right;
		letter-spacing: 7px;
	}
	strong{
		color: #337ab7;
		font-weight: 300;
	}
</style>
<body>
	<div class="container-fluid">


	<div class="row 50">

		<div class="col-md-12">
			<div class="blocks">
				<br>
				<div class="title">E B B A</div>
					<div class="quote">Lagerhanteringssystem</div><br>
<a href="auth/login" class="btn btn-primary" role="button">Logga in</a>
					
			</div>

			<div class="line"></div>
			<p class="left"><strong>Blox solutions</strong></p>
			<p class="right">www.bloxsolutions.se</p>
		</div>

	</div>
	<div class="row">


	</div>


</div>
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>	
<script type="text/javascript">
$( document ).ready(function() {

    $('.title, .left, .right, .quote, .btn').animate({
    	opacity: 1
    }, 3000, 'swing');
    $('.line').animate({
    	width: '100%'
    },1500, "swing");

});

</script>
</body>
</html>