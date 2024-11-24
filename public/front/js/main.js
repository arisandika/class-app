$(document).ready(function () {
    const container = $("#grid-container");
    const gridSize = 50; // Size of each grid cell
    const width = container.width();
    const height = container.height();

    // Create horizontal lines
    for (let y = 0; y <= height; y += gridSize) {
        const opacity = 1 - y / height;
        container.append(
            `<div class="grid-line horizontal" style="top: ${y}px; opacity: ${opacity};"></div>`
        );
    }

    // Create vertical lines
    for (let x = 0; x <= width; x += gridSize) {
        container.append(
            `<div class="grid-line vertical" style="left: ${x}px;"></div>`
        );
    }

    // Apply gradient opacity to vertical lines
    $(".vertical").each(function () {
        $(this).css({
            background:
                "linear-gradient(to bottom, rgb(236, 236, 236) 0%, rgba(0,0,0,0) 100%)",
        });
    });
});
