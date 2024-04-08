$(document).ready(function () {
	$('#createUserBtn').click(function () {
		// Show the modal
		$('#createUserModal').modal('show')
	})

	$('.editUser').click(function () {
		var userId = $(this).data('id')
		var username = $(this).closest('tr').find('td:eq( 1 )').text()
		var email = $(this).closest('tr').find('td:eq( 2 )').text()

		// Populate the modal with user data
		$('#userid').val(userId)
		$('#username').val(username)
		$('#email').val(email)

		// Show the modal
		$('#createUserModal').modal('show')
	})

	// Function to handle "Delete" button click
	$('.deleteUser').click(function () {
		var userId = $(this).data('id') // Get the user ID of the selected row

		// Confirm delete
		if (confirm('Are you sure you want to delete this user?')) {
			// AJAX request to delete the user
			$.ajax({
				type: 'POST',
				url: '?c=user&m=deleteUser',
				data: {
					userId: userId,
				},
				success: function (response) {
					// Handle success response
					console.log(response) // Log the response from the server
					// Assuming response is a JSON object with success status
					if (response.success) {
						// Fade out and remove the deleted user row from the table
						$('tr[data-userid="' + userId + '"]').fadeOut(500, function () {
							$(this).remove()
						})
					}
				},
				error: function (xhr, status, error) {
					// Handle error response
					console.error(xhr.responseText) // Log the error response from the server
					// You can display an error message to the user
					alert('An error occurred while deleting the user.')
				},
				complete: function (res) {
					location.reload()
				},
			})
		}
	})

	$('#createHolidayBtn').click(function () {
		// Show the modal
		$('#createHolidayModal').modal('show')
	})

	$('.editHoliday').click(function () {
		var holidayId = $(this).data('id')
		var year = $(this).closest('tr').find('td:eq( 1 )').text()
		var month = $(this).closest('tr').find('td:eq( 2 )').text()
		var day = $(this).closest('tr').find('td:eq( 3 )').text()
		var event = $(this).closest('tr').find('td:eq( 4 )').text()

		// Populate the modal with user data
		$('#id').val(holidayId)
		$('#year').val(year)
		$('#month').val(month)
		$('#day').val(day)
		$('#event').val(event)

		// Show the modal
		$('#createHolidayModal').modal('show')
	})

	$('.deleteHoliday').click(function () {
		var holidayId = $(this).data('id') // Get the user ID of the selected row

		// Confirm delete
		if (confirm('Are you sure you want to delete this holiday?')) {
			// AJAX request to delete the user
			$.ajax({
				type: 'POST',
				url: '?c=dashboard&m=deleteHoliday',
				data: {
					id: holidayId,
				},
				success: function (response) {
					// Handle success response
					console.log(response) // Log the response from the server
					// Assuming response is a JSON object with success status
					if (response.success) {
						// Fade out and remove the deleted user row from the table
						$('tr[data-id="' + holidayId + '"]').fadeOut(500, function () {
							$(this).remove()
						})
					}
				},
				error: function (xhr, status, error) {
					// Handle error response
					console.error(xhr.responseText) // Log the error response from the server
					// You can display an error message to the user
					alert('An error occurred while deleting the user.')
				},
				complete: function (res) {
					location.reload()
				},
			})
		}
	})
})

document.addEventListener('DOMContentLoaded', function () {
	// Function to validate days input
	function validateDaysInput() {
		var daysInput = document.getElementById('day')
		var daysValue = daysInput.value
		// Regular expression to match numbers separated by commas
		var regex = /^\d+(,\s*\d+)*$/
		if (!regex.test(daysValue)) {
			alert('Invalid input for days. Please enter numbers separated by commas.')
			return false // Return false to prevent form submission
		}
		return true // Return true if input is valid
	}

	// Add event listener to form submit event
	document
		.getElementById('holidayForm')
		.addEventListener('submit', function (event) {
			// Validate days input
			if (!validateDaysInput()) {
				event.preventDefault() // Prevent form submission if validation fails
			}
		})
})