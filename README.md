1. pilih https kemudian copy link 
3. buka c:xampp/htdocs kemudian buka command prompt di folder tersebut 
4. ketik git clone kemudian copy link yang sudah di copy kemudian klik enter
5. buat file baru dengan nama .env , kemudian copy .env.example paste di file .env setelah itu ganti nama database dengan nama payment
6. setelah itu composer install 
7. kemudian setelah selesai jalankan php artisan generate:key
8. selanjutnya php artisan migrate
9. yang terakhir jalankan web dengan mengetikkan php artisan serve
10. ini adalah command untuk menambahkan cron setting kedalam server laravel jika menggunakan windows akan sedikit berbeda dengan linux
    berikut adalah command nya : php path\artisan schedule:run >nul 2>&1