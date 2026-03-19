# Dự án PHP chạy bằng Docker

Đây là dự án PHP thuần trước đây chạy bằng XAMPP, hiện đã được chuyển sang chạy bằng Docker với PHP + Apache và MySQL.

---

## Mô tả ngắn
- Ứng dụng PHP chạy trên Apache (PHP 8.2)
- Cơ sở dữ liệu MySQL chạy trong container riêng
- Tự động import file SQL khi khởi động container MySQL lần đầu

---

## Cấu trúc thư mục cơ bản
- `src/` : mã nguồn PHP
- `db/` : chứa file SQL (`baocaoktpm_dulieu2024.sql`)
- `Dockerfile` : cấu hình image PHP + Apache
- `docker-compose.yml` : cấu hình các service (web, db)

---

## Yêu cầu
- Đã cài Docker
- Đã cài Docker Compose

---

## Cách chạy dự án

### Build và chạy lần đầu
```bash
docker compose up --build
```

---

### Truy cập ứng dụng
Sau khi container chạy xong, mở trình duyệt:

```
http://localhost:8080
```

---

## Các câu lệnh Docker thường dùng

### Dừng container
```bash
docker compose down
```
- Dừng và xóa container
- Không xóa dữ liệu database (volume vẫn còn)

---

### Dừng container và xóa toàn bộ dữ liệu database
```bash
docker compose down -v
```
- Dừng container
- Xóa luôn volume (`db_data`)
- Database sẽ được import lại từ file SQL khi chạy lại

---

### Chạy lại dự án từ đầu (reset database)
```bash
docker compose down -v
docker compose up --build
```
- Dùng khi:
  - Muốn import lại database
  - Database bị lỗi
  - Cần reset dữ liệu

---

### Xem container đang chạy
```bash
docker ps
```

---

### Truy cập MySQL trong container
```bash
docker exec -it php_db mysql -uuser -ppass baocaoktpm
```
- `php_db` : tên container MySQL
- `user / pass` : tài khoản MySQL
- `baocaoktpm` : tên database

---

## Thông tin database (dùng trong PHP)
- Host: `db`
- Port: `3306`
- Database: `baocaoktpm`
- User: `user`
- Password: `pass`

---

## Ghi chú
- File SQL đặt trong thư mục `db/` sẽ được MySQL tự động import khi container khởi tạo lần đầu
- Nếu đổi cấu trúc database → nên chạy `docker compose down -v` để import lại

---

