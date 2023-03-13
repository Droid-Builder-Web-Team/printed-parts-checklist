require("./bootstrap");

import Alpine from "alpinejs";
import Swiper from "swiper/bundle";
import "swiper/css/bundle";
import 'flowbite';

window.Alpine = Alpine;

Alpine.start();

// Confirm Delete Popup
$(".delete-confirm").on("click", function (event) {
    event.preventDefault();
    const url = $(this).attr("href");
    swal({
        title: "Are you sure?",
        text: "This record and it`s details will be permanently deleted!",
        icon: "warning",
        buttons: ["Cancel", "Yes!"],
    }).then(function (value) {
        if (value) {
            window.location.href = url;
        }
    });
});

// Drop Down Menu Triggers
const dropdownButtonUsers = document.querySelectorAll(".dropdownButton-users");
const dropdownMenuUsers = document.querySelectorAll(".dropdownMenu-users");

$(dropdownButtonUsers).on("click", function () {
    $(dropdownMenuUsers).fadeToggle("hidden");
    console.log($(this).find("svg"));
    $(this).find("svg").toggleClass("arrow-spin");
});

const dropdownButtonDroids = document.querySelectorAll(
    ".dropdownButton-droids"
);
const dropdownMenuDroids = document.querySelectorAll(".dropdownMenu-droids");

$(dropdownButtonDroids).on("click", function () {
    $(dropdownMenuDroids).fadeToggle("hidden");
    console.log($(this).find("svg"));
    $(this).find("svg").toggleClass("arrow-spin");
});

// Accordion
// Hide accordion content on load
$(".accordion .accordion-item .content").hide();

$("body").on("click", ".accordion .accordion-item .label", function () {
    if ($(this).attr("aria-expanded") == "true") {
        $(this).attr("aria-expanded", "false");
        $(this).siblings(".content").attr("aria-hidden", "true");
        $(this).siblings(".content").slideUp();
    } else {
        $(".accordion .accordion-item").each(function (i, el) {
            $(el).find(".label").attr("aria-expanded", "false");
            $(el).find(".content").attr("aria-hidden", "true");
            $(el).find(".content").slideUp();
        });

        $(this).attr("aria-expanded", "true");
        $(this).siblings(".content").attr("aria-hidden", "false");
        $(this).siblings(".content").slideDown();
    }
});

// Tabs
const buttonRow = $(".tabs-wrapper .button-row").addClass("hidden");
$(".tabs-wrapper .tab-content__tab-link").first().addClass("active");
$(".tabs-wrapper .tab-content__tab-contents")
    .first()
    .attr("aria-hidden", "false")
    .removeClass("hidden");

$("body").on("click", ".tabs-wrapper .tab-content__tab-link", function () {
    let activeContentAttr = $(this).data("tab");

    $(".tabs-wrapper .tab-content__tab-link").removeClass("active");
    $(".tabs-wrapper .tab-content__tab-contents")
        .attr("aria-hidden", "true")
        .removeClass("active")
        .addClass("hidden");

    $(this).addClass("active");
    $(
        `.tabs-wrapper .tab-content__tab-contents[data-tab='${activeContentAttr}']`
    )
        .attr("aria-hidden", "false")
        .removeClass("hidden");

    // Check if the current tab == 5 (faq) then show add new FAQ button. Refactor Later - RH
    if (
        $(this).hasClass &&
        $(this).hasClass("active") &&
        activeContentAttr == 5
    ) {
        buttonRow.removeClass("hidden");
    }
});

// FAQs Add New Button
$("#newFaqButton").on("click", function (e) {
    console.log("click");
    e.preventDefault();
    var templateRow = `
    <div class="faq-block">
    <div class="relative z-0 w-full mb-6 group">
      <input type="text" name="title"
        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
        placeholder=" " />
      <label for="title"
        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
    </div>

    <div class="relative z-0 w-full mb-6 group">
      <textarea type="text" name="content"
        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
        placeholder=" "></textarea>
      <label for="content"
        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Content</label>
    </div>
  </div>
  `;

    $(".tab-content__tab-contents").append(templateRow);
});

// Droid Show Slider
if (document.querySelectorAll(".droid-slider").length > 0) {
    new Swiper(".droid-slider", {
        slidesPerView: 1,
        spaceBetween: 40,
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
}
