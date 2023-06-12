#!/bin/bash

# Variables de las carpetas de origen
mysql_folder="../mysql"
www_folder="../www"
uptime_folder="../uptime-kuma-data"

# Carpeta de destino para las copias de seguridad
backup_folder="../Backups"

# Comprobar si la carpeta de respaldos existe, y si no, crearla
if [ ! -d "$backup_folder" ]; then
  mkdir -p "$backup_folder"
  echo "Directorio de copias de seguridad creado" >> "$log_file"
fi

# Crear nombre del archivo de respaldo con fecha y hora actual
backup_filename="Backups_$(date +'%Y%m%d_%H%M%S').tar.gz"

# Comprimir las tres carpetas en un solo archivo comprimido
tar -czvf "$backup_folder/$backup_filename" "$mysql_folder" "$www_folder" "$uptime_folder"

# Crear el archivo de log
log_file="$backup_folder/log_backups.txt"
touch "$log_file"

# Comprobar si hay copias de seguridad antiguas y renombrarlas si es necesario
find "$backup_folder" -type f -name "Backups_*.tar.gz" -mtime +5 -exec sh -c 'mv "$1" "${1%.*}_$(date +'%Y%m%d').tar.gz"' sh {} \; >> "$log_file"

# Registrar el proceso de copia de seguridad en el archivo de log
echo "Copia de seguridad realizada el $(date +'%Y-%m-%d %H:%M:%S')" >> "$log_file"