# EndroidQr laravel bundle
EndroidQr bundle for laravel 5.3

all credit goed to Endroid for creating his bautiful QR package.
I just made a bundle\wrapper to make it easy to use in laravel 5.3

composer require dijkma/endroid-qrcode-bundle

add
Dijkma\EndroidQrLaravelBundle\src\EndroidQrServiceProvider::class to the providers array
```php
 'providers' => [
    ...
    Dijkma\EndroidQrLaravelBundle\src\EndroidQrServiceProvider::class,
 ]
```

And to use the blade directive

````php
'aliases' => [
    ...
    'QR' => \Dijkma\EndroidQrLaravelBundle\src\Facades\EndroidQr::class,
]
````