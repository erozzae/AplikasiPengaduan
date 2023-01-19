# Aplikasi Pengaduan
Aplikasi pengaduan ini merupakan aplikasi untuk membantu user dalam mengadukan aduannya ke perusahaan atau organisasi terkait. Hal-hal yang diadukan adalah hal-hal yang berkaitan dengan perusahaan atau organisasi tersebut seperti produk, layanan atau yang lainnya. Terdapat beberapa fitur tambahan pada aplikasi ini seperti forum diskusi dan QnA.


## Fitur
- Pengaduan 
- Forum diskusi
- QnA
- Manajemen user

## Instalasi
Download atau clone web servicenya terlebih di sini :
https://github.com/erozzae/API-AplikasiPengaduan

### Instalasi Web Service 
1.	Git clone projeknya
- ketik dan enter code di bawah ini pada terminal 
2.	Composer install 
3.	cp .env.example .env 
4.	php artisan key:generate
5.	php artisan config:cache
6.	buat database mysql baru dengan nama “komplain_cs” 
7.	php artisan migrate
8.	php artisan db:seed
9.	php artisan passport:install
10.	php artisan serve

### Instalasi Web App Aplikasi Pengaduan
1.	Git clone projeknya
- ketik dan enter code di bawah ini pada terminal 
2.	Composer install 
3.	cp .env.example .env 
4.	php artisan key:generate
5.	php artisan config:cache
6.	php artisan serve –port=8180

## Login
- Email : admin@gmail.com
- Password : password

## Tampilan Website
- Halaman Login
<img width="960" alt="image" src="https://user-images.githubusercontent.com/96459492/213226196-23becf6f-84ee-4062-874c-12e8c70c9354.png">
- Halaman Register
<img width="960" alt="image" src="https://user-images.githubusercontent.com/96459492/213227348-c2e65aad-885a-4d8d-a165-33de32d17ee9.png">
Halaman Profil 
<img width="960" alt="image" src="https://user-images.githubusercontent.com/96459492/213228920-ebfd52b2-c26d-49b7-89df-790959e4ed4b.png">
- Beranda *User
<img width="960" alt="image" src="https://user-images.githubusercontent.com/96459492/213228300-416c818f-1572-4007-a1b6-11f4bc4f414b.png">
- Halaman QnA *User
<img width="960" alt="image" src="https://user-images.githubusercontent.com/96459492/213230152-857895e1-33dd-4a98-b33d-1c6e5b69acba.png">
- Halaman QnA *Admin
<img width="960" alt="image" src="https://user-images.githubusercontent.com/96459492/213230769-84f984c2-0a2f-4400-92e4-3afb6f27021a.png">
- Halaman Forum Diskusi *Admin
<img width="960" alt="image" src="https://user-images.githubusercontent.com/96459492/213231566-1073be7e-86ee-4239-9f3c-810c6ac388fd.png">
- Halaman Forum Diskusi *User
<img width="960" alt="image" src="https://user-images.githubusercontent.com/96459492/213231974-87f7714a-51e7-4441-b0f6-8526b6adad5b.png">
- Halaman Daftar Pengaduan *Admin
<img width="960" alt="image" src="https://user-images.githubusercontent.com/96459492/213232892-257e0958-08d1-46d2-821f-9329699277b0.png">
- Halaman Pengaduan User
<img width="960" alt="image" src="https://user-images.githubusercontent.com/96459492/213233980-6e418d5b-10a3-42ec-8abe-c9f3b052c007.png">
- Tindak Lanjut *Admin
<img width="960" alt="image" src="https://user-images.githubusercontent.com/96459492/213234212-afd78c01-57e9-4af7-a988-3ee60e28a0f4.png">
- Halaman Pengelola User *Admin
<img width="960" alt="image" src="https://user-images.githubusercontent.com/96459492/213234726-19bdc668-c848-4206-aceb-9abd967166ca.png">

