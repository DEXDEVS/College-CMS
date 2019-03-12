<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		  .shape{    
    border-style: solid; border-width: 0 70px 40px 0; float:right; height: 0px; width: 0px;
	-ms-transform:rotate(360deg); /* IE 9 */
	-o-transform: rotate(360deg);  /* Opera 10.5 */
	-webkit-transform:rotate(360deg); /* Safari and Chrome */
	transform:rotate(360deg);
}
.offer{
	background:#fff; border:1px solid #ddd; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); margin: 15px 0; overflow:hidden;
}
.offer:hover {
    -webkit-transform: scale(1.1); 
    -moz-transform: scale(1.1); 
    -ms-transform: scale(1.1); 
    -o-transform: scale(1.1); 
    transform:rotate scale(1.1); 
    -webkit-transition: all 0.4s ease-in-out; 
-moz-transition: all 0.4s ease-in-out; 
-o-transition: all 0.4s ease-in-out;
transition: all 0.4s ease-in-out;
    }
.shape {
	border-color: rgba(255,255,255,0) #d9534f rgba(255,255,255,0) rgba(255,255,255,0);
}
.offer-radius{
	border-radius:7px;
}
.offer-danger {	border-color: #d9534f; }
.offer-danger .shape{
	border-color: transparent #d9534f transparent transparent;
}
.offer-success {	border-color: #5cb85c; }
.offer-success .shape{
	border-color: transparent #5cb85c transparent transparent;
}
.offer-pink {	border-color: #8fb800; }
.offer-pink .shape{
	border-color: transparent 	#8fb800 transparent transparent;
}
.offer-seagreen {	border-color: #2fcea5; }
.offer-seagreen .shape{
	border-color: transparent 	#2fcea5 transparent transparent;
}#c47c48
.offer-brown {	border-color: #c47c48; }
.offer-brown .shape{
	border-color: transparent 	#c47c48 transparent transparent;
}
.offer-default {	border-color: #999999; }
.offer-default .shape{
	border-color: transparent #999999 transparent transparent;
}
.offer-primary {	border-color: #428bca; }
.offer-primary .shape{
	border-color: transparent #428bca transparent transparent;
}
.offer-info {	border-color: #5bc0de; }
.offer-info .shape{
	border-color: transparent #5bc0de transparent transparent;
}
.offer-warning {	border-color: #f0ad4e; }
.offer-warning .shape{
	border-color: transparent #f0ad4e transparent transparent;
}

.shape-text{
	color:#fff; font-size:12px; font-weight:bold; position:relative; right:-40px; top:2px; white-space: nowrap;
	-ms-transform:rotate(30deg); /* IE 9 */
	-o-transform: rotate(360deg);  /* Opera 10.5 */
	-webkit-transform:rotate(30deg); /* Safari and Chrome */
	transform:rotate(30deg);
}	
.offer-content{
	padding:0 20px 10px;
}
@media (min-width: 487px) {
  .container {
    max-width: 750px;
  }
  .col-sm-6 {
    width: 50%;
  }
}
@media (min-width: 900px) {
  .container {
    max-width: 970px;
  }
  .col-md-4 {
    width: 33.33333333333333%;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1170px;
  }
  .col-lg-3 {
    width: 25%;
  }
  }
	</style>
</head>
<body>

<div class="row container-fluid">
	<div class="box box-success">
		<div class="box-header" style="background-color:#dff0d8;">
			<h2 style="text-align: center;">Teacher Activity Panel</h2>
		</div>
		
		<div class="box-body">
			<div class="row">
		    	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" >
					<div class="offer offer-danger">
						<div class="shape">
							<div class="shape-text">
								<span class="glyphicon glyphicon glyphicon-th"></span>							
							</div>
						</div>
						<div class="offer-content">
							<h3 class="lead">
							Attendance
							</h3>
							<a href="">Take attendance</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="offer offer-success">
						<div class="shape">
							<div class="shape-text">
								<span class="glyphicon glyphicon glyphicon-eye-open"></span>							
							</div>
						</div>
						<div class="offer-content">
							<h3 class="lead">
								Reports
							</h3>
							<a href="">View attendance reports</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="offer offer-radius offer-primary">
						<div class="shape">
							<div class="shape-text">
								<span class="glyphicon  glyphicon-user"></span>							
							</div>
						</div>
						<div class="offer-content">
							<h3 class="lead">
								Assignment
							</h3>
							<a href="">View assignment</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="offer offer-info">
						<div class="shape">
							<div class="shape-text">
								<span class="glyphicon  glyphicon-bell"></span>							
							</div>
						</div>
						<div class="offer-content">
							<h3 class="lead">
								Quiz
							</h3>
							<a href="">View Quiz</a>
						</div>
					</div>
				</div>
	        </div>
	        <!-- row 2 start -->
	        <div class="row">
		    	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" >
					<div class="offer offer-warning">
						<div class="shape">
							<div class="shape-text">
								<span class="glyphicon glyphicon glyphicon-edit"></span>							
							</div>
						</div>
						<div class="offer-content">
							<h3 class="lead">
							Marks Sheet
							</h3>
							<a href="">Add marks</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="offer offer-pink">
						<div class="shape">
							<div class="shape-text">
								<span class="glyphicon glyphicon glyphicon-eye-open"></span>							
							</div>
						</div>
						<div class="offer-content">
							<h3 class="lead">
								Presentations
							</h3>
							<a href="">Manage presentation</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="offer offer-radius offer-seagreen">
						<div class="shape">
							<div class="shape-text">
								<span class="glyphicon  glyphicon-user"></span>							
							</div>
						</div>
						<div class="offer-content">
							<h3 class="lead">
								Assignment
							</h3>
							<a href="">View assignment</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="offer offer-brown">
						<div class="shape">
							<div class="shape-text">
								<span class="glyphicon  glyphicon-home"></span>							
							</div>
						</div>
						<div class="offer-content">
							<h3 class="lead">
								Quiz
							</h3>
							<a href="">View Quiz</a>
						</div>
					</div>
				</div>
	        </div>
	        <!-- row 2 close -->
		</div>
	</div>
		
    
        
</div>
</body>
</html>