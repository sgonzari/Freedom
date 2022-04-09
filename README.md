# Freedom

## Temática & Objetivos
__Freedom__ es una red social de tipo publicación con el fin de llegar al máximo número de personas. __Freedom__ pretende ser una red social con la que las personas se sientan comodas y puedan expresar su opiniones y/o sentimientos hacia algo y/o alguien. __Freedom__ tiene el objetivo de mostrar a todos sus usuarios las publicaciones del resto de usuarios sin ningún tipo de tabú. __Freedom__ tiene de compromiso que el usuario se sienta cómodo y seguro en dicha red social.


## Tecnologías
Las tecnologías que se van a usar para desarrollar __Freedom__ serán:

### Front-End
  - Jquery _(JavaScript)_
  - AJAX _(JavaScript)_
  - HTML5 & CSS3
  - _Angular JS (por determinar en un futuro)_

### Back-End
  - Laravel _(php 8.0)_
  - MariaDB _(mysql)_

### Despliegue
La aplicación web se desplegará en __AWS__ mediante el uso de máquinas virtuales EC2. La aplicación web constará de 2 servidores en los cuales en uno estará la aplicación web (FontEnd & BackEnd) y en el otro estará la base de datos. Esto se hará para aumentar la seguridad y privacidad de la información de __Freedom__.

### Base de datos
Este sería el esquema Entidad-Relación de la base de datos de __Freedom__:
![image](https://user-images.githubusercontent.com/45594459/162577621-4d779543-f16f-48f9-a5db-10b84dde27a4.png)


## Desarrollo
__Freedom__ constará de 2 caras, usuarios y moderadores. Los usuarios podrán subir a la red social cualquier tipo de publicación, dar me gustas a cualquier publicación, seguir a más usuarios, comentar publicaciones... e infinidad de cosas. Mientras que los moderadores, podrán realizar lo anteriormente comentado pero pudiendo eliminar y dar _"Toques de atención"_ a los usuarios con un comportamiento nefasto en la red social.
__Freedom__ tendrá en cuenta a los usuarios que solo busquen _"el mal"_ en la red social y estos serán sancionados.
