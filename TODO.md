# Sistem Login Proyek

## Backend (PHP dengan JWT)
- [x] Install Composer
- [x] Install firebase/php-jwt
- [x] Buat database admin_db dan tabel users
- [x] Buat config/db.php untuk koneksi database
- [x] Buat api/login.php untuk autentikasi login
- [x] Buat api/auth.php untuk verifikasi token
- [x] Buat api/register.php untuk registrasi (opsional)
- [x] Insert user test (admin@example.com / password)

## Frontend (React dengan TypeScript)
- [x] Install jwt-decode
- [x] Buat AuthContext untuk manajemen state autentikasi
- [x] Buat ProtectedRoute untuk melindungi route
- [x] Update App.tsx untuk menggunakan AuthProvider dan ProtectedRoute
- [x] Update SignInForm untuk handle login via API
- [x] Update UserDropdown untuk menampilkan user dan logout

## Testing
- [ ] Jalankan Apache dan MySQL di XAMPP
- [ ] Jalankan frontend dengan npm run dev
- [ ] Test login dengan email: admin@example.com, password: password
- [ ] Verifikasi redirect ke /home setelah login
- [ ] Verifikasi logout berfungsi
- [ ] Verifikasi auto logout setelah 4 jam (token expiry)

## Keamanan
- Password di-hash dengan password_hash
- JWT dengan expiry 4 jam
- CORS headers
- Input validation

## Catatan
- Sistem menggunakan mock authentication dengan user test
- Untuk production, tambahkan validasi lebih ketat dan error handling
- API register belum diintegrasikan di frontend, bisa ditambahkan jika diperlukan
