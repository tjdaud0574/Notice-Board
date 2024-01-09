<?
	  $db_conn = mysqli_connect("localhost", "root", "002415", "pentest");
	  $idx = $_REQUEST["idx"];
	  $sql = "select * from tb_board where idx={$idx}";
    $result = mysqli_query($db_conn, $sql);
    # mysqli_num_rows : 테이블 안의 row 데이터의 개수
    $total_rows = mysqli_num_rows($result);
?>
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
        <h1 class="display-4">Modify Page</h1>
        <hr>
    </div>
	  <?
	      if($total_rows != 0) {
		        $row = mysqli_fetch_assoc($result);
	  ?>
    <div class="container">
		    <form action="action.php" method="POST" enctype="multipart/form-data">
		        <div class="form-group">
			          <label>Title</label>
			          <input type="text" class="form-control" name="title" placeholder="Title Input" value="<?=$row["title"]?>">
		        </div>
		        <div class="form-group">
			          <label>Writer</label>
			          <input type="text" class="form-control" name="writer" placeholder="Writer Input" value="<?=$row["writer"]?>">
		        </div>
		        <div class="form-group">
			          <label for="exampleInputPassword1">Contents</label>
			          <textarea class="form-control" name="content" rows="5" placeholder="Contents Input"><?=$row["content"]?></textarea>
		        </div>
		        <div class="text-right">
			          <input type="hidden" name="idx" value="<?=$row["idx"]?>">
			          <input type="hidden" name="mode" value="modify">
			          <button type="submit" class="btn btn-outline-secondary">Modify</button>
			          <button type="button" class="btn btn-outline-danger" onclick="history.back(-1);">Back</button>
		        </div>
		    </form>
    </div>
	<?
	} else {
	?>
		  <script>alert("존재하지 않는 게시글 입니다.");history.back(-1);</script>
	<?
	}
	?>   
</body>
</html>
<?
	  mysqli_close($db_conn);
?>
