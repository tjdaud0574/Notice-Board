<?
	header("Content-Type: text/html; charset=UTF-8");

	$mode = $_REQUEST["mode"];
	$db_conn = mysqli_connect("localhost", "root", "002415", "pentest");
	
	if($mode == "write") {
		$title = $_POST["title"];
		$writer = $_POST["writer"];
		$content = $_POST["content"];

		if(empty($title) || empty($writer) || empty($content)) {
			echo "<script>alert('빈칸이 존재합니다.');history.back(-1);</script>";
			exit();
		}
		
		$content = str_replace("\r\n", "<br>", $content);
		$query = "insert into tb_board(title, writer, content, regdate) values('{$title}', '{$writer}', '{$content}', now())";
		mysqli_query($db_conn, $sql);
	} else if($mode == "modify") {
		$idx = $_POST["idx"];
		$title = $_POST["title"];
		$writer = $_POST["writer"];
		$content = $_POST["content"];

		if(empty($idx) || empty($title) || empty($writer) || empty($content)) {
			echo "<script>alert('빈칸이 존재합니다.');history.back(-1);</script>";
			exit();
		}
		
		$content = str_replace("\r\n", "<br>", $content);
		
		$sql = "update tb_board set title='{$title}', writer='{$writer}', content='{$content}', regdate=now() where idx={$idx}";
		mysqli_query($db_conn, $sql);
	} 

	echo "<script>location.href='index.php';</script>";
	mysqli_close($db_conn);
?>