document.addEventListener("DOMContentLoaded", function () {
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("carousel")[0].getElementsByTagName("img");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        slides[slideIndex - 1].style.display = "block";
        // Detectar automáticamente la miniatura activa
        var activeThumbnail = document.querySelector('.thumbnail.active');
        if (activeThumbnail) {
            activeThumbnail.classList.remove('active');
        }
        document.querySelectorAll('.thumbnail')[slideIndex - 1].classList.add('active');
        // Cambia la imagen cada 2 segundos
    }

    document.getElementById("prevBtn").addEventListener("click", function () {
        changeSlide(-1);
    });

    document.getElementById("nextBtn").addEventListener("click", function () {
        changeSlide(1);
    });

    function changeSlide(n) {
        var slides = document.getElementsByClassName("carousel")[0].getElementsByTagName("img");
        slideIndex += n;
        if (slideIndex > slides.length) { slideIndex = 1 }
        if (slideIndex < 1) { slideIndex = slides.length }
        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
        // Detectar automáticamente la miniatura activa
        var activeThumbnail = document.querySelector('.thumbnail.active');
        if (activeThumbnail) {
            activeThumbnail.classList.remove('active');
        }
        document.querySelectorAll('.thumbnail')[slideIndex - 1].classList.add('active');
    }

    var thumbnails = document.querySelectorAll('.thumbnail');

    thumbnails.forEach(function (thumbnail, index) {
        thumbnail.addEventListener('click', function () {
            showSlide(index);
        });
    });

    function showSlide(index) {
        var slides = document.getElementsByClassName("carousel")[0].getElementsByTagName("img");

        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        slideIndex = index + 1;
        slides[index].style.display = "block";

        var activeThumbnails = document.querySelectorAll('.thumbnail.active');
        activeThumbnails.forEach(function (thumbnail) {
            thumbnail.classList.remove('active');
        });

        thumbnails[index].classList.add('active');
    }
});


// lista carousels de productos

const carousel = document.querySelector('.carousel-cards');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');

    nextBtn.addEventListener('click', () => {
        carousel.scrollBy({
            top: 0,
            left: 300,
            behavior: 'smooth'
        });
    });

    prevBtn.addEventListener('click', () => {
        carousel.scrollBy({
            top: 0,
            left: -300,
            behavior: 'smooth'
        });
    });