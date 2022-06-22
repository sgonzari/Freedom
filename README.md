# Freedom
<p align="center">
    <img width="100" height="100" src="https://user-images.githubusercontent.com/45594459/173252393-7770e57a-a3b6-4fb2-9f86-5eb8a51ba70f.svg">
</p>

__Freedom__ es una red social de tipo publicación con el fin de llegar al máximo número de personas. __Freedom__ pretende ser una red social con la que las personas se sientan comodas y puedan expresar su opiniones y/o sentimientos hacia algo y/o alguien. __Freedom__ tiene el objetivo de mostrar a todos sus usuarios las publicaciones del resto de usuarios sin ningún tipo de tabú. __Freedom__ tiene de compromiso que el usuario se sienta cómodo y seguro en dicha red social.


## Tabla de Contenidos
- [Contenido de Usuario](#user)
    - [Manual de Usuario](https://github.com/SrCbas/Freedom/blob/main/Freedom%20-%20Manual%20de%20Usuario.pdf)
- [Contenido de Desarrollador](#developer)
    - [Descripción](#developer_description)
    - [Tecnologías](#developer_tecnologies)
        - [Front-End](#tecnologies_frontend)
        - [Back-End](#tecnologies_backend)
        - [Despliegue Web](#tecnologies_deploy)
    - [ToDo - List](#developer_todo)
    - [Checkpoint - 13/05/22](#developer_checkpoint)
    - [Presentación - Final](https://youtu.be/tRVNmPYEKsM)
    - [Bibliografías](#developer_bibliography)

<br/>

<a name="user" />
    
## Contenido de Usuario

<a name="user_manual" />
    
### [Manual de Usuario](https://github.com/SrCbas/Freedom/blob/main/Freedom%20-%20Manual%20de%20Usuario.pdf)
    
<br/>
<br/>    

<a name="developer" />
    
## Contenido de Desarrollador
    
    
<a name="developer_description" />

### Descripción
__Freedom__ constará de 2 caras, usuarios y moderadores. Los usuarios podrán subir a la red social cualquier tipo de publicación, dar me gustas a cualquier publicación, seguir a más usuarios, comentar publicaciones... e infinidad de cosas. Mientras que los moderadores, podrán realizar lo anteriormente comentado pero pudiendo eliminar y dar _"Toques de atención"_ a los usuarios con un comportamiento nefasto en la red social.
__Freedom__ tendrá en cuenta a los usuarios que solo busquen _"el mal"_ en la red social y estos serán sancionados.

<br />

<a name="developer_tecnologies" />

### Tecnologías
Freedom, al ser una aplicación web, su tecnología se divide en diferentes partes:


<a name="tecnologies_frontend" />

#### Front-End
<p align="center">
    <img src="https://github.com/MikeCodesDotNET/ColoredBadges/blob/master/svg/dev/languages/html.svg" />
    <img src="https://github.com/MikeCodesDotNET/ColoredBadges/blob/master/svg/dev/languages/css3.svg" />
    <img src="https://github.com/MikeCodesDotNET/ColoredBadges/blob/master/svg/dev/languages/sass.svg" />
    <img src="https://github.com/MikeCodesDotNET/ColoredBadges/blob/master/svg/dev/languages/js.svg" />
    <img src="https://github.com/MikeCodesDotNET/ColoredBadges/blob/master/svg/dev/frameworks/jquery.svg" />
</p>


<a name="tecnologies_backend" />

#### Back-End
<p align="center">
    <img src="https://github.com/MikeCodesDotNET/ColoredBadges/blob/master/svg/dev/languages/php.svg" />
    <img src="https://github.com/MikeCodesDotNET/ColoredBadges/blob/master/svg/dev/frameworks/laravel.svg" />
</p>

##### Base de Datos
<p align="center">
    <img src="https://user-images.githubusercontent.com/45594459/164092891-8c8b1108-2734-4800-a7b1-1d117ffab372.png">
</p>


<a name="tecnologies_deploy"/>

#### Despliegue Web
La aplicación web se desplegará AWS. La estructura contará con una máquina EC2 (donde se alojará la aplicación web [Front-End & Back-End]) y un RDS donde estará alojada la Base de Datos. Al servidor solo se podrá acceder mediante SSH y con un llave privado mientras que al RDS solo se tendrá acceso desde la IP del mismo servidor, haciendo así que aumente la seguridad y privacidad de toda la información de __Freedom__.
<p align="center">
    <img src="https://github.com/MikeCodesDotNET/ColoredBadges/blob/master/svg/dev/services/aws.svg" />
</p>

<br />
    
<a name="developer_todo" />
    
### [ToDo - List](https://trello.com/b/bPHRfRvK/freedom)

<br />

<a name="developer_checkpoint" />

### [Checkpoint - 13/05/22](https://youtu.be/-D9dt_9zRuU)

<br />

### [Presentación - Final](https://youtu.be/tRVNmPYEKsM)

<br />

<a name="developer_bibliography" />

### Bibliografías

- [Documentación Laravel](https://laravel.com/docs/9.x)
- [Documentación Livewire](https://laravel-livewire.com/docs/2.x/quickstart)
- [Empezando con Livewire](https://www.youtube.com/watch?v=Ax4pT8XDR-0&list=PLZ2ovOgdI-kWqCet33O0WezN14KShkwER)
- [Desplegando en AWS](https://www.youtube.com/watch?v=W2fQFbkEQo0)
