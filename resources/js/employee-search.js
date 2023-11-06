
document.getElementById('search-form').addEventListener('submit', function() {
    if (!this.search.value.trim()) {
        this.search.removeAttribute('name');
    }
    if (!this.company_id.value.trim()) {
        this.company_id.removeAttribute('name');
    }
});

