fetch('../topbar.html')
    .then(response => response.text())
    .then(html => {
        document.getElementById('sidebar').innerHTML = html;
    });

function loadPage(link) {
    window.location.href = link;
}
