<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Core\ListaUsuario;
use App\Core\Usuario;
use App\Models\UsuarioModel;

class UsuarioControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   /* public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_lista_usuarios(): void
    {

        $lista = (UsuarioModel::get());
        $cantidad = count($lista);
        $listaUsuario=new ListaUsuario();
        $listaExpect=$listaUsuario->list();
        $this->assertCount($cantidad, $listaExpect);
    }
    public function test_create_usuario():void{
        $listaUsuario = new ListaUsuario();
        $usuario = new Usuario('Juan','Perez','sistemas@gmail.com');
        $usuExpect = $listaUsuario->add($usuario);
        $this->assertModelExists($usuExpect);
        //$this->assertTrue(true);
    }*/
}
