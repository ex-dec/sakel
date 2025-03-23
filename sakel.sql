CREATE TABLE role (
    role_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nama_role VARCHAR(50) NOT NULL -- "admin" atau "ketua kelas"
);

CREATE TABLE user (
    user_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nama_user VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INTEGER NOT NULL,
    FOREIGN KEY (role_id) REFERENCES role(role_id)
);

CREATE TABLE kelas (
    kelas_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nama_kelas VARCHAR(100) NOT NULL,
    user_id INTEGER NOT NULL, -- Ketua kelas yang bertanggung jawab atas kelas ini
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE siswa (
    siswa_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nama_siswa VARCHAR(100) NOT NULL,
    nisn VARCHAR(20) UNIQUE NOT NULL,
    tanggal_lahir DATE NOT NULL,
    kelas_id INTEGER NOT NULL,
    FOREIGN KEY (kelas_id) REFERENCES kelas(kelas_id)
);

CREATE TABLE absensi (
    presensi_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Tanggal otomatis
    status_presensi ENUM('Hadir', 'Izin', 'Sakit', 'Alpa') NOT NULL,
    kelas_id INTEGER NOT NULL, -- Presensi dilakukan per kelas
    user_id INTEGER NOT NULL, -- Ketua kelas yang melakukan presensi
    FOREIGN KEY (kelas_id) REFERENCES kelas(kelas_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE mapel (
    mapel_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nama_mapel VARCHAR(100) NOT NULL,
    user_id INTEGER NOT NULL, -- Guru mapel tetap dari user
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE materi (
    materi_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nama_materi VARCHAR(100) NOT NULL,
    link_materi VARCHAR(255) NOT NULL,
    deskripsi_materi TEXT NOT NULL,
    mapel_id INTEGER NOT NULL,
    FOREIGN KEY (mapel_id) REFERENCES mapel(mapel_id)
);

CREATE TABLE tugas (
    tugas_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nama_tugas VARCHAR(100) NOT NULL, 
    deskripsi_tugas TEXT NOT NULL,
    mapel_id INTEGER NOT NULL,
    FOREIGN KEY (mapel_id) REFERENCES mapel(mapel_id)
);

CREATE TABLE pengumpulan_tugas (
    submit_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    file_upload VARCHAR(255) NOT NULL, -- Path file tugas
    tugas_id INTEGER NOT NULL,
    user_id INTEGER NOT NULL, -- Ketua kelas yang mengumpulkan tugas
    FOREIGN KEY (tugas_id) REFERENCES tugas(tugas_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);
