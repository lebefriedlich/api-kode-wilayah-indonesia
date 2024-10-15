# API Wilayah Indonesia

API ini menyediakan endpoint untuk mengambil data wilayah Indonesia secara hierarkis mulai dari provinsi, kabupaten/kota, kecamatan, hingga desa/kelurahan.

## Base URL

Gunakan base URL berikut untuk mengakses API:
- **Base URL**: `https://mhna.my.id/api/`

## Daftar Endpoint

### 1. Mendapatkan Daftar Provinsi

- **URL**: `GET /wilayah/provinsi`
- **Full URL**: `https://mhna.my.id/api/wilayah/provinsi`
- **Description**: Mengambil daftar seluruh provinsi di Indonesia.
- **Response**:
  - **Status Code**:
    - `200 OK`: Jika data provinsi berhasil diambil.
    - `404 Not Found`: Jika data provinsi tidak ditemukan.
  - **Body** (sukses):
    ```json
    {
        "status": "success",
        "message": "Data provinsi berhasil diambil",
        "status_code": 200,
        "data": [
            {
                "kode": "11",
                "nama": "ACEH"
            },
            {
                "kode": "12",
                "nama": "SUMATERA UTARA"
            },
            {
                "kode": "13",
                "nama": "SUMATERA BARAT"
            },
            {
                "kode": "14",
                "nama": "RIAU"
            },
            {
                "kode": "15",
                "nama": "JAMBI"
            },
            {
                "kode": "16",
                "nama": "SUMATERA SELATAN"
            },
            {
                "kode": "17",
                "nama": "BENGKULU"
            },
            {
                "kode": "18",
                "nama": "LAMPUNG"
            },
            {
                "kode": "19",
                "nama": "KEPULAUAN BANGKA BELITUNG"
            },
            {
                "kode": "21",
                "nama": "KEPULAUAN RIAU"
            },
            {
                "kode": "31",
                "nama": "DKI JAKARTA"
            },
            {
                "kode": "32",
                "nama": "JAWA BARAT"
            },
            {
                "kode": "33",
                "nama": "JAWA TENGAH"
            },
            {
                "kode": "34",
                "nama": "DAERAH ISTIMEWA YOGYAKARTA"
            },
            {
                "kode": "35",
                "nama": "JAWA TIMUR"
            },
            {
                "kode": "36",
                "nama": "BANTEN"
            },
            {
                "kode": "51",
                "nama": "BALI"
            },
            {
                "kode": "52",
                "nama": "NUSA TENGGARA BARAT"
            },
            {
                "kode": "53",
                "nama": "NUSA TENGGARA TIMUR"
            },
            {
                "kode": "61",
                "nama": "KALIMANTAN BARAT"
            },
            {
                "kode": "62",
                "nama": "KALIMANTAN TENGAH"
            },
            {
                "kode": "63",
                "nama": "KALIMANTAN SELATAN"
            },
            {
                "kode": "64",
                "nama": "KALIMANTAN TIMUR"
            },
            {
                "kode": "65",
                "nama": "KALIMANTAN UTARA"
            },
            {
                "kode": "71",
                "nama": "SULAWESI UTARA"
            },
            {
                "kode": "72",
                "nama": "SULAWESI TENGAH"
            },
            {
                "kode": "73",
                "nama": "SULAWESI SELATAN"
            },
            {
                "kode": "74",
                "nama": "SULAWESI TENGGARA"
            },
            {
                "kode": "75",
                "nama": "GORONTALO"
            },
            {
                "kode": "76",
                "nama": "SULAWESI BARAT"
            },
            {
                "kode": "81",
                "nama": "MALUKU"
            },
            {
                "kode": "82",
                "nama": "MALUKU UTARA"
            },
            {
                "kode": "91",
                "nama": "P A P U A"
            },
            {
                "kode": "92",
                "nama": "PAPUA BARAT"
            }
        ]
    }
    ```
  - **Body** (error 404):
    ```json
    {
      "status": "error",
      "message": "Data provinsi tidak ditemukan",
      "status_code": 404
    }
    ```

---

### 2. Mendapatkan Daftar Kabupaten/Kota Berdasarkan Kode Provinsi

- **URL**: `GET /wilayah/kabupaten/{kode_provinsi}`
- **Full URL**: `https://mhna.my.id/api/wilayah/kabupaten/{kode_provinsi}`
- **Description**: Mengambil daftar kabupaten/kota yang ada di provinsi tertentu.
- **Parameter**:
  - `kode_provinsi`: Kode provinsi (2 karakter, wajib diisi).
- **Response**:
  - **Status Code**:
    - `200 OK`: Jika data kabupaten/kota berhasil diambil.
    - `400 Bad Request`: Jika kode provinsi tidak valid (tidak 2 karakter).
    - `404 Not Found`: Jika data kabupaten/kota tidak ditemukan.
  - **Body** (sukses):
    ```json
    {
      "status": "success",
      "message": "Data kabupaten atau kota berhasil diambil",
      "status_code": 200,
      "data": [
        {
          "kode": "11.01",
          "nama": "KAB. ACEH SELATAN"
        },
        {
          "kode": "11.02",
          "nama": "KAB. ACEH TENGGARA"
        },
        ...
      ]
    }
    ```
  - **Body** (error 400):
    ```json
    {
      "status": "error",
      "message": "Kode provinsi harus terdiri dari dua karakter",
      "status_code": 400
    }
    ```
  - **Body** (error 404):
    ```json
    {
      "status": "error",
      "message": "Data kabupaten atau kota tidak ditemukan",
      "status_code": 404
    }
    ```

---

### 3. Mendapatkan Daftar Kecamatan Berdasarkan Kode Kabupaten/Kota

- **URL**: `GET /wilayah/kecamatan/{kode_kabupaten}`
- **Full URL**: `https://mhna.my.id/api/wilayah/kecamatan/{kode_kabupaten}`
- **Description**: Mengambil daftar kecamatan yang ada di kabupaten/kota tertentu.
- **Parameter**:
  - `kode_kabupaten`: Kode kabupaten/kota (5 karakter, wajib diisi).
- **Response**:
  - **Status Code**:
    - `200 OK`: Jika data kecamatan berhasil diambil.
    - `400 Bad Request`: Jika kode kabupaten/kota tidak valid (tidak 5 karakter).
    - `404 Not Found`: Jika data kecamatan tidak ditemukan.
  - **Body** (sukses):
    ```json
    {
      "status": "success",
      "message": "Data kecamatan berhasil diambil",
      "status_code": 200,
      "data": [
        {
          "kode": "11.01.01",
          "nama": "Bakongan"
        },
        {
          "kode": "11.01.02",
          "nama": "Kluet Utara"
        },
        ...
      ]
    }
    ```
  - **Body** (error 400):
    ```json
    {
      "status": "error",
      "message": "Kode kabupaten atau kota harus terdiri dari lima karakter",
      "status_code": 400
    }
    ```
  - **Body** (error 404):
    ```json
    {
      "status": "error",
      "message": "Data kecamatan tidak ditemukan",
      "status_code": 404
    }
    ```

---

### 4. Mendapatkan Daftar Desa/Kelurahan Berdasarkan Kode Kecamatan

- **URL**: `GET /wilayah/desa/{kode_kecamatan}`
- **Full URL**: `https://mhna.my.id/api/wilayah/desa/{kode_kecamatan}`
- **Description**: Mengambil daftar desa/kelurahan yang ada di kecamatan tertentu.
- **Parameter**:
  - `kode_kecamatan`: Kode kecamatan (8 karakter, wajib diisi).
- **Response**:
  - **Status Code**:
    - `200 OK`: Jika data desa/kelurahan berhasil diambil.
    - `400 Bad Request`: Jika kode kecamatan tidak valid (tidak 8 karakter).
    - `404 Not Found`: Jika data desa/kelurahan tidak ditemukan.
  - **Body** (sukses):
    ```json
    {
      "status": "success",
      "message": "Data desa atau kelurahan berhasil diambil",
      "status_code": 200,
      "data": [
        {
          "kode": "11.01.01.2001",
          "nama": "Keude Bakongan"
        },
        {
          "kode": "11.01.01.2002",
          "nama": "Ujong Mangki"
        },
        ...
      ]
    }
    ```
  - **Body** (error 400):
    ```json
    {
      "status": "error",
      "message": "Kode kecamatan harus terdiri dari delapan karakter",
      "status_code": 400
    }
    ```
  - **Body** (error 404):
    ```json
    {
      "status": "error",
      "message": "Data desa atau kelurahan tidak ditemukan",
      "status_code": 404
    }
    ```

---

## Error Responses

- **400 Bad Request**: Jika parameter yang dimasukkan tidak valid, API akan mengembalikan response berikut:
  ```json
  {
    "status": "error",
    "message": "Kode wilayah harus terdiri dari {jumlah karakter yang sesuai}",
    "status_code": 400
  }
