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
        "../Actions/process_payment.php?reference=" +
        response.reference +
        "&amount=" +
        amt;
    },

  });
  handler.openIframe();
}

