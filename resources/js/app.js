import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const initRevealAnimations = () => {
    const elements = document.querySelectorAll('[data-reveal]');

    if (!elements.length) {
        window.portfolioRevealReady = true;

        return;
    }

    const revealAll = () => {
        elements.forEach((element) => element.classList.add('is-visible'));
    };

    if (!('IntersectionObserver' in window)) {
        revealAll();
        window.portfolioRevealReady = true;

        return;
    }

    try {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.12,
                rootMargin: '0px 0px -40px 0px',
            },
        );

        elements.forEach((element) => observer.observe(element));
        window.portfolioRevealReady = true;
    } catch (error) {
        revealAll();
        window.portfolioRevealReady = true;
    }
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initRevealAnimations);
} else {
    initRevealAnimations();
}
