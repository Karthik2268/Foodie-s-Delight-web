// Simple cart using localStorage (simulates PHP session)
var cart = JSON.parse(localStorage.getItem('foodie_cart') || '[]');

function saveCart() {
  localStorage.setItem('foodie_cart', JSON.stringify(cart));
  updateBadge();
  updateCartBar();
}

function addToCart(id, name, price, image) {
  var item = cart.find(function(i) { return i.id == id; });
  if (item) { item.qty++; } else { cart.push({ id: id, name: name, price: price, image: image, qty: 1 }); }
  saveCart();
  // Visual feedback
  var btn = document.getElementById('btn-' + id);
  if (btn) { btn.textContent = '✓ Added'; btn.classList.add('added'); setTimeout(function() { btn.textContent = '🛒 Add to Order'; btn.classList.remove('added'); }, 1200); }
}

function removeFromCart(id) {
  cart = cart.filter(function(i) { return i.id != id; });
  saveCart();
  if (typeof renderOrderItems === 'function') renderOrderItems();
}

function updateQty(id, delta) {
  var item = cart.find(function(i) { return i.id == id; });
  if (item) { item.qty += delta; if (item.qty <= 0) return removeFromCart(id); }
  saveCart();
  if (typeof renderOrderItems === 'function') renderOrderItems();
}

function getTotal() { return cart.reduce(function(s, i) { return s + i.price * i.qty; }, 0); }
function getTotalItems() { return cart.reduce(function(s, i) { return s + i.qty; }, 0); }

function updateBadge() {
  var badge = document.getElementById('nav-badge');
  var count = getTotalItems();
  if (badge) { badge.textContent = count; badge.style.display = count > 0 ? 'inline' : 'none'; }
}

function updateCartBar() {
  var bar = document.getElementById('cart-bar');
  if (bar) { bar.classList.toggle('show', cart.length > 0); }
  var barInfo = document.getElementById('cart-bar-info');
  if (barInfo) { barInfo.textContent = getTotalItems() + ' item(s) · ₹' + getTotal(); }
}

updateBadge();
updateCartBar();
