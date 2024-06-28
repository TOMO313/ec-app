document.addEventListener('DOMContentLoaded', () => {
    const stocks = document.querySelectorAll('.stock');
    const popup = document.getElementById('popup');
    const explain = document.getElementById('stock-explain');
    const fee = document.getElementById('stock-fee');
    const count = document.getElementById('stock-count');
    popup.style.display = 'none';
    const addCarts = document.querySelectorAll('.add-cart');

    stocks.forEach(button => {
        button.addEventListener('click', () => {
            if(popup.style.display === 'none'){
                const data = JSON.parse(button.getAttribute('data-stock'));

                explain.textContent = data.explain;
                fee.textContent = `値段：${data.fee}円`;
                count.textContent = `在庫数：${data.stock_count}個`;

                popup.style.display = 'block';
                button.textContent = '商品詳細を閉じる';
            }else{
                popup.style.display = 'none';
                button.textContent ='商品詳細を開く';
            }
        });
    });

    addCarts.forEach(addCart => {
        addCart.addEventListener('click', () => {
            const stockId = addCart.getAttribute('data-stock-id');
            const buycounts = document.getElementById('buy-counts').value;
    
            axios.post(`/store/${stockId}`, {
                buycounts: buycounts
            }, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(function(response){
                const redirectUrl = `${response.data.redirect_url}?message=${encodeURIComponent(response.data.message)}`
                window.location.href = redirectUrl;
            })
            .catch(function(error){
                console.log(error);
            });
        });
    });
});