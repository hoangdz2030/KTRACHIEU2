<?php
include 'config.php';

$MaSV = $_GET['MaSV'];
$result = $conn->query("SELECT * FROM SinhVien WHERE MaSV='$MaSV'");
$row = $result->fetch_assoc();

// Lấy tên ngành từ bảng NganhHoc
$query_nganh = "SELECT TenNganh FROM NganhHoc WHERE MaNganh = '{$row['MaNganh']}'";
$result_nganh = $conn->query($query_nganh);
$row_nganh = $result_nganh->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="test1.php">Test1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Sinh viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hocphan.php">Học phần</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php"> Đăng ký</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Đăng nhập</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="text-primary">Thông tin chi tiết sinh viên</h2>
    <a href="index.php" class="btn btn-secondary mb-3">Quay lại</a>

    <div class="card p-4">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="Content/images/<?= $row['Hinh'] ?>" class="img-fluid rounded" style="border: 1px solid #ddd; padding: 5px; width: 100%;">
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th>Mã Sinh Viên:</th>
                        <td><?= $row['MaSV'] ?></td>
                    </tr>
                    <tr>
                        <th>Họ và Tên:</th>
                        <td><?= $row['HoTen'] ?></td>
                    </tr>
                    <tr>
                        <th>Giới tính:</th>
                        <td><?= $row['GioiTinh'] ?></td>
                    </tr>
                    <tr>
                        <th>Ngày sinh:</th>
                        <td><?= $row['NgaySinh'] ?></td>
                    </tr>
                    <tr>
                        <th>Mã Ngành:</th>
                        <td><?= $row['MaNganh'] ?> - <?= $row_nganh['TenNganh'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
