<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Write Page</h1>
      <hr>
    </div>
    
    <div class="container">
		<form action="action.php" method="POST" enctype="multipart/form-data">
		    <div class="form-group">
			    <label>Title</label>
			    <input type="text" class="form-control" name="title" placeholder="Title Input">
		    </div>
		    <div class="form-group">
                <label>Writer</label>
                <input type="text" class="form-control" name="writer" placeholder="Writer Input">
		    </div>
		    <div class="form-group">
			    <label for="exampleInputPassword1">Contents</label>
			    <textarea class="form-control" name="content" rows="15" placeholder="Contents Input"></textarea>
            </div>
            <br>
	        <div class="text-right">
			    <input type="hidden" name="mode" value="write">
			    <button type="submit" class="btn btn-outline-secondary">Write</button>
			    <button type="button" class="btn btn-outline-danger" onclick="history.back(-1);">Back</button>
		    </div>
		</form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> 
</body>
</html>
<?
    mysqli_close($db_conn);
?>