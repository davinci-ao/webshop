<div class="button-box">
            <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Sort products
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ url('/product')}}" class="btn btn-dark btn-sm">Default</a></li>
                <li><a class="dropdown-item" href="{{ url('/product/sortOnPriceHigh')}}" class="btn btn-dark btn-sm">Price (high)</a></li>
                <li><a class="dropdown-item" href="{{ url('/product/sortOnPriceLow')}}" class="btn btn-dark btn-sm">Price (low)</a></li>
                <li><a class="dropdown-item" href="{{ url('/product/sortOnNameHigh')}}" class="btn btn-dark btn-sm">Name (A-Z)</a></li>
                <li><a class="dropdown-item" href="{{ url('/product/sortOnNameLow')}}" class="btn btn-dark btn-sm">Name (Z-A)</a></li>
            </ul>
            <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Sort by category
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{ url('/product/sortByCategory/' . 1)}}" class="btn btn-dark btn-sm">Instruments</a></li>
            <li><a class="dropdown-item" href="{{ url('/product/sortByCategory/' . 2)}}" class="btn btn-dark btn-sm">Drumkits</a></li>
            <li><a class="dropdown-item" href="{{ url('/product/sortByCategory/' . 3)}}" class="btn btn-dark btn-sm">Plugins</a></li>
          
            </ul>
            @if(Auth::check() && Auth::user()->admin == "1")
            <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm">+ Add product</a>
        @endif
        </div>