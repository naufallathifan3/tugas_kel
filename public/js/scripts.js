document.addEventListener('DOMContentLoaded', () => {
    // Menangani klik tombol Edit
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', async (event) => {
            const id = event.target.getAttribute('data-id');
            const response = await fetch(`/items/${id}`);
            const item = await response.json();
            
            document.getElementById('itemId').value = item.id;
            document.getElementById('name').value = item.name;
            document.getElementById('quantity').value = item.quantity;
            document.getElementById('description').value = item.description;
        });
    });

    // Menangani pengiriman formulir untuk menambahkan atau mengedit item
    document.getElementById('itemForm').addEventListener('submit', async (event) => {
        event.preventDefault();
        
        const itemId = document.getElementById('itemId').value;
        const name = document.getElementById('name').value;
        const quantity = document.getElementById('quantity').value;
        const description = document.getElementById('description').value;
        
        const data = new URLSearchParams();
        data.append('name', name);
        data.append('quantity', quantity);
        data.append('description', description);
        
        let response;
        if (itemId) {
            data.append('itemId', itemId);
            response = await fetch(`/items`, {
                method: 'POST',
                body: data
            });
        } else {
            response = await fetch(`/items`, {
                method: 'POST',
                body: data
            });
        }
        
        const result = await response.json();
        if (result.success) {
            alert('Item saved successfully!');
            document.getElementById('itemForm').reset();
            // Refresh item list atau redirect sesuai kebutuhan Anda
        } else {
            alert('Failed to save item.');
        }
    });
    
    // Menangani klik tombol Delete
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', async (event) => {
            const id = event.target.getAttribute('data-id');
            const data = new URLSearchParams();
            data.append('id', id);
            
            const response = await fetch('/items', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: data
            });
            
            const result = await response.json();
            if (result.success) {
                alert('Item deleted successfully!');
                event.target.closest('tr').remove();
            } else {
                alert('Failed to delete item.');
            }
        });
    });
});
