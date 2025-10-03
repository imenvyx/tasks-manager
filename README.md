# Tasks Manager

Aplicación interna para la gestión de tareas con usuarios y palabras clave reutilizables.  
Construida con **Laravel 8+** en el backend y **Vue 3** con `<script setup>` en el frontend.

---

## 🎯 Funcionalidades

- Listar tareas con su estado (pendiente / completada) y palabras clave asociadas.
- Crear nuevas tareas y asignar palabras clave existentes.
- Cambiar el estado de una tarea (pendiente ↔ completada).
- Gestión básica de palabras clave reutilizables.

---

## 🛠 Tecnologías

**Backend:**
- Laravel 8+
- MySQL (o la base de datos que prefieras)
- API REST

**Frontend:**
- Vue 3
- Composition API (`<script setup>`)
- Axios para llamadas a la API
- Bootstrap para estilo básico


---

## ⚡ Instalación y ejecución

### Backend (Laravel)

1. Clonar el repositorio y entrar a la carpeta `backend`:
```bash
git clone <URL_DEL_REPO>
cd tasks-manager/backend
```
2.Instalar dependencias:
```bash
composer install
```
3.Configurar el archivo .env con tu base de datos (ejemplo MySQL):

4.Generar clave de aplicación:
```bash
php artisan key:generate
```
5.Ejecutar migraciones:
```bash
php artisan migrate
```
6.Levantar el servidor de desarrollo:
```bash
php artisan serve
```

Por defecto corre en http://localhost:8000

###Frontend (Vue 3)

1.Entrar a la carpeta frontend:
```bash
cd ../frontend
```
2.Instalar dependencias:
```bash
npm install
```
3.Levantar servidor de desarrollo:
```bash
npm run dev
```
Por defecto corre en http://localhost:5173
Asegúrate de que el backend esté corriendo.

