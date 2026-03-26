

# CollectoVerse


## Initialisation

### Cloner le repo Git
```
git clone https://github.com/matpaaa/collectoVerse.git
```

### Installer les packages
```
composer install
```


## Architecture

### Dossier: **public**

- **index.php** --> Fichier PHP charger par défaut
- **assets/** --> Dossier contenant toutes les assets
- **assets/logo** --> Dossier contenant les logos
- **assets/items** --> Dossier contenant les images des cartes

### Dossier: **src**

- **Controller/** --> L'ensemble des controllers
- **Service/** --> Logique métier du code
- **Repository/** --> Rêquetes SQL pour la base de données
- **Model/** --> Model de données
- **Routes/** --> Routes API
- **Core/** --> Fichiers essentiels au bon fonctionnement