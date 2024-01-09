<?php
    $userid = $_GET["id"];
    $userpw = $_GET["pw"];
    $db_conn = mysqli_connect("localhost", "root", "002415", "logdb");
    $sql = "SELECT * FROM login WHERE login_id = '$userid' AND login_pw = '$userpw';";
    $result = mysqli_query($db_conn, $sql);
    # mysqli_fetch_array : select 쿼리의 결과를 처리하는 함수, 한번에 한개의 데이터 행을 배열로 가져옴
    $row = mysqli_fetch_array($result);
    if (!empty($userid) && !empty($userpw)) {
        if ($row) {
            echo "<script>alert('로그인에 성공하셨습니다')</script>";
        }
        else {
            echo "<script>alert('로그인에 실패하셨습니다')</script>";
        }
    }

    mysqli_close($db_conn);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>  
    <form action = "index.php" method = "GET">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 m-3">
                    <label class="form-label">로그인</label>
                    <input type="text" class="form-control" name="id" placeholder="아이디">
                    <input type="password" class="form-control" name="pw" placeholder="비밀번호">
                    <br>
                    <button type="submit" class="btn btn-dark">로그인</button>
                </div>
                <div class="col-sm-4"></div>
                
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> 
</body>
</html>