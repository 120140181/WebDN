const sliderTrack = document.getElementById("sliderTrack");
const sliderItems = document.querySelectorAll(".slider-item img");

sliderItems.forEach((item) => {
    item.addEventListener("mouseover", () => {
        pauseTimeout = setTimeout(() => {
            sliderTrack.style.animationPlayState = "paused";
        });
    });

    item.addEventListener("mouseout", () => {
        sliderTrack.style.animationPlayState = "running";
    });
});

function showDetails(id, collapseId) {
    // Hide all details sections
    var details = document.querySelectorAll(".details-service");
    details.forEach(function (detail) {
        detail.style.display = "none";
    });

    // Show the selected details section
    document.getElementById(id).style.display = "block";

    // Collapse the accordion
    var collapseElement = document.getElementById(collapseId);
    var bsCollapse = new bootstrap.Collapse(collapseElement, {
        toggle: true,
    });

    // Close all other accordions
    var collapses = document.querySelectorAll(".accordion-collapse");
    collapses.forEach(function (collapse) {
        if (collapse.id !== collapseId) {
            var bsOtherCollapse = new bootstrap.Collapse(collapse, {
                toggle: false,
            });
            bsOtherCollapse.hide();
        }
    });
}
