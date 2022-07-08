<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

jwt session is available in one hour

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Instalasi

1. Jalankan Command
  > composer install --ignore-platform-reqs

2. Setelah itu ganti host DB dengan 'localhost'

3. Buat database dengan nama 'laravel_sail'

4. Lakukan migrasi database dan seed data untuk stok mobil dan motor
  >  php artisan:migrate fresh --seed
5. Lakukan Testing menggunakan 
     ```
     ,/vendor/bin/sail artisan test
     ```
     atau
     ```
     php artisan test
     ```
6. Jalankan project seperti biasa setelah test 
  > php artisan serve

### Untuk Docker

1. Jalankan Command
  > composer install --ignore-platform-reqs

2. Setelah itu ganti host DB dengan 'mongo'

3. Buat database dengan nama 'laravel_sail'

4. Jalankan container docker 
      - Untuk Windows
        > .\vendor\bin\sail up 
      - Untuk OS berbasis *NIX
        > ./vendor/bin/sail up

5. Setelah menjalankan command diatas. Project laravel sudah berjalan dan diakses melalui localhost seperti biasa \
  untuk port project laravel dan database dll dapat dilihat di file docker-Compose.yml di bagian PORT untuk setiap service


6. Setelah itu jalankan migrasi 
      - Untuk Windows
        > .\vendor\bin\sail php artisan migrate:fresh --seed 
      - Untuk OS berbasis *NIX
        > ./vendor/bin/sail php artisan migrate:fresh --seed 





## API Usage

```
POST : http://localhost:80/api/auth/login
```
Login 
```json
{
    "email":"test@example.com",
    "password":"password"
}
```
List Kendaraan
```
GET  : http://localhost:80/api/auth/kendaraan
```

List History ketika ingin melihat history transaksi dengan tipe kendaraan mobil
ketika salah menulis url maka akan Get semua history transaksi

```
GET  : http://localhost:80/api/auth/history?tipe_kendaraan=mobil
```

Get semua history

```
GET  : http://localhost:80/api/auth/history
```

Get history dengan id transaksi
```
GET  : http://localhost:80/api/auth/history?id=id transaksi
```
Transaksi
```
POST  : http://localhost:80/api/auth/transaksi
```
ganti id_item sesuai dengan id kendaraan
```json
{
    "nama":"Deva",
    "id_item":"62c8be4c96b06bdecb0a0927",
    "stok_item":1
}
```
