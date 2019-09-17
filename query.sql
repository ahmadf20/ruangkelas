create database ruangkelas;
use ruangkelas;
create table akun (
    USERNAME varchar(12) not null,
    PASSWORD varchar(20) not null,
    KODEUSER varchar(12) not null,
    EMAIL varchar(30) not null,
    FOTO varchar(200) not null,
    TIPE varchar(10)not null,
    PRIMARY KEY (USERNAME)
);
create table mahasiswa(
    NPM varchar(12) not null,
    Nama varchar(30) not null,
    USERNAME varchar(12) not null,
    FOREIGN KEY (USERNAME) REFERENCES mahasiswa(NPM),
    CONSTRAINT FK_KODEUSER_MAHASISWA FOREIGN KEY (USERNAME) REFERENCES akun(USERNAME),
    PRIMARY KEY (NPM) 
);
create table dosen(
    KD_DOSEN varchar(20) not null,
    NAMA_DOSEN varchar(30) not null,
    USERNAME varchar(12) not null,
    FOREIGN KEY (USERNAME) REFERENCES dosen(KD_DOSEN),
    CONSTRAINT FK_KODEUSER_DOSEN FOREIGN KEY (USERNAME) REFERENCES akun(USERNAME),
    PRIMARY KEY (KD_DOSEN)
);
create table tugas(
    KD_TUGAS varchar(12) not null,
    FILE_TUGAS varchar(200) not null,
    DESC_TUGAS varchar(200) not null,
    PRIMARY KEY(KD_TUGAS)
);
create table matakuliah(
    KD_MATKUL varchar(15) not null,
    NAMA_MATKUL varchar(20) not null,
    KD_DOSEN varchar(20) not null,
    FOREIGN KEY (KD_DOSEN) REFERENCES dosen(KD_DOSEN),
    PRIMARY KEY (KD_MATKUL)
);
create table enroll(
    NPM varchar(12) not null,
    KD_MATKUL varchar(15)not null,
    FOREIGN KEY (NPM) REFERENCES mahasiswa(NPM),
    FOREIGN KEY (KD_MATKUL) REFERENCES matakuliah(KD_MATKUL)
);
create table assign(
    NPM varchar(12) not null,
    KD_TUGAS varchar(12) not null,
    FOREIGN KEY (NPM) REFERENCES mahasiswa(NPM),
    FOREIGN KEY (KD_TUGAS) REFERENCES tugas(KD_TUGAS)
);
create table materi(
    KD_MATERI varchar(15) not null,
    KD_MATKUL varchar(15) not null,
    FILE_MATERI varchar(200) not null,
    DESC_MATERI varchar(200) not null,
    FOREIGN KEY (KD_MATKUL) REFERENCES matakuliah(KD_MATKUL),
    PRIMARY KEY(KD_MATERI)
);