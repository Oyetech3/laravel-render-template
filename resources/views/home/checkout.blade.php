<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    <form action="{{ route('pay') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>
        <label for="amount">Amount (NGN):</label>
        <input type="number" name="amount" required>
        <br><br>
        <button type="submit">Pay Now</button>
    </form>
</body>
</html>
