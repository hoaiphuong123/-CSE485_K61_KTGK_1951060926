<?php
include './header.php';
$idd = $_GET['id'];
?>
<a href="index.php" class="btn btn-primary">Quay lại trang chủ</a>
<table class="table table-ronsponsive">
<thead>
        <tr>
            <th scope="col">Mã bài thi</th>
            <th scope="col">Tên bài thi</th>
            <th scope="col"> Ngày thi</th>
            <th scope="col">Thời gian làm bài</th>
            <th scope="col"> Số câu hỏi</th>
            <th scope="col">Điểm</th>
            <th scope="col">Ngày tạo bài thi</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Mã truy cập</th>
            <th class='col' scope="col">chức năng</th>
        </tr>
    </thead>
    <tbody>
         <!-- xuất dữ kiệu theo cơ sở dữ kiệu -->
         <?php
        //b1 mở kết nối
         include './config.php';
         //truy vấn
         $sql= "SELECT * FROM `exams`WHERE id = '$idd' ";
         //lưu kết quả trả về $result
        $result=mysqli_query($conn,$sql);
        // phan tích và sử lý kết quả
        if(mysqli_num_rows($result)>0){
            while($row= mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo '<th scopy = "row">'.$row['id'].'</th>';
                echo '<td>' . $row['exam_title'] . '</td>';
                echo '<td>' . $row['exam_datetime'] . '</td>';
                echo '<td>' . $row['duration'] . '</td>';
                echo '<td>' . $row['total_question'] . '</td>';
                echo '<td>' . $row['marks_per_right_answer'] . '</td>';
                echo '<td>' . $row['created_on'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '<td>' . $row['exam_code'] . '</td>';
                echo '<td> 
                <a href="./detail.php?id=' . $row['id'] . '" class="btn btn-primary">Chi tiết</a>
                <a href="process/edit.php?id=' . $row['id'] . '" class="btn btn-success">Sửa</a>
                <a href="process/delete.php?id=' . $row['id'] . '" class="btn btn-danger mt-1">Xoá</a>
                </td>';
                echo "</tr>";
            }
        }
        //* B4: đóng kết nối
        mysqli_close($conn);
        ?>
    </tbody>
</table>
<?php include './footer.php' ?>