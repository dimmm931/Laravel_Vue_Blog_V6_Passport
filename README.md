## Blogging CMS platform on Laravel/Vue JS

> Uses Vue JS, Vuex Store, Vue Router, Passport Api Bearer token Header Authentication, Spatie RBAC, UI Toolkit Element-UI, LightBox library.
> Users can view all DB records and create new. Admin can edit and delete records.

### Content
- [1. Installation manual](#1-installation-manual)
- [2. Screenshots](#2-screenshots) 
- [3. Specifics](#3-specifics-description) 


## 1. Installation Manual
- <p>To run the application on <b>http://localhost</b>, copy the repository code and run <b>composer install</b> to load all dependencies. </p>
- <p>Create root file <b>.env</b> with your DB seetings based on  <b>.env.example</b>.</p>
- <p>Run <b> php artisan key:generate </b> </p>
- <p>Use <b> php artisan migrate </b> to migrate databases</p>
- <p>When the migration is completed, run the seeding command <b> php artisan db:seed </b> to seed the dummy data, after you may login using login: <b>test@gmail.com</b>, password: <b>testtest</b>. </p>
- <p>Js assets are minified and concatenated with Laravel Mix, source code is in <b>/resources/assets</b>, 
    to manage JS dependencies run <b>npm install</b>, 
    to minify js files run <b>npm run production</b>, to automate your build when there is any change use <b> npm run watch </b></p>
- <p>If encounter error <b> cross-env not found </b> , firstly run command <b>npm i cross-env --save</b> </p>
- <p>To init Passport seetings, run <b> php artisan passport:install </b> </p>
- <p> You may login as Admin with credential: login <b>test@gmail.com</b>, password <b>testtest</b> </p>


## 2. Screenshots
> Brief overview of the application

## Blog front page

![Screenshot](public/images/Screenshots/6.png)

![Screenshot](public/images/Screenshots/1.png)

## View in modal window

![Screenshot](public/images/Screenshots/2.png)

## View in router

![Screenshot](public/images/Screenshots/3.png)

## Create new article

![Screenshot](public/images/Screenshots/4.png)

## Unauthenticated request. Bearer token is missing/incorrect

![Screenshot](public/images/Screenshots/5.png)

![Screenshot](public/images/Screenshots/5.1.png)

## Admin Part with option to Edit/Delete

![Screenshot](public/images/Screenshots/10.png)

## Admin Part -> Edit a Post

![Screenshot](public/images/Screenshots/10.1.png)

![Screenshot](public/images/Screenshots/11.png)

## Client-side validation

![Screenshot](public/images/Screenshots/11.1.png)

## Server-side validation

![Screenshot](public/images/Screenshots/12.png)

![Screenshot](public/images/Screenshots/13.png)

## Admin Part -> Validation OK

![Screenshot](public/images/Screenshots/14.png)

## Admin Part -> Delete a Post

![Screenshot](public/images/Screenshots/15.png)

![Screenshot](public/images/Screenshots/16.png)
 
## Admin Part is protected with Spatie RBAC middleware and available for users with Admin rights only

![Screenshot](public/images/Screenshots/17.png)

## Login via Passport Api

![Screenshot](public/images/Screenshots/18.png)
![Screenshot](public/images/Screenshots/19.png)



## 3. Specifics Description
- <p>Laravel Framework 6.20. Rest Api Blog on Vue + Vuex Store + Vue Router + Passport Api Bearer token Header Authentication. </p>
- <p>Passport Api Authentication  <p>
- <p>Spatie Laravel-permission RBAC. Admin Part is protected with Spatie Laravel-permission RBAC, available for users with Admin rights only </p>
- <p>Axios, Fetch or $.ajax({})  </p>
- <p>Uses UI Toolkit Element-UI, Vue 2.0 based component library. </p>
- <p>Login/password auth via Passport token, REST API auth via Passport Bearer token . </p>
- <p>Blog with images with LightBox plugin </p>
- <p>Loaded via ajax, Rest Api Endpoints </p>
- <p>Uses Vuex Store </p>
						
	
	
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
