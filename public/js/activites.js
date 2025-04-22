document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.querySelector('.carousel');
    const nextBtn = document.querySelector('.carousel-btn.next');
    const prevBtn = document.querySelector('.carousel-btn.prev');
    const card = document.querySelector('.card');
    const style = window.getComputedStyle(carousel);
    const gap = parseInt(style.gap) || 0;
    const cardWidth = card.offsetWidth + gap;

    if (nextBtn && prevBtn && carousel) {
        nextBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: cardWidth, behavior: 'smooth' });
        });

        prevBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: -cardWidth, behavior: 'smooth' });
        });
    } else {
        console.warn("Carousel or buttons not found");
    }
});
