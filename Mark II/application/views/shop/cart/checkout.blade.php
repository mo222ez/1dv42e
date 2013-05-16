@layout('shop.template')

@section('title')

    Kassa
    
@endsection

@section('shopContent')
	{{ render('shop.cart.cartTemplate', array('cart' => $cart, 'sum' => $sum, 'totalAmountOfProducts' => $totalAmountOfProducts)) }}

	<form id="checkoutForm">
	    <h2>Välj Fraktsätt</h2>
	    <table id="checkoutTableShipping">
	        <tbody>
	            <tr>
	                <td>
	                	{{ HTML::image('layout/paymentLogo/posten.png') }}
	                </td>
	                <td>
	                    <label>
	                        <input type="radio" value="" name="radioButtonShipping" checked/>
	                        Posten Paket (29kr)
	                    </label>
	                </td>
	                <td>
	                	<div class="info" id="showShippingInfoButton">
	                    	<a href="#">Mer information</a>
	                    </div>
	                </td>
	            </tr>
	            <tr class="infoRow hidden" id="shippingInfo">
	            	<td></td>
	            	<td></td>
	            	<td>
	            		<p>
	                    	<strong>Posten Paket</strong>
							Din vara skickas med Posten och når dig inom 1-2 arbetsdagar. Den aviseras genom SMS eller brev. Kort efter lagd order informeras du via e-post eller SMS hur du kan spåra och följa din försändelses väg till dig.
						</p>
	            	</td>
	            </tr>
	        </tbody>
	    </table>

	    <h2>Välj hur du vill betala</h2>
	    <table id="checkoutTablePayment">
	        <tbody>
	            <tr>
	                <td>
	                	{{ HTML::image('layout/paymentLogo/faktureramig.gif') }}
	                </td>
	                <td>
	                    <label>
	                        <input type="radio" value="" name="radioButtonPayment" checked/>
	                        Fakturabetalning (+19 kr)
	                    </label>
	                </td>
	                <td>
	                	<div class="info" id="showPaymentInfoButton">
	                    	<a href="#">Mer information</a>
	                	</div>
	                </td>
	            </tr>

	            <tr class="infoRow hidden" id="paymentInfo">
	            	<td></td>
	            	<td></td>
	            	<td>
	            		<p>
	                    	<strong>Fakturabetalning</strong>
							Vi skickar en faktura tillsammans med din order som har betalningsvillkor 14 dagar. Vid beställning mot faktura måste din order skickas till den adress där du är folkbokförd.
							En avgift om 19 kr tas ut av butiken för köpet.
						</p>
	            	</td>
	            </tr>
	        </tbody>
	    </table>

	    <h2>Ange adress och slutför köpet</h2>
	    <p class="textMessage">Fält markerade med * måste fyllas i.</p>
    
        <!--<label>Kundtyp:</label>
        <lable>Privatperson:</lable>
        <input type="radio" class="customerType" name="radioButtonCustomerType" required>

        <lable>Företag/Kommun:</lable>
        <input type="radio" class="customerType" name="radioButtonCustomerType" required>-->

        <label>Personnummer: *</label>
        <input class="inputTextForm" type="text" id="" name="" required>
        
        <label>Förnamn: *</label>
        <input class="inputTextForm" type="text" id="" name="" required>

        <label>Efternamn: *</label>
        <input class="inputTextForm" type="text" id="" name="" required>

        <label>Adress: *</label>
        <input class="inputTextForm" type="text" id="" name="" required>

        <label>Postnummer: *</label>
        <input class="inputTextForm" type="text" id="" name="" required>

        <label>Ort: *</label>
        <input class="inputTextForm" type="text" id="" name="" required>

        <label>Land:</label>
        <select>
            <option>Sverige</option>
        </select>

        <label>E-mail: *</label>
        <input class="inputTextForm" type="text" id="" name="" required>

        <label>Mobiltelefon: *</label>
        <input class="inputTextForm" type="text" id="" name="" required>

        <!-- <div class="holderCheckbox">
            <input class="inputCheckbox" type="checkbox" checked/>
            <label class="labelCheckbox">
                Jag vill få relevanta nyhetsbrev med produktnyheter och erbjudanden.
            </label>
        </div> -->

        <div class="holderCheckbox">
            <input class="inputCheckbox" type="checkbox" checked/>
            <label class="labelCheckbox">
                *Jag har läst köpvillkoren samt kontrollerat att min order är korrekt.
            </label>
        </div>

        <div>
            <input id='register' name='register' type='submit' value='Slutför köp' class='btn btn-success btn-XL'>
        </div>
	</form> 
@endsection