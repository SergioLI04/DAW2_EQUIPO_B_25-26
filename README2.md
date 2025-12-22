# ⛰️​ Gestión de Rutas en Actividades al Aire Libre | DAW1_EQUIPO2_2425

![Banner del Proyecto](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/main/Recursos/Logo.png?raw=true)

## 📋 Descripción del proyecto
Un proyecto de gestión de rutas al aire libre para los alumnos del IES Ricardo Bernardo que cuenta con los siguientes elementos:
+ Aplicación de escritorio en Java para la gestión de rutas y usuarios. 
+ Base de datos que permita gestionar rutas, usuarios y resto de elementos necesarios.
+ Web con información del proyecto, muestrario de rutas y galería de imágenes.

### Elementos relevantes:

- Sistema de roles (Administrador, Diseñador, Profesor, Alumno, Usuario).
- Procesamiento automático de archivos GPX/CSV y GPX/HTML.
- Generación de fichas técnicas (seguridad, usuario, organización).
- Servidores desplegados (BBDD MySQL + Web Apache).

## 💾 Tecnologías
| Área          | Stack                                                                 |
|---------------|-----------------------------------------------------------------------|
| **Frontend**  | ![Java](https://img.shields.io/badge/Java-Swing-orange) ![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white) |
| **Backend**   | ![MySQL](https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white) ![XSLT](https://img.shields.io/badge/XSLT-FF8C00?logo=xml&logoColor=white) |
| **DevOps**    | ![Apache](https://img.shields.io/badge/Apache-D22128?logo=apache&logoColor=white) ![FTP](https://img.shields.io/badge/FTP-FF6C37?logo=ftp&logoColor=white) ![SSH](https://img.shields.io/badge/SSH-241F31?logo=ssh&logoColor=white) |

### 🏆 **Integrantes**  
| Nombre   | Rol            |
|----------|---------------|
| 👤 **Darío Briongos García**         | Co-portavoz |
| 📝 **Brylin Enmanuel Chávez**        | Secretario |
| 📌 **Guillermo San Emeterio García** | Coordinador |
| 💻 **Sergio López Iglesias**         | Co-portavoz |
| 🎨 **Jimena Fernández Labrador**     | Programadora |

## 📃​ DESGLOSE DEL PROYECTO
 
### 🗃️ **Implementación de la base de datos**

Para implementar la base de datos sobre la que se basa el proyecto hemos llevado a cabo los siguientes procesos: 
 
- [📰 Diagrama E/R](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/main/Documentaci%C3%B3n/Diagrama%20Entidad%20Relaci%C3%B3n.png)
- [📰 Script de la base de datos](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/a086469db47e172d3844d11bb17f6ddaf654090d/Documentaci%C3%B3n/Script.sql)
- [📰 Ingeniería inversa de la base de datos](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/a086469db47e172d3844d11bb17f6ddaf654090d/Documentaci%C3%B3n/Ingenier%C3%ADa%20inversa.png)  
- [📰 Triggers SQL programados para la base de datos](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/bb43eef4c7f82709ddf5a9a2a61f05ef5347bc68/Documentaci%C3%B3n/Triggers.sql)
---
### ⌨️ **Despliegue de servidores**

Pasos llevados a cabo para desplegar los servidores y enlace para acceder a ellos: 
 
- [📰 Guía de despliegue](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/2d75ffdf00ea66a00df664164cef5d938e7bac23/Documentaci%C3%B3n/Gu%C3%ADa%20de%20Despliegue.pdf)
- [📰 OVA](https://educantabria.sharepoint.com/:f:/r/sites/RETODAM1DAM12025-39009471-DAW1-EQUIPO2/Documentos%20compartidos/DAW1-EQUIPO2/Servidor?csf=1&web=1&e=IrKP9m)
---
 
### 💻 **Desarrollo de la aplicación de escritorio Java**

Elementos y documentación de la aplicación Java.

- [📰 Diagrama de clases](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/main/Documentaci%C3%B3n/Diagrama%20de%20Clases.png)
- [📰 Casos de uso](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/80c48e3610ceaca32a5e86ddad629f2737a14d58/Documentaci%C3%B3n/Casos%20de%20Uso.pdf)
- [📰 Plantilla de Manual de Usuario](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/main/Documentaci%C3%B3n/Plantilla%20de%20Manual%20de%20Usuario.pdf)  
- [📰 Plantilla Guía de despliegue de la aplicación](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/main/Documentaci%C3%B3n/Plantilla%20de%20Gu%C3%ADa%20Desplegable.pdf)
- [📰 Manual de Usuario](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/21cd71edd66bcde6f11e699ca808cb95924bf74e/Documentaci%C3%B3n/Manual%20de%20Usuario%20de%20la%20Aplicaci%C3%B3n.pdf) 
---
 
### 🏃‍♂️​ **Conversión de archivos GPX**

Plantillas utilizadas para convertir los archivos de las rutas en su formato nativo GPX.

- [📰 Plantilla XSLT para la conversión de GPX a CSV](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/83ccb673df8277e301c620b1532234894660e7b0/Documentaci%C3%B3n/Plantilla%20CSV.xslt)
- [📰 Plantilla XSLT para la conversión de GPX a HTML](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/bb43eef4c7f82709ddf5a9a2a61f05ef5347bc68/Documentaci%C3%B3n/Plantilla%20XSLT%20HTML.xslt)

  
---
  
### 👨‍💻​ **Desarrollo de la página web**

Página web del proyecto y la documentación que describe su estructura.
 
- [📰 Web](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/tree/21cd71edd66bcde6f11e699ca808cb95924bf74e/Pagina%20web)
- [📰 Documentación Web](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/bb43eef4c7f82709ddf5a9a2a61f05ef5347bc68/Documentaci%C3%B3n/Documentaci%C3%B3n%20Web.pdf)
 
---
 
### 💼 **Tareas desarrolladas para Itinerario Personal para la Empleabilidad I**

Ejercicios y trabajos realizados en el marco del módulo IPEI.

- [📰 Tarea sobre Seguridad Social - Infografía](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/90ce3275619c728c0fdd266b5471243183555811/Documentaci%C3%B3n/Tarea%20IPEI%20Seguridad%20Social%20-%20Infograf%C3%ADa.pdf)
- [📰 Tarea sobre Seguridad Social -  Caso Práctico](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/90ce3275619c728c0fdd266b5471243183555811/Documentaci%C3%B3n/Tarea%20IPEI%20Seguridad%20Social.pdf)
- [📰 Tarea sobre Factores de Riesgo](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/91ed475c838c21c9d7cdd285b52cddc19724d85e/Documentaci%C3%B3n/Factores%20de%20riesgo%20-%20Identificaci%C3%B3n%20-%20Matriz%20-%20Medidas.pdf)
- [📰 Tarea sobre Protocolo de Seguridad y Emergencias](https://github.com/gsanemeteriog/DAW1_EQUIPO2_2425/blob/d1bf3e6f7c8eecf912c82f3ee2d73be460147a5b/Documentaci%C3%B3n/Protocolo%20de%20Seguridad%20y%20Emergencias%20.pdf)

---
 
### 📃​ **DOCUMENTACION**

- [📄 README (este documento)](README.md)
 
---
 

## 📂 Estructura del Proyecto

```plaintext
DAW1_EQUIPO2_2425/
├── app/                  # Código Java (NetBeans Project)
│   ├── src/              # Fuentes Swing
│   └── lib/              # Dependencias
├── web/                  # Sitio HTML/CSS
│   ├── assets/           # Imágenes y estilos
│   └── index.html        # Página principal
├── sql/                  # Scripts de la Base de Datos
│   ├── schema.sql        # Estructura de la BBDD
│   └── triggers.sql      # Disparadores y funciones
├── docs/                 # Documentación del proyecto
│   ├── Manual_Usuario.pdf
│   └── Guia_Despliegue.pdf
└── media/                # Recursos gráficos y multimedia
```