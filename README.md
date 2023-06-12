# PI

<h1>Preparación del entorno</h1>
Para que todo este listo para la lebantar el contenedor y que funcione primero tenemos que tener instalado docker y docker-compose

- Instalación de docker: https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04-es
- Instalación de docker-compose: https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-20-04-es

<h2>Configuración de docker-compose</h2>
Tenemos que editar el fichero docker-compose ya que no están definidas algunas variables las cuales están indicadas con '#Contraseña' y '#Usuario'.

<h2>Levantamos y comprobamos</h2>
Tras esto ya tendriamos listo y todo configurado para empezar ahora toca antrar en la base de datos mediante phpmuadmin que es el puerto 8400 e ingresar los datos las tablas y los triggers.

<h2>Instalación de Duplicati</h2>
También puede descargarlo desde la interfaz de línea de comandos usando el siguiente comando:


             

              wget https://updates.duplicati.com/beta/duplicati_2.0.6.3-1_all.deb
             
Una vez que se completa la descarga, puede instalarla usando el siguiente comando:


             

              apt install ./duplicati_2.0.6.3-1_all.deb
             
Después de la instalación exitosa, también deberá instalar el paquete mono-completo para evitar errores durante las operaciones de copia de seguridad.


             

              apt install mono-complete -y
             
A continuación, inicie el servicio Duplicati y habilítelo para que se inicie al reiniciar el sistema:


             

              systemctl start duplicati systemctl enable duplicati
             
También puede verificar el estado de Duplicati usando el siguiente comando:


             

              systemctl status duplicati
             
Producción:


             

              ● duplicati.service - Duplicati web-server Loaded: loaded (/lib/systemd/system/duplicati.service; disabled; vendor preset: enabled) Active: active (running) since Sat 2021-09-11 07:26:54 UTC; 6s ago Main PID: 8158 (mono) Tasks: 16 (limit: 2353) Memory: 34.9M CGroup: /system.slice/duplicati.service ├─8158 DuplicatiServer /usr/lib/duplicati/Duplicati.Server.exe └─8173 /usr/bin/mono-sgen /usr/lib/duplicati/Duplicati.Server.exe Sep 11 07:26:54 duplicati systemd[1]: Started Duplicati web-server.
             
De forma predeterminada, Duplicati escucha en localhost en el puerto 8200 . Puedes comprobarlo usando el siguiente comando:


             

              ss -antpl | grep 8200
             
Producción:


             

              LISTEN 0 50 127.0.0.1:8200 0.0.0.0:* users:(("mono-sgen",pid=8173,fd=9))
             
 Configurar el archibo de configuración y colocar esta linea para que pueda salir al esterior
 duplicati-server --webservice-interface=any --webservice-port=8200 --webservice-allowed-hostnames=*
