const slides = document.querySelectorAll(".slide");
const prevBtn = document.querySelector(".prev");
const nextBtn = document.querySelector(".next");
const dotsContainer = document.querySelector(".dots");

let index = 0;
let autoPlayInterval;

// Create dots dynamically
slides.forEach((_, i) => {
  const dot = document.createElement("span");
  dot.addEventListener("click", () => {
    index = i;
    showSlide(index);
    resetAutoPlay();
  });
  dotsContainer.appendChild(dot);
});

const dots = document.querySelectorAll(".dots span");

function showSlide(i) {
  slides.forEach(slide => slide.classList.remove("active"));
  dots.forEach(dot => dot.classList.remove("active"));
  slides[i].classList.add("active");
  dots[i].classList.add("active");
}

function nextSlide() {
  index = (index + 1) % slides.length;
  showSlide(index);
}

function prevSlideFunc() {
  index = (index - 1 + slides.length) % slides.length;
  showSlide(index);
}

prevBtn.addEventListener("click", () => {
  prevSlideFunc();
  resetAutoPlay();
});

nextBtn.addEventListener("click", () => {
  nextSlide();
  resetAutoPlay();
});

function startAutoPlay() {
  autoPlayInterval = setInterval(nextSlide, 5000); // 5 sec
}

function resetAutoPlay() {
  clearInterval(autoPlayInterval);
  startAutoPlay();
}

// Init
showSlide(index);
startAutoPlay();
