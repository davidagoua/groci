<?php

use Illuminate\Support\Facades\Facade;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Groci'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'fr',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'ExampleClass' => App\Example\ExampleClass::class,
    ])->toArray(),


    'villes'=> [
"KOUIBLY"=>"KOUIBLY",
"BIANKOUMA"=>"BIANKOUMA",
"DANANE"=>"DANANE",
"BANGOLO"=>"BANGOLO",
"SIPILOU"=>"SIPILOU",
"ZOUAN HOUNIEN"=>"ZOUAN HOUNIEN",
"FACOBLY"=>"FACOBLY",
"MAN"=>"MAN",
"KOUN-FAO"=>"KOUN-FAO",
"BONDOUKOU"=>"BONDOUKOU",
"SANDEGUE"=>"SANDEGUE",
"TANDA"=>"TANDA",
"NASSIAN"=>"NASSIAN",
"TEHINI"=>"TEHINI",
"DOROPO"=>"DOROPO",
"BOUNA"=>"BOUNA",
"VAVOUA"=>"VAVOUA",
"DALOA"=>"DALOA",
"ZOUKOUGBEU"=>"ZOUKOUGBEU",
"DUEKOUE"=>"DUEKOUE",
"TOULEPLEU"=>"TOULEPLEU",
"BLOLEQUIN"=>"BLOLEQUIN",
"GUIGLO"=>"GUIGLO",
"TAI"=>"TAI",
"ABENGOUROU"=>"ABENGOUROU",
"AGNIBILEKROU"=>"AGNIBILEKROU",
"BETTIE"=>"BETTIE",
"M'BAHIAKRO"=>"M'BAHIAKRO",
"DAOUKRO"=>"DAOUKRO",
"M'BATTO"=>"M'BATTO",
"DIMBOKRO"=>"DIMBOKRO",
"BOCANDA"=>"BOCANDA",
"PRIKRO"=>"PRIKRO",
"OUME"=>"OUME",
"FRESCO"=>"FRESCO",
"GRAND-LAHOU"=>"GRAND-LAHOU",
"SAKASSOU"=>"SAKASSOU",
"NIAKARAMADOUGOU"=>"NIAKARAMADOUGOU",
"KATIOLA"=>"KATIOLA",
"BOUAKE"=>"BOUAKE",
"BOTRO"=>"BOTRO",
"DABAKALA"=>"DABAKALA",
"BEOUMI"=>"BEOUMI",
"KANI"=>"KANI",
"SEGUELA"=>"SEGUELA",
"MANKONO"=>"MANKONO",
"DIANRA"=>"DIANRA",
"DIDIEVI"=>"DIDIEVI",
"TOUMODI"=>"TOUMODI",
"TIEBISSOU"=>"TIEBISSOU",
"AGBOVILLE"=>"AGBOVILLE",
"AKOUPE"=>"AKOUPE",
"ADZOPE"=>"ADZOPE",
"YAKASSE-ATTOBROU"=>"YAKASSE-ATTOBROU",
"TENGRELA"=>"TENGRELA",
"GAGNOA"=>"GAGNOA",
"TRANSUA"=>"TRANSUA",
"GBELEBAN"=>"GBELEBAN",
"ODIENNE"=>"ODIENNE",
"KANIASSO"=>"KANIASSO",
"SAMATIGUILA"=>"SAMATIGUILA",
"MINIGNAN"=>"MINIGNAN",
"MADINANI"=>"MADINANI",
"SEGUELON"=>"SEGUELON",
"GRAND BASSAM"=>"GRAND BASSAM",
"ISSIA"=>"ISSIA",
"KOUNAHIRI"=>"KOUNAHIRI",
"KOUASSI-KOUASSIKRO"=>"KOUASSI-KOUASSIKRO",
"BONGOUANOU"=>"BONGOUANOU",
"ARRAH"=>"ARRAH",
"ADIAKE"=>"ADIAKE",
"ABOISSO"=>"ABOISSO",
"TIAPOUM"=>"TIAPOUM",
"KORO"=>"KORO",
"TOUBA"=>"TOUBA",
"OUANINOU"=>"OUANINOU",
"LAKOTA"=>"LAKOTA",
"DIVO"=>"DIVO",
"GUITRY"=>"GUITRY",
"SOUBRE"=>"SOUBRE",
"SASSANDRA"=>"SASSANDRA",
"TABOU"=>"TABOU",
"SAN-PEDRO"=>"SAN-PEDRO",
"BUYO"=>"BUYO",
"MEAGUI"=>"MEAGUI",
"GUEYO"=>"GUEYO",
"TAABO"=>"TAABO",
"ABIDJAN"=>"ABIDJAN",
"ALEPE"=>"ALEPE",
"TIASSALE"=>"TIASSALE",
"JACQUEVILLE"=>"JACQUEVILLE",
"SIKENSI"=>"SIKENSI",
"DABOU"=>"DABOU",
"OUANGOLODOUGOU"=>"OUANGOLODOUGOU",
"FERKESSEDOUGOU"=>"FERKESSEDOUGOU",
"KOUTO"=>"KOUTO",
"BOUNDIALI"=>"BOUNDIALI",
"M'BENGUE"=>"M'BENGUE",
"DIKODOUGOU"=>"DIKODOUGOU",
"KONG"=>"KONG",
"KORHOGO"=>"KORHOGO",
"SINEMATIALI"=>"SINEMATIALI",
"SINFRA"=>"SINFRA",
"BOUAFLE"=>"BOUAFLE",
"ZUENOULA"=>"ZUENOULA",
"DJEKANOU"=>"DJEKANOU",
"YAMOUSSOUKRO"=>"YAMOUSSOUKRO",
"ATTIEGOUAKRO"=>"ATTIEGOUAKRO",

    ]
];
