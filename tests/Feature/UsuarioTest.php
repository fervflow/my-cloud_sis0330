<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Core\ListaUsuario;
use App\Core\Usuario;
use App\Models\UsuarioModel;

class UsuarioTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase, WithFaker;
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_add_usuario(): void
    {
        $listaUsuario = new ListaUsuario();
        $newUsuario = new Usuario('Juan', 'Perez', 'sistemas@gmail.com', '-', '_', 8);
        $usuarioExpect = $listaUsuario->add($newUsuario);
        $this->assertModelExists($usuarioExpect);
    }
    public function test_not_add_usuario_data_null(): void
    {
        $listaUsuario = new ListaUsuario();
        $newUsuario = new Usuario(null, null, null, null, null, null);
        $usuarioExpect = $listaUsuario->add($newUsuario);
        $this->assertEquals($usuarioExpect, null);
    }
    public function test_not_add_usuario_data_cant_null(): void
    {
        $listaUsuario = new ListaUsuario();
        $newUsuario = new Usuario('Juan', null, null, null, null, null);
        $usuarioExpect = $listaUsuario->add($newUsuario);

        $this->assertEquals($usuarioExpect, null);
    }
    public function test_cant_element_usuari(): void
    {
        $lista = UsuarioModel::all();
        $listaUsuario = new ListaUsuario();
        $listaExpect = $listaUsuario->list();
        $this->assertEquals(count($lista), count($listaExpect));
    }

    public function test_ChangeRoleCallsServiceAndReturnsUpdatedUser()
    {
        $usuario = UsuarioModel::factory()->create([
            'rol' => 'user',
        ]);

        $listaUsuarios = new ListaUsuario(new UsuarioService());

        $updatedUser = $listaUsuarios->changeRole($usuario->id, 'admin');

        $this->assertDatabaseHas('usuarios', [
            'id' => $usuario->id,
            'rol' => 'admin'
        ]);

        $this->assertEquals('admin', $updatedUser->rol);
    }

}
