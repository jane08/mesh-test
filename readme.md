<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Installing
<p>git clone https://github.com/jane08/mesh-test.git . </p>

#### Install Dependencies
composer install

#### Run Migrations
php artisan migrate

#### Seed Products and Categories
php artisan db:seed


#### If you get an error about an encryption key
php artisan key:generate

#### Install JS Dependencies
npm install

#### Watch Files
npm run watch

## Test API

## Products

#### All Products
/api/products

#### Single Product
/api/product/{product_id}

/api/product/72

#### Create
/api/product-form

#### Update
/api/product-form/{id}

/api/product-form/72

#### Delete
/api/delete/product/{id}

## Categories

#### All Categories
/api/categories

#### Single Category
/api/category/{product_id}

/api/category/36

#### Create
/api/category-form

####  Update

/api/category-form//{id}

/api/category-form/36

#### Delete
/api/delete/category/{category_id}