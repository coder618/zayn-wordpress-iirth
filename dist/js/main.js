/**
 * Main Theme JavaScript
 */
document.addEventListener("DOMContentLoaded", () => {
    // console.log('Ahadul theme initialized successfully.');
    // Add your custom JavaScript logic here

    // Initialize Headroom.js for desktop header
    const desktopHeader = document.querySelector('.desktop-header');
    if (desktopHeader && typeof Headroom !== 'undefined') {
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
                notBottom: "headroom--not-bottom"
            }
        });
        headroom.init();
    }
});
