<div id="goBackContainer">
    @if(!Request::route()->is('shop_start'))
        <a href="{{ URL::to_route('shop_start') }}" id="goBackLink">← Tillbaka till startsidan</a>
    @endif
</div>
<div id="sortContainer">
    @if(Request::route()->is('shop_start') || Request::route()->is('category_products'))
        <p>
            {{ Form::open(Request::uri(), 'GET', array('class' => 'sortbarForm')) }}
                Sortera på:
                <select onchange="this.form.submit()" name="sortOrder">
                    <option value="nameDesc" >Namn A-Ö</option>
                    <option value="nameAsc" >Namn Ö-A</option>
                    <option value="priceHigh" >Lägsta pris</option>
                    <option value="priceLow" >Högsta pris</option>
                    <option value="oldest" >Äldsta</option>
                    <option value="newest" >Senaste</option>
                </select>

                Visa antal:
                <select>
                    <option value="" >15</option>
                    <option value="" >25</option>
                    <option value="" >50</option>
                    <option value="" >100</option>
                    <option value="" >ALLA</option>
                </select>
            {{ Form::close() }}
        </p>
    @endif
</div>