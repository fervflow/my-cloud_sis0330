<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Core\ListaArchivos;
use App\Core\Archivos;
use App\Models\ArchivoModel;


class ArchivoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_add_archivo():void{
        $listaArchivo = new ListaArchivos();
        $newArchivo = new Archivos('documento','rutass',2,'texto',19/02/2025);
        $archivoExpect = $listaArchivo->add($newArchivo);
        $this->assertModelExists($archivoExpect);
    }
    public function test_not_add_archivoss_data_null():void{
        $listaArchivo = new ListaArchivos();
        $newArchivo = new Archivos(null,null,null,null,null);
        $archivoExpect = $listaArchivo->add($newArchivo);
        $this->assertEquals($archivoExpect,null);
    }
}
