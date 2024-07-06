<x-app-layout>
        <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">カート</h1>
            @if(request()->has('message'))
                <p class="text-center font-serif text-xl">{{ request()->query('message') }}</p>
            @endif
            <div class="grid grid-cols-4 gap-4 flex-wrap">
                @foreach($user->stocks as $stock)
                        <div class="mycart_box text-center rounded shadow-lg bg-white p-6">
                            {{$stock->name}} <br>
                            <img src="/image/{{$stock->imagePath}}" alt="" class="incart" ><br>
                            {{$stock->explain}}<br>
                            {{$stock->fee}}円<br>
                            購入数量：{{$stock->pivot->buy_count}}
                        </div>
                @endforeach
            </div>
            <div>
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;"><a href="{{ route('dashboard') }}">商品一覧に戻る</a></h1>
            </div>
        </div>
</x-app-layout>