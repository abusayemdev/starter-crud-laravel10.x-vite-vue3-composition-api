// resources/js/helper/routeHelper.js

//route for laravel named route in vue component
export function route(name, parameters) {
    const base_url = localStorage.getItem('base_url');
    
    if (name.endsWith('.index') || name.endsWith('.store') ||  name.endsWith('.show') || name.endsWith('.update') || name.endsWith('.destroy')) {
        name = name.replace(/\.(index|store|show|update|destroy)$/, '');
    }

    let routeUrl = name.replace(/\./g, '/');
    let urlWithParameters = `${base_url}/${routeUrl}`;

    if (parameters) {
        const paramValues = Object.values(parameters);
        if (paramValues.length > 0) {
            urlWithParameters += `/${paramValues.map(encodeURIComponent).join('/')}`;
        }
    }

    if (name.endsWith('.edit')) {
        urlWithParameters += '/edit';
        urlWithParameters = urlWithParameters.replace(/^(.*\/)edit(\/.*)$/, '$1$2');
    }

    urlWithParameters = urlWithParameters.replace(/([^:])\/\/+/g, '$1/');
    return urlWithParameters;
}




// asset for laravel public asset file in vue component
export function asset(path) {
    let base_url = localStorage.getItem('base_url');
    let urlWithParameters = base_url + '/' + path;
    return urlWithParameters;
}

