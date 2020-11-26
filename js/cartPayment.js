const paymentForm = document.getElementById("paymentForm");
const amt = document.getElementById("amount").value;
console.log("valud of payment form -> ", paymentForm);

paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: "pk_test_5567390775aab8f3b49dea2064e8530e804b4133", // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    currency: "GHS",
    // label: "Optional string that replaces customer email"
    onClose: function () {
      alert("Transaction was not complete. Window closed.");
    },
    callback: function (response) {
      console.log(response);
      window.location =
        "http://localhost/E-Commerce/HairNow/Actions/process_payment.php?reference=" +
        response.reference +
        "&amount=" +
        amt;
    },
    // callback: function(response){
    //     console.log(response);
    //     $.ajax({
    //         url: 'http://localhost/E-Commerce/Lab/Actions/process_payment.php'+ response.reference,
    //         method: 'get',
    //         success: function (response) {
    //             alert(response);
    //           // the transaction status is in response.data.status
    //           status : response.data.status
    //           amount : amount
    //         }
    //       });
    // }
  });
  handler.openIframe();
}

// const payment = () => {
//   const total_amt = document.getElementById("total_amt").value;
//   const s_key = "sk_test_ea394c7915e7ec4e7a3d0bb02967b82a74a94af1";
//   const u_email = document.getElementById("user_email").value;

//   $.ajax({
//     url: "",
//     method: "",

//     data: {
//       key: s_key,
//       email: u_email,
//       amount: total_amt,
//     },
//     success: (getResponse) => {
//       alert(getResponse);
//     },
//     error: (getResponse) => {
//       alert(getResponse);
//     },
//   });
// };

// function callMe(secretKeyStr) {
//   user_id = document.getElementById("user_id").value;
//   amount = document.getElementById("amount").value;

//   $.ajax({
//     url: "https://apps.ashesi.edu.gh/e-com/",
//     method: "post",
//     data: {
//       userid: user_id,
//       amt: amount,
//       secretkey: secretKeyStr,
//     },
//     success: function (getResponse) {
//       alert(getResponse);
//     },
//     error: function () {
//       alert("Failed");
//     },
//   });
// }
