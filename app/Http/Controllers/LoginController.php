<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Core\ListaUsuario;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use App\Core\Usuario;
    use App\Models\UsuarioModel;
use Illuminate\Support\Facades\Log;

    class LoginController extends Controller
    {
        protected $listaUsuario;

        public function __construct()
        {
            $this->listaUsuario = new ListaUsuario();
        }

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
            $usuario = UsuarioModel::where('correo', $request->input('correo'))->first();
            if ($usuario && Hash::check($request->input('password'), $usuario->password)) {
                Auth::login($usuario);
                Log::info('LOGIN Correcto');
                return redirect()->intended('/home');
            }
            return back()->withErrors(['correo' => 'Credenciales incorrectas']);
        }


        public function showRegisterForm()
        {
            return view('login.register');
        }

        public function register(Request $request)
        {
            $request->validate([
                'nombres' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'correo' => 'required|email|unique:usuarios,correo',
                'password' => 'required|min:6|confirmed'
            ]);

            $usuario = new Usuario(
                '',
                $request->input('nombres'),
                $request->input('apellidos'),
                $request->input('correo'),
                '',
                '',
                ''

            );

            $nuevoUsuario = $this->listaUsuario->add($usuario, $request->input('password'));

            if ($nuevoUsuario) {
                return redirect('/login')->with('success', 'Usuario registrado correctamente. Ahora puedes iniciar sesión.');
            } else {
                return back()->withErrors(['error' => 'No se pudo registrar el usuario.']);
            }
        }

    }
