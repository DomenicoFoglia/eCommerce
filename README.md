# 📰 Progetto Articoli – Laravel + React

Applicazione **Full Stack** sviluppata con **Laravel (backend)** e **React (frontend)**.  
Permette di creare, visualizzare, modificare e cercare articoli, con supporto all’upload delle immagini e ricerca full-text tramite **Laravel Scout + TNTSearch**.

---

## 🚀 Funzionalità principali

### 🔧 Backend (Laravel)
- API RESTful per la gestione completa degli articoli (CRUD)
- Upload immagini tramite **Spatie Media Library**
- Ricerca full-text con **Laravel Scout** e **TNTSearch**
- Validazione dei dati lato server
- Risposte API in formato JSON per il frontend React

### 💻 Frontend (React)
- Interfaccia moderna e responsive
- Form di creazione articoli (`CreateArticleForm.jsx`)
- Visualizzazione dinamica della lista articoli
- Gestione messaggi di successo ed errori
- Comunicazione con le API Laravel tramite **Axios**

---

## 🗂️ Struttura del progetto

project-root/
│
├── backend/ # Progetto Laravel
│ ├── app/
│ ├── routes/api.php
│ ├── database/migrations/
│ ├── config/scout.php
│ └── ...
│
├── frontend/ # Progetto React
│ ├── src/
│ │ ├── components/
│ │ │ ├── CreateArticleForm.jsx
│ │ │ └── ArticleList.jsx
│ │ └── App.jsx
│ └── package.json
│
└── README.md


---

## ⚙️ Installazione e setup

### 🧩 Backend – Laravel

## 📦 Configurazione Scout + TNTSearch

composer require laravel/scout
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
composer require teamtnt/laravel-scout-tntsearch-driver

### Nel file .env

SCOUT_DRIVER=tntsearch

### ⚛️ Frontend – React
npm install
npm run dev

## 🧠 Tecnologie utilizzate

Backend	Laravel 11, Spatie Media Library, Laravel Scout, TNTSearch
Frontend	React, Axios, Vite
Database	MySQL
Altro	Eloquent ORM, Bootstrap 

## 👨‍💻 Autore

Domenico Foglia
Full Stack Developer
🔗 [GitHub – DomenicoFoglia](https://github.com/DomenicoFoglia)

