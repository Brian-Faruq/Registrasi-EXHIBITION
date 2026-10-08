# Documentation & Project Plan: Web Registrasi ParentCamp

## 1. Tujuan Proyek
Proyek web ini dibangun khusus untuk mendukung kelancaran **Event ParentCamp di Sekolah Impian**. Sistem ini dirancang untuk mempermudah alur pendaftaran para orang tua siswa, mengelola data peserta secara terpusat, serta mempercepat proses verifikasi kehadiran (check-in) tamu di lokasi acara melalui sistem kode unik.

---

## 2. Bentuk Proyek
Aplikasi berbasis **Web (Laravel)** yang dapat diakses secara online oleh calon peserta (orang tua), panitia penjemput/penerima tamu (admin), serta pengelola utama sistem (super admin).

---

## 3. Struktur & Alur Halaman

* **Landing Page**
  * Berfungsi sebagai halaman utama penjelas fungsi sistem untuk event ParentCamp.
  * Menyediakan informasi alur pendaftaran, petunjuk alur kehadiran, serta akses langsung bagi orang tua untuk mulai registrasi atau masuk ke akun.

* **Buat Akun & Login**
  * **Buat Akun:** Halaman pendaftaran akun baru bagi orang tua sebelum melakukan pengisian formulir registrasi event.
  * **Login:** Halaman masuk umum bagi pengguna yang sudah memiliki akun (Orang Tua, Admin, dan Super Admin).

* **Form Registrasi Event**
  * Halaman formulir mendetail bagi orang tua setelah membuat akun/login.
  * Digunakan untuk memilih dan mengisi kebutuhan logistik event, seperti pilihan kasur, nomor/pilihan kamar, dan data pendukung lainnya.
  * Setelah berhasil melakukan registrasi, sistem akan mendenerate **Kode Unik** khusus untuk orang tua.

* **Halaman Admin (Penerima Tamu)**
  * Didesain khusus untuk panitia di lapangan yang bertugas menyambut kedatangan orang tua murid.
  * Memiliki fitur pencarian/input **Kode Unik** yang dibawa orang tua untuk memverifikasi kehadiran dan mencocokkan data reservasi secara cepat.

* **Halaman Super Admin**
  * Pusat kendali dan pengolahan seluruh data sistem.
  * Menyediakan dashboard lengkap untuk melihat seluruh list peserta, status pembayaran/registrasi, ketersediaan kamar/kasur, serta manajemen akun admin.

---

## 4. Kesimpulan
Dengan hadirnya web registrasi ParentCamp ini, seluruh proses pendataan dari tahap pendaftaran awal, alokasi fasilitas (kamar & kasur), hingga proses penjemputan/penyambutan orang tua di lokasi acara dapat berjalan secara digital, terstruktur, terhindar dari bentrok data, dan transparan bagi panitia Sekolah Impian.