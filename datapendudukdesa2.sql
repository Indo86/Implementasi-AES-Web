-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2024 pada 15.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datapendudukdesa2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nip` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash_nip` varchar(255) NOT NULL,
  `hash_nik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nip`, `nik`, `nama`, `jabatan`, `password`, `hash_nip`, `hash_nik`) VALUES
('+rBCdvSMlQk8P56jGC9a03YudoR4Lv1JtnUJW+volxo=', 'HCxFJyqEjcbXWkndcPljXw==', 'ZD1bD8E3YukeYpGgGDFf6Q==', 'MyRnEOcebZOvtlmjuN4Xag==', 'pZJ6yUgtUXQJcCXKsoaa1A==', '127e96d3277f970db71edc79ab14a2861a32eff789091a7bb4e86870bcaf2693', 'bbb87d5cacccf614115417ac33114c56be7e095fa844a0faa7fae56e0be5049f'),
('HKsQYjLuYDpIkYn5WC46nXguMpZEeDUFNIdmR+VZjwA=', 'K3dTzKfV2LJsLY5HsBIV4w==', 'F/UBiRK7VL+A3/B2xBoOk4dYTSzG7fKNCl+Rie24pdM=', 'MyRnEOcebZOvtlmjuN4Xag==', 'mz0n2mawzneYHxCY7JoFAQ==', '679775d778ca525d2dde7f91f8b21b3c40961089b1db60b4f002d219dbb47ef1', '4df890015e7ab7b7da83f7329a2c5a674f74b5dadf01ecc81598b80daaa3edbb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rtrw` varchar(255) NOT NULL,
  `keldesa` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `status_perkawinan` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `golD` varchar(255) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `hash_nik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `ttl`, `jenis_kelamin`, `alamat`, `rtrw`, `keldesa`, `kecamatan`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `golD`, `gambar`, `hash_nik`) VALUES
('dJwdK6V10QC+9tCLTdPybgRQ7aWJqsUBtg1SsFax9wk=', 'PytO98DwUsyvA/OJIAvPZA==', 'rKhAorsHo5FWjX1Czs0R7IIgdt5S0+O6vWBYgF2ob7E=', 'fVt6xdAOVD/ItRmhdtncrw==', 'uNBL6Z3c64ioSvkbM8I6Lg==', 'kPEzFE/4uqH6SvdCUc2KRQ==', 'Zlqb1Os3K5lTnS6Uyzmfgg==', 'mO3i9FYNomtDwxgcHy+W8w==', 'EWW1MIWzKLpeowdfwqWWTA==', 'E8MvaxQCINiV40o3HagQXQ==', '2bR/b6oOdf+sD/lo2iaNQw==', 'rI+Fus6ERtPVgec2sSyA6g==', 'Y3z+coXuuDOGYrjlBVFgKprDRKk+1Pu7eiwL4/aOmMk=', '4df890015e7ab7b7da83f7329a2c5a674f74b5dadf01ecc81598b80daaa3edbb'),
('HCxFJyqEjcbXWkndcPljXw==', 'ZD1bD8E3YukeYpGgGDFf6Q==', '+AJVZRkoeChDC7bdII5Ctd9+IZ9CJQ90uNpeqGOwzxk=', 'ZYXnIKUKZ0aOUASNOMwsLA==', 'lNe8n/Q28O2K4PqQ1P0naw==', 'v4H6eKsXG3Vjb1h0UA8jGA==', 'Zlqb1Os3K5lTnS6Uyzmfgg==', 'zAoKYpYwWCg7Ycxr7/vOVg==', 'x5OWVXTjtOb9djfQRPC+Tw==', 'fU7URPOggSn+iHGX5QYDgg==', '2bR/b6oOdf+sD/lo2iaNQw==', 'PWNFLNzU339D2rWwwtIVTw==', 'WZp156YsoVXYglasXDz+KtVOOTaM0QwqKuc0XVqMxuo=', 'bbb87d5cacccf614115417ac33114c56be7e095fa844a0faa7fae56e0be5049f'),
('JFN+2RjdlvcoHwHNlEe+4Q==', 'j4tl+slQTNFb9o6E7RjhkA==', 'nf4HnuxgCtxONP0t0Zf2kbwOvpccLpeCq04BJrccX/w=', 'fVt6xdAOVD/ItRmhdtncrw==', 'uNBL6Z3c64ioSvkbM8I6Lg==', 'kPEzFE/4uqH6SvdCUc2KRQ==', 'Zlqb1Os3K5lTnS6Uyzmfgg==', 'mO3i9FYNomtDwxgcHy+W8w==', 'x5OWVXTjtOb9djfQRPC+Tw==', 'E8MvaxQCINiV40o3HagQXQ==', '2bR/b6oOdf+sD/lo2iaNQw==', 'RVc3ZjHxYXE4dOZwg+Qv3A==', '39FxUZ25CS/V2FQsvemmuflUGs451p6ZgLomjkuyyck=', 'c67bc0f223252dc48b3418f0641473d798a8060a8ee09b39d3207e8c67955d2f'),
('K3dTzKfV2LJsLY5HsBIV4w==', 'F/UBiRK7VL+A3/B2xBoOk4dYTSzG7fKNCl+Rie24pdM=', 'WTQgUfQNEpxVkm2SuCGIiTirEKqloCl7FELJy0GvcvM=', 'ZYXnIKUKZ0aOUASNOMwsLA==', 'nbv3k42k1Qvts9bMUm1VYw==', 'kPEzFE/4uqH6SvdCUc2KRQ==', 'Zlqb1Os3K5lTnS6Uyzmfgg==', 'zAoKYpYwWCg7Ycxr7/vOVg==', 'x5OWVXTjtOb9djfQRPC+Tw==', 'CZmtsH27A94B+jOqWZRNRA==', '2bR/b6oOdf+sD/lo2iaNQw==', 'rI+Fus6ERtPVgec2sSyA6g==', 'm5RSedTVDRz84Patr5YHwYEMnXX/WzUqmIbRWM5n9g8=', 'd919ffb9dc5e6b203098b1e5e7bcc789a3e3076c3faeb25ff1b5d4251e794c9f'),
('ve5lpiKEq/fXuuOoKI85WQ==', 'v4n1Y0Ecse41hGiyJuLSYQ==', 'IZoKwecVMQsCAdeeF77pySJNFiTIvT/XCKZQ7IxiEEI=', 'fVt6xdAOVD/ItRmhdtncrw==', 'Obdnu9fdo6OiPnZ9TyN4eQ==', 'kPEzFE/4uqH6SvdCUc2KRQ==', 'Zlqb1Os3K5lTnS6Uyzmfgg==', 'zAoKYpYwWCg7Ycxr7/vOVg==', 'EWW1MIWzKLpeowdfwqWWTA==', 'ZQ6LvxWI/zTqg6TrLOv1Gw==', '2bR/b6oOdf+sD/lo2iaNQw==', 'RVc3ZjHxYXE4dOZwg+Qv3A==', 'HnTP5MJBXrtGZA3qPzQsvIZ1WgzX/9YTMoRaePll0WY=', 'af50fadba6b9030e26c93f39eaff35cf945cfbb3d287893ddeb2201d04b29c89');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
