/**
 * Main Theme JavaScript
 */
document.addEventListener("DOMContentLoaded", () => {
    // console.log('Ahadul theme initialized successfully.');
    // Add your custom JavaScript logic here

    // Initialize Headroom.js for desktop header
    const desktopHeader = document.querySelector(".desktop-header");
    if (desktopHeader && typeof Headroom !== "undefined") {
        // We only want this on desktop. Let's use a simple media query check or just apply it
        // and CSS will handle the "only for desktop" part if needed, but since it's `.desktop-header`,
        // it's likely already only visible on desktop.
        const headroom = new Headroom(desktopHeader, {
            offset: 200,
            classes: {
                initial: "headroom",
                pinned: "headroom--pinned",
                unpinned: "headroom--unpinned",
                top: "headroom--top",
                notTop: "headroom--not-top",
                bottom: "headroom--bottom",
                notBottom: "headroom--not-bottom",
            },
        });
        headroom.init();
    }

    // Gallery Modal Logic
    const galleryItems = document.querySelectorAll(".js-gallery-item");
    const galleryModal = document.getElementById("gallery-modal");

    if (galleryItems.length > 0 && galleryModal) {
        const modalImage = document.getElementById("gallery-modal-image");
        const closeModalBtn = document.getElementById("gallery-modal-close");

        const openModal = (imageSrc) => {
            modalImage.src = imageSrc;
            galleryModal.classList.add("is-visible");
            document.body.style.overflow = "hidden"; // Prevent background scrolling
        };

        const closeModal = () => {
            galleryModal.classList.remove("is-visible");
            setTimeout(() => {
                modalImage.src = ""; // Clear image source
            }, 300); // Match transition duration
            document.body.style.overflow = "";
        };

        galleryItems.forEach((item) => {
            item.addEventListener("click", () => {
                const fullImageUrl = item.getAttribute("data-image");
                if (fullImageUrl) {
                    openModal(fullImageUrl);
                }
            });
        });

        // Close on button click
        closeModalBtn.addEventListener("click", closeModal);

        // Close on background click
        galleryModal.addEventListener("click", (e) => {
            if (e.target === galleryModal) {
                closeModal();
            }
        });

        // Close on Escape key
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape" && galleryModal.classList.contains("is-visible")) {
                closeModal();
            }
        });
    }
});
