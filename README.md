👗 Boutique S&D

Tienda online de ropa desarrollada con PHP puro, MySQL, HTML, CSS y Bootstrap. Permite a los clientes explorar un catálogo de productos, registrarse, iniciar sesión y armar su carrito de compras, mientras que los administradores gestionan productos y usuarios desde un panel propio.

✨ Funcionalidades
Para clientes
Catálogo de productos: imagen, nombre, descripción y precio de cada prenda.
Registro e inicio de sesión: las contraseñas se guardan encriptadas.
Carrito de compras: agregar productos, ver el carrito y eliminar productos.
Control de sesión: solo los usuarios con sesión iniciada pueden agregar al carrito.
Página de contacto: formulario básico de contacto.
Para administradores (rol admin)
Dashboard con accesos rápidos.
Gestión de productos: crear, editar y eliminar.
Gestión de usuarios: crear, editar y eliminar.
Protección por rol: solo los usuarios con rol admin pueden entrar al panel.
🛠️ Tecnologías
Área	Tecnología
Backend	PHP (PDO)
Base de datos	MySQL
Frontend	HTML5, CSS3, Bootstrap
Servidor local	XAMPP (Apache + MySQL)
📁 Estructura del proyecto
boutique/
├── vista/          # Interfaz: index, login, registro, carrito, contacto y panel admin
├── modelo/         # Lógica con la base de datos: conexión, login, registro, carrito, productos y usuarios
├── controlador/    # Controladores como logout.php y carrito.php
├── css/            # Hojas de estilo
├── imagenes/       # Imágenes de los productos
└── database/
    └── boutique.sql  # Script de la base de datos

Sigue una estructura inspirada en el patrón MVC (Modelo – Vista – Controlador).

🗄️ Base de datos

Nombre de la base: boutique_s&d

Tablas principales:

usuarios: usuario, correo, teléfono, contraseña y rol (cliente o admin).
productos: nombre, descripción, precio, stock, proveedor, imagen y fecha de ingreso.
proveedor, ventas, detalle_ventas, inventario y pagos: complementan la gestión de la tienda.
🚀 Instalación y uso local
Requisitos
XAMPP (Apache y MySQL)
Git (opcional, para clonar el repositorio)
Pasos
Clona el repositorio dentro de la carpeta htdocs de XAMPP:
bash
   cd C:/xampp/htdocs
  (https://github.com/DanielaMendoza4/boutique-sd.git)
Inicia Apache y MySQL desde el Panel de Control de XAMPP.
Crea la base de datos:
Entra a http://localhost/phpmyadmin.
Crea una base de datos llamada boutique_s&d (cotejamiento utf8mb4_general_ci).
Ve a la pestaña Importar y sube el archivo database/boutique.sql.
Revisa la conexión en modelo/ (por defecto usa localhost, usuario root y sin contraseña, la configuración estándar de XAMPP).
Abre el sitio en el navegador:
   http://localhost/boutique/vista/index.php
Probar el panel de administrador
Regístrate como un usuario nuevo desde Registro/Login.
En phpMyAdmin, abre la tabla usuarios y cambia el campo rol de ese usuario a admin.
Cierra sesión e inicia sesión de nuevo: serás redirigido al dashboard de administración.
