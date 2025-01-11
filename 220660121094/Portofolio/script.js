// Smooth scroll ke bagian tertentu
function scrollToSection(sectionId) {
    const targetSection = document.getElementById(sectionId);
    if (targetSection) {
        targetSection.scrollIntoView({ behavior: 'smooth' });
    }
}


// Animasi Progress Bar
document.addEventListener('DOMContentLoaded', () => {
    const progressBars = document.querySelectorAll('.progress-bar div');
    progressBars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0'; // Set awal ke 0 untuk animasi

        setTimeout(() => {
            bar.style.width = width; // Jalankan animasi
        }, 300);
    });
});

// Validasi Form Kontak
const contactForm = document.getElementById('contactForm');
contactForm.addEventListener('submit', function (e) {
    e.preventDefault(); // Mencegah reload halaman

    const nama = contactForm.nama.value.trim();
    const email = contactForm.email.value.trim();
    const pesan = contactForm.pesan.value.trim();

    if (nama === "" || email === "" || pesan === "") {
        alert("Harap isi semua kolom!");
    } else if (!validateEmail(email)) {
        alert("Email tidak valid!");
    } else {
        alert("Pesan berhasil dikirim! Terima kasih sudah menghubungi saya.");
        contactForm.reset(); // Reset form setelah submit
    }
});

// Fungsi Validasi Email
function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

// Menampilkan pesan selamat datang saat halaman selesai dimuat
window.addEventListener('load', () => {
    alert('Selamat datang di Portofolio Aura! 🌸');
});