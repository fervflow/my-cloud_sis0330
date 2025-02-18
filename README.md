# My Cloud

Proyecto grupal de Laravel para la materia **Desarrollo de Sistemas 2**.

Una replica de un servicio de almacenamiento en la nube.

## Introducción
El proyecto está diseñado para ejecutarse en contenedores de docker y así **evitar** la instalación de php, composer, laravel, postgresql, etc. en el sistema operativo del host y así lograr un entorno de desarrollo uniforme entre los integrantes.

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
Una vez clonado el proyecto, dirígete a carpeta clonada con:
```sh
cd my-cloud_sis0330
```
Posteriormente construye y levanta los contenedores con el comando:
```sh
docker compose -f ./docker/docker-componse.yml up -d
```
Si todo está correctamente configurado puedes comprobar que hay tres contenedores ejecutandoce con el comando:
```sh
docker ps
```

### 3. Configurar las variables de entorno de Laravel
Para poder construir el proyecto debes configurar algunas variables de entorno, para ello debes copiar el archivo `.env.example` en otro archivo `.env`, puedes hacerlo con el siguiente comando, desde la carpeta raíz del proyecto (si no cambiaste a otra carpeta durante el proceso no hay problema):
```sh
cp ./my-cloud/.env.example ./my-cloud/.env
```
Ahora debes editar el archivo `.env` que acabas de generar con tu editor de preferencia, si usas vscode ya puedes abrir el proyecto con:
```sh
code my-cloud &
```
Buscas y abres el archivo `.env`, adentro reemplaza las líneas 24 a 29 con:
```js
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=mycloud
DB_USERNAME=mycloud
DB_PASSWORD=mycloud123
```
Guarda los cambios.

Ahora debes generar la `APP_KEY`, para ello debes entrar a la linea de comandos del contenedor que alberga la aplicación de laravel, con el comando:
```sh
docker exec -it laravel_app sh
```
Una vez dentro ejecuta el siguiente comando:
```sh
php artisan key:generate
```

### 4. Ejecurar las migraciones
Entra otra vez en el shell del contenedor de laravel, si no estás ahí:
```sh
docker exec -it laravel_app sh
```

Ejecuta el comando para correr las migraciones:
```sh
php artisan migrate
```

### 5. Comprobar el funcionamiento
Con esto ya debería estar todo configurado y listo para trabajar, puedes comprobar que la aplicacińo de laravel está ejecutandose correctamente entrando desde un navegador a la dirección del localhost: [http://localhost](http://localhost)

También puedes verificar la base de datos conectandote a ella desde cualquier cliente SQL como DBeaver o PGAdmin, utilizando los valores de conexión especificados anteriormente.


## Notas
Recuerda que para ejecutar cualquier comando de `composer` o `artisan` para crear los archivos de laravel, crear y ejecutar migraciones, etc. debes ejecutarlos dentro del shell del contenedor de laravel, ingresando con:
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


