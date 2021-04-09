## Installation

Depuis le dossier racine de votre projet

```bash
composer require symfony/webpack-encore-bundle
npm install
npm uninstall stimulus @symfony/stimulus-bridge
rm -rf assets/controllers assets/controllers.json assets/bootstrap.js
```

Si `rm -rf assets/controllers assets/controllers.json assets/bootstrap.js` ne marche pas,

Supprimer le dossier assets/controllers, puis le fichier assets/controllers.json, puis le fichier assets/bootstrap.js

Ouvrir le fichier `webpack.config.js` et **supprimer** les lignes 25-26 :

```jsx
// enables the Symfony UX Stimulus bridge (used in assets/bootstrap.js)
.enableStimulusBridge('./assets/controllers.json')
```

Un peu plus bas, **retirer le commentaire** ligne 64 :

```jsx
// uncomment if you use React
.enableReactPreset()
```


Installer React
`npm install @babel/preset-react@^7.0.0 --save-dev`

Puis
`npm install --dev react react-dom`


Ouvrir le fichier `assets/app.js` et remplacer par les lignes suivantes :

```js
import './styles/app.css';
import React from "react";
import ReactDOM from 'react-dom';
import App from "./js/App";

// start the Stimulus application
// import './bootstrap';

ReactDOM.render(
<App />, document.getElementById('root'));

```

Créer un fichier `js/App.jsx` et ajoutez-y le code suivant :

```js
import React from "react";

export default class App extends React.Component {
render() {
return (
<div>
    Bonjour
</div>
)
}
}
```

Dans un controller, celui de votre choix, créer cette méthode avec la route `/`
```php
<?php
    /**
     * @Route("/", name="base")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }
?>
```


Dans `templates/base.html.twig`
```HTML
{# templates/base.html.twig #}
<!DOCTYPE html>
<html>

<head>
    <!-- ... -->

    {% block stylesheets %}
    {# 'app' must match the first argument to addEntry() in webpack.config.js #}
    {{ encore_entry_link_tags('app') }}

    <!-- Renders a link tag (if your module requires any CSS)
                <link rel="stylesheet" href="/build/app.css"> -->
    {% endblock %}

    {% block javascripts %}
    {{ encore_entry_script_tags('app') }}

    <!-- Renders app.js & a webpack runtime.js file
                <script src="/build/runtime.js" defer></script>
                <script src="/build/app.js" defer></script>
                See note below about the "defer" attribute -->
    {% endblock %}
</head>

<body>
    <div id="root"></div>
</body>

</html>
```



Lancer l'application BACK avec `symfony server:start`, ou `MAMP, XAMP, etc`
Lancer l'application front avec `npm run watch`

