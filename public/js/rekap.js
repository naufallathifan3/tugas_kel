document.addEventListener('DOMContentLoaded', async () => {
    try {
        const response = await fetch('/items');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const items = await response.json();
        
        const rekapList = document.getElementById('rekapList');
        rekapList.innerHTML = ''; // Clear existing items
        
        items.forEach(item => {
            const tr = document.createElement('tr');
            
            tr.innerHTML = `
                <td>${item.name}</td>
                <td>${item.quantity}</td>
                <td>${item.description}</td>
                <td>
                    <button class="edit-btn" data-id="${item.id}">Edit</button>
                    <button class="delete-btn" data-id="${item.id}">Delete</button>
                </td>
            `;
            
            rekapList.appendChild(tr);
        });
        
        // Attach event listeners to dynamically created buttons
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
    } catch (error) {
        console.error('Failed to fetch items:', error);
    }
});
