CREATE SCHEMA SILUTEL;
SET search_path TO SILUTEL;

CREATE DOMAIN DOMAIN_ROLE AS CHAR(2)
  CHECK (
    VALUE IN ('MG', 'IN', 'LA', 'DA')
  );

CREATE TABLE SILUTEL.USER (
  Email         VARCHAR(35),
  Nama          VARCHAR(35) NOT NULL,
  Alamat        VARCHAR(100) NOT NULL,
  Password      VARCHAR(20) NOT NULL,
  Role          DOMAIN_ROLE NOT NULL,
  PRIMARY KEY (Email)
);

CREATE TABLE USER_TELEPON (
  Email         VARCHAR(35),
  Telepon       VARCHAR(20),
  PRIMARY KEY (Email, Telepon),
  FOREIGN KEY (Email)
    REFERENCES SILUTEL.USER (Email)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

CREATE TABLE STAF_LAUNDRY (
  Email         VARCHAR(35),
  Lantai        SMALLINT NOT NULL,
  PRIMARY KEY (Email),
  FOREIGN KEY (Email)
    REFERENCES SILUTEL.USER(Email)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

CREATE TABLE STAF_INVENTORI_KAMAR(
  Email         VARCHAR(35),
  JamTerbang    SMALLINT NOT NULL,
  PRIMARY KEY (Email),
  FOREIGN KEY (Email)
    REFERENCES SILUTEL.USER(Email)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

CREATE TABLE LAUNDRY_STAF_LAUNDRY (
  EmailStaf     VARCHAR(35),
  Waktu         TIMESTAMP,
  Total         INTEGER NOT NULL DEFAULT 0,
  PRIMARY KEY (EmailStaf, Waktu),
  FOREIGN KEY (EmailStaf)
    REFERENCES STAF_LAUNDRY (Email)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

CREATE TABLE TAMU (
  Id            VARCHAR(20),
  Nama          VARCHAR(35) NOT NULL,
  Alamat        VARCHAR(100) NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE TAMU_TELEPON (
  IdTamu        VARCHAR(20),
  Telepon       VARCHAR(20),
  PRIMARY KEY (IdTamu, Telepon),
  FOREIGN KEY (IdTamu)
    REFERENCES TAMU(Id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT 
);

CREATE TABLE INVOICE (
  NomorInvoice  CHAR(6),
  TanggalDatang TIMESTAMP NOT NULL,
  TanggalPergi  TIMESTAMP NOT NULL,
  Jumlah        SMALLINT NOT NULL,
  IdTamu        VARCHAR(20),
  Discount      INTEGER NOT NULL,
  Total         INTEGER NOT NULL,
  PRIMARY KEY (NomorInvoice),
  FOREIGN KEY (IdTamu)
    REFERENCES TAMU(Id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

CREATE TABLE TIPE_KAMAR (
  Nama          VARCHAR(20),
  Kapasitas     SMALLINT NOT NULL,
  Deskripsi     VARCHAR(100) NOT NULL,
  Harga         INTEGER NOT NULL,
  JumlahRuangan SMALLINT NOT NULL,
  PRIMARY KEY (Nama)
);

CREATE TABLE KAMAR (
  Nomor         SMALLINT,
  Lantai        SMALLINT,
  NamaTipeKamar VARCHAR(20),
  PRIMARY KEY (Nomor, Lantai),
  FOREIGN KEY (NamaTipeKamar)
    REFERENCES TIPE_KAMAR(Nama)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

CREATE TABLE INVOICE_KAMAR (
  NomorInvoice  CHAR(6),
  NomorKamar    SMALLINT,
  LantaiKamar   SMALLINT,
  PRIMARY KEY (NomorInvoice, NomorKamar, LantaiKamar),
  FOREIGN KEY (NomorInvoice)
    REFERENCES INVOICE(NomorInvoice)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  FOREIGN KEY (NomorKamar, LantaiKamar)
    REFERENCES KAMAR (Nomor, Lantai)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

CREATE TABLE INVENTORI (
   Nama         VARCHAR(20),
   Merk         VARCHAR(20),
   Stok         SMALLINT NOT NULL DEFAULT 0,
   PRIMARY KEY (Nama,Merk)
);

CREATE TABLE INVENTORI_TIPE_KAMAR (
  NamaTipeKamar VARCHAR(20),
  NamaInventori VARCHAR(20),
  Merk          VARCHAR(20),
  Jumlah        SMALLINT NOT NULL,
  PRIMARY KEY (NamaTipeKamar, NamaInventori, Merk),
  FOREIGN KEY (NamaTipeKamar)
    REFERENCES TIPE_KAMAR(Nama)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  FOREIGN KEY (NamaInventori, Merk)
    REFERENCES INVENTORI(Nama, Merk)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

CREATE TABLE LAUNDRY_INVENTORI (
  Nama          VARCHAR(20),
  Merk          VARCHAR(20),
  EmailStaf     VARCHAR(35),
  Waktu         TIMESTAMP,
  Jumlah        SMALLINT NOT NULL,
  HargaSatuan   INTEGER NOT NULL,
  TanggalAmbil  TIMESTAMP NOT NULL,
  PRIMARY KEY (Nama, Merk, EmailStaf, Waktu),
  FOREIGN KEY (Nama, Merk)
    REFERENCES INVENTORI(Nama, Merk)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  FOREIGN KEY (EmailStaf, Waktu)
    REFERENCES LAUNDRY_STAF_LAUNDRY(EmailStaf, Waktu)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

CREATE TABLE SUPPLIER (
  Nama          VARCHAR(35),
  Alamat        VARCHAR(100) NOT NULL,
  Email         VARCHAR(35) NOT NULL,
  PRIMARY KEY (Nama)
);

CREATE TABLE PEMBELIAN (
  NomorNota     CHAR(6),
  Waktu         TIMESTAMP NOT NULL,
  NamaSupplier  VARCHAR(35),
  EmailStaff    VARCHAR(35),
  PRIMARY KEY (NomorNota),
  FOREIGN KEY (NamaSupplier)
    REFERENCES SUPPLIER(Nama)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  FOREIGN KEY (EmailStaff)
    REFERENCES STAF_INVENTORI_KAMAR(Email)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

CREATE TABLE SUPPLIER_TELEPON (
  Nama          VARCHAR(35),
  Telepon       VARCHAR(20),
  PRIMARY KEY (Nama, Telepon),
  FOREIGN KEY (Nama)
    REFERENCES SUPPLIER(Nama)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

CREATE TABLE STAF_MENGGANTI_INVENTORI (
  Nama          VARCHAR(20),
  Merk          VARCHAR(20),
  EmailStaf     VARCHAR(35),
  Waktu         TIMESTAMP NOT NULL,
  Jumlah        SMALLINT NOT NULL,
  Alasan        TEXT NOT NULL,
  PRIMARY KEY (Nama, Merk, EmailStaf),
  FOREIGN KEY (Nama, Merk)
    REFERENCES INVENTORI(Nama, Merk)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  FOREIGN KEY (EmailStaf)
    REFERENCES STAF_INVENTORI_KAMAR(Email)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

CREATE TABLE PEMBELIAN_INVENTORI (
  NomorNota     CHAR(6),
  Nama          VARCHAR(20),
  Merk          VARCHAR(20),
  Jumlah        SMALLINT NOT NULL,
  HargaSatuan   INTEGER NOT NULL,
  PRIMARY KEY (NomorNota, Nama, Merk),
  FOREIGN KEY (NomorNota)
    REFERENCES PEMBELIAN(NomorNota)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  FOREIGN KEY (Nama, Merk)
    REFERENCES INVENTORI(Nama, Merk)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);