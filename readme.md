Lavalite package that provides seller management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `shopping/seller`.

    "shopping/seller": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Shopping\Seller\Providers\SellerServiceProvider::class,

And also add it to alias

    'Seller'  => Shopping\Seller\Facades\Seller::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Shopping\\SellerTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Shopping\Seller\Providers\SellerServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Shopping\Seller\Providers\SellerServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Shopping\Seller\Providers\SellerServiceProvider" --tag="view"


## Usage


