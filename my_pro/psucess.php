<!-- <html>
  <head>
    
  </head>
            <style>
            body {
                text-align: center;
                /* padding: 40px 0; */
                background-image: url("images/ps.png");
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                
            }
            h1 {
            color: #88B04B;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
            }
            p {
            color: #404F5E;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size:20px;
            margin: 0;
            }
            i {
                color: #9ABC66;
                font-size: 100px;
                line-height: 200px;
                margin-left:-15px;
            }
            .card {
                background: white;
                padding: 60px;
                border-radius: 4px;
                box-shadow: 0 2px 3px #C8D0D8;
                display: inline-block;
                margin-top: 100px;
               


            }


            
            #back{
                width: 150px;
                height: 40px;
                background: #ff7200;
                border:none;
                margin-top: 10px;
                margin-left: 65px;
                font-size: 18px;
            

            }

            #back a{
                text-decoration: none;
                color: black;
                font-weight: bold;
            }
            .ba{
                width: 1px;
                
            }
            </style>
    <body>
       
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We received your rental request;<br/> we'll be in touch shortly!</p>
        <div class="ba"><button id="back"><a href="cardetails.php">Search Cars</a></button></div>
        
      </div>
    </body>
</html> -->

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success - Rental Request</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
      body {
        margin: 0;
        font-family: 'Nunito Sans', sans-serif;
        background: url("images/bg.jpg") no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #404F5E;
      }

      .card {
        background: rgba(255, 255, 255, 0.85);
        padding: 40px 50px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 400px;
        width: 100%;
        animation: fadeIn 0.8s ease-out;
      }

      .card h1 {
        font-size: 36px;
        font-weight: 700;
        color: #88B04B;
        margin: 20px 0;
      }

      .card p {
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 30px;
      }

      .checkmark {
        color: #9ABC66;
        font-size: 80px;
        margin-bottom: 20px;
        animation: bounceIn 1s ease-out;
      }

      .btn {
        display: inline-block;
        background: #3b82f6;
        color: white;
        padding: 12px 25px;
        font-size: 16px;
        text-transform: uppercase;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        text-decoration: none;
        transition: background 0.3s ease;
      }

      .btn:hover {
        background: #e76200;
      }

      @keyframes fadeIn {
        0% {
          opacity: 0;
          transform: translateY(-20px);
        }
        100% {
          opacity: 1;
          transform: translateY(0);
        }
      }

      @keyframes bounceIn {
        0% {
          opacity: 0;
          transform: scale(0);
        }
        50% {
          opacity: 1;
          transform: scale(1.2);
        }
        100% {
          opacity: 1;
          transform: scale(1);
        }
      }

    </style>
  </head>
  <body>
    <div class="card">
      <div class="checkmark">✓</div>
      <h1>Successfully Booked</h1>
      <p>We received your rental request.<br>We'll be in touch shortly!</p>
      <a href="cardetails.php" class="btn">Search Cars</a>
    </div>
  </body>
</html>
