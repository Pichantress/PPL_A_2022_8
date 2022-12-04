-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 12:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(14) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `email_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `email_dosen`) VALUES
('140456788', 'dosen1', 'dosen1@gmail.com'),
('140787968', 'dosen3', 'dosen3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `irs`
--

CREATE TABLE `irs` (
  `id_irs` varchar(6) NOT NULL,
  `semester_aktif` int(20) DEFAULT NULL,
  `jumlah_sks` int(30) DEFAULT 0,
  `nim_mahasiswa_fk` varchar(14) DEFAULT NULL,
  `dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `irs`
--

INSERT INTO `irs` (`id_irs`, `semester_aktif`, `jumlah_sks`, `nim_mahasiswa_fk`, `dokumen`) VALUES
('310001', 2, 23, '24060130431234', ''),
('IRS002', 2, 23, '24060130432172', ''),
('IRS008', 1, 23, '24060130432172', 'studiKasusPPL_2022.pdf'),
('IRS010', 1, 23, '24060130431000', ''),
('IRS229', 3, 18, '24060130432172', 'Praktikum 2 - Sintaks PHP.pdf'),
('IRS232', 6, 23, '24060130432172', 'Muhammad_UTSPPLA.pdf'),
('IRS233', 5, 23, '24060130432172', '');

--
-- Triggers `irs`
--
DELIMITER $$
CREATE TRIGGER `add_id_irs` BEFORE INSERT ON `irs` FOR EACH ROW INSERT INTO irs_seq VALUES (NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `add_id_irs_2` BEFORE INSERT ON `irs` FOR EACH ROW SET NEW.id_irs = CONCAT('IRS', LPAD(LAST_INSERT_ID(), 3, '0'))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `irs_seq`
--

CREATE TABLE `irs_seq` (
  `id_irs` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `irs_seq`
--

INSERT INTO `irs_seq` (`id_irs`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(91),
(92),
(192),
(193),
(194),
(195),
(196),
(197),
(198),
(199),
(200),
(201),
(202),
(203),
(204),
(205),
(206),
(207),
(208),
(209),
(210),
(211),
(212),
(213),
(214),
(215),
(216),
(217),
(218),
(219),
(220),
(221),
(222),
(223),
(224),
(225),
(226),
(227),
(228),
(229),
(230),
(231),
(232),
(233);

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kota` int(11) NOT NULL,
  `id_provinsi_fk` int(11) NOT NULL,
  `nama_kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kota`, `id_provinsi_fk`, `nama_kota`) VALUES
(1677, 1, 'Kabupaten Aceh Barat'),
(1678, 1, 'Kabupaten Aceh Barat Daya'),
(1679, 1, 'Kabupaten Aceh Besar'),
(1680, 1, 'Kabupaten Aceh Jaya'),
(1681, 1, 'Kabupaten Aceh Selatan'),
(1682, 1, 'Kabupaten Aceh Singkil'),
(1683, 1, 'Kabupaten Aceh Tamiang'),
(1684, 1, 'Kabupaten Aceh Tengah'),
(1685, 1, 'Kabupaten Aceh Tenggara'),
(1686, 1, 'Kabupaten Aceh Timur'),
(1687, 1, 'Kabupaten Aceh Utara'),
(1688, 1, 'Kabupaten Bener Meriah'),
(1689, 1, 'Kabupaten Bireuen'),
(1690, 1, 'Kabupaten Gayo Lues'),
(1691, 1, 'Kabupaten Nagan Raya'),
(1692, 1, 'Kabupaten Pidie'),
(1693, 1, 'Kabupaten Pidie Jaya'),
(1694, 1, 'Kabupaten Simeulue'),
(1695, 1, 'Kota Banda Aceh'),
(1696, 1, 'Kota Langsa'),
(1697, 1, 'Kota Lhokseumawe'),
(1698, 1, 'Kota Sabang'),
(1699, 1, 'Kota Subulussalam'),
(1700, 2, 'Kabupaten Asahan'),
(1701, 2, 'Kabupaten Batubara'),
(1702, 2, 'Kabupaten Dairi'),
(1703, 2, 'Kabupaten Deli Serdang'),
(1704, 2, 'Kabupaten Humbang Hasundutan'),
(1705, 2, 'Kabupaten Karo'),
(1706, 2, 'Kabupaten Labuhanbatu'),
(1707, 2, 'Kabupaten Labuhanbatu Selatan'),
(1708, 2, 'Kabupaten Labuhanbatu Utara'),
(1709, 2, 'Kabupaten Langkat'),
(1710, 2, 'Kabupaten Mandailing Natal'),
(1711, 2, 'Kabupaten Nias'),
(1712, 2, 'Kabupaten Nias Barat'),
(1713, 2, 'Kabupaten Nias Selatan'),
(1714, 2, 'Kabupaten Nias Utara'),
(1715, 2, 'Kabupaten Padang Lawas'),
(1716, 2, 'Kabupaten Padang Lawas Utara'),
(1717, 2, 'Kabupaten Pakpak Bharat'),
(1718, 2, 'Kabupaten Samosir'),
(1719, 2, 'Kabupaten Serdang Bedagai'),
(1720, 2, 'Kabupaten Simalungun'),
(1721, 2, 'Kabupaten Tapanuli Selatan'),
(1722, 2, 'Kabupaten Tapanuli Tengah'),
(1723, 2, 'Kabupaten Tapanuli Utara'),
(1724, 2, 'Kabupaten Toba Samosir'),
(1725, 2, 'Kota Binjai'),
(1726, 2, 'Kota Gunungsitoli'),
(1727, 2, 'Kota Medan'),
(1728, 2, 'Kota Padangsidempuan'),
(1729, 2, 'Kota Pematangsiantar'),
(1730, 2, 'Kota Sibolga'),
(1731, 2, 'Kota Tanjungbalai'),
(1732, 2, 'Kota Tebing Tinggi'),
(1733, 3, 'Kabupaten Agam'),
(1734, 3, 'Kabupaten Dharmasraya'),
(1735, 3, 'Kabupaten Kepulauan Mentawai'),
(1736, 3, 'Kabupaten Lima Puluh Kota'),
(1737, 3, 'Kabupaten Padang Pariaman'),
(1738, 3, 'Kabupaten Pasaman'),
(1739, 3, 'Kabupaten Pasaman Barat'),
(1740, 3, 'Kabupaten Pesisir Selatan'),
(1741, 3, 'Kabupaten Sijunjung'),
(1742, 3, 'Kabupaten Solok'),
(1743, 3, 'Kabupaten Solok Selatan'),
(1744, 3, 'Kabupaten Tanah Datar'),
(1745, 3, 'Kota Bukittinggi'),
(1746, 3, 'Kota Padang'),
(1747, 3, 'Kota Padangpanjang'),
(1748, 3, 'Kota Pariaman'),
(1749, 3, 'Kota Payakumbuh'),
(1750, 3, 'Kota Sawahlunto'),
(1751, 3, 'Kota Solok'),
(1752, 4, 'Kabupaten Banyuasin'),
(1753, 4, 'Kabupaten Empat Lawang'),
(1754, 4, 'Kabupaten Lahat'),
(1755, 4, 'Kabupaten Muara Enim'),
(1756, 4, 'Kabupaten Musi Banyuasin'),
(1757, 4, 'Kabupaten Musi Rawas'),
(1758, 4, 'Kabupaten Musi Rawas Utara'),
(1759, 4, 'Kabupaten Ogan Ilir'),
(1760, 4, 'Kabupaten Ogan Komering Ilir'),
(1761, 4, 'Kabupaten Ogan Komering Ulu'),
(1762, 4, 'Kabupaten Ogan Komering Ulu Selatan'),
(1763, 4, 'Kabupaten Ogan Komering Ulu Timur'),
(1764, 4, 'Kabupaten Penukal Abab Lematang Ilir'),
(1765, 4, 'Kota Lubuklinggau'),
(1766, 4, 'Kota Pagar Alam'),
(1767, 4, 'Kota Palembang'),
(1768, 4, 'Kota Prabumulih'),
(1769, 5, 'Kabupaten Bengkalis'),
(1770, 5, 'Kabupaten Indragiri Hilir'),
(1771, 5, 'Kabupaten Indragiri Hulu'),
(1772, 5, 'Kabupaten Kampar'),
(1773, 5, 'Kabupaten Kepulauan Meranti'),
(1774, 5, 'Kabupaten Kuantan Singingi'),
(1775, 5, 'Kabupaten Pelalawan'),
(1776, 5, 'Kabupaten Rokan Hilir'),
(1777, 5, 'Kabupaten Rokan Hulu'),
(1778, 5, 'Kabupaten Siak'),
(1779, 5, 'Kota Dumai'),
(1780, 5, 'Kota Pekanbaru'),
(1781, 6, 'Kabupaten Bintan'),
(1782, 6, 'Kabupaten Karimun'),
(1783, 6, 'Kabupaten Kepulauan Anambas'),
(1784, 6, 'Kabupaten Lingga'),
(1785, 6, 'Kabupaten Natuna'),
(1786, 6, 'Kota Batam'),
(1787, 6, 'Kota Tanjung Pinang'),
(1788, 7, 'Kabupaten Batanghari'),
(1789, 7, 'Kabupaten Bungo'),
(1790, 7, 'Kabupaten Kerinci'),
(1791, 7, 'Kabupaten Merangin'),
(1792, 7, 'Kabupaten Muaro Jambi'),
(1793, 7, 'Kabupaten Sarolangun'),
(1794, 7, 'Kabupaten Tanjung Jabung Barat'),
(1795, 7, 'Kabupaten Tanjung Jabung Timur'),
(1796, 7, 'Kabupaten Tebo'),
(1797, 7, 'Kota Jambi'),
(1798, 7, 'Kota Sungai Penuh'),
(1799, 8, 'Kabupaten Bengkulu Selatan'),
(1800, 8, 'Kabupaten Bengkulu Tengah'),
(1801, 8, 'Kabupaten Bengkulu Utara'),
(1802, 8, 'Kabupaten Kaur'),
(1803, 8, 'Kabupaten Kepahiang'),
(1804, 8, 'Kabupaten Lebong'),
(1805, 8, 'Kabupaten Mukomuko'),
(1806, 8, 'Kabupaten Rejang Lebong'),
(1807, 8, 'Kabupaten Seluma'),
(1808, 8, 'Kota Bengkulu'),
(1809, 9, 'Kabupaten Bangka'),
(1810, 9, 'Kabupaten Bangka Barat'),
(1811, 9, 'Kabupaten Bangka Selatan'),
(1812, 9, 'Kabupaten Bangka Tengah'),
(1813, 9, 'Kabupaten Belitung'),
(1814, 9, 'Kabupaten Belitung Timur'),
(1815, 9, 'Kota Pangkal Pinang'),
(1816, 10, 'Kabupaten Lampung Tengah'),
(1817, 10, 'Kabupaten Lampung Utara'),
(1818, 10, 'Kabupaten Lampung Selatan'),
(1819, 10, 'Kabupaten Lampung Barat'),
(1820, 10, 'Kabupaten Lampung Timur'),
(1821, 10, 'Kabupaten Mesuji'),
(1822, 10, 'Kabupaten Pesawaran'),
(1823, 10, 'Kabupaten Pesisir Barat'),
(1824, 10, 'Kabupaten Pringsewu'),
(1825, 10, 'Kabupaten Tulang Bawang'),
(1826, 10, 'Kabupaten Tulang Bawang Barat'),
(1827, 10, 'Kabupaten Tanggamus'),
(1828, 10, 'Kabupaten Way Kanan'),
(1829, 10, 'Kota Bandar Lampung'),
(1830, 10, 'Kota Metro'),
(1831, 11, 'Kabupaten Lebak'),
(1832, 11, 'Kabupaten Pandeglang'),
(1833, 11, 'Kabupaten Serang'),
(1834, 11, 'Kabupaten Tangerang'),
(1835, 11, 'Kota Cilegon'),
(1836, 11, 'Kota Serang'),
(1837, 11, 'Kota Tangerang'),
(1838, 11, 'Kota Tangerang Selatan'),
(1839, 12, 'Kabupaten Bandung'),
(1840, 12, 'Kabupaten Bandung Barat'),
(1841, 12, 'Kabupaten Bekasi'),
(1842, 12, 'Kabupaten Bogor'),
(1843, 12, 'Kabupaten Ciamis'),
(1844, 12, 'Kabupaten Cianjur'),
(1845, 12, 'Kabupaten Cirebon'),
(1846, 12, 'Kabupaten Garut'),
(1847, 12, 'Kabupaten Indramayu'),
(1848, 12, 'Kabupaten Karawang'),
(1849, 12, 'Kabupaten Kuningan'),
(1850, 12, 'Kabupaten Majalengka'),
(1851, 12, 'Kabupaten Pangandaran'),
(1852, 12, 'Kabupaten Purwakarta'),
(1853, 12, 'Kabupaten Subang'),
(1854, 12, 'Kabupaten Sukabumi'),
(1855, 12, 'Kabupaten Sumedang'),
(1856, 12, 'Kabupaten Tasikmalaya'),
(1857, 12, 'Kota Bandung'),
(1858, 12, 'Kota Banjar'),
(1859, 12, 'Kota Bekasi'),
(1860, 12, 'Kota Bogor'),
(1861, 12, 'Kota Cimahi'),
(1862, 12, 'Kota Cirebon'),
(1863, 12, 'Kota Depok'),
(1864, 12, 'Kota Sukabumi'),
(1865, 12, 'Kota Tasikmalaya'),
(1866, 13, 'Kabupaten Banjarnegara'),
(1867, 13, 'Kabupaten Banyumas'),
(1868, 13, 'Kabupaten Batang'),
(1869, 13, 'Kabupaten Blora'),
(1870, 13, 'Kabupaten Boyolali'),
(1871, 13, 'Kabupaten Brebes'),
(1872, 13, 'Kabupaten Cilacap'),
(1873, 13, 'Kabupaten Demak'),
(1874, 13, 'Kabupaten Grobogan'),
(1875, 13, 'Kabupaten Jepara'),
(1876, 13, 'Kabupaten Karanganyar'),
(1877, 13, 'Kabupaten Kebumen'),
(1878, 13, 'Kabupaten Kendal'),
(1879, 13, 'Kabupaten Klaten'),
(1880, 13, 'Kabupaten Kudus'),
(1881, 13, 'Kabupaten Magelang'),
(1882, 13, 'Kabupaten Pati'),
(1883, 13, 'Kabupaten Pekalongan'),
(1884, 13, 'Kabupaten Pemalang'),
(1885, 13, 'Kabupaten Purbalingga'),
(1886, 13, 'Kabupaten Purworejo'),
(1887, 13, 'Kabupaten Rembang'),
(1888, 13, 'Kabupaten Semarang'),
(1889, 13, 'Kabupaten Sragen'),
(1890, 13, 'Kabupaten Sukoharjo'),
(1891, 13, 'Kabupaten Tegal'),
(1892, 13, 'Kabupaten Temanggung'),
(1893, 13, 'Kabupaten Wonogiri'),
(1894, 13, 'Kabupaten Wonosobo'),
(1895, 13, 'Kota Magelang'),
(1896, 13, 'Kota Pekalongan'),
(1897, 13, 'Kota Salatiga'),
(1898, 13, 'Kota Semarang'),
(1899, 13, 'Kota Surakarta'),
(1900, 13, 'Kota Tegal'),
(1901, 14, 'Kabupaten Bangkalan'),
(1902, 14, 'Kabupaten Banyuwangi'),
(1903, 14, 'Kabupaten Blitar'),
(1904, 14, 'Kabupaten Bojonegoro'),
(1905, 14, 'Kabupaten Bondowoso'),
(1906, 14, 'Kabupaten Gresik'),
(1907, 14, 'Kabupaten Jember'),
(1908, 14, 'Kabupaten Jombang'),
(1909, 14, 'Kabupaten Kediri'),
(1910, 14, 'Kabupaten Lamongan'),
(1911, 14, 'Kabupaten Lumajang'),
(1912, 14, 'Kabupaten Madiun'),
(1913, 14, 'Kabupaten Magetan'),
(1914, 14, 'Kabupaten Malang'),
(1915, 14, 'Kabupaten Mojokerto'),
(1916, 14, 'Kabupaten Nganjuk'),
(1917, 14, 'Kabupaten Ngawi'),
(1918, 14, 'Kabupaten Pacitan'),
(1919, 14, 'Kabupaten Pamekasan'),
(1920, 14, 'Kabupaten Pasuruan'),
(1921, 14, 'Kabupaten Ponorogo'),
(1922, 14, 'Kabupaten Probolinggo'),
(1923, 14, 'Kabupaten Sampang'),
(1924, 14, 'Kabupaten Sidoarjo'),
(1925, 14, 'Kabupaten Situbondo'),
(1926, 14, 'Kabupaten Sumenep'),
(1927, 14, 'Kabupaten Trenggalek'),
(1928, 14, 'Kabupaten Tuban'),
(1929, 14, 'Kabupaten Tulungagung'),
(1930, 14, 'Kota Batu'),
(1931, 14, 'Kota Blitar'),
(1932, 14, 'Kota Kediri'),
(1933, 14, 'Kota Madiun'),
(1934, 14, 'Kota Malang'),
(1935, 14, 'Kota Mojokerto'),
(1936, 14, 'Kota Pasuruan'),
(1937, 14, 'Kota Probolinggo'),
(1938, 14, 'Kota Surabaya'),
(1939, 15, 'Kota Administrasi Jakarta Barat'),
(1940, 15, 'Kota Administrasi Jakarta Pusat'),
(1941, 15, 'Kota Administrasi Jakarta Selatan'),
(1942, 15, 'Kota Administrasi Jakarta Timur'),
(1943, 15, 'Kota Administrasi Jakarta Utara'),
(1944, 15, 'Kabupaten Administrasi Kepulauan Seribu'),
(1945, 16, 'Kabupaten Bantul'),
(1946, 16, 'Kabupaten Gunungkidul'),
(1947, 16, 'Kabupaten Kulon Progo'),
(1948, 16, 'Kabupaten Sleman'),
(1949, 16, 'Kota Yogyakarta'),
(1950, 17, 'Kabupaten Badung'),
(1951, 17, 'Kabupaten Bangli'),
(1952, 17, 'Kabupaten Buleleng'),
(1953, 17, 'Kabupaten Gianyar'),
(1954, 17, 'Kabupaten Jembrana'),
(1955, 17, 'Kabupaten Karangasem'),
(1956, 17, 'Kabupaten Klungkung'),
(1957, 17, 'Kabupaten Tabanan'),
(1958, 17, 'Kota Denpasar'),
(1959, 18, 'Kabupaten Bima'),
(1960, 18, 'Kabupaten Dompu'),
(1961, 18, 'Kabupaten Lombok Barat'),
(1962, 18, 'Kabupaten Lombok Tengah'),
(1963, 18, 'Kabupaten Lombok Timur'),
(1964, 18, 'Kabupaten Lombok Utara'),
(1965, 18, 'Kabupaten Sumbawa'),
(1966, 18, 'Kabupaten Sumbawa Barat'),
(1967, 18, 'Kota Bima'),
(1968, 18, 'Kota Mataram'),
(1969, 19, 'Kabupaten Alor'),
(1970, 19, 'Kabupaten Belu'),
(1971, 19, 'Kabupaten Ende'),
(1972, 19, 'Kabupaten Flores Timur'),
(1973, 19, 'Kabupaten Kupang'),
(1974, 19, 'Kabupaten Lembata'),
(1975, 19, 'Kabupaten Malaka'),
(1976, 19, 'Kabupaten Manggarai'),
(1977, 19, 'Kabupaten Manggarai Barat'),
(1978, 19, 'Kabupaten Manggarai Timur'),
(1979, 19, 'Kabupaten Ngada'),
(1980, 19, 'Kabupaten Nagekeo'),
(1981, 19, 'Kabupaten Rote Ndao'),
(1982, 19, 'Kabupaten Sabu Raijua'),
(1983, 19, 'Kabupaten Sikka'),
(1984, 19, 'Kabupaten Sumba Barat'),
(1985, 19, 'Kabupaten Sumba Barat Daya'),
(1986, 19, 'Kabupaten Sumba Tengah'),
(1987, 19, 'Kabupaten Sumba Timur'),
(1988, 19, 'Kabupaten Timor Tengah Selatan'),
(1989, 19, 'Kabupaten Timor Tengah Utara'),
(1990, 19, 'Kota Kupang'),
(1991, 20, 'Kabupaten Bengkayang'),
(1992, 20, 'Kabupaten Kapuas Hulu'),
(1993, 20, 'Kabupaten Kayong Utara'),
(1994, 20, 'Kabupaten Ketapang'),
(1995, 20, 'Kabupaten Kubu Raya'),
(1996, 20, 'Kabupaten Landak'),
(1997, 20, 'Kabupaten Melawi'),
(1998, 20, 'Kabupaten Mempawah'),
(1999, 20, 'Kabupaten Sambas'),
(2000, 20, 'Kabupaten Sanggau'),
(2001, 20, 'Kabupaten Sekadau'),
(2002, 20, 'Kabupaten Sintang'),
(2003, 20, 'Kota Pontianak'),
(2004, 20, 'Kota Singkawang'),
(2005, 21, 'Kabupaten Balangan'),
(2006, 21, 'Kabupaten Banjar'),
(2007, 21, 'Kabupaten Barito Kuala'),
(2008, 21, 'Kabupaten Hulu Sungai Selatan'),
(2009, 21, 'Kabupaten Hulu Sungai Tengah'),
(2010, 21, 'Kabupaten Hulu Sungai Utara'),
(2011, 21, 'Kabupaten Kotabaru'),
(2012, 21, 'Kabupaten Tabalong'),
(2013, 21, 'Kabupaten Tanah Bumbu'),
(2014, 21, 'Kabupaten Tanah Laut'),
(2015, 21, 'Kabupaten Tapin'),
(2016, 21, 'Kota Banjarbaru'),
(2017, 21, 'Kota Banjarmasin'),
(2018, 22, 'Kabupaten Barito Selatan'),
(2019, 22, 'Kabupaten Barito Timur'),
(2020, 22, 'Kabupaten Barito Utara'),
(2021, 22, 'Kabupaten Gunung Mas'),
(2022, 22, 'Kabupaten Kapuas'),
(2023, 22, 'Kabupaten Katingan'),
(2024, 22, 'Kabupaten Kotawaringin Barat'),
(2025, 22, 'Kabupaten Kotawaringin Timur'),
(2026, 22, 'Kabupaten Lamandau'),
(2027, 22, 'Kabupaten Murung Raya'),
(2028, 22, 'Kabupaten Pulang Pisau'),
(2029, 22, 'Kabupaten Sukamara'),
(2030, 22, 'Kabupaten Seruyan'),
(2031, 22, 'Kota Palangka Raya'),
(2032, 23, 'Kabupaten Berau'),
(2033, 23, 'Kabupaten Kutai Barat'),
(2034, 23, 'Kabupaten Kutai Kartanegara'),
(2035, 23, 'Kabupaten Kutai Timur'),
(2036, 23, 'Kabupaten Mahakam Ulu'),
(2037, 23, 'Kabupaten Paser'),
(2038, 23, 'Kabupaten Penajam Paser Utara'),
(2039, 23, 'Kota Balikpapan'),
(2040, 23, 'Kota Bontang'),
(2041, 23, 'Kota Samarinda'),
(2042, 24, 'Kabupaten Bulungan'),
(2043, 24, 'Kabupaten Malinau'),
(2044, 24, 'Kabupaten Nunukan'),
(2045, 24, 'Kabupaten Tana Tidung'),
(2046, 24, 'Kota Tarakan'),
(2047, 25, 'Kabupaten Boalemo'),
(2048, 25, 'Kabupaten Bone Bolango'),
(2049, 25, 'Kabupaten Gorontalo'),
(2050, 25, 'Kabupaten Gorontalo Utara'),
(2051, 25, 'Kabupaten Pohuwato'),
(2052, 25, 'Kota Gorontalo'),
(2053, 26, 'Kabupaten Bantaeng'),
(2054, 26, 'Kabupaten Barru'),
(2055, 26, 'Kabupaten Bone'),
(2056, 26, 'Kabupaten Bulukumba'),
(2057, 26, 'Kabupaten Enrekang'),
(2058, 26, 'Kabupaten Gowa'),
(2059, 26, 'Kabupaten Jeneponto'),
(2060, 26, 'Kabupaten Kepulauan Selayar'),
(2061, 26, 'Kabupaten Luwu'),
(2062, 26, 'Kabupaten Luwu Timur'),
(2063, 26, 'Kabupaten Luwu Utara'),
(2064, 26, 'Kabupaten Maros'),
(2065, 26, 'Kabupaten Pangkajene dan Kepulauan'),
(2066, 26, 'Kabupaten Pinrang'),
(2067, 26, 'Kabupaten Sidenreng Rappang'),
(2068, 26, 'Kabupaten Sinjai'),
(2069, 26, 'Kabupaten Soppeng'),
(2070, 26, 'Kabupaten Takalar'),
(2071, 26, 'Kabupaten Tana Toraja'),
(2072, 26, 'Kabupaten Toraja Utara'),
(2073, 26, 'Kabupaten Wajo'),
(2074, 26, 'Kota Makassar'),
(2075, 26, 'Kota Palopo'),
(2076, 26, 'Kota Parepare'),
(2077, 27, 'Kabupaten Bombana'),
(2078, 27, 'Kabupaten Buton'),
(2079, 27, 'Kabupaten Buton Selatan'),
(2080, 27, 'Kabupaten Buton Tengah'),
(2081, 27, 'Kabupaten Buton Utara'),
(2082, 27, 'Kabupaten Kolaka'),
(2083, 27, 'Kabupaten Kolaka Timur'),
(2084, 27, 'Kabupaten Kolaka Utara'),
(2085, 27, 'Kabupaten Konawe'),
(2086, 27, 'Kabupaten Konawe Kepulauan'),
(2087, 27, 'Kabupaten Konawe Selatan'),
(2088, 27, 'Kabupaten Konawe Utara'),
(2089, 27, 'Kabupaten Muna'),
(2090, 27, 'Kabupaten Muna Barat'),
(2091, 27, 'Kabupaten Wakatobi'),
(2092, 27, 'Kota Bau-Bau'),
(2093, 27, 'Kota Kendari'),
(2094, 28, 'Kabupaten Banggai'),
(2095, 28, 'Kabupaten Banggai Kepulauan'),
(2096, 28, 'Kabupaten Banggai Laut'),
(2097, 28, 'Kabupaten Buol'),
(2098, 28, 'Kabupaten Donggala'),
(2099, 28, 'Kabupaten Morowali'),
(2100, 28, 'Kabupaten Morowali Utara'),
(2101, 28, 'Kabupaten Parigi Moutong'),
(2102, 28, 'Kabupaten Poso'),
(2103, 28, 'Kabupaten Sigi'),
(2104, 28, 'Kabupaten Tojo Una-Una'),
(2105, 28, 'Kabupaten Toli-Toli'),
(2106, 28, 'Kota Palu'),
(2107, 29, 'Kabupaten Bolaang Mongondow'),
(2108, 29, 'Kabupaten Bolaang Mongondow Selatan'),
(2109, 29, 'Kabupaten Bolaang Mongondow Timur'),
(2110, 29, 'Kabupaten Bolaang Mongondow Utara'),
(2111, 29, 'Kabupaten Kepulauan Sangihe'),
(2112, 29, 'Kabupaten Kepulauan Siau Tagulandang Biaro'),
(2113, 29, 'Kabupaten Kepulauan Talaud'),
(2114, 29, 'Kabupaten Minahasa'),
(2115, 29, 'Kabupaten Minahasa Selatan'),
(2116, 29, 'Kabupaten Minahasa Tenggara'),
(2117, 29, 'Kabupaten Minahasa Utara'),
(2118, 29, 'Kota Bitung'),
(2119, 29, 'Kota Kotamobagu'),
(2120, 29, 'Kota Manado'),
(2121, 29, 'Kota Tomohon'),
(2122, 30, 'Kabupaten Majene'),
(2123, 30, 'Kabupaten Mamasa'),
(2124, 30, 'Kabupaten Mamuju'),
(2125, 30, 'Kabupaten Mamuju Tengah'),
(2126, 30, 'Kabupaten Mamuju Utara'),
(2127, 30, 'Kabupaten Polewali Mandar'),
(2128, 30, 'Kota Mamuju'),
(2129, 31, 'Kabupaten Buru'),
(2130, 31, 'Kabupaten Buru Selatan'),
(2131, 31, 'Kabupaten Kepulauan Aru'),
(2132, 31, 'Kabupaten Maluku Barat Daya'),
(2133, 31, 'Kabupaten Maluku Tengah'),
(2134, 31, 'Kabupaten Maluku Tenggara'),
(2135, 31, 'Kabupaten Maluku Tenggara Barat'),
(2136, 31, 'Kabupaten Seram Bagian Barat'),
(2137, 31, 'Kabupaten Seram Bagian Timur'),
(2138, 31, 'Kota Ambon'),
(2139, 31, 'Kota Tual'),
(2140, 32, 'Kabupaten Halmahera Barat'),
(2141, 32, 'Kabupaten Halmahera Tengah'),
(2142, 32, 'Kabupaten Halmahera Utara'),
(2143, 32, 'Kabupaten Halmahera Selatan'),
(2144, 32, 'Kabupaten Kepulauan Sula'),
(2145, 32, 'Kabupaten Halmahera Timur'),
(2146, 32, 'Kabupaten Pulau Morotai'),
(2147, 32, 'Kabupaten Pulau Taliabu'),
(2148, 32, 'Kota Ternate'),
(2149, 32, 'Kota Tidore Kepulauan'),
(2150, 33, 'Kabupaten Asmat'),
(2151, 33, 'Kabupaten Biak Numfor'),
(2152, 33, 'Kabupaten Boven Digoel'),
(2153, 33, 'Kabupaten Deiyai'),
(2154, 33, 'Kabupaten Dogiyai'),
(2155, 33, 'Kabupaten Intan Jaya'),
(2156, 33, 'Kabupaten Jayapura'),
(2157, 33, 'Kabupaten Jayawijaya'),
(2158, 33, 'Kabupaten Keerom'),
(2159, 33, 'Kabupaten Kepulauan Yapen'),
(2160, 33, 'Kabupaten Lanny Jaya'),
(2161, 33, 'Kabupaten Mamberamo Raya'),
(2162, 33, 'Kabupaten Mamberamo Tengah'),
(2163, 33, 'Kabupaten Mappi'),
(2164, 33, 'Kabupaten Merauke'),
(2165, 33, 'Kabupaten Mimika'),
(2166, 33, 'Kabupaten Nabire'),
(2167, 33, 'Kabupaten Nduga'),
(2168, 33, 'Kabupaten Paniai'),
(2169, 33, 'Kabupaten Pegunungan Bintang'),
(2170, 33, 'Kabupaten Puncak'),
(2171, 33, 'Kabupaten Puncak Jaya'),
(2172, 33, 'Kabupaten Sarmi'),
(2173, 33, 'Kabupaten Supiori'),
(2174, 33, 'Kabupaten Tolikara'),
(2175, 33, 'Kabupaten Waropen'),
(2176, 33, 'Kabupaten Yahukimo'),
(2177, 33, 'Kabupaten Yalimo'),
(2178, 33, 'Kota Jayapura'),
(2179, 34, 'Kabupaten Fakfak'),
(2180, 34, 'Kabupaten Kaimana'),
(2181, 34, 'Kabupaten Manokwari'),
(2182, 34, 'Kabupaten Manokwari Selatan'),
(2183, 34, 'Kabupaten Maybrat'),
(2184, 34, 'Kabupaten Pegunungan Arfak'),
(2185, 34, 'Kabupaten Raja Ampat'),
(2186, 34, 'Kabupaten Sorong'),
(2187, 34, 'Kabupaten Sorong Selatan'),
(2188, 34, 'Kabupaten Tambrauw'),
(2189, 34, 'Kabupaten Teluk Bintuni'),
(2190, 34, 'Kabupaten Teluk Wondama');

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE `khs` (
  `id_khs` varchar(6) NOT NULL,
  `semester_aktif` int(20) DEFAULT NULL,
  `jumlah_sks_semester` int(30) DEFAULT NULL,
  `jumlah_sks_kumulatif` int(150) DEFAULT NULL,
  `ip_semester` double DEFAULT NULL,
  `ip_kumulatif` double DEFAULT NULL,
  `nim_mahasiswa_fk` varchar(14) DEFAULT NULL,
  `dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khs`
--

INSERT INTO `khs` (`id_khs`, `semester_aktif`, `jumlah_sks_semester`, `jumlah_sks_kumulatif`, `ip_semester`, `ip_kumulatif`, `nim_mahasiswa_fk`, `dokumen`) VALUES
('100041', 1, 21, 109, 3.71, 3.59, '24060130431234', ''),
('100042', 2, 24, 109, 3.71, 3.59, '24060130431234', ''),
('100043', 3, 24, 109, 3.71, 3.59, '24060130431234', ''),
('100044', 4, 21, 109, 3.14, 3.59, '24060130431234', ''),
('100045', 5, 19, 109, 3.68, 3.59, '24060130431234', ''),
('KHS001', 2, 23, 56, 3.2, 3.12, '24060130432172', ''),
('KHS002', 1, 23, 23, 3.12, 3.12, '24060130432172', ''),
('KHS005', 1, 23, 23, 3.55, 3.55, '24060130431000', ''),
('KHS008', 3, 18, 46, 3.12, 3.12, '24060130432172', 'Muhammad_UTSPPLA.pdf');

--
-- Triggers `khs`
--
DELIMITER $$
CREATE TRIGGER `add_id_khs1` BEFORE INSERT ON `khs` FOR EACH ROW INSERT INTO khs_seq VALUES (NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `add_id_khs2` BEFORE INSERT ON `khs` FOR EACH ROW SET NEW.id_khs = CONCAT('KHS', LPAD(LAST_INSERT_ID(), 3, '0'))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `khs_seq`
--

CREATE TABLE `khs_seq` (
  `id_khs` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khs_seq`
--

INSERT INTO `khs_seq` (`id_khs`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(14) NOT NULL,
  `nama` char(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` char(50) DEFAULT NULL,
  `provinsi` char(50) DEFAULT NULL,
  `angkatan` int(4) DEFAULT NULL,
  `jalur_masuk` char(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `no_handphone` varchar(13) DEFAULT NULL,
  `status` char(20) DEFAULT NULL,
  `dosen_wali` char(50) DEFAULT NULL,
  `id_pkl_fk` varchar(6) DEFAULT NULL,
  `id_skripsi_fk` varchar(6) DEFAULT NULL,
  `semester` int(100) NOT NULL,
  `id_provinsi_fk` int(10) DEFAULT NULL,
  `id_kota_fk` int(10) DEFAULT NULL,
  `id_user_fk` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `kota`, `provinsi`, `angkatan`, `jalur_masuk`, `email`, `no_handphone`, `status`, `dosen_wali`, `id_pkl_fk`, `id_skripsi_fk`, `semester`, `id_provinsi_fk`, `id_kota_fk`, `id_user_fk`) VALUES
('24060130431000', 'haaland', 'Tembalang', 'Kabupaten Bengkalis', 'Riau', 2022, 'SBMPTN', 'haaland@gmail.com', '081234567', 'AKTIF', 'DOSEN1', 'PKL012', 'SKR006', 1, 5, 1769, 18),
('24060130431234', 'neymar', 'Tembalang', 'Kabupaten Bandung', 'Jawa Barat (JABAR)', 2020, 'SNMPTN', 'neymar@gmail.com', '081358624', 'AKTIF', 'DOSEN1', 'PKL007', 'SKR001', 5, 12, 1839, 15),
('24060130432172', 'Lebron', 'Ungaran', 'Kabupaten Sarolangun', 'Jambi', 2022, 'SNMPTN', 'lebron@gmail.com', '097123812314', NULL, 'DOSEN1', 'PKL014', 'SKR008', 1, 7, 1793, NULL),
('24060130432177', 'maradona', 'Tembalang', NULL, NULL, 1998, 'MANDIRI', 'maradona', '082564938', 'LULUS', 'DOSEN3', 'PKL007', 'SKR001', 8, NULL, NULL, NULL),
('24060130432193', 'Messi', 'Tembalang', NULL, NULL, 2021, 'LAINNYA', 'messi@gmail.com', '082321453', 'AKTIF', 'DOSEN4', 'PKL007', 'SKR001', 3, NULL, NULL, 14),
('24060130432198', 'Veratti', NULL, NULL, NULL, 2022, NULL, 'veratti@gmail.com', NULL, NULL, 'dosen3', 'PKL013', 'SKR007', 0, NULL, NULL, NULL),
('24060138012133', 'Ronaldo', 'Tembalang', NULL, NULL, 2020, 'LAINNYA', 'ronaldo@gmail.com', '081256434', 'AKTIF', 'DOSEN3', 'PKL007', 'SKR001', 5, NULL, NULL, 13);

-- --------------------------------------------------------

--
-- Table structure for table `pkl`
--

CREATE TABLE `pkl` (
  `id_pkl` varchar(6) NOT NULL DEFAULT '0',
  `status_pkl` varchar(20) DEFAULT 'Belum Ambil',
  `nilai_pkl` varchar(100) DEFAULT '-',
  `nim_mahasiswa_fk` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pkl`
--

INSERT INTO `pkl` (`id_pkl`, `status_pkl`, `nilai_pkl`, `nim_mahasiswa_fk`) VALUES
('PKL007', 'Sedang Ambil', '', '24060138012133'),
('PKL009', 'Belum Ambil', '-', '24060130432177'),
('PKL010', 'Belum Ambil', '-', '24060130431234'),
('PKL012', 'Lulus', '90', '24060130431000'),
('PKL013', 'Belum Ambil', '-', '24060130432198'),
('PKL014', 'Sedang Ambil', '', '24060130432172');

--
-- Triggers `pkl`
--
DELIMITER $$
CREATE TRIGGER `add_id_pkl1` BEFORE INSERT ON `pkl` FOR EACH ROW INSERT INTO pkl_seq VALUES (NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `add_id_pkl2` BEFORE INSERT ON `pkl` FOR EACH ROW SET NEW.id_pkl = CONCAT('PKL', LPAD(LAST_INSERT_ID(), 3, '0'))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pkl_seq`
--

CREATE TABLE `pkl_seq` (
  `id_pkl` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pkl_seq`
--

INSERT INTO `pkl_seq` (`id_pkl`) VALUES
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'NAD Aceh '),
(2, 'Sumatera Utara (SUMUT)'),
(3, 'Sumatera Barat (SUMBAR)'),
(4, 'Sumatera Selatan (SUMSEL)'),
(5, 'Riau'),
(6, 'Kepulauan Riau (KEPRI)'),
(7, 'Jambi'),
(8, 'Bengkulu'),
(9, 'Bangka Belitung (BABEL)'),
(10, 'Lampung'),
(11, 'Banten'),
(12, 'Jawa Barat (JABAR)'),
(13, 'Jawa Tengah (JATENG)'),
(14, 'Jawa Timur (JATIM)'),
(15, 'DKI Jakarta'),
(16, 'Daerah Istimewa Yogyakarta'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat (NTB)'),
(19, 'Nusa Tenggara Timur (NTT)'),
(20, 'Kalimantan Barat (KALBAR)'),
(21, 'Kalimantan Selatan (KALSEL)'),
(22, 'Kalimantan Tengah (KALTENG)'),
(23, 'Kalimantan Timur (KALTIM)'),
(24, 'Kalimantan Utara (KALTARA)'),
(25, 'Gorontalo'),
(26, 'Sulawesi Selatan (SULSEL)'),
(27, 'Sulawesi Tenggara (SULTRA)'),
(28, 'Sulawesi Tengah (SULTENG)'),
(29, 'Sulawesi Utara (SULUT)'),
(30, 'Sulawesi Barat (SULBAR)'),
(31, 'Maluku'),
(32, 'Maluku Utara'),
(33, 'Papua'),
(34, 'Papua Barat');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `id_skripsi` varchar(6) NOT NULL DEFAULT '0',
  `status_skripsi` varchar(20) DEFAULT 'Belum Ambil',
  `tanggal_lulus` date DEFAULT NULL,
  `lama_studi` int(20) DEFAULT NULL,
  `nilai_skripsi` varchar(100) DEFAULT '-',
  `nim_mahasiswa_fk` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`id_skripsi`, `status_skripsi`, `tanggal_lulus`, `lama_studi`, `nilai_skripsi`, `nim_mahasiswa_fk`) VALUES
('SKR001', 'Belum Ambil', '0000-00-00', 0, '', '24060138012133'),
('SKR002', 'Belum Ambil', NULL, NULL, '-', '24060130432193'),
('SKR003', 'Belum Ambil', NULL, NULL, '-', '24060130432177'),
('SKR004', 'Belum Ambil', NULL, NULL, '-', '24060130431234'),
('SKR006', 'Belum Ambil', '0000-00-00', 0, '', '24060130431000'),
('SKR007', 'Belum Ambil', NULL, NULL, '-', '24060130432198'),
('SKR008', 'Belum Ambil', NULL, NULL, '-', '24060130432172');

--
-- Triggers `skripsi`
--
DELIMITER $$
CREATE TRIGGER `add_id_skripsi1` BEFORE INSERT ON `skripsi` FOR EACH ROW INSERT INTO skripsi_seq VALUES (NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `add_id_skripsi2` BEFORE INSERT ON `skripsi` FOR EACH ROW SET NEW.id_skripsi = CONCAT('SKR', LPAD(LAST_INSERT_ID(), 3, '0'))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_seq`
--

CREATE TABLE `skripsi_seq` (
  `id_skripsi` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi_seq`
--

INSERT INTO `skripsi_seq` (`id_skripsi`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `level`) VALUES
(1, 'dosen1', 'dosen1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'dosen'),
(3, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(13, 'Ronaldo', 'ronaldo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'mahasiswa'),
(14, 'Messi', 'messi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'mahasiswa'),
(15, 'neymar', 'neymar@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'mahasiswa'),
(18, 'haaland', 'haaland@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'mahasiswa'),
(19, 'Veratti', 'veratti@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'mahasiswa'),
(20, 'Lebron', 'lebron@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'mahasiswa'),
(21, 'departemen1', 'departemen1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'departemen'),
(24, 'dosen3', 'dosen3@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'dosen');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi`
--

CREATE TABLE `verifikasi` (
  `id_verifikasi` int(6) NOT NULL,
  `nim_verifikasi` varchar(14) NOT NULL,
  `nama_verifikasi` varchar(50) NOT NULL,
  `tipe_verifikasi` varchar(20) NOT NULL,
  `status_verifikasi` varchar(50) NOT NULL DEFAULT 'BELUM TERVERIFIKASI'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verifikasi`
--

INSERT INTO `verifikasi` (`id_verifikasi`, `nim_verifikasi`, `nama_verifikasi`, `tipe_verifikasi`, `status_verifikasi`) VALUES
(1, '24060130432172', 'Lebron', 'PKL', 'BELUM TERVERIFIKASI'),
(4, '24060130431000', 'haaland', 'Skripsi', 'SUDAH TERVERIFIKASI'),
(5, '24060130431000', 'haaland', 'IRS', 'SUDAH TERVERIFIKASI'),
(6, '24060130431000', 'haaland', 'KHS', 'BELUM TERVERIFIKASI'),
(7, '24060130431000', 'haaland', 'KHS', 'BELUM TERVERIFIKASI'),
(8, '24060130432172', 'Lebron', 'IRS', 'BELUM TERVERIFIKASI'),
(9, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(10, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(11, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(12, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(13, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(14, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(15, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(16, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(17, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(18, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(19, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(20, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(21, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(22, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(23, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(24, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(25, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(26, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(27, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(28, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(29, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(30, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(31, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(32, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(33, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(34, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(35, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(36, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(37, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(38, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(39, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(40, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(41, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(42, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(43, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(44, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(45, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(46, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(47, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(48, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(49, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(50, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(51, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(52, '24060130431234', 'neymar', 'IRS', 'BELUM TERVERIFIKASI'),
(53, '24060130432172', 'Lebron', 'IRS', 'BELUM TERVERIFIKASI'),
(54, '24060130432172', 'Lebron', 'KHS', 'BELUM TERVERIFIKASI'),
(55, '24060130432172', 'Lebron', 'IRS', 'BELUM TERVERIFIKASI'),
(56, '24060130432172', 'Lebron', 'IRS', 'BELUM TERVERIFIKASI'),
(57, '24060130432172', 'Lebron', 'IRS', 'BELUM TERVERIFIKASI'),
(58, '24060130432172', 'Lebron', 'IRS', 'BELUM TERVERIFIKASI'),
(59, '24060130432172', 'Lebron', 'KHS', 'BELUM TERVERIFIKASI'),
(60, '24060130432172', 'Lebron', 'KHS', 'BELUM TERVERIFIKASI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `irs`
--
ALTER TABLE `irs`
  ADD PRIMARY KEY (`id_irs`),
  ADD KEY `nim_mahasiswa_fk` (`nim_mahasiswa_fk`) USING BTREE;

--
-- Indexes for table `irs_seq`
--
ALTER TABLE `irs_seq`
  ADD PRIMARY KEY (`id_irs`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kota`),
  ADD KEY `id_provinsi` (`id_provinsi_fk`);

--
-- Indexes for table `khs`
--
ALTER TABLE `khs`
  ADD PRIMARY KEY (`id_khs`),
  ADD KEY `nim_mahasiswa_fk` (`nim_mahasiswa_fk`) USING BTREE;

--
-- Indexes for table `khs_seq`
--
ALTER TABLE `khs_seq`
  ADD PRIMARY KEY (`id_khs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_pkl_mahasiswa` (`id_pkl_fk`),
  ADD KEY `id_skripsi_mahasiswa` (`id_skripsi_fk`),
  ADD KEY `fk_provinsi` (`id_provinsi_fk`),
  ADD KEY `fk_kota` (`id_kota_fk`),
  ADD KEY `fk_user` (`id_user_fk`);

--
-- Indexes for table `pkl`
--
ALTER TABLE `pkl`
  ADD PRIMARY KEY (`id_pkl`),
  ADD KEY `nim_pkl` (`nim_mahasiswa_fk`);

--
-- Indexes for table `pkl_seq`
--
ALTER TABLE `pkl_seq`
  ADD PRIMARY KEY (`id_pkl`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id_skripsi`),
  ADD KEY `nim_skripsi` (`nim_mahasiswa_fk`);

--
-- Indexes for table `skripsi_seq`
--
ALTER TABLE `skripsi_seq`
  ADD PRIMARY KEY (`id_skripsi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`id_verifikasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `irs_seq`
--
ALTER TABLE `irs_seq`
  MODIFY `id_irs` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2191;

--
-- AUTO_INCREMENT for table `khs_seq`
--
ALTER TABLE `khs_seq`
  MODIFY `id_khs` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pkl_seq`
--
ALTER TABLE `pkl_seq`
  MODIFY `id_pkl` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `skripsi_seq`
--
ALTER TABLE `skripsi_seq`
  MODIFY `id_skripsi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `id_verifikasi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `irs`
--
ALTER TABLE `irs`
  ADD CONSTRAINT `nim_mahasiswa_fk` FOREIGN KEY (`nim_mahasiswa_fk`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`id_provinsi_fk`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE CASCADE;

--
-- Constraints for table `khs`
--
ALTER TABLE `khs`
  ADD CONSTRAINT `nim_mhs_fk` FOREIGN KEY (`nim_mahasiswa_fk`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_kota` FOREIGN KEY (`id_kota_fk`) REFERENCES `kabupaten` (`id_kota`),
  ADD CONSTRAINT `fk_provinsi` FOREIGN KEY (`id_provinsi_fk`) REFERENCES `provinsi` (`id_provinsi`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user_fk`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_pkl_mahasiswa` FOREIGN KEY (`id_pkl_fk`) REFERENCES `pkl` (`id_pkl`),
  ADD CONSTRAINT `id_skripsi_mahasiswa` FOREIGN KEY (`id_skripsi_fk`) REFERENCES `skripsi` (`id_skripsi`);

--
-- Constraints for table `pkl`
--
ALTER TABLE `pkl`
  ADD CONSTRAINT `nim_pkl` FOREIGN KEY (`nim_mahasiswa_fk`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `nim_skripsi` FOREIGN KEY (`nim_mahasiswa_fk`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
