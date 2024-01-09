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
		<h1 class="display-4">View Page</h1>
    	<hr>
    </div>
    
    <div class="container">
	<?
	if($total_rows != 0) {
		$row = mysqli_fetch_assoc($result);
	?>
		<table class="table table-bordered">
		  	<tbody>
				<tr>
			  		<th scope="row" width="20%" class="text-center">Title</th>
			  		<td><?=$row["title"]?></td>
				</tr>
				<tr>
			  		<th scope="row" width="20%" class="text-center">Writer</th>
			  		<td><?=$row["writer"]?></td>
				</tr>
				<tr>
			  		<th scope="row" width="20%" class="text-center">Date</th>
			  		<td><?=$row["regdate"]?></td>
				</tr>
				<tr>
			  		<th scope="row" width="20%" class="text-center">Contents</th>
			  		<td><?=$row["content"]?></td>
				</tr>
		  	</tbody>
		</table>
		<div class="text-end">
			<button type="button" class="btn btn-outline-secondary" onclick="location.href='modify.php?idx=<?=$row["idx"]?>'">수정</button>
			<button type="button" class="btn btn-outline-warning" onclick="location.href='index.php'">목록</button>
		</div>
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
