
@include('student.tags')
@include('student.sidebar')
@include('student.navbar')
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        #card-element {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        #card-errors {
            color: red;
            margin-top: 10px;
        }
    </style>

    <div class="container mt-5">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <form id="payment-form">
            @csrf

            <div class="form-group mb-3">
                <label for="name">Name on Card</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Name on Card" required>
            </div>

            <div class="form-group mb-3">
                <label for="card-element">Credit or Debit Card</label>
                <div id="card-element"></div>
                <div id="card-errors" role="alert"></div>
            </div>

            <div class="form-group mb-3">
                <label for="student_id">Student ID</label>
                <input type="text" id="student_id" name="student_id" class="form-control" value="{{ request()->student_id }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="student_name">Name</label>
                <input type="text" id="student_name" name="student_name" class="form-control" value="{{ request()->student_name }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="student_campus">Campus</label>
                <input type="text" id="student_campus" name="student_campus" class="form-control" value="{{ request()->student_campus }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="amount">Amount</label>
                <input type="text" id="amount" name="amount" class="form-control" value="{{ request()->amount }}" readonly>
            </div>

            <button type="submit" id="submit" class="btn btn-primary">Pay Now</button>
        </form>
    </div>

    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}'); // Ensure this key is correct
const elements = stripe.elements();
const cardElement = elements.create('card');
cardElement.mount('#card-element');

const form = document.getElementById('payment-form');
form.addEventListener('submit', async (event) => {
    event.preventDefault();
    document.getElementById('submit').disabled = true;

    const { paymentMethod, error } = await stripe.createPaymentMethod({
        type: 'card',
        card: cardElement,
        billing_details: {
            name: document.getElementById('name').value || 'Anonymous',
        },
    });

    if (error) {
        document.getElementById('card-errors').textContent = error.message;
        document.getElementById('submit').disabled = false;
    } else {
        handlePaymentMethod(paymentMethod.id);
    }
});

async function handlePaymentMethod(paymentMethodId) {
    const response = await fetch('{{ secure_url('/stripe') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            payment_method_id: paymentMethodId,
            student_id: document.getElementById('student_id').value,
            student_name: document.getElementById('student_name').value,
            student_campus: document.getElementById('student_campus').value,
            amount: document.getElementById('amount').value
        })
    });

    const result = await response.json();

    if (result.status === 'requires_action') {
        const { error } = await stripe.confirmCardPayment(result.client_secret);
        if (error) {
            document.getElementById('card-errors').textContent = error.message;
            document.getElementById('submit').disabled = false;
        } else {
            window.location.href = '/payment-return'; // Redirect to payment result page
        }
    } else if (result.status === 'succeeded') {
        window.location.href = '/payment-return'; // Redirect to payment result page
    } else {
        document.getElementById('card-errors').textContent = result.error.message || 'Payment failed.';
        document.getElementById('submit').disabled = false;
    }
}

    </script>
@include('student.footer')
