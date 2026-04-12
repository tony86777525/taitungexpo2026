document.querySelectorAll(".js-routesSwitch").forEach((btn) => {
    btn.addEventListener("click", function () {
        const currentGroup = this.closest(".js-routesGroup");
        const isActive = currentGroup.classList.contains("is-active");

        document.querySelectorAll(".js-routesGroup").forEach((group) => {
            group.classList.remove("is-active");
        });

        if (!isActive) {
            currentGroup.classList.add("is-active");
        }
    });
});