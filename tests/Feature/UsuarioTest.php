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
    use RefreshDatabase, WithFaker;
    
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_add_usuario(): void
    {
        $listaUsuario = new ListaUsuario();
        $newUsuario = new Usuario(
            id: '1',
            nombres: 'Juan',
            apellidos: 'Perez',
            correo: 'sistemas@gmail.com',
            password: '-',
            rol: '_',
            espacio_disponible: 8
        );

        $usuarioExpect = $listaUsuario->add($newUsuario);
        $this->assertModelExists($usuarioExpect);
    }
    public function test_not_add_usuario_data_null(): void
    {
        $listaUsuario = new ListaUsuario();
        $newUsuario = new Usuario(null, null, null, null, null, null, null);
        $usuarioExpect = $listaUsuario->add($newUsuario);
        $this->assertEquals($usuarioExpect, null);
    }
    public function test_not_add_usuario_data_cant_null(): void
    {
        $listaUsuario = new ListaUsuario();
        $newUsuario = new Usuario(null, 'Juan', null, null, null, null, null);
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

    public function test_EncontrarUsuarioPorEmail(): void
    {
        $usuarioNuevo = new Usuario(
            id: '1',
            nombres: 'Juan',
            apellidos: 'Perez',
            correo: 'sistemas@gmail.com',
            password: '-',
            rol: '_',
            espacio_disponible: 8
        );

        $listaUsuarios = new ListaUsuario();
        $listaUsuarios->add($usuarioNuevo);

        $usuarioEncontrado = $listaUsuarios->encontrarPorEmail($usuarioNuevo->getcorreo());

        $this->assertNotNull($usuarioEncontrado, 'User should be found');
        $this->assertEquals($usuarioNuevo->getcorreo(), $usuarioEncontrado->correo, 'Email es el mismo');
        $this->assertEquals($usuarioNuevo->getNombres(), $usuarioEncontrado->nombres, 'Nombres son iguales');
        $this->assertEquals($usuarioNuevo->getApellidos(), $usuarioEncontrado->apellidos, 'Apellidos son iguales');
    }

    public function test_CambiarRolYRetornarUsuarioActualizado(): void
    {
        $usuarioInsert =new Usuario(
            id: '4',
            nombres: 'Juan',
            apellidos: 'Perez',
            correo: 'sistemas@gmail.com',
            password: '-',
            rol: '_',
            espacio_disponible: 8
        );

        $listaUsuarios = new ListaUsuario();
        $listaUsuarios->add($usuarioInsert);

        $updatedUser = $listaUsuarios->changeRole($usuarioInsert->getId(), 'admin');

        $this->assertDatabaseHas('usuarios', [
            'id' => $usuarioInsert->getId(),
            'rol' => 'admin'
        ]);

        $this->assertEquals('admin', $updatedUser->rol);
    }

}
