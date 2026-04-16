<?php
$order_placed = false;
$name = $food = '';
$quantity = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $food = htmlspecialchars($_POST['food'] ?? '');
    $quantity = (int)($_POST['quantity'] ?? 1);
    $order_placed = true;
}
$xml = simplexml_load_file('xml/menu.xml');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodie's Delight - Order (PHP)</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <nav class="navbar">
    <a href="index.html" class="logo">🍽️ Foodie's <span>Delight</span></a>
    <ul class="nav-links">
      <li><a href="index.html">Home</a></li>
      <li><a href="menu.html">Menu</a></li>
      <li><a href="order.php" class="active">Order</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
  </nav>
  <div class="section">
    <?php if ($order_placed): ?>
    <div class="confirmation">
      <div class="check">✅</div>
      <h2>Order Confirmed!</h2>
      <p>Thank you, <strong><?= $name ?></strong>!</p>
      <p>Your order of <strong><?= $quantity ?>x <?= $food ?></strong> has been placed.</p>
      <br><a href="order.php" class="btn">Place Another Order</a>
    </div>
    <?php else: ?>
    <h1 class="section-title">Place Your Order</h1>
    <div class="form-card" style="max-width:600px;margin:2rem auto">
      <form method="POST" action="order.php">
        <div class="form-group"><label>Your Name</label><input type="text" name="name" required placeholder="Enter your name"></div>
        <div class="form-group"><label>Select Food Item</label>
          <select name="food" required>
            <option value="">-- Choose a dish --</option>
            <?php foreach($xml->item as $item): ?>
            <option value="<?= $item->name ?>"><?= $item->name ?> (₹<?= $item->price ?>) - <?= $item->category ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group"><label>Quantity</label><input type="number" name="quantity" min="1" max="20" value="1" required></div>
        <button type="submit" class="submit-btn">Place Order 🛒</button>
      </form>
    </div>
    <?php endif; ?>
  </div>
  <footer class="footer"><p>© 2025 Foodie's Delight. Made with ❤️</p></footer>
</body>
</html>
