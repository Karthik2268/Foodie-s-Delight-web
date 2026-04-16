========================================
  FOODIE'S DELIGHT - Restaurant Website
========================================

FOLDER STRUCTURE:
─────────────────
foodie/
├── index.html          (Home page)
├── menu.html           (Menu - reads XML, add-to-cart)
├── order.html          (Order page - cart + delivery form)
├── order.php           (Order form - PHP version for XAMPP)
├── contact.html        (Contact page)
├── README.txt          (This file)
├── css/
│   └── style.css       (All styles)
├── js/
│   └── cart.js         (Cart logic using localStorage)
└── xml/
    └── menu.xml        (Menu data in XML format)

HOW TO RUN WITH XAMPP:
──────────────────────
1. Install XAMPP from https://www.apachefriends.org/
2. Start Apache from XAMPP Control Panel
3. Copy the entire "foodie" folder to:
   - Windows: C:\xampp\htdocs\foodie\
   - Mac: /Applications/XAMPP/htdocs/foodie/
4. Open browser and go to: http://localhost/foodie/
5. For PHP order form: http://localhost/foodie/order.php

WITHOUT XAMPP (HTML only):
──────────────────────────
Open index.html in a browser. Due to CORS, menu.html needs
a local server. Use: python -m http.server 8000
Then visit http://localhost:8000/

FEATURES:
─────────
✅ Home page with hero, features
✅ Menu with food images loaded from XML
✅ Category filter (All/Veg/Non-Veg/Drinks)
✅ "Add to Order" button on each menu item
✅ Cart badge on navbar shows item count
✅ Sticky cart bar on menu page
✅ Order page shows all cart items with images
✅ +/− quantity controls and remove button
✅ Delivery form (Name, Phone, Address)
✅ Order total with summary
✅ Order confirmation
✅ Contact page with form + details
✅ Responsive (mobile + desktop)
✅ Hover effects, animations
✅ PHP version included (order.php)

TECHNOLOGIES:
─────────────
- HTML5 for structure
- CSS3 for styling (responsive, cards, hover effects)
- XML for menu data storage
- JavaScript for cart (localStorage)
- PHP for server-side form handling (optional, XAMPP)
