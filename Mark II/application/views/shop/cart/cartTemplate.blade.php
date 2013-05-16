<h2>Min kundvagn</h2>
<table id="checkoutTable">
    <thead>
        <tr>
            <th colspan="2">I min kundvagn</th>
            <th>Leverans</th>
            <th>á pris</th>
            <th>Antal</th>
            <th>Summa</th>
            <th>Ta bort</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($cart as $item)
            <tr class="checkoutProduct">
                <td>
                    <a href="{{ URL::to_route('view_product', $item['product']->id) }}">
                        {{ HTML::image('uploads/images/small/' . $item['product']->image_name) }}
                    </a>
                </td>
                
                <td>
                    <p class="title bold">
                        {{ $item['product']->name }}
                    </p>
                    <div class="showLable">
                        {{ $item['product']->category_name }}
                    </div>
                    <p>
                        Art.nr: {{ $item['product']->articlenr }}
                    </p>
                </td>
                
                <td>
                    @if($item['product']->stock > 0)
                        i lager
                    @else
                        ej i lager
                    @endif
                </td>
                
                <td>
                    {{ $item['product']->selling_price * (($item['product']->tax / 100) + 1) }} kr
                </td>
                
                <td>
                    <div class="showQuantity">
                        {{ $item['amount'] }}
                    </div>
                    <div class="editQuantity">
                        {{ Form::submit('Ändra', array('class' => 'btn btn-warning btn-S ')) }}
                    </div>
                </td>
                
                <td>
                    {{ ($item['product']->selling_price * (($item['product']->tax / 100) + 1)) * $item['amount'] }} kr
                </td>
                
                <td>
                    <div class="deleteProduct">
                        {{ Form::submit('x', array('class' => 'btn btn-alert btn-S ')) }}
                    </div>
                </td>                                    
            </tr>         
        @empty
            <p>Inga produkter i kundvagnen</p>
        @endforelse
        <tr id="checkoutTotal">
            <td colspan="6"><p>Totalt ordervärde:</p></td>
            <td><p>{{ $sum }} kr</p></td>
        </tr>

        <tr id="checkoutShippingCost">
            <td colspan="6"><p>Frakt:</p></td>
            <td><p>+ 29 kr</p></td>
        </tr>

        <tr id="checkoutServiceCharge">
            <td colspan="6"><p>Faktureringsavgift:</p></td>
            <td><p>+ 19 kr</p></td>
        </tr>

        <tr id="checkoutAllTotal">
            <td colspan="6"><p>Summa att betala:</p></td>
            <td><p>{{ $sum + 29 + 19 }} kr</p></td>
        </tr>      
    </tbody>
</table>