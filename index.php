<?php
include 'config.php';

// Truy vấn lấy dữ liệu sinh viên và ngành học
$result = $conn->query("
    SELECT SinhVien.MaSV, SinhVien.HoTen, SinhVien.GioiTinh, SinhVien.NgaySinh, SinhVien.Hinh, NganhHoc.MaNganh
    FROM SinhVien
    LEFT JOIN NganhHoc ON SinhVien.MaNganh = NganhHoc.MaNganh
");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<!-- Header -->
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

<!-- Danh sách sinh viên -->
<div class="container mt-4">
    <h2 class="text-primary">Danh sách sinh viên</h2>
    <a href="create.php" class="btn btn-primary mb-3">Thêm sinh viên</a>
    
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Mã SV</th>
                <th>Hình ảnh</th>
                <th>Họ và Tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Mã Ngành</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['MaSV'] ?></td>
                <td>
                    <?php 
                    $imagePath = "Content/images/" . basename($row['Hinh']); // Đảm bảo đường dẫn đúng

                    if (!empty($row['Hinh']) && file_exists($imagePath)) {
                        echo '<img src="'.$imagePath.'" width="50" class="rounded">';
                    } else {
                        echo '<img src="Content/images/default.png" width="50" class="rounded" alt="Không có ảnh">';
                    }
                    ?>
                </td>


                <td><?= $row['HoTen'] ?></td>
                <td><?= $row['GioiTinh'] ?></td>
                <td><?= $row['NgaySinh'] ?></td>
                <td><?= $row['MaNganh'] ?></td>
                <td>
                    <a href="detail.php?MaSV=<?= $row['MaSV'] ?>" class="btn btn-info btn-sm">Xem</a>
                    <a href="edit.php?MaSV=<?= $row['MaSV'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="delete.php?MaSV=<?= $row['MaSV'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
