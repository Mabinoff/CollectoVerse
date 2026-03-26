document.addEventListener("DOMContentLoaded", () => {
  const track = document.getElementById("track");
  const btnPrev = document.getElementById("g");
  const btnNext = document.getElementById("d");
  const viewport = document.querySelector(".carousel-viewport");

  let index = 0;

  function isMobile() {
    return window.matchMedia("(max-width: 768px)").matches;
  }

  function getGap() {
    const gap = parseFloat(getComputedStyle(track).gap);
    return Number.isFinite(gap) ? gap : 0;
  }

  function getCardWidth() {
    const firstCard = track.querySelector(".card");
    return firstCard ? firstCard.getBoundingClientRect().width : 0;
  }

  function step() {
    return getCardWidth() + getGap();
  }

  function maxIndex() {
    const total = track.querySelectorAll(".card").length;

    if (isMobile()) return Math.max(0, total - 1);

    const s = step();
    if (!s) return 0;
    const visible = Math.max(1, Math.floor(viewport.getBoundingClientRect().width / s));
    return Math.max(0, total - visible);
  }

  function update() {
    const s = step();
    const cardW = getCardWidth();
    if (!s || !cardW) return;

    if (isMobile()) {
      const viewportW = viewport.getBoundingClientRect().width;
      const offset = (viewportW - cardW) / 2; // centre la carte
      track.style.transform = `translateX(${offset - index * s}px)`;
    } else {
      track.style.transform = `translateX(${-index * s}px)`;
    }

    const prevDisabled = index === 0;
    const nextDisabled = index === maxIndex();

    btnPrev.style.opacity = prevDisabled ? "0.4" : "1";
    btnNext.style.opacity = nextDisabled ? "0.4" : "1";
    btnPrev.style.pointerEvents = prevDisabled ? "none" : "auto";
    btnNext.style.pointerEvents = nextDisabled ? "none" : "auto";
  }

  btnNext.addEventListener("click", () => {
    index = Math.min(maxIndex(), index + 1);
    update();
  });

  btnPrev.addEventListener("click", () => {
    index = Math.max(0, index - 1);
    update();
  });

  window.addEventListener("resize", () => {
    index = Math.min(index, maxIndex());
    update();
  });

  update();
});
