# modern-laravel
## Afdi Fauzul Bahar

## Task
Buat visualisasi calon presiden Indonesia tahun 2024 dengan kriteria:
1. Data dari [API capres 2024](https://mocki.io/v1/92a1f2ef-bef2-4f84-8f06-1965f0fca1a7)
   1. handle request timeout
   2. handle URL tidak bisa diakses (misal karena koneksi internet terputus)
2. Terdapat DTO untuk menampung profil calon:
   1. nomor urut: integer
   2. posisi: Enum (PRESIDEN atau WAKIL_PRESIDEN)
   3. tempat lahir: string
   4. tanggal lahir: Carbon
   5. usia: integer
   6. karir: `<array of DTO Karir>`
3. Terdapat DTO untuk menampung data karir:
   1. jabatan: string
   2. tahun mulai: integer
   3. tahun selesai: integer (nullable)
4. DTO bisa implemen sendiri atau memakai package `spatie/laravel-data`
5. Terdapat fungsi `parseTanggalLahir`, return `string`
6. Terdapat fungsi `parseKarir`, return array of `DTO Karir`
7. Terdapat fungsi `hitungUmur`, return int
8. Menerapkan Service layer
9. 100% test coverage `pest`
10. 100% type coverage `pest`
11. Lolos `pint`
12. Lolos sonarlint
13. Zero code duplication
14. Aplikasi dibuat dengan Laravel
15. Profil calon presiden dan wakil presiden bisa diakses di endpoint `/`
16. Profil calon presiden dan wakil presiden bisa diakses melalui command `php artisan capresku`
17. Untuk command line, format tampilan bebas

## Contoh output:
![image](https://gist.github.com/assets/149716/fe11e11b-12fa-417a-ba4b-ea5c524d17e8)

 