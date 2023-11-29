$(document).ready(function () {
    $("#calculateBtn").click(function () {
        var homePrice = $("#home_price").val();
        var downPayment = $("#down_payment").val();
        var interestRate = $("#interest_rate").val();

        var moneyPattern = /^\$?\d{1,3}(?:,?\d{3})*(?:\.\d{2})?$/;

        var validationMessages = "";

        if (!moneyPattern.test(homePrice.trim())) {
            validationMessages += "Please enter a valid Home Price\n";
        }
        if (!moneyPattern.test(downPayment.trim())) {
            validationMessages += "Please enter a valid Down Payment\n";
        }
        if (interestRate.trim() === '' || isNaN(interestRate)) {
            validationMessages += "Please enter a valid Interest Rate\n";
        }

        if (validationMessages !== "") {
            alert(validationMessages);
        } else {
            // If all validation passes, submit the form
            $("#loanForm").submit();
        }
    });
});
