<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Inventaris</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <span class="navbar-brand">Sistem Inventaris</span>
        </div>
    </nav>
    <div class="container">
        <h1>Sistem Inventaris</h1>
        <form id="itemForm">
            <input type="hidden" id="itemId">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description"></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
        <a href="/rekap" class="rekap-link">View Inventory Rekap</a>
    </div>
    <script src="/js/scripts.js"></script>
</body>
</html>
