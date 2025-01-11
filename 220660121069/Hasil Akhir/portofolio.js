// Fungsi untuk menghasilkan warna acak
function generateRandomColor() {
    var randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
    return randomColor;
}

// Mengubah warna latar belakang halaman secara acak
function changeBackgroundColor() {
    document.body.style.backgroundColor = generateRandomColor();
}

// Menampilkan pesan sambutan dengan animasi
function showWelcomeMessage() {
    var messageElement = document.getElementById('welcomeMessage');
    messageElement.style.display = 'block'; // Tampilkan pesan
    setTimeout(function() {
        messageElement.style.display = 'none'; // Sembunyikan setelah 5 detik
    }, 5000);
}

// Memanggil fungsi saat halaman dimuat
window.onload = function() {
    changeBackgroundColor();
    showWelcomeMessage();
};
