$(document).ready(function() {
    var pathname = document.location.pathname,
        left_content = '#left-content',
        menu = pathname.split("/")[2];

        $(left_content + ' .' + menu).parent().addClass('active');
})

$('#TabContent a.dropdown-toggle').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
})
