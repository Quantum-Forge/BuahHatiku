document.getElementById("username").addEventListener("keydown", function (e) {
    if (e.key === " ") {
        e.preventDefault(); // Mencegah tombol spasi
    }
});