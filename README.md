# 🧵 La Cremallera — Sistema de Gestión Web para Tienda de Costura

**CFGS Desarrollo de Aplicaciones Web — Proyecto Final**  
**Centro:** IES Miguel Herrero (o el centro correspondiente)  
**Equipo:** DAW2 — EQUIPO B  
**Repositorio:** [https://github.com/Pablogg25/DAW2_EQUIPO_B_25-26](https://github.com/Pablogg25/DAW2_EQUIPO_B_25-26)

---

## 👥 Integrantes del equipo

- Gustavo Rodrigo Bautista Pocohuanca
- Pablo Núñez Sanchez
- Sergio López Iglesias
- Pablo González García

---

## 📘 Asignaturas involucradas (curso 25–26)

- **DWEC (Cliente):** JavaScript, DOM, consumo de API
- **DWES (Servidor):** PHP 8.x, arquitectura MVC/REST, seguridad
- **Diseño de Interfaces Web:** diseño responsive, accesibilidad, maquetación
- **Despliegue de Aplicaciones Web:** entornos, hosting, CI/CD
- **DevOps:** Docker, automatización, GitHub Actions
- **Bases de Datos:** modelado, SQL, procedimientos

---

## 🎯 Objetivo del proyecto

Diseñar y desarrollar una **aplicación web profesional** para la gestión integral de la tienda de costura **La Cremallera**, permitiendo centralizar todas las operaciones del negocio:

- Gestión de clientes y usuarios
- Registro de prendas y seguimiento
- Gestión de trabajos de costura de principio a fin
- Control de inventario y materiales
- Facturación automática y descarga de documentos
- Sistema de notificaciones (correo)
- Interfaz moderna y accesible
- Despliegue automatizado y entorno reproducible

---

## 🧩 Funcionalidades principales

### Usuarios y clientes

- Inicio/cierre de sesión con seguridad y cifrado
- Control de roles (empleado/administrador)
- Gestión completa del cliente: registro, edición y seguimiento

### Prendas

- Registro de prendas y tipos
- Actualización y listado por cliente
- Asociación automática con trabajos

### Trabajos de costura

- Creación de un trabajo a partir de una prenda
- Asignación de empleado responsable
- Estados del trabajo: pendiente, en proceso, terminado, entregado
- Control de fechas: inicio y entrega
- Recordatorios automáticos por email

### Inventario

- Alta de productos y materiales
- Control de stock y cantidades mínimas
- Alertas automáticas cuando el inventario baja de umbral
- Consumo de materiales asociado a un trabajo

### Facturación

- Generación automática de facturas por trabajo o conjunto de trabajos
- Cálculo de importes, IVA, total
- Descarga de factura en PDF
- Historial por cliente

### Notificaciones

- Envío de correos por estado del trabajo
- Recordatorios cercanos a la fecha de entrega

---

## 🛠 Tecnologías utilizadas

- **Frontend:** HTML5, CSS3, JavaScript (ES6+), React
- **Backend:** PHP 8 / Laravel
- **BBDD:** MySQL / MariaDB
- **Servidor:** Apache / Nginx
- **Contenedores:** Docker, docker-compose
- **CI/CD:** GitHub Actions
- **Librerías adicionales:**
  - PHPMailer (emails)
  - DomPDF / FPDF (PDFs)
  - Figma (diseño de UI)

---

## 🤝 Flujo de trabajo (contribución)

1. Crear rama por funcionalidad (`feature/nombre-funcionalidad`).
2. Hacer commits descriptivos y frecuentes.
3. Abrir Pull Request hacia `main`.
4. Validación automática mediante CI/CD.
5. Revisión y merge.

---

## 🗓 Cronograma del proyecto (plantilla)

- **Fase 1 — Análisis y diseño:** [26 de Septiembre / 4 de Diciembre]
- **Fase 2 — Backend / API:** [17 de Diciembre / 23 de Diciembre]
- **Fase 3 — Frontend / UI:** [fechas]
- **Fase 4 — Integración, pruebas y despliegue:** [fechas]
- **Entrega final:** [Mediados de Febrero]

---

## 📃 DEGLOSE DEL PROYECTO

### 🗃️ **Implementación de la base de datos**

Para implementar la base de datos sobre la que se basa el proyecto hemos llevado a cabo los siguientes procesos: 

- [📰 Diagrama E/R]()
- [📰 Script de la base de datos](https://github.com/Pablogg25/DAW2_EQUIPO_B_25-26/blob/main/Base%20de%20Datos/LaCremalleraBD_Actualizada.sql)

---

### 💻 **Desarrollo de la aplicación**

Elementos y documentación de la aplicación.

- [📰 Diagrama de clases]()
- [📰 Diseño físico lógico de red](https://github.com/Pablogg25/DAW2_EQUIPO_B_25-26/blob/main/Documentaci%C3%B3n/Dise%C3%B1o%20f%C3%ADsico_l%C3%B3gico_%20red.png)

---

### 👨‍💻​ **Desarrollo de la página web**

Página web del proyecto y la documentación que describe su estructura.
 
- [📰 Web]()
 
---

## 📌 Licencia

Licencia a definir por el equipo (MIT probablemente).

---

## 📬 Contacto

- **Profesor/Tutor:** [Alejandro Federico López Camus, aflopezc01@educantabria.es]
- **Portavoz:** [Pablo González García, Pgonzalezg12@educantabria.es/[GitHub](https://github.com/Pablogg25)]

---

© 2025 — Proyecto DAW2 — Equipo B — La Cremallera
