document.addEventListener('DOMContentLoaded', () => {
    const stocks = document.querySelectorAll('.stock');
    const popup = document.getElementById('popup');
    const close = document.getElementById('close');
    const name = document.getElementById('stock-name');
    const image = document.getElementById('stock-image');
    const explain = document.getElementById('stock-explain');
    const fee = document.getElementById('stock-fee');
    const count = document.getElementById('stock-count');
    popup.style.display = 'none';

    stocks.forEach(button => {
        button.addEventListener('click', () => {
            const data = JSON.parse(button.getAttribute('data-stock'));

            name.textContent = data.name;
            image.src = data.image_path;
            explain.textContent = data.explain;
            fee.textContent = data.fee;
            count.textContent = data.stock_count;

            popup.style.display = 'block';
        });
    });

    close.addEventListener('click', () => {
        popup.style.display = 'none';
    });
});