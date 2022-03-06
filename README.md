<p align="center">
    <img src="./art/logo.svg" alt="Logo Laravel Breeze">
</p>
<p align="center">
    <a href="https://packagist.org/packages/laraveldaily/larastarters">
        <img src="https://img.shields.io/packagist/dt/laraveldaily/larastarters" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laraveldaily/larastarters">
        <img src="https://img.shields.io/packagist/v/laraveldaily/larastarters" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/laraveldaily/larastarters">
        <img src="https://img.shields.io/packagist/l/laraveldaily/larastarters" alt="License">
    </a>
</p>

# Larastarters
Package to install a regular Laravel Starter Kit with a non-regular different design theme.

The package suggests to install [Laravel Breeze](https://github.com/laravel/breeze) (Tailwind) or [Laravel UI](https://github.com/laravel/ui) (Bootstrap) starter kit, and adds the chosen design theme on top.

**Notice**: if you want more functionality than just the Starter Kit, check our premium product [QuickAdminPanel](https://quickadminpanel.com).

---

## Important

This package should be used **immediately after installing Laravel**. If you add any more functionality, like routes or controllers, they may get overridden by Larastarters.

---

## Usage/Installation
First, Create a fresh Laravel Project ([Laravel Installation](https://laravel.com/docs/9.x/installation))

Then, install Larastarters using composer:
```sh
composer require laraveldaily/larastarters --dev
```

After the package installation using composer, run:
```sh
php artisan larastarters:install
```
it will show a wizard to choose the starter kit and the theme (options are listed below)


Now install and compile your assets and run the database migrations:
```sh
npm install && npm run dev
```
```sh

php artisan migrate
```

That's it, you have Laravel Auth starter, just start your application and visit the *Login* or *Register* page to see the result.

---

![Larastarters Install](https://laraveldaily.com/wp-content/uploads/2021/11/Screenshot-2021-11-02-at-10.36.03.png)


## Available Themes

In the current version, there are 9 themes supported. 

**Tailwind Themes with Laravel Breeze**

- [Windmill](https://windmillui.com/dashboard-html)
- [Notus JS](https://www.creative-tim.com/product/notus-js)
- [Tailwind Components](https://github.com/tailwindcomponents/dashboard)

**Notice**: Tailwind themes are slightly tweaked to work on Tailwind v2.

Example screenshots from Windmill theme:

![Register](https://laraveldaily.com/wp-content/uploads/2021/10/Screenshot-2021-10-26-at-07.24.59.png)

![Dashboard](https://laraveldaily.com/wp-content/uploads/2021/10/Screenshot-2021-10-26-at-07.25.32.png)


**Bootstrap Themes with Laravel UI**

- [Core UI - Bootstrap 5](https://coreui.io/)
- [AdminLTE - Bootstrap 4](https://adminlte.io/)
- [Plainadmin - Bootstrap 5](https://plainadmin.com/)
- [Volt - Bootstrap 5](https://demo.themesberg.com/volt/) - contributed by [@knaazimkhan](https://github.com/knaazimkhan)
- [SB Admin 2 - Bootstrap 4](https://startbootstrap.github.io/startbootstrap-sb-admin-2/) - contributed by [@pcmehrdad](https://github.com/pcmehrdad)
- [Tabler.io - Bootstrap 5](https://tabler.io/) - contributed by [@PierreLebedel](https://github.com/PierreLebedel)

---

## Pre-Installed Functions

Along with the design themes, we add a few features that are typical for almost any project:

- Profile management form to change name/email/password
- A sample table of Users list
- A sample static text page
- Two-level menu on the sidebar

Want more functions? Raise an issue with your suggestion, or check out our [QuickAdminPanel](https://quickadminpanel.com).

---

## More from our LaravelDaily Team

- Enroll in our [Laravel Online Courses](https://laraveldaily.teachable.com/)
- Check out our adminpanel generator [QuickAdminPanel](https://quickadminpanel.com)
- Subscribe to our [YouTube channel Laravel Daily](https://www.youtube.com/channel/UCTuplgOBi6tJIlesIboymGA)
