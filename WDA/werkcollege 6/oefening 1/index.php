<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		div{
			
			width: 300px;
			height: 100px;
			background-color: white;
			border: solid;
		}
	</style>
</head>
<body>
<div class="1">1</div>
<div class="1">2</div>
<div class="1">3</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("div").hover(function(){
        $(this).css("height", "500px");
        }, function(){
        $(this).css("height", "100px");
    });
});
</script>
</html>