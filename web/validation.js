$(document).ready(function () {
    $("#calculateBtn").click(function () {
        var homePrice = $("#home_price").val();
        var downPayment = $("#down_payment").val();
        var interestRate = $("#interest_rate").val();

        var moneyPattern = /^\$?\d{1,3}(?:,?\d{3})*(?:\.\d{2})?$/;

        if (!moneyPattern.test(homePrice.trim())) {
            alert("Please enter a valid Home Price");
        } else if (!moneyPattern.test(downPayment.trim())) {
            alert("Please enter a valid Down Payment");
        } else if (interestRate.trim() === '' || isNaN(interestRate)) {
            alert("Please enter a valid Interest Rate");
        } else {
            // If all validation passes, submit the form
            $("#loanForm").submit();
        }
    });
});
