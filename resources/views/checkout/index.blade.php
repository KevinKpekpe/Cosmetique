@extends('clients.base')
@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('extra-script')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
    <div class="ui container">
  <h1 class="ui header">
    <i class="credit card outline icon"></i>
    Paiement Sécurisé
  </h1>
  <div class="ui grid">
    <div class="sixteen wide mobile eight wide tablet six wide computer column">
      <form action="{{ route('checkout.store') }}" method="POST" id="payment-form" class="ui form my-4">
        @csrf
        <div class="ui segment">
          <div class="field">
            <label for="card-element">Informations de paiement</label>
            <div id="card-element" class="field">
                <!-- Elements will create input elements here -->
            </div>
          </div>
          <div id="card-errors" role="alert"></div>
        </div>
        <button class="ui button primary mt-3" id="submit">
          Payer {{Cart::total()}}
        </button>
        <div class="ui message">
          <p>Nous ne stockons pas les informations de votre carte de crédit et traitons toutes les transactions de manière sécurisée.</p>
          <p>Pour toute question ou assistance, contactez-nous à <a href="mailto:support@example.com">support@example.com</a>.</p>
        </div>
      </form>
    </div>
    <div class="sixteen wide mobile eight wide tablet six wide computer column">
      <div class="ui segment">
        <h2 class="ui header">Comment ça marche ?</h2>
        <p>Nous utilisons le système de paiement en ligne sécurisé Stripe qui prend en charge les principales cartes de crédit.</p>
        <p>Remplissez simplement le formulaire de paiement ci-dessus et cliquez sur "Payer". Votre paiement sera traité immédiatement et vous recevrez une confirmation par e-mail.</p>
        <p>Si vous avez des questions ou des problèmes, n'hésitez pas à nous contacter à <a href="mailto:support@example.com">support@example.com</a>.</p>
      </div>
    </div>
  </div>
</div>
@endsection

@section('extra-js')
    <script>
        var stripe = Stripe(
            'pk_test_51NAJv7Igps0lluGji6UFcHvWzm6NuDRir7PuN39qqAAwJsCgY2ET6oVFntI1K2La4oK5tgfq2by766VzYBzrzufb00KYJhNhTS'
            );
        var elements = stripe.elements();
        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };
        var card = elements.create("card", {
            style: style
        });
        card.mount("#card-element");
        card.addEventListener('change', ({
            error
        }) => {
            const displayError = document.getElementById('card-errors');
            if (error) {
                displayError.classList.add('alert', 'alert-warning', 'mt-3');
                displayError.textContent = error.message;
            } else {
                displayError.classList.remove('alert', 'alert-warning', 'mt-3');
                displayError.textContent = '';
            }
        });
        var submitButton = document.getElementById('submit');

        submitButton.addEventListener('click', function(ev) {
            ev.preventDefault();
            submitButton.disabled = true;
            stripe.confirmCardPayment("{{ $clientSecret }}", {
                payment_method: {
                    card: card
                }
            }).then(function(result) {
                if (result.error) {
                    // Show error to your customer (e.g., insufficient funds)
                    submitButton.disabled = false;
                    console.log(result.error.message);
                } else {
                    // The payment has been processed!
                    if (result.paymentIntent.status === 'succeeded') {
                        var paymentIntent = result.paymentIntent;
                        var token = document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content');
                        var form = document.getElementById('payment-form');
                        var url = form.action;
                        var redirect = '/merci';
                        fetch(
                            url, {
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json, text-plain, */*",
                                    "X-Requested-With": "XMLHttpRequest",
                                    "X-CSRF-TOKEN": token
                                },
                                method: 'post',
                                body: JSON.stringify({
                                    paymentIntent: paymentIntent
                                })
                            }).then((data) => {
                            console.log(data);
                            // form.reset();
                            window.location.href = redirect;
                        }).catch((error) => {
                            alert(error)
                        })

                    }
                }
            });
        });
    </script>
@endsection
