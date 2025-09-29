// Simple dashboard functionality
document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.crud-section')) {
        initDashboard();
    }
});

function initDashboard() {
    addSearchBox();
    addSortOptions();
}

function addSearchBox() {
    const itemsSection = document.querySelector('.items-list');
    if (itemsSection && !document.querySelector('.search-box')) {
        const searchHTML = `
            <div class="search-box">
                <input type="text" id="search-items" placeholder="Search items...">
            </div>
        `;
        itemsSection.insertAdjacentHTML('beforebegin', searchHTML);
        
        // Add search functionality
        const searchInput = document.getElementById('search-items');
        searchInput.addEventListener('input', function(e) {
            filterItems(e.target.value.toLowerCase());
        });
    }
}

function addSortOptions() {
    const crudSection = document.querySelector('.crud-section');
    
    if (crudSection && !document.querySelector('.sort-options')) {
        const sortHTML = `
            <div class="sort-options">
                <label>Sort by: </label>
                <select id="sort-items">
                    <option value="newest">Newest First</option>
                    <option value="oldest">Oldest First</option>
                    <option value="title">Title A-Z</option>
                </select>
            </div>
        `;
        
        const itemForm = document.querySelector('.item-form');
        if (itemForm) {
            itemForm.insertAdjacentHTML('afterend', sortHTML);
        }
        
        // Add sort functionality
        const sortSelect = document.getElementById('sort-items');
        if (sortSelect) {
            sortSelect.addEventListener('change', function() {
                sortItems(this.value);
            });
        }
    }
}

function filterItems(searchTerm) {
    const items = document.querySelectorAll('.item-card');
    
    items.forEach(item => {
        const title = item.querySelector('h3').textContent.toLowerCase();
        const description = item.querySelector('p').textContent.toLowerCase();
        
        if (title.includes(searchTerm) || description.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

function sortItems(criteria) {
    const itemsContainer = document.querySelector('.items-list');
    const items = Array.from(itemsContainer.querySelectorAll('.item-card'));
    
    items.sort((a, b) => {
        const aTitle = a.querySelector('h3').textContent;
        const bTitle = b.querySelector('h3').textContent;
        const aDate = new Date(a.querySelector('small').textContent.replace('Created: ', ''));
        const bDate = new Date(b.querySelector('small').textContent.replace('Created: ', ''));
        
        switch(criteria) {
            case 'newest':
                return bDate - aDate;
            case 'oldest':
                return aDate - bDate;
            case 'title':
                return aTitle.localeCompare(bTitle);
            default:
                return 0;
        }
    });
    
    itemsContainer.innerHTML = '';
    items.forEach(item => itemsContainer.appendChild(item));
}