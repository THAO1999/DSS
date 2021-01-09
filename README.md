# CNPM
SE04-nhoms27.1
### Project: Giao Dịch Thực Tập Sinh
#### 1.1 Mục tiêu: 
- Tạo ra web quản lí sinh viên kết nối với doanh nghiêp thông qua giáo viên

#### 1.2 kết quả 
- Doanh nghiệp sẽ tuyển được sinh viên
- Sinh viên sẽ tìm được việc làm

#### 1.3 Công nghệ và công cụ sử dụng:
- Framework:Yii2
- HTML5, CSS3,Bootstrap4.
- Cơ sở dữ liệu : MySQL.
- Công cụ sử dụng : Visual Studio code, SublimeText3,Diagrams,Xampp.
#### 1.4 Thành Viên :
- Tạ Minh Thao
- Phạm Thanh Tùng
- Nguyễn Đức Mạnh
- Như Quỳnh

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.0.

INSTALLATION
------------
### Use Git 
git clone https://github.com/THAO1999/SE04-Nhom27.1.git

### Running 
  Run the commands:
    * `php  init`;
    * `composer install`;
   
    
 
### Database
## import
import file intern.sql to Database

## Config
Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=intern',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```

RUNNING
------------
## Giao Diện Giáo Viên
http://localhost/SE04-Nhom27.1/backend/site/login
* username:giaovien2
* password:giaovien123456

## Giao Diện Sinh Viên
http://localhost/SE04-Nhom27.1/frontend/web/site/login
* username:phamthanhtung
* password:sv123456
## Giao Diện Doanh Nghiệp
http://localhost/SE04-Nhom27.1/enterprise/web/site/login
* username:2nf
* password:dn123456
 
