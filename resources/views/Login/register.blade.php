<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="max-w-lg w-full bg-white shadow-lg rounded-lg p-8">
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">CREAR CUENTA</h2>
    <form action="/register" method="POST">
      @csrf
      <div class="mb-4">
        <label for="nombres" class="block text-gray-700">Nombres</label>
        <input type="text" id="nombres" name="nombres" required
          class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2">
      </div>
      <div class="mb-4">
        <label for="apellidos" class="block text-gray-700">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" required
          class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2">
      </div>
      <div class="mb-4">
        <label for="correo" class="block text-gray-700">Correo electrónico</label>
        <input type="email" id="correo" name="correo" required
          class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2">
      </div>
      <div class="mb-4">
        <label for="password" class="block text-gray-700">Contraseña</label>
        <input type="password" id="password" name="password" required
          class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2">
      </div>
      <div class="mb-4">
        <label for="password_confirmation" class="block text-gray-700">Confirmar contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required
          class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2">
      </div>
      <div class="mb-4 flex items-center">
        <input type="checkbox" id="terminos" class="mr-2" onclick="habilitarRegistro()">
        <label for="terminos" class="text-gray-700">He leído y acepto los
          <a href="#" class="text-blue-500 hover:underline" onclick="mostrarModal()">Términos y Condiciones</a>
        </label>
      </div>
      <div class="mt-6">
        <button type="submit" id="btnRegistro" disabled
          class="w-full bg-gray-400 text-white p-3 rounded-md cursor-not-allowed">
          Registrar
        </button>
      </div>
      <div class="mt-4 text-center">
        <span class="text-gray-600">¿Ya tienes una cuenta?</span>
        <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Iniciar sesión</a>
      </div>
    </form>
  </div>

  <!-- Modal -->
  <div id="modalTerminos" class="fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-2xl overflow-y-auto max-h-[80vh]">
        <h2 class="text-2xl font-semibold mb-4">Términos y Condiciones</h2>
        <div class="text-gray-700 space-y-4">
            <h3 class="text-xl font-semibold">1. Aceptación de los Términos</h3>
            <p>Al utilizar este sistema, aceptas las Condiciones del Servicio establecidas en este documento. Si no estás de acuerdo con estos términos, te recomendamos no utilizar el sistema.</p>

            <h3 class="text-xl font-semibold">2. Uso del Sistema y Servicios</h3>
            <p>Este sistema ha sido creado para propósitos académicos y de aprendizaje en el contexto de la materia <strong>Desarrollo de Sistemas 2</strong> en la Universidad Privada Domingo Savio. Su uso está limitado a estudiantes y profesores de la universidad.</p>

            <h3 class="text-xl font-semibold">3. Derechos sobre el Contenido</h3>
            <p>El sistema no reclama derechos de propiedad sobre el contenido subido por los usuarios. Los usuarios conservan todos los derechos de propiedad intelectual sobre su contenido.</p>

            <h3 class="text-xl font-semibold">4. Privacidad y Protección de Datos</h3>
            <p>Nos comprometemos a proteger tu privacidad. Los datos serán utilizados exclusivamente para fines académicos y no se compartirán con terceros sin tu consentimiento.</p>

            <h3 class="text-xl font-semibold">5. Acceso y Control sobre el Contenido</h3>
            <p>Los usuarios tienen control sobre quién puede acceder a sus archivos. No serán compartidos públicamente sin consentimiento expreso.</p>

            <h3 class="text-xl font-semibold">6. Uso Responsable del Sistema</h3>
            <p>Se prohíbe el uso del sistema para actividades ilegales o comerciales que violen las normativas de la universidad.</p>

            <h3 class="text-xl font-semibold">7. Modificaciones y Actualizaciones de Términos</h3>
            <p>Nos reservamos el derecho de modificar estos términos en cualquier momento. Los usuarios serán notificados en caso de cambios significativos.</p>

            <h3 class="text-xl font-semibold">8. Cancelación del Uso</h3>
            <p>Puedes dejar de usar el sistema en cualquier momento. Tus datos podrán ser eliminados de acuerdo con la política de privacidad.</p>

            <h2 class="text-2xl font-semibold mt-6">Política de Privacidad</h2>

            <h3 class="text-xl font-semibold">1. Información Recopilada</h3>
            <p>Solo recopilamos la información necesaria para el funcionamiento académico, como nombre, correo y archivos subidos.</p>

            <h3 class="text-xl font-semibold">2. Uso de la Información</h3>
            <p>La información se usa únicamente para mejorar el sistema y para fines académicos. No se comparte con entidades externas sin consentimiento.</p>

            <h3 class="text-xl font-semibold">3. Seguridad de los Datos</h3>
            <p>Implementamos medidas de seguridad para proteger tus datos, aunque no podemos garantizar seguridad absoluta en internet.</p>

            <h3 class="text-xl font-semibold">4. Conservación de los Datos</h3>
            <p>Los datos se conservarán mientras sean necesarios para los fines del sistema académico y podrán ser eliminados al finalizar el semestre.</p>

            <h3 class="text-xl font-semibold">5. Acceso a tus Datos</h3>
            <p>Puedes acceder o modificar tus datos en cualquier momento contactando a los administradores del sistema.</p>
        </div>
        <div class="text-right mt-4">
            <button class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700" onclick="cerrarModal()">Cerrar</button>
        </div>
    </div>
</div>


  <script>
    function mostrarModal() {
    const modal = document.getElementById('modalTerminos');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    }
    function cerrarModal() {
    const modal = document.getElementById('modalTerminos');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
    }
    function habilitarRegistro() {
      const checkBox = document.getElementById('terminos');
      const btnRegistro = document.getElementById('btnRegistro');
      if (checkBox.checked) {
        btnRegistro.disabled = false;
        btnRegistro.classList.remove('bg-gray-400', 'cursor-not-allowed');
        btnRegistro.classList.add('bg-purple-600', 'hover:bg-purple-900');
      } else {
        btnRegistro.disabled = true;
        btnRegistro.classList.add('bg-gray-400', 'cursor-not-allowed');
        btnRegistro.classList.remove('bg-purple-600', 'hover:bg-purple-900');
      }
    }
  </script>
</body>
</html>
