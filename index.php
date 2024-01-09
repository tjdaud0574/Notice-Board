<?               
    $db_conn = mysqli_connect("localhost", "root", "002415", "pentest");
    $sql = "SELECT * FROM tb_board order by idx desc";
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
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-3 mx-auto text-center">
        <h2 class="display-4">Notice Board</h2>
        <hr>
    </div>
    <div class="container">
        <div class="text-end"> 
            <button type="button" class="btn btn-outline-dark" onclick="location.href='write.php'">글쓰기</button>
        </div>
        <br>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th width="10%" scope="col" class="text-center">번호</th>
                    <th width="60%" scope="col" class="text-center">제목</th>
                    <th width="20%" scope="col" class="text-center">작성자</th>
                    <th width="10%" scope="col" class="text-center">작성일</th>
                </tr>
            </thead>
            <tbody>
            <?
                if($total_rows != 0) {
                    for($i=0; $i<$total_rows; $i++) {
                        $row = mysqli_fetch_assoc($result);
            ?>
                <tr>
                    <th scope="row" class="text-center"><?=$row["idx"]?></th>
                    <td class="text-center"><a href="view.php?idx=<?=$row["idx"]?>"><?=$row["title"]?></a></td>
                    <td class="text-center"><?=$row["writer"]?></td>
                    <td class="text-center"><?=$row["regdate"]?></td>
                </tr>
            <?    
                }
            }  else {
            ?>
                <tr>
                    <td colspan="4" class="text-center">글이 없습니다.</td>
                </tr>
            <?
            }
            ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> 
</body>
</html>
<?
    mysqli_close($db_conn);
?>