# Larastarters

<div align="center">
    <p align="center">
        <a href="#get-started">Get started</a> |
        <a href="#available-themes">Available Themes</a> |
        <a href="#features">Features</a> |
        <a href="https://quickadminpanel.com" target="_blank">🔥 QuickAdminPanel</a>
            <br/> <br/>
        <a href="https://packagist.org/packages/LaravelDaily/Larastarters"><img alt="Laravel Version" src="https://img.shields.io/static/v1?label=laravel&message=%E2%89%A59.0&color=0078BE&logo=laravel&style=flat-square"></a>
        <a href="https://packagist.org/packages/LaravelDaily/Larastarters"><img alt="Latest Version" src="https://img.shields.io/packagist/v/LaravelDaily/Larastarters"></a>
        <a href="https://packagist.org/packages/LaravelDaily/Larastarters"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/LaravelDaily/Larastarters"></a>
  </p>
</div>

Larastarters installs a regular Laravel Starter Kit and complements it with a [Design Theme](#available-themes).

The package supports:

- [Laravel Breeze](https://github.com/laravel/breeze) (Tailwind)

- [Laravel UI](https://github.com/laravel/ui) (Bootstrap) starter kit.

<br/>

` ❗ ` **IMPORTANT:**  This package must be used in a **NEW** Laravel project. Existing project functionalities, such as routes or controllers, may be overridden by Larastarters.

---

## Features

Along with the Design Themes, Larastarters adds a few features that are typical for almost any project:

- Profile management form to change name/email/password
- A sample table of Users list
- A sample static text page
- Two-level menu on the sidebar

<br/>

` 🔥 ` **Notice**: Check out our premium product [QuickAdminPanel](https://quickadminpanel.com) for more functionalities and extended features.

## Get Started

Larastarters requires PHP 8+ and Laravel 9+.

1. Create a new Laravel project.

2. Require Larastarters as a dev dependency, run:

    ```shell
    composer require laraveldaily/larastarters --dev
    ```

3. Configure Larastarters, run the command below:

    ```shell
    php artisan larastarters:install
    ```

    Choose your preferred starter kit and Design Theme.

    ![Larastarters Install](https://laraveldaily.com/uploads/2023/02/220314313-d3055051-3997-427d-98df-8bc7bbd34dd7.png)

4. Compile the project assets, run:

    ```shell
    npm install && npm run dev
    ```

5. That's it! You have Laravel Auth starter, just visit the home page and click Log in / Register.

<br/>

### Developing within a container

Internally, this package runs several `php artisan` commands during the installation process.

If you are developing with a container, like Laravel Sail or Docker, you can pass the `--php_version` flag to change this behaviour and avoid problems in the installation process:

```shell
php artisan larastarters:install --php_version=./vendor/bin/sail`.
```

## Available Themes

In the current version, there are 9 themes supported.

**Tailwind Themes with Laravel Breeze**

- [Windmill](https://windmillui.com/dashboard-html)
- [Notus JS](https://www.creative-tim.com/product/notus-js)
- [Tailwind Components](https://github.com/tailwindcomponents/dashboard)

Example screenshots from Windmill theme:

![Register](https://laraveldaily.com/wp-content/uploads/2021/10/Screenshot-2021-10-26-at-07.24.59.png)

![Dashboard](https://laraveldaily.com/wp-content/uploads/2021/10/Screenshot-2021-10-26-at-07.25.32.png)

**Bootstrap Themes with Laravel UI**

- [Core UI - Bootstrap 5](https://coreui.io/)
- [AdminLTE - Bootstrap 4](https://adminlte.io/)
- [Plainadmin - Bootstrap 5](https://plainadmin.com/)
- [Volt - Bootstrap 5](https://demo.themesberg.com/volt/) - contributed by [@knaazimkhan](https://github.com/knaazimkhan)
- [SB Admin 2 - Bootstrap 4](https://startbootstrap.github.io/startbootstrap-sb-admin-2/) - contributed by [@pcmehrdad](https://github.com/pcmehrdad)

---

## More from our LaravelDaily Team

- Enroll in our [Laravel Online Courses](https://laraveldaily.com/courses)
- Check out our adminpanel generator [QuickAdminPanel](https://quickadminpanel.com)
- Subscribe to our [YouTube channel Laravel Daily](https://www.youtube.com/channel/UCTuplgOBi6tJIlesIboymGA)
