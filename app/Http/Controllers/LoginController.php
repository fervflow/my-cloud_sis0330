<?php
namespace App\Http\Controllers;

use App\Core\Dtos\UsuarioDTO;
use Illuminate\Http\Request;
use App\Core\Services\UsuarioService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUsuarioRequest;
use Illuminate\Support\Facades\Log;
use Wavey\Sweetalert\Sweetalert;


class LoginController extends Controller
{
    public function __construct(
        private UsuarioService $usuarioService,
    )
    { }

    public function index()
    {
        return view('Login.index');
    }

    public function login(Request $request)
    {
        Log::info('LOGIN CONTROLLER');
        Log::info($request->input('correo'));
        Log::info($request->input('password'));

        $request->validate([
            'correo' => 'required|email',
            'password' => 'required'
        ]);

        $usuarioDto = $this->usuarioService->findUserByEmail($request->input('correo'));

        if ($usuarioDto && Hash::check($request->input('password'), $usuarioDto->password)) {
            Auth::login($usuarioDto->toModel());
            Log::info('LOGIN Correcto');
            Sweetalert::success('Bienvenido', 'Has iniciado sesión correctamente')->persistent('Cerrar');
            return redirect()->intended('/home');
        }

        Sweetalert::error('Error', 'Credenciales incorrectas')->persistent('Cerrar'); // Mensaje de error
        return back()->withErrors(['correo' => 'Credenciales incorrectas']);
    }


    public function showRegisterForm()
    {
        return view('Login.register');
    }

    public function register(RegisterUsuarioRequest $request)
    {
        Log::info('LOGIN CONTROLLER - REGISTER');

        $usuarioDto = new UsuarioDTO(
            nombres: $request->validated()['nombres'],
            apellidos: $request->validated()['apellidos'],
            correo: $request->validated()['correo'],
            password: $request->validated()['password'],
            espacio_disponible: 10.00,
            espacio_total: 10.00
        );

        Log::info("Usuario validado: {$usuarioDto->__toString()}");

        $nuevoUsuario = $this->usuarioService->createUser($usuarioDto);

        Log::info("Usuario registrado: {$nuevoUsuario->__toString()}");

        if ($nuevoUsuario) {
            Sweetalert::success('Éxito', 'Usuario registrado correctamente. Ahora puedes iniciar sesión.')->persistent('Cerrar');
            return redirect('/login');
        } else {
            Log::error('LOGIN CONTROLLER - REGISTER: ERROR no nuevoUsuario');
            Sweetalert::error('Error', 'No se pudo registrar el usuario.')->persistent('Cerrar');
            return back()->withErrors(['error' => 'No se pudo registrar el usuario.']);
        }
    }

}
