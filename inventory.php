<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Fashion Store Inventory</title>
  <style>
    body { font-family: Arial; text-align: center; background: #fafafa; }
    table { margin: 30px auto; border-collapse: collapse; width: 80%; }
    th, td { border: 1px solid #ddd; padding: 10px; }
    th { background: #f39c12; color: #fff; }
  </style>
</head>
<body>

<h2>Fashion Store Inventory</h2>

<table>
  <tr>
    <th>Item</th>
    <th>Bought</th>
    <th>Sold</th>
    <th>In Stock</th>
    <th>Revenue ($)</th>
  </tr>

  <?php
  $result = $conn->query("SELECT * FROM inventory");
  while ($row = $result->fetch_assoc()) {
    $stock = $row['bought'] - $row['sold'];
    $revenue = $row['sold'] * $row['price'];
    echo "<tr>
            <td>{$row['item_name']}</td>
            <td>{$row['bought']}</td>
            <td>{$row['sold']}</td>
            <td>$stock</td>
            <td>$revenue</td>
          </tr>";
  }
  ?>
</table>

</body>
</html>