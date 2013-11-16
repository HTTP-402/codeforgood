<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Upload Routes</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootswatch/3.0.1/flatly/bootstrap.min.css" rel="stylesheet">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
</head>
<body>
 <nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <a class="navbar-brand" href="#">Map</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="upload.php">Upload</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kitchens<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Kitchen2</a></li>
          <li><a href="#">Kitchen1</a></li>
        </ul>
      </li>
	  </ul>
	  
	  <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Routes<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Route1</a></li>
          <li><a href="#">Route2</a></li>
        </ul>
      </li>
	  </ul>

</nav>

<form name ="upload_form" method ="POST" action= "parse_upload.php">
	<input id="lefile" type="file" style="display:none">
	<div class="input-form">
	<input id="filename" class="input-medium" type="text">
	<a class="btn btn-info" onclick="$('input[id=lefile]').click();">Browse</a>
	<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-upload"></span> Upload</button>
	</div>
</form>
<script type="text/javascript">
$('input[id=lefile]').change(function() {
$('#filename').val($(this).val());
});
</script>
</body>
</html>
 
 
 