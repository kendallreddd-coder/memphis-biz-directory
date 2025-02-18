#!/bin/bash
BACKUP_DIR="/var/backups/directory"
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
sqlite3 /var/www/directory.sqlite3 ".backup '$BACKUP_DIR/backup_$TIMESTAMP.sqlite3'"
gzip "$BACKUP_DIR/backup_$TIMESTAMP.sqlite3"
