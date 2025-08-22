$(document).ready(function () {
    const currentPath = window.location.pathname;

    $(".navbar-nav .nav-item a").each(function () {
        if (
            this.getAttribute("href") &&
            currentPath.includes(this.getAttribute("href"))
        ) {
            $(this).parent().addClass("active");
        }
    });

    $(".navbar-nav").on("click", ".nav-item", function () {
        $(".navbar-nav .nav-item").removeClass("active");
        $(this).addClass("active");
    });

    $(".logoTag").click(function (event) {
        event.preventDefault();
        window.location.href = "./";
    });
});
