<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Inventaris</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <span class="navbar-brand">Sistem Inventaris</span>
        </div>
    </nav>
    <div class="container">
        <h1>Rekap Inventaris</h1>
        <div class="search-container">
            <input type="text" id="searchBar" placeholder="Search for items...">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="rekapList">
                <!-- Rekap items will be loaded here dynamically -->
            </tbody>
        </table>
        <a href="/" class="back-link">Back to Inventory System</a>
    </div>
    <script src="/js/rekap.js"></script>
</body>
</html>
