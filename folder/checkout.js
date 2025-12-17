document.addEventListener("DOMContentLoaded", () => {
  const messages = document.getElementById("checkout-messages");
  const cartList = document.getElementById("checkout-cart");
  const totalEl = document.getElementById("checkout-total");
  const form = document.getElementById("checkout-form");
  const btn = document.getElementById("place-order-btn");

  function showErrors(errors) {
    messages.innerHTML = `
      <div style="background:#f8d7da; padding:15px; border-radius:8px; margin: 15px 0;">
        <strong>Please fix the following:</strong>
        <ul>${errors.map(e => `<li>${e}</li>`).join("")}</ul>
      </div>
    `;
  }

  function showSuccess(text, total) {
    messages.innerHTML = `
      <div style="background:#d4edda; padding:15px; border-radius:8px; margin: 15px 0;">
        <strong>${text}</strong><br>
        Total: €${Number(total || 0).toFixed(2)}
      </div>
    `;
  }

  function renderCart(cart, total) {
    cartList.innerHTML = "";
    const keys = Object.keys(cart || {});

    if (keys.length === 0) {
      cartList.innerHTML = `<li>Your basket is empty.</li>`;
      totalEl.textContent = "0.00";
      return;
    }

    keys.forEach((key) => {
      const item = cart[key];
      const qty = Number(item.qty || 0);
      const price = Number(item.price || 0);
      const line = qty * price;

      const li = document.createElement("li");
      li.style.marginBottom = "10px";
      li.textContent =
        `${item.name}${item.size ? ` (Size: ${item.size})` : ""} [${qty}] — €${line.toFixed(2)}`;

      cartList.appendChild(li);
    });

    totalEl.textContent = Number(total || 0).toFixed(2);
  }

  async function loadCart() {
    const body = new URLSearchParams();
    body.append("action", "get_cart");

    const r = await fetch("checkout.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: body.toString(),
    });

    const data = await r.json();
    if (data.status === "ok") renderCart(data.cart, data.total);
  }

  // ✅ Auto-format card number as "1234 5678 9012 3456"
  document.addEventListener("input", (e) => {
    if (e.target && e.target.name === "card_number") {
      e.target.value = e.target.value
        .replace(/\D/g, "")
        .slice(0, 16)
        .replace(/(.{4})/g, "$1 ")
        .trim();
    }
  });

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    messages.innerHTML = "";
    btn.disabled = true;

    const fd = new FormData(form);
    const body = new URLSearchParams(fd);
    body.append("action", "place_order");

    const r = await fetch("checkout.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: body.toString(),
    });

    const data = await r.json();
    btn.disabled = false;

    if (data.status === "ok") {
      showSuccess(data.message || "Order placed!", data.total);
      form.reset();
      loadCart();
    } else {
      showErrors(data.errors || ["Something went wrong."]);
    }
  });

  loadCart();
});
