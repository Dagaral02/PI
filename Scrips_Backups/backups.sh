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

# Crear el archivo de log
log_file="$backup_folder/log_backups.txt"
touch "$log_file"

# Crear el archivo de error_log
error_log_file="$backup_folder/error_log.txt"
touch "$error_log_file"

# Función para comprobar y registrar las carpetas faltantes
check_folder() {
  folder_name="$1"
  if [ ! -d "$folder_name" ]; then
    echo "ERROR: Falta la carpeta $folder_name" >> "$error_log_file"
    echo "ERROR: Falta la carpeta $folder_name"
  fi
}

# Verificar las carpetas de origen
check_folder "$mysql_folder"
check_folder "$www_folder"
check_folder "$uptime_folder"

# Si hay errores, registrar en el archivo de log y salir
if [ -s "$error_log_file" ]; then
  echo "Proceso de copia de seguridad detenido debido a errores"
  echo "Proceso de copia de seguridad detenido debido a errores" >> "$log_file"
  exit 1
fi

# Crear nombre del archivo de respaldo con fecha y hora actual
backup_filename="Backups_$(date +'%Y%m%d_%H%M%S').tar.gz"

# Comprimir las tres carpetas en un solo archivo comprimido
tar -czvf "$backup_folder/$backup_filename" "$mysql_folder" "$www_folder" "$uptime_folder" >> "$log_file" 2>> "$error_log_file"

# Comprobar si hay copias de seguridad antiguas y renombrarlas si es necesario
find "$backup_folder" -type f -name "Backups_*.tar.gz" -mtime +5 -exec sh -c 'mv "$1" "${1%.*}_$(date +'%Y%m%d').tar.gz"' sh {} \; >> "$log_file"

# Registrar el proceso de copia de seguridad en el archivo de log
echo "Copia de seguridad realizada el $(date +'%Y-%m-%d %H:%M:%S')" >> "$log_file"
