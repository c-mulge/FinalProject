<?php

require_once('connection.php');
include('user_auth.php');
$email = $_SESSION['email'] ?? null;

// Fetch latest booking details
$stmt = $con->prepare("SELECT * FROM booking WHERE EMAIL = ? ORDER BY BOOK_ID DESC LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$emailData = $result->fetch_assoc();
$bid = $emailData['BOOK_ID'] ?? null;
$_SESSION['bid'] = $bid;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pay'])) {
    $cardno = trim($_POST['cardno']);
    $exp = trim($_POST['exp']);
    $cvv = trim($_POST['cvv']);
    $price = $emailData['PRICE'] ?? 0;

    if (empty($cardno) || empty($exp) || empty($cvv)) {
        echo '<script>alert("Please fill in all fields.")</script>';
    } elseif (!preg_match('/^\d{16}$/', $cardno)) {
        echo '<script>alert("Invalid card number format.")</script>';
    } elseif (!preg_match('/^\d{2}\/\d{2}$/', $exp)) {
        echo '<script>alert("Invalid expiry date format. Use MM/YY.")</script>';
    } elseif (!preg_match('/^\d{3}$/', $cvv)) {
        echo '<script>alert("Invalid CVV format.")</script>';
    } else {
        // Save payment record securely (avoid storing card details)
        $stmt = $con->prepare("INSERT INTO payment (BOOK_ID, PRICE) VALUES (?, ?)");
        $stmt->bind_param("id", $bid, $price);
        if ($stmt->execute()) {
            header("Location: psucess.php");
            exit();
        } else {
            echo '<script>alert("Payment failed. Please try again.")</script>';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Payment Form</title>
  <style>
    /* Global Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      padding: 1rem;
    }

    /* Main Container */
    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      max-width: 1100px;
      width: 100%;
      background: rgba(255, 255, 255, 0.1);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(10px);
      border-radius: 1.5rem;
      padding: 2rem;
    }

    /* Card and Bill Section */
    .card, .bill {
      flex: 1 1 calc(50% - 1rem); /* Adjust widths for responsive layout */
      padding: 1.5rem;
      background: rgba(255, 255, 255, 0.15);
      border-radius: 1rem;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    /* Card Section */
    .card h1 {
      font-size: 1.8rem;
      margin-bottom: 1rem;
      color: #ffffff;
      text-align: center;
    }

    .card__row {
      display: flex;
      gap: 1.5rem;
      justify-content: space-between;
      margin-bottom: 1.5rem;
    }

    .card__col {
      flex: 1;
    }

    .card__input {
      width: 100%;
      padding: 0.8rem;
      font-size: 1rem;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 0.5rem;
      outline: none;
      transition: 0.3s;
    }

    .card__input:focus {
      background: rgba(255, 255, 255, 0.3);
      border-color: #ffffff;
    }

    .card__label {
      font-size: 0.9rem;
      margin-bottom: 0.5rem;
      color: #ffffff;
      display: block;
    }

    .card__chip img {
      width: 50px;
      display: block;
      margin: auto;
    }

    .card__buttons {
  display: flex;
  justify-content: space-between; /* Creates space between buttons */
  gap: 1rem; /* Adds a small gap between buttons */
  margin-top: 1.5rem; /* Adds space above buttons */
}

.pay, .btn {
  flex: 1; /* Make both buttons equal in size */
  padding: 0.8rem 1rem;
  font-size: 1rem;
  font-weight: bold;
  text-align: center;
  border: none;
  border-radius: 0.5rem;
  cursor: pointer;
  transition: 0.3s;
}

.pay {
  background: #3b82f6;
  color: #fff;
}

.pay:hover {
  background: #2563eb;
}

.btn {
  background: transparent;
  border: 2px solid #ff6b6b;
  color: #ff6b6b;
}

.btn:hover {
  background: #ff6b6b;
  color: #fff;
}

.btn a {
  text-decoration: none;
  color: inherit; /* Matches button text color */
  display: block;
  width: 100%;
  height: 100%;
  line-height: 2rem;
}

    /* Bill Section */
    .bill h2 {
      text-align: center;
      font-size: 1.8rem;
      margin-bottom: 1rem;
      color: #ffffff;
    }

    .bill p {
      margin: 0.5rem 0;
      font-size: 1rem;
      color: #ffffff;
      display: flex;
      justify-content: space-between;
    }

    .bill span {
      font-weight: bold;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .card, .bill {
        flex: 1 1 100%;
      }

      .card__row {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Payment Form -->
    <div class="card">
      <h1>Enter Payment Information</h1>
      <form method="POST">
        <div class="card__row">
          <div class="card__col">
            <label for="cardNumber" class="card__label">Card Number</label>
            <input
              type="text"
              id="cardNumber"
              class="card__input"
              placeholder="xxxx-xxxx-xxxx-xxxx"
              name="cardno"
              maxlength="16"
              required
            />
          </div>
          <div class="card__col card__chip">
            <img src="images/chip.svg" alt="Card Chip">
          </div>
        </div>
        <div class="card__row">
          <div class="card__col">
            <label for="cardExpiry" class="card__label">Expiry Date</label>
            <input
              type="text"
              id="cardExpiry"
              class="card__input"
              placeholder="MM/YY"
              name="exp"
              maxlength="5"
              required
            />
          </div>
          <div class="card__col">
            <label for="cardCcv" class="card__label">CVV</label>
            <input
              type="password"
              id="cardCcv"
              class="card__input"
              placeholder="xxx"
              name="cvv"
              maxlength="3"
              required
            />
          </div>
        </div>
        <div class="card__buttons">
          <button type="submit" class="pay" name="pay">PAY NOW</button>
          <button class="btn">
            <a href="cancelbooking.php">CANCEL</a>
          </button>
        </div>
      </form>
    </div>

    <!-- Bill Details -->
    <div class="bill">
      <h2>Bill Details</h2>
      <p>Booking ID: <span><?php echo htmlspecialchars($emailData['BOOK_ID'] ?? 'N/A'); ?></span></p>
      <p>Customer Email: <span><?php echo htmlspecialchars($_SESSION['email'] ?? 'N/A'); ?></span></p>
      <p>Total Price: <span>₹<?php echo htmlspecialchars($emailData['PRICE'] ?? '0'); ?>/-</span></p>
      <p>Date: <span><?php echo htmlspecialchars($emailData['BOOK_DATE'] ?? 'N/A'); ?></span></p>
    </div>
  </div>
</body>
</html>

