# STORED PROCEDURE & TRIGGER SILUTEL No 3

SET search_path TO SILUTEL;

CREATE OR REPLACE FUNCTION FUNC_BELI_INVENTORI()
RETURNS TRIGGER AS
$$
  BEGIN
    IF (TG_OP = 'INSERT') THEN
      UPDATE INVENTORI
      SET Stok = Stok + NEW.Jumlah
      WHERE Nama = New.Nama AND Merk = NEW.Merk;

    ELSEIF (TG_OP = 'UPDATE') THEN
      IF(OLD.Nama = NEW.Nama AND OLD.Merk = NEW.Merk) THEN
        UPDATE INVENTORI
        SET Stok =  Stok - OLD.Jumlah + NEW.Jumlah
        WHERE Nama = NEW.Nama AND Merk = NEW.Merk;
      ELSE
         UPDATE INVENTORI
         SET Stok = Stok + NEW.Jumlah
         WHERE Nama = NEW.Nama AND Merk = NEW.Merk;

         UPDATE INVENTORI
         SET Stok = Stok - OLD.Jumlah
         WHERE Nama = OLD.Nama AND Merk = OLD.Merk;                 
      END IF;
    ELSEIF (TG_OP = 'DELETE') THEN
      UPDATE INVENTORI
      SET Stok = Stok - OLD.Jumlah
      WHERE Nama = OLD.Nama AND Merk = OLD.Merk;
    END IF;

    RETURN NEW;
  END;
$$
LANGUAGE plpgsql;

CREATE TRIGGER TRG_BELI_INVENTORI
AFTER INSERT OR UPDATE OR DELETE
ON PEMBELIAN_INVENTORI
FOR EACH ROW
EXECUTE PROCEDURE FUNC_BELI_INVENTORI();

CREATE TRIGGER TRG_GANTI_INVENTORI
AFTER INSERT OR UPDATE OR DELETE
ON STAF_MENGGANTI_INVENTORI
FOR EACH ROW
EXECUTE PROCEDURE FUNC_BELI_INVENTORI();