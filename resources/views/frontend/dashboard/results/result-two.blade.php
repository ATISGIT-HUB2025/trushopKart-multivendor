<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Winner Certificate</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Courgette&family=Dancing+Script:wght@400..700&family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&family=Pacifico&family=Satisfy&family=Yellowtail&display=swap");
      body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
      }

      .certificate {
        width: 100%;
        max-width: 717px;
        margin: 20px auto;
        padding: 128px;
        background: white;
        text-align: center;
        background-image: url(5.png);
        background-repeat: no-repeat;
        background-size: cover;
      }

      .cert-logo img {
        width: 60px;
        margin: 5px;
      }

      h1 {
        font-size: 40px;
        color: rgb(159, 33, 26);
        font-family: "Courgette", serif;
        text-transform: uppercase;
        margin: 10px 0;
        font-weight: bold;
      }

      h2 {
        font-size: 28px;
        color: red;
        margin: 5px 0;
      }

      p {
        font-size: 14px;
        margin: 15px 0;
        text-align: left;
        font-weight: 400;
      }

      .name {
        color: rgb(36, 9, 8);
        font-size: 22px;
        font-weight: bold;
        text-align: center;
      }
      .cert-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 100%;
        margin: auto;
      }

      .cert-row {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        justify-content: center;
      }

      .cert-input {
        display: flex;
        flex-direction: column;
        min-width: 200px;
        flex: 1;
      }

      label {
        font-weight: bold;
        margin-bottom: 5px;
        text-align: left;
        font-size: 12px;
      }

      input {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }

      .table-container {
        margin-top: 30px;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }

      table,
      th,
      td {
        border: 2px solid black;
      }

      th,
      td {
        padding: 5px;
        text-align: center;
      }

      .signature-img {
        display: flex;
        justify-content: space-around;
        /* margin-top: 30px;
        margin-bottom: 0; */
      }
      .signature {
        display: flex;
        justify-content: space-between;
      }

      .signature div {
        width: 45%;
        text-align: center;
        border-top: 2px solid black;
        padding-top: 5px;
      }
    </style>
  </head>
  <body>
    <div class="certificate">
      <div class="cert-logo">
        <img src="1.jpeg" alt="Award Icon" />
        <img src="2.jpeg" alt="Award Icon" />
      </div>

      <h1>Certificate</h1>
      <h2>DHYEYA PRAKASHAN ACADEMY MAHARASHTRA</h2>
      <h2 style="margin-bottom: 25px">I AM WINNER STATE LEVEL EXAM 2025</h2>

      <p style="margin: 0">This is to certify that,</p>
      <p class="name">Suraj Jamdade</p>
      <hr />

      <!-- Form Section -->
      <div class="cert-form">
        <div class="cert-row">
          <div class="cert-input">
            <label>Unique ID</label>
            <input type="text" />
          </div>
          <div class="cert-input">
            <label>District</label>
            <input type="text" />
          </div>
          <div class="cert-input">
            <label>Taluka</label>
            <input type="text" />
          </div>

          <div class="cert-input">
            <label>Class</label>
            <input type="text" />
          </div>
          <div class="cert-input">
            <label>Medium</label>
            <input type="text" />
          </div>
        </div>

        <div class="cert-row">
          <div class="cert-input">
            <label>School</label>
            <input type="text" />
          </div>
        </div>
        <div class="cert-row">
          <div class="cert-input">
            <label>Center</label>
            <input type="text" />
          </div>
        </div>
      </div>

      <p>
        has successfully participated in the I Am Winner State Level Exam on
        this day of 05/01/2025. Awarded by Dhyeya Prakashan Academy.
      </p>

      <!-- Table Section -->
      <div class="table-container">
        <table>
          <tr>
            <th>PAPER</th>
            <th>MAX. MARKS</th>
            <th>OBTAINED MARKS</th>
            <th>PERCENTAGE %</th>
            <th>RANKS</th>
            <th>RANKING</th>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td rowspan="4"></td>
            <th>STATE</th>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <th>DIVISION</th>
            <td></td>
          </tr>
          <tr>
            <th colspan="2">TOTAL</th>
            <td></td>
            <th>DISTRICT</th>
            <td></td>
          </tr>
          <tr>
            <td colspan="4"></td>
            <th>CENTER</th>
            <td></td>
          </tr>
        </table>
      </div>

      <p>Congratulations!</p>

      <p>
        We are proud to recognize your outstanding performance in the I Am
        Winner State Level Exam. Your dedication, hard work, and perseverance
        have led you to this remarkable achievement. May this success be the
        foundation for even greater accomplishments in your academic journey and
        beyond. Keep striving for excellence and never stop learning! Best
        wishes for a bright and successful future!
      </p>

      <!-- Signature Section -->
      <div class="signature-img">
        <div>
          <img src="12.png" alt="" style="width: 150px" />
        </div>
        <div>
          <img src="13.png" alt="" style="width: 150px" />
        </div>
      </div>
      <div class="signature">
        <div style="font-size: 14px">
          I AM WINNER EXAM<br />
          (ADMINISTRATOR)
        </div>
        <div style="font-size: 14px">
          DHYEYA PRAKASHAN ACADEMY<br />
          (DIRECTOR)
        </div>
      </div>
    </div>
  </body>
</html>
