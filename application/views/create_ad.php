<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
			<h2>New Advertisement</h2>
			<p>Fill in the fields below and click on the "submit" button to view a preview of your posting.</p>
			<form role="form">
				<div class="form-group">
					<label for="category">Category (select one):</label>
					<select class="form-control" id="category">
						<option>Community</option>
						<option>Personal</option>
						<option>Housing</option>
						<option>For Sale</option>
						<option>Services</option>
						<option>Jobs</option>
					</select>
				</div>
				<div class="form-group">
					<label for="title">Title:</label>
					<input type="text" class="form-control" id="title">
				</div>
				<div class="form-group">
					<label for="price">Price:</label>
					<input type="password" class="form-control" id="price">
				</div>
				<div class="form-group">
					<label for="description">Description:</label>
					<textarea class="form-control" rows="5" id="description"></textarea>
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-default">Upload Image</button>
				</div>
			</form>
			<button type="button" class="btn btn-default">Cancel</button>
			<button type="submit" class="btn btn-default" method="POST">Submit</button>
		</div> <!-- form container -->
    </body>
</html>
