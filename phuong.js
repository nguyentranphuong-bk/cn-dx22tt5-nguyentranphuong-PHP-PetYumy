window.addEventListener("DOMContentLoaded", function() {
      const text = document.getElementById("marquee-text");
      let position = -text.offsetWidth;

      function animate() {
        position += 2;
        text.style.left = position + "px";

        if (position > window.innerWidth) {
          position = -text.offsetWidth;
        }

        requestAnimationFrame(animate);
      }

      animate();
    });
const cartData = [
  { name: 'Thức ăn cho chó', price: 100000, img: 'dogfood.jpg' },
  { name: 'Thức ăn cho mèo', price: 80000, img: 'catfood.jpg' }
];

function renderCart() {
  const cartCount = document.getElementById("cart-count");
  const cartItems = document.getElementById("cart-items");
  const cartTotal = document.getElementById("cart-total");

  cartCount.textContent = cartData.length;

  cartItems.innerHTML = "";
  let total = 0;

  cartData.forEach(item => {
    total += item.price;
    cartItems.innerHTML += `
      <div style="display: flex; gap: 10px; align-items: center;">
        <img src="${item.img}" width="40" height="40" />
        <div>
          <p>${item.name}</p>
          <p>${item.price.toLocaleString()}₫</p>
        </div>
      </div>
    `;
  });

  cartTotal.textContent = total.toLocaleString() + "₫";
}

 document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll('.slide');
    let current = 0;

    setInterval(() => {
      slides[current].classList.remove('active');
      current = (current + 1) % slides.length;
      slides[current].classList.add('active');
    }, 3000);
  });
  document.addEventListener("DOMContentLoaded", function () {
    const text = document.querySelector('.overlay-text');
    let visible = true;

    setInterval(() => {
      visible = !visible;
      text.style.opacity = visible ? '1' : '0';
    }, 150); // 0.3 giây
  });
  const heading = document.querySelector("h3.text-center");

heading.addEventListener("click", () => {
  heading.style.transition = "transform 0.3s ease";
  heading.style.transform = "scale(1.1)";
  heading.style.color = "#ff4081";

  const sparkle = document.createElement("span");
  sparkle.textContent = "✨";
  sparkle.style.position = "absolute";
  sparkle.style.top = "0";
  sparkle.style.right = "10px";
  sparkle.style.fontSize = "1.5rem";
  sparkle.style.animation = "fadeOut 1s forwards";

  heading.appendChild(sparkle);

  setTimeout(() => {
    heading.style.transform = "scale(1)";
    heading.style.color = "#007bff";
    sparkle.remove();
  }, 1000);
});

const style = document.createElement("style");
style.textContent = `
@keyframes fadeOut {
  0% { opacity: 1; transform: translateY(0); }
  100% { opacity: 0; transform: translateY(-20px); }
}`;
document.head.appendChild(style);