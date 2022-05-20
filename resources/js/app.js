require("./bootstrap");

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Confirm Delete Popup
$(".delete-confirm").on("click", function (event) {
    event.preventDefault();
    const url = $(this).attr("href");
    swal({
        title: "Are you sure?",
        text: "This record and it`s details will be permanantly deleted!",
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
});
