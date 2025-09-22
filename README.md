# Reverb Chat 💬

A real-time chat web application with a Laravel backend using Reverb for WebSockets, and a frontend built with Blade and Tailwind

[GitHub Repository](https://github.com/Nima8FT/Reverb-Chat-App)

Version: [1.0.0]

## Table of Contents

1. [🚀 Overview](#1-overview)
2. [✨ Features](#2-features)
3. [🛠️ Installation](#3-installation)
4. [⚙️ Configuration](#4-configuration)
5. [💻 Usage](#5-usage)
6. [🧪 Running Tests](#7-running-tests)
7. [🤝 Contributing](#8-contributing)
8. [📝 License](#9-license)

---

### 1. Overview

is a real-time web chat application built with Laravel on the backend and Reverb for WebSocket-powered messaging, allowing instant communication without page reloads. The frontend is designed using Blade templates and Tailwind CSS, providing a responsive and user-friendly interface. The application includes a robust authentication system, enabling users to securely register, log in, manage their profiles, and chat seamlessly with their friends in real time.

---

### 2. Features

- **Real-time Chat** – Instantly send and receive messages using Reverb WebSockets
- **User Authentication** – Secure login, registration, and logout
- **Responsive Frontend** – Built with Blade and Tailwind CSS for a smooth user interface
- **Media Upload** – Upload profile pictures and chat attachments
- **Database Storage** – All messages are stored in the database for persistence
    
---

### 3. Installation

```bash
git clone https://github.com/Nima8FT/Reverb-Chat-App.git
cd Reverb-Chat-App
composer install
npm install
cp .env.example .env
php artisan install:broadcasting
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```

---

### 4. Configuration

Update your `.env` file with the proper DB credentials and configuration reverb & echo

---

### 5. Usage

- Web routes are accessible via your browser.

---

### 6. Running Tests

```bash
php artisan test
```

---

### 7. Contributing

1. Fork this repository.
2. Create a branch: `git checkout -b my-feature`.
3. Make your changes and commit them: `git commit -m 'Add some feature'`.
4. Push to the branch: `git push origin my-feature`.
5. Submit a pull request.

---

### 8. License

This project is open-sourced software

---
