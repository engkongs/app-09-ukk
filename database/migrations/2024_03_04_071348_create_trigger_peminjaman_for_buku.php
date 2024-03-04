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
            UPDATE buku SET stok = buku.stok - NEW.jumlah_pinjam
            WHERE buku.id = NEW.id;
        END;
    ');
        DB::unprepared('
        CREATE TRIGGER TR_peminjaman_AU
        AFTER UPDATE
        ON peminjam FOR EACH ROW
        BEGIN
            UPDATE buku SET stok = buku.stok + OLD.jumlah_pinjam
            WHERE buku.id = OLD.id;
            UPDATE buku SET stok = buku.stok - NEW.jumlah_pinjam
            WHERE buku.id = NEW.id;
        END;
    ');
        DB::unprepared('
        CREATE TRIGGER TR_peminjaman_AD
        AFTER DELETE
        ON peminjam FOR EACH ROW
        BEGIN
            UPDATE buku SET stok = buku.stok + OLD.jumlah_pinjam
            WHERE id = OLD.id;
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
