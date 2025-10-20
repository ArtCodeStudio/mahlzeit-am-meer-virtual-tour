# Mahlzeit am Meer - Virtual Tour

A 360° virtual tour for the "Mahlzeit am Meer" restaurant in Cuxhaven-Duhnen.

## Features
- Multiple panoramic views
- Interactive infospots
- Responsive design (desktop/mobile)

## Technology
- krpano (HTML5/Flash)
- PHP authentication system
- Custom infospot functionality

## Structure
- `index.html` - Public version (no authentication)
- `index.php` - Admin version with user management
- `cyvt.xml` - Main tour configuration
- `panos/` - Panoramic image tiles
- `img/` - UI elements and buttons
- `infospot/` - Interactive content overlays

## Usage
For CMS integration, use the `index.html` version and maintain the folder structure.