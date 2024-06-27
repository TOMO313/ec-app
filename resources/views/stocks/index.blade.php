<x-app-layout>
    <div class="container-fluid">
        <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
            <div class="grid grid-cols-4 gap-4 flex-wrap">
                @foreach($stocks as $stock)
                    @if($stock->stock_count == 0)
                        <div class="mycart_box text-center rounded shadow-lg bg-white p-6">
                            {{$stock->name}} <br>
                            <img src="/image/{{$stock->imagePath}}" alt="" class="incart" ><br>
                            {{$stock->explain}}<br>
                            {{$stock->fee}}円<br>
                            <div class="text-red-600 text-xl">
                                SOLD OUT
                            </div>
                        </div>
                    @else
                        <div class="text-center rounded shadow-lg bg-white p-6">
                            <img src="{{ $stock->image_path }}" alt="画像がありません"><br>
                            <h2>{{$stock->name}}</h2><br>
                            <button class="stock rounded bg-blue-200 hover:bg-blue-400 m-6"
                                    data-stock='{{ json_encode([
                                        "id" => $stock->id, 
                                        "name"=> $stock->name, 
                                        "image_path" => $stock->image_path,
                                        "explain" => $stock->explain, 
                                        "fee" => $stock->fee, 
                                        "stock_count" => $stock->stock_count,    
                                    ]) }}'>
                                    商品詳細を開く
                            </button>
                            <div class="p-6">
                                <form action="/store/{{$stock->id}}" method="POST">
                                    @csrf
                                    購入数量：<input type="number" name="buyCount" min="1" max="{{$stock->stock_count}}" value="1"/><br>
                                    <button class="rounded bg-blue-200 hover:bg-blue-400 mt-6" type="submit">カートに追加</button>
                                </form>
                            </div>
                            <div id="popup">
                                <h2 id="stock-name"></h2>
                                <img id="stock-image" src="" alt="画像がありません">
                                <p id="stock-explain"></p>
                                <p id="stock-fee"></p>
                                <p id="stock-count"></p>
                                <button class="rounded bg-blue-200 hover:bg-blue-400 m-6" id="close">商品詳細を閉じる</button>
                            </div>
                        </div>    
                    @endif
                @endforeach
            </div>
            <div class="text-center" style="width: 200px;margin: 20px auto;">
                {{ $stocks->links('vendor.pagination.tailwind2') }}
            </div>
        </div>
    </div>
    <script src="{{ asset('js/index.js') }}"></script>
</x-app-layout>