<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    // Procesos almacenados
    {
        // Si tienes que crear una tabla ficticia para no dejar el archivo vacío, puedes dejar esto
        Schema::create('stored_procedures', function ($table) {
            $table->id();
            $table->timestamps();
        });

        // Crear los procedimientos almacenados
        DB::unprepared("
            DROP PROCEDURE IF EXISTS InsertarGanado;
            CREATE PROCEDURE InsertarGanado (
                IN idGanadero INT,
                IN nombreVaca VARCHAR(50), 
                IN razaVaca VARCHAR(50), 
                IN edadVaca INT,
                IN tipoProduccion VARCHAR(10), 
                IN fecha_nacimientoVaca DATE
            )
            BEGIN
                INSERT INTO ganado (id_ganadero, nombre, raza, edad, tipo, fecha_nacimiento) 
                VALUES (idGanadero, nombreVaca, razaVaca, edadVaca, tipoProduccion, fecha_nacimientoVaca);
            END;
        ");

        DB::unprepared("
            DROP PROCEDURE IF EXISTS ObtenerGanadoTotal;
            CREATE PROCEDURE ObtenerGanadoTotal()
            BEGIN
                SELECT * FROM ganado;
            END;

        ");

        DB::unprepared("
            DROP PROCEDURE IF EXISTS ObtenerGanadoId;
            CREATE PROCEDURE ObtenerGanadoId (
                IN idVaca INT
            )
            BEGIN
                SELECT * FROM ganado WHERE id_vaca = idVaca;
            END;
        ");

        DB::unprepared("
            DROP PROCEDURE IF EXISTS ActualizarGanado;
            CREATE PROCEDURE ActualizarGanado (
                IN idVaca INT,
                IN idGanadero INT,
                IN nombreVaca VARCHAR(50), 
                IN razaVaca VARCHAR(50), 
                IN edadVaca INT,
                IN tipoProduccion VARCHAR(10), 
                IN fechaNacimientoVaca DATE
            )
            BEGIN
                UPDATE ganado SET 
                    id_ganadero = idGanadero, 
                    nombre = nombreVaca, 
                    raza = razaVaca, 
                    edad = edadVaca, 
                    tipo = tipoProduccion, 
                    fecha_nacimiento = fechaNacimientoVaca
                WHERE id_vaca = idVaca;
            END;
        ");

        DB::unprepared("
            DROP PROCEDURE IF EXISTS EliminarGanado;
            CREATE PROCEDURE EliminarGanado (
                IN idVaca INT
            )
            BEGIN
                DELETE FROM ganado WHERE id_vaca = idVaca;
            END;
        ");
    }

    public function down(): void
    {
        // Eliminar procedimientos
        DB::unprepared("DROP PROCEDURE IF EXISTS InsertarGanado;");
        DB::unprepared("DROP PROCEDURE IF EXISTS ObtenerGanadoId;");
        DB::unprepared("DROP PROCEDURE IF EXISTS ActualizarGanado;");
        DB::unprepared("DROP PROCEDURE IF EXISTS EliminarGanado;");

        Schema::dropIfExists('stored_procedures');
    }
};
