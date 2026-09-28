# Catálogo de Películas y Series

Un sitio web completo para buscar y explorar películas y series, construido con PHP, MySQL y JavaScript.

## Características

- **Búsqueda en tiempo real**: Busca películas y series por título
- **Filtrado por tipo**: Filtra entre películas y series
- **Imágenes de TMDB**: Muestra pósters de películas usando la API de TMDB
- **Páginas de detalles**: Vista detallada de cada película/serie con sinopsis completa
- **Diseño responsivo**: Funciona en dispositivos móviles y desktop
- **Base de datos MySQL**: Almacenamiento eficiente de datos
- **Ejemplo en C++**: Código de ejemplo para búsqueda en C++

## Tecnologías utilizadas

- **Backend**: PHP con PDO para conexión a base de datos
- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Base de datos**: MySQL
- **API**: TMDB (The Movie Database) para imágenes
- **Servidor**: Apache (Laragon recomendado)

## Instalación

1. **Clona o descarga** los archivos del proyecto en tu servidor web local (recomendado: Laragon)

2. **Configura la base de datos**:
   - Crea una base de datos MySQL llamada `buscador_peliculas`
   - Ejecuta el archivo `setup_db.sql` para crear las tablas y datos iniciales

3. **Configura la conexión**:
   - Edita `api/conexion.php` con tus credenciales de base de datos
   - Edita `config.php` con la clave API de TMDB (opcional, hay datos de respaldo)

4. **Inicia el servidor** y accede a `index.html`

## Estructura del proyecto

```
sitio-web-peliculas/
├── index.html          # Página principal del catálogo
├── detalles.php        # Página de detalles de películas
├── about.html          # Página "Acerca de"
├── style.css           # Estilos CSS
├── script.js           # JavaScript para funcionalidad
├── config.php          # Configuración del sitio
├── .htaccess           # Configuración de Apache
├── setup_db.sql        # Script de base de datos
├── buscador.cpp        # Ejemplo en C++
├── README.md           # Esta documentación
├── api/
│   ├── buscar.php      # API de búsqueda
│   ├── categorias.php  # API de categorías
│   └── conexion.php    # Conexión a base de datos
```

## API Endpoints

### Búsqueda
```
GET /api/buscar.php?q={query}&type={movie|tv}
```
Busca películas/series por título. Parámetros opcionales:
- `q`: Término de búsqueda
- `type`: Tipo de contenido (movie o tv)

### Detalles
```
GET /api/buscar.php?id={id}
```
Obtiene detalles completos de una película/serie por ID.

### Categorías
```
GET /api/categorias.php
```
Obtiene lista de categorías disponibles.

## Configuración de TMDB

Para obtener imágenes reales de TMDB:

1. Regístrate en [TMDB](https://www.themoviedb.org/)
2. Obtén tu API key
3. Actualiza `config.php` con tu clave

## Desarrollo

El proyecto incluye datos de ejemplo, por lo que funciona sin configuración adicional. Para desarrollo:

- Usa un servidor local como Laragon, XAMPP o WAMP
- Asegúrate de que PHP tenga extensión PDO MySQL habilitada
- Las imágenes fallback usan placeholders cuando TMDB no está disponible

## Contribución

Siéntete libre de contribuir con mejoras, correcciones de bugs o nuevas características.

## Licencia

Este proyecto es de código abierto y gratuito para uso personal y educativo.