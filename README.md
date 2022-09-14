# Larastarters

Package to install a regular Laravel Starter Kit with a non-regular different design theme.

Works only with the latest Laravel 9.

The package suggests to install [Laravel Breeze](https://github.com/laravel/breeze) (Tailwind) or [Laravel UI](https://github.com/laravel/ui) (Bootstrap) starter kit, and adds the chosen design theme on top.

**Notice**: if you want more functionality than just the Starter Kit, check our premium product [QuickAdminPanel](https://quickadminpanel.com).

---

## Important

This package should be used **immediately after installing Laravel**. If you add any more functionality, like routes or controllers, they may get overridden by Larastarters.

---

## Usage

1. Install fresh Laravel project
2. Run `composer require laraveldaily/larastarters --dev`
3. Run `php artisan larastarters:install` - it will show a wizard to choose the starter kit and the theme (options are listed below)
4. Run `npm install && npm run dev`
5. That's it, you have Laravel Auth starter, just visit the home page and click Log in / Register

### Developing within a container

Internally this package runs several `php artisan` commands during the install process. This command may not work and the installation process hang if you are within a container. Alternatively, you may pass the `--php_version` flag to change this behaviour. For example: `php artisan larastarters:install --php_version=./vendor/bin/sail`.

![Larastarters Install](https://laraveldaily.com/wp-content/uploads/2021/11/Screenshot-2021-11-02-at-10.36.03.png)


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
