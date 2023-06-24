$(document).ready(function() {
    // Handle form submission
    $('#searchForm').submit(function(e) {
        e.preventDefault(); // Prevent default form submission
        
        var customerName = $('#customerName').val(); // Get the customer name
        
        // Send an AJAX request to fetch the order details
        $.ajax({
            url: 'fetch_order_details.php',
            method: 'GET',
            data: { customerName: customerName },
            success: function(response) {
                $('#orderTableContainer').html(response); // Update the table with the fetched data
            },
            error: function() {
                alert('Error occurred. Please try again.');
            }
        });
    });
});
