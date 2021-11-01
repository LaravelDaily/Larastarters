# Larastarters

Package to install a regular Laravel Starter Kit with a non-regular different design theme.

For current version 0.1, we support only [Laravel Breeze](https://github.com/laravel/breeze).
Laravel Jestream and Laravel UI are potentially in plans.


## Important

This package should be used **immediately after installing Laravel**. If you add any more functionality, like routes or controllers, they may get overridden by Larastarters.


## Usage

1. Install fresh Laravel project
2. Require Laravel Breeze `composer require laravel/breeze --dev`
3. Install Breeze `php artisan breeze:install`
4. Run `composer require laraveldaily/larastarters --dev`
5. Run `php artisan larastarters:install --theme=XXXXX` (available themes listed below)
6. Run `npm install && npm run dev`
7. That's it, you have Laravel Auth starter, just visit the home page and click Log in / Register

### Using Tailwind JIT?
Ensure that the 'jit' mode is enabled (it is not enabled by default).

1. Go to `tailwind.config.js` file
2. Add the `mode: 'jit'` to the `module.exports ={` object

```
module.exports = {
    mode: 'jit',  // Add this line
    purge: [
```
3. Run `npm run watch` as usual.

More info on Tailwind's JIT mode can be found [here](https://tailwindcss.com/docs/just-in-time-mode).

## Available Themes

In the current version, there are 3 themes supported, all based on Tailwind, and tweaked for Tailwind v2 specifically.

### Theme 1. Windmill.

Original HTML/CSS theme: [windmillui.com](https://windmillui.com/dashboard-html) 

How to install: 

```
php artisan larastarters:install --theme=windmill

// Until the Dark theme is removed, run npm install with the --force tag
npm install --force
```

Screenshots:

![Register](https://laraveldaily.com/wp-content/uploads/2021/10/Screenshot-2021-10-26-at-07.24.59.png)

![Dashboard](https://laraveldaily.com/wp-content/uploads/2021/10/Screenshot-2021-10-26-at-07.25.32.png)

-----

### Theme 2. Notus JS.

Original HTML/CSS theme: [creative-tim.com](https://www.creative-tim.com/product/notus-js) 

How to install: 

```
php artisan larastarters:install --theme=notusjs
```

Screenshots:

![Register](https://laraveldaily.com/wp-content/uploads/2021/10/Screenshot-2021-10-26-at-07.53.06.png)

![Dashboard](https://laraveldaily.com/wp-content/uploads/2021/10/Screenshot-2021-10-26-at-07.28.09.png)


-----

### Theme 3. Tailwind Components.

Original HTML/CSS theme: [github.com](https://github.com/tailwindcomponents/dashboard) 

How to install: 

```
php artisan larastarters:install --theme=tailwindcomponents
```

Screenshots:

![Register](https://laraveldaily.com/wp-content/uploads/2021/10/Screenshot-2021-10-26-at-07.42.29.png)

![Dashboard](https://laraveldaily.com/wp-content/uploads/2021/10/Screenshot-2021-10-26-at-07.42.43.png)

---

## More from our LaravelDaily Team

- Enroll in our [Laravel Online Courses](https://laraveldaily.teachable.com/)
- Check out our adminpanel generator [QuickAdminPanel](https://quickadminpanel.com)
- Subscribe to our [YouTube channel Laravel Daily](https://www.youtube.com/channel/UCTuplgOBi6tJIlesIboymGA)
