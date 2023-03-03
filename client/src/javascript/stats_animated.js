document.addEventListener('DOMContentLoaded', () => {
    const statsClass = new statsElement();
    statsClass.initStats();
});

const statsElement = class {

    constructor() {
        this.animationDuration = 2000;
        this.frameDuration = 1000 / 60;
        this.totalFrames = Math.round(this.animationDuration / this.frameDuration);
        this.easeOutQuad = t => t * (2 - t);
    }

    initStats() {
        const statsElems = document.querySelectorAll('.bbp-stats-element .stats-container');
        let classInst = this;
        const observer = new IntersectionObserver(function (entries, observer) {
                entries.forEach((entry) => {
                    let statsElem = entry.target;
                    if ((entry.isIntersecting) && (!statsElem.classList.contains('was-run'))) {
                        let counters = statsElem.querySelectorAll(':scope span.countup');
                        counters.forEach((counterSpan) => {
                            classInst.animateCountUp(counterSpan);
                        });
                        statsElem.classList.add('was-run');
                    }
                })
            }, {
                threshold: 0
            }
        );

        statsElems.forEach((statsElem) => {
            observer.observe(statsElem);
        });
    }

    animateCountUp(el) {
        let frame = 0;
        const countTo = parseInt(el.innerHTML, 10);
        const counter = setInterval(() => {
            frame++;
            const progress = this.easeOutQuad(frame / this.totalFrames);
            const currentCount = Math.round(countTo * progress);
            if (parseInt(el.innerHTML, 10) !== currentCount) {
                el.innerHTML = currentCount;
            }
            if (frame === this.totalFrames) {
                clearInterval(counter);
            }
        }, this.frameDuration);
    }

}

