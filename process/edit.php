<?php
include '../header.php';
include '../config.php';

?>
<h2>Thay đổi thông tin </h2>
<form method="post">
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
        <label for="" class="col-sm-2 col-form-label">Thời gian làm bài</label>
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
        $mark = $_POST['Examcode'];

    //? câu lệnh
    $sql = "UPDATE `exams` SET`exam_title`=' $name',`exam_datetime`='$examdatetime',`duration`='$durations',`total_question`='$mark',`marks_per_right_answer`='$mark' WHERE id='$idd'";

    //? kiểm tra và thực thi câu lệnh
    if (mysqli_query($conn, $sql)) {
        header('location:../index.php');
    } else {
        header('location:error.php');
    }
    }


//? đóng kết nối
mysqli_close($conn);

include '../footer.php';
    