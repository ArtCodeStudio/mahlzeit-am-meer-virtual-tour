# Mahlzeit am Meer - Virtual Tour

Ein 360° virtueller Rundgang für das Restaurant "Mahlzeit am Meer" in Cuxhaven-Duhnen.

## Features
- Mehrere Panorama-Ansichten
- Interaktive Hotspots und Infospots
- Responsive Design (Desktop/Mobile)

## Technologie
- krpano Virtual Tour
- HTML5/Flash
- Nginx als Webserver

## Verzeichnisstruktur
- `index.html` - Hauptdatei für die Tour
- `cyvt.xml` - Tour-Konfiguration
- `private.xml` - Private Tour-Variante
- `panos/` - Panorama-Bilddaten und Tiles
- `panos_xml/` - Konfiguration für einzelne Panoramen
- `img/` - UI-Elemente, Buttons, Icons
- `infospot/` - Infospot-Styles und Overlays
- `skin/` - UI-Themes
- `plugins/` - krpano Plugins

## Installation

1. **Dateien hochladen** auf den Server nach `/var/www/virtual-tour`

2. **Nginx konfigurieren:**
   ```bash
   sudo cp virtual-tour-nginx.conf /etc/nginx/sites-available/virtual-tour
   sudo ln -s /etc/nginx/sites-available/virtual-tour /etc/nginx/sites-enabled/
   sudo nginx -t
   sudo systemctl reload nginx
   ```

3. **Backend läuft auf Port 8080:**
   ```
   http://dein-server:8080/
   ```

4. **Reverse Proxy einrichten:**
   Der Reverse Proxy verweist auf Port 8080 und übernimmt SSL-Terminierung.

## Konfiguration

- **Start-Panorama ändern:** Bearbeite Zeile 6 in `cyvt.xml`
- **Hotspots bearbeiten:** Direkt in `cyvt.xml` jeder Szene
- **Panorama-Blickwinkel:** In `panos_xml/*.xml` Dateien

## URLs

- Öffentliche Tour: `http://dein-server:8080/`
- Direkte Szene: `http://dein-server:8080/?startscene=scene_am0226`