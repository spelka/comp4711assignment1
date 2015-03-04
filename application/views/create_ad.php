<!DOCTYPE html>
<html lang="en">
    <head>
        <title>New Advertisement</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    </head>
    <body>
		{navbar_activelink}
		{page_title}
        <div class="row">
			<div class="errors">{message}</div>
			<form action="/Create_ad/submit" method="post">
				{ad_category}
				{ad_title}
				{ad_price}
				{ad_description}
				{ad_submit}
			</form>
		</div> 
		<!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
</html>
