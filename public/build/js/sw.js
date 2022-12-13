const nombreCache = 'apv-v3';
const archivos = [
    './',
    './js/app.js',
    './js/apv.js'
];

// Cuando se instala el service worker
self.addEventListener('install', e => {
    console.log('Instalado el serivice worker');

    e.waitUntil(
        caches.open(nombreCache)
            .then(cache => {
                console.log('Abriendo cache');
                cache.addAll(archivos);
            })
    );
});


// Activar el service worker
self.addEventListener('activate', e => {
    console.log('Activado el service worker');

    e.waitUntil(
        caches.keys()
            .then(keys => {
                return Promise.all(
                    keys.filter( key => key !== nombreCache)
                        .map(key => caches.delete(key)) // Borra las versiones anteriores
                );
            })
    );
});

// Evento fetch para descargar archivo estatuco
self.addEventListener('fetch', e => {
    console.log('Fetch', e);
   
    e.respondWith(
      caches
        .match(e.request)
        .then(cacheResponse => (cacheResponse ? cacheResponse : caches.match('error.html')))
    );
});
