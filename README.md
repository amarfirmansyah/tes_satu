## Test FS.3.1 (Authentication & Profile)

### Petunjuk Instalasi
1. **Clone repositori ini**:
   ```
   https://github.com/amarfirmansyah/tes_satu
2. **Masuk ke direktori**:
    ```
   cd tes_satu
3. **Install depedensi**
   - composer install
   - npm install

   
4. **Salin file env**
   ```
   cp .env.example .env

5. **Atur konfigurasi database**
    - Buka file .env dan sesuaikan konfigurasi database Anda
    - konfigurasi email dengan smtp   

6. **Generate application key**
    ```
   php artisan key:generate
   
7. **Migrasi dan Seed database**
    ```
   php artisan migrate --seed
   
8. **Jalankan aplikasi**
    - php artisan serve
    - npm run dev
