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
