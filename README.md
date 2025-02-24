# My Cloud

Proyecto grupal de Laravel para la materia **Desarrollo de Sistemas 2**.

Una replica de un servicio de almacenamiento en la nube.

## Introducción
El proyecto está diseñado para ejecutarse en contenedores de docker y así **evitar** la instalación de php, composer, laravel, postgresql, etc. en el sistema operativo del host y así lograr un entorno de desarrollo uniforme entre los integrantes.

## Desarrollo
Si ya tienes el proyecto instalado y configurado con las variables de entorno y demás, entonces **antes de empezar a escribir código** debes tener en cuenta:

### Poner los contenedoes en funcionamiento
- Si hubo **cambios en los archivos de docker**, debes reconstruir los contenedores:
    ```sh
    docker compose up --build
    ```
- Si no hubo ningún cambio en los archivos de docker, simplemente:
    ```sh
    docker compose up
    ```
- Al terminar el trabajo es recomendable cerrar los contenedores, si es que los inicaiste en modo desatendido (`-d`):
    ```sh
    docker compose down
    ```

## Instalación y ejecución

### _Prerequisitos_
Es necesario tener lo siguiente instalado y configurado en su sistema operativo:
- Git
- Docker

#### Recomendaciones
Si tu sistema operativo es Windows, para tener una mejor experiencia de desarrollo es recomendable tener instalado PowerShell 7.x y Windows Terminal, ambos pueden ser fácilmente instalados con el gestor de paquetes `winget` en una instancia de Windows Powershell (icono azúl):
- PowerShell 7.x
    ```
    winget install -e --id Microsoft.PowerShell
    ```
- Windows Terminal
    ```
    winget install -e --id Microsoft.WindowsTerminal
    ```
Una vez finalizada la instalación puedes abrir una instancia de Windows Terminal, **asegurate de que se inicia en PowerShell 7.x (ícono negro) y no Windows PowerShell (ícono azún)** ya que el último carece de características.

#### _Opcional_
Adicionalmente, puedes tener un entorno de terminal completo y funcional instalando el perfil de powershell de [ChrisTitus](https://github.com/ChrisTitusTech/powershell-profile/) de manera sencilla.

- Inicia una instancia de Powershell como administrador y ejecuta el siguiente comando:
    ```sh
    irm "https://github.com/ChrisTitusTech/powershell-profile/raw/main/setup.ps1" | iex
    ```

### 1. Clonar el proyecto
Dirigete a la carpeta donde quieres clonar el proyecto y clónalo ejecutando el siguiente comando:

- Si tienes SSH configurado (recomendable para subir cambios):
    ```sh
    git clone git@github.com:fervflow/my-cloud_sis0330.git
    ```
- Si solo se desea ejecutar el proyecto:
    ```sh
    git clone https://github.com/fervflow/my-cloud_sis0330.git
    ```

### 2. Construir los contenedores
Puedes simplemente abrir el proyecto con VS Code y toda la configuración inicial se realizará de manera automática.
```sh
code . &
```

Esto abrira el proyecto en VS Code e iniciará dos tareas en terminales, una con el nombre 'Docker Server' que configura y levanta los contenedores, otro con el nombre 'Laravel Shell' para ejecutar los comandos de `composer` y `artisan`.

**O**, se puede realizar la configuración manual:

1. Una vez clonado el proyecto, dirígete a la carpeta clonada con:
    ```sh
    cd my-cloud_sis0330
    ```
2. Posteriormente construye, levanta los contenedores y el servidor con el comando:
    ```sh
    docker compose up
    ```
Esto hará todo el trabajo de configuración de las variables de entorno, instalación de dependencias de Composer, dependencias de Node y migraciones gracias a un script de entrada embebido.

Los logs del servidor estarán en ejecución, si todo está correcto verás un mensaje casi al final similar a este:

    ===>>> CONFIGURACIÓN INICIAL COMPLETADA.

Puedes abrir otra pestaña o ventana de terminal y comprobar que hay tres contenedores ejecutandoce con el comando:
```sh
docker ps
```
_**NOTA:**_
Si tuviste algún **problema** al descargar los contenedores, puedes intentar limpiar todos los archivos de docker inutilizados ejecutando el siguiente comando:
```sh
docker system prune -a
```
Ten en cuenta que esto removerá:
- Todos los contenedores detenidos.
- Todas las redes internas de docker no usadas por ningún contenedor.
- Todas las imagenes sin conetenedores asociados.
- Todo el cache de builds.

Posteriormente reintentar el build:
```sh
docker compose up
```

### 3. Comprobar el funcionamiento
Con esto ya debería estar todo configurado y listo para trabajar, puedes comprobar que la aplicacińo de laravel está ejecutandose correctamente entrando desde un navegador a la dirección del localhost: [http://localhost](http://localhost)

También puedes verificar la base de datos conectandote a ella desde cualquier cliente SQL como DBeaver o PGAdmin, utilizando los valores de conexión especificados anteriormente.

### 4. Configurar el editor de código
Puedes abrir el proyecto con `VS Code`, al iniciar aparecerá una ventana emergente que solicita instalar las extensiones recomendadas, puedes aceptarlo para tener una experiencia de desarrollo uniforme.

También se establecerán algunas configuraciones, esto solo afecta este entorno de trabajo y no tu configuración personal de `VS Code`.

## Notas
Recuerda que para ejecutar cualquier comando de `composer` o `artisan` para crear los archivos de laravel, crear y ejecutar migraciones, etc. debes ejecutarlos dentro del shell del contenedor de laravel, es recomendable abrir otra pestaña o ventana de terminal dedicado a esto e ingresando con:
```sh
docker exec -it laravel_app sh
```

Desde allí ya puedes crear lo necesario, por ejemplo:
- Para generar controladores:
    ```sh
    php artisan make:controller UserController
    ```
    O:
    ```sh
    php artisan make:controller UserController --resource
    ```

- Para generar modelos:
    ```sh
    php artisan make:model Producto
    ```
    O acompañado de migration, factory, controller y seeder:
    ```sh
    php artisan make:controller Usproducto -mfcs
    ```
- Y demás comandos que puedes ver con:
    ```sh
    php artisan list
    ```


