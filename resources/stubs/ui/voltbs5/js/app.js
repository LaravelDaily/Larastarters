import "bootstrap";
import "simplebar";
import SmoothScroll from "smooth-scroll";

/*

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal. Contact us if you want to remove it.

*/

("use strict");
const d = document;
d.addEventListener("DOMContentLoaded", function (event) {
    // options
    const breakpoints = {
        sm: 540,
        md: 720,
        lg: 960,
        xl: 1140,
    };

    var sidebar = document.getElementById("sidebarMenu");
    if (sidebar && d.body.clientWidth < breakpoints.lg) {
        sidebar.addEventListener("shown.bs.collapse", function () {
            document.querySelector("body").style.position = "fixed";
        });
        sidebar.addEventListener("hidden.bs.collapse", function () {
            document.querySelector("body").style.position = "relative";
        });
    }

    var iconNotifications = d.querySelector(".notification-bell");
    if (iconNotifications) {
        iconNotifications.addEventListener("shown.bs.dropdown", function () {
            iconNotifications.classList.remove("unread");
        });
    }

    [].slice.call(d.querySelectorAll("[data-background]")).map(function (el) {
        el.style.background = "url(" + el.getAttribute("data-background") + ")";
    });

    [].slice
        .call(d.querySelectorAll("[data-background-lg]"))
        .map(function (el) {
            if (document.body.clientWidth > breakpoints.lg) {
                el.style.background =
                    "url(" + el.getAttribute("data-background-lg") + ")";
            }
        });

    [].slice
        .call(d.querySelectorAll("[data-background-color]"))
        .map(function (el) {
            el.style.background =
                "url(" + el.getAttribute("data-background-color") + ")";
        });

    [].slice.call(d.querySelectorAll("[data-color]")).map(function (el) {
        el.style.color = "url(" + el.getAttribute("data-color") + ")";
    });

    //Tooltips
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    var scroll = new SmoothScroll('a[href*="#"]', {
        speed: 500,
        speedAsDuration: true,
    });

    if (d.querySelector(".current-year")) {
        d.querySelector(".current-year").textContent = new Date().getFullYear();
    }
});
