<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="{{asset('asset/css/style.css')}}"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<style>
			.links{
				height:50px;
			}
			.pagnation{
				list-style:none;
				padding:10px;
				margin-top:60px;
			}
			.pagination li{ 
				float: left;
				list-style: none;
				padding:5px;
				border:1px solid #ccc;
				position:relative;
				top:0px;
				left:246px;
			}
			.fas.fa-edit {
				color: #007bff; /* Change color to blue */
				font-size: 20px; /* Change font size to 20 pixels */
			}
			.fas.fa-trash-alt {
				color: red;
				font-size: 20px;
			}
		</style>
	</head>
	<body>
		<!-- inner container starts here -->
		<div class="innercontainer">
			<!-- logo starts here -->
			<img src="{{asset('asset/images/logo.jpg')}}"/>
			<!-- logo ends here -->
			@if (!request()->routeIs('login'))
			<!-- Logout button starts here -->
			<a href="{{ Route('logout') }}">
				<input type="button" value="Logout" />
			</a>
			<!-- Logout button ends here -->
			@endif
		</div>
				<!-- main container starts here -->
		<div class="maincontainer">
			<!-- inner container2 starts here -->
			<div class="innercontainer2">
				<h3 class="date"></h3>
			</div>
			<!-- inner container2 ends here -->
		</div>
		<!-- main container ends here -->
        