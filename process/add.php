<?php
include '../header.php';
include '../config.php';
?>
<form  method="post">
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Tên bài thi</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="Name">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Ngày thi</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="Examdatetime" placeholder="YYYY-MM-DD">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Thời gian làm bàih</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="Durations">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Số câu hỏi</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="Question">
        </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Điểm</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="Mark">
        </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Mã truy cập bài thi</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="Examcode">
        </div>
    </div>
    <div class="form-group row">
        <label for="saveBtn" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <button type="submit" name="Save" class="btn btn-primary">Lưu lại</button>
        </div>
    </div>
</form>
<?php
    if (isset($_POST['Save'])) {
    $name = $_POST['Name'];
    $examdatetime = $_POST['Examdatetime'];
    $durations = $_POST['Durations'];
    $question = $_POST['Question'];
    $mark = $_POST['Mark'];
    $examcode = $_POST['Examcode'];
    //? câu lệnh
    $sql = "INSERT INTO `exams`(`exam_title`, `exam_datetime`, `duration`, `total_question`, `marks_per_right_answer`,`exam_code`) 
    VALUES('$name','$examdatetime','$durations','$question','$mark','$examcode')";
    // echo $sql;
    //? kiểm tra và thực thi lệnh
    $result = mysqli_query($conn, $sql);
    if ($result > 0) {
        header('location:../index.php');
    } else {
        header('location:Error.php');
    }
}

//? đóng kết nối
mysqli_close($conn);

include '../footer.php';
?>