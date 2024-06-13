# TravelWithMoha

![TravelWithMoha Logo](public/pngLogo.png) 

Bienvenido a **TravelWithMoha** 🌍, un proyecto que combina un blog de viajes y una tienda en línea. Aquí comparto mis experiencias de viajes por más de 10 países diferentes y ofrezco paquetes de viaje para facilitar el viaje a cualquier persona apasionada por explorar el mundo.

## Características ✨

- **Blog de viajes** 📝: Artículos y relatos de mis experiencias en más de 10 países diferentes.
- **Tienda en línea** 🛒: Ofrecemos packs de viajes personalizados para facilitar la organización de tus aventuras.
- **Pago seguro** 🔒: Integración con Stripe para asegurar transacciones seguras.
- **Tecnologías utilizadas**:
  - **Laravel 10**: Framework backend para la construcción de la aplicación.
  - **HTML & CSS**: Estructura y estilos básicos.
  - **Tailwind CSS**: Framework de CSS para un diseño moderno y responsivo.
  - **JavaScript**: Funcionalidades interactivas en el frontend.

## Capturas de Pantalla 📸

![Página Principal](public/30.PNG) 
*Captura de la página principal del blog de viajes.*

![Tienda en Línea](public/31.PNG) 
*Captura de la tienda en línea con packs de viaje.*

![Pagina de contacto](public/32.PNG)
*Formulario para el contacto.*

## Requisitos ⚙️

- PHP >= 8.0
- Composer
- Node.js
- MySQL

## Instalación 🚀

1. Clona el repositorio:

    ```bash
    git clone https://github.com/tuusuario/TravelWithMoha.git
    cd TravelWithMoha
    ```

2. Instala las dependencias de PHP:

    ```bash
    composer install
    ```

3. Instala las dependencias de Node.js:

    ```bash
    npm install
    ```

4. Crea un archivo `.env` basado en `.env.example` y configura tu entorno:

    ```bash
    cp .env.example .env
    ```

5. Genera una clave de aplicación:

    ```bash
    php artisan key:generate
    ```

6. Configura tu base de datos en el archivo `.env` y luego ejecuta las migraciones:

    ```bash
    php artisan migrate
    ```

7. Compila los assets de frontend:

    ```bash
    npm run dev
    ```

8. Inicia el servidor de desarrollo:

    ```bash
    php artisan serve
    ```

## Uso 🛠️

- Accede a la aplicación en `http://localhost:8000` para ver el blog y la tienda.
- Navega por los artículos de viajes y explora los packs de viajes disponibles.
- Realiza compras seguras a través de la integración con Stripe.

  ## Despliegue :rocket:
[Página principal](http://ec2-3-227-110-125.compute-1.amazonaws.com/).

 ## Versionado  :open_file_folder:

#### Versión 1.0.1

## Autores :smiley:
Este proyecto fue creado por Mohamed Sahraoui y ha recibido contribuciones de apasionados por el diseño web. 

## Licencia :closed_lock_with_key: 
 Este proyecto está bajo  la Licencia Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International (CC BY-NC-ND 4.0) - Copyright (c) 2024 [MOHAMED SAHRAOUI]

## Recursos Adicionales :mortar_board:
- [Página de GitHub](https://github.com/MohamedSahraoui21)
- [Mi LinkedIn](https://www.linkedin.com/in/mohamed-sahraoui-1a4928293/)


