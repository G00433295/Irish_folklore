// js/shop.js
document.addEventListener("DOMContentLoaded", () => {
  const basketList = document.getElementById("basket-items");
  const basketTotal = document.getElementById("basket-total");

  if (!basketList || !basketTotal) return; // safety if used on other pages

  function renderCart(cart) {
    basketList.innerHTML = "";
    let total = 0;

    Object.keys(cart).forEach((key) => {
      const item = cart[key];
      const lineTotal = item.qty * item.price;
      total += lineTotal;

      const li = document.createElement("li");
      li.innerHTML = `
        ${item.name}${item.size ? ` (Size: ${item.size})` : ""} [${item.qty}] - €${lineTotal.toFixed(2)}
        <button class="remove-item" type="button">Remove</button>
      `;

      li.querySelector(".remove-item").addEventListener("click", async () => {
        const form = new URLSearchParams();
        form.append("action", "remove");
        form.append("key", key);

        const r = await fetch("shop.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: form.toString(),
        });

        const data = await r.json();
        if (data.status === "ok") renderCart(data.cart || {});
      });

      basketList.appendChild(li);
    });

    basketTotal.innerHTML = `<strong>Total: €${total.toFixed(2)}</strong>`;
  }

  async function loadCart() {
    const form = new URLSearchParams();
    form.append("action", "get");

    const r = await fetch("shop.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: form.toString(),
    });

    const data = await r.json();
    if (data.status === "ok") renderCart(data.cart || {});
  }

  function wireAddButtons() {
    document.querySelectorAll(".add-to-basket").forEach((btn) => {
      btn.addEventListener("click", async () => {
        const itemDiv = btn.closest(".shop-item");
        if (!itemDiv) return;

        const name = itemDiv.querySelector("h3")?.innerText?.trim() || "";
        const priceText = itemDiv.querySelector("p")?.innerText || "€0";
        const price = parseFloat(priceText.replace("€", "")) || 0;

        const sizeSelect = itemDiv.querySelector(".item-size");
        const size = sizeSelect ? sizeSelect.value : "";

        const form = new URLSearchParams();
        form.append("action", "add");
        form.append("name", name);
        form.append("price", String(price));
        form.append("size", size);

        const r = await fetch("shop.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: form.toString(),
        });

        const data = await r.json();
        if (data.status === "ok") renderCart(data.cart || {});
      });
    });
  }
  const checkoutBtn = document.getElementById("checkout-btn");

if (checkoutBtn) {
  checkoutBtn.addEventListener("click", () => {
    window.location.href = "checkout.php";
  });
}


  // init
  wireAddButtons();
  loadCart();
});
