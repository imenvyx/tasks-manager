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
## Requisitos
- PHP 8.0+, Composer, MySQL/Postgres
- Node 16+, npm


## ⚡ Instalación y ejecución
## Backend (Laravel)
1. Clonar repo y entrar en carpeta `backend/`
2. Copiar `.env.example` a `.env` y configurar DB
3. `composer install`
4. `php artisan key:generate`
5. `php artisan migrate --seed`
6. `php artisan serve` (o usar Sail/Docker) — la API estará en `http://127.0.0.1:8000/api/v1`

## Frontend (Vue)
1. Entrar en `frontend/`
2. Copiar `.env.example` a `.env` y ajustar `VITE_API_BASE` (por ejemplo `http://127.0.0.1:8000/api/v1`)
3. `npm install`
4. `npm run dev`
5. Abrir `http://localhost:5173` (o la URL que dev server brinde)

<img width="1451" height="848" alt="image" src="https://github.com/user-attachments/assets/4c891b00-da8f-4f0c-b4d3-b3bb2f7bf19d" />


