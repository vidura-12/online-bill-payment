let isBillPayment = true; // Track whether we're displaying Bill Payment or Event Reminders

function seemore() {
  const des = document.getElementById("des");
  const button = document.getElementById("more");

  if (isBillPayment) {
    des.innerHTML = "Say goodbye to late fees and manual bill management. Our platform allows you to securely link your accounts, <br>set up automatic payments, and track your expenses all in one place.<br>You'll receive timely reminders so you never miss a payment, and you can review your payment history at any time.";
    button.textContent = "Event Reminders"; // Change the button text to "Event Reminders"
  } else {
    des.innerHTML = "Stay on top of your schedule with our handy event reminder feature. <br>Simply input your telecomunation bills, education Bills, Utility , and other important dates,<br>and our system will send you notifications in advance. No more last-minute rushes or forgotten special occasions.";
    button.textContent = "Bill Payment"; // Change the button text to "Bill Payment"
  }

  isBillPayment = !isBillPayment; // Toggle between Bill Payment and Event Reminders
}
