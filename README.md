# BCN Solidària ❤️
**Plataforma digital para la gestión y optimización de donaciones en la ciudad de Barcelona.**

Este proyecto nace de la necesidad de conectar a ciudadanos dispuestos a ayudar con puntos de recogida de alimentos y recursos económicos en zonas vulnerables. Se ha desarrollado como Proyecto Final del Ciclo Formativo de Grado Superior en Administración de Sistemas Informáticos en Red (ASIX).

## 🛠️ Tecnologías utilizadas (Stack LAMP)
*   **S.O.:** Ubuntu Server 22.04.5 LTS virtualizado en Oracle VirtualBox.
*   **Servidor Web:** Apache HTTP Server.
*   **Base de Datos:** MariaDB (Gestión relacional de usuarios y donaciones).
*   **Backend:** PHP para la lógica de negocio y gestión de sesiones.
*   **Frontend:** HTML5, CSS3 y JavaScript para validaciones dinámicas.

## 🔐 Seguridad e Infraestructura
*   **Protección de Datos:** Almacenamiento de contraseñas mediante algoritmo **BCRYPT**.
*   **Seguridad SQL:** Uso sistemático de **Consultas Preparadas (Prepared Statements)** para evitar Inyección SQL.
*   **Firewall:** Configuración restrictiva mediante **UFW** (puertos 22, 80, 443).
*   **Administración:** Acceso remoto seguro mediante protocolo **SSH**.
*   **Backups:** Sistema automatizado de copias de seguridad mediante scripts en Bash y compresión Gzip.

## 🚀 Funcionalidades principales
*   Registro e inicio de sesión de usuarios.
*   Gestión de donaciones económicas (Bizum, Tarjeta, Transferencia).
*   Sistema de donación de alimentos con subida de imágenes.
*   Mapa interactivo de puntos de recogida en Barcelona.
*   Validación de entregas físicas mediante escaneo de códigos **QR**.

## 📂 Repositorio
*   **Autor:** Marín Favro Velo Aló
*   **Centro:** Ilerna (Convocatoria Mayo 2026)