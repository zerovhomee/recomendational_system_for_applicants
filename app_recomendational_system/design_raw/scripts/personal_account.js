document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".trash");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const card = this.closest(".container").querySelector(
                ".recommendation-card",
            );
            if (card) {
                card.remove();
            }
        });
    });
});
