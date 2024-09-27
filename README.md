# Prueba técnica

El contenido de este archivo va dirigido a la persona que revisará y evaluará este repositorio de código: menciona algunas consideraciones que tuve a la hora de resolver la prueba técnica e incluye las respuestas a las preguntas del documento de la misma.

### Consideraciones

La razón por la cual considero que hay inconsistencias en como se plantea el problema a resolver en la prueba técnica tiene que ver con como se describe el 
problema y con el prototipo realizado en **Figma**, el cual parece tener un enfoque diferente, me explico, en el planteamiento del problema hay un ítem que 
dicen lo siguiente:

<img src="storage/app/public/psa_image_1.png" width="600">

Lo cual quiere decir que deben existir dos entidades o tablas en la base de datos de la aplicación Laravel las cuales podrían llamarse `empleados` y `cargos` 
y que deberían estar relacionadas con una relación de varios a varios, pero si prestamos atención al prototipo de la aplicación hecho en **Figma**, 
concretamente en el formulario de creación de un nuevo cargo que hay en el CRUD de cargos.

<img src="storage/app/public/psa_image_2.png" width="600">

En este formulario se le pide al usuario que realice una búsqueda del empleado que quiere asociar al nuevo cargo, sin embargo, ya que la relación que existe entre las dos entidades (`empleados` y `cargos`) es de varios a varios debería brindársele al usuario la opción de asociar al nuevo cargo con más de un empleado, ya que, utilizando este formulario tal cual aparece en el prototipo solo se podrían asociar los nuevos cargos creados con un solo empleado y solo se podrían definir dos empleados con el mismo cargo creando un nuevo cargo con el mismo nombre y las mismas características de uno ya existente.

Por lo anterior, para este prototipo realizado en Figma, sería mas adecuado si la relación entre las entidades (o tablas) fuera de tipo 
uno a uno.

### Pregunta de la prueba.

Marca unicamente las opciones con las que has trabajado.

<img src="storage/app/public/psa_image_3.png" width="500">

### Respuesta.

**ORM**

- Getting Started ✅
- Relationships ✅
- Collections ✅
- Mutators / Casts ✅
- API Resources ✅
- Serialization ✅

**Básico**

- Routing ✅
- Middleware ✅
- CSRF Protection ✅
- Controllers ✅
- Requests ✅
- Responses ✅
- Views ✅
- Blade Templates ✅
- URL Generation ❌
- Session ✅ 
- Validation ✅
- Error Handling ✅
- Logging ✅

**Seguridad**

- Authentication ✅
- Authorization ✅
- Email Verification ✅
- Encryption ✅
- Hashing ✅
- Password Reset ✅

**Bases de datos**

- Getting Started ✅
- Query Builder ✅
- Pagination ✅
- Migrations ✅
- Seeding ✅
- Redis ❌

### Comentarios finales

Esta aplicación Laravel fue desarrollada en un solo día por lo que no es un producto de alta calidad. En mi experiencia, con un poco mas de tiempo se 
podrían pulir aún más los acabados, el diseño UI y la lógica de esta aplicación, además, deje de lado algunas características con el fin de terminar la 
prueba técnica a tiempo, como lo es el caso del lugar de residencia del empleado el cual debía estar conformado por un departamento y una cuidad que se 
seleccionarían de forma progresiva, sin 
embargo, descarte agregar esta característica al formulario de creación de empleados por cuestión de tiempo, aun así esto se puede lograr facilmente 
integrado la aplicación con la API de [Country State City API](https://countrystatecity.in).

Espero haber realizado un buen trabajo y haber cumplido con las expectativas del responsable de la revisión de este proyecto.