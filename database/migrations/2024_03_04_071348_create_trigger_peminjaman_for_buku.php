<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        CREATE TRIGGER TR_peminjaman_AI
        AFTER INSERT
        ON peminjam FOR EACH ROW
        BEGIN
            UPDATE buku SET stok = stok - NEW.jumlah_pinjam
            WHERE id = NEW.id_buku;
        END;
    ');
        DB::unprepared('
        CREATE TRIGGER TR_peminjaman_AU
        AFTER UPDATE
        ON peminjam FOR EACH ROW
        BEGIN
            UPDATE buku SET stok = stok + OLD.jumlah_pinjam
            WHERE id = OLD.id_buku;
            UPDATE buku SET stok = stok - NEW.jumlah_pinjam
            WHERE id = NEW.id_buku;
        END;
    ');
        DB::unprepared('
        CREATE TRIGGER TR_peminjaman_AD
        AFTER DELETE
        ON peminjam FOR EACH ROW
        BEGIN
            UPDATE buku SET stok = stok + OLD.jumlah_pinjam
            WHERE id = OLD.id_buku;
        END;
    ');
        DB::unprepared('
        CREATE TRIGGER TR_peminjaman_dikembalikan_AD
        AFTER UPDATE
        ON peminjam FOR EACH ROW
        BEGIN
            IF(NEW.status = "dikembalikan") THEN
                UPDATE buku SET stok = stok + OLD.jumlah_pinjam
                WHERE id = OLD.id_buku;
            END IF;
        END;
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trigger_peminjaman_for_buku');
    }
};
